<?php
include "config.php";

if (isset($_GET['bookId'])) {
    $bookId = $_GET['bookId'];

    $jsonData = file_get_contents('data/books.json');

    $bookData = json_decode($jsonData, true);

    $category = '';
    foreach ($bookData['Bookcategory'] as $bookCategory) {
        if ($bookCategory['id'] == $bookId) {
            $category = $bookCategory['category'];
            break;
        }
    }

    $query = "SELECT * FROM tbl_24_books WHERE id = '$bookId'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);

            $bookName = $row['Name'];
            $bookPrice = $row['price'];
            $bookDescription = $row['Description'];
            $bookImageUrl = $row['Image_Url'];

            echo '<h1>Book Details</h1>';
            echo '<div>';
            echo '<h3>' . $bookName . ' - $' . $bookPrice . '</h3>';
            echo '<p>Category: ' . $category . '</p>';
            echo '<img src="' . $bookImageUrl . '" alt="Book Cover">';
            echo '<p>' . $bookDescription . '</p>';
            echo '</div>';
        } else {
            echo 'Book not found';
        }
    } else {
        echo 'Error executing the query: ' . mysqli_error($connection);
    }
} else {
    echo 'Invalid bookId';
}
?>
