<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Inventory - InvenTrack</title>
  <link rel="stylesheet" href="<?php echo asset('css/style2.css')?>" >
  <style>
    .container {
      max-width: 1000px;
      margin: 30px auto;
      padding: 0 20px;
    }

    h2 {
      text-align: center;
      margin-bottom: 20px;
    }

    .search-filter-group {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      gap: 10px;
      margin-bottom: 20px;
    }

    .search-box, .filter-select {
      padding: 10px;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 14px;
      flex: 1;
      min-width: 200px;
    }

    .table-container {
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background-color: white;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    }

    table th, table td {
      padding: 10px 12px;
      text-align: left;
      border-bottom: 1px solid #e0e0e0;
      font-size: 14px;
    }

    table th {
      background-color: #007bff;
      color: white;
    }

    table tr:hover {
      background-color: #f9f9f9;
    }

    .actions-cell {
      white-space: nowrap;
      width: 1%;
    }

    .btn-edit, .btn-delete {
      display: inline-block;
      padding: 6px 12px;
      font-size: 13px;
      border-radius: 4px;
      text-decoration: none;
      margin-right: 6px;
      transition: all 0.3s ease;
    }

    .btn-edit {
      background-color: #17a2b8;
      color: white;
    }

    .btn-edit:hover {
      background-color: #138496;
    }

    .btn-delete {
      background-color: #dc3545;
      color: white;
    }

    .btn-delete:hover {
      background-color: #c82333;
    }

    .status {
      padding: 5px 10px;
      border-radius: 4px;
      color: white;
      font-size: 12px;
      font-weight: 600;
      display: inline-block;
    }

    .in-stock { background-color: #28a745; }
    .low-stock { background-color: #ffc107; color: #333; }
    .out-of-stock { background-color: #dc3545; }
  </style>
</head>
<body>

  <!-- Navbar -->
  <x-navbar />



<div class="container">
    <h1>Inventory List</h1>

 


<div class="container">

  <!-- Search & Filters -->
  <form method="GET" action="{{ route('inventory') }}" class="search-filter-group">
    <input 
      type="text" 
      name="search" 
      class="search-box" 
      placeholder="Search items..." 
      value="{{ request('search') }}"
    />

    <select name="category" class="filter-select">
      <option value="">All Categories</option>
      @foreach($categories as $cat)
        <option 
          value="{{ $cat }}" 
          {{ request('category') == $cat ? 'selected' : '' }}
        >{{ $cat }}</option>
      @endforeach
    </select>

    <select name="status" class="filter-select">
      <option value="">All Status</option>
      @foreach($statuses as $stat)
        <option 
          value="{{ $stat }}" 
          {{ request('status') == $stat ? 'selected' : '' }}
        >{{ $stat }}</option>
      @endforeach
    </select>

    <button type="submit" class="btn">Filter</button>
  </form>

  <!-- Table -->
  <div class="table-container">
    <table>
      <thead>
        <tr>
          <th>Item Name</th>
          <th>Category</th>
          <th>Quantity</th>
          <th>Price</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($inventories as $inventory)
          <tr>
            <td>{{ $inventory->item_name }}</td>
            <td>{{ $inventory->category }}</td>
            <td>{{ $inventory->quantity }}</td>
            <td>${{ number_format($inventory->price, 2) }}</td>
            <td>
              <span class="status 
                {{ $inventory->quantity == 0    ? 'out-of-stock' 
                 : ($inventory->quantity < 20   ? 'low-stock' 
                                                 : 'in-stock') 
                }}">
                {{ $inventory->status }}
              </span>
            </td>
            <td class="actions-cell">
              <a href="#" class="btn-delete">Delete</a>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="6" class="text-center">No items found.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

</div>


</body>
</html>
