-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 06:36 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(20) NOT NULL,
  `book_title` varchar(255) NOT NULL,
  `book_author` varchar(255) NOT NULL,
  `book_isbn` varchar(255) NOT NULL,
  `book_publisher` varchar(255) NOT NULL,
  `book_pb_year` varchar(255) NOT NULL,
  `book_cover` varchar(255) NOT NULL,
  `book_category` int(11) NOT NULL,
  `book_language` varchar(255) NOT NULL,
  `book_desc` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_title`, `book_author`, `book_isbn`, `book_publisher`, `book_pb_year`, `book_cover`, `book_category`, `book_language`, `book_desc`, `status`, `added_by`, `created_at`) VALUES
(1, 'Database', 'Charlis audin', 'DB1122CMP', 'Abraham Mashlow', '2034', 'Design-Quote-Number-32_1650536074392_resize.jpg', 1, 'English', 'The Database Book is an essential resource for students, professionals, and enthusiasts who want to understand database systems, their architecture, and practical implementation. This book covers relational databases, NoSQL, database design, normalization, indexing, transactions, and query optimization in detail. It provides hands-on experience with SQL, MySQL, PostgreSQL, MongoDB, and other modern database technologies to help readers build efficient, scalable, and secure databases.\r\n\r\nKey Topics Covered:\r\n✔ Introduction to Databases – Understanding databases, their importance, and different types (Relational, NoSQL, Cloud-based).\r\n✔ SQL Fundamentals – Learn SQL queries, table creation, relationships, joins, and constraints.\r\n✔ Database Design Principles – Understand normalization, entity-relationship (ER) modeling, and best practices.\r\n✔ Indexing & Performance Optimization – Speed up queries using indexing techniques like B-Trees and Hash Indexing.\r\n✔ Transactions & Concurrency Control – ACID properties, locks, and deadlocks explained.\r\n✔ Big Data & NoSQL Databases – MongoDB, Cassandra, Redis, and their use cases.\r\n✔ Cloud Databases – Learn about Amazon RDS, Firebase, and other cloud-based solutions.\r\n✔ Database Security & Administration – Best practices for backup, recovery, user management, and security.', 'available', 'Admin', '2025-04-05 06:05:53'),
(2, 'Mechanics', 'Gurza jildin', 'MEC5487PHY', 'Einubain badin', '2023', 'Design-Quote-Number-1_1650530875431_resize (1).jpg', 2, 'English', 'The Mechanics Book is a fundamental resource for students and enthusiasts seeking a solid understanding of classical physics, especially in the domain of mechanics. This book explores the physical laws that govern motion and force—from basic kinematics to complex systems involving energy, momentum, and rotational dynamics.\r\n\r\nWritten in clear and engaging language, it balances theoretical concepts with real-world examples, solved problems, and visual illustrations to ensure comprehensive learning for high school, college, and university-level students.\r\n\r\nKey Topics Covered:\r\n✔ Kinematics – Study of motion in one, two, and three dimensions without reference to forces.\r\n✔ Laws of Motion – Detailed understanding of Newton’s three laws and their applications.\r\n✔ Work, Energy & Power – Concepts of kinetic and potential energy, conservation laws, and energy transfer.\r\n✔ Momentum & Collisions – Linear momentum, impulse, and both elastic and inelastic collisions.\r\n✔ Circular Motion – Uniform circular motion, centripetal force, and banking of roads.\r\n✔ Rotational Mechanics – Torque, angular momentum, moment of inertia, and dynamics of rotational motion.\r\n✔ Gravitation – Newton’s Law of Gravitation, satellite motion, and orbital mechanics.\r\n✔ Equilibrium & Elasticity – Conditions for static equilibrium, center of mass, and applications in engineering.\r\n✔ Fluids & Pressure – Mechanics of fluids, Pascal’s law, buoyancy, and Bernoulli’s principle.', 'requested', 'Admin', '2025-04-18 08:21:11'),
(4, 'Discrete Mathematics', 'Chapman Mitchel', 'DIS564MATH', 'Johar guldin', '2029', '1551645607264.jfif', 3, 'English', 'Math Book Description – “Fundamentals of Mathematics Fundamentals of Mathematics\" is a comprehensive book designed for students and enthusiasts seeking a strong foundation in core mathematical concepts. Covering topics such as algebra, geometry, trigonometry, and basic calculus, this book provides clear explanations, solved examples, and practice problems to enhance understanding and improve problem-solving skills. Whether you re preparing for exams or building essential math knowledge, this book is an ideal companion for learners at any level.', 'available', 'Admin', '2025-04-18 07:22:26'),
(5, 'Mr.Chips', 'James Hilton', 'ENG7734CH', 'Katherine', '2000', 'banner.jpeg', 4, 'English', 'Book Title: Goodbye, Mr. Chips\r\nAuthor: James Hilton\r\nGenre: Historical Fiction / Drama\r\n\r\nDescription:\r\n\r\nGoodbye, Mr. Chips is a heartwarming and nostalgic tale about a gentle and beloved schoolteacher, Mr. Chipping—affectionately known as \"Mr. Chips\"—whose quiet life at the fictional Brookfield School leaves a lasting impact on generations of students.\r\n\r\nSet in England and spanning the late 19th and early 20th centuries, the story traces Mr. Chips’s journey from a shy young teacher to a wise and humorous old man cherished by all. Through changing times, world wars, and the evolving world of education, Mr. Chips remains a symbol of kindness, tradition, and the enduring power of a teacher’s influence.\r\n\r\nFilled with moments of joy, loss, and inspiration, this classic novel celebrates the simple but profound difference one person can make in the lives of others. It is a touching tribute to the spirit of teaching and the quiet heroes who shape young minds.', 'available', 'Admin', '2025-04-20 10:15:15'),
(6, 'database Administration', ' Joe Reis ', '1098108302', ' Matt Housley', '1997', '2063172.jpg', 1, 'English', 'A thorough reference on database administration outlines a variety of DBA roles and responsibilities and discusses such topics as data modeling and normalization, database/application design, change management, database security and data integrity, performance issues, disaster planning, and other essentials. Original. (Advanced)', 'available', 'Admin', '2025-04-22 03:45:25'),
(7, 'Fundamentals of Data Engineering: Plan and Build Robust Data Systems', 'Matt Housley', '1098108302', ' Joe Reis', '1990', '81+oMD7Lm7L._SL1500_.jpg', 1, '', 'Data engineering has grown rapidly in the past decade, leaving many software engineers, data scientists, and analysts looking for a comprehensive view of this practice. With this practical book, youll learn how to plan and build systems to serve the needs of your organization and customers by evaluating the best technologies available through the framework of the data engineering lifecycle.\r\n\r\nAuthors Joe Reis and Matt Housley walk you through the data engineering lifecycle and show you how to stitch together a variety of cloud technologies to serve the needs of downstream data consumers. Youll understand how to apply the concepts of data generation, ingestion, orchestration, transformation, storage, and governance that are critical in any data environment regardless of the underlying technology.', 'available', 'Admin', '2025-04-22 03:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `book_categories`
--

CREATE TABLE `book_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `book_categories`
--

INSERT INTO `book_categories` (`cat_id`, `cat_name`, `created_at`) VALUES
(1, 'Computer Science', '2025-04-03 18:00:45'),
(2, 'Physics', '2025-04-03 18:07:12'),
(3, 'Mathematics', '2025-04-05 06:33:46'),
(4, 'English', '2025-04-05 06:33:56');

-- --------------------------------------------------------

--
-- Table structure for table `borrowed_books`
--

CREATE TABLE `borrowed_books` (
  `id` int(11) NOT NULL,
  `book_id` int(11) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `borrow_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `notes` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Requested'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `borrowed_books`
--

INSERT INTO `borrowed_books` (`id`, `book_id`, `member_id`, `name`, `email`, `borrow_date`, `return_date`, `notes`, `status`) VALUES
(1, 4, 1, 'Shahwar', 'shahwar@gmail.com', '2025-04-05', '2025-04-12', '', 'returned'),
(2, 5, 1, 'Shahwar', 'shahwar@gmail.com', '2025-04-18', '2025-04-28', '', 'returned'),
(3, 2, 1, 'Shahwar', 'shahwar@gmail.com', '2025-04-18', '2025-04-28', '', 'Requested'),
(5, 5, 9, 'test', 'test@gmail.com', '2025-04-20', '2025-04-30', '', 'returned');

-- --------------------------------------------------------

--

-- --------------------------------------------------------

--
-- Table structure for table `returned_books`
--

CREATE TABLE `returned_books` (
  `ret_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `borrow_date` varchar(255) NOT NULL,
  `returned_date` varchar(255) NOT NULL,
  `actual_return` varchar(255) NOT NULL,
  `fine_amount` decimal(11,0) NOT NULL,
  `notes` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `returned_books`
--

INSERT INTO `returned_books` (`ret_id`, `book_id`, `member_id`, `borrow_date`, `returned_date`, `actual_return`, `fine_amount`, `notes`, `created_at`) VALUES
(1, 4, 1, '2025-04-05', '2025-04-12', '2025-04-18', 0, '', '2025-04-18 07:22:26'),
(3, 5, 1, '2025-04-18', '2025-04-28', '2025-04-18', 0, '', '2025-04-18 08:23:09'),
(5, 5, 9, '2025-04-20', '2025-04-03', '2025-04-20', 100, '', '2025-04-20 10:15:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(20) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_profile` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_profile`, `user_password`, `user_role`, `created_at`) VALUES
(1, 'Shahwar', 'shahwar@gmail.com', 'trainer-2.jpg', 'shahwar123', 'Member', '2025-04-22 05:34:04'),
(2, 'Zeeb', 'zeeb@gmail.com', 'trainer-2.jpg', 'zeeb123', 'Admin', '2025-04-18 18:48:20'),
(3, 'Ahsan', 'ahsan@gmail.com', 'trainer-3.jpg', 'ahsan', 'Librarian', '2025-04-20 09:34:58'),
(4, 'Iram', 'iram@gmail.com', 'trainer-2-2.jpg', 'iram123', 'Librarian', '2025-04-06 07:59:35'),
(7, 'Kiran', 'kiran@gmail.com', '', 'kiran123', 'Member', '2025-04-20 09:11:04'),
(9, 'test', 'test@gmail.com', 'images.jpg', 'test123', 'Member', '2025-04-20 09:31:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`),
  ADD KEY `book_category` (`book_category`);

--
-- Indexes for table `book_categories`
--
ALTER TABLE `book_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `borrowed_books_ibfk_1` (`member_id`);

--
-- Indexes for table `lms_admin`
--
ALTER TABLE `lms_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returned_books`
--
ALTER TABLE `returned_books`
  ADD PRIMARY KEY (`ret_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `returned_books_ibfk_1` (`member_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `book_categories`
--
ALTER TABLE `book_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lms_admin`
--
ALTER TABLE `lms_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `returned_books`
--
ALTER TABLE `returned_books`
  MODIFY `ret_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`book_category`) REFERENCES `book_categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `borrowed_books`
--
ALTER TABLE `borrowed_books`
  ADD CONSTRAINT `borrowed_books_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `returned_books`
--
ALTER TABLE `returned_books`
  ADD CONSTRAINT `returned_books_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
