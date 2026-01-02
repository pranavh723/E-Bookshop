-- PostgreSQL schema for ebookshop (matching original MySQL structure)

-- Table: users
CREATE TABLE IF NOT EXISTS users (
  id SERIAL PRIMARY KEY,
  name VARCHAR(200) NOT NULL,
  contact VARCHAR(30) NOT NULL DEFAULT '',
  email VARCHAR(100) NOT NULL,
  address TEXT NOT NULL DEFAULT '',
  city VARCHAR(100) NOT NULL DEFAULT '',
  password VARCHAR(256) NOT NULL,
  type VARCHAR(1) NOT NULL DEFAULT '0',
  create_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  status VARCHAR(1) NOT NULL DEFAULT '0'
);

-- Table: category
CREATE TABLE IF NOT EXISTS category (
  id SERIAL PRIMARY KEY,
  category VARCHAR(100) NOT NULL,
  description TEXT DEFAULT '',
  tag VARCHAR(100) DEFAULT ''
);

-- Table: books
CREATE TABLE IF NOT EXISTS books (
  id SERIAL PRIMARY KEY,
  book_name VARCHAR(200) NOT NULL,
  description TEXT NOT NULL,
  author VARCHAR(200) NOT NULL,
  publisher VARCHAR(200) NOT NULL,
  price REAL NOT NULL,
  quantity INT NOT NULL,
  "categoryId" INT NOT NULL,
  book_image VARCHAR(500) NOT NULL,
  create_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "userId" INT NOT NULL,
  status VARCHAR(1) NOT NULL DEFAULT '0'
);

-- Table: ebooks
CREATE TABLE IF NOT EXISTS ebooks (
  id SERIAL PRIMARY KEY,
  ebook_name VARCHAR(200) NOT NULL,
  description TEXT NOT NULL,
  author VARCHAR(200) NOT NULL,
  publisher VARCHAR(200) NOT NULL DEFAULT '',
  price REAL NOT NULL DEFAULT 0,
  "categoryId" INT NOT NULL,
  ebook_image VARCHAR(500) NOT NULL DEFAULT '',
  book_file VARCHAR(500) NOT NULL DEFAULT '',
  create_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  status VARCHAR(1) NOT NULL DEFAULT '0'
);

-- Table: cart
CREATE TABLE IF NOT EXISTS cart (
  id SERIAL PRIMARY KEY,
  "userId" INT NOT NULL,
  "bookId" INT NOT NULL,
  price REAL NOT NULL,
  quantity INT NOT NULL,
  total REAL NOT NULL
);

-- Table: orders
CREATE TABLE IF NOT EXISTS orders (
  "orderId" SERIAL PRIMARY KEY,
  "userId" INT NOT NULL,
  "bookId" VARCHAR(500) NOT NULL,
  quantity VARCHAR(200) NOT NULL,
  total_price REAL NOT NULL DEFAULT 0,
  ship_name VARCHAR(200) NOT NULL DEFAULT '',
  address TEXT NOT NULL DEFAULT '',
  city VARCHAR(100) NOT NULL DEFAULT '',
  email VARCHAR(100) NOT NULL DEFAULT '',
  contact VARCHAR(30) NOT NULL DEFAULT '',
  zipcode VARCHAR(20) NOT NULL DEFAULT '',
  paymentcheck VARCHAR(50) NOT NULL DEFAULT '',
  order_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  status VARCHAR(1) NOT NULL DEFAULT '0',
  del_status VARCHAR(1) NOT NULL DEFAULT '0'
);

-- Table: reviews
CREATE TABLE IF NOT EXISTS reviews (
  id SERIAL PRIMARY KEY,
  "userId" INT NOT NULL,
  "bookId" INT NOT NULL,
  review TEXT NOT NULL,
  create_date TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

-- Insert admin user
INSERT INTO users (name, contact, email, address, city, password, type, status)
VALUES ('Admin', '1234567890', 'admin@ebookshop.com', 'Admin Address', 'Admin City', '$2y$12$LQv3c1yqBWVHxkd0LHAkCOYz6TtxMQJqhN8/X4zV6x6xMnU2jGCCu', '1', '1');

-- Insert sample categories
INSERT INTO category (id, category, description, tag) VALUES
(1, 'Computer Science', 'Books related to computer science and programming', 'cse'),
(2, 'Civil Engineering', 'Books related to civil engineering', 'civil'),
(3, 'Mechanical Engineering', 'Books related to mechanical engineering', 'mech'),
(4, 'Electrical Engineering', 'Books related to electrical engineering', 'eee'),
(5, 'Business', 'Books related to business and management', 'business'),
(6, 'Arts', 'Books related to arts and humanities', 'arts'),
(7, 'Science Fiction', 'Science fiction novels', 'scifi'),
(8, 'Fiction', 'Fiction novels and stories', 'fiction'),
(9, 'Security', 'Books related to cybersecurity', 'security');

-- Insert sample books
INSERT INTO books (id, book_name, description, author, publisher, price, quantity, "categoryId", book_image, "userId", status) VALUES
(1, 'PHP and MySQL', 'A comprehensive guide to web development with PHP and MySQL. Learn how to build dynamic websites and web applications.', 'Joel Murach', 'SPD', 450, 6, 1, 'upload/image/book1.jpg', 1, '1'),
(2, 'Building Java Programs', 'Learn Java programming from scratch with practical examples. A step-by-step introduction to programming and problem solving.', 'Stuart Reges', 'Marty Stepp', 300, 8, 1, 'upload/image/book2.jpg', 1, '1'),
(3, 'Operating System', 'Introduction to operating system concepts and design. Covers processes, memory management, file systems, and more.', 'R Sudha', 'AR publication', 185, 6, 1, 'upload/image/book3.jpg', 1, '1'),
(4, 'Cloud Data Management', 'Modern approaches to managing data in the cloud. Learn about distributed systems and cloud computing.', 'Liang Zhao', 'Springer', 320, 10, 1, 'upload/image/book4.jpg', 1, '1'),
(5, 'Learn Python 3 The Hard Way', 'Learn Python by working through 52 brilliantly crafted exercises. Read them. Type their code precisely.', 'Zed A Shaw', 'Unknown', 270, 2, 1, 'upload/image/Python.jpg', 1, '1'),
(6, 'Programming with CodeIgniter MVC', 'Master the CodeIgniter PHP framework with practical examples and hands-on projects.', 'Eli Orr', 'Packt', 222, 9, 1, 'upload/image/lrg.jpg', 1, '1'),
(7, 'CEH Certified Ethical Hacker', 'Prepare for the CEH certification exam with comprehensive coverage of ethical hacking techniques.', 'Matt Walker', 'McGraw-Hill', 527, 5, 9, 'upload/image/ceh.jpg', 1, '1'),
(8, 'Data Structures and Algorithms', 'Solutions to complex data structures and algorithmic problems. A handy guide for computer science professionals.', 'Narasimha Karumanchi', 'Kindle Edition', 200, 8, 1, 'upload/image/Screenshot_119.jpg', 1, '1');

-- Insert sample ebooks
INSERT INTO ebooks (id, ebook_name, description, author, publisher, price, "categoryId", ebook_image, book_file, status) VALUES
(1, 'Introduction to Scientific Programming', 'A beginner-friendly guide to scientific programming concepts.', 'Various Authors', 'Springer', 0, 1, 'upload/image/Python1.jpg', 'upload/file/2020_Book_IntroductionToScientificProgra.pdf', '1'),
(2, 'Think Java', 'How to Think Like a Computer Scientist with Java programming language.', 'Allen Downey', 'Green Tea Press', 0, 1, 'upload/image/Python2.jpg', 'upload/file/Think-Java-How-to-Think-Like-a-Computer-Scientist_(1).pdf', '1'),
(3, 'Distributed and Cloud Computing', 'From Parallel Processing to the Internet of Things. A comprehensive guide.', 'Kai Hwang', 'Morgan Kaufmann', 0, 1, 'upload/image/distri_and_cloud_compu.jpg', 'upload/file/Distributed_and_Cloud_Computing-_From_Parallel_Processing_to_the_Internet_of_Things_-_October_2011_3.pdf', '1');

-- Reset sequence values
SELECT setval('users_id_seq', (SELECT COALESCE(MAX(id), 0) + 1 FROM users), false);
SELECT setval('category_id_seq', (SELECT COALESCE(MAX(id), 0) + 1 FROM category), false);
SELECT setval('books_id_seq', (SELECT COALESCE(MAX(id), 0) + 1 FROM books), false);
SELECT setval('ebooks_id_seq', (SELECT COALESCE(MAX(id), 0) + 1 FROM ebooks), false);
