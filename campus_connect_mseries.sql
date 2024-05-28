-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2024 at 03:01 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `campus_connect`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `id` int(11) NOT NULL,
  `datetime` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`id`, `datetime`, `message`, `file`, `date_created`, `date_updated`) VALUES
(3, 2024, 'chowawa', '../../uploaded/chuwawa.jpg', '2024-05-21 15:51:17', '2024-05-21 15:51:17'),
(4, 2024, 'New announcement', '../../uploaded/cute-little-dog-isolated-yellow.jpg', '2024-05-22 12:07:19', '2024-05-22 12:07:19');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_fullname` varchar(255) NOT NULL,
  `percentage` varchar(255) NOT NULL,
  `month` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `teacher_id`, `student_fullname`, `percentage`, `month`, `date_created`, `date_updated`) VALUES
(3, 10011, 10, 'kungfu  panda', '50%', 'June', '2024-05-22 07:12:18', '2024-05-22 07:12:18'),
(4, 12, 10, 'rev rev', '50%', 'January', '2024-05-22 07:21:17', '2024-05-22 07:21:17'),
(5, 10011, 33, 'kungfu  panda', '70%', 'December', '2024-05-22 07:27:27', '2024-05-22 07:27:27');

-- --------------------------------------------------------

--
-- Table structure for table `request_credentials`
--

CREATE TABLE `request_credentials` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_fullname` varchar(255) NOT NULL,
  `request` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `request_credentials`
--

INSERT INTO `request_credentials` (`id`, `student_id`, `student_fullname`, `request`, `message`, `status`, `date_created`, `date_updated`) VALUES
(10, 10011, 'kungfu  pandass', 'FORM 137', 'das', 'Approved', '2024-05-22 08:59:27', '2024-05-22 08:59:27'),
(13, 10011, 'kungfu  panda', 'COE', 'ADSASDDAS', 'Pending', '2024-05-22 12:25:01', '2024-05-22 12:25:01');

-- --------------------------------------------------------

--
-- Table structure for table `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `schedule_subject_name` varchar(255) NOT NULL,
  `schedule_strand_name` varchar(255) NOT NULL,
  `schedule_time` varchar(255) NOT NULL,
  `schedule_day` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedules`
--

INSERT INTO `schedules` (`id`, `subject_id`, `strand_id`, `schedule_subject_name`, `schedule_strand_name`, `schedule_time`, `schedule_day`, `date_created`, `date_updated`) VALUES
(20, 1, 11, 'Filipino', 'CRIM', '11:00 - 23:00', 'Tuesday', '2024-05-21 02:41:44', '2024-05-21 02:41:44'),
(21, 1, 11, 'Filipino', 'CRIM', '11:00 - 23:00', 'Wednesday', '2024-05-21 02:41:44', '2024-05-21 02:41:44'),
(22, 1, 11, 'Filipino', 'CRIM', '11:00 - 23:00', 'Thursday', '2024-05-21 02:41:44', '2024-05-21 02:41:44'),
(23, 1, 7, 'Filipino', 'BSCA', '11:00 - 23:00', 'Tuesday', '2024-05-21 02:48:56', '2024-05-21 02:48:56'),
(24, 1, 7, 'Filipino', 'BSCA', '11:00 - 23:00', 'Wednesday', '2024-05-21 02:48:56', '2024-05-21 02:48:56'),
(26, 3, 11, 'English', 'CRIM', '03:00 - 04:00', 'Monday', '2024-05-21 19:52:12', '2024-05-21 19:52:12'),
(27, 4, 7, 'Math', 'BSCA', '13:00 - 14:00', 'Monday', '2024-05-22 12:20:06', '2024-05-22 12:20:06'),
(28, 4, 7, 'Math', 'BSCA', '13:00 - 14:00', 'Tuesday', '2024-05-22 12:20:06', '2024-05-22 12:20:06');

-- --------------------------------------------------------

--
-- Table structure for table `strand`
--

CREATE TABLE `strand` (
  `id` int(11) NOT NULL,
  `strand_name` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `strand`
--

INSERT INTO `strand` (`id`, `strand_name`, `date_created`, `date_updated`) VALUES
(7, 'BSCA', '2024-05-20 23:31:48', '2024-05-20 23:31:48'),
(11, 'CRIM', '2024-05-20 23:43:19', '2024-05-20 23:43:19');

-- --------------------------------------------------------

--
-- Table structure for table `student_accounts`
--

CREATE TABLE `student_accounts` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `student_fname` varchar(255) NOT NULL,
  `student_mname` varchar(255) DEFAULT NULL,
  `student_lname` varchar(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `student_strand` varchar(255) NOT NULL,
  `student_gradelevel` varchar(255) NOT NULL,
  `student_gender` varchar(255) NOT NULL,
  `student_address` varchar(255) NOT NULL,
  `student_birthdate` varchar(255) NOT NULL,
  `student_guardian` varchar(255) NOT NULL,
  `student_guardian_contact` varchar(255) NOT NULL,
  `student_guardian_address` varchar(255) NOT NULL,
  `student_guardian_work` varchar(255) NOT NULL,
  `student_2ndguardian` varchar(255) NOT NULL,
  `student_2ndguardian_contact` varchar(255) NOT NULL,
  `student_2ndguardian_address` varchar(255) NOT NULL,
  `student_2ndguardian_work` varchar(255) NOT NULL,
  `student_username` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `date_created` date NOT NULL DEFAULT current_timestamp(),
  `date_updated` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_accounts`
--

INSERT INTO `student_accounts` (`id`, `student_id`, `strand_id`, `student_fname`, `student_mname`, `student_lname`, `student_email`, `student_strand`, `student_gradelevel`, `student_gender`, `student_address`, `student_birthdate`, `student_guardian`, `student_guardian_contact`, `student_guardian_address`, `student_guardian_work`, `student_2ndguardian`, `student_2ndguardian_contact`, `student_2ndguardian_address`, `student_2ndguardian_work`, `student_username`, `student_password`, `date_created`, `date_updated`) VALUES
(5, 1000, 11, 'juansa', 'a', 'sa', 'a@a.com', 'CRIM', 'Grade 11', 's', 'ss', '2024-05-21', 's', 's', 's', 's', 's      ', 's', 's      ', 's', 'sss3', '$2y$10$QjdVwXSPcYWuBn1KbRXGu.KQwsjsyqCFNk3WbFa0SSYL3pGr1Q1xO', '2024-05-21', '2024-05-21'),
(8, 10011, 11, 'kungfu ', 'p', 'panda', 'a@a.com', 'CRIM', 'Grade 12', 'male', 'Bacolod City', '2024-05-22', 'new', 'new', 'new', 'new', 'panda', 'panda', 'panda', 'panda', 'kungu', '$2y$10$7yM1xGIEZFgiBO.IQYLdQuZ1vpmvpVLlRwjxhhcp6jMf4OoxxeA6e', '2024-05-22', '2024-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `student_grades`
--

CREATE TABLE `student_grades` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `student_fname` varchar(255) NOT NULL,
  `student_lname` varchar(255) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `1st_quarter` varchar(255) DEFAULT NULL,
  `2nd_quarter` varchar(255) DEFAULT NULL,
  `final` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_grades`
--

INSERT INTO `student_grades` (`id`, `student_id`, `subject_id`, `teacher_id`, `subject_name`, `student_fname`, `student_lname`, `grade_level`, `school_year`, `semester`, `1st_quarter`, `2nd_quarter`, `final`, `date_created`, `date_updated`) VALUES
(12, 12, 1, 10, 'Filipino', 'rev', 'rev', 'Grade 11', '2022-2022', '1st Semester', '70', '90', '70', '2024-05-22 05:58:32', '2024-05-22 05:58:32'),
(13, 10011, 1, 10, 'Filipino', 'kungfu ', 'panda', 'Grade 12', '2022-2024', '1st Semester', '70', '80', '', '2024-05-22 06:50:04', '2024-05-22 06:50:04'),
(14, 10011, 1, 33, 'Filipino', 'kungfu ', 'panda', 'Grade 12', '2022-2023', '2nd Semester', '70', '', '', '2024-05-22 07:26:53', '2024-05-22 07:26:53');

-- --------------------------------------------------------

--
-- Table structure for table `student_with_subjects`
--

CREATE TABLE `student_with_subjects` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `grade_level` varchar(255) NOT NULL,
  `school_year` int(11) NOT NULL,
  `teacher_fname` varchar(255) NOT NULL,
  `teacher_lname` varchar(255) NOT NULL,
  `student_fname` varchar(255) NOT NULL,
  `student_lname` varchar(255) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `strand_id` int(11) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `student_schedule_subject_name` varchar(255) NOT NULL,
  `student_schedule_subject_schedule_day` varchar(255) NOT NULL,
  `student_schedule_subject_schedule_time` varchar(255) NOT NULL,
  `student_schedule_strand_name` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_with_subjects`
--

INSERT INTO `student_with_subjects` (`id`, `teacher_id`, `student_id`, `grade_level`, `school_year`, `teacher_fname`, `teacher_lname`, `student_fname`, `student_lname`, `subject_id`, `strand_id`, `semester`, `student_schedule_subject_name`, `student_schedule_subject_schedule_day`, `student_schedule_subject_schedule_time`, `student_schedule_strand_name`, `date_created`, `date_updated`) VALUES
(20, 33, 1000, 'Grade 11', 2021, 'thorfins', 'karlsefni', 'juansa', 'sa', 1, 7, '1st Semester', 'Filipino', 'Tuesday', '11:00 - 23:00', 'BSCA', '2024-05-22 12:15:16', '2024-05-22 12:15:16'),
(21, 33, 1000, 'Grade 11', 2023, 'thorfins', 'karlsefni', 'juansa', 'sa', 1, 7, '2nd Semester', 'Filipino', 'Tuesday', '11:00 - 23:00', 'BSCA', '2024-05-22 12:16:10', '2024-05-22 12:16:10'),
(22, 10, 10011, 'Grade 12', 2023, 'fay', 'kartud', 'kungfu ', 'panda', 1, 11, '2nd Semester', 'Filipino', 'Tuesday', '11:00 - 23:00', 'CRIM', '2024-05-22 12:17:09', '2024-05-22 12:17:09'),
(23, 10, 10011, 'Grade 12', 2023, 'fay', 'kartud', 'kungfu ', 'panda', 1, 11, '1st Semester', 'Filipino', 'Tuesday', '11:00 - 23:00', 'CRIM', '2024-05-22 12:17:19', '2024-05-22 12:17:19'),
(24, 10, 10011, 'Grade 12', 2021, 'fay', 'kartud', 'kungfu ', 'panda', 1, 11, '2nd Semester', 'Filipino', 'Thursday', '11:00 - 23:00', 'CRIM', '2024-05-22 12:17:40', '2024-05-22 12:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `subject_name`, `date_created`, `date_updated`) VALUES
(1, 'Filipino', '2024-05-21 00:12:56', '2024-05-21 00:12:56'),
(3, 'English', '2024-05-21 00:46:42', '2024-05-21 00:46:42'),
(4, 'Math', '2024-05-22 12:19:26', '2024-05-22 12:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_accounts`
--

CREATE TABLE `teacher_accounts` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `teacher_strand_id` int(11) NOT NULL,
  `teacher_fname` varchar(255) NOT NULL,
  `teacher_mname` varchar(255) DEFAULT NULL,
  `teacher_lname` varchar(255) NOT NULL,
  `teacher_gender` varchar(255) NOT NULL,
  `teacher_birthdate` varchar(255) NOT NULL,
  `teacher_address` varchar(255) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_strand` varchar(255) NOT NULL,
  `teacher_username` varchar(255) NOT NULL,
  `teacher_password` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher_accounts`
--

INSERT INTO `teacher_accounts` (`id`, `teacher_id`, `teacher_strand_id`, `teacher_fname`, `teacher_mname`, `teacher_lname`, `teacher_gender`, `teacher_birthdate`, `teacher_address`, `teacher_email`, `teacher_strand`, `teacher_username`, `teacher_password`, `date_created`, `date_updated`) VALUES
(3, 33, 7, 'thorfins', 'm', 'karlsefni', 'Male', '2024-05-21', 'ss', 'ss@s.com', 'BSCA', 'thorfin', '$2y$10$aPfKkGPNqkP3koZTI8ICr.vW9euTCfaNMZTiprgz.32wiTzozGHsS', '2024-05-21 10:13:56', '2024-05-21 10:13:56'),
(5, 10, 11, 'fay', 'f', 'kartud', 'female', '2024-05-22', 'bacolod', 'fay@gmail.com', 'CRIM', 'fay', '$2y$10$0cAyVF8T78hgWFNaSJ8y0eEomOlEJ1Sn/DQCxZIJqKrIWZjN6m5BO', '2024-05-21 19:19:23', '2024-05-21 19:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_fullname` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `date_updated` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `user_fullname`, `user_username`, `user_password`, `user_type`, `date_created`, `date_updated`) VALUES
(10, 1, 'admin new', 'admin', '$2y$10$F4ir2gpowsOQNBz3kW2NI..k4CNIklgPRVtJI2nnOf96hgyBunk1q', 'Admin', '2024-05-20 18:02:47', '2024-05-20 18:02:47'),
(11, 3, 'kdot', 'kdot', '$2y$10$2chIOfx8enxYWqbAUyrfIeiAM8IiP/AQ7CvLRnJMWi2GozVyEdhHm', 'Admin', '2024-05-20 19:17:52', '2024-05-20 19:17:52'),
(21, 9, 'he a 69 god', 'fan', '$2y$10$T.ZTKc2LojAog/zQBMwn2uzmHaPfuxav8E03TBgoAE4rJyEF9kiLq', 'Admin', '2024-05-20 19:35:02', '2024-05-20 19:35:02'),
(22, 11, 'bbl drizzy', 'drizzy', '$2y$10$wG2c6jKKBvJXErDFau/P.eWArBA41.WvV2Vi4Ifzs4RWRuGz7MRme', 'Admin', '2024-05-20 19:42:00', '2024-05-20 19:42:00'),
(23, 2, 'katsumi saigo', 'katsu', '$2y$10$5luR2mmdvkSE9PRZ0pP/xOo7HdYZDy7o8qreX26LB.4RwHxmtSdiC', 'Admin', '2024-05-20 23:20:43', '2024-05-20 23:20:43'),
(26, 1000, 'juansa sa', 'sss3', '$2y$10$QjdVwXSPcYWuBn1KbRXGu.KQwsjsyqCFNk3WbFa0SSYL3pGr1Q1xO', 'Student', '2024-05-21 03:29:14', '2024-05-21 03:29:14'),
(27, 1001, 'news new', 'new', '$2y$10$kvtoPv25K/Ga727f3WWNRe5AL9TYdKlJTkw9Q3dnf.J2kDI5Suy8K', 'Student', '2024-05-21 03:52:48', '2024-05-21 03:52:48'),
(38, 33, 'thorfins karlsefni', 'thorfin', '$2y$10$aPfKkGPNqkP3koZTI8ICr.vW9euTCfaNMZTiprgz.32wiTzozGHsS', 'Teacher', '2024-05-21 10:13:56', '2024-05-21 10:13:56'),
(40, 10, 'fay kartud', 'fay', '$2y$10$0cAyVF8T78hgWFNaSJ8y0eEomOlEJ1Sn/DQCxZIJqKrIWZjN6m5BO', 'Teacher', '2024-05-21 19:19:23', '2024-05-21 19:19:23'),
(41, 10011, 'kungfu  panda', 'kungfu', '$2y$10$7yM1xGIEZFgiBO.IQYLdQuZ1vpmvpVLlRwjxhhcp6jMf4OoxxeA6e', 'Student', '2024-05-21 21:43:37', '2024-05-21 21:43:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `request_credentials`
--
ALTER TABLE `request_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `strand`
--
ALTER TABLE `strand`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `strand_name` (`strand_name`);

--
-- Indexes for table `student_accounts`
--
ALTER TABLE `student_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_id` (`student_id`);

--
-- Indexes for table `student_grades`
--
ALTER TABLE `student_grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_with_subjects`
--
ALTER TABLE `student_with_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_accounts`
--
ALTER TABLE `teacher_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `request_credentials`
--
ALTER TABLE `request_credentials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `strand`
--
ALTER TABLE `strand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student_accounts`
--
ALTER TABLE `student_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_grades`
--
ALTER TABLE `student_grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student_with_subjects`
--
ALTER TABLE `student_with_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher_accounts`
--
ALTER TABLE `teacher_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
