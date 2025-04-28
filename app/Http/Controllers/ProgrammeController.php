<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; // ✅ Needed for Request object
use App\Models\User; // ✅ Import your User model
use Illuminate\Support\Facades\Hash;    // ← for checking bcrypt
use Illuminate\Support\Facades\Auth;    // ← if you want to log them in
use Illuminate\Support\Facades\Validator; // ← for validation
use Illuminate\Support\Facades\DB; // <- insertion of data 



class ProgrammeController extends Controller
{
    public function validateuser(Request $request)
    {
        // Validate the form inputs
        $data = $request->validate([
            'username' => 'required',
            // password should be a string, not numeric:
            'password' => 'required',
        ]);

        //  Look up the user by username
        $user = User::where('username', $data['username'])->first();

        //  If no user, or password doesn’t match the hash, redirect back with error
        if (! $user || ! Hash::check($data['password'], $user->password)) {
            return back()
                ->withErrors(['credentials' => 'Invalid username or password'])
                ->withInput(['username' => $data['username']]);
        }

        //  (Optional) Log them in via Laravel’s Auth
        Auth::login($user);

        //  Redirect to dashboard
        return redirect()->route('dashboard');
    }


    public function insertuser(Request $request)
    {
        $request->validate([
            'name'     => 'required',
            'email'    => 'required|email|unique:users,email',
            'username' => 'required',
            'password' => 'required',
        ]);

        // Create the user
        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'username' => $request->username,
            // always hash passwords
            'password' => bcrypt($request->password),
        ]);

        // Redirect to login (or wherever)
        return redirect()->route('login')->with('success', 'Account created!');
    }

    public function add_items_details(Request $request)
{
    $request->validate([
        'item_name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'quantity' => 'required|integer',
        'price' => 'required|numeric',
        'supplier_name' => 'nullable|string|max:255',
    ]);

    $quantity = $request->quantity;
    if ($quantity == 0) {
        $status = 'Out of Stock';
    } elseif ($quantity < 20) {
        $status = 'Low Stock';
    } else {
        $status = 'In Stock';
    }

    DB::table('inventories')->insert([
        'user_id' => auth()->id(), // or manually set user_id if no auth
        'item_name' => $request->item_name,
        'category' => $request->category,
        'quantity' => $request->quantity,
        'price' => $request->price,
        'supplier_name' => $request->supplier_name,
        'status' => $status,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->back()->with('success', 'Item added successfully!');
}


// use Illuminate\Support\Facades\Auth;

public function showInventory(Request $request)
{
    // Fetch distinct categories and statuses for dropdowns
    $categories = DB::table('inventories')->distinct()->pluck('category');
    $statuses   = DB::table('inventories')->distinct()->pluck('status');

    // Build the base query scoped to the logged-in user
    $query = DB::table('inventories')->where('user_id', Auth::id());  // Only fetch items for the logged-in user
    
    // Apply search by item_name if it's provided in the request
    if ($request->filled('search')) {
        $query->where('item_name', 'like', '%'.$request->search.'%');
    }

    // Apply category filter if provided
    if ($request->filled('category')) {
        $query->where('category', $request->category);
    }

    // Apply status filter if provided
    if ($request->filled('status')) {
        $query->where('status', $request->status);
    }

    // Get the filtered results
    $inventories = $query->get();

    return view('pages.inventory', compact('inventories', 'categories', 'statuses'));
}

public function showEditForm()
{
    // Just display the form to select item details (no need to pass an ID)
    $categories = DB::table('inventories')->distinct()->pluck('category');
    return view('pages.edit_items', compact('categories'));
}

public function updateItem(Request $request)
{
    // Validate the input data
    $request->validate([
        'item_name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'quantity' => 'required|integer',
        'price' => 'required|numeric',
        'supplier_name' => 'nullable|string|max:255',
    ]);

    // Fetch the item based on the item_name (or another unique identifier like SKU, etc.)
    $item = DB::table('inventories')->where('item_name', $request->input('item_name'))->first();

    if ($item) {
        // Update the item in the database
        DB::table('inventories')->where('id', $item->id)->update([
            'category' => $request->input('category'),
            'quantity' => $request->input('quantity'),
            'price' => $request->input('price'),
            'supplier_name' => $request->input('supplier_name'),
        ]);

        return redirect()->route('inventory')->with('success', 'Item updated successfully!');
    } else {
        return redirect()->back()->withErrors('Item not found.');
    }
}

public function dashboard()
{
    // Fetch the items only for the logged-in user
    $items = DB::table('inventories')->where('user_id', Auth::id())->get();

    // Calculate total stock for the logged-in user
    $totalStock = $items->sum('quantity');
    $outOfStock = $items->where('quantity', 0)->count();
    $categories = $items->pluck('category')->unique()->count();
    $suppliers = $items->pluck('supplier_name')->unique()->count();

    // Top stocked items (top 5)
    $topStockedItems = $items->sortByDesc('quantity')->take(5);

    // Recent items (latest 5 based on created_at)
    $recentItems = $items->sortByDesc('created_at')->take(5);

    // Chart data (stock quantity per category)
    $grouped = $items->groupBy('category');
    $chartLabels = $grouped->keys();
    $chartData = $grouped->map(function ($group) {
        return $group->sum('quantity');
    })->values();

    // Return the dashboard view with relevant data
    return view('pages.dashboard', compact(
        'totalStock', 
        'outOfStock', 
        'categories', 
        'suppliers', 
        'recentItems', 
        'topStockedItems', 
        'chartLabels', 
        'chartData'
    ));
}



}



