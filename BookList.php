<?php
include "config.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Books list</title>
</head>

<body>
    <h1></h1>
    <h2>Main Page:</h2>
    <main id="dataServices">
        <select id="categoryDropdown">
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
    <script src="incldues/getbookslist.js"></script>
</body>
</html>
