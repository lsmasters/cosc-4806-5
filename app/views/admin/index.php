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
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

  <!-- Navigation Bar -->
  <nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-4 flex justify-between items-center">
      <h1 class="text-xl font-bold text-gray-800">Administrator Dashboard</h1>
      <span class="text-sm text-gray-600">Logged in as: <strong>admin</strong></span>
    </div>
  </nav>

  <!-- Dashboard Content -->
  <div class="container mx-auto p-6 space-y-6">

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
      <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-sm text-gray-500">Active Users</h2>
        <p class="text-2xl font-semibold text-green-600">124</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-sm text-gray-500">Inactive Users</h2>
        <p class="text-2xl font-semibold text-red-600">36</p>
      </div>
      <div class="bg-white p-6 rounded-lg shadow">
        <h2 class="text-sm text-gray-500">New Users (30 Days)</h2>
        <p class="text-2xl font-semibold text-blue-600">18</p>
      </div>
    </div>

    <!-- Logins Per Day Chart -->
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="text-lg font-semibold mb-4">Logins per Day (Last 30 Days)</h2>
      <canvas id="loginsChart" height="100"></canvas>
    </div>

    <!-- Reminders by User -->
    <div class="bg-white p-6 rounded-lg shadow">
      <h2 class="text-lg font-semibold mb-4">Reminders by User</h2>
      <canvas id="remindersChart" height="100"></canvas>
    </div>

  </div>

  <!-- Chart.js Scripts -->
  <script>
    const loginsCtx = document.getElementById('loginsChart').getContext('2d');
    const loginsChart = new Chart(loginsCtx, {
      type: 'line',
      data: {
        labels: [...Array(30).keys()].map(i => `Day ${i+1}`),
        datasets: [{
          label: 'Logins',
          //get data for the last 30 days from file log.log
          data: [12, 9, 15, 18, 10, 6, 13, 17, 21, 10, 9, 14, 20, 16, 22, 23, 21, 18, 17, 19, 20, 21, 22, 23, 19, 20, 18, 16, 14, 17],
          borderColor: 'rgba(59, 130, 246, 1)',
          fill: false,
          tension: 0.3
        }]
      }
    });

    const remindersCtx = document.getElementById('remindersChart').getContext('2d');
    const remindersChart = new Chart(remindersCtx, {
      type: 'bar',
      data: {
        labels: ['User A', 'User B', 'User C', 'User D', 'User E'],
        datasets: [{
          label: 'Reminders',
          data: [22, 34, 17, 9, 13],
          backgroundColor: ['#3b82f6', '#10b981', '#f59e0b', '#ef4444', '#6366f1']
        }]
      }
    });
  </script>

</body>
</html>
