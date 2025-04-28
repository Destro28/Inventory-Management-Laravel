<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Dashboard - Inventory System</title>
  <link rel="stylesheet" href="<?php echo asset('css/style2.css')?>" />
</head>
<body>

  <!-- Navigation Bar (Same as all other pages) -->
  <x-navbar />



<div class="container">
  <h2>Welcome to the Dashboard</h2>

  <div class="dashboard-cards" style="display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2rem;">
    <div class="card">Total Stock: {{ $totalStock }}</div>
    <div class="card">Out of Stock Items: {{ $outOfStock }}</div>
    <div class="card">Categories: {{ $categories }}</div>
    <div class="card">Suppliers: {{ $suppliers }}</div>
  </div>

  <div class="card" style="margin-bottom: 2rem;">
    <h3>Most Stocked Items</h3>
    <ul>
      @foreach($topStockedItems as $item)
        <li>{{ $item->item_name }} (Qty: {{ $item->quantity }})</li>
      @endforeach
    </ul>
  </div>

  <div class="card">
    <h3>Stock Distribution</h3>
    <canvas id="stockChart"></canvas>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const ctx = document.getElementById('stockChart').getContext('2d');
  const stockChart = new Chart(ctx, {
    type: 'bar',
    data: {
      labels: {!! json_encode($chartLabels) !!},
      datasets: [{
        label: 'Stock Quantity',
        data: {!! json_encode($chartData) !!},
        backgroundColor: 'rgba(54, 162, 235, 0.6)',
        borderColor: 'rgba(54, 162, 235, 1)',
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>


</body>
</html>
