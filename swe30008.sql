-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2022 at 02:47 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swe30008`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `accID` int(10) UNSIGNED NOT NULL COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.',
  `accName` varchar(50) NOT NULL,
  `accEmail` varchar(50) NOT NULL,
  `accPassword` varchar(50) NOT NULL COMMENT 'Password should be hashed. AccID up to 10 are only testing accounts.',
  `accPhoneNo` varchar(20) NOT NULL,
  `accActive` int(1) NOT NULL DEFAULT 1 COMMENT '0 = not active; 1 = active; active means they are currently logged in.',
  `accAccess` int(1) NOT NULL DEFAULT 1 COMMENT 'DEFAULT: 1 = user; 2 = admins; permission column.',
  `accLastVisit` datetime NOT NULL DEFAULT current_timestamp() COMMENT 'When the user logs out/ switch pages, just use current_timestamp() to update this field. ',
  `accDateRegistered` date NOT NULL DEFAULT current_timestamp(),
  `accCountry` char(15) NOT NULL DEFAULT 'Malaysia' COMMENT 'They will select their countries from a drop-down list.',
  `accAge` date NOT NULL COMMENT 'A date data type input in the form.',
  `accNotifEnabled` int(1) DEFAULT 1 COMMENT '0 - disabled, 1 - enabled.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`accID`, `accName`, `accEmail`, `accPassword`, `accPhoneNo`, `accActive`, `accAccess`, `accLastVisit`, `accDateRegistered`, `accCountry`, `accAge`, `accNotifEnabled`) VALUES
(1, 'Ezekiel', 'helloaaada@mailinator.com', '123456', '011-1090 9956', 0, 2, '2022-10-15 09:38:06', '2022-08-10', 'Malaysia', '2002-07-17', 1),
(2, 'Cornelius', 'cornelius@gmail.com', '654321', '012-345 6789', 0, 2, '2022-10-15 09:38:06', '2022-07-22', 'Singapore', '2002-05-14', 0),
(3, 'Josh', 'joshwong@gmail.com', '123456', '012-345 6789', 1, 1, '2022-10-15 10:24:37', '2022-10-15', 'China', '1967-06-14', 0),
(4, 'JingHong', 'bongjh@yahoo.com', '654321', '012-345 6789', 0, 1, '2022-10-15 10:25:27', '2022-10-15', 'Malaysia', '2002-03-05', 0),
(5, 'YukFung', 'cactisucculentkch@gmail.com', '123456', '012-345 6789', 1, 1, '2022-10-15 10:27:15', '2022-09-08', 'Malaysia', '2002-06-04', 1),
(6, 'Jaden', 'jadencwc@outlook.my', '654321', '012-345 6789', 1, 1, '2022-10-15 10:28:17', '2022-08-05', 'Indonesia', '2001-02-05', 0),
(7, 'mar3276', 'mar1976@gmail.com', 'mar847664', '012-345 6789', 1, 1, '2022-10-15 10:29:13', '2022-09-05', 'Canada', '1983-08-18', 0),
(8, 'daniel91', 'daniel746@yahoo.com', 'daniel73672!', '012-345 6789', 0, 1, '2022-10-15 10:30:26', '2022-09-27', 'United States', '1995-10-19', 0),
(9, 'alexander63', 'alexander8573@gmail.com', 'alexanderthebest1', '012-345 6789', 1, 1, '2022-10-15 10:31:24', '2022-07-14', 'Russia', '1966-12-15', 0),
(10, 'kimberlyyyyy', 'kimkimber@outlook.com', 'kimkadash123', '012-345 6789', 1, 1, '2022-10-15 10:32:53', '2022-06-07', 'Canada', '1985-10-23', 0),
(11, 'brightvc', 'bright.vachi@gmail.com', 'brightvcwow1', '012-345 6789', 0, 1, '2022-10-15 10:32:53', '2022-07-06', 'Thailand', '1997-12-27', 0),
(12, 'toptap44', 'toptop92@gmail.com', 'taptap928', '012-345 6789', 0, 1, '2022-10-16 09:30:02', '2022-09-16', 'Thailand', '1993-09-23', 0),
(13, 'sarahpaulson12', 'sarahp1982@gmail.com', 'sarahhhh48', '012-345 6789', 1, 1, '2022-10-16 12:12:53', '2022-10-16', 'Malaysia', '1982-09-08', 0),
(14, 'melissamcarthy', 'melissammm@outlook.com', 'meli47ssa', '012-345 6789', 1, 1, '2022-10-16 12:13:44', '2022-10-16', 'Malaysia', '2022-02-09', 0),
(15, 'parkjongseong', 'parkejong23@gmail.com', 'parkjay73', '012-345 6789', 1, 1, '2022-10-16 12:15:42', '2022-10-16', 'Malaysia', '2002-04-20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `acc_bookings`
--

CREATE TABLE `acc_bookings` (
  `accID` int(10) UNSIGNED NOT NULL,
  `bookingID` int(10) UNSIGNED NOT NULL,
  `bookingStatus` int(1) NOT NULL DEFAULT 1 COMMENT '0 = unconfirmed; 1 = confirmed; 2 = cancelled.',
  `bookingCompleted` int(1) NOT NULL DEFAULT 0 COMMENT '0 means visitor haven''t went to the booking, 1 means they did.',
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_bookings`
--

INSERT INTO `acc_bookings` (`accID`, `bookingID`, `bookingStatus`, `bookingCompleted`, `remarks`) VALUES
(1, 1, 1, 1, ''),
(1, 3, 1, 1, ''),
(1, 34, 2, 0, ''),
(2, 5, 2, 1, ''),
(2, 12, 1, 0, ''),
(3, 1, 1, 0, ''),
(3, 4, 1, 0, ''),
(3, 7, 1, 1, ''),
(3, 9, 2, 1, ''),
(4, 2, 1, 0, ''),
(4, 4, 1, 0, ''),
(4, 7, 1, 1, ''),
(5, 3, 2, 1, ''),
(5, 4, 1, 0, ''),
(5, 5, 1, 0, ''),
(5, 13, 1, 0, ''),
(5, 32, 1, 0, ''),
(6, 5, 1, 1, ''),
(6, 6, 1, 0, ''),
(7, 2, 2, 1, ''),
(7, 3, 1, 0, ''),
(7, 4, 1, 1, ''),
(8, 2, 1, 1, ''),
(8, 9, 1, 1, ''),
(9, 1, 1, 1, ''),
(9, 3, 1, 0, ''),
(9, 11, 1, 0, ''),
(10, 3, 1, 1, ''),
(11, 2, 1, 0, ''),
(11, 6, 1, 1, ''),
(11, 8, 1, 2, ''),
(12, 11, 1, 0, ''),
(15, 7, 1, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `acc_guide`
--

CREATE TABLE `acc_guide` (
  `guideAuthors` int(10) UNSIGNED NOT NULL,
  `accID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_guide`
--

INSERT INTO `acc_guide` (`guideAuthors`, `accID`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `acc_notifications`
--

CREATE TABLE `acc_notifications` (
  `accID` int(10) UNSIGNED NOT NULL,
  `notifID` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_notifications`
--

INSERT INTO `acc_notifications` (`accID`, `notifID`, `status`) VALUES
(1, 15, 1),
(1, 17, 1),
(1, 19, 1),
(1, 25, 1),
(1, 27, 1),
(1, 29, 1),
(1, 32, 1),
(1, 35, 1),
(1, 42, 1),
(1, 44, 1),
(1, 45, 1),
(1, 47, 1),
(1, 49, 1),
(1, 51, 1),
(1, 54, 1),
(1, 56, 1),
(1, 58, 1),
(1, 59, 1),
(1, 60, 1),
(1, 69, 1),
(1, 70, 1),
(5, 5, 0),
(5, 10, 1),
(5, 13, 0),
(5, 16, 1),
(5, 18, 1),
(5, 20, 1),
(5, 21, 1),
(5, 23, 1),
(5, 24, 1),
(5, 26, 1),
(5, 28, 1),
(5, 30, 1),
(5, 33, 1),
(5, 36, 1),
(5, 38, 1),
(5, 39, 1),
(5, 40, 1),
(5, 41, 1),
(5, 43, 1),
(5, 44, 1),
(5, 46, 1),
(5, 48, 1),
(5, 50, 1),
(5, 52, 1),
(5, 55, 1),
(5, 56, 1),
(5, 57, 1),
(5, 58, 1),
(5, 59, 1),
(5, 61, 1),
(5, 62, 1),
(5, 63, 1),
(5, 64, 1),
(5, 65, 1),
(5, 66, 1),
(5, 67, 1),
(5, 68, 1);

-- --------------------------------------------------------

--
-- Table structure for table `acc_preference`
--

CREATE TABLE `acc_preference` (
  `accID` int(10) UNSIGNED NOT NULL,
  `prodID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_preference`
--

INSERT INTO `acc_preference` (`accID`, `prodID`) VALUES
(1, 4),
(3, 5),
(3, 8),
(4, 2),
(4, 6),
(5, 5),
(5, 6),
(5, 9),
(6, 2),
(6, 4),
(6, 8),
(7, 8),
(8, 1),
(8, 6),
(9, 2),
(9, 5),
(10, 3),
(10, 6),
(11, 2),
(11, 7);

-- --------------------------------------------------------

--
-- Table structure for table `acc_products`
--

CREATE TABLE `acc_products` (
  `accID` int(10) UNSIGNED NOT NULL,
  `prodID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_products`
--

INSERT INTO `acc_products` (`accID`, `prodID`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(2, 6),
(2, 7),
(2, 8),
(2, 9),
(2, 10);

-- --------------------------------------------------------

--
-- Table structure for table `acc_purchasehistory`
--

CREATE TABLE `acc_purchasehistory` (
  `accID` int(10) UNSIGNED NOT NULL,
  `prodID` int(10) UNSIGNED NOT NULL,
  `prodPurchaseDate` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `acc_purchasehistory`
--

INSERT INTO `acc_purchasehistory` (`accID`, `prodID`, `prodPurchaseDate`) VALUES
(1, 5, '2022-09-06'),
(1, 9, '2022-09-07'),
(2, 1, '2022-08-15'),
(2, 4, '2022-09-01'),
(2, 5, '2022-07-05'),
(2, 8, '2022-05-03'),
(2, 10, '2022-06-14'),
(3, 2, '2022-07-05'),
(3, 3, '2022-06-07'),
(3, 4, '2022-07-13'),
(3, 6, '2022-09-07'),
(4, 3, '2022-08-09'),
(4, 6, '2022-07-21'),
(4, 8, '2022-06-15'),
(5, 3, '2022-05-12'),
(7, 2, '2022-04-20'),
(9, 3, '2022-05-12'),
(9, 5, '2022-08-17'),
(11, 6, '2022-09-14'),
(11, 10, '2022-07-05');

-- --------------------------------------------------------

--
-- Table structure for table `advertisements`
--

CREATE TABLE `advertisements` (
  `advID` int(10) NOT NULL COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.',
  `advTitle` text NOT NULL,
  `advDesc` text NOT NULL,
  `advImage` varchar(100) NOT NULL,
  `advDateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `advDuration` timestamp NOT NULL DEFAULT '2022-12-31 20:00:00' COMMENT 'The admins can set how long they want this advertisement to last. At the exact time of this field, it will change the visibility field to 0.',
  `advVisible` int(1) NOT NULL DEFAULT 1,
  `advAddedBy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `advertisements`
--

INSERT INTO `advertisements` (`advID`, `advTitle`, `advDesc`, `advImage`, `advDateCreated`, `advDuration`, `advVisible`, `advAddedBy`) VALUES
(1, 'Welcome to Cacti Succulents Kuching!', 'We are the best!', '/images/adv1.png', '2022-10-14 19:09:23', '2022-10-20 20:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `bannerID` int(10) NOT NULL COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.',
  `bannerImage` varchar(50) NOT NULL,
  `bannerDateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `bannerDuration` timestamp NOT NULL DEFAULT '2022-12-31 20:00:00',
  `bannerVisible` int(1) NOT NULL DEFAULT 1,
  `bannerAddedBy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`bannerID`, `bannerImage`, `bannerDateCreated`, `bannerDuration`, `bannerVisible`, `bannerAddedBy`) VALUES
(1, '/images/banner1.png', '2022-10-14 19:16:43', '2022-12-31 20:00:00', 0, 4),
(2, 'images/banner2.jpg', '2022-10-26 12:10:42', '2022-11-05 12:10:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `bookingID` int(10) UNSIGNED NOT NULL COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.',
  `bookingTime` time NOT NULL,
  `bookingDate` date NOT NULL,
  `bookingVisible` int(1) NOT NULL DEFAULT 1 COMMENT '0 = not visible; 1 = visible; determines whether the user can see this slot in the booking page or not.',
  `bookingDesc` text NOT NULL,
  `bookingTotalSlots` int(5) NOT NULL DEFAULT 10 COMMENT 'Whenever the admins add a booking, update the bookingTotalSlots = bookingAvailSlots initially using PHP.',
  `bookingAvailSlots` int(5) NOT NULL DEFAULT 10
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`bookingID`, `bookingTime`, `bookingDate`, `bookingVisible`, `bookingDesc`, `bookingTotalSlots`, `bookingAvailSlots`) VALUES
(1, '12:00:00', '2022-10-10', 1, 'This is a booking test 1. ', 50, 50),
(2, '16:00:00', '2022-10-10', 1, 'This is a booking test 2. ', 10, 10),
(3, '14:00:00', '2022-10-10', 1, 'This is a booking test 3. ', 10, 10),
(4, '08:00:00', '2022-10-17', 1, 'This is a booking test 4.', 10, 10),
(5, '12:30:00', '2022-09-10', 0, 'This is a booking test 5.', 10, 0),
(6, '13:00:00', '2022-09-21', 0, 'This is a booking test 6.', 5, 2),
(7, '17:00:00', '2022-10-25', 1, 'This is a booking test 7.', 10, 9),
(8, '12:00:00', '2022-10-21', 1, 'This is a booking test 8.', 25, 25),
(9, '11:30:00', '2022-10-12', 1, 'This is a booking test 9.', 10, 10),
(10, '12:00:00', '2022-09-16', 0, 'This is a booking test 10.', 10, 2),
(11, '12:00:00', '2022-10-19', 1, 'This is booking test.', 10, 10),
(12, '12:00:00', '2022-10-22', 1, 'This is booking test.', 10, 10),
(13, '12:00:00', '2022-10-25', 1, 'This is booking test.', 10, 11),
(14, '00:00:00', '0000-00-00', 0, '', 0, 0),
(18, '13:00:00', '2022-10-23', 1, '', 5, 5),
(19, '15:00:00', '2022-10-23', 0, '', 22, 3),
(20, '18:00:00', '2022-10-24', 1, '', 2, 2),
(21, '11:00:00', '2022-10-24', 1, '', 22, 22),
(22, '13:00:00', '2022-10-24', 1, '', 22, 16),
(23, '14:00:00', '2022-10-24', 1, '', 22, 22),
(24, '21:00:00', '2022-10-24', 1, '', 2, 2),
(28, '22:00:00', '2022-10-24', 1, '', 1, 1),
(29, '10:00:00', '2022-10-25', 1, '', 2, 3),
(30, '09:00:00', '2022-10-25', 1, '', 2, 4),
(31, '11:00:00', '2022-10-25', 1, '', 2, 2),
(32, '15:00:00', '2022-10-25', 1, '', 2, 1),
(33, '14:00:00', '2022-10-25', 1, '', 2, 2),
(34, '12:00:00', '2022-11-17', 1, '', 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `guides`
--

CREATE TABLE `guides` (
  `guideID` int(10) UNSIGNED NOT NULL,
  `guideTitle` text NOT NULL,
  `guideDesc` text NOT NULL,
  `guideDateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `guideVisible` int(1) NOT NULL DEFAULT 1 COMMENT '0 = not visible; 1 = visible; determines whether the guide can be viewed by users or not.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `guides`
--

INSERT INTO `guides` (`guideID`, `guideTitle`, `guideDesc`, `guideDateCreated`, `guideVisible`) VALUES
(1, 'How to sleep effectively?', 'Close your eyes and stop moving.', '2022-09-30 17:54:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notifID` int(10) NOT NULL,
  `notifTitle` text NOT NULL,
  `notifDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notifID`, `notifTitle`, `notifDesc`) VALUES
(1, 'testingsjdkajsoff', 'fdasfkuewifjdhcuifjhwf'),
(2, 'Booking Notification', 'You have a booking at 22:00:00'),
(3, 'Booking Notification', 'You have a booking at 12:00:00'),
(4, 'Booking Notification', 'You have a booking at 14:00:00'),
(5, 'Booking Notification', 'You have a booking at 14:00:00'),
(6, 'tetsing4', ' testing4'),
(7, 'tetsing5', ' fskafjdsjfisdfg'),
(8, 'Booking Notification', 'You have a booking at 11:00:00'),
(9, 'Booking Notification', 'You have a booking at 13:00:00'),
(10, 'Booking Notification', 'You have a booking at 14:00:00'),
(11, 'Booking Notification', 'You have the booking at 18:00:00'),
(12, 'Booking Notification', 'You have a booking at 21:00:00'),
(13, 'Booking Notification', 'You have a booking at 22:00:00'),
(14, 'Booking Slots Update', 'The booking time at 22:00:00 has changed to 10:00:00'),
(15, 'Booking Slots Update', 'The booking time at 22:00:00 has changed to 13:00:00'),
(16, 'Booking Slots Update', 'The booking time at 22:00:00 has changed to 13:00:00'),
(17, 'Booking Slots Update', 'The booking time at 22:00:00 has changed to 18:00:00'),
(18, 'Booking Slots Update', 'The booking time at 22:00:00 has changed to 18:00:00'),
(19, 'Booking Slots Update', 'The booking time at 22:00:00 has changed to 20:00:00'),
(20, 'Booking Slots Update', 'The booking time at 22:00:00 has changed to 20:00:00'),
(21, 'testing6', ' tetsing123456'),
(22, 'testing6', ' tetsing123456789'),
(23, 'testing6', ' tetsing123456789'),
(24, 'testing6', ' tetsing1234567890'),
(25, 'Booking Update (Slots Delete)', 'The booking time on 2022-10-25 at 22:00:00has been deleted.'),
(26, 'Booking Update (Slots Delete)', 'The booking time on 2022-10-25 at 22:00:00has been deleted.'),
(27, 'Booking Update (Slots Delete)', 'The booking time on 2022-10-25 at 22:00:00has been deleted.'),
(28, 'Booking Update (Slots Delete)', 'The booking time on 2022-10-25 at 22:00:00has been deleted.'),
(29, 'Booking Update (Slots Delete)', 'The booking time on  at has been deleted.'),
(30, 'Booking Update (Slots Delete)', 'The booking time on  at has been deleted.'),
(31, 'Booking Notification', 'You have a booking at 19:00:00'),
(32, 'Booking Update (Slots Delete)', 'The booking time on  at has been deleted.'),
(33, 'Booking Update (Slots Delete)', 'The booking time on  at has been deleted.'),
(34, 'Booking Notification', 'You have a booking at 15:00:00'),
(35, 'Booking Update (Slots Delete)', 'The booking time on 2022-10-26 at 15:00:00has been deleted.'),
(36, 'Booking Update (Slots Delete)', 'The booking time on 2022-10-26 at 15:00:00has been deleted.'),
(37, 'Booking Notification', 'You have a booking at 22:00:00'),
(38, 'Booking Notification', 'You have a booking at 09:00:00'),
(39, '123456', ' 123455'),
(40, '123456', ' 1234556789'),
(41, '123456', ' 12345567890'),
(42, 'Booking Slots Update', 'The booking at 09:00:00 has changed to 2022-10-25 at 10:00:00'),
(43, 'Booking Slots Update', 'The booking at 09:00:00 has changed to 2022-10-25 at 10:00:00'),
(44, 'Booking Cancellation', 'You hava cancelled your booking on 12:00:00</br>Remarks: '),
(45, 'Booking Notification', 'You have a booking at 09:00:00'),
(46, 'Booking Notification', 'You have a booking at 09:00:00'),
(47, 'Booking Slots Update', 'The booking at 11:00:00 has changed to 2022-10-25 at 09:00:00'),
(48, 'Booking Slots Update', 'The booking at 11:00:00 has changed to 2022-10-25 at 09:00:00'),
(49, 'Booking Notification', 'You have a booking at 09:00:00'),
(50, 'Booking Notification', 'You have a booking at 11:00:00'),
(51, 'Booking Notification', 'You have a booking at 11:00:00'),
(52, 'Booking Notification', 'You have a booking at 15:00:00'),
(53, 'Booking Notification', 'You have a booking at 14:00:00'),
(54, 'Booking Slots Update', 'The booking at 13:00:00 has changed to 2022-10-25 at 15:00:00'),
(55, 'Booking Slots Update', 'The booking at 13:00:00 has changed to 2022-10-25 at 15:00:00'),
(56, 'Booking Cancellation', 'You hava cancelled your booking on 14:00:00 </br> Remarks: '),
(57, 'Appointment Update', 'You have a booking at 14:00:00'),
(58, 'Appointment Update', 'You have a booking at 15:00:00'),
(59, 'Booking Cancellation', 'You have cancelled your booking on 14:00:00 </br> Remarks: '),
(60, 'Booking Notification', 'You have a booking at 15:00:00'),
(61, 'testing6', ' tetsing1234567890'),
(62, '123456', ' 12345567890'),
(63, 'tetsing5', '1abc23456789'),
(64, 'asfdfdsf', 'fdsgfdgdfggdfgdfghd'),
(65, 'asfdfdsf', 'fdsgfdgdfggdfgdfghd'),
(66, 'Buy 1 get another one at 50% off!', 'This is the moment you'),
(67, 'Buy 1 get another one at 50% off!', 'This is the moment you'),
(68, 'testing', 'testingtesting'),
(69, 'Booking Cancellation', 'You have cancelled your booking on 12:00:00 </br> Remarks: '),
(70, 'Booking Cancellation', 'You have cancelled your booking on 12:00:00 </br> Remarks: ');

-- --------------------------------------------------------

--
-- Table structure for table `notif_adv`
--

CREATE TABLE `notif_adv` (
  `advID` int(10) NOT NULL,
  `notifID` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notif_bookings`
--

CREATE TABLE `notif_bookings` (
  `bookingID` int(10) UNSIGNED NOT NULL,
  `notifID` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notif_bookings`
--

INSERT INTO `notif_bookings` (`bookingID`, `notifID`, `status`) VALUES
(18, 3, 0),
(19, 4, 0),
(20, 5, 1),
(20, 11, 1),
(21, 8, 1),
(22, 9, 1),
(23, 10, 1),
(24, 12, 1),
(28, 37, 1),
(29, 38, 1),
(30, 46, 1),
(31, 50, 1),
(32, 52, 1),
(33, 53, 1);

-- --------------------------------------------------------

--
-- Table structure for table `notif_promo`
--

CREATE TABLE `notif_promo` (
  `promoID` int(11) NOT NULL,
  `notifID` int(10) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notif_promo`
--

INSERT INTO `notif_promo` (`promoID`, `notifID`, `status`) VALUES
(5, 6, 1),
(6, 7, 1),
(7, 21, 1),
(8, 39, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prodID` int(10) UNSIGNED NOT NULL COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.',
  `prodTitle` text NOT NULL,
  `prodDesc` text DEFAULT NULL,
  `prodImage` varchar(100) NOT NULL,
  `prodAddedDate` date NOT NULL DEFAULT current_timestamp(),
  `prodVisible` int(1) NOT NULL DEFAULT 1 COMMENT '0 = not visible; 1 = visible; determines whether the products will be shown in the products page for the users or not.',
  `prodAddedBy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prodID`, `prodTitle`, `prodDesc`, `prodImage`, `prodAddedDate`, `prodVisible`, `prodAddedBy`) VALUES
(1, 'Flaming Katy (kalanchoe blossfeldiana)', 'The flaming katy is a common houseplant that is native to Madagascar. It prefers temperatures from 60 to 85 degrees, and is extremely sensitive to the cold which is why it is best suited for indoors. The flaming katy grows best in clay pots that have holes at the bottom for drainage.', 'images/product1.jpg', '2022-10-01', 1, 1),
(2, 'Crown of Thorns (euphorbia milii)', 'The crown of thorns is a great houseplant because it adjusts well to dry indoor environments and room temperatures. The crown of thorns is very lenient when it comes to missed waterings, but make sure to only water the plant when its soil is completely dry', 'images/product2.jpg', '2022-10-15', 1, 1),
(3, 'Burro\'s Tail (sedum morganianum)', 'Also known as the donkey tail plant, this succulent is one of the easiest plants to propagate and care for, which makes it a popular houseplant. The burro’s tail was given its name because of its ability to grow up to four inches long with a shape that resembles a tail.', 'images/product3.jpg', '2022-10-15', 1, 1),
(4, 'Jade Plant (crassula ovata)', 'The jade plant is similar to a bonsai plant in the way that it grows and is maintained. It has a thick trunk with branches that jut out like a miniature tree. This succulent has thick, shiny, dark green leaves that grow into an oval shape. Some varieties of the jade plant develop a red color at the tip of the leaf. Once the plant matures and if the conditions are right, the jade plant can develop beautiful white or pink flowers that bloom in the shape of a star.', 'images/product4.jpg', '2022-10-15', 1, 1),
(5, 'Aloe Vera (aloe vera)', 'Aloe vera is a variety of houseplant that is most known for its medical benefits. It has been grown in tropical climates for many years and cultivated for its medicinal purposes. You can use the healthy compounds of the aloe vera plant to ease scrapes and burns, so it is a great plant to have around the house. This succulent can be found in ointments for burns, skin lotion, drinks and cosmetics. It can also be used for decorative purposes as an indoor plant. This plant has thick, pointed leaves that are usually a green-gray color. The leaves are variegated with spots of white that stretch out directly from the plant’s base.', 'images/product5.jpg', '2022-10-15', 1, 1),
(6, 'Panda Plant (kalanchoe tomentosa)', 'The panda plant is one of the most interesting types of indoor succulents because of its small and fuzzy leaves. The velvety appearance of its leaves and brownish-red markings on its edges are what earned it the name of the panda plant. They can live for many years indoors and although this type of succulent can flower in the right circumstances, it rarely does. Because of the panda plant’s small size and soft texture, it looks great in children’s rooms or in hanging planters.', 'images/product6.jpg', '2022-10-15', 1, 1),
(7, 'Pincushion Cactus (mammillaria crinita)', 'The pincushion plant is of the cactus variety and has pointy spikes covering its exterior. It is native to Mexico, but has also been found in some southwest areas of the United States. This succulent belongs to the mammillaria family, which consists of over 250 species of cacti. The Latin word mammillaria means “nipple” and refers to the tube-like features that protrude out of its exterior. The pincushion is a miniature cactus that usually does not grow taller than six inches and produces vibrant blooms that add a  desert vibe to your home.', 'images/product7.jpg', '2022-10-15', 1, 1),
(8, 'Roseum (sedum spurium)', 'The roseum plant is a low-growing succulent that only gets to be about four to six inches tall. It is a fast grower that works great in containers or planters on a windowsill. In the summer, the roseum develops clusters of light-pink star flowers that can add a pop of color to your home decor. It can also add texture to a floral arrangement. This succulent prefers full sun to partial shade, so we recommend placing it on a windowsill that gets a decent amount of light.', 'images/product8.jpg', '2022-10-15', 1, 1),
(9, 'Snake Plant (sansevieria trifasciata)\r\n', 'Native to West Africa, the snake plant is one of the easiest succulents to cultivate. It can be neglected for long periods of time and still maintain its fresh look. This plant has long, variegated leaves in different shades of green. It is one of the most tolerant types of indoor succulents and can survive in rooms with low light and little water', 'images/product9.jpg', '2022-10-15', 1, 1),
(10, 'Zebra Plant (haworthia fasciata)', 'The zebra plant can grow between five and six inches tall and wide. It does not take up a lot of room and does not require much care, so it works well as a houseplant. The zebra plant gets its name from the white variegated stripes on its leaves. These striking leaves point out from its stem in different directions. This plant has shallow roots and is best grown in smaller pots. The zebra plant produces bright yellow, cone-shaped flower heads that last about a week. They are dainty, slow-growing and have an eccentric appearance. They make great gifts and decor for a shelf or desk.', 'images/product10.jpg', '2022-10-15', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `discID` int(10) UNSIGNED NOT NULL COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.',
  `discProduct` int(10) UNSIGNED NOT NULL,
  `prodDisc` text NOT NULL,
  `discAddedDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `discVisible` int(1) NOT NULL DEFAULT 1 COMMENT '0 = not visible; 1 = visible; determines whether the products will be shown in the products page for the users or not.',
  `discAddedBy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`discID`, `discProduct`, `prodDisc`, `discAddedDate`, `discVisible`, `discAddedBy`) VALUES
(1, 1, 'This is a good plant and easy to be taken of', '2022-11-07 17:58:25', 1, 3),
(2, 1, 'What are the trending plants?', '2022-11-07 17:58:28', 1, 5),
(3, 2, 'Haha', '2022-11-07 18:58:25', 1, 7),
(4, 2, 'Yesyes', '2022-11-07 18:59:29', 1, 7),
(5, 2, 'Nice', '2022-11-09 20:58:25', 1, 7),
(6, 3, 'Thankyou', '2022-11-09 21:58:25', 1, 3),
(7, 3, 'Welcome', '2022-11-09 22:58:25', 1, 5),
(8, 3, 'Hello there', '2022-11-09 23:28:25', 1, 7),
(9, 3, 'Good one', '2022-11-09 23:38:25', 1, 7),
(10, 4, 'Owhh', '2022-11-10 23:48:25', 1, 8);

-- --------------------------------------------------------
--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `promoID` int(11) NOT NULL COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.',
  `promoTitle` text NOT NULL,
  `promoDesc` text NOT NULL,
  `promoImage` varchar(50) NOT NULL,
  `promoDateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `promoDuration` timestamp NOT NULL DEFAULT '2022-12-31 20:00:00' COMMENT 'The admins can set how long they want this promotion to last. At the exact time of this field, it will change the visibility field to 0.',
  `promoVisible` int(1) NOT NULL DEFAULT 1,
  `promoAddedBy` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promotions`
--

INSERT INTO `promotions` (`promoID`, `promoTitle`, `promoDesc`, `promoImage`, `promoDateCreated`, `promoDuration`, `promoVisible`, `promoAddedBy`) VALUES
(1, 'Buy 1 get another one at 50% off!', 'This is the moment you', 'images/promo1.jpg', '2022-10-14 19:13:30', '2022-11-25 20:00:00', 1, 4),
(2, 'testing', 'testingtesting', 'images/promo1.jpg', '2022-10-21 12:43:51', '2022-11-01 12:43:04', 1, 5),
(3, 'asfdfdsf', 'fdsgfdgdfggdfgdfghd', 'images/promo1.jpg', '2022-10-21 13:16:03', '2022-11-01 13:15:01', 1, 5),
(4, 'Testing2', ' Tetsing testing testing ......', 'images/plants3.jpg', '2022-10-23 14:17:32', '2022-10-26 14:16:00', 0, 2),
(5, 'tetsing4', ' testing4', 'images/promo3.jpg', '2022-10-23 14:43:50', '2022-10-24 14:43:00', 1, 2),
(6, 'tetsing5', '1abc23456789', 'images/promo3.jpg', '2022-10-23 14:46:19', '2022-10-24 14:46:00', 1, 2),
(7, 'testing6', ' tetsing1234567890', 'images/promo1.jpg', '2022-10-24 12:08:16', '2022-10-26 12:07:00', 1, 1),
(8, '123456', ' 12345567890', 'images/promo2.jpg', '2022-10-24 13:41:05', '2022-10-26 13:41:00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `reviewID` int(10) NOT NULL,
  `reviewComment` varchar(500) NOT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `reviewVisible` int(1) NOT NULL DEFAULT 1,
  `reviewAccID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`reviewID`, `reviewComment`, `reviewDate`, `reviewVisible`, `reviewAccID`) VALUES
(1, 'This website is the best. :>', '2022-09-30 17:58:25', 1, 1),
(2, 'This website is degrading! Boo!', '2022-09-30 17:58:57', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `support_tickets`
--

CREATE TABLE `support_tickets` (
  `ticketID` int(10) NOT NULL,
  `ticketTitle` text NOT NULL,
  `ticketDesc` text NOT NULL,
  `ticketType` int(1) NOT NULL COMMENT '1 = general inquiries; 2 = product related; 3 = ...',
  `ticketDateCreated` timestamp NOT NULL DEFAULT current_timestamp(),
  `ticketAdminID` int(10) UNSIGNED NOT NULL,
  `ticketMemberID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `support_tickets`
--

INSERT INTO `support_tickets` (`ticketID`, `ticketTitle`, `ticketDesc`, `ticketType`, `ticketDateCreated`, `ticketAdminID`, `ticketMemberID`) VALUES
(1, 'I don\'t know how to plant grass :(', 'Heeello! Recently I bought grass seeds. How do I plant them? :<', 2, '2022-09-30 18:00:17', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`accID`);

--
-- Indexes for table `acc_bookings`
--
ALTER TABLE `acc_bookings`
  ADD PRIMARY KEY (`accID`,`bookingID`),
  ADD KEY `bookingID` (`bookingID`),
  ADD KEY `accID` (`accID`);

--
-- Indexes for table `acc_guide`
--
ALTER TABLE `acc_guide`
  ADD PRIMARY KEY (`guideAuthors`,`accID`),
  ADD KEY `guideAuthors` (`guideAuthors`),
  ADD KEY `agAccID` (`accID`);

--
-- Indexes for table `acc_notifications`
--
ALTER TABLE `acc_notifications`
  ADD PRIMARY KEY (`accID`,`notifID`),
  ADD KEY `accnotifID` (`notifID`),
  ADD KEY `accID` (`accID`);

--
-- Indexes for table `acc_preference`
--
ALTER TABLE `acc_preference`
  ADD PRIMARY KEY (`accID`,`prodID`),
  ADD KEY `accID` (`accID`),
  ADD KEY `prodID` (`prodID`);

--
-- Indexes for table `acc_products`
--
ALTER TABLE `acc_products`
  ADD PRIMARY KEY (`accID`,`prodID`),
  ADD KEY `prodID` (`prodID`),
  ADD KEY `accID` (`accID`);

--
-- Indexes for table `acc_purchasehistory`
--
ALTER TABLE `acc_purchasehistory`
  ADD PRIMARY KEY (`accID`,`prodID`),
  ADD KEY `accID` (`accID`),
  ADD KEY `prodID` (`prodID`);

--
-- Indexes for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD PRIMARY KEY (`advID`),
  ADD KEY `advAddedBy` (`advAddedBy`),
  ADD KEY `advAddedBy_2` (`advAddedBy`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`bannerID`),
  ADD KEY `bannerAddedBy` (`bannerAddedBy`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`bookingID`);

--
-- Indexes for table `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`guideID`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notifID`);

--
-- Indexes for table `notif_adv`
--
ALTER TABLE `notif_adv`
  ADD PRIMARY KEY (`advID`,`notifID`),
  ADD KEY `nnotifID` (`notifID`),
  ADD KEY `advID` (`advID`);

--
-- Indexes for table `notif_bookings`
--
ALTER TABLE `notif_bookings`
  ADD PRIMARY KEY (`bookingID`,`notifID`),
  ADD KEY `nNotiffID` (`notifID`),
  ADD KEY `bookingID` (`bookingID`);

--
-- Indexes for table `notif_promo`
--
ALTER TABLE `notif_promo`
  ADD PRIMARY KEY (`promoID`,`notifID`),
  ADD KEY `nnNotifID` (`notifID`),
  ADD KEY `promoID` (`promoID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prodID`),
  ADD KEY `prodAddedBy` (`prodAddedBy`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`discID`),
  ADD KEY `discProduct` (`discProduct`),
  ADD KEY `discAddedBy` (`discAddedBy`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`promoID`),
  ADD KEY `promoAddedBy` (`promoAddedBy`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`reviewID`),
  ADD KEY `reviewAccID` (`reviewAccID`);

--
-- Indexes for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD PRIMARY KEY (`ticketID`),
  ADD KEY `ticketAdminID` (`ticketAdminID`),
  ADD KEY `ticketMemberID` (`ticketMemberID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `accID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.', AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `advertisements`
--
ALTER TABLE `advertisements`
  MODIFY `advID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `bannerID` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `bookingID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.', AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `guides`
--
ALTER TABLE `guides`
  MODIFY `guideID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notifID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prodID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `discID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `promoID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Leave this field empty upon insertion as it will auto increase by itself.', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `reviewID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `support_tickets`
--
ALTER TABLE `support_tickets`
  MODIFY `ticketID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acc_bookings`
--
ALTER TABLE `acc_bookings`
  ADD CONSTRAINT `acAccID` FOREIGN KEY (`accID`) REFERENCES `accounts` (`accID`),
  ADD CONSTRAINT `acBookingID` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`);

--
-- Constraints for table `acc_guide`
--
ALTER TABLE `acc_guide`
  ADD CONSTRAINT `agAccID` FOREIGN KEY (`accID`) REFERENCES `accounts` (`accID`),
  ADD CONSTRAINT `agGuideAuthors` FOREIGN KEY (`guideAuthors`) REFERENCES `guides` (`guideID`);

--
-- Constraints for table `acc_notifications`
--
ALTER TABLE `acc_notifications`
  ADD CONSTRAINT `accACCID` FOREIGN KEY (`accID`) REFERENCES `accounts` (`accID`),
  ADD CONSTRAINT `accnotifID` FOREIGN KEY (`notifID`) REFERENCES `notification` (`notifID`);

--
-- Constraints for table `acc_preference`
--
ALTER TABLE `acc_preference`
  ADD CONSTRAINT `accprefProdID` FOREIGN KEY (`prodID`) REFERENCES `products` (`prodID`),
  ADD CONSTRAINT `accprefaccID` FOREIGN KEY (`accID`) REFERENCES `accounts` (`accID`);

--
-- Constraints for table `acc_products`
--
ALTER TABLE `acc_products`
  ADD CONSTRAINT `apAccID` FOREIGN KEY (`accID`) REFERENCES `accounts` (`accID`),
  ADD CONSTRAINT `apProdID` FOREIGN KEY (`prodID`) REFERENCES `products` (`prodID`);

--
-- Constraints for table `acc_purchasehistory`
--
ALTER TABLE `acc_purchasehistory`
  ADD CONSTRAINT `accphID` FOREIGN KEY (`accID`) REFERENCES `accounts` (`accID`),
  ADD CONSTRAINT `accphprodID` FOREIGN KEY (`prodID`) REFERENCES `products` (`prodID`);

--
-- Constraints for table `advertisements`
--
ALTER TABLE `advertisements`
  ADD CONSTRAINT `advAddedBy` FOREIGN KEY (`advAddedBy`) REFERENCES `accounts` (`accID`);

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `bannerAddedBy` FOREIGN KEY (`bannerAddedBy`) REFERENCES `accounts` (`accID`);

--
-- Constraints for table `notif_adv`
--
ALTER TABLE `notif_adv`
  ADD CONSTRAINT `nadvID` FOREIGN KEY (`advID`) REFERENCES `advertisements` (`advID`),
  ADD CONSTRAINT `nnotifID` FOREIGN KEY (`notifID`) REFERENCES `notification` (`notifID`);

--
-- Constraints for table `notif_bookings`
--
ALTER TABLE `notif_bookings`
  ADD CONSTRAINT `nNotiffID` FOREIGN KEY (`notifID`) REFERENCES `notification` (`notifID`),
  ADD CONSTRAINT `nbookingID` FOREIGN KEY (`bookingID`) REFERENCES `bookings` (`bookingID`);

--
-- Constraints for table `notif_promo`
--
ALTER TABLE `notif_promo`
  ADD CONSTRAINT `nnNotifID` FOREIGN KEY (`notifID`) REFERENCES `notification` (`notifID`),
  ADD CONSTRAINT `npromoID` FOREIGN KEY (`promoID`) REFERENCES `promotions` (`promoID`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `prodAddedBy` FOREIGN KEY (`prodAddedBy`) REFERENCES `accounts` (`accID`);

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discProduct` FOREIGN KEY (`discProduct`) REFERENCES `products` (`prodID`),
  ADD CONSTRAINT `discAddedBy` FOREIGN KEY (`discAddedBy`) REFERENCES `accounts` (`accID`);

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promoAddedBy` FOREIGN KEY (`promoAddedBy`) REFERENCES `accounts` (`accID`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviewAccID` FOREIGN KEY (`reviewAccID`) REFERENCES `accounts` (`accID`);

--
-- Constraints for table `support_tickets`
--
ALTER TABLE `support_tickets`
  ADD CONSTRAINT `ticketAdminID` FOREIGN KEY (`ticketAdminID`) REFERENCES `accounts` (`accID`),
  ADD CONSTRAINT `ticketMemberID` FOREIGN KEY (`ticketMemberID`) REFERENCES `accounts` (`accID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
