<?php
    require "include/connection.php";

if(isset($_POST['query'])){
    $query = $_POST['query'];

    $sql = "SELECT * FROM pasien WHERE nama_pasien LIKE ?";
    $stmt = $db->prepare($sql);
    $search_param = '%' . $query . '%';
    $stmt->bind_param('s', $search_param);
    $stmt->execute();
    $result = $stmt->get_result();

    // Display results
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div><button class='btn btn-sm' type='button' style='background-color: #169859;color: white;'><a href='index.php' style='text-decoration: none; color: inherit;'>" . $row["nama_pasien"] . "</a></button></div>";
        }    
    } else {
        echo "<p>No results found</p>";
    }
    $stmt->close();
}

$db->close(); // Close the database connection
?>
