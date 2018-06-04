-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 04, 2018 at 09:19 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_contents`
--

CREATE TABLE `blog_contents` (
  `id` int(11) NOT NULL,
  `about_blog` longtext CHARACTER SET utf8 NOT NULL,
  `terms` longtext CHARACTER SET utf8 NOT NULL,
  `contact` longtext CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_contents`
--

INSERT INTO `blog_contents` (`id`, `about_blog`, `terms`, `contact`) VALUES
(8, 'এই ব্লগটি বিভিন্ন ধরনের আধুনিক এবং নিত্য-নতুন প্রজুক্তি, নানা রকম আবিষ্কার ও প্রজুক্তিগত টিপস সম্পর্কিত খবরে একটি ব্লগ। এই ব্লগটি কোনো বানিজ্যিক উদ্দেশ্যে তৈরি নয়, শুধুমাত্র কমপিউটার ব্যবহারকারীর সাহায্য এবং বিভিন্ন জানা ও অজানা তথ্য তুলে ধরতে এই ব্লগটি তৈরী করা । আশা করি এই ব্লগটি থেকে আপনি কিছুটা হলেও উপকৃত হবেন।\r\n\r\n<B>ব্লগঃ</B> বিশ্বের প্রতিটি মানুষের রয়েছে মত প্রকাশের স্বাধীনতা তা হতে পারে সংবাদপত্রে বা ইন্টারনেট অথবা বিভিন্ন মাধ্যমে। বর্তমান সময়ে ইন্টারনেট এর সবচেয়ে জনপ্রিয় স্থান হল ব্লগ। ইন্টারনেট ব্যবহার করছেন অথচ ব্লগ এর নাম শোনেননি এমন লোক পৃথিবীতে খুব কমই আছে। ব্লগ শব্দটি ইংরেজি blog শব্দ থেকে এসেছে। এটি মূলত weblog এর সংক্ষিপ্ত রূপ। একে ভার্চুয়াল ডায়েরী ও বলা যেতে পারে কেননা, ব্লগের লেখকগণ তাদের দৈনন্দিন কথাগুলো ব্লগে প্রকাশ করে থাকেন। * ১৭ ডিসেম্বর, ১৯৯৭ সালে জোম বার্গার সর্বপ্রথম weblog শব্দটির অবতারণা করেন। * পরবর্তীতে পিটার মেরহোলজ শব্দটির সংক্ষিপ্ত রূপ blog প্রকাশ করেন তার একটি ওয়েবসাইটে। পরবর্তীতে এই শব্দটি বহুল জনপ্রিয়তা লাভ করে এবং ধীরে ধীরে মানুষ ব্লগের প্রতি আগ্রহী হয়ে উঠে এবং ধীরে ধীরে মানুষজন কাগুজে পাতায় লিখার চেয়ে ব্লগে লিখতে শুরু করে। এভাবেই শুরু হয় ব্লগ এর যাত্রা এবং আজ এই সময়েও প্রায় প্রতিদিনই তৈরি হচ্ছে নিত্যনতুন ব্লগ।\r\n\r\n<B>ব্লগ সাধারনত দুই ধরনের হয়ে থাকেঃ</B>\r\n\r\n১. ব্যক্তিগত ব্লগ (personal blog): এই ধরনের ব্লগসমূহ সাধারনত ব্যক্তিগত উদ্যোগে হয়ে থাকে যেখানে একজন ব্লগার তার মতামত, ধ্যান-ধারণা এবং তার নিজস্ব লেখা প্রকাশ করে থাকেন। ব্যক্তিগত ব্লগে এডমিন অন্যকে তার ব্লগে লেখার সুযোগ দিতে পারেন।\r\n\r\n২. সামাজিক ব্লগ (community blog): এই ধরনের ব্লগসমূহ সাধারনত ব্যক্তিগত উদ্যোগ অথবা একই মতের কয়েকজন এর উদ্যোগে হয়ে থাকে। এসকল ব্লগ পাবলিক ব্লগ নামেও পরিচিত যেখানে সকলে অংশগ্রহন করতে পারে এবং সেই ব্লগের নীতিমালা মেনে তাদের নিজস্ব লেখা প্রকাশ করতে পারে। এসকল ব্লগের লেখাসমুহ বিভিন্ন বিভাগের হয়ে থাকে এবং লেখাগুলোর দায়-দায়িত্ব সম্পূর্ণভাবে ঐ লেখার লেখকের হয়ে থাকে।\r\n\r\n<B>ব্লগারঃ</B> যারা মূলত ব্লগে তাদের লেখা প্রকাশ করে থাকেন তাঁরা-ই ব্লগার নামে পরিচিত। * ব্লগার শব্দটি সর্বপ্রথম ইভান উইলিয়ামস তার পাইরা ল্যাবস এর মাধ্যমে প্রকাশ করেন। * পরবর্তীতে ১৯৯৯ সালে ইভান উইলিয়ামস ও মেগ হুরিহান চালু করেন blogger.com যা পরবর্তীতে গুগল কিনে নেয়। এবং এভাবেই ব্লগার শব্দটি ধীরে ধীরে জনপ্রিয় হতে থাকে। একজন ব্লগার সাধারনত তাদের নিজস্ব কথাগুলোই একটি ব্লগের মাধ্যমে প্রকাশ করে থাকেন। এটি হতে পারে সামাজিক সমস্যা,প্রযুক্তির নিত্যনতুন তথ্য,গল্প,কবিতা,গান,প্রবন্ধ,ধর্মীয়,পন্যের প্রচার ইত্যাদি। অর্থাৎ একজন ব্লগার তার নিজস্ব মতামতের ভিত্তিতেই লিখে থাকেন এবং তার লেখার জন্য সে-ই এর দায়িত্ব বহন করে। বিভিন্ন ব্লগার এর চিন্তা ভাবনা যার যার নিজস্ব। একজনের সাথে অপরজনের মতের মিল নাও হতে পারে। তাই সকল ব্লগারকে এক পাল্লায় মাপা উচিত নয়। কেউ হয়ত ইন্টারনেট সম্পর্কে ভাল ধারণা রাখে সে তাই এই বিষয়েই লিখার চেষ্টা করে থাকে। কিন্তু তাই বলে যে কবিতা লিখবে তাকেও প্রজুক্তি নিয়ে লিখতে হবে এমন কোন বাধা-ধরা নিয়ম নেই। কোন ব্লগার কি বিষয়ে লিখবে এটা নিতান্তই তার ব্যক্তিগত ব্যপার।\r\n\r\n<B>ব্লগিং :</B> কোন একটি ব্লগে ব্লগার যে মতামত বা লিখা প্রকাশ করেন একে বলা হয় ব্লগিং। ব্লগিং এর জন্য দেশ-বিদেশে রয়েছে অনেক ধরনের ব্লগ যেমন টেকপ্রিয়.নেট (TECHPRIYO.NET). কোন কোন ব্লগে যে কেউ নিবন্ধন করে তাদের দৈনন্দিন জীবন/প্রযুক্তির তথ্য ইত্যাদি বিষয় নিয়ে লিখতে পারেন এবং সারা বিশ্বের মানুষজন তাদের সেই লিখা পড়তে পারেন বিনামূল্যে।', '<strong>প্রতিটি সিস্টেমের কিছু নিয়ম-নীতি থাকে যা পালনের মাধ্যমে সিস্টেমটি তার আপন সত্ত্বা ধরে রাখে। তেমনি কথার মেলা ব্লগেও আপনাকে কিছু নিয়ম অবশ্যই মেনে চলতে হবে। ব্লগটি সুন্দর এবং মার্জিত রাখার জন্যে আপনাকে নিচের নিয়ম গুলো অবশ্যই মানতে হবেঃ</strong>\n\n১) ব্লগ লিখতে হলে অবশ্যই আপনাকে রেজিস্টার্ড সদস্য হতে হবে।\n\n২) ব্লগ লিখতে অবশ্যই সর্বজনবোধ্য ভাষারীতি ব্যবহার করতে হবে।\n\n৩) ব্লগিং এর মাধ্যমে আত্মঘাতী কোন লেখা প্রকাশ করা যাবে না।\n\n৪) ধর্মীয় অনুভূতিতে আঘাত হানে এমন লেখা বা মন্তব্য প্রকাশ করা যাবে না।\n\n৫) কোন টিপস লিখার আগে অবশ্যই নিজে চেষ্টা করে দেখতে হবে টিপসটি কার্যকরী কিনা।\n\n৬) টিঊটোরিয়াল লিখার সময় প্রয়োজনীয় তথ্য এবং সম্ভব হলে সচিত্র টিউটোরিয়াল লিখুন।\n\n৭) ব্লগের নিয়ম মেনে না চলা হলে তাৎক্ষনিক ব্যান করা হবে।', '                                                                                              কথার মেলা ব্লগ\n\n                                                                                          আপনার জমানো স্মৃতি\n\n                                            কথার মেলা ব্লগ, বাংলাদেশের অন্যতম একটি বাংলা ব্লগ সাইট সকলের কথা শোনার জন্যে।\n\n                   আপনি রেগুলার ব্লগার? নিয়মিত লিখেন? সময় সল্পতার কারনে লিখা হয়ে উঠেনা?? ইতস্তত বোধ করছেন লিখবেন কি লিখবেন না??\n\n                                           আজ ই নিবন্ধন করে লিখা শুরু করে দিন। আমরা আছি আপনার জমানো কথা শোনার জন্যে।\n\n                                                        কথার মেলা বাংলা ব্লগ, আপনার কথা জমানোর জায়গা হয়ে উঠতে পারে।\n\n                                             যেকোনো কথা বা ব্লগ সম্পর্কিত যেকোনো পরামর্শ জানিয়ে আমাদের বার্তা পাঠাতে পারেন।।');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `comments` longtext CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment_replies`
--

CREATE TABLE `comment_replies` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `reply` longtext CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post_table`
--

CREATE TABLE `post_table` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `post_category` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_image` text CHARACTER SET utf8,
  `post_content` longtext CHARACTER SET utf8 NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `email` varchar(255) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(255) CHARACTER SET utf8 NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 NOT NULL,
  `profile_image` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_contents`
--
ALTER TABLE `blog_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_replies`
--
ALTER TABLE `comment_replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_table`
--
ALTER TABLE `post_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_contents`
--
ALTER TABLE `blog_contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `comment_replies`
--
ALTER TABLE `comment_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `post_table`
--
ALTER TABLE `post_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
