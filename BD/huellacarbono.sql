-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-06-2023 a las 21:24:42
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `huellacarbono`
--
CREATE DATABASE IF NOT EXISTS `huellacarbono` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE `huellacarbono`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colegio`
--

DROP TABLE IF EXISTS `colegio`;
CREATE TABLE IF NOT EXISTS `colegio` (
  `id_colegio` char(36) NOT NULL,
  `id_usuario` char(36) NOT NULL,
  `Nombre` varchar(255) DEFAULT NULL,
  `Ubicacion` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_colegio`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `colegio`
--

INSERT INTO `colegio` (`id_colegio`, `id_usuario`, `Nombre`, `Ubicacion`) VALUES
('CDB002', 'Usuario_CDB', 'Colegio Don Bosco', 'Soyapango, San Salvador'),
('CSC004', 'Usuario_CSC', 'Colegio Santa Cecilia', 'Santa Tecla, La Libertad'),
('CSJ003', 'Usuario_CSJ', 'Colegio San Jose', 'Santa Ana'),
('MAX001', 'Usuario_MAX', 'Casa Maria Auxiliadora', 'Chalchuapa, Santa Ana');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_agua`
--

DROP TABLE IF EXISTS `consumo_agua`;
CREATE TABLE IF NOT EXISTS `consumo_agua` (
  `id_colegio` char(36) DEFAULT NULL,
  `id_Anio` int DEFAULT NULL,
  `Mes` varchar(255) DEFAULT NULL,
  `Consumo_m3` double DEFAULT NULL,
  `Ton_CO2_m3` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`),
  KEY `id_Anio` (`id_Anio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `consumo_agua`
--

INSERT INTO `consumo_agua` (`id_colegio`, `id_Anio`, `Mes`, `Consumo_m3`, `Ton_CO2_m3`) VALUES
('CSJ003', 2022, 'Enero', 500, 0.39),
('CSJ003', 2022, 'Febrero', 500, 0.39),
('CSJ003', 2022, 'Marzo', 500, 0.39),
('CSJ003', 2022, 'Abril', 500, 0.39),
('CSJ003', 2022, 'Mayo', 500, 0.39),
('CSJ003', 2022, 'Junio', 500, 0.39),
('CSJ003', 2022, 'Julio', 500, 0.39),
('CSJ003', 2022, 'Agosto', 500, 0.39),
('CSJ003', 2022, 'Septiembre', 500, 0.39),
('CSJ003', 2022, 'Octubre', 500, 0.39),
('CSJ003', 2022, 'Noviembre', 1121, 0.88),
('CSJ003', 2022, 'Diciembre', 1269, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_agua_anual`
--

DROP TABLE IF EXISTS `consumo_agua_anual`;
CREATE TABLE IF NOT EXISTS `consumo_agua_anual` (
  `id_colegio` char(36) DEFAULT NULL,
  `id_Anio` int NOT NULL,
  `Consumo_Agua_Anual` double DEFAULT NULL,
  `Ton_CO2_Anual` double DEFAULT NULL,
  PRIMARY KEY (`id_Anio`),
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `consumo_agua_anual`
--

INSERT INTO `consumo_agua_anual` (`id_colegio`, `id_Anio`, `Consumo_Agua_Anual`, `Ton_CO2_Anual`) VALUES
('CSJ003', 2022, 7390, 5.82);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_diesel`
--

DROP TABLE IF EXISTS `consumo_diesel`;
CREATE TABLE IF NOT EXISTS `consumo_diesel` (
  `id_colegio` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_Anio` int NOT NULL,
  `Mes` varchar(255) DEFAULT NULL,
  `Cantidad` double DEFAULT NULL,
  `Combustible_m3` double DEFAULT NULL,
  `Ton_CO2_m3` double DEFAULT NULL,
  `kGr_CO2_m3` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`),
  KEY `id_Anio` (`id_Anio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `consumo_diesel`
--

INSERT INTO `consumo_diesel` (`id_colegio`, `id_Anio`, `Mes`, `Cantidad`, `Combustible_m3`, `Ton_CO2_m3`, `kGr_CO2_m3`) VALUES
('CSJ003', 2022, 'Enero', 127, 0.47731807, 0.000130594, 0.130594224),
('CSJ003', 2022, 'Febrero', 102, 0.38335782, 0.000104887, 0.1048867),
('CSJ003', 2022, 'Marzo', 106, 0.39839146, 0.000109, 0.108999903),
('CSJ003', 2022, 'Abril', 67, 0.25181347, 0.000068896, 0.068896165),
('CSJ003', 2022, 'Mayo', 116, 0.43597556, 0.000119283, 0.119282913),
('CSJ003', 2022, 'Junio', 145, 0.54496945, 0.000149104, 0.149103642),
('CSJ003', 2022, 'Julio', 96, 0.36080736, 0.000098717, 0.098716894),
('CSJ003', 2022, 'Agosto', 97, 0.36456577, 0.000099745, 0.099745195),
('CSJ003', 2022, 'Septiembre', 95, 0.35704895, 0.000097689, 0.097688593),
('CSJ003', 2022, 'Octubre', 35, 0.13154435, 0.000035991, 0.035990534),
('CSJ003', 2022, 'Noviembre', 89, 0.33449849, 0.000091519, 0.091518787),
('CSJ003', 2022, 'Diciembre', 89, 0.33449849, 0.000091519, 0.091518787);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_diesel_anual`
--

DROP TABLE IF EXISTS `consumo_diesel_anual`;
CREATE TABLE IF NOT EXISTS `consumo_diesel_anual` (
  `id_colegio` char(36) DEFAULT NULL,
  `id_Anio` int NOT NULL,
  `Cantidad_Anual` double DEFAULT NULL,
  `Combustible_m3_Anual` double DEFAULT NULL,
  `Ton_CO2_m3_Anual` double DEFAULT NULL,
  `kGr_CO2_m3_Anual` double DEFAULT NULL,
  PRIMARY KEY (`id_Anio`),
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `consumo_diesel_anual`
--

INSERT INTO `consumo_diesel_anual` (`id_colegio`, `id_Anio`, `Cantidad_Anual`, `Combustible_m3_Anual`, `Ton_CO2_m3_Anual`, `kGr_CO2_m3_Anual`) VALUES
('CSJ003', 2022, 1164, 4.37478924, 0.001196942, 1.196942336);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_energetico`
--

DROP TABLE IF EXISTS `consumo_energetico`;
CREATE TABLE IF NOT EXISTS `consumo_energetico` (
  `id_colegio` char(36) DEFAULT NULL,
  `id_Anio` int DEFAULT NULL,
  `Mes` varchar(255) DEFAULT NULL,
  `Consumo_kWts` double DEFAULT NULL,
  `Ton_CO2` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`),
  KEY `id_Anio` (`id_Anio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `consumo_energetico`
--

INSERT INTO `consumo_energetico` (`id_colegio`, `id_Anio`, `Mes`, `Consumo_kWts`, `Ton_CO2`) VALUES
('CSJ003', 2022, 'Enero', 3071.25, 2.09),
('CSJ003', 2022, 'Febrero', 8520.25, 5.79),
('CSJ003', 2022, 'Marzo', 10421.75, 7.08),
('CSJ003', 2022, 'Abril', 10809, 7.35),
('CSJ003', 2022, 'Mayo', 10862.5, 7.38),
('CSJ003', 2022, 'Junio', 10472.5, 7.12),
('CSJ003', 2022, 'Julio', 8332, 5.66),
('CSJ003', 2022, 'Agosto', 7438.45, 5.06),
('CSJ003', 2022, 'Septiembre', 8609.55, 5.85),
('CSJ003', 2022, 'Octubre', 12557, 8.54),
('CSJ003', 2022, 'Noviembre', 10396.74, 7.07),
('CSJ003', 2022, 'Diciembre', 14981.24, 10.18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_energetico_anual`
--

DROP TABLE IF EXISTS `consumo_energetico_anual`;
CREATE TABLE IF NOT EXISTS `consumo_energetico_anual` (
  `id_colegio` char(36) DEFAULT NULL,
  `id_Anio` int NOT NULL,
  `Consumo_kWts_Anual` double DEFAULT NULL,
  `Ton_CO2_Anual` double DEFAULT NULL,
  PRIMARY KEY (`id_Anio`),
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `consumo_energetico_anual`
--

INSERT INTO `consumo_energetico_anual` (`id_colegio`, `id_Anio`, `Consumo_kWts_Anual`, `Ton_CO2_Anual`) VALUES
('CSJ003', 2022, 116472.23, 79.18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_gasolina`
--

DROP TABLE IF EXISTS `consumo_gasolina`;
CREATE TABLE IF NOT EXISTS `consumo_gasolina` (
  `id_colegio` char(1) DEFAULT NULL,
  `id_Anio` int DEFAULT NULL,
  `Mes` varchar(255) DEFAULT NULL,
  `Cantidad` double DEFAULT NULL,
  `Combustible_m3` double DEFAULT NULL,
  `Ton_CO2_m3` double DEFAULT NULL,
  `Km_CO2_m3` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`),
  KEY `id_Anio` (`id_Anio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_gasolina_anual`
--

DROP TABLE IF EXISTS `consumo_gasolina_anual`;
CREATE TABLE IF NOT EXISTS `consumo_gasolina_anual` (
  `id_colegio` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `id_Anio` int NOT NULL,
  `Cantidad_Anual` double DEFAULT NULL,
  `Combustible_m3_Anual` double DEFAULT NULL,
  `Ton_CO2_m3_Anual` double DEFAULT NULL,
  `Km_CO2_m3_Anual` double DEFAULT NULL,
  PRIMARY KEY (`id_Anio`),
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_papel`
--

DROP TABLE IF EXISTS `consumo_papel`;
CREATE TABLE IF NOT EXISTS `consumo_papel` (
  `id_colegio` char(36) DEFAULT NULL,
  `id_Anio` int DEFAULT NULL,
  `Mes` varchar(255) DEFAULT NULL,
  `Consumo_m3` double DEFAULT NULL,
  `Ton_CO2` double DEFAULT NULL,
  KEY `id_colegio` (`id_colegio`),
  KEY `id_Anio` (`id_Anio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consumo_papel_anual`
--

DROP TABLE IF EXISTS `consumo_papel_anual`;
CREATE TABLE IF NOT EXISTS `consumo_papel_anual` (
  `id_colegio` char(36) DEFAULT NULL,
  `id_Anio` int NOT NULL,
  `Consumo_m3_Anual` double DEFAULT NULL,
  `Ton_CO2_Anual` double DEFAULT NULL,
  PRIMARY KEY (`id_Anio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

DROP TABLE IF EXISTS `inventario`;
CREATE TABLE IF NOT EXISTS `inventario` (
  `id_colegio` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Cantidad` int NOT NULL,
  `Tipo` varchar(255) NOT NULL,
  `Marca` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Descripcion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Extras` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Ubicacion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `Consumo_Kw` double NOT NULL,
  KEY `id_colegio` (`id_colegio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`id_colegio`, `Cantidad`, `Tipo`, `Marca`, `Descripcion`, `Extras`, `Ubicacion`, `Consumo_Kw`) VALUES
('CSJ003', 27, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 6a Gen.3.2 GHz, RAM 8GB, SSD - 480GB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC1', 0),
('CSJ003', 6, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC1', 0),
('CSJ003', 40, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 7a Gen.3.0 GHz, RAM 8GB, HDD - 1TB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC2', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC2', 0),
('CSJ003', 35, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, HDD - 320GB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC2', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC3', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 11 Enterprise', 'Edif. Cómputo, CC3', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.2 GHz, RAM 8GB, HDD - 320GB ', 'Windows 10 Enterprise', 'Edif. Administrativo, Oficina de Contabilidad', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Librería', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Coordinación de Secundaria', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 10 Enterprise', 'Edif. Parvularia, Oficina de Coordinación de Parvularia', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Psicología Secundaria', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Enfermería', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i7 - 6a Gen.3.4 GHz,RAM 24GB, SSD - 250GB, HDD - 500 GB ', 'Windows 10 Enterprise', ' Edif. Cómputo, Oficina IT - Manager', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'AMD Ryzen 3 - 3a Gen.3.6 GHz, RAM 8GB, SSD - 240 GB', 'Windows 10 Enterprise', 'Edif. Cómputo, Oficina IT - Aux. de Soporte', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB ', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Trabajo Social', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 10 Enterprise', 'Edif. Administrativo, Oficina de Registro Académico', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 4a Gen.3.6 GHz, RAM 6GB, HDD - 320GB', 'Windows 8.1 Enterprise', 'Edif. Administrativo, Recepción', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Recursos Humanos', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 7a Gen.3.0 GHz, RAM 8GB, HDD - 1TB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Comunicaciones', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 4GB, HDD - 500GB ', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Psicología Parvularia', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 4a Gen.3.6 GHz, RAM 8GB, HDD - 320GB', 'Windows 7 Profesional', 'Edif. Biblioteca, Biblioteca', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 6a Gen.3.2 GHz, RAM 8GB, HDD - 500GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Sala de Audiovisuales Biblioteca', 0),
('CSJ003', 10, 'Desktop', 'Equipo Generico', 'Intel Pentium IV - 3.4 GHz, RAM 2GB, HDD - 80GB', 'Windows XP Profesional', 'Edif. Biblioteca, CC Biblioteca', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 2GB, HDD - 320GB', 'Windows 10 Enterprise', 'Biblioteca, Biblioteca', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 10 Enterprise', 'Edif. Administrativo, Asistente de Contabilidad', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 10GB, HDD - 320GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Pastoral', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 4GB, HDD - 320GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Pastoral', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 2.7 GHz, RAM 4GB, HDD - 320GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Oficina de Pastoral', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480GB', 'Windows 10 Enterprise', 'Edif. Primaria,Coordinación de Matenimiento ', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Cosmetología, 1º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Cosmetología, 1º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 2º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 2º Año de Bachillerato A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 2º Año de Bachillerato B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 2º Año de Bachillerato C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 1º Año de Bachillerato A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 1º Año de Bachillerato B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 1º Año de Bachillerato C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 1º Año de Bachillerato D', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 9º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 9º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 9º C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 8º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 8º C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 7ª B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 7ª A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Secundaria, 8º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 2º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 2º C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 2º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 3º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 3º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 6º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 6º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 6º C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 5º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 5º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 5º C', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 4º A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Primaria, 4º B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, K5-A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, K5-B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, K4-A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, K4-B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, K6-A', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, K6-B', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 4GB, SSD - 320GB', 'Windonws 10 Enterprise', 'Edif. Parvularia, Ludoteca', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 10a Gen.3.6 GHz, RAM 8GB, SSD - 128GB', 'Windows 11 Enterprise', 'Edif. CFP,  Gestor OIL', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 10a Gen.3.6 GHz, RAM 8GB, SSD - 128GB', 'Windows 11 Enterprise', 'Edif. CFP,  Gestor OIL', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 4GB, HDD - 500 GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Sala de Maestros', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 4GB, HDD - 260 GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Sala de Maestros', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i5 - 6a Gen.3.2 GHz, RAM 4GB, HDD - 320GB', 'Windows 10 Enterprise', 'Edif. Cómputo, Dibujo Técnico', 0),
('CSJ003', 2, 'Desktop', 'DELL', 'Xeon E-2126G, RAM 16 GB, HDD - 1TB', 'Windows Server 2016 R2 Enterprise', 'Edif. Cómputo, Oficina de IT', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core 2 Quad 2.66 GHz, RAM 4GB, HDD - 320 GB', 'Windows 10 Enterprise', 'Edif. Biblioteca, Deportes', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 9a Gen.3.6 GHz, RAM 8GB, SSD - 480 GB', 'Windows 10 Enterprise', 'Templo, Oficina Parroquial Templo Sagrada Familia', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Pentium - Dual Core 3.0 GHz, RAM 2GB, HDD - 320 GB', 'Windows 7 Profesional', 'Templo, Librería Templo Sagrada Familia', 0),
('CSJ003', 1, 'iMac', 'Apple', 'Intel Core i5, doble núcleo - 2.3 GHz, RAM 8GB, HDD - 1TB', 'macOS Big Sur', 'Edif. Administrativo, Oficina de Pastoralista', 0),
('CSJ003', 1, 'iMac', 'Apple', 'Intel Core i5, doble núcleo - 2.3 GHz, RAM 8GB, HDD - 1TB', 'macOS Big Sur', 'Edif. Administrativo, Oficina de Dirección', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 10a Gen.3.6 GHz, RAM 8GB, SSD - 128 GB', 'Windows 11 Enterprise', 'Edif. CFP, Oficina de Coordinación Administrativa CFP', 0),
('CSJ003', 13, 'iMac', 'Apple', 'Intel Core i5 - 2.7 GHz, RAM 16GB, HDD - 1TB', 'macOS High Sierra', 'Edif. CFP, CCMAC', 0),
('CSJ003', 6, 'iMac', 'Apple', 'Intel Core i5 - 2.7 GHz, RAM 16GB, HDD - 1TB', 'macOS X 10.9.5', 'Edif. CFP, CCMAC', 0),
('CSJ003', 1, 'iMac', 'Apple', 'Intel Core i5 - 2.7 GHz, RAM 16GB, HDD - 1TB', 'macOS Sierra', 'Edif. CFP, CCMAC', 0),
('CSJ003', 1, 'iMac', 'Apple', 'Intel Core i5, doble núcleo - 2.3 GHz, RAM 8GB, HDD - 1TB', 'macOS Big Sur', 'Edif. CFP, CCMAC', 0),
('CSJ003', 1, 'iMac', 'Apple', 'Intel Core i5 - 2.7 GHz, RAM 8GB, HDD - 1TB', 'macOS High Sierra', 'Edif. CFP, CCMAC', 0),
('CSJ003', 1, 'Laptop', 'Asus', 'Intel Core i3 - 3a Gen.1.8 GHz, RAM 6GB, HDD - 500 GB', 'Windows 10 Enterprise', 'Edif. Cómputo, Oficina de IT', 0),
('CSJ003', 1, 'Laptop', 'Acer', 'Intel Core i5 - 6a Gen.2.3 GHz, RAM 8GB, SSD - 256 GB', 'Windows 10 Enterprise', 'Edif. Cómputo, Oficina de IT', 0),
('CSJ003', 1, 'Laptop', 'Lenovo', 'AMD Ryzen 3 - 3a Gen.2.6 GHz, RAM 4GB, SSD - 128 GB', 'Windows 10 Enterprise', 'Edif. Cómputo, Oficina de IT', 0),
('CSJ003', 1, 'Laptop', 'Lenovo', 'Intel Core i3 - 10a Gen.1.2 GHz, RAM 4GB, HDD - 1TB', 'Windows 10 Enterprise', 'Edif. Administrativo, Oficina de Coordinación General Académica', 0),
('CSJ003', 1, 'Laptop', 'Asus', 'AMD Ryzen 7 - 3a Gen.2.3 GHz, RAM 8GB, SSD - 480GB', 'Windows 10 Enterprise', 'Edif. CFP, Oficina de Coordinación del CFP', 0),
('CSJ003', 1, 'Laptop', 'Lenovo', 'Intel Core i3 - 10a Gen.3.6 GHz, RAM 8GB, SSD - 128GB', 'Windows 11 Enterprise', 'Edif. CFP, Oficina de Bakery School', 0),
('CSJ003', 1, 'Laptop', 'Toshiba', 'Intel Pentium 4 - 2.8 GHz, RAM 500 MB, HDD - 60GB', 'Windows XP Profesional', 'Edif. Cómputo, Oficina de IT', 0),
('CSJ003', 1, 'MacBookPro', 'Apple', 'Intel Core i5, cuatro núcleos - 1.4 GHz, RAM 8GB, SSD - 251GB', 'macOS Big Sur', 'Edif. Administrativo, Oficina de Administración', 0),
('CSJ003', 1, 'Terminal', 'Gigabyte', 'Intel Core i3 - 4a Gen.1.7 GHz, RAM 4GB, HDD - 500GB', 'Windows 10 Enterprise', 'Edif. Cómputo, Capilla San José', 0),
('CSJ003', 1, 'Desktop', 'Equipo Generico', 'Intel Core i3 - 4a Gen.3.6 GHz, RAM 8GB, SSD - 240GB', 'Windows 11 Enterprise', 'Edif. De Labotarios, Laboratorio de Inglés', 0),
('CSJ003', 1, 'Mini Split', 'General Electric', 'Aire Acondicionado', 'CS- PS24PKV', 'Edif. Administrativo, Administracion', 5.27),
('CSJ003', 1, 'Split', 'Panasonic', 'Aire Acondicionado', '', 'Edif. Administrativo, Recepcion', 7.03),
('CSJ003', 1, 'MiniSplit', 'Daikin', 'Aire Acondicionado', '', 'Edif. Administrativo, Registro Academico', 3.52),
('CSJ003', 1, 'MiniSplit', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Administrativo, Direccion General', 7.03),
('CSJ003', 1, 'MiniSplit', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Administrativo, Coornacion Academica ', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Administrativo,Contabilidad ', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Administrativo, Fotocopiadora', 3.52),
('CSJ003', 2, 'Split', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Biblioteca, Biblioteca Sala Audiovisual', 25),
('CSJ003', 1, 'MiniSplit', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Biblioteca, Biblioteca Sala Reuniones', 7.03),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Biblioteca, Enfermeria', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Biblioteca, Sala De Reuniones', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Biblioteca, Coordinacion Secundaria', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Biblioteca, Aula De Apoyo', 3.52),
('CSJ003', 1, 'MiniSplit', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Biblioteca, Coordinacion Pastoral ', 7.03),
('CSJ003', 1, 'MiniSplit', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Biblioteca, Coordinacion Primaria', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. Cómputo, Soporte Tecnico', 3.52),
('CSJ003', 2, 'Cassett', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Cómputo, Centro De Computo 1', 5),
('CSJ003', 2, 'Cassett', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Cómputo, Centro De Computo 2', 5),
('CSJ003', 2, 'Cassett', 'Comfortstart', 'Aire Acondicionado', '', 'Edif. Cómputo, Centro De Computo 3', 5),
('CSJ003', 5, 'Cassett', 'Innovair', 'Aire Acondicionado', '', 'Edif. Cómputo, Capilla San Jose', 5),
('CSJ003', 1, 'MiniSplit', 'Samsung', 'Aire Acondicionado', '', 'Edif. Parvularia, Ludoteca', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. CFP, Coordinacion General', 3.52),
('CSJ003', 1, 'MiniSplit', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. CFP, Sala De Reuniones', 3.52),
('CSJ003', 1, 'MiniSplit', 'General Electric', 'Aire Acondicionado', '', 'Edif. CFP, Coord. Oil - Asist. Administrativo', 3.52),
('CSJ003', 2, 'Split', 'Frigidaire', 'Aire Acondicionado', '', 'Edif. CFP, Centro Mac', 7.03),
('CSJ003', 1, 'Split', 'Comfortstart', 'Aire Acondicionado', 'NEO60SC-T', 'Edif. Cosmetología, Segundo Grado A', 17.5),
('CSJ003', 1, 'Split', 'Comfortstart', 'Aire Acondicionado', 'NEO60SC-T', 'Edif. Cosmetología, Segundo Grado B', 17.5),
('CSJ003', 1, 'Split', 'York', 'Aire Acondicionado', '', 'Templo, Oficina Pastoral', 7.03),
('CSJ003', 1, 'Split', 'York', 'Aire Acondicionado', '', 'Templo, Santisimo', 7.03),
('CSJ003', 1, 'Split', 'York', 'Aire Acondicionado', '', 'Templo, Librería Catolica', 7.03),
('CSJ003', 2, 'Split', 'York', 'Aire Acondicionado', '', 'Templo, Sala De Niños, Confesionarios', 7.03),
('CSJ003', 2, 'Planta', 'Daikin', 'Aire Acondicionado', 'DCC300XXX3BXXX', 'Templo, Planta General', 17.5),
('CSJ003', 18, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Primaria, Salones Planta Baja', 0),
('CSJ003', 18, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Primaria, Salones Segunda Planta', 0),
('CSJ003', 18, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Secundaria, Salones Planta Baja', 0),
('CSJ003', 18, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Secundaria, Salones Segunda Planta', 0),
('CSJ003', 6, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Cosmetología, Salones Primera Baja', 0),
('CSJ003', 4, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Secundaria, Salones Segunda Planta', 0),
('CSJ003', 6, 'De Techo 3 Helices', 'Marca Generica', 'Ventiladores', '', 'Edif. Cómputo, Salones Primera Planta', 0),
('CSJ003', 2, 'De Pared', 'Marca Generica', 'Ventiladores', '', 'Edif. Taller, Taller', 0),
('CSJ003', 1, 'De Pared', 'Marca Generica', 'Ventiladores', '', 'Edif. Taller, Comedor', 0),
('CSJ003', 1, 'De Pared', 'Marca Generica', 'Ventiladores', '', 'Caseta', 0),
('CSJ003', 16, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Edif. Primaria, Primaria', 0),
('CSJ003', 14, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Edif. Secundaria, Secundaria', 0),
('CSJ003', 5, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Edif. CFP, CDP', 0),
('CSJ003', 10, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Edif. Parvularia, Parvularia', 0),
('CSJ003', 4, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Edif. Biblioteca, Biblioteca', 0),
('CSJ003', 9, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Templo', 0),
('CSJ003', 10, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Piscina', 0),
('CSJ003', 4, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Taller', 0),
('CSJ003', 1, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Caseta', 0),
('CSJ003', 10, 'Servicio Sanitario', 'Marca Generica', 'Servicio Sanitario', '', 'Cancha de Futbol', 0),
('CSJ003', 18, 'Chorros', 'Marca Generica', 'Chorros', '', 'Edif. Primaria, Primaria', 0),
('CSJ003', 19, 'Chorros', 'Marca Generica', 'Chorros', '', 'Edif. Secundaria, Secundaria', 0),
('CSJ003', 4, 'Chorros', 'Marca Generica', 'Chorros', '', 'Edif. CFP, CDP', 0),
('CSJ003', 14, 'Chorros', 'Marca Generica', 'Chorros', '', 'Edif. Parvularia, Parvularia', 0),
('CSJ003', 4, 'Chorros', 'Marca Generica', 'Chorros', '', 'Edif. Biblioteca, Biblioteca', 0),
('CSJ003', 5, 'Chorros', 'Marca Generica', 'Chorros', '', 'Templo', 0),
('CSJ003', 11, 'Chorros', 'Marca Generica', 'Chorros', '', 'Piscina', 0),
('CSJ003', 17, 'Chorros', 'Marca Generica', 'Chorros', '', 'Areas Verdes', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Administracion', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Administrativo, Recepcion', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Registro Academico', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Recursos Humanos', 0),
('CSJ003', 14, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Direccion General', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Coordinacion Academica', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Contabilidad', 0),
('CSJ003', 12, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Asistente Contabilidad', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Cocina', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Fotocopiadora', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Pasillo Frente A Parqueo', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Administrativo, Baños', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Administrativo, Pasillo Frente A Canchas', 0),
('CSJ003', 56, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Biblioteca Sala Principal', 0),
('CSJ003', 36, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Biblioteca Sala Audiovisual', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Biblioteca Sala Reuniones', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Librería', 0),
('CSJ003', 11, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Pasillo Central', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Enfermeria', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Sala De Reuniones', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Coordinacion Primaria', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Coordinacion Secundaria', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Baños Damas', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Aula De Apoyo', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Biblioteca, Psicologia Parvularia', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Biblioteca, Psicologia Primaria', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Psicologia Secundaria', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Biblioteca, Equipo Pastoral ', 0),
('CSJ003', 32, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Sala De Maestros', 0),
('CSJ003', 2, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Biblioteca, Comunicaciones', 0),
('CSJ003', 2, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Biblioteca, Pasillo De Psicologia', 0),
('CSJ003', 10, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Biblioteca, Baños Hombres', 0),
('CSJ003', 2, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Soporte Tecnico', 0),
('CSJ003', 24, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Centro De Computo 1', 0),
('CSJ003', 24, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Centro De Computo 2', 0),
('CSJ003', 24, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Centro De Computo 3', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Gradas', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Pasillo Segunda Planta', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Pasillo Primera Planta', 0),
('CSJ003', 32, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Aulas Bachillerato', 0),
('CSJ003', 20, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cómputo, Salon De Usos Multiples', 0),
('CSJ003', 20, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. Cómputo, Capilla San Jose Santisimo', 0),
('CSJ003', 72, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Primaria,Salones Planta Baja ', 0),
('CSJ003', 5, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Primaria, Pasillo Primera Planta', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Primaria, Gradas', 0),
('CSJ003', 72, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Primaria, Salones Segunda Planta', 0),
('CSJ003', 26, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Primaria, Pasillo Segunda Planta', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Primaria, Reflectores Para Cancha', 0),
('CSJ003', 72, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Secundaria, Salones Planta Baja', 0),
('CSJ003', 5, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Secundaria, Pasillo Primera Planta', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Secundaria, Gradas', 0),
('CSJ003', 12, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Secundaria, Salones Segunda Planta', 0),
('CSJ003', 26, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Secundaria, Pasillo Segunda Planta', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Secundaria, Reflectores Para Cancha', 0),
('CSJ003', 72, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Salones Primera Planta', 0),
('CSJ003', 72, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Baños Y Desvestideros', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Pasillo Primera Planta', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Gradas', 0),
('CSJ003', 33, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Pasillo Segunda Planta', 0),
('CSJ003', 30, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Ludoteca', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Parvularia, Coordinacion Parvularia', 0),
('CSJ003', 48, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Bach. Tecnicos, Salones Primera Planta', 0),
('CSJ003', 7, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Bach. Tecnicos, Pasillo Primera Planta', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Bach. Tecnicos, Gradas', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Bach. Tecnicos, Pasillo Segunda Planta', 0),
('CSJ003', 48, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Bach. Tecnicos, Salones Segunda Planta', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Coordinacion General', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Coordinacion Oil', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Gestor Oil - Asist. Administrativo', 0),
('CSJ003', 1, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Baño Oficinas', 0),
('CSJ003', 2, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Edif. CFP, Pasillo Oficinas', 0),
('CSJ003', 16, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Centro Mac', 0),
('CSJ003', 2, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Gradas', 0),
('CSJ003', 54, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Salones De Electricidad', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Lobby CFP', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Baños Primera Planta', 0),
('CSJ003', 6, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. CFP, Pasillo De Baños', 0),
('CSJ003', 32, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cosmetología, Salones Primera Planta', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cosmetología, Pasillo Primera Planta', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cosmetología, Gradas', 0),
('CSJ003', 10, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cosmetología, Pasillo Segunda Planta', 0),
('CSJ003', 32, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cosmetología, Salones Cosmetologia', 0),
('CSJ003', 4, 'Luminaria', 'Marca Generica', 'Tubo Led', '', 'Edif. Cosmetología, Bodega Cosmetologia', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Oficina Pastoral', 0),
('CSJ003', 9, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Santisimo', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Librería Catolica', 0),
('CSJ003', 12, 'Luminaria', 'Marca Generica', 'Reflectores Led', '', 'Templo, Lobby', 0),
('CSJ003', 22, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Baños', 0),
('CSJ003', 125, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Altar Y Área De Bancas', 0),
('CSJ003', 9, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Salon De Confesionarios', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Salon Para Niños', 0),
('CSJ003', 24, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Templo, Salon Multiusos', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Focos Led', '', 'Parqueo, Zona De Espera', 0),
('CSJ003', 21, 'Luminaria', 'Marca Generica', 'Lamparas Led', '', 'Parqueo, Luces De Parqueo', 0),
('CSJ003', 5, 'Luminaria', 'Marca Generica', 'Lamparas Led', '', 'Parqueo, Arriate Imagen De San José', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Tubos Led', '', 'Parqueo, Caseta', 0),
('CSJ003', 5, 'Luminaria', 'Marca Generica', 'Foco Led', '', 'Piscina, Postes', 0),
('CSJ003', 7, 'Luminaria', 'Marca Generica', 'Foco Led', '', 'Piscina, Gradas', 0),
('CSJ003', 8, 'Luminaria', 'Marca Generica', 'Tubos Led ', '', 'Piscina, Baños Y Devestideros', 0),
('CSJ003', 14, 'Luminaria', 'Marca Generica', 'Tubos Led ', '', 'Taller, Taller', 0),
('CSJ003', 1, 'Luminaria', 'Marca Generica', 'Foco Led', '', 'Taller, Baño', 0),
('CSJ003', 3, 'Luminaria', 'Marca Generica', 'Panel Redondo Led', '', 'Taller, Comedor', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` char(36) NOT NULL,
  `nombre_rol` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre_rol`) VALUES
('ADM001', 'Admin General'),
('CLG001', 'Admin Colegio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id_usuario` char(36) NOT NULL,
  `id_rol` char(36) DEFAULT NULL,
  `nombre` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(191) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  KEY `id_rol` (`id_rol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_usuario`, `id_rol`, `nombre`, `email`, `password`, `remember_token`) VALUES
('Usuario_CDB', 'ADM001', 'Monica Rivera', 'rivera6577@gmail.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ACbRb8vJTeqVBzo5kKts2z15QxKAp2ayWuTuk8Wwz3n9ZQhJrSUOqt6Zc7Gw');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `consumo_agua`
--
ALTER TABLE `consumo_agua`
  ADD CONSTRAINT `consumo_agua_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consumo_agua_ibfk_2` FOREIGN KEY (`id_Anio`) REFERENCES `consumo_agua_anual` (`id_Anio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consumo_agua_anual`
--
ALTER TABLE `consumo_agua_anual`
  ADD CONSTRAINT `consumo_agua_anual_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consumo_diesel`
--
ALTER TABLE `consumo_diesel`
  ADD CONSTRAINT `consumo_diesel_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consumo_diesel_ibfk_2` FOREIGN KEY (`id_Anio`) REFERENCES `consumo_diesel_anual` (`id_Anio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consumo_diesel_anual`
--
ALTER TABLE `consumo_diesel_anual`
  ADD CONSTRAINT `consumo_diesel_anual_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consumo_energetico`
--
ALTER TABLE `consumo_energetico`
  ADD CONSTRAINT `consumo_energetico_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consumo_energetico_ibfk_2` FOREIGN KEY (`id_Anio`) REFERENCES `consumo_energetico_anual` (`id_Anio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consumo_energetico_anual`
--
ALTER TABLE `consumo_energetico_anual`
  ADD CONSTRAINT `consumo_energetico_anual_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consumo_gasolina`
--
ALTER TABLE `consumo_gasolina`
  ADD CONSTRAINT `consumo_gasolina_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consumo_gasolina_ibfk_2` FOREIGN KEY (`id_Anio`) REFERENCES `consumo_gasolina_anual` (`id_Anio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consumo_gasolina_anual`
--
ALTER TABLE `consumo_gasolina_anual`
  ADD CONSTRAINT `consumo_gasolina_anual_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `consumo_papel`
--
ALTER TABLE `consumo_papel`
  ADD CONSTRAINT `consumo_papel_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `consumo_papel_ibfk_2` FOREIGN KEY (`id_Anio`) REFERENCES `consumo_papel_anual` (`id_Anio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`id_colegio`) REFERENCES `colegio` (`id_colegio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `colegio` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
