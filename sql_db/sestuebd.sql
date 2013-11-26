-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-10-2013 a las 10:29:50
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `sestuebd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_log_edit_proy_activ`
--

CREATE TABLE IF NOT EXISTS `t_log_edit_proy_activ` (
  `c_log_id_pk` int(100) NOT NULL AUTO_INCREMENT COMMENT 'Campo identificador de cada log',
  `c_proy_activ_fk` int(100) NOT NULL COMMENT 'Relacion Clave Foranea con el campo c_id de t_proyecto_actividades',
  `c_carnet_usua_edit_fk` int(9) NOT NULL COMMENT 'Relacion Clave Foranea con el c_carnet de t_usuarios',
  `c_hora` datetime NOT NULL COMMENT 'Campo para guardar la hora de modificacion',
  PRIMARY KEY (`c_log_id_pk`),
  KEY `c_proy_prop_fk` (`c_proy_activ_fk`),
  KEY `c_carnet_usua_edit_fk` (`c_carnet_usua_edit_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que guarda la bitacora de los editores de t_proy_activ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_preguntas_respuestas`
--

CREATE TABLE IF NOT EXISTS `t_preguntas_respuestas` (
  `c_id_pk` int(5) NOT NULL AUTO_INCREMENT COMMENT 'Campo identificador de cada pregunta/respuesta',
  `c_pregunta` varchar(200) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo para guardar las preguntas',
  `c_respuesta` varchar(999) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo para guardar las respuestas',
  `c_cap_perteneciente` int(1) NOT NULL COMMENT 'Campo que guarda a que capitulo pertenece la pregunta/respuesta',
  PRIMARY KEY (`c_id_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para guardar las preguntas/respuestas frecuentes' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_proy_activ`
--

CREATE TABLE IF NOT EXISTS `t_proy_activ` (
  `c_id_pk` int(100) NOT NULL AUTO_INCREMENT COMMENT 'Campo para guardar el identificador de cada actividad',
  `c_cap_perteneciente` int(1) NOT NULL COMMENT 'Campo para guardar al capitulo que pertenece la actividad',
  `c_actividad` varchar(20) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo para guardar la actividad',
  `c_contenido` varchar(10000) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo para guardar el contenido de la actividad',
  `c_creado` datetime NOT NULL COMMENT 'Fecha en que sea creado la actividad',
  `c_modificado` datetime NOT NULL COMMENT 'Fecha en que sea modificado la actividad',
  PRIMARY KEY (`c_id_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=COMPACT COMMENT='Tabla para guardar las propiedades del proyecto' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuarios`
--

CREATE TABLE IF NOT EXISTS `t_usuarios` (
  `c_cedula_pk` int(9) NOT NULL COMMENT 'Campo para guardar la cedula de identidad del usuario',
  `c_carnet_pk` int(9) NOT NULL COMMENT 'Campo para guardar el numero de carnet del usuario',
  `c_nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo para guardar el(los) nombre(s) de los usuarios',
  `c_apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo para guardar el(los) apellido(s) de los usuarios',
  `c_alias_pk` varchar(32) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo para guardar el nombre/alias de usuario',
  `c_clave` varchar(32) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo para guardar la clave del usuario encriptada',
  `c_palabra_secreta` varchar(32) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Campo para guardar la palabra secreta del usuario',
  `c_rol` int(1) NOT NULL COMMENT 'Campo para identificar el rol de usuario',
  `c_estilo_css_pag` varchar(20) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL COMMENT 'Campo para guardar la preferencia del estilo de la pagina del usuario',
  PRIMARY KEY (`c_cedula_pk`,`c_carnet_pk`,`c_alias_pk`),
  KEY `c_carnet_pk` (`c_carnet_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para guardar los estudiantes del SESTUE';

--
-- Volcado de datos para la tabla `t_usuarios`
--

INSERT INTO `t_usuarios` (`c_cedula_pk`, `c_carnet_pk`, `c_nombres`, `c_apellidos`, `c_alias_pk`, `c_clave`, `c_palabra_secreta`, `c_rol`, `c_estilo_css_pag`) VALUES
(1, 1, 'Administrador', 'del Sistema', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 5, ''),
(23658013, 110300775, 'Ramon', 'Serrano', 'ramon', '266575d3c2b8a34f83817458f96152b1', 'ramon', 3, 'bootstrap');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `t_log_edit_proy_activ`
--
ALTER TABLE `t_log_edit_proy_activ`
  ADD CONSTRAINT `t_log_edit_proy_activ_ibfk_2` FOREIGN KEY (`c_proy_activ_fk`) REFERENCES `t_proy_activ` (`c_id_pk`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `t_log_edit_proy_activ_ibfk_3` FOREIGN KEY (`c_carnet_usua_edit_fk`) REFERENCES `t_usuarios` (`c_carnet_pk`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
