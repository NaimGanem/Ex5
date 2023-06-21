<?php
include "config.php";
?>

<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/style.css">
    <title>Books list</title>
</head>

<body>
    <h1></h1>
    <h2>Main Page:</h2>
    <main id="dataServices">
        <select id="categoryDropdown" class="form-select">
            <option value="">All Categories</option>
			<option value="Ninja">Ninja</option>
			<option value="Action">Action</option>
			<option value="Magic">Magic</option>
			<option value="Pirates">Pirates</option>
        </select>
        <?php
        $query = "SELECT * FROM tbl_24_books";
        $result = mysqli_query($connection, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $bookId = $row['Id'];
            $bookName = $row['Name'];
            $bookPrice = $row['price'];
            $bookDescription = $row['Description'];
            $bookImageUrl = $row['Image_Url'];
            $bookImageUrl2 = $row['Image_Url2'];
            $bookCategory = $row['Category'];
        
            echo '<div class="book" data-category="' . $bookCategory . '">';
            echo '<a href="BookReview.php?bookId=' . $bookId . '">';
            echo '<h3>' . $bookName . ' - $' . $bookPrice . '</h3>';
            echo '<img src="' . $bookImageUrl . '" alt="Book Cover">';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </main>
    <script src="includes/getbookslist.js"></script>
</body>
</html>
<?php
mysqli_close($connection);
?>
