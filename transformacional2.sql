-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-10-2019 a las 01:27:22
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `transformacional`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `correo` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `app` varchar(30) NOT NULL,
  `apm` varchar(30) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`correo`, `password`, `nombre`, `app`, `apm`, `tel`, `edad`, `sexo`) VALUES
('alejandro_perez30@outlook.com', 'admin2', 'alejandro', 'perez', 'perez', '2221548778', 21, 'M'),
('miguel.buny@gmail.com', '123', 'Miguel ', 'Suarez ', 'Pluma', '2461735434', 22, 'M'),
('mistranjorge@gmail.com', 'admin1', 'jorge', 'mistran', 'mistran', '2221675282', 22, 'M');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pregunta`
--

CREATE TABLE `pregunta` (
  `id` int(8) NOT NULL,
  `pregunta` varchar(300) NOT NULL,
  `idseccion` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pregunta`
--

INSERT INTO `pregunta` (`id`, `pregunta`, `idseccion`) VALUES
(1, '¿Con qué frecuencia consume alguna bebida alcohólica?\r\n', '15926348'),
(2, '¿Cuántas consumiciones de bebidas alcohólicas suele realizar en un día de consumo normal?', '15926348'),
(3, '¿Con qué frecuencia toma 6 o más bebidas alcohólicas en una sola ocasión de consumo?', '15926348'),
(4, '¿Con qué frecuencia en el curso del último año ha sido incapaz de parar de beber una vez había empezado?', '15926348'),
(5, '¿Con qué frecuencia en el curso del último año ha necesitado beber en ayunas para recuperarse después de haber bebido mucho el día anterior?', '15926348'),
(6, '¿Con qué frecuencia en el curso del último año no ha podido recordar lo que sucedió la noche anterior porque había estado bebiendo?', '15926348'),
(7, '¿Usted o alguna otra persona han resultado heridos porque usted había bebido?', '15926348'),
(8, '¿Algún familiar, amigo, médico o profesional sanitario han mostrado preocupación por su consumo de bebidas alcohólicas o le han indicado que deje de beber?', '15926348'),
(9, '¿Se aburren tus amigos en las fiestas donde no sirven bebidas alcohólicas?', '15926348'),
(10, '¿Discuten demasiado tus padres o tutores? ', '15926348'),
(11, '¿Consideras que eres arrogante?', '15926349'),
(12, '¿Discuten demasiado tus padres o tutores?', '15926349'),
(13, '¿Te asustas con facilidad?', '15926349'),
(14, '¿Tienes menos energía de la que crees que deberías tener? ', '15926349'),
(15, '¿Te sientes frustrado(a) con facilidad?', '15926349'),
(16, '¿Amenazas a otros con hacerles daño?', '15926349'),
(17, '¿Te sientes solo (a) la mayor parte del tiempo?', '15926349'),
(18, '¿Dices groserías o vulgaridades?', '15926349'),
(19, '¿Escuchas cuidadosamente cuando alguien te habla?', '15926349'),
(20, '¿Se niegan tus padres o tutores a hablarte cuando se enfadan contigo?', '15926349'),
(21, '¿Piensa mucho en sexo?', '15926310'),
(22, '¿Tiene escaso impulso sexual?', '15926310'),
(23, '¿Ha perdido la iniciativa en las relaciones sexuales?', '15926310'),
(24, '¿Busca excusas para evitar el sexo e incluso lo rechaza?', '15926310'),
(25, '¿Hay una gran diferencia entre mi deseo de frecuencia sexual y el de mi pareja (que es mayor)?', '15926310'),
(26, '¿Aunque su pareja se muestre muy cálida y afectiva, le cuesta entrar en situación sexual?', '15926310'),
(27, '¿vives acomplejado por el tamaño de tu pene, o senos en caso de mujer?', '15926310'),
(28, '¿Consideras que eres feliz con tu sexualidad?', '15926310'),
(29, '¿Crees que tu relación de pareja se está deteriorando por culpa del sexo?', '15926310'),
(30, '¿Has fantaseado con tener relaciones con una persona de tu mismo sexo?', '15926310'),
(31, '¿Qué papel tiene una mujer en una relación?, ¿Y un hombre?', '15926311'),
(32, '¿En alguna ocasión te humilla o te critica en público o en privado?', '15926311'),
(33, '¿Alguna vez has sido presionada a mantener relaciones sexuales o las has mantenido por miedo a tu pareja?', '15926311'),
(34, '¿Alguna vez te ha empujado o pegado?', '15926311'),
(35, '¿Sientes que intenta alejarte de tu entorno?', '15926311'),
(36, '¿Te sientes segura(o) en tu casa?', '15926311'),
(37, '¿Te compara con frecuencia con otras personas y te pone por debajo de ellas?', '15926311'),
(38, '¿Te impide o te intenta convencer para que no trabajes?', '15926311'),
(39, 'Cuando salís, ¿te obliga a arreglarte o a no hacerlo?', '15926311'),
(40, '¿Crees que puedes merecer una bofetada por parte de tu pareja?', '15926311');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id` int(8) NOT NULL,
  `respuesta` varchar(3000) DEFAULT NULL,
  `idseccion` varchar(25) NOT NULL,
  `idpregunta` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `idesec` varchar(8) NOT NULL,
  `nomsec` varchar(200) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `pacsec` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`idesec`, `nomsec`, `descripcion`, `pacsec`) VALUES
('15926310', 'SEXUALIDAD', 'Conjunto de condiciones que caracterizan el sexo de cada persona y que afectan su desarrollo', 'mistranjorge@gmail.com'),
('15926311', 'VIOLENCIA DE PAREJA', 'Toda acción u omisión que daña física, emocional y sexualmente, con el fin de dominar y mantener el control sobre otra persona.', 'mistranjorge@gmail.com'),
('15926348', 'ADICCIONES', 'Todo que es dificil de dejar y esta haciendo un daño en nuestra persona', 'mistranjorge@gmail.com'),
('15926349', 'SALUD MENTAL', 'Incluye nuestro bienestar emocional, psicológico y social. Afecta la forma en que pensamos, sentimos y actuamos', 'mistranjorge@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitantes`
--

CREATE TABLE `visitantes` (
  `idvis` int(8) NOT NULL,
  `sexovis` varchar(1) NOT NULL,
  `edadvis` int(11) NOT NULL,
  `secvis` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `visitantes`
--

INSERT INTO `visitantes` (`idvis`, `sexovis`, `edadvis`, `secvis`) VALUES
(1, 'F', 18, ''),
(2, 'F', 18, 'ADICCIONES'),
(3, 'F', 18, 'ADICCIONES'),
(4, 'F', 18, 'ADICCIONES'),
(5, 'F', 18, 'ADICCIONES'),
(6, 'F', 18, 'ADICCIONES'),
(7, 'F', 18, 'ADICCIONES'),
(8, 'F', 18, 'ADICCIONES'),
(9, 'F', 18, 'ADICCIONES'),
(10, 'F', 18, 'ADICCIONES'),
(11, 'F', 18, 'ADICCIONES'),
(12, 'F', 18, 'ADICCIONES'),
(13, 'F', 18, 'ADICCIONES'),
(14, 'F', 18, 'ADICCIONES'),
(15, 'F', 18, 'ADICCIONES'),
(16, 'F', 18, 'ADICCIONES'),
(17, 'F', 18, 'ADICCIONES'),
(18, 'F', 18, 'ADICCIONES'),
(19, 'F', 18, 'ADICCIONES'),
(20, 'F', 18, 'ADICCIONES'),
(21, 'F', 18, 'ADICCIONES'),
(22, 'F', 18, 'ADICCIONES'),
(23, 'F', 18, 'ADICCIONES'),
(24, 'F', 18, 'ADICCIONES'),
(25, 'F', 18, 'ADICCIONESQ'),
(26, 'F', 18, 'ADICCIONESQ'),
(27, 'F', 18, 'ADICCIONESQ'),
(28, 'F', 18, 'ADICCIONESQ'),
(29, 'F', 18, 'ADICCIONESQ'),
(30, 'F', 18, 'ADICCIONESQ'),
(31, 'F', 18, 'ADICCIONESQ'),
(32, 'F', 18, 'ADICCIONESQ'),
(33, 'F', 18, 'ADICCIONESQ'),
(34, 'F', 18, 'ADICCIONESQ'),
(35, 'F', 18, 'ADICCIONESQ'),
(36, 'F', 18, 'ADICCIONESQ'),
(37, 'F', 18, 'ADICCIONESQ'),
(38, 'F', 18, 'ADICCIONESQ'),
(39, 'F', 18, 'ADICCIONESQ'),
(40, 'F', 18, 'ADICCIONESQ'),
(41, '', 0, 'ADICCIONESQ'),
(42, '', 0, 'ADICCIONESQ'),
(43, '', 0, 'ADICCIONESQ'),
(44, '', 0, 'ADICCIONESQ'),
(45, '', 0, 'ADICCIONESQ'),
(46, '', 0, 'ADICCIONESQ'),
(47, '', 0, 'ADICCIONESQ'),
(48, '', 0, 'ADICCIONESQ'),
(49, '', 0, 'ADICCIONESQ'),
(50, 'M', 15, ''),
(51, 'M', 22, 'ADICCIONES'),
(52, 'M', 22, 'ADICCIONES'),
(53, 'M', 22, 'ADICCIONESQ'),
(54, 'M', 22, 'ADICCIONESQ'),
(55, 'M', 22, 'ADICCIONESQ'),
(56, 'M', 22, 'ADICCIONESQ'),
(57, 'M', 22, 'ADICCIONESQ'),
(58, 'M', 22, 'ADICCIONESQ'),
(59, 'M', 22, 'ADICCIONESQ'),
(60, 'M', 22, 'ADICCIONESQ'),
(61, 'M', 22, 'ADICCIONESQ'),
(62, 'M', 22, 'ADICCIONESQ'),
(63, 'M', 22, 'ADICCIONESQ'),
(64, 'M', 22, 'ADICCIONESQ'),
(65, 'M', 22, 'ADICCIONESQ'),
(66, 'M', 22, 'ADICCIONESQ'),
(67, 'M', 22, 'ADICCIONESQ'),
(68, 'M', 22, 'ADICCIONESQ'),
(69, 'M', 22, 'ADICCIONESQ'),
(70, 'M', 22, 'ADICCIONESQ'),
(71, 'M', 22, 'ADICCIONESQ'),
(72, 'M', 22, 'ADICCIONESQ'),
(73, 'M', 22, 'ADICCIONESQ'),
(74, 'M', 22, 'ADICCIONESQ'),
(75, 'M', 22, 'ADICCIONESQ'),
(76, 'M', 22, 'ADICCIONESQ'),
(77, 'M', 22, 'ADICCIONESQ'),
(78, 'M', 22, 'ADICCIONESQ'),
(79, 'M', 22, 'ADICCIONESQ'),
(80, 'M', 22, 'ADICCIONESQ'),
(81, 'M', 22, 'ADICCIONESQ'),
(82, 'M', 22, 'ADICCIONESQ'),
(83, 'M', 22, 'ADICCIONESQ'),
(84, 'M', 22, 'ADICCIONESQ'),
(85, 'M', 22, 'ADICCIONESQ'),
(86, 'M', 22, 'ADICCIONESQ'),
(87, 'M', 22, 'ADICCIONESQ'),
(88, 'M', 22, 'ADICCIONESQ'),
(89, 'M', 22, 'ADICCIONESQ'),
(90, 'M', 22, 'ADICCIONESQ'),
(91, 'M', 22, 'ADICCIONESQ'),
(92, 'M', 22, 'ADICCIONESQ'),
(93, 'M', 22, 'ADICCIONESQ'),
(94, 'M', 22, 'ADICCIONESQ'),
(95, 'M', 22, 'ADICCIONESQ'),
(96, 'M', 22, 'ADICCIONESQ'),
(97, 'M', 22, 'ADICCIONESQ'),
(98, 'M', 22, 'ADICCIONESQ'),
(99, 'M', 22, 'ADICCIONESQ'),
(100, 'M', 22, 'ADICCIONESQ'),
(101, 'M', 22, 'ADICCIONESQ'),
(102, 'M', 22, 'ADICCIONESQ'),
(103, 'M', 22, 'ADICCIONESQ'),
(104, 'M', 22, 'ADICCIONESQ'),
(105, 'M', 22, 'ADICCIONESQ'),
(106, 'M', 22, 'ADICCIONESQ'),
(107, 'M', 22, 'ADICCIONESQ'),
(108, 'M', 22, 'ADICCIONESQ'),
(109, 'M', 22, 'SALUD MENTALQ'),
(110, 'M', 22, 'SALUD MENTALQ'),
(111, 'M', 22, 'SALUD MENTALQ'),
(112, 'M', 22, 'SALUD MENTALQ'),
(113, 'M', 22, 'SALUD MENTALQ'),
(114, 'M', 22, 'SALUD MENTALQ'),
(115, 'M', 22, 'SALUD MENTALQ'),
(116, 'M', 22, 'SALUD MENTALQ'),
(117, 'M', 22, 'SEXUALIDADQ'),
(118, 'M', 22, 'SEXUALIDADQ'),
(119, 'M', 22, 'SEXUALIDADQ'),
(120, 'M', 22, 'SEXUALIDADQ'),
(121, 'M', 22, 'VIOLENCIA DE PAREJAQ'),
(122, 'M', 22, 'VIOLENCIA DE PAREJAQ'),
(123, 'M', 22, 'VIOLENCIA DE PAREJAQ'),
(124, 'M', 22, 'VIOLENCIA DE PAREJAQ'),
(125, 'M', 22, 'VIOLENCIA DE PAREJAQ'),
(126, 'M', 22, 'VIOLENCIA DE PAREJAQ'),
(127, 'M', 22, 'SEXUALIDADQ'),
(128, 'M', 22, 'SEXUALIDADQ'),
(129, 'M', 22, 'SALUD MENTALQ'),
(130, 'M', 22, 'SALUD MENTALQ'),
(131, 'M', 22, 'ADICCIONESQ'),
(132, 'M', 22, 'ADICCIONESQ'),
(133, 'M', 22, 'ADICCIONESQ'),
(134, 'M', 22, 'ADICCIONESQ'),
(135, 'M', 22, 'ADICCIONESQ'),
(136, 'M', 22, 'ADICCIONESQ'),
(137, 'M', 22, 'SALUD MENTALQ'),
(138, 'M', 22, 'SALUD MENTALQ'),
(139, 'M', 22, 'SALUD MENTALQ'),
(140, 'M', 22, 'SALUD MENTALQ'),
(141, 'M', 22, 'SEXUALIDADQ'),
(142, 'M', 22, 'SEXUALIDADQ');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`correo`);

--
-- Indices de la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idseccion` (`idseccion`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idpregunta` (`idpregunta`),
  ADD KEY `idseccion` (`idseccion`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`idesec`),
  ADD KEY `pacsec` (`pacsec`);

--
-- Indices de la tabla `visitantes`
--
ALTER TABLE `visitantes`
  ADD PRIMARY KEY (`idvis`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `visitantes`
--
ALTER TABLE `visitantes`
  MODIFY `idvis` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pregunta`
--
ALTER TABLE `pregunta`
  ADD CONSTRAINT `pregunta_ibfk_1` FOREIGN KEY (`idseccion`) REFERENCES `secciones` (`idesec`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `respuesta_ibfk_1` FOREIGN KEY (`idpregunta`) REFERENCES `pregunta` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `respuesta_ibfk_2` FOREIGN KEY (`idseccion`) REFERENCES `secciones` (`idesec`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD CONSTRAINT `secciones_ibfk_1` FOREIGN KEY (`idesec`) REFERENCES `psicologos` (`idepsi`),
  ADD CONSTRAINT `secciones_ibfk_2` FOREIGN KEY (`pacsec`) REFERENCES `pacientes` (`correo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
