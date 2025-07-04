<?php
// Step 1: Parse logins.log to get last successful login per user
$logFile = 'logins.log';
$userLastLogin = [];

if (file_exists($logFile)) {
    $lines = file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $line) {
        if (preg_match('/^(\d{4}-\d{2}-\d{2}) \d{2}:\d{2}:\d{2} - (\w+) - SUCCESS$/', $line, $matches)) {
            $date = $matches[1];
            $user = $matches[2];
            if (!isset($userLastLogin[$user]) || $date > $userLastLogin[$user]) {
                $userLastLogin[$user] = $date;
            }
        }
    }
}

ksort($userLastLogin); // Sort users alphabetically
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Last User Logins</title>
  <style>
    body { font-family: Arial, sans-serif; padding: 20px; }
    table { border-collapse: collapse; width: 50%; margin-top: 20px; }
    th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    th { background-color: #f0f0f0; }
  </style>
</head>
<body>
  <h1>Last Successful Login per User</h1>

  <table>
    <thead>
      <tr>
        <th>Username</th>
        <th>Last Login Date</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($userLastLogin as $username => $date): ?>
        <tr>
          <td><?= htmlspecialchars($username) ?></td>
          <td><?= htmlspecialchars($date) ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>
</html>