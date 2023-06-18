var bookId = $_GET['bookId'];

fetch('book-details.php?bookId=' + bookId)
  .then(function(response) {
    return response.json();
  })
  .then(function(data) {
    if (data.error) {
      console.error(data.error);
    } else {
      
      var bookName = data.bookName;
      var bookPrice = data.bookPrice;
      var bookDescription = data.bookDescription;
      var bookImageUrl = data.bookImageUrl;
      var bookImageUrl2 = data.bookImageUrl2;

      console.log(bookName, bookPrice, bookDescription, bookImageUrl, bookImageUrl2);
    }
  })
  .catch(function(error) {
    console.error('Error:', error);
  });