-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-10-2023 a las 06:29:41
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(55) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `autor` varchar(35) NOT NULL,
  `genero` varchar(35) NOT NULL,
  `fecha` date DEFAULT NULL,
  `urlImagen` varchar(120) NOT NULL,
  `urlLibro` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `descripcion`, `autor`, `genero`, `fecha`, `urlImagen`, `urlLibro`) VALUES
(25, 'La naranja mecanica', 'asdasdsa', 'Yo', 'Drama', '2023-10-25', '6537509ca959c_libro1.jpeg', 'pdf_6537509ca73b9.pdf'),
(26, 'Random book', 'random', 'Random', 'Milicia', '2023-10-19', '653752bde4acf_portada2.jpg', 'pdf_653752bde260f.pdf'),
(28, 'Secretos', 'asdasdsa', 'Yo', 'Drama', '2023-10-07', '653753dd6aed0_imagen.jpg', 'pdf_6537533d9c703.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamos`
--

CREATE TABLE `prestamos` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `prestamos`
--

INSERT INTO `prestamos` (`id`, `user_id`, `libro_id`, `fecha_inicio`, `fecha_fin`) VALUES
(13, 'xhungensteam@gmail.com', 25, '2023-10-25', '2023-11-03'),
(14, 'xhungensteam@gmail.com', 26, '2023-10-31', '2023-11-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `password`, `email`, `telefono`, `rol`) VALUES
(6, 'Allan', 'Delgado', '$2y$10$4abM0Ukn4J74LqgtJpfxRu2gvUlx4DVil2cYAXtmKn9QkURlKxZGm', 'allanlautarodelgado@gmail.com', '+543855094478', 'admin'),
(33, 'Lautaro Allan', 'Camuz', '$2y$10$tkdaWHFOUmGqotfS0S1w1.IoFGEyQndVXbcT.DVcwHpnv3lEUl4qi', 'xhungensteam@gmail.com', '+543855094478', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
