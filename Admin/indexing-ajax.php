<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "db_lms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if AJAX sent a table request
if ($_POST['type'] == "tables") {
    $table = $_POST['val'];

    // Escape table name to prevent SQL injection (basic safety)
    $table = mysqli_real_escape_string($conn, $table);

    // Get all columns of selected table
    $sql = "SHOW COLUMNS FROM `$table`";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<option value="">--Select Column--</option>';
        while ($row = $result->fetch_assoc()) {
            $columnName = $row['Field'];
            echo "<option value='$columnName'>$columnName</option>";
        }
    } else {
        echo '<option value="">No columns found</option>';
    }

    $conn->close();
}

?>
