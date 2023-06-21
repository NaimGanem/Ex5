function getBookId(){
  var aKeyValue = window.location.search.substring(1).split("&");
  var bookId = aKeyValue[0].split("=")[1];
  return bookId;
}

function showCat(data) {
  var selectedBookId = getBookId();
  var bookCat = "";

  for (var i = 0; i < data.Bookcategory.length; i++) {
    var bookObj = data.Bookcategory[i];

    if (bookObj.id == selectedBookId) {
      bookCat = bookObj.category;
      break;
    }
  }
  document.querySelector("#bookCat").innerHTML = bookCat;
}


fetch("data/books.json")
  .then(response => response.json())
  .then(data => showCat(data));
