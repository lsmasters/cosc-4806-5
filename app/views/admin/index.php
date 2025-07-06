<?php require_once 'app/views/templates/headerAdmin.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin Dashboard</title>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 text-sm">

  <!-- Top Bar -->
  <nav class="bg-white shadow px-4 py-2 flex justify-between items-center">
    <h1 class="text-base font-bold text-gray-800">Admin Dashboard</h1>
    <span class="text-xs text-gray-600">Logged in as: <strong>admin</strong></span>
  </nav>

  <div class="p-4 space-y-2">

    <!-- Summary Cards -->
    <div class="grid grid-cols-3 gap-2">
      <div class="bg-white p-3 rounded shadow text-center">
        <h2 class="text-xs text-gray-500">Active</h2>
        <p class="text-xl font-bold text-green-600">124</p>
      </div>
      <div class="bg-white p-3 rounded shadow text-center">
        <h2 class="text-xs text-gray-500">Inactive</h2>
        <p class="text-xl font-bold text-red-600">36</p>
      </div>
      <div class="bg-white p-3 rounded shadow text-center">
        <h2 class="text-xs text-gray-500">New (30d)</h2>
        <p class="text-xl font-bold text-blue-600">18</p>
      </div>
    </div>

    <!-- Charts Row -->
    <div class="grid grid-cols-2 gap-2">
      <div class="bg-white p-3 rounded shadow">
        <h2 class="text-sm font-semibold mb-1">Logins (30d)</h2>
        <canvas id="loginsChart" height="80"></canvas>
      </div>
      <div class="bg-white p-3 rounded shadow">
        <h2 class="text-sm font-semibold mb-1">Reminders/User</h2>
        <canvas id="remindersChart" height="80"></canvas>
      </div>
    </div>

  </div>

  <!-- Chart Scripts -->
  <script>
    const loginsCtx = document.getElementById('loginsChart').getContext('2d');
    new Chart(loginsCtx, {
      type: 'line',
      data: {
        labels: [...Array(30).keys()].map(i => `D${i+1}`),
        datasets: [{
          label: 'Logins',
          data: [12, 9, 15, 18, 10, 6, 13, 17, 21, 10, 9, 14, 20, 16, 22, 23, 21, 18, 17, 19, 20, 21, 22, 23, 19, 20, 18, 16, 14, 17],
          borderColor: 'rgba(59,130,246,1)',
          fill: false,
          tension: 0.3,
          pointRadius: 0
        }]
      },
      options: { plugins: { legend: { display: false } }, scales: { x: { display: false }, y: { display: false } } }
    });

    const remindersCtx = document.getElementById('remindersChart').getContext('2d');
    new Chart(remindersCtx, {
      type: 'bar',
      data: {
        labels: ['A', 'B', 'C', 'D', 'E'],
        datasets: [{
          label: 'Reminders',
          data: [22, 34, 17, 9, 13],
          backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#6366f1']
        }]
      },
      options: { plugins: { legend: { display: false } }, scales: { x: { display: false }, y: { display: false } } }
    });
  </script>

</body>
</html>
