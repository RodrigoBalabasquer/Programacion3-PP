-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2017 a las 15:48:29
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pp_prog_lll`
--
CREATE DATABASE IF NOT EXISTS `pp_prog_lll` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pp_prog_lll`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `containers`
--

CREATE TABLE `containers` (
  `numero` int(11) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `foto` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `containers`
--

INSERT INTO `containers` (`numero`, `descripcion`, `pais`, `foto`) VALUES
(1, 'lÃ±alalal', 'Argentina', 'images.jpg'),
(2, 'alskjdlakshdlaksdj', 'China', 'images.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
