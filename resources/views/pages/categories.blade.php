<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Categories - InvenTrack</title>
  <link rel="stylesheet" href="<?php echo asset('css/style2.css')?>" />
  <style>
    .search-box {
      width: 100%;
      max-width: 400px;
      padding: 10px;
      margin: 20px auto;
      display: block;
      border: 1px solid #ccc;
      border-radius: 4px;
    }

    .table-container {
      max-width: 900px;
      margin: auto;
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
  </style>
</head>
<body>

  <!-- Navbar -->
  <x-navbar />

  <div class="container">
    <h2 class="page-title">Manage Categories</h2>

    <!-- Add Category Form -->
    <form>
      <input type="text" placeholder="New Category Name" required />
      <button type="submit">Add Category</button>
    </form>

    <!-- Search -->
    <input type="text" placeholder="Search categories..." class="search-box" />

    <!-- Categories Table -->
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Category</th>
            <th>Description</th>
            <th>Items</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Stationery</td>
            <td>Office supplies like pens, notebooks, paper</td>
            <td>24</td>
            <td class="actions-cell">
              <a href="#" class="btn-edit">Edit</a>
              <a href="#" class="btn-delete">Delete</a>
            </td>
          </tr>
          <tr>
            <td>Electronics</td>
            <td>Devices like laptops, projectors, chargers</td>
            <td>14</td>
            <td class="actions-cell">
              <a href="#" class="btn-edit">Edit</a>
              <a href="#" class="btn-delete">Delete</a>
            </td>
          </tr>
          <tr>
            <td>Furniture</td>
            <td>Desks, chairs, cabinets and storage units</td>
            <td>9</td>
            <td class="actions-cell">
              <a href="#" class="btn-edit">Edit</a>
              <a href="#" class="btn-delete">Delete</a>
            </td>
          </tr>
          <tr>
            <td>Cleaning Supplies</td>
            <td>Cleaning agents, mops, brushes, gloves</td>
            <td>7</td>
            <td class="actions-cell">
              <a href="#" class="btn-edit">Edit</a>
              <a href="#" class="btn-delete">Delete</a>
            </td>
          </tr>
          <tr>
            <td>Medical Supplies</td>
            <td>First aid kits, masks, gloves, sanitizers</td>
            <td>11</td>
            <td class="actions-cell">
              <a href="#" class="btn-edit">Edit</a>
              <a href="#" class="btn-delete">Delete</a>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

</body>
</html>

