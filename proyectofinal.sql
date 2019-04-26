-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 24-05-2016 a las 20:28:44
-- Versión del servidor: 5.5.24-log
-- Versión de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `proyectofinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `nombre_usuario` varchar(15) NOT NULL,
  `contrasenia` varchar(8) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `bloqueado` tinyint(1) NOT NULL,
  PRIMARY KEY (`nombre_usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`nombre_usuario`, `contrasenia`, `nombre`, `apellidos`, `email`, `bloqueado`) VALUES
('amanda', 'amanda', 'amanda', 'collado blanco', 'smr1a03@gmail.com', 0),
('pepe', 'pepe', 'pepe', 'garcia rodriguez', 'pepe@hotmail.com', 0),
('prueba', 'prueba', 'prueba', 'prueba', 'prueba@hotmail.com', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE IF NOT EXISTS `entradas` (
  `id_entrada` int(11) NOT NULL AUTO_INCREMENT,
  `espectaculo` varchar(100) NOT NULL,
  `lugar` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` float NOT NULL,
  PRIMARY KEY (`id_entrada`,`espectaculo`,`lugar`),
  KEY `espectaculo` (`espectaculo`),
  KEY `lugar` (`lugar`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=43 ;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id_entrada`, `espectaculo`, `lugar`, `fecha`, `hora`, `cantidad`, `precio`) VALUES
(1, 'Malu "Tour Caos"', 'Auditorio Municipal de Malaga', '2016-07-15', '22:00:00', 14, 38),
(2, 'Malu "Tour Caos"', 'Barclaycard Center', '2016-06-12', '22:00:00', 15, 32),
(3, 'El Rey Leon (Musical)', 'Teatro Lope de Vega', '2016-06-01', '20:00:00', 7, 48),
(4, 'El Rey Leon (Musical)', 'Teatro Lope de Vega', '2016-06-02', '20:00:00', 23, 70),
(5, 'El Rey Leon (Musical)', 'Teatro Lope de Vega', '2016-06-03', '22:00:00', 3, 80),
(6, 'Alejandro Sanz "Gira Sirope Vivo"', 'Multiusos Sanchez Paraiso', '2016-06-25', '22:00:00', 9, 34),
(7, 'Malu "Tour Caos"', 'Palau Sant Jordi', '2016-08-06', '22:00:00', 0, 36),
(8, 'Carlos Latre - 15 Años No es Nada', 'Barts', '2016-06-25', '20:00:00', 4, 20),
(9, 'Carlos Latre - 15 Años No es Nada', 'Music Factory', '2016-06-04', '20:00:00', 12, 21),
(10, 'Carlos Latre - 15 Años No es Nada', 'Teatre Goya', '2016-07-16', '20:00:00', 25, 25),
(11, 'Carlos Latre - 15 Años No es Nada', 'Teatro Liceo', '2016-07-23', '18:00:00', 39, 21),
(12, 'Carlos Latre - 15 Años No es Nada', 'Teatro Rialto', '2016-06-24', '20:00:00', 17, 23),
(13, 'Carlos Latre - 15 Años No es Nada', 'Teatre Tivoli', '2016-06-11', '20:00:00', 20, 25),
(14, 'Los Vivancos (Baile)', 'Teatre Goya', '2016-06-24', '20:00:00', 3, 27),
(15, 'Los Vivancos (Baile)', 'Teatro Rialto', '2016-06-17', '20:00:00', 12, 24),
(16, 'Malu "Tour Caos"', 'Palau Sant Jordi', '2016-06-18', '22:00:00', 5, 45),
(17, 'Malu "Tour Caos"', 'Pabellon Principe Felipe', '2016-06-25', '22:00:00', 22, 37),
(18, 'Alejandro Sanz "Gira Sirope Vivo"', 'Auditorio Municipal de Malaga', '2016-06-04', '22:00:00', 47, 45),
(19, 'Alejandro Sanz "Gira Sirope Vivo"', 'Barclaycard Center', '2016-06-11', '22:00:00', 10, 50),
(20, 'Alejandro Sanz "Gira Sirope Vivo"', 'Palau Sant Jordi', '2016-07-02', '22:00:00', 22, 40),
(21, 'FIB 2016', 'Recinto de Conciertos - Benicassim', '2016-07-14', '18:00:00', 25, 159),
(22, 'Supersubmarina Tour 2016', 'Auditorio Municipal de Malaga', '2016-07-02', '22:00:00', 2, 27),
(23, 'Supersubmarina Tour 2016', 'Barts', '2016-06-10', '22:00:00', 17, 20),
(24, 'Dreambeach Villaricos 2016', 'Playa de Villaricos - Cuevas del Almanzora', '2016-08-11', '18:00:00', 15, 84),
(25, 'Alejandro Sanz "Gira Sirope Vivo"', 'Plaza de Toros de Las Ventas', '2016-07-01', '22:00:00', 25, 34),
(26, 'Malu "Tour Caos"', 'Plaza de Toros de Las Ventas', '2016-07-08', '22:00:00', 17, 37),
(27, 'Supersubmarina Tour 2016', 'Multiusos Sanchez Paraiso', '2016-08-13', '22:00:00', 50, 27),
(28, 'Supersubmarina Tour 2016', 'Pabellon Principe Felipe', '2016-06-16', '22:00:00', 30, 28),
(29, 'Supersubmarina Tour 2016', 'Palau Sant Jordi', '2016-06-09', '22:00:00', 20, 19),
(30, 'Supersubmarina Tour 2016', 'Music Factory', '2016-06-23', '23:00:00', 15, 12),
(31, 'Los Vivancos (Baile)', 'Teatro Rialto', '2016-09-03', '17:00:00', 2, 20),
(32, 'Los Vivancos (Baile)', 'Teatre Goya', '2016-08-31', '18:00:00', 13, 22),
(33, 'Los Vivancos (Baile)', 'Teatro Liceo', '2016-09-08', '19:00:00', 10, 19),
(34, 'Por Humor Al Arte', 'Teatro Rialto', '2016-07-02', '18:00:00', 21, 20),
(35, 'Por Humor Al Arte', 'Teatro Lope de Vega', '2016-08-16', '20:00:00', 19, 20),
(36, 'Por Humor Al Arte', 'Teatro Liceo', '2016-06-05', '20:00:00', 10, 20),
(37, 'Por Humor Al Arte', 'Teatre Tivoli', '2016-06-12', '17:00:00', 12, 18),
(38, 'Por Humor Al Arte', 'Teatre Goya', '2016-06-26', '19:00:00', 12, 19),
(39, 'Por Humor Al Arte', 'Teatre Goya', '2016-05-30', '20:00:00', 18, 19),
(40, 'Por Humor Al Arte', 'Teatre Goya', '2016-05-31', '20:00:00', 2, 19),
(41, 'Malu "Tour Caos"', 'Barclaycard Center', '2016-07-16', '22:00:00', 0, 39),
(42, 'Malu "Tour Caos"', 'Plaza de Toros de Las Ventas', '2016-05-14', '22:00:00', 2, 35);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `espectaculos`
--

CREATE TABLE IF NOT EXISTS `espectaculos` (
  `nombre_espectaculo` varchar(100) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `imagen_espectaculo` varchar(100) NOT NULL,
  PRIMARY KEY (`nombre_espectaculo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `espectaculos`
--

INSERT INTO `espectaculos` (`nombre_espectaculo`, `categoria`, `imagen_espectaculo`) VALUES
('Alejandro Sanz "Gira Sirope Vivo"', 'Musica', '../../img/espectaculos/alejandro_sanz.jpeg'),
('Carlos Latre - 15 Años No es Nada', 'Teatro', '../../img/espectaculos/carlos_latre.jpg'),
('Dreambeach Villaricos 2016', 'Musica', '../../img/espectaculos/dreambeach.jpg'),
('El Rey Leon (Musical)', 'Teatro', '../../img/espectaculos/rey_leon.jpg'),
('FIB 2016', 'Musica', '../../img/espectaculos/fib.jpg'),
('Los Vivancos (Baile)', 'Teatro', '../../img/espectaculos/vivancos.jpg'),
('Malu "Tour Caos"', 'Musica', '../../img/espectaculos/malu.jpg'),
('Por Humor Al Arte', 'Teatro', '../../img/espectaculos/humor_arte.jpg'),
('Supersubmarina Tour 2016', 'Musica', '../../img/espectaculos/supersubmarina.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE IF NOT EXISTS `lugares` (
  `nombre_lugar` varchar(50) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `imagen_lugar` varchar(100) NOT NULL,
  PRIMARY KEY (`nombre_lugar`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`nombre_lugar`, `ciudad`, `imagen_lugar`) VALUES
('Auditorio Municipal de Malaga', 'Malaga', '../../img/lugares/auditorio_malaga.jpg'),
('Barclaycard Center', 'Madrid', '../../img/lugares/barclaycard_madrid.jpg'),
('Barts', 'Barcelona', '../../img/lugares/barts_barcelona.jpg'),
('Multiusos Sanchez Paraiso', 'Salamanca', '../../img/lugares/multiusos_salamanca.jpg'),
('Music Factory', 'Salamanca', '../../img/lugares/music_salamanca.jpg'),
('Pabellon Principe Felipe', 'Zaragoza', '../../img/lugares/pabellon_zaragoza.jpg'),
('Palau Sant Jordi', 'Barcelona', '../../img/lugares/palau_barcelona.jpg'),
('Playa de Villaricos - Cuevas del Almanzora', 'Almeria', '../../img/lugares/villaricos.jpg'),
('Plaza de Toros de Las Ventas', 'Madrid', '../../img/lugares/ventas_madrid.jpg'),
('Recinto de Conciertos - Benicassim', 'Castellon', '../../img/lugares/recinto_benicassim.jpg'),
('Teatre Goya', 'Barcelona', '../../img/lugares/goya_barcelona.jpg'),
('Teatre Tivoli', 'Barcelona', '../../img/lugares/tivoli_barcelona.jpg'),
('Teatro Liceo', 'Salamanca', '../../img/lugares/liceo_salamanca.jpg'),
('Teatro Lope de Vega', 'Madrid', '../../img/lugares/lope_madrid.jpg'),
('Teatro Rialto', 'Madrid', '../../img/lugares/rialto_madrid.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `entrada` int(11) NOT NULL,
  `cantidad_venta` int(11) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  PRIMARY KEY (`id_venta`,`entrada`,`usuario`),
  KEY `entrada` (`entrada`),
  KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `entrada`, `cantidad_venta`, `usuario`) VALUES
(15, 16, 4, 'amanda'),
(16, 24, 3, 'amanda');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_5` FOREIGN KEY (`espectaculo`) REFERENCES `espectaculos` (`nombre_espectaculo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `entradas_ibfk_6` FOREIGN KEY (`lugar`) REFERENCES `lugares` (`nombre_lugar`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`entrada`) REFERENCES `entradas` (`id_entrada`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`usuario`) REFERENCES `clientes` (`nombre_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
