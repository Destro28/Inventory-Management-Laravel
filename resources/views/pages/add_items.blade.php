<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Add New Item</title>
  <link rel="stylesheet" href="<?php echo asset('css/style2.css')?>" />
</head>
<body>
    <x-navbar />
  
  <h2 class="page-title">Add New Item</h2>
  <form method="POST" action="{{ route('add_items_details') }}">
    @csrf
    <input type="text" name="item_name" placeholder="Item Name" required />
    <input type="text" name="category" placeholder="Category" required />
    <input type="number" name="quantity" placeholder="Quantity" required />
    <input type="number" name="price" placeholder="Price" step="0.01" required />
    <input type="text" name="supplier_name" placeholder="Supplier" />
    <button type="submit">Add Item</button>
  </form>
</body>
</html>