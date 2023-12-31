-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 31, 2023 at 07:03 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_media`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_logs`
--

CREATE TABLE `action_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `action_logs`
--

INSERT INTO `action_logs` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 2, 3, '2023-12-30 23:17:00', '2023-12-30 23:17:00'),
(2, 2, 1, '2023-12-30 23:17:09', '2023-12-30 23:17:09'),
(3, 2, 2, '2023-12-30 23:17:22', '2023-12-30 23:17:22'),
(4, 2, 2, '2023-12-30 23:17:28', '2023-12-30 23:17:28'),
(5, 2, 4, '2023-12-30 23:17:33', '2023-12-30 23:17:33'),
(6, 2, 2, '2023-12-30 23:19:24', '2023-12-30 23:19:24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'K-pop', 'news about K-idol', '2023-12-30 22:57:45', '2023-12-30 22:57:45'),
(2, 'Western', 'News about western-artist', '2023-12-30 22:58:05', '2023-12-30 22:58:05'),
(3, 'Technology', 'News about technology', '2023-12-30 22:58:58', '2023-12-30 22:58:58');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_12_21_024247_create_posts_table', 1),
(7, '2023_12_21_024347_create_categories_table', 1),
(8, '2023_12_21_024429_create_action_logs_table', 1),
(9, '2023_12_21_084317_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, '1704001548', 'e6393eac6de7d66a932443c2b9e1674ef7e94616fa1a677a2dd3be852a2a3486', '[\"*\"]', NULL, NULL, '2023-12-30 23:15:48', '2023-12-30 23:15:48'),
(2, 'App\\Models\\User', 2, '1704001578', 'a08d5e37c13906fd229e342620e59d9aff2e7c2e5f288ea7648ca5fbd8fbfdfa', '[\"*\"]', NULL, NULL, '2023-12-30 23:16:18', '2023-12-30 23:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `image`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 'YG Announces BLACKPINK Is Not Renewing Individual Contracts For Solo Activities', 'Although all four members of BLACKPINK recently renewed their contracts with YG Entertainment for group activities, they will not be renewing their individual contracts for solo activities.\r\n\r\nOn December 29, YG Entertainment officially announced that the BLACKPINK members would not be signing exclusive contracts with the agency for their solo activities outside of the group.\r\n\r\nSeveral days before the announcement, Jennie personally confirmed that she had launched a new label called OA (ODD ATELIER) for her solo activities outside of BLACKPINK.\r\n\r\nYG Entertainment’s full statement is as follows:\r\n\r\nHello, this is YG Entertainment.\r\n\r\nBLACKPINK recently renewed their contracts with YG for their group activities, and we have agreed not to proceed with additional contracts for [the members’] individual activities.\r\n\r\nWe will do our utmost to support BLACKPINK’s activities, and we will cheer on the members’ individual activities with warm hearts.\r\n\r\nThank you.', '6590fcec00aaa_The-members-of-BLACKPINK-put-on-amazing-solo-performances.-Check-out.jpg', 1, '2023-12-30 23:02:28', '2023-12-30 23:02:28'),
(2, 'Blackpink Honorary MBEs at Buckingham Palace', 'Rosé, Jennie, Jisoo, and Lisa are now Honorary Members of the Order of the British Empire.\r\nAs part of the ongoing state visit from South Korea, King Charles held an Investiture at Buckingham Palace today for Blackpink.\r\n\r\nThe girl group—Jennie Kim, Roseanne \"Rosé\" Park, Jisoo Kim, and Lalisa \"Lisa\" Manoban—received honorary Members of the Order of the British Empire (MBEs) in recognition \"of the band\'s role as COP26 Advocates for the COP26 Summit in Glasgow 2021,\" according to the Palace. (Because Rosé has dual New Zealand citizenship, her MBE is substantive as a Realm national.)\r\nDuring the ceremony, King Charles joked to the band, \"It\'s amazing you\'re still talking to each other after all these years.\" He added, \"I hope I shall be able to see you perform live at some point.\" In attendance at the Investiture were also the South Korean President, Yoon Suk Yeol, and the First Lady of Korea, Kim Keon Hee.\r\nLast night, Blackpink attended the State Banquet, and King Charles spoke about them in his speech.\r\n\r\n\"It is especially inspiring to see Korea’s younger generation embrace the cause. I applaud Jennie, Jisoo, Lisa and Rosé, better known collectively as Blackpink, for their role in bringing the message of environmental sustainability to a global audience as Ambassadors for the U.K.\'s Presidency of COP 26, and later as advocates for the U.N. Sustainable Development Goals,\" the King said. \"I can only admire how they can prioritize these vital issues, as well as being global superstars.\"', '6590fdfa19352_pop-band-blackpinks-members-lalisa-manoban-roseanne-park-news-photo-1700662127.jpg', 1, '2023-12-30 23:06:58', '2023-12-30 23:06:58'),
(3, '‘Stranger Things’ Final Season to Begin Production in January', '“Stranger Things” is finally going back to Hawkins.\r\n\r\nProduction on the fifth and final season of the juggernaut Netflix series is currently set to begin in early January, according to multiple sources, though the start date is still subject to change. Filming was postponed for over seven months due to the WGA and SAG-AFTRA strikes. \r\n\r\nCreators and executive producers Matt Duffer and Ross Duffer were among the most high profile showrunners to announce they were suspending work after the writers strike began in May, posting on social media that “Writing does not stop when filming begins.” When the Duffer brothers spoke to Variety in July about series costar Noah Schnapp (who was part of the Power of Young Hollywood issue), they elaborated on that sentiment.\r\n\r\n“Since it’s our scripts, you’re changing it all the time on the fly,” Matt Duffer said. “You’re either working it out with the actors, you’re changing the blocking, you’re changing it based on locations. When you’re talking about this many hundreds of pages, it is always evolving.”\r\n\r\nAt the time, they declined to say how far along they had gotten in the writing process before the writers strike began, but they did say they had started location scouting for Season 5 prior to the work stoppage. “And when you’re doing that, everything is changing constantly,” Ross Duffer said. “It’s a constantly evolving monster, so it’s hard for me to remember exactly where we were. It’s just that we weren’t ready to start shooting with a locked script.”\r\n\r\nAlong with Schnapp, the entire cast of the series is expected to return, including Winona Ryder, David Harbour, Millie Bobby Brown, Finn Wolfhard, Gates Matarazzo, Caleb McLaughlin, Sadie Sink, Natalia Dyer, Charlie Heaton, Joe Keery, Maya Hawke and Priah Ferguson. “Terminator” star Linda Hamilton is joining the cast for Season 5, and “Prey” and “10 Cloverfield Lane” director Dan Trachtenberg will be helming at least one episode, alongside regular directors the Duffers and Shawn Levy, who is also executive producing.\r\n\r\nIn September, Levy said that Season 5 of “Stranger Things” will be “major, major cinematic storytelling” and “as big as any of the biggest movies that we see.” A month prior, Harbor told the “Happy Sad Confused” podcast that he knows how the Duffers are planning to end the series.\r\n\r\n“I know where we net out and it’s very, very moving,” Harbour said. “It’s a hell of an undertaking, too. I mean, the set pieces and the things in the scripts that we saw are bigger than anything we’ve done in the past.”\r\n\r\nThere is virtually no chance Season 5 will debut earlier than 2025, but “Stranger Things: The First Shadow” — a stage play set in Hawkins, Indiana in 1959 that tracks the origins of several major characters from the show — debuts in the Phoenix Theater in London’s West End on Dec. 14. The script is written by “Stranger Things” writer and co-executive producer Kate Trefry, based on an original story by the Duffers, Jack Thorne and Trefry.', '6590fef4ea329_1_PfuilbC3EQ4jc8UHhiPgcA.jpg', 2, '2023-12-30 23:11:08', '2023-12-30 23:11:08'),
(4, 'St Vincent\'s Health Australia warns cyber attack forensics could \"take some time\"', 'St Vincent’s Health Australia (SVHA) said it could “take some time” to establish exactly what data was stolen in a cyber attack before Christmas.\r\n\r\nIn a statement yesterday, the hospital and aged care facility operator said the work “to determine what data has been removed … is a complex and highly technical activity.”\r\n\r\n“We do expect it will take some time before we know exactly what data was taken from our systems,” the organisation said.\r\n\r\n“Should we discover that any sensitive information has been stolen by cyber criminals, we will do all that we can to contact the impacted persons to inform them of this, give them information about the steps that they can take to protect themselves and support them through that process.”\r\n\r\nThe Australian Cyber Security Coordinator, which is part of Home Affairs, said in a post on X that it was also assisting on the forensics activity.\r\n\r\n“With cyber incidents like these across a large network of many different systems, it often takes some time to confidently ascertain how the incident occurred, what the threat actor did, what systems they accessed and what was taken,” the coordinator wrote.\r\n\r\n“The Australian government is working with St Vincent’s Health Australia and their external cyber security firm to undertake this complex work as quickly as possible.”\r\n\r\nSVHA said it has engaged CyberCX as part of its remediation activity, in addition to utilising government agency resources.\r\n\r\nThe organisation also said it is continuing to deliver frontline health services, and that it was “managing some network disruptions as part of our remediation works” following the attack.\r\n\r\nThe Australian Federal Police are also said to have opened a criminal investigation into the incident', '6590ffa28aa12_0_420_748_0_70__News_20231230091701_SVHA.png', 3, '2023-12-30 23:14:02', '2023-12-30 23:14:02');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('mcArXjLO9Pm4FMwnHj6nrwWhoDOnO1SS2q939Kt5', 1, '127.0.0.1', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/118.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoicjVMRzdyS0lPT211T3MxNnJFbGlyaE9hYXl5eDc2aHNwcXd2SEJoTiI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvdHJlbmRQb3N0Ijt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRFdUFDNHRoNm9HblpNeGdremYwOXd1VVRMYXJRQVUzTW5la3Q5YzdyUUcwOG5vMzJjOVU1QyI7fQ==', 1704001729);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `gender`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$EuAC4th6oGnZMxgkzf09wuUTLarQAU3Mnekt9c7rQG08no32c9U5C', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-30 22:51:11', '2023-12-30 22:51:11'),
(2, 'user', 'user@gmail.com', NULL, NULL, NULL, NULL, '$2y$12$YO.m79Nmq5XTZT990Cw5m.QMC1EFSwkdFkuIBPAobWIbkj2j.FXsi', NULL, NULL, NULL, NULL, NULL, NULL, '2023-12-30 23:15:34', '2023-12-30 23:15:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `action_logs`
--
ALTER TABLE `action_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `action_logs`
--
ALTER TABLE `action_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
