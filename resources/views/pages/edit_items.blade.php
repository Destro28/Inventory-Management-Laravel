<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Edit Item - Inventory System</title>
  <link rel="stylesheet" href="<?php echo asset('css/style2.css')?>" href="css/style2.css" />
</head>
<body>

  <!-- Navigation Bar -->
  <x-navbar />

  <!-- Main Content -->
  <div class="container">
   <h2 class="page-title">Edit Item</h2>
   <form method="POST" action="{{ route('update_item') }}">
    @csrf
    <!-- Item Name -->
    <input type="text" name="item_name" placeholder="Item Name" required />

    <!-- Category Dropdown -->
    <select name="category" required>
        <option value="">Select Category</option>
        @foreach($categories as $category)
            <option value="{{ $category }}">{{ ucfirst($category) }}</option>
        @endforeach
    </select>

    <!-- Quantity -->
    <input type="number" name="quantity" placeholder="Quantity" required />

    <!-- Price -->
    <input type="number" name="price" placeholder="Price" step="0.01" required />

    <!-- Supplier -->
    <input type="text" name="supplier_name" placeholder="Supplier" />

    <button type="submit">Update Item</button>
</form>

</div>


</body>
</html>

