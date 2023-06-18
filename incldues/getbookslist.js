  
  const categoryDropdown = document.getElementById('categoryDropdown');
  const bookList = document.getElementById('dataServices');

  
  categoryDropdown.addEventListener('change', function() {
      const selectedCategory = categoryDropdown.value;
      filterBooks(selectedCategory);
  });

  
  function filterBooks(category) {
      
      const books = document.getElementsByClassName('book');

      for (let i = 0; i < books.length; i++) {
          const book = books[i];
          const bookCategory = book.dataset.category;

          if (category === '' || bookCategory === category) {
              book.style.display = 'block';
          } else {
              book.style.display = 'none';
          }
      }
  }