<?php
// Database connection (replace with your own database credentials)
$conn=mysqli_connect("localhost","root","","db_lms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_POST['type']=="find") {
    // Fetch book titles from the books table
    $filtervalue=$_POST['val'];
    if ($filtervalue=="cat_name"){
        $sql = "SELECT cat_name FROM book_categories";
    }else{
    $sql = "SELECT distinct $filtervalue FROM books";
     }
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output each book title as an option
        while($row = $result->fetch_assoc()) {
            echo '<option value="' . $row[$filtervalue] . '">' . $row[$filtervalue] . '</option>';
        }
    } else {
        echo '<option value="">No record available</option>';
    }

    $conn->close();
}
?>
