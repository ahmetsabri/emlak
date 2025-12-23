-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Aug 30, 2022 at 10:33 PM
-- Server version: 10.6.7-MariaDB-1:10.6.7+maria~focal-log
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `ilceler` (
  `id` int(10) UNSIGNED NOT NULL,
  `il_id` int(11) NOT NULL,
  `ilce_adi` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `iller` (
  `id` int(10) UNSIGNED NOT NULL,
  `il_adi` varchar(20) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `mahalleler` (
  `id` int(10) UNSIGNED NOT NULL,
  `semt_id` int(11) NOT NULL,
  `mahalle_adi` varchar(90) COLLATE utf8mb3_unicode_ci NOT NULL,
  `posta_kodu` varchar(5) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

CREATE TABLE `semtler` (
  `id` int(10) UNSIGNED NOT NULL,
  `ilce_id` int(11) NOT NULL,
  `semt_adi` varchar(30) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

COMMIT;
