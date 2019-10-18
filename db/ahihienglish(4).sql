-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 15, 2019 at 02:17 PM
-- Server version: 10.3.17-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dorltsyi_ahihienglish`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(2) UNSIGNED NOT NULL,
  `topic` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `name` varchar(80) NOT NULL,
  `slug` varchar(80) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `long_description` text NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `old_price` double DEFAULT NULL,
  `price` double DEFAULT NULL,
  `remaining_slots` int(3) DEFAULT NULL,
  `inner_description` varchar(50) NOT NULL,
  `course_order` int(2) UNSIGNED NOT NULL DEFAULT 0,
  `user_id` int(2) UNSIGNED NOT NULL,
  `is_active` int(1) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `topic`, `type`, `name`, `slug`, `short_description`, `long_description`, `thumbnail`, `old_price`, `price`, `remaining_slots`, `inner_description`, `course_order`, `user_id`, `is_active`) VALUES
(31, 'ngu-phap', 'tong-quat', 'Danh từ trong Tiếng Anh', 'danh-tu', '&lt;p&gt;Danh từ l&amp;agrave; chủ đề đầu ti&amp;ecirc;n trong Ngữ ph&amp;aacute;p Tiếng Anh m&amp;agrave; ai cũng phải biết.&lt;/p&gt;\r\n', '&lt;p&gt;Danh từ l&amp;agrave; chủ đề đầu ti&amp;ecirc;n trong Ngữ ph&amp;aacute;p Tiếng Anh m&amp;agrave; ai cũng phải biết.&lt;/p&gt;\r\n', '/uploads/images/courses/nouns_cover.png', 10000, 0, 0, 'Xem trọn đời', 0, 1, 1),
(32, 'lop-offline', 'offline-1', 'Tiếng Anh Cấp 1,2,3', 'tieng-anh-cap-1-2-3', '<p>Lớp học Tiếng Anh Cấp 1,2,3 d&agrave;nh cho c&aacute;c em học sinh phổ th&ocirc;ng nhắm &quot;chiến đấu&quot; với c&aacute;c kỳ thi cuối cấp lẫn c&aacute;c kỳ thi tr&ecirc;n lớp.</p>\r\n', '<p>Lớp học Tiếng Anh Cấp 1,2,3 d&agrave;nh cho c&aacute;c em học sinh phổ th&ocirc;ng nhắm &quot;chiến đấu&quot; với c&aacute;c kỳ thi cuối cấp lẫn c&aacute;c kỳ thi tr&ecirc;n lớp. Lớp được dạy theo lối dễ hiểu, sinh động gi&uacute;p học sinh tiếp thu kiến thức nhanh ch&oacute;ng v&agrave; nắm chắc kiến thức để &quot;kh&ocirc;ng sợ&quot; m&ocirc;n Tiếng Anh nữa m&agrave; sự tự tin vượt qua tất cả c&aacute;c vấn đề trong Tiếng Anh.</p>\r\n', '/uploads/images/courses/ahihi english_ava.png', 0, 100000, 10, 'Học Offline', 0, 1, 1),
(33, 'lop-offline', 'offline-2', 'Luyện thi Đại học', 'luyen-thi-dai-hoc', '<p>Lớp luyện thi Đại học nhằm chinh phục kỳ thi Đại học, x&oacute;a tan nỗi lo sợ kỳ thi Tiếng Anh. Yều cầu đơn giản l&agrave; sự chăm chỉ của c&aacute;c em.</p>\r\n', '<p>Lớp luyện thi Đại học nhằm chinh phục kỳ thi Đại học, x&oacute;a tan nỗi lo sợ kỳ thi Tiếng Anh. Yều cầu đơn giản l&agrave; sự chăm chỉ của c&aacute;c em.</p>\r\n', '/uploads/images/courses/Ahihi English.png', 0, 200000, 10, 'Học Offline', 1, 1, 1),
(34, 'lop-offline', 'offline-3', 'Tiếng Anh Giao tiếp', 'tieng-anh-giao-tiep', '&lt;p&gt;Lớp Tiếng Anh Giao tiếp nhằm &amp;quot;đập tan nỗi lo Tiếng Anh&amp;quot; v&amp;agrave; &amp;quot;đ&amp;aacute;nh chết lỗi Tiếng Anh&amp;quot; để n&amp;oacute;i &amp;quot;hay&amp;quot; v&amp;agrave; &amp;quot;chuẩn&amp;quot;.&lt;/p&gt;\r\n', '&lt;p&gt;Lớp Tiếng Anh Giao tiếp nhằm &amp;quot;đập tan nỗi lo n&amp;oacute;i Tiếng Anh&amp;quot; v&amp;agrave; gi&amp;uacute;p bạn &amp;quot;đ&amp;aacute;nh chết lỗi Tiếng Anh&amp;quot; để kh&amp;ocirc;ng chỉ n&amp;oacute;i Tiếng Anh tr&amp;ocirc;i chảy m&amp;agrave; c&amp;ograve;n n&amp;oacute;i Tiếng Anh chuẩn.&lt;/p&gt;\r\n', '/uploads/images/courses/ahihi english.mp4', 0, 200000, 10, 'Học Offline', 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `link` text NOT NULL,
  `video_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `title`, `description`, `link`, `video_id`) VALUES
(1, 'Slide Bài giảng Danh từ', 'Tài liệu của bài giảng các em down ở đây nhé.', 'https://slides.com/dannguyencoder/danh-t', 57),
(2, 'Slide Bài giảng Danh từ', 'Tài liệu của bài giảng các em down ở đây nhé.', 'https://slides.com/dannguyencoder/danh-t', 58),
(3, 'Slide Bài giảng Danh từ', 'Tài liệu của bài giảng các em down ở đây nhé.', 'https://slides.com/dannguyencoder/danh-t', 59),
(4, 'Slide Bài giảng Danh từ', 'Tài liệu của bài giảng các em down ở đây nhé.', 'https://slides.com/dannguyencoder/danh-t', 60),
(5, 'Slide Bài giảng Danh từ', 'Tài liệu của bài giảng các em down ở đây nhé.', 'https://slides.com/dannguyencoder/danh-t', 61),
(6, 'Slide Bài giảng Danh từ', 'Tài liệu của bài giảng các em down ở đây nhé.', 'https://slides.com/dannguyencoder/danh-t', 62),
(7, 'Slide Bài giảng Danh từ', 'Tài liệu của bài giảng các em down ở đây nhé.', 'https://slides.com/dannguyencoder/danh-t', 63),
(8, 'Slide Bài giảng Danh từ', 'Tài liệu của bài giảng các em down ở đây nhé.', 'https://slides.com/dannguyencoder/danh-t', 64),
(9, 'Slide Bài giảng Danh từ', 'Tài liệu của bài giảng các em down ở đây nhé.', 'https://slides.com/dannguyencoder/danh-t', 65);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(2) UNSIGNED NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `title` text NOT NULL,
  `avatar` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `phone_number`, `full_name`, `title`, `avatar`, `description`) VALUES
(1, 'hongvinh.english', 'e11c53c8c29637cd795df0724d1ece8e', 'hongvinh.english@gmail.com', '0326155977', 'Nguyễn Quang Vinh', 'Cử nhân Tiếng Anh<br>Đại học Ngoại ngữ<br>Đại học Quốc Gia Hà Nội', '/uploads/images/avatars/thay_nguyen_quang_vinh.jpg', '&lt;p&gt;&amp;quot;Anh&amp;quot; gi&amp;aacute;o &lt;strong&gt;Nguyễn Quang Vinh&lt;/strong&gt; đ&amp;atilde; c&amp;oacute; hơn 7 năm trong lĩnh vựng giảng dạy Tiếng Anh.&lt;/p&gt;\r\n\r\n&lt;p&gt;Anh Vinh bị c&amp;aacute;i thẳng t&amp;iacute;nh, nhiều khi &amp;quot;sỉ vả&amp;quot; học sinh v&amp;igrave; tội lười học nhưng l&amp;agrave; một người anh c&amp;oacute; t&amp;acirc;m, lu&amp;ocirc;n muốn học sinh của m&amp;igrave;nh học giỏi Tiếng Anh v&amp;igrave; tương lai của ch&amp;iacute;nh m&amp;igrave;nh.&lt;/p&gt;\r\n\r\n&lt;p&gt;Nhiều thế hệ học sinh của anh Vinh nay đ&amp;atilde; trở th&amp;agrave;nh c&amp;aacute;c &amp;quot;si&amp;ecirc;u sao&amp;quot; về Tiếng Anh trong nh&amp;agrave; trường phổ th&amp;ocirc;ng lẫn giao tiếp quốc tế.&lt;/p&gt;\r\n\r\n&lt;p&gt;Về với team anh Vinh để cảm nhận được sự đầu tư trong từng b&amp;agrave;i giảng, v&amp;agrave; sự tận t&amp;acirc;m của anh Vinh với học sinh nh&amp;eacute;.&lt;/p&gt;\r\n\r\n&lt;p&gt;Anh Vinh &lt;strong&gt;HIỀN&lt;/strong&gt; chờ đ&amp;oacute;n c&amp;aacute;c em.&lt;/p&gt;\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` text NOT NULL,
  `description` text NOT NULL,
  `link` text NOT NULL,
  `duration` int(4) UNSIGNED NOT NULL,
  `video_order` int(3) UNSIGNED NOT NULL DEFAULT 0,
  `video_group_id` int(4) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `thumbnail`, `description`, `link`, `duration`, `video_order`, `video_group_id`) VALUES
(57, 'Danh từ - Khái niệm - Danh từ là gì ?', '/uploads/images/videos/danh_tu_khai_niem_danh_tu.png', '<p>Trong b&agrave;i học n&agrave;y, ch&uacute;ng ta sẽ t&igrave;m hiểu kh&aacute;i niệm &quot;Danh từ&quot; trong Tiếng Anh l&agrave; c&aacute;i quần qu&egrave; g&igrave;.</p>\r\n', 'https://www.youtube.com/embed/TKgXJQs1xUY', 108, 0, 31),
(58, 'Danh từ - Các loại Danh từ trong Tiếng Anh', '/uploads/images/videos/danh_tu_cac_loai_danh_tu_trong_tieng_anh.png', '<p>Trong b&agrave;i học n&agrave;y, ch&uacute;ng ta sẽ t&igrave;m hiểu về c&aacute;c loại Danh từ trong Tiếng Anh. Đừng ngợp v&igrave; số lượng qu&aacute; nhiều nh&eacute;.</p>\r\n', 'https://www.youtube.com/embed/N6eCKbq6uFA', 86, 0, 31),
(59, 'Danh từ - Danh từ cụ thể và Danh từ trừu tượng', '/uploads/images/videos/danh_tu_danh_tu_cu_the_danh_tu_truu_tuong.png', '<p>C&ugrave;ng nhau t&igrave;m hiểu về Danh từ cụ thể v&agrave; Danh từ trừu tượng bạn nh&eacute;.</p>\r\n', 'https://www.youtube.com/embed/pArI1bYBzHY', 109, 0, 31),
(60, 'Danh từ - Danh từ đếm được', '/uploads/images/videos/danh_tu_danh_tu_dem_duoc.png', '<p>Danh từ đếm được l&agrave; g&igrave; vậy ta ? N&oacute; c&oacute; những điều g&igrave; cần lưu &yacute; ?</p>\r\n', 'https://www.youtube.com/embed/ZrDZoQF2NXM', 114, 0, 31),
(61, 'Danh từ - Danh từ không đếm được', '/uploads/images/videos/danh_tu_danh_tu_khong_dem_duoc.png', '<p>Danh từ kh&ocirc;ng đếm được tuy kh&ocirc;ng kh&oacute; hiểu nhưng c&oacute; nhiều điểm phải lưu &yacute; đ&oacute; c&aacute;c em nh&eacute;.</p>\r\n', 'https://www.youtube.com/embed/0VjQcltfxdQ', 141, 0, 31),
(62, 'Danh từ - Một số chú ý về Danh từ không đếm được', '/uploads/images/videos/danh_tu_mot_so_chu_y_ve_danh_tu_khong_dem_duoc.png', '<p>Một số ch&uacute; &yacute; về Danh từ kh&ocirc;ng đếm được kẻo c&aacute;c em bị sai nh&eacute;.</p>\r\n', 'https://www.youtube.com/embed/1rL4JyX6J6s', 331, 0, 31),
(63, 'Danh từ - Danh từ số ít và Danh từ số nhiều', '/uploads/images/videos/danh_tu_danh_tu_so_it_danh_tu_so_nhieu.png', '<p>Danh từ số &iacute;t v&agrave; Danh từ số nhiều l&agrave; loại Danh từ được dạy nhiều nhất trong c&aacute;c nh&agrave; trường phổ th&ocirc;ng. C&ugrave;ng nhau t&igrave;m hiểu c&aacute;c bạn nh&eacute;.</p>\r\n', 'https://www.youtube.com/embed/bHNZj15IxkU', 51, 0, 31),
(64, 'Danh từ - Cách thành lập Danh từ số nhiều (s/es)', '/uploads/images/videos/danh_tu_cach_thanh_lap_danh_tu_so_nhieu_ses.png', '<p>C&aacute;ch th&ecirc;m s/es đằng sau danh từ cho chuẩn v&agrave; ch&iacute;nh x&aacute;c.</p>\r\n', 'https://www.youtube.com/embed/JY2tcdZGtMY', 285, 0, 31),
(65, 'Danh từ - Cách phâm đuôi s/es', '/uploads/images/videos/danh_tu_cach_phat_am_duoi_ses.png', '<p>C&aacute;ch đọc đu&ocirc;i s/es sao cho chuẩn, ứng dụng rất rộng r&atilde;i nh&eacute;.</p>\r\n', 'https://www.youtube.com/embed/_Et9i4y0_fQ', 232, 0, 31);

-- --------------------------------------------------------

--
-- Table structure for table `video_groups`
--

CREATE TABLE `video_groups` (
  `id` int(4) UNSIGNED NOT NULL,
  `course_id` int(2) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `video_group_order` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `video_groups`
--

INSERT INTO `video_groups` (`id`, `course_id`, `name`, `video_group_order`) VALUES
(31, 31, 'Danh từ', 0),
(32, 32, 'Ngữ pháp Tiếng Anh', 0),
(33, 32, 'Từ vựng Tiếng Anh', 1),
(34, 32, 'Ôn thi cuối cấp', 2),
(35, 33, 'Tổng ôn tập kiến thức Ngữ pháp', 0),
(36, 33, 'Ôn tập Từ vựng Tiếng Anh', 1),
(37, 33, 'Kỹ chiến thuật làm bài thi', 2),
(38, 34, 'Ngữ pháp Tiếng Anh căn bản', 0),
(39, 34, 'Từ vựng Tiếng Anh căn bản', 1),
(40, 34, 'Thực hành nói Tiếng Anh', 2),
(41, 34, 'Phát âm Tiếng Anh \"chuẩn không cần chỉnh\"', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic` (`topic`),
  ADD KEY `type` (`type`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `slug` (`slug`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_id` (`video_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `video_group_id` (`video_group_id`);

--
-- Indexes for table `video_groups`
--
ALTER TABLE `video_groups`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `video_groups`
--
ALTER TABLE `video_groups`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`video_id`) REFERENCES `videos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `videos`
--
ALTER TABLE `videos`
  ADD CONSTRAINT `videos_ibfk_1` FOREIGN KEY (`video_group_id`) REFERENCES `video_groups` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_groups`
--
ALTER TABLE `video_groups`
  ADD CONSTRAINT `video_groups_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
