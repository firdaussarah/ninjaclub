-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 17, 2025 at 07:48 AM
-- Server version: 8.0.30
-- PHP Version: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ninja_club`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `image`) VALUES
(1, 'Mountain Touring', 'This was our very first official ride as a club, heading to the mountains for a full-day adventure. A memorable start to many more journeys ahead.', '6.jpg'),
(2, 'Midnight Ride', 'A thrilling night ride around the city with our fellow riders. Cruising through the quiet streets and neon lights—pure freedom on two wheels.', '2.jpg'),
(13, 'Beach Cruise', 'A relaxing weekend ride to the beach. We shared stories, snapped some great photos, and watched the sunset while our bikes rested by the sand.', '16.jpg'),
(14, 'Charity Ride', 'A special event where we ride for a cause. All members joined forces to raise donations for local orphanages. Riding with heart and purpose.', '14.jpg'),
(15, 'Track Day', 'We hit the local circuit for a full day of speed, safety drills, and cornering practice. A great way to improve riding skills and test the limits—safely!', '4.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `category` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `description`, `image`, `category`) VALUES
(1, 'Ninja Ride Out – Bogor Edition', 'Get ready, Ninja warriors!\r\nJoin us for a thrilling ride through the streets and hills of Bogor with the Ninja Club family.\r\nFeel the speed, share the brotherhood, and live the moment.\r\nOne ride, one heart – Ninja style!', 'assets/img/portfolio/5.jpg', 'Gallery'),
(2, 'Ride Together, Stand United', 'The Ninja Club Bogor invites you to a special gathering for all Kawasaki Ninja lovers.\r\nIt\'s not just about the ride – it\'s about unity, friendship, and passion.\r\nBe part of the journey. Be part of the family.', 'assets/img/portfolio/13.jpg', 'Gallery'),
(3, 'Ninja Adventure Ride – Bogor Escape', 'Adventure is calling!\r\nHit the road with fellow riders from Ninja Club Bogor for an epic journey filled with twists, turns, and unforgettable moments.\r\nLet your Ninja roar – Bogor is waiting.', 'assets/img/portfolio/6.jpg', 'Gallery'),
(4, 'Ninja Adventure Quest – Bogor Bound', 'Adventure is here!\r\nGear up with Ninja Club Bogor for an unforgettable ride through the heart of Bogor, where every twist and turn leads to a new thrill.\r\nLet your Ninja roar – the adventure begins now!\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'assets/img/portfolio/8.jpg', 'Gallery'),
(5, 'Ninja Riders Expedition – Bogor Unleashed', 'The road calls – are you ready for the ride of a lifetime?\r\nJoin Ninja Club Bogor for an epic journey through Bogor’s wildest paths, where every corner holds a new adventure.\r\nUnleash your Ninja – the road to Bogor is waiting!', 'assets/img/portfolio/14.jpg', 'Gallery');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `message` text COLLATE utf8mb4_general_ci NOT NULL,
  `sent_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `subject`, `message`, `sent_at`) VALUES
(29, 'kiz', 'admin@gmail.com', 's', 'aaa', '2025-04-15 06:33:28'),
(30, 'gatauee', 'asep@gmail.com', 'alo', 'salam kenal', '2025-04-17 02:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `image`, `description`, `created_at`) VALUES
(2, 'Weekend Touring to Puncak with Ninja Club Bogor', 'assets/img/clients/67ffc0a64afab.jpg', 'Ninja Club Bogor held another exciting weekend touring event on Sunday, April 6, 2025. This time, the chosen destination was the scenic Puncak area — a favorite among riders for its challenging curves and refreshing mountain views.  The ride started at 6:00 AM from our official basecamp on Jl. Kenangan No. 8, Bogor. A total of 27 members participated, and the trip began with a short safety briefing and route explanation.  Throughout the journey, members maintained excellent riding discipline and looked out for each other. Upon arriving in Puncak, we gathered for breakfast and took a group photo at our usual spot near Taman Safari Corner.  In addition to the ride, the event included a sharing session from our senior riders about how to keep Ninja bikes in top condition for long-distance rides.  This activity reflects the strong bond and solidarity among the members of Ninja Club Bogor. For us, this club is not just about riding — it’s about building brotherhood and unforgettable memories on two wheels.', '2025-04-12 01:24:20'),
(5, 'Top Tips to Keep Your Ninja Running Like a Beast', 'assets/img/clients/67ffc0dbaeab4.jpg', 'Owning a Kawasaki Ninja is thrilling, but keeping it in top condition is key to maintaining its awesome performance. Regular maintenance ensures that your ride continues to deliver that adrenaline-pumping thrill every time you twist the throttle. From checking tire pressure to oil changes and chain maintenance, this article provides simple yet crucial tips to ensure your Ninja stays as powerful as the day you bought it. Keep your bike running smoothly, and it will keep you riding fast.', '2025-04-13 12:34:02'),
(9, 'Join the Ninja Club: A Brotherhood of Riders', 'assets/img/clients/67ffc27341154.jpg', 'Riding a Ninja isn’t just about the bike – it’s about the community. The Ninja Club is a brotherhood of passionate Kawasaki Ninja riders from all over the world. Whether you\'re looking for group rides, sharing experiences, or just discussing the best riding techniques, the Ninja Club offers a space to connect with like-minded individuals. In this article, we’ll dive into the benefits of joining the Ninja Club, from exclusive events and group rides to insider news about Kawasaki\'s latest releases. It’s not just about the ride – it’s about the people you meet along the way.', '2025-04-16 14:44:40'),
(10, 'The Evolution of the Kawasaki Ninja: A Legacy of Speed', 'assets/img/1.jpg', 'The Kawasaki Ninja series has always been at the forefront of high-performance motorcycles, with each new model building upon the legacy of its predecessors. From the original Ninja 900R to the current top-tier models like the Ninja H2, Kawasaki has continuously pushed the boundaries of speed and engineering. This article takes a deep dive into the evolution of the Ninja, highlighting the technological advancements and design changes that have helped shape the most iconic sports bike on the market.', '2025-04-16 14:46:41'),
(11, 'Essential Gear Every Kawasaki Ninja Rider Needs', 'assets/img/2.jpg', 'Every Kawasaki Ninja rider knows that the right gear is just as important as the bike itself. Whether you\'re hitting the track or cruising on the open road, wearing the proper safety equipment ensures that you can enjoy your ride while staying protected. This article discusses the essential gear every Ninja rider should own, from high-quality helmets and riding jackets to gloves and boots. Learn what to look for when choosing gear that not only enhances your safety but also your comfort and style.', '2025-04-16 15:00:07'),
(12, 'How to Customize Your Kawasaki Ninja: Personalize Your Ride', 'assets/img/clients/67ffc64f2da97.jpg', 'One of the best parts of owning a Kawasaki Ninja is the endless opportunities for customization. Whether you want to enhance performance, improve aesthetics, or add comfort features, there are countless ways to make your Ninja truly yours. In this article, we’ll explore the most popular modifications for Kawasaki Ninja owners, from exhaust upgrades and suspension tweaks to custom paint jobs and ergonomic enhancements. Get inspired and start building the Ninja of your dreams!', '2025-04-16 15:00:36');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `id` int NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `position` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`id`, `name`, `position`, `image`) VALUES
(1, 'sannzz', 'leader', 'assets/img/team/5.jpg'),
(2, 'gio', 'member', 'assets/img/team/7.jpg'),
(3, 'anna', 'member', 'assets/img/team/10.jpg'),
(5, 'kevin', 'member', 'assets/img/team/8.jpg'),
(6, 'darr', 'member', 'assets/img/team/25.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`) VALUES
(1, 'sar', 'sarsukapermen', 'sarsukapermen@gmail.com', '2025-04-15 02:17:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
