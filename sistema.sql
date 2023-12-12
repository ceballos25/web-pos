-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2023 a las 22:16:44
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre_cliente` varchar(100) NOT NULL,
  `tipo_documento` varchar(10) NOT NULL,
  `numero_documento` int(11) NOT NULL,
  `ciudad` varchar(50) NOT NULL,
  `direccion_domicilio` varchar(100) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre_cliente`, `tipo_documento`, `numero_documento`, `ciudad`, `direccion_domicilio`, `celular`, `email`, `fecha_creacion`) VALUES
(45, 'CRISTIAN CAMILO CEBALLOS MARIN', 'C.C', 1007581003, 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-07 00:26:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_venta`
--

CREATE TABLE `detalles_venta` (
  `id_detalle` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `nombre_producto` varchar(100) NOT NULL,
  `descripcion_producto` text NOT NULL,
  `precio_unitario` varchar(20) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total_pagar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalles_venta`
--

INSERT INTO `detalles_venta` (`id_detalle`, `id_venta`, `nombre_producto`, `descripcion_producto`, `precio_unitario`, `cantidad`, `total_pagar`) VALUES
(45, 20, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(46, 20, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(47, 21, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(48, 21, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(49, 22, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(50, 22, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(51, 22, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(52, 23, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(53, 23, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(54, 23, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(55, 24, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(56, 24, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(57, 24, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(58, 25, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(59, 25, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(60, 25, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(61, 26, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(62, 26, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(63, 26, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(64, 27, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(65, 27, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(66, 27, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(67, 27, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(68, 28, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(69, 28, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(70, 28, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(71, 28, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(72, 29, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(73, 29, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(74, 29, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(75, 29, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(76, 30, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(77, 30, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(78, 30, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(79, 30, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(80, 31, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(81, 31, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(82, 31, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(83, 31, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(84, 32, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(85, 32, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(86, 33, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(87, 33, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(88, 34, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(89, 34, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(90, 35, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(91, 35, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(92, 36, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(93, 36, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(94, 37, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(95, 37, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(96, 37, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(97, 38, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(98, 38, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(99, 38, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(100, 39, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(101, 39, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(102, 39, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(103, 40, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(104, 40, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(105, 40, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(106, 41, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(107, 41, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(108, 41, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(109, 42, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(110, 42, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(111, 42, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(112, 43, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(113, 43, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(114, 43, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(115, 44, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(116, 44, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(117, 44, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(118, 45, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(119, 45, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(120, 45, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(121, 45, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(122, 46, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(123, 46, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(124, 46, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(125, 46, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(126, 47, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(127, 47, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(128, 47, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(129, 47, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(130, 48, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(131, 48, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(132, 48, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(133, 48, 'undefined', 'undefined', 'undefined', 0, 'undefined'),
(134, 49, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(135, 49, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(136, 49, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 1, '6.000'),
(137, 49, 'undefined', 'undefined', 'undefined', 0, 'undefined');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(200) NOT NULL,
  `descripcion_producto` varchar(200) NOT NULL,
  `precio_producto` varchar(100) NOT NULL,
  `activo` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre_producto`, `descripcion_producto`, `precio_producto`, `activo`) VALUES
(11, 'SHAMPOO BALSAMO', 'ES UN SHAMPOO ASI Y ASI', '6.000', 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `usuario` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `password`, `nombre`, `tipo_usuario`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Cristian Camilo Ceballos Marin', 1),
(2, 'vendedor', '88d6818710e371b461efff33d271e0d2fb6ccf47', 'Vendedor de la tienda', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id_venta` int(11) NOT NULL,
  `cedula_cliente` varchar(20) NOT NULL,
  `tipo_documento_cliente` varchar(20) DEFAULT NULL,
  `nombre_cliente` varchar(100) DEFAULT NULL,
  `ciudad_cliente` varchar(50) DEFAULT NULL,
  `direccion_cliente` varchar(100) DEFAULT NULL,
  `celular_cliente` varchar(20) DEFAULT NULL,
  `email_cliente` varchar(50) DEFAULT NULL,
  `fecha_venta` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id_venta`, `cedula_cliente`, `tipo_documento_cliente`, `nombre_cliente`, `ciudad_cliente`, `direccion_cliente`, `celular_cliente`, `email_cliente`, `fecha_venta`) VALUES
(14, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 17:35:25'),
(15, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 19:07:58'),
(16, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 19:08:32'),
(17, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 19:10:52'),
(18, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 19:11:58'),
(19, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 19:20:29'),
(20, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 19:22:40'),
(21, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 20:25:14'),
(22, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 20:34:06'),
(23, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 20:34:33'),
(24, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 20:34:58'),
(25, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 20:36:00'),
(26, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 20:36:41'),
(27, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 20:36:56'),
(28, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 20:39:14'),
(29, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 20:39:56'),
(30, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 20:42:53'),
(31, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 20:44:35'),
(32, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-11 20:44:56'),
(33, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:42:53'),
(34, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:45:09'),
(35, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:45:52'),
(36, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:46:19'),
(37, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:47:42'),
(38, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:50:26'),
(39, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:51:17'),
(40, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:51:40'),
(41, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:52:12'),
(42, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:52:27'),
(43, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:53:19'),
(44, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:57:52'),
(45, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:58:10'),
(46, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:59:07'),
(47, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 15:59:34'),
(48, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 16:00:27'),
(49, '1007581003', 'C.C', 'CRISTIAN CAMILO CEBALLOS MARIN', 'ARAUCA', 'DIRCCION ABC', '3243233212', 'COMEFCIALBIGTIC@GMAIL.COM', '2023-12-12 16:02:47');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_documento` (`numero_documento`);

--
-- Indices de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id_venta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_venta`
--
ALTER TABLE `detalles_venta`
  ADD CONSTRAINT `detalles_venta_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
