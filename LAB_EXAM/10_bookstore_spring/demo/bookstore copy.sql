CREATE DATABASE bookstore;
Use bookstore;

CREATE TABLE user (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  name TEXT NOT NULL,
  username TEXT NOT NULL UNIQUE,
  password TEXT NOT NULL
);


CREATE TABLE book (
  id INTEGER PRIMARY KEY AUTOINCREMENT,
  book_name TEXT NOT NULL,
  category TEXT,
  price INTEGER NOT NULL,
  description TEXT
);

-- Insert sample data into the user table
INSERT INTO user (name, username, password) VALUES
('sakshee', 'sakshee', 'sakshee'),
('sakshee12', 'sakshee12', 'sakshee1234');

-- Insert sample data into the book table
INSERT INTO book (book_name, category, price, description) VALUES
('Book1', 'Fiction', 20, 'Description for Book1'),
('Book2', 'Non-Fiction', 25, 'Description for Book2'),
('Book3', 'Mystery', 16, 'Description for Book3'),
('Book4', 'Science Fiction', 30, 'Description for Book4'),
('Book5', 'Thriller', 13, 'Description for Book5'),
('Book6', 'Romance', 23, 'Description for Book6'),
('Book7', 'Fantasy', 18, 'Description for Book7'),
('Book8', 'Biography', 33, 'Description for Book8'),
('Book9', 'History', 28, 'Description for Book9'),
('Book10', 'Self-Help', 15, 'Description for Book10');
