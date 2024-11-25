-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 05, 2024 at 01:03 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codembsc_attedance`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `department` varchar(50) NOT NULL,
  `year` varchar(10) NOT NULL,
  `sect` varchar(230) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `addedbyno` int(255) NOT NULL,
  `status` varchar(230) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `subject`, `department`, `year`, `sect`, `date`, `time`, `addedbyno`, `status`) VALUES
(1, 'Python', 'CSE', '2', '', '2024-02-02', '22:14:02', 10, 'inactive'),
(2, 'Python-2', 'IT', '2', '', '2024-02-02', '22:14:02', 10, 'inactive'),
(3, 'salesforce', 'IT', '1', '', '2024-02-26', '22:14:02', 10, 'inactive'),
(4, 'java internship', 'IT', '1', '', '2024-02-26', '22:14:02', 10, 'inactive'),
(5, 'Operating System ', 'IT', '2', '', '2024-02-26', '22:14:02', 10, 'inactive'),
(6, 'Operating System ', 'IT', '2', '', '2024-02-26', '22:14:02', 10, 'inactive'),
(7, 'DAA', 'IT', '3', '', '2024-02-26', '22:14:02', 0, 'inactive'),
(8, 'EPM', 'IT', '4', '', '2024-02-26', '22:14:02', 0, 'inactive'),
(9, 'Operating System ', 'IT', '2', '', '2024-02-26', '22:14:02', 0, 'inactive'),
(10, 'EPM', 'IT', '4', '', '2024-03-05', '22:14:02', 0, 'inactive'),
(11, 'EPM', 'IT', '4', '', '2024-03-06', '22:14:02', 0, 'inactive'),
(12, 'EPM', 'IT', '4', '', '2024-03-19', '22:14:02', 0, 'active'),
(13, 'trail', 'IT', '1', 'A', '2024-03-21', '22:14:02', 0, 'active'),
(14, 'English', 'IT', '1', 'A', '2024-03-23', '22:14:02', 0, 'active'),
(15, 'Math', 'IT', '1', 'A', '2024-03-23', '22:14:02', 10, 'active'),
(16, 'HIndi', 'Computer Science & Engineering', '2', 'B', '2024-03-28', '00:00:00', 10, 'inactive'),
(17, 'HIndi', 'Computer Science & Engineering', '2', 'B', '2024-03-28', '04:27:00', 10, 'inactive'),
(18, 'Social', 'Computer Science & Engineering', '1', 'A', '2024-03-28', '23:01:00', 10, 'inactive'),
(19, 'Math', 'Computer Science & Engineering', '1', 'A', '2024-03-28', '23:09:00', 10, 'inactive'),
(20, 'Science', 'Computer Science & Engineering', '1', 'A', '2024-03-28', '23:25:00', 10, 'inactive'),
(21, 'English', 'Computer Science & Engineering', '1', 'A', '2024-03-29', '13:00:00', 10, 'inactive'),
(29, 'CPP', 'Computer Science & Engineering', '1', 'A', '2024-04-05', '16:32:00', 16, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `id` int(255) NOT NULL,
  `sid` varchar(230) NOT NULL,
  `aid` varchar(230) NOT NULL,
  `date` varchar(230) NOT NULL,
  `department` varchar(230) NOT NULL,
  `year` varchar(230) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`id`, `sid`, `aid`, `date`, `department`, `year`) VALUES
(4, '2', '3', '2024-02-24', 'IT', '1'),
(5, '2', '3', '2024-02-24', 'IT', '1'),
(6, '3', '4', '2024-02-26', 'IT', '1'),
(8, 'invalid user', '8', '2024-02-26', 'IT', '4'),
(9, 'invalid user', '9', '2024-02-26', 'IT', '2');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `year` int(11) DEFAULT NULL,
  `sect` varchar(230) NOT NULL,
  `password` varchar(230) NOT NULL DEFAULT '12345'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `name`, `email`, `contact`, `department`, `year`, `sect`, `password`) VALUES
(14, 'Ujjwal Gulhane', 'ujwal@gmail.com', '7418529635', '1001', 1, 'A', '12345'),
(15, 'Shreyash Isal', 'shreyash@gmail.com', '9874561235', '1003', 1, 'A', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `tblclass`
--

CREATE TABLE `tblclass` (
  `id` int(255) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `addedbyno` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblclass`
--

INSERT INTO `tblclass` (`id`, `class_name`, `department_name`, `year`, `section`, `date`, `time`, `addedbyno`) VALUES
(12, 'CPP', 'Computer Science & Engineering', '1', 'A', '2024-04-05', '16:32:00', 16);

-- --------------------------------------------------------

--
-- Table structure for table `tblcourses`
--

CREATE TABLE `tblcourses` (
  `id` int(255) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `department_id` varchar(255) NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcourses`
--

INSERT INTO `tblcourses` (`id`, `course_name`, `department_id`, `reg_date`) VALUES
(101, 'Java', '1001', '2024-04-05'),
(102, 'CPP', '1001', '2024-04-05'),
(103, 'Software Engineering', '1001', '2024-04-05'),
(104, 'Theory of Machine', '1003', '2024-04-05'),
(105, 'Mechanics of Machine', '1003', '2024-04-05'),
(106, 'Engineering Graphics', '1002', '2024-04-05'),
(107, 'Digital Electronics', '1004', '2024-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `tbldepartments`
--

CREATE TABLE `tbldepartments` (
  `id` int(255) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `reg_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbldepartments`
--

INSERT INTO `tbldepartments` (`id`, `department_name`, `reg_date`) VALUES
(1001, 'Computer Science & Engineering', '2024-04-05'),
(1002, 'Civil Engineering', '2024-04-05'),
(1003, 'Mechanical Engineering', '2024-04-05'),
(1004, 'Information Technology', '2024-04-05');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(100) DEFAULT NULL,
  `course` varchar(255) NOT NULL,
  `status` enum('active','inactive') DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `fullname`, `username`, `email`, `password`, `department`, `course`, `status`) VALUES
(16, 'Shreyash Isal', 'shreyash31', 'shreyash@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', '1001', 'CPP', 'active'),
(17, 'Ujjwal Gulhane', 'ujwal31', 'ujwalgulhane31@gmail.com', '1a1dc91c907325c69271ddf0c944bc72', '1003', 'Mechanics of Machine', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tblclass`
--
ALTER TABLE `tblclass`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblcourses`
--
ALTER TABLE `tblcourses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tblclass`
--
ALTER TABLE `tblclass`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblcourses`
--
ALTER TABLE `tblcourses`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `tbldepartments`
--
ALTER TABLE `tbldepartments`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
