-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Вер 11 2017 р., 03:24
-- Версія сервера: 5.7.16
-- Версія PHP: 5.6.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `laravelblog`
--

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `alias` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `parent_id`, `name`, `keywords`, `description`, `alias`, `created_at`, `updated_at`) VALUES
(1, 0, 'HTML/HTML5', 'ключові слова', 'опис', 'HTML_HTML5', NULL, NULL),
(2, 0, 'CSS/CSS3', 'ключові словаіііі', 'опис', 'CSS_CSS3', NULL, '2017-08-17 19:16:16'),
(3, 0, 'Javascript', 'ключові слова', 'опис', 'javascript', NULL, NULL),
(4, 0, 'PHP', 'ключові слова', 'опис', 'PHP', NULL, NULL),
(5, 0, 'Yii2', 'ключові слова', 'опис', 'Yii2', NULL, NULL),
(6, 0, 'Laravel', 'ключові слова', 'опис', 'Laravel', NULL, NULL),
(7, 0, 'Wordpress', 'ключові слова', 'опис', 'Wordpress', NULL, NULL),
(8, 0, 'MySQL', 'ключові слова', 'опис', 'MySQL', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `deslikes` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `post_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `comment`
--

INSERT INTO `comment` (`id`, `login`, `parent_id`, `text`, `likes`, `deslikes`, `created_at`, `updated_at`, `post_id`, `user_id`) VALUES
(1, 'Test', 0, 'hello', 43, 2, '2017-08-17 04:20:22', NULL, 6, 1),
(2, '0', 0, 'kak dela?', 0, 0, '2017-08-17 16:37:34', '2017-08-17 16:37:34', 6, 2),
(3, '0', 1, 'hi', 0, 0, '2017-08-17 16:43:03', '2017-08-17 16:43:03', 6, 2),
(4, 'Sanikiksa', 0, 'Pruvit', 0, 0, '2017-08-18 15:15:51', '2017-08-18 15:15:51', 5, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `feedback`
--

CREATE TABLE `feedback` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `subject`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Sasasa@gmail.com', 'Sasasa@gmail.com', 'Тема1', 'Меню зїхало, поправ', '2017-08-17 14:52:22', '2017-08-17 14:52:22'),
(2, 'Sasasa@gmail.com', 'Sasasa@gmail.com', 'Тема1', 'Меню зїхало, поправ', '2017-08-17 14:52:36', '2017-08-17 14:52:36'),
(3, 'Sasasa@gmail.com', 'Sasasa@gmail.com', 'Тема2', 'Як справи????', '2017-08-17 14:53:00', '2017-08-17 21:08:56'),
(4, 'Автор', 'Автор', 'Портфоліо 7', 'Зробіть подібний сайт', '2017-08-18 15:46:25', '2017-08-18 15:46:25');

-- --------------------------------------------------------

--
-- Структура таблиці `message`
--

CREATE TABLE `message` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_it` int(11) NOT NULL DEFAULT '0',
  `last_message` int(10) UNSIGNED NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `whom_id` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `message`
--

INSERT INTO `message` (`id`, `text`, `read_it`, `last_message`, `created_at`, `updated_at`, `user_id`, `whom_id`) VALUES
(1, 'hello', 0, 0, '2017-08-17 03:17:22', NULL, 1, 2),
(2, 'hi', 0, 0, '2017-08-17 03:17:23', NULL, 2, 1),
(3, 'Як справи?', 0, 1, '2017-08-17 03:17:36', NULL, 1, 2);

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2017_06_26_135211_create_user_table', 1),
(3, '2017_06_26_135344_create_category_table', 2),
(4, '2017_06_26_135407_create_comment_table', 2),
(5, '2017_06_26_135426_create_message_table', 2),
(6, '2017_06_26_135442_create_post_table', 2),
(7, '2017_06_26_135701_create_rols_table', 2),
(8, '2017_06_26_233705_create_feedback_table', 2),
(9, '2017_06_27_215228_change_user_table', 2),
(10, '2017_06_27_215317_change_category_table', 2),
(11, '2017_06_27_215359_change_comment_table', 2),
(12, '2017_06_27_215458_change_message_table', 2),
(13, '2017_06_27_215529_change_post_table', 2),
(14, '2017_06_27_215557_change_rols_table', 2),
(15, '2014_10_12_000000_create_users_table', 3),
(16, '2017_08_16_134703_create_tags_table', 3),
(17, '2017_08_16_155905_create_portfolio_table', 4);

-- --------------------------------------------------------

--
-- Структура таблиці `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `portfolio`
--

CREATE TABLE `portfolio` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `public` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `portfolio`
--

INSERT INTO `portfolio` (`id`, `title`, `text`, `img`, `keywords`, `description`, `public`, `created_at`, `updated_at`) VALUES
(1, 'Назва проекту', 'Опис проекту, що було зроблено', 'image2_117579.jpg', 'Ключові слова', 'Опис', 1, '2017-08-18 00:15:21', NULL),
(2, 'Назва проекту 2', 'Опис проекту, що було зроблено', 'image2_117579.jpg', 'Ключові слова', 'Опис', 1, '2017-08-18 00:15:23', NULL),
(3, 'Назва проекту 3', 'Опис проекту, що було зроблено', 'image2_117579.jpg', 'Ключові слова', 'Опис', 1, '2017-08-18 00:15:27', NULL),
(4, 'Назва проекту 4', 'Опис проекту, що було зроблено', 'image2_117579.jpg', 'Ключові слова', 'Опис', 1, '2017-08-18 00:15:33', NULL),
(5, 'Назва проекту 5', 'Опис проекту, що було зроблено', 'image2_117579.jpg', 'Ключові слова', 'Опис', 1, '2017-08-18 00:59:21', NULL),
(6, 'Назва проекту 6', 'Опис проекту, що було зроблено', 'image2_117579.jpg', 'Ключові слова', 'Опис', 1, '2017-08-19 00:15:23', NULL),
(7, 'Назва проекту 7', 'Опис проекту, що було зроблено', 'image2_117579.jpg', 'Ключові слова', 'Опис', 1, '2017-09-18 00:15:27', NULL),
(8, 'Назва проекту 8', 'Опис проекту, що було зроблено iiiiha', 'image2_117579.jpg', 'Ключові слова', 'Опис', 1, '2017-09-19 00:15:33', '2017-08-18 16:30:08');

-- --------------------------------------------------------

--
-- Структура таблиці `post`
--

CREATE TABLE `post` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) NOT NULL DEFAULT '0',
  `deslikes` int(11) NOT NULL DEFAULT '0',
  `news` int(11) NOT NULL DEFAULT '0',
  `video` int(11) NOT NULL DEFAULT '0',
  `script` int(11) NOT NULL DEFAULT '0',
  `snipet` int(11) NOT NULL DEFAULT '0',
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `public` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `post`
--

INSERT INTO `post` (`id`, `title`, `text`, `img`, `views`, `likes`, `deslikes`, `news`, `video`, `script`, `snipet`, `keywords`, `description`, `public`, `created_at`, `updated_at`, `user_id`, `category_id`) VALUES
(1, 'Suspendisse dignissim in sem eget pulvinar. Mauris aliquam nulla at libero pretium.', 'Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', 'default.jpg', 34, 1, 1, 1, 1, 1, 1, 'Раз, Два, Три, Веб', 'опис', 1, '2017-08-16 01:21:33', NULL, 1, 1),
(2, 'Lid est laborum', 'Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', '590x300.jpg', 34, 43, 3, 1, 0, 1, 0, 'Раз, Два, Три, Програмування', 'опис', 1, '2017-08-17 07:00:00', NULL, 1, 1),
(3, 'Стаття 3', 'Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', 'gonkong_vid_iz_okna_vecher_neboskreby_1920x1200.jpg', 134, 121, 12, 1, 1, 1, 0, 'Раз, Два, Три, Веб, Чотири', 'опис', 1, '2017-08-17 07:00:00', NULL, 1, 2),
(4, 'Стаття 4', 'Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', 'south_africa_night.jpg', 3, 14, 0, 0, 0, 0, 1, 'Раз, Два, Три, Веб, Чотири', 'опис', 1, '2017-08-17 07:00:00', NULL, 1, 6),
(5, 'Стаття 5', 'Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', 'gonkong_vid_iz_okna_vecher_neboskreby_1920x1200.jpg', 542, 11, 1, 0, 1, 0, 1, 'Раз, Два, Три, Веб, Чотири', 'опис', 1, '2017-08-17 07:00:00', NULL, 1, 3),
(6, 'Стаття 6', 'Lid est laborum dolo rumes fugats untras. Etharums ser quidem rerum facilis dolores nemis omnis fugats vitaes nemo minima rerums unsers sadips amets.. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit', '6546456456.jpg', 35, 11, 1, 0, 1, 0, 1, 'Раз, Два, Три, Веб, Вісім', 'опис', 1, '2017-08-17 07:00:00', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `rols`
--

CREATE TABLE `rols` (
  `id` int(10) UNSIGNED NOT NULL,
  `rols` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `rols`
--

INSERT INTO `rols` (`id`, `rols`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'Простий користувач', 'Перегляд', NULL, NULL),
(2, 2, 'Адміністратор', 'Всемогучій', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `tags`
--

INSERT INTO `tags` (`id`, `parent_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 0, 'Web', NULL, NULL),
(2, 0, 'Веб', NULL, NULL),
(3, 1, 'PHP', NULL, NULL),
(4, 0, 'HTML', NULL, NULL),
(5, 0, 'PHP7', NULL, NULL),
(6, 0, 'Javascript', NULL, NULL),
(7, 0, 'Yii2', NULL, NULL),
(8, 0, 'Laravel', NULL, NULL),
(9, 0, 'CMS', NULL, NULL),
(10, 0, 'Wordpress', NULL, NULL),
(11, 0, 'Програмування', NULL, NULL),
(12, 0, 'Сніпери', NULL, NULL),
(13, 0, 'Скріпти', NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default.jpg',
  `status` int(11) NOT NULL DEFAULT '1',
  `public` int(11) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rols_id` int(10) UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `avatar`, `status`, `public`, `remember_token`, `created_at`, `updated_at`, `rols_id`) VALUES
(1, 'Saniko', 'Saniko@gmail.com', '$2y$10$TQJpGtxXKPU9QIUFKRd6AuYQuGqn1WGoekVloFM2kHxT.uaJd8KIW', '1yd.jpg', 1, 1, NULL, NULL, NULL, 2),
(2, 'Sasasa', 'Sasasa@gmail.com', '$2y$10$EFpkG5z8vhPOv4tw..SYEubDgLByQttFWNE4hrElgqYrWuHqDtYPC', 'untiltled_space_panorama_by_sostopher.jpg', 1, 1, 'Od8HxWCSV63WHDH3YNHMsRy0yLQhKONapd6DdkvOqctGbwbihC39nqBq8gHJ', '2017-08-17 09:27:19', '2017-08-17 09:27:19', 2);

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_alias_unique` (`alias`);

--
-- Індекси таблиці `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_post_id_foreign` (`post_id`),
  ADD KEY `comment_user_id_foreign` (`user_id`);

--
-- Індекси таблиці `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `message_user_id_foreign` (`user_id`),
  ADD KEY `message_whom_id_foreign` (`whom_id`);

--
-- Індекси таблиці `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Індекси таблиці `portfolio`
--
ALTER TABLE `portfolio`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_user_id_foreign` (`user_id`),
  ADD KEY `post_category_id_foreign` (`category_id`);

--
-- Індекси таблиці `rols`
--
ALTER TABLE `rols`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_name_unique` (`name`),
  ADD UNIQUE KEY `user_email_unique` (`email`),
  ADD KEY `user_rols_id_foreign` (`rols_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблиці `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблиці `message`
--
ALTER TABLE `message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблиці `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблиці `portfolio`
--
ALTER TABLE `portfolio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблиці `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблиці `rols`
--
ALTER TABLE `rols`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблиці `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`),
  ADD CONSTRAINT `comment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `message_whom_id_foreign` FOREIGN KEY (`whom_id`) REFERENCES `user` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `post_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);

--
-- Обмеження зовнішнього ключа таблиці `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_rols_id_foreign` FOREIGN KEY (`rols_id`) REFERENCES `rols` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
