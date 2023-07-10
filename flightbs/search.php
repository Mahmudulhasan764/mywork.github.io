<?php
if(isset($_POST['flightId'])) {
    $flightId = $_POST['flightId'];

    // Database connection
    $conn = new mysqli('localhost','root','','flightbookingdb');
    if($conn->connect_error){
        echo "$conn->connect_error";
        die("Connection Failed: ". $conn->connect_error);
    } else {
        $stmt = $conn->prepare("SELECT * FROM flight WHERE flightId = ?");
        $stmt->bind_param("i", $flightId);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Display flight details
            echo "<h2>Flight Details:</h2>";
            echo "<table>";
            echo "<tr><th>Flight ID</th><th>Departure</th><th>Destination</th><th>Departure Date</th><th>Price</th></tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['flightId']."</td>";
                echo "<td>".$row['departure']."</td>";
                echo "<td>".$row['destination']."</td>";
                echo "<td>".$row['departuredate']."</td>";
                echo "<td>".$row['price']."</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No flight found with the given ID.";
        }

        $stmt->close();
        $conn->close();
    }
}
?>
