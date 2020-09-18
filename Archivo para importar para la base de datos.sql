-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-09-2020 a las 02:37:48
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `infinity`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(10) NOT NULL,
  `categoria_descripcion` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_descripcion`) VALUES
(1, 'Camisas'),
(2, 'Pantalones'),
(3, 'Accesorios'),
(7, 'Zapatos'),
(8, 'Gorras'),
(10, 'Anillos'),
(11, 'Abrigos'),
(12, 'Lenceria');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `detalle_id` int(20) NOT NULL,
  `detalle_factura_id` int(11) NOT NULL,
  `detalle_producto_id` int(11) NOT NULL,
  `detalle_cantidad` int(11) NOT NULL,
  `detalle_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`detalle_id`, `detalle_factura_id`, `detalle_producto_id`, `detalle_cantidad`, `detalle_total`) VALUES
(1, 1, 27, 1, '16.00'),
(2, 1, 25, 2, '48.00'),
(3, 1, 26, 1, '65.00'),
(4, 2, 24, 1, '26.00'),
(5, 2, 22, 1, '33.00'),
(6, 3, 23, 2, '36.00'),
(7, 3, 24, 3, '78.00'),
(8, 4, 26, 1, '65.00'),
(9, 4, 22, 3, '99.00'),
(10, 5, 26, 1, '65.00'),
(11, 5, 22, 1, '33.00'),
(12, 6, 29, 5, '165.00'),
(13, 6, 27, 1, '16.00'),
(15, 7, 27, 20, '320.00'),
(16, 8, 32, 2, '44.00'),
(17, 8, 33, 3, '189.00'),
(18, 9, 34, 3, '138.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `factura_id` int(20) NOT NULL,
  `factura_cliente_id` int(11) NOT NULL,
  `factura_fehca` date NOT NULL,
  `factura_subtotal` decimal(10,2) NOT NULL,
  `factura_iva` decimal(10,2) NOT NULL,
  `factura_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`factura_id`, `factura_cliente_id`, `factura_fehca`, `factura_subtotal`, `factura_iva`, `factura_total`) VALUES
(1, 6, '2020-09-12', '129.00', '15.48', '144.48'),
(2, 6, '2020-09-12', '59.00', '7.08', '66.08'),
(3, 7, '2020-09-12', '114.00', '13.68', '127.68'),
(4, 7, '2020-09-12', '164.00', '19.68', '183.68'),
(5, 7, '2020-09-15', '98.00', '11.76', '109.76'),
(6, 7, '2020-09-15', '181.00', '21.72', '202.72'),
(7, 6, '2020-09-15', '320.00', '38.40', '358.40'),
(8, 6, '2020-09-16', '233.00', '27.96', '260.96'),
(9, 6, '2020-09-16', '138.00', '16.56', '154.56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `producto_id` int(11) NOT NULL,
  `producto_descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `producto_color` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `producto_talla` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `producto_marca` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `producto_precio` decimal(10,2) NOT NULL,
  `producto_categoria_id` int(10) NOT NULL,
  `producto_foto` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`producto_id`, `producto_descripcion`, `producto_color`, `producto_talla`, `producto_marca`, `producto_precio`, `producto_categoria_id`, `producto_foto`) VALUES
(21, 'Pantalon Jean mujer', 'azul marino', 'M', 'no se', '23.00', 2, '3ece0a528b77.jpg'),
(22, 'Pantalon Combate', 'negro', 'S', 'nose', '33.00', 2, '8f1854a88e1de21bd4f92d91985b5e26.jpg'),
(23, 'Pantalon Tela', 'Gris', 'S', 'nose', '18.00', 2, '282-2826374_etre-fort-parkour-jeans-hd-png-download.png'),
(24, 'Buson Hombre Algodon', 'blanco', 'X', 'nose', '26.00', 1, 'camiseta-hombre-manga-larga-y-sublimacion-russell-hd-t-167m.jpg'),
(25, 'Camisa Universo', 'Gris-negro', 'M', 'nose', '24.00', 1, 'H6e2103acedb143e1a357c3241a0d3a05X.jpg'),
(26, 'Zapatos varon negro', 'negro', '41', 'nose', '65.00', 7, '9a60477ccc4561a61c46bc1c8bfe9af0.jpg'),
(27, 'Camisa ', 'Negror', 'M', 'asd', '16.00', 1, 'pngwing.com (1).png'),
(29, 'Camisa 4/4', 'Azul', 'XL', 'Tommy', '33.00', 1, 'pngocean.com.png'),
(30, 'Pantalon tela negro', 'Negro', 'M', 'Tommy', '24.00', 2, 'waist-pocket-trousers-mens-pant-png-hd.jpg'),
(31, 'Camisa Formal', 'Amarillo', 'M', 'Gucci', '3000.00', 1, 'images (1).jpg'),
(32, 'Camsia Mexico', 'Negro', 'X', 'RM', '22.00', 1, 'pngwing.com.png'),
(33, 'Tacones Mujer', 'Negros', '37', 'Aquazzura', '63.00', 7, 'rBVaVFzjjaKAHLf6AAcIQAI5mqc606 (1).jpg'),
(34, 'Abrigo con capucha', 'Negro', 'X', 'Nike', '46.00', 11, 'sdasd.png'),
(35, 'Calentador', 'asd', 'X', 'nose', '35.00', 2, 's-l300.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `rol_descripcion` varchar(80) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`rol_id`, `rol_descripcion`) VALUES
(1, 'Administrador'),
(2, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` int(11) NOT NULL,
  `usuario_nombre` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_apellido` varchar(80) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_telefono` int(12) NOT NULL,
  `usuario_correo` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_pass` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_ciudad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_direccion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_nombre`, `usuario_apellido`, `usuario_telefono`, `usuario_correo`, `usuario_pass`, `usuario_ciudad`, `usuario_direccion`, `usuario_rol_id`) VALUES
(1, 'Mario', 'Ubilla', 993899824, 'ubilla@hotmail.com', '12345', 'Manta', 'Manta', 1),
(2, 'Brando', 'Cepeda', 954681454, 'cepeda@hotmail.com', '12345', 'Manta', 'Manta', 1),
(3, 'Jose', 'Alvia', 956478512, 'alvia@hotmail.com', '12345', 'Manta', 'Manta', 1),
(4, 'Luis', 'Mendez', 945123645, 'mendez@hotmail.com', '12345', 'Manta', 'Manta', 1),
(5, 'Jose', 'Cedeño', 931457894, 'cedeño@hotmail.com', '12345', 'Manta', 'Manta', 1),
(6, 'Luis', 'Carreño', 954621485, 'carreño@hotmail.com', '12345', 'Manta', 'km 4 1/2 Via Manta-Montecristi', 2),
(7, 'Julian', 'Martinez', 942365741, 'martinez@hotmail.com', '12345', 'Manta', 'Manta', 2),
(8, 'david', 'reyes', 956412358, 'reyes@hotmail.com', '12345', 'Manta', 'Calle 13', 2),
(9, 'Cristian', 'David', 945632147, 'david@hotmail.com', '12345', 'Manta', 'Calle 13', 2),
(10, 'Elena', 'Ubilla', 945632147, 'elena@hotmail.com', '12345', 'Manta', 'Calle 131', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`detalle_id`),
  ADD KEY `detalle_poducto` (`detalle_producto_id`),
  ADD KEY `detalle_factura` (`detalle_factura_id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`factura_id`),
  ADD KEY `factura_usuario` (`factura_cliente_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `producto_cat` (`producto_categoria_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `usuario_rol` (`usuario_rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  MODIFY `detalle_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `factura_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD CONSTRAINT `detalle_factura` FOREIGN KEY (`detalle_factura_id`) REFERENCES `factura` (`factura_id`),
  ADD CONSTRAINT `detalle_poducto` FOREIGN KEY (`detalle_producto_id`) REFERENCES `producto` (`producto_id`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `factura_usuario` FOREIGN KEY (`factura_cliente_id`) REFERENCES `usuario` (`usuario_id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_cat` FOREIGN KEY (`producto_categoria_id`) REFERENCES `categoria` (`categoria_id`),
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`producto_categoria_id`) REFERENCES `categoria` (`categoria_id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_rol` FOREIGN KEY (`usuario_rol_id`) REFERENCES `rol` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
