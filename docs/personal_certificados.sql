-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 24-10-2022 a las 01:39:28
-- Versión del servidor: 8.0.27
-- Versión de PHP: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `personal_certificados`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `td_curso_usuario`
--

DROP TABLE IF EXISTS `td_curso_usuario`;
CREATE TABLE IF NOT EXISTS `td_curso_usuario` (
  `curd_id` int NOT NULL AUTO_INCREMENT,
  `cur_id` int NOT NULL,
  `usu_id` int NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`curd_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `td_curso_usuario`
--

INSERT INTO `td_curso_usuario` (`curd_id`, `cur_id`, `usu_id`, `fecha_creacion`, `estado`) VALUES
(1, 1, 1, '2022-10-23 19:34:54', 1),
(2, 1, 2, '2022-10-23 19:34:54', 1),
(3, 2, 3, '2022-10-23 19:36:47', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_categoria`
--

DROP TABLE IF EXISTS `tm_categoria`;
CREATE TABLE IF NOT EXISTS `tm_categoria` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_categoria`
--

INSERT INTO `tm_categoria` (`cat_id`, `cat_nombre`, `fecha_creacion`, `estado`) VALUES
(1, 'PROGRAMACIÓN', '2022-10-23 19:11:04', 1),
(2, 'MARKETING', '2022-10-23 19:11:04', 1),
(3, 'NEGOCIOS', '2022-10-23 19:14:17', 1),
(4, 'EDUCACIÓN', '2022-10-23 19:14:53', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_curso`
--

DROP TABLE IF EXISTS `tm_curso`;
CREATE TABLE IF NOT EXISTS `tm_curso` (
  `cur_id` int NOT NULL AUTO_INCREMENT,
  `cat_id` int NOT NULL,
  `cur_nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `cur_descripcion` varchar(1000) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `cur_fechaini` date NOT NULL,
  `cur_fechfin` date NOT NULL,
  `inst_id` int NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`cur_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_curso`
--

INSERT INTO `tm_curso` (`cur_id`, `cat_id`, `cur_nombre`, `cur_descripcion`, `cur_fechaini`, `cur_fechfin`, `inst_id`, `fecha_creacion`, `estado`) VALUES
(1, 1, 'Curso de HTML5', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-10-03', '2022-10-28', 1, '2022-10-23 19:24:06', 1),
(2, 2, 'Introducción a los Negocios', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-10-04', '2022-10-21', 2, '2022-10-23 19:26:17', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_instructor`
--

DROP TABLE IF EXISTS `tm_instructor`;
CREATE TABLE IF NOT EXISTS `tm_instructor` (
  `inst_id` int NOT NULL AUTO_INCREMENT,
  `inst_nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `inst_apellidop` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `inst_apellidom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `inst_correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `inst_sexo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `inst_telefono` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`inst_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_instructor`
--

INSERT INTO `tm_instructor` (`inst_id`, `inst_nombre`, `inst_apellidop`, `inst_apellidom`, `inst_correo`, `inst_sexo`, `inst_telefono`, `fecha_creacion`, `estado`) VALUES
(1, 'Ricardo', 'Palma', 'Palma', 'PalmaR@gmail.com', 'M', '55555555', '2022-10-23 19:04:54', 1),
(2, 'Cesar', 'Carros', 'Chitay', 'SergChi@gmail.com', 'M', '66666666', '2022-10-23 19:04:54', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tm_usuario`
--

DROP TABLE IF EXISTS `tm_usuario`;
CREATE TABLE IF NOT EXISTS `tm_usuario` (
  `usu_id` int NOT NULL AUTO_INCREMENT,
  `usu_nombre` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usu_apellidop` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usu_apellidom` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usu_correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usu_password` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `usu_sexo` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `usu_telefono` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` datetime DEFAULT NULL,
  `estado` int NOT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tm_usuario`
--

INSERT INTO `tm_usuario` (`usu_id`, `usu_nombre`, `usu_apellidop`, `usu_apellidom`, `usu_correo`, `usu_password`, `usu_sexo`, `usu_telefono`, `fecha_creacion`, `estado`) VALUES
(1, 'Jose', 'Pinto', 'Bustamante', 'jose@gmail.com', '123456', 'M', '78941452', '2022-10-23 18:37:52', 1),
(2, 'Fernando', 'Rodriguez', 'Alvizures', 'Fernando@gmail.com', '123456', 'M', '56982365', '2022-10-23 18:37:52', 1),
(3, 'Ana', 'Julaju', 'Castro', 'Ana@gmail.com', '123456', 'F', '12545698', '2022-10-23 18:37:52', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
