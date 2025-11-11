-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2025 at 11:46 PM
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
-- Database: `piyushproject2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `Name` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile_Number` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `State` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT 999
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`Name`, `Email`, `Mobile_Number`, `Address`, `State`, `Password`, `user_id`) VALUES
('Shri Balaji', 'admin@gmail.com', '+91 98375 47900 , +91 90127 55000', 'Opp. Sunday Market, Kashipur Road, Gadarpur (U.S.Nagar) Uttarakhand', 'Uttarakhand', 'admin@4321', 999);

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiries`
--

CREATE TABLE `contact_enquiries` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Subject` varchar(200) NOT NULL,
  `Phone` varchar(200) NOT NULL,
  `Message` text NOT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_enquiries`
--

INSERT INTO `contact_enquiries` (`id`, `Name`, `Email`, `Subject`, `Phone`, `Message`, `submitted_at`, `created_at`) VALUES
(1, 'Enquiry Name', 'enquiry12@gmail.com', 'Subject is English,', '9017772895', 'This is the last message', '2024-09-25 05:52:36', '2024-09-29 17:02:59'),
(2, 'Second Enquiry', 'lastenquiry321@gmail.com', 'No More Subject', '7818240327', 'New Message is here.', '2024-09-25 06:00:34', '2024-09-29 17:02:59'),
(5, 'Raju Srivastva', 'rajusharma1990@gmail.com', 'Want to know Services', '+91 88076 55512', 'Please Contact Me, As soon as possible.', '2024-10-02 16:51:41', '2024-10-02 16:51:41'),
(6, 'VgzHzjLYahCwk', 'hodabiche137@gmail.com', 'zRmXXIMBh', '8072404445', '', '2024-10-09 08:19:02', '2024-10-09 08:19:02'),
(7, 'EYgTfMfI', 'tiarratiarri@yahoo.com', 'HlyOhKUTROUH', '2132222006', '', '2024-10-15 15:53:12', '2024-10-15 15:53:12'),
(8, 'FrwKCsOp', 'martindayxr1984@gmail.com', 'CQuPyWcgqRI', '3653805706', '', '2024-10-20 06:33:49', '2024-10-20 06:33:49'),
(9, 'kossdesign', 'info@powerhouse.com', 'Personalized Contact Data Extraction from Google Maps', '81535229887', 'Tired of wasting time searching for businesses? IÐ²Ð‚â„¢ll extract all the relevant contacts from Google Maps for you! https://telegra.ph/Personalized-Contact-Data-Extraction-from-Google-Maps-10-03 (or telegram: @chamerion)', '2024-10-24 08:26:01', '2024-10-24 08:26:01'),
(10, 'hToaoaaN', 'hdjenz2002@gmail.com', 'WsWJTuohZv', '6143536987', '', '2024-10-24 11:17:01', '2024-10-24 11:17:01'),
(11, 'UOKVEobndoBt', 'wabrahamm1998@gmail.com', 'oOKPyqYttpY', '3383751667', '', '2024-10-27 16:50:27', '2024-10-27 16:50:27'),
(12, 'QmncyqlN', 'adinbraymr@gmail.com', 'xjrRtYUa', '8871860379', '', '2024-11-05 06:24:56', '2024-11-05 06:24:56'),
(13, 'ZczMeskYkfBuPqb', 'caldwellhu33@gmail.com', 'IpPqlEAQTDVAHWz', '7731420499', '', '2024-11-09 10:33:26', '2024-11-09 10:33:26'),
(14, 'bheHoHjyfbLZ', 'tjgztywrpr0o6w62t@yahoo.com', 'OyrGMeyoWypoCH', '4722211806', '', '2024-11-15 04:16:32', '2024-11-15 04:16:32'),
(15, 'LmvVqNdmBU', 'heleneta876@gmail.com', 'moJpsBDNXZ', '3293653328', '', '2024-11-16 02:15:02', '2024-11-16 02:15:02'),
(16, 'hvgzcvIz', 'blakesivardzj2005@gmail.com', 'fgByVSGhoq', '8786210536', '', '2024-11-17 00:43:38', '2024-11-17 00:43:38'),
(17, 'mlrNtdITCAO', 'pkkykveusw@yahoo.com', 'CtBXpItMV', '7880098192', '', '2024-11-18 04:55:24', '2024-11-18 04:55:24'),
(18, 'PaIFPRzrPpXhaP', 'hhoffman829@gmail.com', 'XqjQnGBg', '6791003618', '', '2024-11-20 10:23:26', '2024-11-20 10:23:26'),
(19, 'LfHcjXJlSBmj', 'arallabstro@yahoo.com', 'ISekujmZIWw', '8721839004', '', '2024-11-23 11:35:43', '2024-11-23 11:35:43'),
(20, 'LrYJVnvve', 'briverdi1984@gmail.com', 'aezPraWlz', '9370277129', '', '2024-11-26 05:54:14', '2024-11-26 05:54:14'),
(21, 'MLhjFyqnnN', 'k9vkwaaxv7@yahoo.com', 'dYSxaBmgzgLCUc', '3525724946', '', '2024-11-28 03:55:15', '2024-11-28 03:55:15'),
(22, 'MljTVYERRPZNZ', 'balissiarromance@yahoo.com', 'KRFBgdgX', '6052790332', '', '2024-11-30 13:16:22', '2024-11-30 13:16:22'),
(23, 'folKBjrMTJXw', 'harmonashlingy1997@gmail.com', 'yCTUItgMvwR', '4682504035', '', '2024-12-05 16:08:52', '2024-12-05 16:08:52'),
(24, 'NvvzerwVwYRggsL', 'ultsduynsidlkyrc@yahoo.com', 'uPXXedVKqT', '6230650746', '', '2024-12-06 11:47:37', '2024-12-06 11:47:37'),
(25, 'BHPIfWphsL', 'klodigoodii12@gmail.com', 'oRbiTgaSlcRFt', '2020226513', '', '2024-12-08 00:33:50', '2024-12-08 00:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Mobile_Number` varchar(255) DEFAULT NULL,
  `City` varchar(200) NOT NULL,
  `Address` text NOT NULL,
  `Password` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Name`, `Email`, `Mobile_Number`, `City`, `Address`, `Password`, `user_id`, `created_at`) VALUES
('Piyush Pandey', 'piyushpandey7428@gmail.com', '8860910067', 'Ranchi', 'D-Block, Mangolpuri , New Delhi - 110084', 'RanchiRanchi', 1, '2024-09-29 17:02:59'),
('James Bond', 'jamesbond101@gmail.com', '7428808432', 'Punjab', 'Shop No 1, Matruchaya, Kaapad Bazar, Jain Temple, Panvel, Navi Mumbai', 'randomm@123', 2, '2024-09-29 17:02:59'),
('Rahul Raj', 'rahuldetaya112@gmail.com', '1125178117', 'Mumbai', '1st Floor, Johari Mansion, 259, Kalbadevi Rd, Kalbadevi', 'lastpassword', 3, '2024-09-29 17:02:59'),
('New Entry', 'eliteconstructionecc@gmail.com', '9015912323', 'Raipur', 'D-Block, Mangolpuri , New Delhi - 110084', 'lastpassword', 4, '2024-09-29 17:02:59'),
('Latest User', 'userdetail123@gmail.com', '7428808434', 'Gujrat', 'D-Block, Mangolpuri , New Delhi - 110084', 'nopassword', 5, '2024-09-29 17:02:59'),
('Recent Login', 'recentlogin123@gmail.com', '9807645126', 'Bangalore', '11/4, Sri Maruthi Electronic Plaza, Pailwan Kirshnappa Road, Nr 1cross, S J P Road', 'recent!@#', 8, '2024-09-29 17:02:59'),
('Prakash Verma', 'prakash110@gmail.com', '7560918872', 'Chattisgarh', 'H-4/117, Ram Chowk, Chattisgarh', 'prakashmanav', 15, '2024-09-29 17:02:59'),
('Random Name', 'nameisrandom132@gmail.com', '9870684512', 'Delhi', 'D-6/16 Sultanpuri, New Delhi-110086', 'randomm1234', 16, '2024-09-29 17:02:59'),
('Surendra Kumar', 'surendra123@gmail.com', '9015912323', 'London', '9th Street, Lucknow, Uttar Pradesh', 'exclusive', 21, '2024-09-29 17:02:59'),
('Alex Thompson', 'alex.thompson@example.com', '5551234567', 'California', '123 Maple Street, San Francisco, CA 94101', 'A1exTh0mpson!2024', 22, '2024-10-02 07:43:50'),
('Khushi', 'heyitz.khushi@gmail.com', '8650855000', 'Uttarakhand ', 'Gadarpur ', 'khushipari', 23, '2024-10-03 08:14:04'),
('NARESH KUMAR', 'rukmaniseed@gmail.com', '9917934000', 'uttrakhand', 'gadarpur', 'monu1234', 24, '2024-10-07 11:03:10'),
('Damodar Das', 'damodardas1234@gmail.com', '8729392012', 'Kerala', 'Tamil Nadu, India', 'newpassword', 25, '2025-11-10 15:12:46');

-- --------------------------------------------------------

--
-- Table structure for table `user_forms`
--

CREATE TABLE `user_forms` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `starting_point` varchar(255) NOT NULL,
  `destination_point` varchar(255) NOT NULL,
  `owner_name` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(15) DEFAULT NULL,
  `driver_name` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(15) DEFAULT NULL,
  `license_number` varchar(50) DEFAULT NULL,
  `truck_number` varchar(50) DEFAULT NULL,
  `engine_number` varchar(50) DEFAULT NULL,
  `chasis_number` varchar(50) DEFAULT NULL,
  `description_of_goods` text DEFAULT NULL,
  `nett_weight` varchar(255) DEFAULT NULL,
  `settled_rate` varchar(255) DEFAULT NULL,
  `freight` varchar(250) DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `consignor` varchar(255) DEFAULT 'Not Filled',
  `consignee` varchar(255) DEFAULT 'Not Filled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_forms`
--

INSERT INTO `user_forms` (`id`, `user_id`, `starting_point`, `destination_point`, `owner_name`, `address`, `phone_number`, `driver_name`, `mobile_number`, `license_number`, `truck_number`, `engine_number`, `chasis_number`, `description_of_goods`, `nett_weight`, `settled_rate`, `freight`, `status`, `created_at`, `consignor`, `consignee`) VALUES
(14, 1, 'rudhrapur', 'delhi', 'Ramesh', 'rudhrapur', '9999999999', 'Raju', '123456789', '123456789', 'ab1232', 'A23D23123', 'FDER432333', 'GOODS', '150', '100', '', 'Approved', '2024-10-02 06:11:57', 'Not Filled', 'Not Filled'),
(15, 22, 'Los Angeles, CA', 'Denver, CO', 'John Smith', '456 Elm Street, Los Angeles, CA 90001', '7665557890', 'Mike Johnson', '981 555-1234', 'D1234567', ' TRK-9876', 'EN-23456789', 'CH-987654321', 'Electronics', '1500 kg', '$500.00', '$300.00', 'Approved', '2024-10-02 08:33:05', 'Not Filled', 'Not Filled'),
(19, 16, 'Delhi', 'Hyderabad, Telangana', 'Rajesh Gupta', '78 Lotus Apartments, New Delhi, DL 110020', '+91 11 4444 567', 'Sunil Mehta', '+91 99999 88888', 'DL-1122334455667', 'DL 02 AB 4321', 'EN135792468', 'CH2468135790', 'Agricultural Equipment', '2500 kg', 'â‚¹18,000', 'â‚¹11,500', 'Approved', '2024-10-02 09:40:31', 'Not Filled', 'Not Filled'),
(20, 16, 'Pune', 'Delhi', 'Neha Sharma', '22 Green Valley, New Delhi, DL 110033', '+91 11 6666 789', 'Prakash Rao', '+91 98765 12345', 'DL-2233445566778', 'DL 03 EF 9876', 'EN246813579', 'CH1357924680', 'Textile Fabrics', '3200 kg', 'â‚¹22,000', ' â‚¹14,000', 'Approved', '2024-10-02 09:42:31', 'Not Filled', 'Not Filled'),
(22, 2, 'Mumbai', 'Pune', ' Rajesh Sharma', '12B, Vasant Vihar, Mumbai, Maharashtra', '+91 9876543210', 'Mahesh Singh', '+91 9123456789', 'MH123456789012', 'MH04AB1234', 'EN12345678', 'CH98765432', 'Electronic Items', '1500 kg', 'â‚¹25,000', ' â‚¹2,000', 'Approved', '2024-10-02 09:49:17', 'Not Filled', 'Not Filled'),
(25, 15, 'Lucknow', 'Kanpur', 'Anil Yadav', '112, Gomti Nagar, Lucknow, Uttar Pradesh', '+91 9412345678', 'Pradeep Singh', '+91 9456781234', 'UP321987654321', 'UP32AA9876', ' EN19876543', 'CH23456789', 'Textile Products', '2200 kg', 'â‚¹30,000', 'â‚¹3,000', 'Approved', '2024-10-02 09:56:22', 'Not Filled', 'Not Filled'),
(26, 15, 'Bareilly', 'Patna', 'Prakash Gupta', '78, Civil Lines, Bareilly, Uttar Pradesh', '+91 9534567890', 'Surendra Kumar', '+91 9876543212', ' UP253467890123', 'UP25AA5432', 'EN76543210', 'CH45678912', 'Grain and Pulses', '3000 kg', 'â‚¹40,000', 'â‚¹4,000', 'Approved', '2024-10-02 09:58:04', 'Not Filled', 'Not Filled'),
(27, 21, 'Gaya, Bihar', 'Varanasi, Uttar Pradesh', 'Ramesh Tiwari', '45, Station Road, Gaya, Bihar', '+91 9123456789', 'Deepak Sharma', '+91 9898765432', 'BR021234567890', 'BR02BB1234', 'EN34567890', 'CH56789012', 'Construction Materials', ' 2700 kg', 'â‚¹32,000', 'â‚¹3,200', 'Approved', '2024-10-02 10:01:22', 'Not Filled', 'Not Filled'),
(28, 21, 'Bhagalpur, Bihar', 'Ranchi, Jharkhand', 'Mohan Prasad', '101, Tilkamanjhi, Bhagalpur, Bihar', '+91 9543216789', 'Arvind Kumar', '+91 9876123456', 'BR102345678901', ' BR10CC9876', 'EN65432109', 'CH89012345', 'Food Grains', '3200 kg', 'â‚¹38,000', 'â‚¹3,800', 'Approved', '2024-10-02 10:03:38', 'Not Filled', 'Not Filled'),
(32, 2, 'Gadarpur, Uttarakhand', 'Delhi, India', 'Ramesh Sharma', 'Village Gurudwara Road, Gadarpur, Uttarakhand', '9876543210', 'Suresh Yadav', '8765432109', 'DL123456789', 'UK06AA1234', 'EN9876543210', 'CH1234567890', 'Steel Rods', '5000 kg', 'â‚¹5 per kg', 'â‚¹25,000', 'Approved', '2024-10-02 14:44:26', 'Consignor Value', 'Consignne Value'),
(33, 1, 'New York', 'Los Angeles', 'John Doe', '123 Elm Street, Springfield, IL', '555-123-4567', 'Mike Johnson', '555-987-6543', 'ABC123456', 'TRK-7890', 'ENG-123456', 'CHS-654321', 'Electronics', '1500 kg', '$2000', '$2500', 'Approved', '2024-10-02 16:43:34', 'Jane Smith', 'ABC Distributors'),
(34, 5, 'Delhi', 'Mumbai', 'Rajesh Kumar', '123, Green Park, New Delhi', '9876543210', 'Anil Singh', '9123456789', 'DL-123456789', 'UP16 AB 1234', 'ENG-0987654321', 'CHS-8765432109', 'Electronics items', '500 kg', 'Rs. 20,000', 'Rs. 15,000', 'Approved', '2024-10-03 07:51:58', 'ABC Electronics Pvt Ltd', 'XYZ Traders'),
(35, 1, 'gadarpur', 'goukhpur', 'suresh', 'gadarpur', '9927560034', 'rhish', '12345', '2224', 'UK06CB1777', '12345', '12345', 'WHEET SEEDS', '350', '185', '64750\r\n-20000\r\n44750', 'Approved', '2024-10-04 06:23:17', 'PAN SEED GADARPUR ', 'MOTI CHNAD GAJIPUR'),
(36, 1, 'gadarpur', 'goukhpur', 'suresh', 'gadarpur', '9927560034', 'rhish', '12345', '2224', 'UK06CB1777', '12345', '12345', 'WHEET SEEDS', '350', '185', '64750\r\n-20000\r\n44750', 'Approved', '2024-10-04 06:26:05', 'PAN SEED GADARPUR ', 'MOTI CHNAD GAJIPUR'),
(38, 1, 'gadarpur', 'goukhpur', 'suresh', 'gadarpur', '9927560034', 'rhish', '12345', '2224', 'UK06CB1777', '12345', '12345', 'wheat seed', '300', '300', '90000', 'Approved', '2024-10-07 10:24:00', 'pan seeds', 'durga seeds'),
(39, 1, 'gadarpur', 'GONDA', 'suresh', 'gadarpur', '9927560034', 'rhish', '12345', '2224', 'UK06CB1777', '12345', '12345', 'WHEAT', '300', '300', '90000', 'Approved', '2024-10-07 10:53:05', 'PAN', 'DURGA'),
(40, 24, 'GADARPUR', 'BHARTHANA ETAWA', 'PANKAJ MISHRA', 'FARUKHABAD', '9415333300', 'KAMAL', '9005408705', '0759UP76', 'UP76K8257', '91804071K63629630', 'MAT541024H1K22051', 'WHEAT SEED', '30 MT', '105', '31500', 'Approved', '2024-10-07 11:29:31', 'RUKMANI SEEDS VLL; PATHARKUI GADARPUR', 'PRIYA AGENCY BHARTHANA ETAWA'),
(41, 25, 'Hyderabad', 'Delhi', 'Anil Verma', '45, MG Road, Chennai, Tamil Nadu', '9876543210', 'Shankar Reddy', '+1 555-876-5432', 'XY987654', 'WB20EF4567', 'EN987654321', 'CH6789012345', 'A Pack of Utensils\r\n4 Wooden Bricks\r\n6 Bags of Metals\r\n12 Refrigerators', '120g\r\n12kg\r\n10g\r\n110g', '1100\r\n1000\r\n990\r\n200', '1000\r\n800\r\n660\r\n100', 'Pending', '2025-11-10 15:15:35', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_forms`
--
ALTER TABLE `user_forms`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `user_forms` ADD FULLTEXT KEY `status` (`status`);
ALTER TABLE `user_forms` ADD FULLTEXT KEY `status_2` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_enquiries`
--
ALTER TABLE `contact_enquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_forms`
--
ALTER TABLE `user_forms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
