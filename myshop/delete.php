<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    $username = "localhost";
    $servername = "root";
    $password = "";
    $database = "myshop";

    // Create connection
    $connection = new mysqli($username, $servername, $password, $database);

    // Check connection
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }

    // Use prepared statement to prevent SQL injection
    $sql = "DELETE FROM clients WHERE id=?";
    $stmt = $connection->prepare($sql);

    if ($stmt) {
        // Bind the parameter
        $stmt->bind_param("i", $id);

        // Execute the statement
        $stmt->execute();

        // Check for errors
        if ($stmt->error) {
            echo "Error: " . $stmt->error;
        } else {
            echo "Record with id=$id deleted successfully.";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $connection->error;
    }

    // Close the connection
    $connection->close();
}
?>
