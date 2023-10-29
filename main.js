const express = require('express');
const ejs = require('ejs');
const path = require('path');
const app = express();
const port = process.env.PORT || 3000;

// Middlewares
app.use(express.urlencoded({ extended: false }));
app.use(express.json());
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));
app.use(express.static(path.join(__dirname )));

// Routes
app.get('/', (req, res) => {
  // Serve the "index.html" file from the root directory
  res.sendFile(path.join(__dirname, 'index.html'));
});


app.get('/home', (req, res) => {
  const activePage = 'home';
  res.render('pages/home', { activePage });
});

app.get('/books', (req, res) => {
  const activePage = 'books';
  res.render('pages/books', { activePage });
});

app.get('/donation', (req, res) => {
  const activePage = 'donation';
  res.render('pages/donation', { activePage });
});

// Server
app.listen(port, () => {
  console.log(`Server running on port ${port}`);
  console.log(`To display the page go to http://localhost:${port}`);
});





