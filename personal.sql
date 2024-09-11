-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2024 a las 21:51:04
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `personal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `ts_Create` timestamp NOT NULL DEFAULT current_timestamp(),
  `ts_Update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `habilitado` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `cargo`, `ts_Create`, `ts_Update`, `habilitado`, `eliminado`) VALUES
(1, 'Administrativo', '2024-06-23 02:02:35', '2024-06-23 02:02:35', 1, 0),
(2, 'Recepcionista', '2024-06-23 02:02:35', '2024-06-23 02:02:35', 1, 0),
(3, 'Supervisor', '2024-06-23 02:02:35', '2024-06-23 02:02:35', 1, 0),
(4, 'Jefe', '2024-06-23 02:02:35', '2024-06-23 02:02:35', 1, 0),
(5, 'Gerente', '2024-06-23 02:02:35', '2024-06-23 02:02:35', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(11) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `idPersona` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `ts_Create` timestamp NOT NULL DEFAULT current_timestamp(),
  `ts_Update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `habilitado` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `idCargo`, `idPersona`, `idUsuario`, `ts_Create`, `ts_Update`, `habilitado`, `eliminado`) VALUES
(2, 1, 22, 1, '2024-08-26 20:33:46', '2024-08-29 01:32:44', 0, 1),
(3, 2, 28, 2, '2024-08-26 20:33:46', '2024-08-26 20:33:46', 1, 0),
(4, 3, 29, 3, '2024-08-26 20:33:46', '2024-08-29 01:32:51', 0, 1),
(5, 2, 30, 4, '2024-08-26 20:33:46', '2024-09-02 20:27:24', 1, 0),
(6, 5, 31, 5, '2024-08-26 20:33:46', '2024-09-02 20:34:52', 1, 0),
(7, 3, 32, 6, '2024-08-26 20:33:46', '2024-08-28 20:31:01', 0, 1),
(12, 1, 54, 25, '2024-09-01 21:09:49', '2024-09-02 20:13:10', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `idPersona` int(11) NOT NULL,
  `nombre` varchar(150) DEFAULT NULL,
  `apellido` varchar(150) DEFAULT NULL,
  `edad` varchar(150) DEFAULT NULL,
  `dni` varchar(10) DEFAULT NULL,
  `ts_Create` timestamp NOT NULL DEFAULT current_timestamp(),
  `eliminado` int(1) NOT NULL DEFAULT 0,
  `ts_Update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `habilitado` int(1) NOT NULL DEFAULT 1,
  `legajo` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`idPersona`, `nombre`, `apellido`, `edad`, `dni`, `ts_Create`, `eliminado`, `ts_Update`, `habilitado`, `legajo`) VALUES
(22, 'Sebastian-modificado', 'Minotti', '35', '263356695', '2024-05-26 20:56:56', 0, '2024-08-28 18:44:02', 1, 1285),
(28, 'insertid', 'insertid', '52', '36541582', '2024-06-19 23:40:10', 1, '2024-08-28 18:44:09', 0, 1286),
(29, 'modificado', 'modi', '65', '257896545', '2024-06-19 23:43:02', 0, '2024-08-28 18:44:16', 1, 8134),
(30, 'nombre8135', 'apellido8135', '23', '23321813', '2024-08-18 22:14:26', 0, '2024-09-02 20:18:51', 1, 8135),
(31, 'nuevo-8135', 'nuecvo-8135', '56', '32147852', '2024-08-19 00:48:33', 0, '2024-09-02 20:34:52', 1, 6548),
(32, 'mmanmnasmn', 'smdnamsdn', '52', '25369874', '2024-08-19 00:52:10', 0, '2024-08-28 18:44:37', 1, 356),
(33, 'kjbkjbk', 'kjbkjbñ', '25', '2358965547', '2024-08-19 00:55:46', 0, '2024-08-28 18:44:47', 1, 125),
(34, 'lklkj', 'kñlñkj', '5', '25', '2024-08-19 01:00:38', 0, '2024-08-28 18:44:54', 1, 25),
(35, 'khklg', 'kjhklg', '56', '236698774', '2024-08-19 01:07:27', 0, '2024-08-28 18:44:59', 1, 36),
(36, '11111', '11111', '11', '11111111', '2024-08-19 01:09:46', 0, '2024-08-28 18:45:06', 1, 985),
(37, 'lkjlkj', 'lkjlk', '25', '23698741', '2024-08-19 01:36:04', 0, '2024-08-28 18:45:11', 1, 258),
(38, 'kjhgk', 'kjhkgjh', '25', '32698741', '2024-08-19 01:40:54', 0, '2024-08-28 18:45:18', 1, 9056),
(39, 'nuevof', 'nuevof', '56', '23564789', '2024-09-01 19:59:21', 0, '2024-09-01 19:59:21', 1, 1235),
(40, 'otravez', 'otravez', '56', '25987445', '2024-09-01 20:15:04', 0, '2024-09-01 20:15:04', 1, 1235),
(41, 'otravez', 'otravez', '56', '25987445', '2024-09-01 20:16:02', 0, '2024-09-01 20:16:02', 1, 1235),
(42, 'drop', 'drop', '56', '65852369', '2024-09-01 20:20:00', 0, '2024-09-01 20:20:00', 1, 1256),
(43, 'nuevo', 'nuevo', '23', '23654789', '2024-09-01 20:22:53', 0, '2024-09-01 20:22:53', 1, 3258),
(44, 'nuevo', 'nuevo', '23', '23654789', '2024-09-01 20:23:29', 0, '2024-09-01 20:23:29', 1, 3258),
(45, 'vadenuevo', 'vadenuevo', '56', '235689745', '2024-09-01 20:38:16', 0, '2024-09-01 20:38:16', 1, 1236),
(46, 'registro', 'registro', '23', '23654789', '2024-09-01 20:45:20', 0, '2024-09-01 20:45:20', 1, 3258),
(47, 'registro', 'registro', '23', '23654789', '2024-09-01 20:48:30', 0, '2024-09-01 20:48:30', 1, 3258),
(48, '23654', '323265', '32', '325589665', '2024-09-01 20:53:45', 0, '2024-09-01 20:53:45', 1, 2365),
(49, 'nombre8135', 'apellido8135', '34', '23456987', '2024-09-01 20:55:38', 0, '2024-09-01 20:55:38', 1, 34556),
(50, 'sdfsdf', 'fsdfd', '34', '23456987', '2024-09-01 21:04:03', 0, '2024-09-01 21:04:03', 1, 34343),
(51, '345345', '34534', '345', '435345', '2024-09-01 21:05:22', 0, '2024-09-01 21:05:22', 1, 345345),
(52, 'seba', 'minotti', '45', '23321813', '2024-09-01 21:06:41', 0, '2024-09-01 21:06:41', 1, 3258),
(53, 'dfgd', 'dfgdf', '23', '23321813', '2024-09-01 21:08:10', 0, '2024-09-01 21:08:10', 1, 3258),
(54, ' fg-MODIFICADO', 'fgh-MODIFICADO', '23', '23321813', '2024-09-01 21:09:49', 0, '2024-09-01 22:19:24', 1, 34343);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `clave` varchar(8) NOT NULL,
  `ts_Create` timestamp NOT NULL DEFAULT current_timestamp(),
  `ts_Update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `habilitado` int(1) NOT NULL DEFAULT 1,
  `eliminado` int(1) NOT NULL DEFAULT 0,
  `idPersona` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `usuario`, `clave`, `ts_Create`, `ts_Update`, `habilitado`, `eliminado`, `idPersona`) VALUES
(1, 'insertid@gmail.com', '$2y$10$S', '2024-06-19 23:40:10', '2024-08-26 20:34:22', 1, 0, 22),
(2, 'insertid2@gmail.com', '$2y$10$M', '2024-06-19 23:43:02', '2024-08-26 20:34:31', 1, 0, 28),
(3, 'usuario@gmail.com', 'clave', '2024-08-18 21:37:35', '2024-08-26 20:34:37', 1, 0, 29),
(4, 'usuario@gmail.com', 'usuario-', '2024-08-18 22:12:53', '2024-09-02 20:18:51', 1, 0, 30),
(5, 'usuario', 'clave813', '2024-08-19 00:52:10', '2024-09-02 20:34:52', 1, 0, 31),
(6, 'kjhkjhkj@gmail.com', 'kjgklgl', '2024-08-19 01:07:27', '2024-08-26 20:35:34', 1, 0, 32),
(7, '111111@gmail.com', '111111', '2024-08-19 01:09:46', '2024-08-26 20:35:41', 1, 0, 33),
(8, '3513232@gmail.com', 'lkjl', '2024-08-19 01:36:04', '2024-08-26 20:35:46', 1, 0, 34),
(9, 'asdasas@gmail.com', 'kjhkj', '2024-08-19 01:40:54', '2024-08-19 01:40:54', 1, 0, 38),
(10, 'nuevoformulario@gmai', 'nue vofo', '2024-09-01 19:59:21', '2024-09-01 19:59:21', 1, 0, 0),
(11, 'otravez@gmail.com', 'otravez', '2024-09-01 20:15:04', '2024-09-01 20:15:04', 1, 0, 40),
(12, 'otravez@gmail.com', 'otravez', '2024-09-01 20:16:02', '2024-09-01 20:16:02', 1, 0, 41),
(13, 'drop@gmail.com', 'drop', '2024-09-01 20:20:00', '2024-09-01 20:20:00', 1, 0, 42),
(14, 'nuevo@gmail.com', 'nuevo', '2024-09-01 20:22:53', '2024-09-01 20:22:53', 1, 0, 43),
(15, 'nuevo@gmail.com', 'nuevo', '2024-09-01 20:23:29', '2024-09-01 20:23:29', 1, 0, 44),
(16, 'vadenuevo@gmial.com', 'vadenuev', '2024-09-01 20:38:16', '2024-09-01 20:38:16', 1, 0, 45),
(17, 'registro@gmail.com', 'registro', '2024-09-01 20:45:20', '2024-09-01 20:45:20', 1, 0, 46),
(18, 'registro@gmail.com', 'registro', '2024-09-01 20:48:30', '2024-09-01 20:48:30', 1, 0, 47),
(19, 'dsafsdafsd@gmail.com', '23654', '2024-09-01 20:53:45', '2024-09-01 20:53:45', 1, 0, 48),
(20, 'dsakljklj@gmail.com', '564654', '2024-09-01 20:55:38', '2024-09-01 20:55:38', 1, 0, 49),
(21, 'dsakljklj@gmail.com', 'sdfsdfsd', '2024-09-01 21:04:03', '2024-09-01 21:04:03', 1, 0, 50),
(22, 'dsakljklj@gmail.com', '34534534', '2024-09-01 21:05:22', '2024-09-01 21:05:22', 1, 0, 51),
(23, 'dsakljklj@gmail.com', '43232423', '2024-09-01 21:06:41', '2024-09-01 21:06:41', 1, 0, 52),
(24, 'dsakljklj@gmail.com', '3454', '2024-09-01 21:08:10', '2024-09-01 21:08:10', 1, 0, 53),
(25, 'dsakljklj@gmail.com', '546456', '2024-09-01 21:09:49', '2024-09-01 22:27:10', 1, 0, 54);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`),
  ADD KEY `idCargo` (`idCargo`,`idPersona`,`idUsuario`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`idPersona`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idPersona` (`idPersona`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `idPersona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `empleado_ibfk_2` FOREIGN KEY (`idCargo`) REFERENCES `cargo` (`idCargo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
