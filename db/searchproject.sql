-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-03-2023 a las 21:43:15
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `searchproject`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbldatospersonales`
--

CREATE TABLE `tbldatospersonales` (
  `IdDatosPersonales` int(11) NOT NULL,
  `NombreCompleto` varchar(60) DEFAULT NULL,
  `Correo` varchar(40) DEFAULT NULL,
  `tokens` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tbldatospersonales`
--

INSERT INTO `tbldatospersonales` (`IdDatosPersonales`, `NombreCompleto`, `Correo`, `tokens`) VALUES
(1, 'Uno', 'uno@uno.com', NULL),
(2, 'Dos', 'dos@dos.com', NULL),
(3, 'Tres', 'tres@tres.com', NULL),
(4, 'Ivan', 'cuatro@cuatro.com', NULL),
(5, 'pruebas', 'ivansierra259@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblproyecto`
--

CREATE TABLE `tblproyecto` (
  `IdProyecto` int(11) NOT NULL,
  `NombreProyecto` varchar(30) DEFAULT NULL,
  `DescripcionProyecto` varchar(1000) DEFAULT NULL,
  `Autores` varchar(600) NOT NULL,
  `Seminario` int(11) DEFAULT NULL,
  `Anio` int(4) DEFAULT NULL,
  `Calificacion` varchar(3) DEFAULT NULL,
  `NombreArchivo` varchar(255) NOT NULL,
  `TipoArchivo` varchar(255) NOT NULL,
  `ArchivoProyecto` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblroles`
--

CREATE TABLE `tblroles` (
  `IdRoles` int(11) NOT NULL,
  `DescripcionRoles` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblroles`
--

INSERT INTO `tblroles` (`IdRoles`, `DescripcionRoles`) VALUES
(1, 'Administrador'),
(2, 'DocenteJurado'),
(3, 'Docente'),
(4, 'Estudiante'),
(5, 'ConsultorExterno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblseminario`
--

CREATE TABLE `tblseminario` (
  `IdSeminarios` int(11) NOT NULL,
  `NombreSeminario` varchar(30) DEFAULT NULL,
  `DescripcionSeminario` varchar(1000) NOT NULL,
  `DirectorSeminario` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblseminario`
--

INSERT INTO `tblseminario` (`IdSeminarios`, `NombreSeminario`, `DescripcionSeminario`, `DirectorSeminario`) VALUES
(1, 'Matematica Aplicada', ' Este seminario se enfocada en ingenierías como sistemas, química, industrial, de alimentos, civil y todo lo relacionado con el componente, métodos y herramientas matemáticas. ', 'Valentina Sosa'),
(2, 'Mecatronica', 'Este seminario incorpora elementos de la electrónica la mecánica, la robótica, sistemas de computación y fabricación, las carreras profesionales relacionadas son: ingeniería electrónica, mecánica, informática y de control.', 'José Velázquez'),
(3, 'Ciencias de la Salud', 'Este seminario abarca las disciplinas que se ven relacionadas con la protección, el fomento y la restauración de la salud y de sus servicios como puede ser enfermería, medicina, farmacia, psicología, ciencias de la nutrición y muchas otras más.', 'Ivan Cudriz'),
(4, 'Ciencias Economicas', 'Este seminario estudia la producción, extracción, intercambio, distribución y consumo de bienes y de servicios en una sociedad y una época determinadas, teniendo en cuenta el contexto de gobierno, administración, sociedad, finanzas y la cultura.\r\n', 'Juan Vargas '),
(5, 'Ciencias Politicas', 'Este seminario está orientado en las ramas de: el poder político, autoridad y legitimidad, el estado, administración pública, políticas públicas, relaciones internacionales, comportamiento y comunicación política. ', 'Alejandra Mosquera'),
(6, 'Arte', 'Este seminario involucra aquellas profesiones dedicadas a resguardar, comprender y sistematizar todo el acervo cultural en sus diferentes manifestaciones y épocas, carreras como artes plásticas, diseño gráfico, ilustración, comunicación gráfica, cinematografía, literatura y teatro y actuación.', 'Camilo Andrés Sánchez'),
(7, 'Artes Musicales', 'Este seminario esta enfocado en la experimentación y práctica efectiva con los instrumentos, los formatos, los estilos y el repertorio de una tradición urbana que está vigente y productiva, carreras como canto, composición, instrumentista, ingeniería de sonido y mas.', 'David Sierra'),
(8, 'Prueba', 'esto es una prueba ', 'Don Prueba'),
(9, 'Seminario para crear', 'Seminario para mostrar cómo funciona el botón de \"crear\" ', 'Creado ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblusuarios`
--

CREATE TABLE `tblusuarios` (
  `IdUsuario` int(11) NOT NULL,
  `NombreUsuario` varchar(20) DEFAULT NULL,
  `Contrasena` varchar(255) DEFAULT NULL,
  `Activo` tinyint(1) DEFAULT NULL,
  `DatosPersonales` int(11) DEFAULT NULL,
  `Rol` int(11) DEFAULT NULL,
  `Proyecto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tblusuarios`
--

INSERT INTO `tblusuarios` (`IdUsuario`, `NombreUsuario`, `Contrasena`, `Activo`, `DatosPersonales`, `Rol`, `Proyecto`) VALUES
(1, 'Uno', '1eaa8bb195869a23f081acbb5bf08527', 1, 1, 1, NULL),
(2, 'Dos', '0196f6c4f97df3f48d570c23e46501ae', 1, 2, 2, NULL),
(3, 'Tres', '1798c7d9bd5a5d637ead47154f0d36e3', 1, 3, 3, NULL),
(4, 'Cuatro', '2b556258d4e0a9fe879765d2b76dd039', 1, 4, 4, NULL),
(5, 'pruebas', 'c893bad68927b457dbed39460e6afd62', 1, 5, 1, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbldatospersonales`
--
ALTER TABLE `tbldatospersonales`
  ADD PRIMARY KEY (`IdDatosPersonales`);

--
-- Indices de la tabla `tblproyecto`
--
ALTER TABLE `tblproyecto`
  ADD PRIMARY KEY (`IdProyecto`),
  ADD KEY `tblproyecto_ibfk_1` (`Seminario`),
  ADD KEY `tblproyecto_ibfk_2` (`Calificacion`);

--
-- Indices de la tabla `tblroles`
--
ALTER TABLE `tblroles`
  ADD PRIMARY KEY (`IdRoles`);

--
-- Indices de la tabla `tblseminario`
--
ALTER TABLE `tblseminario`
  ADD PRIMARY KEY (`IdSeminarios`);

--
-- Indices de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `Rol` (`Rol`),
  ADD KEY `DatosPersonales` (`DatosPersonales`),
  ADD KEY `Proyecto` (`Proyecto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbldatospersonales`
--
ALTER TABLE `tbldatospersonales`
  MODIFY `IdDatosPersonales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblproyecto`
--
ALTER TABLE `tblproyecto`
  MODIFY `IdProyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tblroles`
--
ALTER TABLE `tblroles`
  MODIFY `IdRoles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblseminario`
--
ALTER TABLE `tblseminario`
  MODIFY `IdSeminarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblproyecto`
--
ALTER TABLE `tblproyecto`
  ADD CONSTRAINT `tblproyecto_ibfk_1` FOREIGN KEY (`Seminario`) REFERENCES `tblseminario` (`IdSeminarios`);

--
-- Filtros para la tabla `tblusuarios`
--
ALTER TABLE `tblusuarios`
  ADD CONSTRAINT `tblusuarios_ibfk_1` FOREIGN KEY (`Rol`) REFERENCES `tblroles` (`IdRoles`),
  ADD CONSTRAINT `tblusuarios_ibfk_2` FOREIGN KEY (`DatosPersonales`) REFERENCES `tbldatospersonales` (`IdDatosPersonales`),
  ADD CONSTRAINT `tblusuarios_ibfk_3` FOREIGN KEY (`Proyecto`) REFERENCES `tblproyecto` (`IdProyecto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
