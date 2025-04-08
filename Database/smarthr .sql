-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 07, 2025 at 07:39 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smarthr`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(11) NOT NULL,
  `CompanyName` varchar(200) NOT NULL,
  `assetId` varchar(200) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Country` varchar(200) NOT NULL,
  `City` varchar(200) NOT NULL,
  `State` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `phone` int(50) NOT NULL,
  `Fax` int(50) NOT NULL,
  `website` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assets`
--

INSERT INTO `assets` (`id`, `CompanyName`, `assetId`, `PurchaseDate`, `Address`, `Country`, `City`, `State`, `Email`, `phone`, `Fax`, `website`, `contact`) VALUES
(1, 'Zarnaka Technologies', '001', '2020-09-23', 'Taw Ma, Meiktila, Mandalay', 'Myanmar', 'Meiktila', 'Manadalay', 'zarnaka@ucsmtla.edu.mm', 2147483647, 12, 'www.zarnaka.edu.mm', 'myokyaw');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(255) NOT NULL,
  `LastName` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Password` varchar(225) NOT NULL,
  `ClientId` varchar(225) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL,
  `Picture` varchar(225) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Nationality` varchar(100) NOT NULL,
  `Religion` varchar(100) NOT NULL,
  `Passportno` varchar(50) NOT NULL,
  `Relation` varchar(50) NOT NULL,
  `children` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `ClientId`, `Phone`, `Company`, `Address`, `Status`, `Picture`, `date`, `role`, `birthday`, `gender`, `Department`, `Nationality`, `Religion`, `Passportno`, `Relation`, `children`) VALUES
(1, 'Aye Moh Moh', 'Tun', 'ayemoh', 'ayemoh@gmail.com', '1234ayemoh', 'ADM-001', '09402557741', 'zarnaka', 'Yangon', 1, 'ayemoh.jpg', '2020-09-26', 'Admin', '5 Dec 1993', 'Female', 'Administration', 'Myanmar', 'Buddha', '9/MA THA LA(N) 227958', 'Single', '0');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `Department` varchar(200) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `Department`, `Date`) VALUES
(3, 'IT Department', '2020-09-26'),
(4, 'Web Development', '2020-09-27'),
(5, 'cleaning Department', '2025-02-16'),
(7, 'Information Science', '2025-02-18'),
(8, 'Android Department', '2025-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `designations`
--

CREATE TABLE `designations` (
  `id` int(11) NOT NULL,
  `Designation` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designations`
--

INSERT INTO `designations` (`id`, `Designation`, `Department`, `Date`) VALUES
(1, 'Web Designer', 'Web Development', '2020-09-27'),
(4, 'Design', 'Web Development', '2025-02-16'),
(5, 'Data Analysis', 'Information Science', '2025-02-18'),
(6, 'flutter', 'Android Department', '2025-02-18'),
(7, 'java developer', 'Android Department', '2025-02-18'),
(8, 'Meeting Room cleaner', 'cleaning Department', '2025-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `UserName` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Employee_Id` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Department` varchar(255) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Joining_Date` date NOT NULL DEFAULT current_timestamp(),
  `Picture` varchar(200) NOT NULL,
  `DateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `gender` varchar(25) NOT NULL,
  `address` varchar(100) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `Fathern` varchar(50) NOT NULL,
  `fatherph` int(25) NOT NULL,
  `brothern` varchar(50) NOT NULL,
  `brotherph` int(25) NOT NULL,
  `Passportno` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_german2_ci NOT NULL,
  `Nationality` varchar(25) NOT NULL,
  `Religion` varchar(25) NOT NULL,
  `Relation` varchar(25) NOT NULL,
  `children` int(25) NOT NULL,
  `Salary` int(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `Employee_Id`, `Phone`, `Department`, `Designation`, `Joining_Date`, `Picture`, `DateTime`, `gender`, `address`, `birthday`, `Fathern`, `fatherph`, `brothern`, `brotherph`, `Passportno`, `Nationality`, `Religion`, `Relation`, `children`, `Salary`) VALUES
(1, 'Wai Phyo', 'Kyaw', 'wai', 'waiphyokyaw@gmail.com', '1234', 'EMP-17000', '09757307449', 'Database Department', 'Data Analysis', '2025-02-04', 'wai.jpg', '2025-02-09 20:38:17', 'Male', 'Bagan', '14 Feb 2005', 'U Thien Zaw', 447942747, 'Ko Kyaw ', 876587424, '9/NYA OU NA(N)324564', 'Myanmar', 'buddah', 'Relationship', 3, 1550000),
(3, 'Zaw Zaw', 'Aung', 'zaw', 'zawzawaung@gmail.com', '1234', 'EMP-283560    ', '09676844072', 'Web Development', 'Web Developer', '2025-02-04', 'zawzawaung.jpg', '2020-09-28 23:46:51', 'Male', 'Meiktila', '23 March 2000', 'U Kyi lwin', 954180106, 'A kyi kaung', 676844072, '9/TN(N)199662', 'Myanmar', 'buddah', 'FA', 0, 600000),
(4, 'San', 'Kyaw', 'san', 'sankyaw@gmail.com', '1234', 'EMP-743619', '09676844072', 'Web Development', 'Web Developer', '2020-09-29', 'myokyawthu.png', '2020-09-29 00:04:29', 'Female', 'Lashio', '12 Feb 1998', 'U Maung Htay', 966677148, 'Shwe Tun', 974010084, '234876', 'Myanmar', 'buddah', 'RS', 0, 670000),
(5, 'Hsu Wati', 'Nwe', 'hsu', 'Hsuwatinwe@gmail.com', '1234', 'EMP-186249 ', '09796899690', 'Web Development', 'Web Designer', '2020-09-29', 'hsu.jpg', '2020-09-29 00:14:44', 'Female', 'Mandalay', '12 Feb 2004', 'U ', 967538753, 'Ko Myo Kyaw Thu', 790529192, '9/MA THA LA(N) ', 'Myanmar', 'buddah', 'Single', 0, 650000),
(7, 'Han', 'Sein', 'han', 'hansein@gmail.com', '$2y$10$LQtUcXpKLaCiy.xDdrXgcOep6Fo7Lydx4pkw.n0aFifJLaJsVnUHG', 'EMP-423987', '09123456789', 'IT Department', 'Web Designer', '2025-02-17', 'ba5.jpg', '2025-02-17 21:58:40', 'Male', 'mandaly', '12 Feb 1998', 'U Kyi lwin', 966677148, 'Shwe Tun', 790529192, '9/TN(N)199662', 'Myanmar', 'buddah', 'RS', 4, 650000),
(8, 'Htay ', 'Kyaw', 'sankyaw', 'sd@gmail.com', '$2y$10$lDtXM.dYGI6ppZP5bUE4aeK0vMZxms.PtYldjviinL0xoums9LYp6', 'EMP-741825', '09678643654', 'Web Development', 'Web Designer', '2025-02-18', 'htaykyaw.jpg', '2025-02-18 21:50:40', 'Male', 'ရမည်းသင်း', '28 Apriol', 'ဉီးကျော်ထူး', 942108561, 'မောင်ကျော်ထူး', 966612456, '၉/မထလ(နိုင်)360359', 'Myanmar', 'buddah', 'married', 1, 340000),
(10, 'Shwe ', 'Yee', 'Shwer', 'sheer12333@gmail.com', '$2y$10$e4IbMjkVvkws1R1EEXkBfOlhxZHeDzYXzmL/CUcd6spbSZq.gcPUW', 'EMP-201795', '0943532365', 'cleaning Department', 'Meeting Room cleaner', '2025-02-18', 'kg5.jpg', '2025-02-18 22:55:44', 'Female', 'နေပြည်တော်၊လယ်ဝေး', '23 March 2000', 'ဉီးကျော်မင်းလတ်', 978965412, 'KO Htoo Thar', 963216544, '၉/မထလ(နိုင်)၁၂၃၆၄၅', 'Myanmar', 'buddah', 'RS', 0, 300000),
(11, 'Aye ', 'Myat', 'Ayemyat', 'aye1222@gmai.com', '$2y$10$EGvmuhWP1b64J5yW1BMRAuY/7htp5MJOjZf0rpDsEBp0HE4Zri962', 'EMP-145680', '0966557436', 'Web Development', 'Web Designer', '2025-02-18', 'kg5.jpg', '2025-02-18 22:57:12', 'Female', 'မန္တလေးတိုင်းဒေသကြီး၊မိတ္ထီလာမြို့နယ်၊ကူတော်ကျေးရွာ၊အင်းအုပ်စု၊ကူတော်ကျေးရွာ', '၂၅/၄/၂၀၀၀', 'ဦးမောင်တင်', 963254187, 'မောင်ကောင်းကောင်း', 978456123, '၉/ကစန(နိုင်)၄၅၈၇၆၃', 'Myanmar', 'buddah', 'married', 2, 750000),
(12, 'Aung Ko', 'Linn', 'Aungasasd', 'Aung122@gmai.com', '$2y$10$wFeFD1obE6eRXMtzvQCxzuKs60TIsAF9ZCSO0JKKs24ggvHJZE1Fi', 'EMP-921453', '09564765443', 'Android Department', 'java developer', '2025-02-18', 'ba2.jpg', '2025-02-18 23:00:20', 'Male', 'ယတန်း', '12 Feb 1998', 'ဉီးစိုးဝင်း', 966677148, 'မောင်စည်သူဟိန်းထက်', 974010084, '၉/မထလ(နိုင်)၂၅၆၆၅၄', 'Myanmar', 'buddah', 'married', 1, 800000),
(13, 'Thant Zin', 'Phyo', 'ajdfhtl', 'thant212@gmail.com', '$2y$10$2w62qgi9MZG5pm/XUk/BrOeTAELUioKNR.Zt4wCiMfRc2XO7S6/FC', 'EMP-529013', '0933254232', 'Information Science', 'Data Analysis', '2025-02-18', 'ba4.jpg', '2025-02-18 23:02:00', 'Female', 'ပြင်သာ', '၂၅/၄/၂၀၀၀', 'ဦးမောင်ထူး', 63256456, 'မောင်ကောင်းကောင်းးစံ', 97842169, '၉/ကစန(နိုင်)၄၅၈၇၆၃', 'Myanmar', 'buddah', 'married', 1, 500000),
(14, 'Aung Zayar', 'Phyoe', 'asdfsadf', 'aungads2@gmail.com', '$2y$10$xsOsIHCh1gnmcSSG5dT38ua.wB7GPLaNrQKlyHCAav.wU5h61uK8y', 'EMP-518634', '09676535632', 'Android Department', 'java developer', '2025-02-18', 'ba5.jpg', '2025-02-18 23:03:32', 'Male', 'မြင်းခြံ', '11 Dec 2003', 'ဉီးဆင်မင်း', 942108561, 'မောင်အောင်ဇေယျမျိုး', 965651962, '၉/ကစန(နိုင်)၄၅၆၂၁၈', 'Myanmar', 'Buddaha', 'Single', 0, 420000),
(15, 'Hein', 'Thu', 'asdfsadf', 'hein12@gmail.com', '$2y$10$iSDobRFkO9E6uOin4Zzxnuw/72EoSgni96AlAFK9kELd03mHxZXaO', 'EMP-608931', '091231234567', 'cleaning Department', 'Meeting Room cleaner', '2025-02-18', 'ba1.jpg', '2025-02-18 23:05:21', 'Male', 'ကျောက်ပန်းတောင်း၊မန္တလေးတိုင်းဒေသကြီး', '11 Dec 2003', 'ဉီးခေမာစာရ', 942108561, 'မောင်တင်မောင်', 974001777, '၉/ကစန(နိုင်)၄၅၆၂၁၈', 'Myanmar', 'Buddaha', 'Single', 0, 350000);

-- --------------------------------------------------------

--
-- Table structure for table `holidays`
--

CREATE TABLE `holidays` (
  `id` int(11) NOT NULL,
  `Holiday_Name` varchar(200) NOT NULL,
  `Holiday_Date` date NOT NULL,
  `EndDate` date NOT NULL,
  `Day` int(25) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Department` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `holidays`
--

INSERT INTO `holidays` (`id`, `Holiday_Name`, `Holiday_Date`, `EndDate`, `Day`, `UserName`, `Department`, `State`) VALUES
(5, 'ကျောင်းသွားတက်ရန်', '2025-02-10', '2025-02-17', 33, 'hsuwatinwe', 'web', 'Accepted'),
(44, 'ကောင်မလေးနှင့်သွားတွေ့ရန်', '2025-02-16', '2025-02-18', 2, 'zaw', 'Web Development', 'Rejected'),
(51, 'ပြည်ထောင်စုနေ့', '2025-02-12', '2025-02-13', 1, 'myokyawthu', 'HR', 'Accepted'),
(53, 'Thingyan', '2025-02-23', '2025-02-25', 2, 'myokyawthu', 'HR', 'Accepted'),
(54, 'school', '2025-02-23', '2025-02-25', 2, 'zaw', 'Web Development', 'padding'),
(55, 'ရုံးအားလပ်ရက်', '2025-02-12', '2025-02-27', 15, 'ayemoh', 'Admin', 'Accepted'),
(56, 'ရေသွားကူးရန်', '2025-02-26', '2025-02-27', 1, 'wai', 'Information Science', 'padding'),
(57, 'အိမ်ပြန်ရန်', '2025-02-26', '2025-02-27', 1, 'zaw', 'Web Development', 'Accepted'),
(58, 'Feb14', '2025-02-26', '2025-02-27', 1, 'zaw', 'Web Development', 'Rejected'),
(59, 'Feb14', '2025-02-26', '2025-02-28', 2, 'zaw', 'Web Development', 'Rejected'),
(60, 'Thingyan', '2025-02-27', '2025-02-28', 1, 'ayemoh', 'Admin', 'Accepted');

-- --------------------------------------------------------

--
-- Table structure for table `hr`
--

CREATE TABLE `hr` (
  `id` int(11) NOT NULL,
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `UserName` varchar(200) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL,
  `HR_id` varchar(50) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `Passportno` varchar(50) NOT NULL,
  `Nationality` varchar(25) NOT NULL,
  `Religion` varchar(25) NOT NULL,
  `Relation` varchar(25) NOT NULL,
  `children` int(10) NOT NULL,
  `Fathern` varchar(25) NOT NULL,
  `fatherph` varchar(25) NOT NULL,
  `brothern` varchar(25) NOT NULL,
  `brotherph` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hr`
--

INSERT INTO `hr` (`id`, `FirstName`, `LastName`, `UserName`, `Email`, `Password`, `Phone`, `Address`, `Picture`, `dateTime`, `role`, `HR_id`, `Department`, `gender`, `birthday`, `Passportno`, `Nationality`, `Religion`, `Relation`, `children`, `Fathern`, `fatherph`, `brothern`, `brotherph`) VALUES
(1, 'Myo Kyaw', 'Thu', 'myokyawthu', 'myokyawthu@ucsmtla.edu.mm', '227958', '09790529192', 'QTR-9, NAL-1, Lashio', 'myokyawthu1.jpg', '2025-09-21 19:04:47', 'HR Manager', 'HR-01', 'Human Resource Management', 'Male', '11 Dec 2003', '7/PA MA NA(N)227958', 'Myanmar', 'buddah', 'Single', 0, 'U Tun Tun', '09666759714', 'Ko Thant Zaw Myint', '09740010084'),
(2, 'Zar Ni\r\n\r\n\r\n', 'Maung', 'zarnasdf', 'musheabdulhakim@protonmail.ch', '00231\r\n\r\n\r\n', '09676844072', 'San Francisco Bay Area', 'zarnimaung.jpg', '2020-09-21 19:05:43', 'HR Assistant', 'HR-02', 'Human Resource ', 'Male', '11 Feb 2005', '၉/လ၀န(နိင်)၃၁၃၇၅၁', 'Myanmar', 'buddah', 'Single', 0, 'U Thain Tun', '0931005684', 'Ko Aung Zaw Tun', '09740010084'),
(3, 'Htay\r\n', 'kyaw', 'htayasdf', 'mu112@gmail.com', '10235', '09790529192', 'San Francisco Bay Area', 'htaykyaw.jpg', '2020-09-21 19:05:43', 'HR Assistant', 'HR-03', 'Human Resource ', 'Male', '28 Apri 2005', '၉/လ၀န(နိင်)567891', 'Myanmar', 'buddah', 'Single', 0, 'U Htay Myaing', '09685681962', 'Bo Bo', '09400125892'),
(4, 'Kaung Linn\r\n', 'Thant', 'kaunglinthant', 'musd112@gmail.com', '12564', '09676844072', 'San Francisco Bay Area', 'kaung.jpg', '2020-09-21 19:05:43', 'HR Assistant', 'HR-04', 'Human Resource ', 'Male', '11 Feb 2005', '၉/လ၀န(နိင်)၃၁၃၃၂၁', 'Myanmar', 'buddah', 'Single', 0, 'U Thain Tun', '0931005684', 'thu ta', '09740017774'),
(5, 'Aung Wai\r\n', 'Phyoe', 'htadsyasdf', 'mau112@gmail.com', '103265', '09790529192', 'San Francisco Bay Area', 'aungwaai.jpg', '2020-09-21 19:05:43', 'HR Assistant', 'HR-05', 'Human Resource ', 'Male', '15Feb 2003', '၉/လ၀န(နိင်)၃၁၃၂၂၂', 'Myanmar', 'buddah', 'Single', 0, 'U Ba OO', '09685651962', 'ယောက်ဖလေး', '09650813838');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(11) NOT NULL,
  `Employee` varchar(200) NOT NULL,
  `Starting_At` date NOT NULL,
  `Ending_On` date NOT NULL,
  `Days` int(200) NOT NULL,
  `Reason` text NOT NULL,
  `Time_Added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `Employee`, `Starting_At`, `Ending_On`, `Days`, `Reason`, `Time_Added`) VALUES
(1, 'Goerge Merchason', '2020-09-01', '2020-10-01', 10, 'This is a test to the leaving system', '2020-10-04 01:50:34'),
(2, 'Mushe Abdul-Hakim', '2020-09-01', '2020-10-16', 10, 'this is another reason why he going home for number of days', '2020-10-04 01:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `UserName` varchar(100) NOT NULL,
  `messagetext` text DEFAULT current_timestamp(),
  `role` varchar(150) NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `UserName`, `messagetext`, `role`, `time`) VALUES
(1, 'hsuwatinwe', 'HR အကိုကအရမ်းချောတယ်နော်', 'employee', '2025-02-24 12:14:20'),
(3, 'hsuwatinwe', 'ဒီနေ့ရုံးပိတ်တယ်ဆို', 'employee', '2025-02-24 12:20:20'),
(18, 'zaw', 'ပျင်းလိုက်တာ', 'employee', '2025-02-24 12:25:20'),
(40, 'myokyawthu', 'ဟုတ်တယ်', 'Admin', '2025-02-24 13:14:20'),
(42, 'ayemoh', 'hi', 'Admin', '2025-02-24 12:14:20'),
(43, 'ayemoh', 'hi', 'Admin', '2025-02-24 12:14:25'),
(46, 'ayemoh', 'ဟုတ်တယ်လေ အကိုကချောပြီးသားလေ', 'Admin', '2025-02-25 07:42:01'),
(47, 'zaw', 'အိပ်ချင်လိုက်တာ', 'employee', '2025-02-25 14:58:21'),
(48, 'wai', 'ကျွန်တော်နာမည်ဝေဖြိူးကျော်ပါ ', 'employee', '2025-02-25 15:17:26'),
(49, 'myokyawthu', 'hello', 'Admin', '2025-02-25 16:02:21'),
(50, 'zaw', 'hi', 'employee', '2025-02-25 16:02:34'),
(51, 'myokyawthu', 'ရိုင်းပေါ့ကွာ', 'Admin', '2025-02-26 01:56:00'),
(52, 'zaw', 'အိပ်ချင်', 'employee', '2025-02-26 02:44:35'),
(53, 'myokyawthu', 'zawzaw', 'Admin', '2025-02-26 02:49:42');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

CREATE TABLE `overtime` (
  `id` int(11) NOT NULL,
  `Employee` varchar(200) NOT NULL,
  `OverTime_Date` date NOT NULL,
  `Hours` time(2) NOT NULL,
  `Type` varchar(200) NOT NULL,
  `Description` text NOT NULL,
  `dateTime` datetime NOT NULL DEFAULT current_timestamp(),
  `State` varchar(50) NOT NULL,
  `UserName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`id`, `Employee`, `OverTime_Date`, `Hours`, `Type`, `Description`, `dateTime`, `State`, `UserName`) VALUES
(6, 'Hsu Wati Nwe', '2025-02-06', '00:00:12.00', 'web design ', 'Design ကူဆွဲရန်', '2025-02-16 20:13:04', 'padding', 'hsu'),
(14, 'Zaw Zaw Aung', '2025-02-23', '03:15:00.00', ' သန့်ရှင်းရေးလုပ်ပေးရန်', 'wai phyo kyawနှင့်အတူတူသန့်ရှင်းရေးလုပ်ရန်', '2025-02-22 12:15:33', 'Accepted', 'zaw'),
(15, 'Wai Phyo Kyaw', '2025-02-25', '22:45:00.00', ' သန့်ရှင်းရေးလုပ်ပေးရန်', 'အမှိုက်များဖွသွားသည့်အတွက်', '2025-02-25 21:45:56', 'Accepted', 'wai'),
(18, 'Zaw Zaw Aung', '2025-02-19', '01:32:00.00', ' သန့်ရှင်းရေးလုပ်ပေးရန်', 'သေချာလုပ်ရန်', '2025-02-25 22:31:17', 'Accepted', 'zaw'),
(19, 'Zaw Zaw Aung', '2025-02-27', '22:18:00.00', ' သန့်ရှင်းရေးလုပ်ပေးရန်', 'ff', '2025-02-26 09:17:17', 'padding', 'san'),
(20, 'Zaw Zaw Aung', '2025-02-27', '22:19:00.00', ' သန့်ရှင်းရေးလုပ်ပေးရန်', 'tt', '2025-02-26 09:18:29', 'Rejected', 'zaw');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `id` int(11) NOT NULL,
  `empname` varchar(100) NOT NULL,
  `salary` varchar(100) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp(),
  `Employee_Id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`id`, `empname`, `salary`, `Date`, `Employee_Id`) VALUES
(1, 'Web Designer', '1500000', '2020-09-27', ''),
(2, 'Web Developer', '137463', '2020-09-27', '');

-- --------------------------------------------------------

--
-- Table structure for table `trainertype`
--

CREATE TABLE `trainertype` (
  `id` int(11) NOT NULL,
  `Trainer_Type` varchar(200) NOT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trainertype`
--

INSERT INTO `trainertype` (`id`, `Trainer_Type`, `Date`) VALUES
(3, 'Web Trainer', '2020-09-26'),
(4, 'UI/UX trainer', '2020-09-27'),
(5, 'C++ trainer', '2025-02-16'),
(6, 'PHP trainer', '2025-02-17'),
(7, 'အာပလာ', '2025-02-18');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `TrainerId` varchar(225) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Company` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL,
  `Picture` varchar(225) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `role` varchar(50) NOT NULL,
  `Type` varchar(100) NOT NULL,
  `Salary` varchar(100) NOT NULL,
  `Description` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `Name`, `UserName`, `Email`, `TrainerId`, `Phone`, `Company`, `Address`, `Status`, `Picture`, `date`, `role`, `Type`, `Salary`, `Description`) VALUES
(1, 'Aye Moh Moh', 'ayemoh', 'ayemoh@gmail.com', 'ADM-001', '09402557741', 'zarnaka', 'Yangon', 1, 'avatar-12.jpg', '2020-09-26', 'Admin', 'Web-Trainer', '1500000', 'MON to THU'),
(2, 'Vendetta', 'alkaline', 'musheabdulhakim99@gmail.com', 'CLT-217594', '233209229025', 'Falcon Systems', 'Live from home', 1, 'd41d8cd98f00b204e9800998ecf8427e1601112339', '2020-09-26', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`, `date`) VALUES
(1, 'admin\r\n', '2020-09-21'),
(2, 'employee', '2020-09-21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `assetId` (`assetId`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ClientId` (`ClientId`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Department` (`Department`);

--
-- Indexes for table `designations`
--
ALTER TABLE `designations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Employee_Id` (`Employee_Id`);

--
-- Indexes for table `holidays`
--
ALTER TABLE `holidays`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hr`
--
ALTER TABLE `hr`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `overtime`
--
ALTER TABLE `overtime`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Employee_Id` (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Employee_Id` (`Employee_Id`);

--
-- Indexes for table `trainertype`
--
ALTER TABLE `trainertype`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Department` (`Trainer_Type`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `TrainerId` (`TrainerId`) USING BTREE;

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `designations`
--
ALTER TABLE `designations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `holidays`
--
ALTER TABLE `holidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `hr`
--
ALTER TABLE `hr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `overtime`
--
ALTER TABLE `overtime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trainertype`
--
ALTER TABLE `trainertype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
