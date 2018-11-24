-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-11-2018 a las 15:14:53
-- Versión del servidor: 10.1.19-MariaDB
-- Versión de PHP: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `compiladores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arreglos`
--

CREATE TABLE `arreglos` (
  `id_arreglo` int(11) NOT NULL,
  `lexema` varchar(20) NOT NULL,
  `tipo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constantes`
--

CREATE TABLE `constantes` (
  `id_constante` int(11) NOT NULL,
  `lexema` varchar(20) NOT NULL,
  `valor` varchar(10) DEFAULT NULL,
  `tipo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoresa`
--

CREATE TABLE `valoresa` (
  `id_valoresA` int(11) NOT NULL,
  `id_arreglo` int(11) NOT NULL,
  `valor` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arreglos`
--
ALTER TABLE `arreglos`
  ADD PRIMARY KEY (`id_arreglo`);

--
-- Indices de la tabla `constantes`
--
ALTER TABLE `constantes`
  ADD PRIMARY KEY (`id_constante`);

--
-- Indices de la tabla `valoresa`
--
ALTER TABLE `valoresa`
  ADD PRIMARY KEY (`id_valoresA`),
  ADD KEY `id_arreglo` (`id_arreglo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arreglos`
--
ALTER TABLE `arreglos`
  MODIFY `id_arreglo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `constantes`
--
ALTER TABLE `constantes`
  MODIFY `id_constante` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `valoresa`
--
ALTER TABLE `valoresa`
  MODIFY `id_valoresA` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `valoresa`
--
ALTER TABLE `valoresa`
  ADD CONSTRAINT `valoresa_ibfk_1` FOREIGN KEY (`id_arreglo`) REFERENCES `arreglos` (`id_arreglo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
