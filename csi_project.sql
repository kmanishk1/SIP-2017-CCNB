-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 16, 2017 at 05:18 AM
-- Server version: 5.6.35
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csi_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `departmentId` int(10) NOT NULL,
  `designation` varchar(20) NOT NULL,
  `website` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`departmentId`, `designation`, `website`, `phone`, `email`) VALUES
(1, 'Back-End Developer', 'kmanishk1.me', '+918769879488', 'kmanishk1@icloud.com'),
(2, 'Web Designer', 'mahi123woohoo', 'BlahBlahBlah', 'mahima@gmail.com'),
(3, 'Project Mentor', 'studymedia.in', '68237682', 'my email'),
(4, 'Chairperson', 'http://gauravkhatri.com', '+91-787768757', 'gauravkhatri@gmail.com'),
(5, 'Co-ordinator', 'http://shrirambansal.com', '+91-8976896789', 'shriram@gmail.com'),
(6, 'Co-ordinator', 'http://facebook.com/aayushgupt', '890787884673', 'aayushgupta@gmail.com'),
(7, 'Council President', 'http://nishant.com', '+91-0909899549', 'nishant@gmail.com'),
(8, 'Co-ordinator', 'http://facebook.com/nishankbha', '08787899548', 'nishank@gmail.com'),
(9, 'Chairperson', 'http://anubhav.com', '+91090889954', 'anubhav@gmail.com'),
(10, 'Co-ordinator', 'http://facebook.com/mayuri', '+91-89454868547', 'mayuria@gmail.com'),
(11, 'President', 'http://facebook.com/chintamani', '+91-897878348', 'chinta@gmail.com'),
(12, 'Organiser', 'http://anmol.com', '+91-6838643788', 'anmol@gmail.com'),
(13, 'Co-ordinator', 'http://akshi.com', '+91-787384843', 'akshi@gmail.com'),
(14, 'Librarian', 'http://librarian.com', '8096763467', 'librarian@gmail.com'),
(15, 'Head of Department', 'http://hodcse.lnmiit.ac.in', '+91-8937783748', 'hodcse@gmail.com'),
(16, 'Head of Department', 'http://nikhil.com', '+91-90879878687', 'nikhil@gmail.com'),
(17, 'Head of Department', 'http://deepaknair.com', '+91-89787886876', 'deepaknair@gmail.com'),
(18, 'Head of Department', 'http://manish.com', '+91-989932989', 'manish@yahoo.com'),
(19, 'Head of Department', 'http://kher.com', '090878788678', 'kher@gmail.com'),
(20, 'Head of Department', 'http://somnath.com', '+91-8978768778', 'somnath@gmail.com'),
(21, 'Head of Department', 'http://sunil.com', '+91-77787887878', 'sunil@rediffmail.com'),
(22, 'Head of Department', 'http://usha.com', '09089989789', 'usha@gmail.com'),
(23, 'Dean of Academics', 'http://ravigorthi.com', '+91-8997398843', 'ravigorthi@gmail.com'),
(24, 'Assistant Registrar', 'http://rajeev.com', '+91-7798327748', 'rajeev.saxena@gmail.com'),
(25, 'Co-ordinator', 'http://facebook.com/ayushsingh', '09898968548', 'ayushsingh@gmail.com'),
(28, 'Co-ordinator', 'http://divyanshurawat.in', '+91-7894989548', 'divyanshurawat@gmail.com'),
(29, 'Faculty Mentor', 'http://vikas.com', '+91-0968734347', 'vikas@gmail.com'),
(30, 'General Secretary', 'http://parthgoyal.com', '+918769879488', 'parth@gmail.com'),
(31, 'General Secretary', 'http://anmol.com', '+91-0968734347', 'anmol@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department` varchar(50) NOT NULL,
  `departmentId` int(10) NOT NULL,
  `dep_description` varchar(2000) NOT NULL,
  `linked` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department`, `departmentId`, `dep_description`, `linked`) VALUES
('Admin', 1, 'Manish\"s Department', 'kmanishk1.me'),
('Junior Admin', 2, 'She is ....', 'woohoo'),
('Super Admin', 3, 'He is the Project Mentor and Senior Super Admin!', 'super.com'),
('CSI Student Chapter', 4, 'Student Chapter of Computer Society of India!', 'http://csi.lnmiit.ac.in'),
('Nirog Club', 5, 'Works for the medical welfare of the college campus!', 'http://nirog.lnmiit.ac.in'),
('Sankalp Club', 6, 'Promotion of Social Welfare in college!', 'http://sankalp.lnmiit.ac.in'),
('ASME Department', 7, 'The Tech. fest of Mechanical Branch!', 'http://asme.lnmiit.ac.in'),
('Counselling Cell', 8, 'Cell which looks after the admissions and counseling of First year noobs! ', 'http://ccell.lnmiit.ac.in'),
('SAE Student Chapter', 9, 'Society of Automotive Engineers Student Chapter!', 'http://sae.lnmiit.ac.in'),
('Entrepreneurship Cell', 10, 'Just for fun! K bye. :P', 'http://ecell.lnmii.ac.in'),
('IEEE Student Branch', 11, 'Student Branch of Institute of Electrical and Electronics Engineers!', 'http://ieee.lnmiit.ac.in'),
('IUPC', 12, 'Inter University Programming Contest', 'http://iupc.lnmiit.ac.in'),
('Innovation Club', 13, 'Basically works over new ideas, if any!', 'http://innovationclub.lnmiit.a'),
('Library Department', 14, 'All the information about the College library!', 'http://library.lnmii.ac.in'),
('CSE Department', 15, 'Computer Science and Engineering Department of College!', 'http://cse.lnmiit.ac.in'),
('CCE Department', 16, 'Computer and Communication Engineering Department of College!', 'http://cce.lnmiit.ac.in'),
('ECE Department', 17, 'Electronics and Communication Engineering Department of College!', 'http://ece.lnmiit.ac.in'),
('ME Department', 18, 'Mechanical Engineering Department of college!', 'http://me.lnmiit.ac.in'),
('MME Department', 19, 'Mechatronics - Mechanical Engineering Department of college!', 'http://mme.lnmiit.ac.in'),
('Physics Department', 20, 'College Department of Physics!', 'http://physics.lnmiit.ac.in'),
('Mathematics Department', 21, 'College Department of Mathematics!', 'http://maths.lnmiit.ac.in'),
('HSS Department', 22, 'Humanities and Social Sciences Department', 'http://hss.lnmiit.ac.in'),
('Dean of Academics Office', 23, 'Everything update from Office of Dean Academics!', 'http://deanacademic.lnmiit.ac.'),
('Academics Registrar Office', 24, 'Every update from Academics Registrar Office! ', 'http://acdregistrar.lnmiit.ac.'),
('Imagination - The Photography Club', 25, 'The photography club of college!', 'http://imagination.lnmiit.ac.i'),
('Cybros : Computer Club', 28, 'Computer Club of college!', 'http://cybros.lnmiit.ac.in'),
('Senior Super Admin', 29, 'The Senior Super Admin and Faculty Mentor of project!', 'http://supersenior.com'),
('Sports Council', 30, 'Council organizes various sports events and sports annual fest Desportivos, of the college!', 'http://sports.lnmiit.ac.in'),
('Science & Technical Council', 31, 'Council organizes various technical events and also Plinth, xD ... in the college!', 'http://scitech.lnmiit.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `login_details`
--

CREATE TABLE `login_details` (
  `departmentId` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `name` varchar(30) NOT NULL,
  `userlevel` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `login_details`
--

INSERT INTO `login_details` (`departmentId`, `username`, `password`, `name`, `userlevel`) VALUES
(1, 'kmanishk1', '32250170a0dca92d53ec9624f336ca24', 'Manish Kumar', 1),
(2, 'mahima', '1a1dc91c907325c69271ddf0c944bc72', 'Mahima Kejriwal', NULL),
(3, 'neelesh', '4479c17273db2b4e659e9090170bb604', 'Neelesh Singh Rajpurohit', 1),
(4, 'csi', '5f4dcc3b5aa765d61d8327deb882cf99', 'Gaurav Khatri', NULL),
(5, 'nirog', '0f56697eb51c688b40343ae48712c4d4', 'Shri Ram Bansal', 0),
(6, 'sankalp', '95d7977bdb48e71e4544466f05b5fd6b', 'Aayush Gupta', 0),
(7, 'asme', 'ad8868b59d3e171ceda2f790544a0b7e', 'Nishant Kumar Mishra', 0),
(8, 'ccell', 'eff0f5c92bc7a2cf00cc0bc64aab890d', 'Nishank Bhati', 0),
(9, 'sae', 'dabfae3e14243f88c733376f4e6c1a37', 'Anubhav Dubey', 0),
(10, 'ecell', 'c235019236a3c8fbeba31d588b570263', 'Mayuri Agrawal', 0),
(11, 'ieee', 'edee9258e7ac2f4ed419255d2c6ae8b7', 'Chintamani Phadke', 0),
(12, 'iupc', 'cddb724e639c759b98c837b8d1410a27', 'Anmol Ratnam', 0),
(13, 'innovation', 'd3440b69126d9c186fddc713b18b0002', 'Akshi Aggarwal', 0),
(14, 'library', 'd521f765a49c72507257a2620612ee96', 'Shikhar Rajput', 0),
(15, 'cse', '271226cb355bdda491d38bfaf40f675d', 'Shubrat K. Das', 0),
(16, 'cce', '505fb3245746986ec5c2b92d05a3a9f0', 'Nikhil Paliwal', 0),
(17, 'ece', '6f8a28be5f158752eba976d9a69f6abb', 'Deepak Nair', 0),
(18, 'me', 'ab86a1e1ef70dff97959067b723c5c24', 'Manish Udhani', 0),
(19, 'mme', 'fd69463ab759bc3cade51ccc497f8b07', 'Bachcha Yadav', 0),
(20, 'physics', '8cfb10d3dd0ae49a87320653cbfa587e', 'Somnath Biswas', 0),
(21, 'maths', 'd939e7a6b17e374c1e3db59b4df2ae97', 'Sunil Kumar Gautam', 0),
(22, 'hss', 'f771eb6211d0f2afd59376c3af8f786a', 'Usha Kanoongo', 0),
(23, 'dean_academics', '41227a6706025bac102bce61c90faf97', 'Dr. Ravi Gorthi', 0),
(24, 'registrar_academic', 'e6019433b1c3bfbe7877448af2d8b0f1', 'Rajeev Saxena', 0),
(25, 'imagination', '9a003f819c75bd91b0dc5ca5a22ec7f6', 'Ayush Singh', 0),
(28, 'cybros', '72732f5c82181abf7e35d468e4f630f0', 'Divyanshu Rawat', 0),
(29, 'vikas', 'bebe68374a49cb41b7c9219e97250044', 'Vikas Bajpai', 1),
(30, 'sports', '088495f30901580ddd5171531cd26649', 'Parth Goyal', 0),
(31, 'scitech', 'cef00e1d0de68c5ae840006f05fd49c1', 'Anmol Ratnam', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `notificationId` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `heading` varchar(100) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `time_stamp` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`notificationId`, `username`, `heading`, `description`, `time_stamp`) VALUES
(1, 'kmanishk1', 'This is just a Heading.', 'Didn\'t you get it, its just a heading. How many times do I have to tell you that?', '2017-08-02 00:00:00'),
(2, 'mahima', 'This is just another heading.', 'If I can post something, she definitely can.', '2017-08-02 00:00:00'),
(3, 'neelesh', 'This is anonymous!.', 'You know it!', '2017-08-02 00:00:00'),
(4, 'kmanishk1', 'This is anonymous!.', 'Hello?', '2017-08-02 00:00:00'),
(5, 'mahima', 'This is real!', 'Hello?', '2017-08-02 00:00:00'),
(6, 'kmanishk1', 'Hello there?', 'Is anyone there?', '2017-08-02 00:00:00'),
(7, 'mahima', 'Hello, you, yes you!', 'Manish Kumar', '2017-08-02 00:00:00'),
(8, 'kmanishk1', 'The POst!', 'Is there something you want to tell?', '2017-08-02 00:00:00'),
(9, 'kmanishk1', 'The POst!', '\r\nWith more than 83,000 books ranging from the classics to contemporary non-fiction works, Questia is your single destination for reading books online – and remember, nothing is ever checked out!\r\n\r\nQuestia is great for scholarly research too! With deep archives of thousands of academic journals and easy to use project and bibliography building tools, Questia will help you research better, faster.\r\nJoin Questia today!\r\nTime-saving research tools\r\nTools to streamline your research process\r\n\r\nTime-saving research tools, like automatic bibliography creation, highlights, notes, citations and more, all designed with the research process in mind.\r\nCitations\r\nCite passages, pages or entire articles instantly from within our library or anywhere online Notes\r\nAdd notes for yourself directly to\r\nbook pages or articles Bookmarks\r\nEasily return to any page in any\r\nbook in our library Bibliographies\r\nAutomatically generate bibliographies in MLA, APA or Chicago format Highlights\r\nHighlight and save ', '2017-08-02 00:00:00'),
(10, 'neelesh', 'Pasobtjhfsdh', 'bjhjashjasvhjbjahsbd', '2017-08-04 00:00:00'),
(11, 'kmanishk1', 'Pass ho saaare!', 'bsajhdfb', '2017-08-04 00:00:00'),
(12, 'kmanishk1', 'bkhsdabk', 'khdskbfbdwks', '2017-08-04 00:00:00'),
(13, 'neelesh', 'Blah Blah Blah!', 'Hello there! Did you understand the heading?', '2017-08-04 00:00:00'),
(14, 'kmanishk1', 'bfcabx', 'khwdsbkfqsa', '2017-08-04 00:00:00'),
(15, 'kmanishk1', 'lol', 'hahahaha\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\n', '2017-08-05 14:46:30'),
(16, 'kmanishk1', 'lol', 'hahahaha\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\n', '2017-08-05 14:51:54'),
(17, 'kmanishk1', 'lol', 'hahahaha\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\nk\r\n', '2017-08-05 14:52:36'),
(18, 'kmanishk1', 'This is just a heading!', 'kjbsdafkj\r\nbksajd\r\nbfsakjd\r\nfbdskj', '2017-08-05 14:52:53'),
(19, 'mahima', 'mkmkmk', 'mmmmmmMmmm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm\r\nm', '2017-08-05 15:25:01'),
(20, 'csi', 'First Post!', 'Just for fun!', '2017-08-06 22:05:00'),
(21, 'kmanishk1', 'first heading 001', 'description here.', '2017-08-08 20:08:28'),
(22, 'kmanishk1', 'Hello guys!', 'Just for fun!', '2017-08-09 15:54:00'),
(23, 'kmanishk1', 'Heading', 'Post of Manish!', '2017-08-13 12:46:02'),
(24, 'kmanishk1', 'bfdjhsb', 'dbsabk\":{}{+)_', '2017-08-13 14:42:39'),
(25, 'kmanishk1', 'Manish', 'Manish!\r\n', '2017-08-15 18:25:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD UNIQUE KEY `departmentId` (`departmentId`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`departmentId`),
  ADD UNIQUE KEY `department` (`department`),
  ADD UNIQUE KEY `departmentId` (`departmentId`);

--
-- Indexes for table `login_details`
--
ALTER TABLE `login_details`
  ADD PRIMARY KEY (`departmentId`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `departmentId` (`departmentId`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`notificationId`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `departmentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `departmentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `login_details`
--
ALTER TABLE `login_details`
  MODIFY `departmentId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `notificationId` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `login_details`
--
ALTER TABLE `login_details`
  ADD CONSTRAINT `departmentId` FOREIGN KEY (`departmentId`) REFERENCES `departments` (`departmentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `login_details` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
