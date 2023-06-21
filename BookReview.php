<?php
include "config.php";
$bookId = $_GET['bookId'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BookPage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
</head>
<body>
    <?php
    $query = "SELECT * FROM tbl_24_books WHERE id = '$bookId'";
    $result = mysqli_query($connection, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $bookName = $row['Name'];
            $bookprice = $row['price'];
            $bookDescription = $row['Description'];
            $bookImageUrl = $row['Image_Url'];
            $bookImageUrl2 = $row['Image_Url2'];
            echo '<h1>Book Details</h1>';
            echo '<div>';
            echo '<br><h3><b>' . $bookName . '</b></h3>';
            echo '<h5>Price: $' . $bookprice . '</h5>';
            echo '<h6>Category: <label id="bookCat"></label></h6>';
            echo '<img src="' . $bookImageUrl . '" alt="Book C">';
            echo '<img src="' . $bookImageUrl2 . '" alt="Book C">';
            echo '<p>' . $bookDescription . '</p>';
            echo '</div>';
        } else {
            echo 'Book not found';
        }
    } else {
        echo 'Error executing the query: ' . mysqli_error($connection);
    }
    ?>
    <script src="includes/bookReview.js"></script>
</body>
</html>

<?php
mysqli_close($connection);
?>