<!DOCTYPE html>
<html>
<head>
  <title>Revenue Dashboard</title>
  <style>
    table {
      border-collapse: collapse;
      width: 100%;
    }

    th, td {
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }
  </style>
</head>
<body>
  <h1>Revenue Dashboard</h1>
  <table>
    <tr>
      <th>Category</th>
      <th>Revenue</th>
    </tr>
    <?php
    $conn = new mysqli('localhost', 'root', '', 'flightbookingdb');
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $layover_revenue = 0;
    $flight_revenue = 0;
    $meal_revenue = 0;
    $total_revenue = 0;

    // Retrieve layover revenue
    $layover_sql = "SELECT SUM(service_cost) AS layover_revenue FROM layover_services";
    $layover_result = $conn->query($layover_sql);
    if ($layover_result->num_rows > 0) {
      $layover_row = $layover_result->fetch_assoc();
      $layover_revenue = $layover_row["layover_revenue"];
    }

    // Retrieve flight revenue
    $flight_sql = "SELECT SUM(price) AS flight_revenue FROM flight3";
    $flight_result = $conn->query($flight_sql);
    if ($flight_result->num_rows > 0) {
      $flight_row = $flight_result->fetch_assoc();
      $flight_revenue = $flight_row["flight_revenue"];
    }

    // Retrieve meal revenue
    $meal_sql = "SELECT SUM(totalPrice) AS meal_revenue FROM meal2";
    $meal_result = $conn->query($meal_sql);
    if ($meal_result->num_rows > 0) {
      $meal_row = $meal_result->fetch_assoc();
      $meal_revenue = $meal_row["meal_revenue"];
    }

    // Calculate total revenue
    $total_revenue = $layover_revenue + $flight_revenue + $meal_revenue;

    // Display revenue information
    echo "<tr><td>Layover Revenue</td><td>$layover_revenue</td></tr>";
    echo "<tr><td>Flight Revenue</td><td>$flight_revenue</td></tr>";
    echo "<tr><td>Meal Revenue</td><td>$meal_revenue</td></tr>";
    echo "<tr><td>Total Revenue</td><td>$total_revenue</td></tr>";

    $conn->close();
    ?>
  </table>
</body>
</html>
