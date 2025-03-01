<?php 
include("connect.php");

// search input
$name = isset($_POST['name']) ? mysqli_real_escape_string($conn, $_POST['name']) : '';

if (!empty($name)) {
    // Search db using CONCAT and LIKE
    $sql = "SELECT * FROM products WHERE 
            CONCAT( product_id, ' ', name, ' ', price, ' ', image, ' ') LIKE '%$name%'";

    $query = mysqli_query($conn, $sql);

    if (!$query) {
        echo "<tr><td colspan='3'>Error: " . mysqli_error($conn) . "</td></tr>";
        exit;
    }

    $data = '';
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            $data .= "<tr>";
            $data .= "<td>" . htmlspecialchars($row['product_id']) . "</td>";
            $data .= "<td><img src='images/" . htmlspecialchars($row['image']) . "' alt='" . htmlspecialchars($row['name']) . "' class='img-fluid' width='100'></td>";
            $data .= "<td>" . htmlspecialchars($row['name']) . "</td>";
            $data .= "<td>" . htmlspecialchars($row['price']) . "</td>";
            $data .= "</tr>";
        }
    } else {
        $data = "<tr><td colspan='3'>No results found.</td></tr>";
    }

    echo $data;
} else {
    echo "<tr><td colspan='3'>Please enter a search term.</td></tr>";
}
?>
