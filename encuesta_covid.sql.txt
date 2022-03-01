-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Feb 28, 2022 at 11:02 PM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `encuesta_covid`
--

-- --------------------------------------------------------

--
-- Table structure for table `respuestas`
--

CREATE TABLE `respuestas` (
  `id` int(11) NOT NULL,
  `id_tipo_usuario` int(11) NOT NULL,
  `identificador` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `contacto_covid` tinyint(1) NOT NULL,
  `vacunado` tinyint(1) NOT NULL,
  `cadena_qr` varchar(256) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sintomas`
--

CREATE TABLE `sintomas` (
  `id` int(11) NOT NULL,
  `sintoma` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sintomas`
--

INSERT INTO `sintomas` (`id`, `sintoma`, `created_at`, `updated_at`) VALUES
(1, 'Estoy positivo en COVID', '2022-02-28 22:51:23', NULL),
(2, 'Fiebre o Escalofríos', '2022-02-28 22:51:23', NULL),
(3, 'Tos o Catarro', '2022-02-28 22:51:23', NULL),
(4, 'Dolor de Cabeza o Garganta', '2022-02-28 22:51:23', NULL),
(5, 'Cansancio o malestar general', '2022-02-28 22:51:23', NULL),
(6, 'Pérdida del gusto en los sabores o pérdida del olfato', '2022-02-28 22:51:23', NULL),
(7, 'Ninguno de los anteriores', '2022-02-28 22:51:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sintomas_respuesta`
--

CREATE TABLE `sintomas_respuesta` (
  `id` int(11) NOT NULL,
  `id_sintoma` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipos_usuario`
--

CREATE TABLE `tipos_usuario` (
  `id` int(11) NOT NULL,
  `descripción` varchar(128) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id`, `descripción`, `created_at`, `updated_at`) VALUES
(1, 'Alumno', '2022-02-28 22:52:45', NULL),
(2, 'Profesor', '2022-02-28 22:52:45', NULL),
(3, 'Empleado', '2022-02-28 22:52:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipo_usuario` (`id_tipo_usuario`);

--
-- Indexes for table `sintomas`
--
ALTER TABLE `sintomas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sintomas_respuesta`
--
ALTER TABLE `sintomas_respuesta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sintoma_respuesta` (`id_sintoma`,`id_respuesta`) USING BTREE,
  ADD KEY `id_respuesta` (`id_respuesta`),
  ADD KEY `id_sintoma` (`id_sintoma`) USING BTREE;

--
-- Indexes for table `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sintomas`
--
ALTER TABLE `sintomas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sintomas_respuesta`
--
ALTER TABLE `sintomas_respuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipos_usuario` (`id`);

--
-- Constraints for table `sintomas_respuesta`
--
ALTER TABLE `sintomas_respuesta`
  ADD CONSTRAINT `sintomas_respuesta_ibfk_1` FOREIGN KEY (`id_respuesta`) REFERENCES `respuestas` (`id`),
  ADD CONSTRAINT `sintomas_respuesta_ibfk_2` FOREIGN KEY (`id_sintoma`) REFERENCES `sintomas` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
