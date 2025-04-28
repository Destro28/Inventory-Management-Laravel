<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Suppliers - InvenTrack</title>
  <link rel="stylesheet" href="<?php echo asset('css/style2.css')?>" />
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

    form {
      margin-bottom: 30px;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }

    form input, form select, form button {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border-radius: 4px;
      border: 1px solid #ccc;
      font-size: 14px;
    }

    form button {
      background-color: #007bff;
      color: white;
      font-weight: bold;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    form button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <x-navbar />

  <div class="container">
    <h2 class="page-titles">Manage Suppliers</h2>

    <!-- Add Supplier Form -->
    <form>
      <input type="text" placeholder="Supplier Name" required />
      <input type="text" placeholder="Contact Email" required />
      <input type="text" placeholder="Category Supplied (e.g. Electronics, Stationery)" required />
      <button type="submit">Add Supplier</button>
    </form>

    <!-- Search -->
    <input type="text" placeholder="Search suppliers..." class="search-box" />

    <!-- Suppliers Table -->
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Supplier Name</th>
            <th>Contact</th>
            <th>Category</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Campus Supplies Co.</td>
            <td>campus@example.com</td>
            <td>Stationery</td>
            <td class="actions-cell">
              <a href="#" class="btn-edit">Edit</a>
              <a href="#" class="btn-delete">Delete</a>
            </td>
          </tr>
          <tr>
            <td>Alpha Traders</td>
            <td>alpha.traders@bizmail.com</td>
            <td>Electronics</td>
            <td class="actions-cell">
              <a href="#" class="btn-edit">Edit</a>
              <a href="#" class="btn-delete">Delete</a>
            </td>
          </tr>
          <tr>
            <td>Clean & Fresh Ltd.</td>
            <td>cleanfresh@services.com</td>
            <td>Cleaning Supplies</td>
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
