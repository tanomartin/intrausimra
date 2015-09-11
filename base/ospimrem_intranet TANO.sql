-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2015 a las 16:54:24
-- Versión del servidor: 5.6.11-log
-- Versión de PHP: 5.3.27

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ospimrem_intranet`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cabacuer`
--

CREATE TABLE IF NOT EXISTS `cabacuer` (
  `nrcuit` char(11) NOT NULL,
  `nroacu` int(2) NOT NULL DEFAULT '0',
  `estacu` int(1) NOT NULL DEFAULT '0',
  `fecacu` date NOT NULL DEFAULT '0000-00-00',
  `totacu` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`nrcuit`,`nroacu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuoacuer`
--

CREATE TABLE IF NOT EXISTS `cuoacuer` (
  `nrcuit` char(11) NOT NULL,
  `nroacu` int(2) NOT NULL DEFAULT '0',
  `nrocuo` int(3) NOT NULL DEFAULT '0',
  `moncuo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `fecvto` date NOT NULL DEFAULT '0000-00-00',
  `monpag` decimal(10,2) DEFAULT NULL,
  `fecpag` date DEFAULT NULL,
  `sispag` char(1) DEFAULT NULL,
  `codbar` char(30) DEFAULT NULL,
  PRIMARY KEY (`nrcuit`,`nroacu`,`nrocuo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ddjjnopa`
--

CREATE TABLE IF NOT EXISTS `ddjjnopa` (
  `nrcuit` char(11) NOT NULL,
  `perano` int(4) unsigned NOT NULL,
  `permes` int(2) unsigned NOT NULL,
  PRIMARY KEY (`nrcuit`,`perano`,`permes`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detacuer`
--

CREATE TABLE IF NOT EXISTS `detacuer` (
  `nrcuit` char(11) NOT NULL,
  `nroacu` int(2) NOT NULL DEFAULT '0',
  `anoacu` int(4) NOT NULL DEFAULT '0',
  `mesacu` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nrcuit`,`nroacu`,`anoacu`,`mesacu`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nrcuit` char(11) NOT NULL DEFAULT '',
  `nombre` char(100) NOT NULL DEFAULT '',
  `domile` char(100) NOT NULL DEFAULT '',
  `locale` char(100) NOT NULL DEFAULT '',
  `provle` int(2) NOT NULL DEFAULT '0',
  `copole` char(8) NOT NULL DEFAULT '',
  `telef1` char(14) NOT NULL DEFAULT '',
  `fecini` date DEFAULT NULL,
  PRIMARY KEY (`delcod`,`nrcuit`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juicios`
--

CREATE TABLE IF NOT EXISTS `juicios` (
  `nrcuit` char(11) NOT NULL DEFAULT '0',
  `anojui` int(4) NOT NULL DEFAULT '0',
  `mesjui` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nrcuit`,`anojui`,`mesjui`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE IF NOT EXISTS `pagos` (
  `nrcuit` char(11) NOT NULL DEFAULT '0',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `codvar` int(2) NOT NULL DEFAULT '0',
  `fecdep` date NOT NULL DEFAULT '0000-00-00',
  `totdep` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sispag` char(1) NOT NULL DEFAULT '',
  `codbar` char(30) DEFAULT NULL,
  PRIMARY KEY (`nrcuit`,`anotra`,`mestra`,`codvar`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peranter`
--

CREATE TABLE IF NOT EXISTS `peranter` (
  `nrcuit` char(11) NOT NULL DEFAULT '0',
  `mestra` int(2) NOT NULL DEFAULT '0',
  `anotra` int(4) NOT NULL DEFAULT '0',
  `mesant` int(2) NOT NULL DEFAULT '0',
  `anoant` int(4) NOT NULL DEFAULT '0',
  `varant` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nrcuit`,`mestra`,`anotra`,`mesant`,`anoant`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provin`
--

CREATE TABLE IF NOT EXISTS `provin` (
  `codigo` int(2) NOT NULL DEFAULT '0',
  `nombre` char(60) NOT NULL DEFAULT '',
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `delcod` int(4) NOT NULL DEFAULT '0',
  `nombre` char(50) NOT NULL DEFAULT '',
  `emails` char(100) NOT NULL DEFAULT '',
  `claves` char(8) NOT NULL DEFAULT '',
  `fecuac` date DEFAULT NULL,
  `horuac` time DEFAULT NULL,
  `acceso` int(1) NOT NULL,
  `fechaactualizacion` date NOT NULL,
  PRIMARY KEY (`delcod`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
