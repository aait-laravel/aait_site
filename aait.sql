-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 11, 2017 at 08:37 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aait`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `announ_id` int(11) NOT NULL,
  `announ_tag_id` varchar(100) NOT NULL,
  `stuff_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `body` varchar(400) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`announ_id`, `announ_tag_id`, `stuff_id`, `subject`, `body`, `created_at`, `updated_at`) VALUES
(1, 'mechanical', 1, 'About Exam', 'the exam is extended', '2017-02-11 02:57:43', '2017-02-11 02:57:43'),
(2, 'mechanical', 1, 'exam', 'about the exam, it''s canceldd', '2017-02-11 03:04:34', '2017-02-11 03:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `ans_id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `editor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`ans_id`, `ques_id`, `editor_id`) VALUES
(24, 2, NULL),
(28, 2, NULL),
(72, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bloggers`
--

CREATE TABLE `bloggers` (
  `blogger_id` int(11) NOT NULL,
  `blog_name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `blogs_size` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `blog_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `follows` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `channels`
--

CREATE TABLE `channels` (
  `channel_id` int(11) NOT NULL,
  `owner_id` int(11) NOT NULL,
  `channel_name` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL DEFAULT 'channel',
  `subscribers_size` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `channels`
--

INSERT INTO `channels` (`channel_id`, `owner_id`, `channel_name`, `description`, `subscribers_size`, `created_at`, `updated_at`) VALUES
(1, 3, 'Main', 'This channel contains blogs about this campus.', 0, '2017-02-09 21:26:44', '2017-02-09 21:26:44');

-- --------------------------------------------------------

--
-- Table structure for table `channel_posts`
--

CREATE TABLE `channel_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `channel_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channel_public_messages`
--

CREATE TABLE `channel_public_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_message_id` int(11) NOT NULL,
  `channel_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_messages`
--

CREATE TABLE `chat_messages` (
  `message_id` int(11) NOT NULL,
  `dest_id` int(11) NOT NULL,
  `viewed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat_messages`
--

INSERT INTO `chat_messages` (`message_id`, `dest_id`, `viewed`) VALUES
(40, 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `text_id` int(11) NOT NULL,
  `com_text_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `text_id`, `com_text_id`, `created_at`, `updated_at`) VALUES
(4, 8, 7, '2017-02-04 10:30:00', '2017-02-04 10:30:00'),
(5, 26, 1, '2017-02-09 04:52:18', '2017-02-09 04:52:18'),
(6, 39, 38, '2017-02-09 08:06:42', '2017-02-09 08:06:42'),
(7, 70, 69, '2017-02-10 08:56:29', '2017-02-10 08:56:29'),
(8, 71, 23, '2017-02-10 09:55:52', '2017-02-10 09:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_id` int(11) NOT NULL,
  `ins_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `course_code` varchar(40) NOT NULL,
  `enrolled` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_id`, `ins_id`, `dep_id`, `course_name`, `description`, `course_code`, `enrolled`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'material', 'This course is about material.', 'A11-32', 0, '2017-02-04 03:10:18', '2017-02-04 03:10:18');

-- --------------------------------------------------------

--
-- Table structure for table `course_announcements`
--

CREATE TABLE `course_announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `announcement_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_group_messages`
--

CREATE TABLE `course_group_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_posts`
--

CREATE TABLE `course_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_posts`
--

INSERT INTO `course_posts` (`id`, `course_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2017-02-04 05:13:57', '2017-02-04 05:13:57'),
(3, 2, 6, '2017-02-09 05:15:13', '2017-02-09 05:15:13');

-- --------------------------------------------------------

--
-- Table structure for table `course_protests`
--

CREATE TABLE `course_protests` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `protest_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_public_messages`
--

CREATE TABLE `course_public_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_message_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_public_messages`
--

INSERT INTO `course_public_messages` (`id`, `p_message_id`, `course_id`) VALUES
(1, 12, 2),
(2, 13, 2),
(3, 14, 2),
(4, 15, 2),
(5, 26, 2);

-- --------------------------------------------------------

--
-- Table structure for table `course_questions`
--

CREATE TABLE `course_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `ques_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `course_questions`
--

INSERT INTO `course_questions` (`id`, `course_id`, `ques_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `dep_id` int(11) NOT NULL,
  `head_id` int(11) NOT NULL,
  `dep_name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`dep_id`, `head_id`, `dep_name`, `description`, `created_at`, `updated_at`) VALUES
(2, 1, 'mechanical', 'this is a mechanical department', '2017-02-03 21:48:35', '2017-02-03 21:48:35'),
(3, 1, 'electrical', 'serving the community.', '2017-02-04 02:37:47', '2017-02-04 02:37:47');

-- --------------------------------------------------------

--
-- Table structure for table `department_announcements`
--

CREATE TABLE `department_announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `announcement_id` int(10) UNSIGNED NOT NULL,
  `dep_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department_announcements`
--

INSERT INTO `department_announcements` (`id`, `announcement_id`, `dep_id`) VALUES
(1, 1, 2),
(2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `department_group_messages`
--

CREATE TABLE `department_group_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `group_id` int(10) UNSIGNED NOT NULL,
  `dep_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_posts`
--

CREATE TABLE `department_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `dep_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `visibility` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'public',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department_posts`
--

INSERT INTO `department_posts` (`id`, `dep_id`, `post_id`, `visibility`, `created_at`, `updated_at`) VALUES
(9, 2, 4, 'public', '2017-02-06 11:13:46', '2017-02-06 11:13:46'),
(11, 2, 8, 'public', '2017-02-09 08:04:38', '2017-02-09 08:04:38');

-- --------------------------------------------------------

--
-- Table structure for table `department_protests`
--

CREATE TABLE `department_protests` (
  `id` int(10) UNSIGNED NOT NULL,
  `protest_id` int(10) UNSIGNED NOT NULL,
  `dep_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `department_public_messages`
--

CREATE TABLE `department_public_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_message_id` int(11) NOT NULL,
  `dep_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department_public_messages`
--

INSERT INTO `department_public_messages` (`id`, `p_message_id`, `dep_id`) VALUES
(5, 23, 2),
(6, 24, 2),
(7, 28, 2);

-- --------------------------------------------------------

--
-- Table structure for table `department_questions`
--

CREATE TABLE `department_questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `ques_id` int(10) UNSIGNED NOT NULL,
  `dep_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `department_questions`
--

INSERT INTO `department_questions` (`id`, `ques_id`, `dep_id`, `created_at`, `updated_at`) VALUES
(1, 2, 2, '2017-02-08 20:23:44', '2017-02-08 20:23:44'),
(2, 5, 2, '2017-02-09 06:04:59', '2017-02-09 06:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `followed_text`
--

CREATE TABLE `followed_text` (
  `stud_id` int(11) NOT NULL,
  `followed_text_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followed_text`
--

INSERT INTO `followed_text` (`stud_id`, `followed_text_id`, `created_at`, `updated_at`) VALUES
(3, 31, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `group_chats`
--

CREATE TABLE `group_chats` (
  `group_id` int(11) NOT NULL,
  `creator_id` int(11) NOT NULL,
  `group_name` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_chats`
--

INSERT INTO `group_chats` (`group_id`, `creator_id`, `group_name`, `created_at`, `updated_at`) VALUES
(1, 3, 'New group', '2017-02-06 09:27:16', '2017-02-06 09:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `group_chat_users`
--

CREATE TABLE `group_chat_users` (
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `joined_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `group_chat_users`
--

INSERT INTO `group_chat_users` (`group_id`, `user_id`, `joined_at`) VALUES
(1, 4, '2017-02-06 13:00:34');

-- --------------------------------------------------------

--
-- Table structure for table `group_messages`
--

CREATE TABLE `group_messages` (
  `message_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `liked_text`
--

CREATE TABLE `liked_text` (
  `stud_id` int(11) NOT NULL,
  `liked_text_id` int(11) NOT NULL,
  `liked` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `liked_text`
--

INSERT INTO `liked_text` (`stud_id`, `liked_text_id`, `liked`, `created_at`, `updated_at`) VALUES
(3, 18, 0, NULL, NULL),
(3, 24, 1, NULL, NULL),
(3, 39, 1, NULL, NULL),
(4, 7, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `message_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `message_id`) VALUES
(13, 3),
(14, 4),
(15, 5),
(16, 6),
(17, 10),
(18, 11),
(19, 12),
(23, 16),
(24, 17),
(26, 20),
(27, 32),
(28, 33),
(29, 34),
(30, 35),
(31, 36),
(32, 40),
(33, 41),
(34, 42),
(35, 43),
(36, 44),
(37, 45),
(38, 46),
(39, 47),
(40, 48),
(41, 49),
(42, 50),
(43, 51),
(44, 52),
(45, 53),
(46, 54),
(47, 55),
(48, 56),
(49, 57),
(50, 58),
(51, 59),
(52, 60),
(53, 61),
(54, 62),
(55, 65),
(56, 66),
(58, 74);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_01_21_131731_add_timestamps_rm_token', 1),
(3, '2017_01_21_132219_dep_timestamp', 2),
(4, '2017_01_21_132734_text_timestamp', 2),
(5, '2017_01_21_132849_course_timestamp', 3),
(6, '2017_01_21_132939_announ_timestamp', 3),
(7, '2017_01_21_133014_blog_timestamp', 3),
(8, '2017_01_21_133049_channels_timestamp', 3),
(9, '2017_01_21_133139_follow_text_timestamp', 3),
(10, '2017_01_21_133234_group_chats_timestamp', 3),
(11, '2017_01_21_133415_group_users_timestapm', 4),
(12, '2017_01_21_133535_like_text_timestamp', 4),
(13, '2017_01_21_133628_news_timestamp', 4),
(14, '2017_01_21_133721_notif_timestamp', 5),
(15, '2017_01_21_133930_stud_timestamp', 5),
(16, '2017_01_21_133956_stud_stuff_timestamp', 5),
(17, '2017_01_21_134024_tags_timestamp', 5),
(18, '2017_01_21_134122_file_timestamp', 5),
(19, '2017_01_23_065143_create_channel_public_messages_table', 6),
(20, '2017_01_23_065253_create_course_public_messages_table', 6),
(21, '2017_01_23_065318_create_department_public_messages_table', 6),
(22, '2017_01_26_105231_create_student_courses_table', 7),
(23, '2017_01_26_144640_create_department_post', 8),
(24, '2017_01_26_144820_create_channel_posts_table', 8),
(25, '2017_01_26_144852_create_public_posts_table', 8),
(26, '2017_01_26_144945_create_course_posts_table', 8),
(27, '2017_01_26_161707_post_timestamp', 9),
(28, '2017_01_27_072507_create_department_protests_table', 10),
(29, '2017_01_27_072600_create_department_questions_table', 10),
(30, '2017_01_27_072720_create_department_group_messages_table', 10),
(31, '2017_01_27_073205_create_department_announcments_table', 11),
(32, '2017_01_27_073229_create_public_announcements_table', 11),
(33, '2017_01_27_073244_create_course_announcements_table', 11),
(34, '2017_01_27_090944_create_course_protests_table', 12),
(35, '2017_01_27_091059_create_course_questions_table', 12),
(36, '2017_01_27_091217_create_course_group_messages_table', 12),
(37, '2017_01_31_063852_create_public_protests_table', 13),
(38, '2017_02_02_070607_comment_timestamps', 14),
(39, '2017_02_09_232029_create_public_public_messages_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `news_tag_id` int(11) NOT NULL,
  `source_id` int(11) NOT NULL,
  `body` varchar(400) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `text_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `viewed` bigint(20) NOT NULL,
  `viewd_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `follows` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `post_id`, `likes`, `follows`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 0, '2017-02-04 05:13:57', '2017-02-04 05:13:57'),
(2, 7, 0, 0, '2017-02-04 08:35:47', '2017-02-04 08:35:47'),
(4, 18, 0, 0, '2017-02-06 11:13:46', '2017-02-06 11:13:46'),
(6, 27, 0, 0, '2017-02-09 05:15:13', '2017-02-09 05:15:13'),
(8, 38, 0, 0, '2017-02-09 08:04:38', '2017-02-09 08:04:38'),
(9, 63, 0, 0, '2017-02-09 20:56:48', '2017-02-09 20:56:48'),
(10, 64, 0, 0, '2017-02-09 20:57:18', '2017-02-09 20:57:18'),
(11, 67, 0, 0, '2017-02-10 08:51:43', '2017-02-10 08:51:43'),
(12, 69, 0, 0, '2017-02-10 08:56:06', '2017-02-10 08:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `private_messages`
--

CREATE TABLE `private_messages` (
  `message_id` int(11) NOT NULL,
  `subject` varchar(100) NOT NULL DEFAULT 'No subject',
  `dest_id` int(11) NOT NULL,
  `viewed` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `private_messages`
--

INSERT INTO `private_messages` (`message_id`, `subject`, `dest_id`, `viewed`) VALUES
(23, '', 3, 0),
(24, '', 3, 0),
(30, 'Assignment', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `protests`
--

CREATE TABLE `protests` (
  `protest_id` int(11) NOT NULL,
  `accepted` bigint(20) NOT NULL,
  `upvotes` int(11) NOT NULL,
  `downvotes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `public_announcements`
--

CREATE TABLE `public_announcements` (
  `id` int(10) UNSIGNED NOT NULL,
  `announcement_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_messages`
--

CREATE TABLE `public_messages` (
  `id` int(11) UNSIGNED NOT NULL,
  `message_id` int(11) NOT NULL,
  `message_tag_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `public_messages`
--

INSERT INTO `public_messages` (`id`, `message_id`, `message_tag_id`) VALUES
(12, 13, NULL),
(13, 14, NULL),
(14, 15, NULL),
(15, 16, NULL),
(16, 17, NULL),
(17, 18, NULL),
(18, 19, NULL),
(23, 26, NULL),
(24, 31, NULL),
(25, 55, NULL),
(26, 56, NULL),
(28, 58, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `public_posts`
--

CREATE TABLE `public_posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `public_posts`
--

INSERT INTO `public_posts` (`id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 10, '2017-02-09 20:57:18', '2017-02-09 20:57:18'),
(2, 11, '2017-02-10 08:51:43', '2017-02-10 08:51:43'),
(3, 12, '2017-02-10 08:56:06', '2017-02-10 08:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `public_protests`
--

CREATE TABLE `public_protests` (
  `id` int(10) UNSIGNED NOT NULL,
  `protest_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `public_public_messages`
--

CREATE TABLE `public_public_messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_message_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `public_public_messages`
--

INSERT INTO `public_public_messages` (`id`, `p_message_id`) VALUES
(1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `ques_id` int(11) NOT NULL,
  `ans_id` int(11) DEFAULT NULL,
  `editor_id` int(11) DEFAULT NULL,
  `answered` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `ques_id`, `ans_id`, `editor_id`, `answered`) VALUES
(1, 2, NULL, NULL, 0),
(2, 23, 28, NULL, 1),
(3, 29, NULL, NULL, 0),
(4, 30, NULL, NULL, 0),
(5, 31, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stud_id` int(11) NOT NULL,
  `entrance_year` date DEFAULT NULL,
  `reputation` int(11) NOT NULL DEFAULT '0',
  `department_id` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stud_id`, `entrance_year`, `reputation`, `department_id`, `created_at`, `updated_at`) VALUES
(3, '2017-02-04', 0, '2', '2017-02-04 10:01:14', '2017-02-04 10:01:14'),
(4, '2017-02-06', 0, '2', '2017-02-06 09:57:16', '2017-02-06 09:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

CREATE TABLE `student_courses` (
  `id` int(10) UNSIGNED NOT NULL,
  `stud_id` int(10) UNSIGNED NOT NULL,
  `course_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stud_stuff`
--

CREATE TABLE `stud_stuff` (
  `stuff_id` int(11) NOT NULL,
  `edu_level` varchar(20) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `office` varchar(35) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stud_stuff`
--

INSERT INTO `stud_stuff` (`stuff_id`, `edu_level`, `dept_id`, `office`, `created_at`, `updated_at`) VALUES
(1, 'master', NULL, 'sumsung', '2017-02-03 20:40:35', '2017-02-03 20:40:35'),
(2, 'Degree', 2, NULL, '2017-02-04 03:07:57', '2017-02-04 03:07:57'),
(5, 'Degree', 3, NULL, '2017-02-11 03:35:02', '2017-02-11 03:35:02');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `texts`
--

CREATE TABLE `texts` (
  `text_id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `text_body` varchar(500) NOT NULL,
  `votes_up` int(11) DEFAULT '0',
  `votes_down` int(11) DEFAULT '0',
  `edited` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `texts`
--

INSERT INTO `texts` (`text_id`, `user_id`, `text_body`, `votes_up`, `votes_down`, `edited`, `created_at`, `updated_at`) VALUES
(1, 1, 'This is a material course post.', 0, 0, 0, '2017-02-04 05:13:57', '2017-02-09 04:44:45'),
(2, 1, 'new question', 0, 0, 0, '2017-02-04 05:43:38', '2017-02-04 05:43:38'),
(3, 1, 'hello discussion', 0, 0, 0, '2017-02-04 06:43:12', '2017-02-04 06:43:12'),
(4, 1, 'This is course public discussion.', 0, 0, 0, '2017-02-04 08:10:44', '2017-02-04 08:10:44'),
(5, 1, 'hi discussion', 0, 0, 0, '2017-02-04 08:13:08', '2017-02-04 08:13:08'),
(6, 1, 'Hello world', 0, 0, 0, '2017-02-04 08:16:11', '2017-02-04 08:16:11'),
(7, 1, 'This is a new Post for mechanical department. edited', 1, 0, 1, '2017-02-04 08:35:47', '2017-02-04 10:30:41'),
(8, 1, 'This is a comment', 0, 0, 0, '2017-02-04 10:30:00', '2017-02-04 10:30:00'),
(10, 1, 'New department message.', 0, 0, 0, '2017-02-05 00:13:19', '2017-02-05 00:13:19'),
(11, 1, 'New department message.', 0, 0, 0, '2017-02-05 00:14:22', '2017-02-05 00:14:22'),
(12, 1, 'New department message.', 0, 0, 0, '2017-02-05 00:14:56', '2017-02-05 00:14:56'),
(13, 1, 'New department message. Edited.', 0, 0, 1, '2017-02-05 00:15:18', '2017-02-05 00:25:16'),
(16, 3, 'message text', 0, 0, 0, '2017-02-06 06:38:02', '2017-02-06 06:38:02'),
(17, 3, 'Hello student', 0, 0, 0, '2017-02-06 06:47:58', '2017-02-06 06:47:58'),
(18, 1, 'This is my post', 0, 1, 0, '2017-02-06 11:13:46', '2017-02-10 09:13:54'),
(20, 4, 'I am a new user to this community too.', 0, 0, 0, '2017-02-08 03:08:54', '2017-02-08 03:08:54'),
(23, 3, 'Hello there I was wondering how the digestion system works and I ended up here, can any one help me with this please ?', 0, 0, 0, '2017-02-08 20:16:02', '2017-02-11 01:32:28'),
(24, 3, 'I think you are dealing with easy stuff just google it and retry harder.', 1, 0, 0, '2017-02-08 21:32:09', '2017-02-10 09:55:26'),
(26, 3, 'This is a comment', 0, 0, 0, '2017-02-09 04:52:18', '2017-02-09 04:52:18'),
(27, 3, ' This is reposted from the previous part of . Edited today.', 0, 0, 1, '2017-02-09 05:15:13', '2017-02-09 05:18:21'),
(28, 3, 'this is my answer just like it .', 0, 0, 0, '2017-02-09 05:52:58', '2017-02-09 05:52:58'),
(29, 3, 'As mentioned in the chat introduction, a lot of the activity streams functionality that we''ve built could be ported to support chat functionality. Instead, let''s take a number of templates to give us all we need for some basic chat functionality.', 0, 0, 0, '2017-02-09 06:01:16', '2017-02-09 06:01:16'),
(30, 3, 'As mentioned in the chat introduction, a lot of the activity streams functionality that we''ve built could be ported to support chat functionality. Instead, let''s take a number of templates to give us all we need for some basic chat functionality.', 0, 0, 0, '2017-02-09 06:03:03', '2017-02-09 06:03:03'),
(31, 3, 'As mentioned in the chat introduction, a lot of the activity streams functionality that we''ve built could be ported to support chat functionality. Instead, let''s take a number of templates to give us all we need for some basic chat functionality.', 0, 0, 0, '2017-02-09 06:04:59', '2017-02-10 09:42:13'),
(32, 3, 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Packages and web page editors now use Lorem Ipsum as their default model text.', 0, 0, 0, '2017-02-09 06:25:09', '2017-02-09 06:25:09'),
(33, 3, 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Packages and web page editors now use Lorem Ipsum as their default model text.', 0, 0, 0, '2017-02-09 06:25:35', '2017-02-09 06:25:35'),
(34, 3, 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Packages and web page editors now use Lorem Ipsum as their default model text.', 0, 0, 0, '2017-02-09 06:31:13', '2017-02-09 06:31:13'),
(35, 3, 'Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for ''lorem ipsum'' will uncover many web sites still in their infancy. Packages and web page editors now use Lorem Ipsum as their default model text.', 0, 0, 0, '2017-02-09 06:31:59', '2017-02-09 06:31:59'),
(36, 4, 'this is my message mechanical department.', 0, 0, 0, '2017-02-09 06:36:57', '2017-02-09 06:36:57'),
(38, 3, 'this is a post with some images', 0, 0, 0, '2017-02-09 08:04:36', '2017-02-09 08:04:36'),
(39, 3, 'ghjlk', 1, 0, 0, '2017-02-09 08:06:42', '2017-02-10 09:15:07'),
(40, 4, 'this is a chat message', 0, 0, 0, '2017-02-09 13:02:47', '2017-02-09 13:02:47'),
(41, 4, 'my second message', 0, 0, 0, '2017-02-09 13:26:41', '2017-02-09 13:26:41'),
(42, 3, 'from browser', 0, 0, 0, '2017-02-09 13:51:38', '2017-02-09 13:51:38'),
(43, 3, 'from browser heka', 0, 0, 0, '2017-02-09 14:20:34', '2017-02-09 14:20:34'),
(44, 3, 'from browser 46', 0, 0, 0, '2017-02-09 16:44:04', '2017-02-09 16:44:04'),
(45, 3, 'from browser 46', 0, 0, 0, '2017-02-09 16:45:56', '2017-02-09 16:45:56'),
(46, 3, 'no way', 0, 0, 0, '2017-02-09 16:49:10', '2017-02-09 16:49:10'),
(47, 3, 'csrf token is not working', 0, 0, 0, '2017-02-09 17:00:20', '2017-02-09 17:00:20'),
(48, 3, 'how about now', 0, 0, 0, '2017-02-09 17:01:24', '2017-02-09 17:01:24'),
(49, 3, 'not yet', 0, 0, 0, '2017-02-09 17:02:10', '2017-02-09 17:02:10'),
(50, 3, 'ioa', 0, 0, 0, '2017-02-09 17:08:10', '2017-02-09 17:08:10'),
(51, 3, 'ioa', 0, 0, 0, '2017-02-09 17:08:28', '2017-02-09 17:08:28'),
(52, 3, 'ioa', 0, 0, 0, '2017-02-09 17:08:29', '2017-02-09 17:08:29'),
(53, 3, 'ioa', 0, 0, 0, '2017-02-09 17:08:30', '2017-02-09 17:08:30'),
(54, 3, 'seding is working', 0, 0, 0, '2017-02-09 17:17:51', '2017-02-09 17:17:51'),
(55, 3, 'why you not come', 0, 0, 0, '2017-02-09 17:24:29', '2017-02-09 17:24:29'),
(56, 3, 'john', 0, 0, 0, '2017-02-09 17:26:01', '2017-02-09 17:26:01'),
(57, 3, 'john', 0, 0, 0, '2017-02-09 17:26:09', '2017-02-09 17:26:09'),
(58, 3, 's,a', 0, 0, 0, '2017-02-09 17:46:47', '2017-02-09 17:46:47'),
(59, 4, 'this is a chat message', 0, 0, 0, '2017-02-09 17:48:20', '2017-02-09 17:48:20'),
(60, 3, 'chart', 0, 0, 0, '2017-02-09 17:50:10', '2017-02-09 17:50:10'),
(61, 3, 'chart', 0, 0, 0, '2017-02-09 17:58:02', '2017-02-09 17:58:02'),
(62, 3, 'chart', 0, 0, 0, '2017-02-09 17:58:09', '2017-02-09 17:58:09'),
(63, 3, 'new Post', 0, 0, 0, '2017-02-09 20:56:48', '2017-02-09 20:56:48'),
(64, 3, 'new Post', 0, 0, 0, '2017-02-09 20:57:18', '2017-02-09 20:57:18'),
(65, 3, 'hello there', 0, 0, 0, '2017-02-09 20:57:56', '2017-02-09 20:57:56'),
(66, 3, ' Hello from course. edited', 0, 0, 1, '2017-02-10 08:26:48', '2017-02-11 04:16:21'),
(67, 3, 'this is new Public post. mfer.', 0, 0, 0, '2017-02-10 08:51:43', '2017-02-10 08:51:43'),
(68, 3, 'post with image in it.', 0, 0, 0, '2017-02-10 08:55:46', '2017-02-10 08:55:46'),
(69, 3, 'post with image in it.', 0, 0, 0, '2017-02-10 08:56:05', '2017-02-10 08:56:05'),
(70, 3, 'my comment', 0, 0, 0, '2017-02-10 08:56:29', '2017-02-10 08:56:29'),
(71, 3, 'this is a comment', 0, 0, 0, '2017-02-10 09:55:52', '2017-02-10 09:55:52'),
(72, 3, 'This is third answer', 0, 0, 0, '2017-02-10 10:05:04', '2017-02-10 10:05:04'),
(74, 3, ' sdklfja;skldjfl editeed', 0, 0, 1, '2017-02-11 04:13:55', '2017-02-11 04:14:12');

-- --------------------------------------------------------

--
-- Table structure for table `text_files`
--

CREATE TABLE `text_files` (
  `file_id` int(11) NOT NULL,
  `text_id` int(11) NOT NULL,
  `file_reference` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `text_files`
--

INSERT INTO `text_files` (`file_id`, `text_id`, `file_reference`, `description`, `created_at`, `updated_at`) VALUES
(1, 23, '1486595762.jpg', 'question_image', '2017-02-08 20:16:02', '2017-02-08 20:16:02'),
(2, 38, '1486638276.jpg', 'question_image', '2017-02-09 08:04:38', '2017-02-09 08:04:38'),
(3, 69, '1486727765.jpg', 'question_image', '2017-02-10 08:56:06', '2017-02-10 08:56:06');

-- --------------------------------------------------------

--
-- Table structure for table `text_tags`
--

CREATE TABLE `text_tags` (
  `tag_id` int(11) NOT NULL,
  `text_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `avatar` varchar(50) NOT NULL DEFAULT 'default.jpg',
  `online` tinyint(1) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `user_name`, `email`, `password`, `avatar`, `online`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Stuff', 'Student', 'stud_stuff', 'kb.cbrom@gmail.com', '$2y$10$AkkxO5OuMp0P40qL6FqF7.z64n6vymYwUNIs6J/.a0PFXdAJPofBm', '1486791677.jpg', 1, 'M4lejoohZNH61Omcr6IWf9JPZVwYcxVwWaWc1fsDvnTYA3URCU2yPrpAqMRM', '2017-02-03 20:40:35', '2017-02-11 03:38:40'),
(2, 'inst', 'Mech', 'inst_mech', 'kb.cbs@gmail.com', '$2y$10$pvf3ZtotodmNGm1sWJXXyeFHBKQp2u3AymxX7i5VntIsmfIHs6KAu', 'default.jpg', 1, 'ENIInOTaG3P1Cy9s77CiTmOXcj8LydeV2c7gorwUZh9DrRnGtfLwkkxSwovc', '2017-02-04 03:07:57', '2017-02-09 08:29:28'),
(3, 'cbs', 'abody', 'cb_student', 'cb@gmail.com', '$2y$10$Wqks84symKBCPbb4zQxi4uga/tFVWtiR5j8b3CvsGMMUmAmgx9pD2', '1486561507.jpg', 1, '7kqSzKTMmc0VsTOUzPvADyDdFgeInH9FKF9OmeqqNsm4IAvDPJznhJZOW59f', '2017-02-04 10:01:14', '2017-02-11 03:33:39'),
(4, 'cbrom', 'abody', 'cbs_student', 'cbrom_a@gmail.com', '$2y$10$SGCgY6xPPE6H2MOIFwu.LuTd735tlhpvq0dDjat7OanJHwhWT1EcC', 'default.jpg', 1, 'W6nazmcJfhpTZgsFJJsIOuStPuInxbdrVJCcSzPbWdBu9K0Ul9tg8QiKaA8J', '2017-02-06 09:57:16', '2017-02-09 08:29:36'),
(5, 'aa', 'bb', 'stuff aa', 'cs@gmail.com', '$2y$10$59NzFOUPXgjD.4EtkRsg7uiyWfYsjDEWRot.hNUUr358nbT0oYR..', 'default.jpg', NULL, 'xBKElaHjwSvh4STEqUfkzrWj06Mr97Ujd5IIn41JISmPj2JI3und2WIrDPfT', '2017-02-11 03:35:01', '2017-02-11 04:02:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`announ_id`,`stuff_id`);

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `bloggers`
--
ALTER TABLE `bloggers`
  ADD PRIMARY KEY (`blogger_id`),
  ADD UNIQUE KEY `blog_name` (`blog_name`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `channels`
--
ALTER TABLE `channels`
  ADD PRIMARY KEY (`channel_id`,`owner_id`),
  ADD UNIQUE KEY `channel_name` (`channel_name`);

--
-- Indexes for table `channel_posts`
--
ALTER TABLE `channel_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_public_messages`
--
ALTER TABLE `channel_public_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_messages`
--
ALTER TABLE `chat_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_id`,`ins_id`);

--
-- Indexes for table `course_announcements`
--
ALTER TABLE `course_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_group_messages`
--
ALTER TABLE `course_group_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_posts`
--
ALTER TABLE `course_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_protests`
--
ALTER TABLE `course_protests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_public_messages`
--
ALTER TABLE `course_public_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_questions`
--
ALTER TABLE `course_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`dep_id`),
  ADD UNIQUE KEY `dep_name` (`dep_name`);

--
-- Indexes for table `department_announcements`
--
ALTER TABLE `department_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_group_messages`
--
ALTER TABLE `department_group_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_posts`
--
ALTER TABLE `department_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_protests`
--
ALTER TABLE `department_protests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_public_messages`
--
ALTER TABLE `department_public_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_questions`
--
ALTER TABLE `department_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followed_text`
--
ALTER TABLE `followed_text`
  ADD PRIMARY KEY (`stud_id`,`followed_text_id`);

--
-- Indexes for table `group_chats`
--
ALTER TABLE `group_chats`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `group_chat_users`
--
ALTER TABLE `group_chat_users`
  ADD PRIMARY KEY (`group_id`,`user_id`);

--
-- Indexes for table `group_messages`
--
ALTER TABLE `group_messages`
  ADD PRIMARY KEY (`message_id`,`group_id`);

--
-- Indexes for table `liked_text`
--
ALTER TABLE `liked_text`
  ADD PRIMARY KEY (`stud_id`,`liked_text_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`text_id`,`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `private_messages`
--
ALTER TABLE `private_messages`
  ADD PRIMARY KEY (`message_id`);

--
-- Indexes for table `protests`
--
ALTER TABLE `protests`
  ADD PRIMARY KEY (`protest_id`);

--
-- Indexes for table `public_announcements`
--
ALTER TABLE `public_announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_messages`
--
ALTER TABLE `public_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_posts`
--
ALTER TABLE `public_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_protests`
--
ALTER TABLE `public_protests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `public_public_messages`
--
ALTER TABLE `public_public_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `student_courses`
--
ALTER TABLE `student_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_stuff`
--
ALTER TABLE `stud_stuff`
  ADD PRIMARY KEY (`stuff_id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `texts`
--
ALTER TABLE `texts`
  ADD PRIMARY KEY (`text_id`);

--
-- Indexes for table `text_files`
--
ALTER TABLE `text_files`
  ADD PRIMARY KEY (`file_id`);

--
-- Indexes for table `text_tags`
--
ALTER TABLE `text_tags`
  ADD PRIMARY KEY (`tag_id`,`text_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `announ_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `bloggers`
--
ALTER TABLE `bloggers`
  MODIFY `blogger_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `channels`
--
ALTER TABLE `channels`
  MODIFY `channel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `channel_posts`
--
ALTER TABLE `channel_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `channel_public_messages`
--
ALTER TABLE `channel_public_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `course_announcements`
--
ALTER TABLE `course_announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course_group_messages`
--
ALTER TABLE `course_group_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course_posts`
--
ALTER TABLE `course_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `course_protests`
--
ALTER TABLE `course_protests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `course_public_messages`
--
ALTER TABLE `course_public_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `course_questions`
--
ALTER TABLE `course_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `dep_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `department_announcements`
--
ALTER TABLE `department_announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `department_group_messages`
--
ALTER TABLE `department_group_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department_posts`
--
ALTER TABLE `department_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `department_protests`
--
ALTER TABLE `department_protests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `department_public_messages`
--
ALTER TABLE `department_public_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `department_questions`
--
ALTER TABLE `department_questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `group_chats`
--
ALTER TABLE `group_chats`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `group_chat_users`
--
ALTER TABLE `group_chat_users`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `public_announcements`
--
ALTER TABLE `public_announcements`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `public_messages`
--
ALTER TABLE `public_messages`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `public_posts`
--
ALTER TABLE `public_posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `public_protests`
--
ALTER TABLE `public_protests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `public_public_messages`
--
ALTER TABLE `public_public_messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student_courses`
--
ALTER TABLE `student_courses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `texts`
--
ALTER TABLE `texts`
  MODIFY `text_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `text_files`
--
ALTER TABLE `text_files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
