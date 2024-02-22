-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2020 at 01:01 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `demo_project2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `adm_id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` int(11) NOT NULL DEFAULT '0',
  `faculty_id` int(11) NOT NULL DEFAULT '0',
  `adm_name` varchar(255) NOT NULL,
  `adm_pass` varchar(255) NOT NULL,
  `adm_email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  PRIMARY KEY (`adm_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `admin`
--


-- --------------------------------------------------------

--
-- Table structure for table `exam_date`
--

CREATE TABLE IF NOT EXISTS `exam_date` (
  `exam_date_id` int(11) NOT NULL AUTO_INCREMENT,
  `stream` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `exzam_date` varchar(255) NOT NULL,
  `updated_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`exam_date_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `exam_date`
--

INSERT INTO `exam_date` (`exam_date_id`, `stream`, `semester`, `exzam_date`, `updated_date`) VALUES
(1, 'Electrical', 'Sem3', '2020-03-12', '2020-02-03 16:16:29'),
(2, 'Electrical', 'Sem4', '2020-02-29', '2020-02-08 15:42:32'),
(3, 'Computer', 'Sem4', '2020-02-28', '2020-02-08 15:42:42');

-- --------------------------------------------------------

--
-- Table structure for table `exam_timetable`
--

CREATE TABLE IF NOT EXISTS `exam_timetable` (
  `exam_id` int(11) NOT NULL AUTO_INCREMENT,
  `stream` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `timetable_file` varchar(255) NOT NULL,
  `uploaded_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`exam_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `exam_timetable`
--


-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
  `faculty_id` int(11) NOT NULL AUTO_INCREMENT,
  `faclty_id` varchar(255) NOT NULL,
  `faculty_first_name` varchar(255) NOT NULL,
  `faculty_middel_name` varchar(255) NOT NULL,
  `faculty_last_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `mobile_no` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `joining_date` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  PRIMARY KEY (`faculty_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faclty_id`, `faculty_first_name`, `faculty_middel_name`, `faculty_last_name`, `department`, `designation`, `email_id`, `mobile_no`, `address`, `profile_image`, `user_name`, `password`, `joining_date`, `user_type`, `full_name`) VALUES
(2, '1', 'sushant1', 'dipak1', 'jamkar1', 'Electronics', 'designation4', 'sushant1@gmail.com', '8958585151', 'asdasd asd asd asd asd1111', 'Tulips.jpg', 'sushant1', 'sushant1', '2019-10-01', 'placement_officer', 'sushant1 jamkar1'),
(3, '1', 'vaibhav', 'anna', 'kadam', 'Chemical', 'designation1', 'vaibhav@gmail.com', '8958585625', 'jailroad nashik 422101', 'Koala.jpg', 'vaibhav', 'vaibhav', '2019-09-11', 'teacher', 'vaibhav kadam'),
(4, '1', 'kiran', 'raju', 'jagtap', 'Electronics', 'designation4', 'kiran@gmail.com', '8585454585', 'nashik', 'Penguins.jpg', 'kiran', 'kiran', '1988-10-31', 'admin', 'kiran jagtap'),
(5, '1', 'gaurav', 'r', 'guptaa', 'Electronics', 'designation4', 'gaurav@gmail.com', '8565854511', 'home', 'Jellyfish.jpg', 'gaurav', 'gaurav', '2020-12-09', 'placement_officer', 'gaurav guptaa');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE IF NOT EXISTS `notification` (
  `noti_id` int(11) NOT NULL AUTO_INCREMENT,
  `notification` varchar(255) NOT NULL,
  `noti_date` date NOT NULL,
  PRIMARY KEY (`noti_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `notification`
--


-- --------------------------------------------------------

--
-- Table structure for table `placement_post`
--

CREATE TABLE IF NOT EXISTS `placement_post` (
  `placement_post_id` int(11) NOT NULL AUTO_INCREMENT,
  `placement_post_data` varchar(255) NOT NULL,
  `placement_post_image` varchar(255) NOT NULL,
  `placement_post_timedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `post_by_id` int(11) NOT NULL,
  `posted_by` varchar(255) NOT NULL,
  PRIMARY KEY (`placement_post_id`),
  UNIQUE KEY `post_id` (`placement_post_data`),
  KEY `topic_id` (`placement_post_image`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `placement_post`
--


-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `intro` longtext NOT NULL,
  `views` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `body` longtext NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `post`
--


-- --------------------------------------------------------

--
-- Table structure for table `selected_student`
--

CREATE TABLE IF NOT EXISTS `selected_student` (
  `select_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `total_selected` varchar(255) NOT NULL,
  PRIMARY KEY (`select_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `selected_student`
--


-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `student_id` int(11) NOT NULL AUTO_INCREMENT,
  `std_unique_id` varchar(255) NOT NULL,
  `std_first_name` varchar(255) NOT NULL,
  `std_middel_name` varchar(255) NOT NULL,
  `std_last_name` varchar(255) NOT NULL,
  `std_dob` varchar(255) NOT NULL,
  `std_emai_id` varchar(255) NOT NULL,
  `std_mobile_no` varchar(255) NOT NULL,
  `std_address` varchar(255) NOT NULL,
  `std_profile_img` varchar(255) NOT NULL,
  `std_user_name` varchar(255) NOT NULL,
  `std_password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `SSC_Percentage` varchar(255) NOT NULL,
  `HSC_Percentage` varchar(255) NOT NULL,
  `Graduation_Percentage` varchar(255) NOT NULL,
  `History_of_Backlog` varchar(255) NOT NULL,
  `Current_Backlog` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL DEFAULT 'student',
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `std_unique_id`, `std_first_name`, `std_middel_name`, `std_last_name`, `std_dob`, `std_emai_id`, `std_mobile_no`, `std_address`, `std_profile_img`, `std_user_name`, `std_password`, `department`, `SSC_Percentage`, `HSC_Percentage`, `Graduation_Percentage`, `History_of_Backlog`, `Current_Backlog`, `full_name`, `user_type`) VALUES
(1, 'STD001', 'sanket', 'm', 'shejwal', '2020-02-05', 'sanket@gmail.com', '8698284240', '                                                                                                                        jailroad', 'client-pic-3.jpg', 'student', 'student', 'Computer', '85', '70', '90', '2', '3', 'sanket shejwal', 'student'),
(2, 'STUD002sdf', 'demosdf', 'dsdf', 'checjsdf', '2020-12-25', 'demodfg@gmail.com', '8565251dfg', '                dfgdfg                        asd', 'Jellyfish.jpg', 'damodfg', 'demodfg', 'Mechanical', '85', '50', '65', '3', '4', 'demosdf checjsdf', 'student'),
(3, 'STUD001', 'tushar', 'a', 'jadhav', '2020-12-31', 'tusharasd@gmail.com', '8585454123', 'at near my hous', 'Tulips.jpg', 'tushar123', 'tushar123', 'Chemical', '58', '98', '78', '1', '3', 'tushar jadhav', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student_approvle`
--

CREATE TABLE IF NOT EXISTS `student_approvle` (
  `uproval_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `std_unique_id` varchar(255) NOT NULL,
  `std_first_name` varchar(255) NOT NULL,
  `std_middel_name` varchar(255) NOT NULL,
  `std_last_name` varchar(255) NOT NULL,
  `std_dob` varchar(255) NOT NULL,
  `std_emai_id` varchar(255) NOT NULL,
  `std_mobile_no` varchar(255) NOT NULL,
  `std_address` varchar(255) NOT NULL,
  `std_profile_img` varchar(255) NOT NULL,
  `std_user_name` varchar(255) NOT NULL,
  `std_password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `SSC_Percentage` varchar(255) NOT NULL,
  `HSC_Percentage` varchar(255) NOT NULL,
  `Graduation_Percentage` varchar(255) NOT NULL,
  `History_of_Backlog` varchar(255) NOT NULL,
  `Current_Backlog` varchar(255) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `approvel_status` int(11) NOT NULL,
  PRIMARY KEY (`uproval_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student_approvle`
--


-- --------------------------------------------------------

--
-- Table structure for table `student_marks`
--

CREATE TABLE IF NOT EXISTS `student_marks` (
  `stud_marks_id` int(11) NOT NULL AUTO_INCREMENT,
  `stud_id` int(11) NOT NULL,
  `stream` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `marks` varchar(255) NOT NULL,
  PRIMARY KEY (`stud_marks_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `student_marks`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Author','Admin') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `password`, `created_at`, `updated_at`) VALUES
(1, 'vis', 'vis@gnext.com', 'Admin', 'vis', '2018-01-18 12:52:58', '2018-01-18 12:52:58'),
(2, 'admin', 'demo@demo.com', 'Admin', 'admin', '2018-01-18 12:52:58', '2018-01-18 12:52:58'),
(3, 'demo', 'demo@admin.com', NULL, 'fe01ce2a7fbac8fafaed7c982a04e229', '2018-06-15 13:19:29', '2018-06-15 13:19:29');
