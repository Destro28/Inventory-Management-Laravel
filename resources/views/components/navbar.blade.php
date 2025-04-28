<div>
<nav class="navbar">
    <div class="nav-brand">Inventory System</div>
    <ul class="nav-links">
      <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
      <li><a href="{{ route('inventory') }}">Inventory</a></li>
      <li><a href="{{route('add_items')}}">Add Item</a></li>
      <!-- <li><a href="{{route('edit_items')}}">Edit Items</a></li> -->
      <li><a href="{{ route('edit_items') }}">Edit Item</a></li>

  
      <li><a href="{{route('welcome')}}">Logout</a></li>
    </ul>
  </nav>
</div>