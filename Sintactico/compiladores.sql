-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-11-2018 a las 20:48:35
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

--
-- Volcado de datos para la tabla `arreglos`
--

INSERT INTO `arreglos` (`id_arreglo`, `lexema`, `tipo`) VALUES
(1, 'valores', 'ent');

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

--
-- Volcado de datos para la tabla `constantes`
--

INSERT INTO `constantes` (`id_constante`, `lexema`, `valor`, `tipo`) VALUES
(1, 'lim', '0', 'ent');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `constantesactual`
--

CREATE TABLE `constantesactual` (
  `id_constanteactual` int(11) NOT NULL,
  `id_constante` int(11) NOT NULL,
  `valora` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `constantesactual`
--

INSERT INTO `constantesactual` (`id_constanteactual`, `id_constante`, `valora`) VALUES
(1, 1, '53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoraactual`
--

CREATE TABLE `valoraactual` (
  `id_valoraactual` int(11) NOT NULL,
  `id_arreglo` int(11) NOT NULL,
  `id_valoresA` int(11) NOT NULL,
  `valora` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `valoraactual`
--

INSERT INTO `valoraactual` (`id_valoraactual`, `id_arreglo`, `id_valoresA`, `valora`) VALUES
(1, 1, 1, '534'),
(2, 1, 2, '789'),
(3, 1, 3, '212'),
(4, 1, 4, '6'),
(5, 1, 5, '8');

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
-- Volcado de datos para la tabla `valoresa`
--

INSERT INTO `valoresa` (`id_valoresA`, `id_arreglo`, `valor`) VALUES
(1, 1, '534'),
(2, 1, '789'),
(3, 1, '212'),
(4, 1, '6'),
(5, 1, '8');

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
-- Indices de la tabla `constantesactual`
--
ALTER TABLE `constantesactual`
  ADD PRIMARY KEY (`id_constanteactual`),
  ADD KEY `id_constante` (`id_constante`);

--
-- Indices de la tabla `valoraactual`
--
ALTER TABLE `valoraactual`
  ADD PRIMARY KEY (`id_valoraactual`),
  ADD KEY `id_arreglo` (`id_arreglo`),
  ADD KEY `id_valoresA` (`id_valoresA`);

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
  MODIFY `id_arreglo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `constantes`
--
ALTER TABLE `constantes`
  MODIFY `id_constante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `constantesactual`
--
ALTER TABLE `constantesactual`
  MODIFY `id_constanteactual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `valoraactual`
--
ALTER TABLE `valoraactual`
  MODIFY `id_valoraactual` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `valoresa`
--
ALTER TABLE `valoresa`
  MODIFY `id_valoresA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `constantesactual`
--
ALTER TABLE `constantesactual`
  ADD CONSTRAINT `constantesactual_ibfk_1` FOREIGN KEY (`id_constante`) REFERENCES `constantes` (`id_constante`);

--
-- Filtros para la tabla `valoraactual`
--
ALTER TABLE `valoraactual`
  ADD CONSTRAINT `valoraactual_ibfk_1` FOREIGN KEY (`id_arreglo`) REFERENCES `arreglos` (`id_arreglo`),
  ADD CONSTRAINT `valoraactual_ibfk_2` FOREIGN KEY (`id_valoresA`) REFERENCES `valoresa` (`id_valoresA`);

--
-- Filtros para la tabla `valoresa`
--
ALTER TABLE `valoresa`
  ADD CONSTRAINT `valoresa_ibfk_1` FOREIGN KEY (`id_arreglo`) REFERENCES `arreglos` (`id_arreglo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
