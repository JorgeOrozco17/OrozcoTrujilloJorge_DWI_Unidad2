-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2025 a las 19:07:20
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
-- Base de datos: `cursos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `id_sesion` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `remitente` varchar(500) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chat`
--

INSERT INTO `chat` (`id`, `id_personal`, `id_sesion`, `mensaje`, `remitente`, `fecha`) VALUES
(1, 3, 7, 'Hola', NULL, '2025-07-03 05:04:19'),
(2, 3, 7, 'hola en que te puedo ayudar', NULL, '2025-07-03 05:14:56'),
(3, 1, 8, 'hola', NULL, '2025-07-03 05:15:51'),
(4, 3, 8, 'hola en que te puedo ayudar', NULL, '2025-07-03 05:16:24'),
(5, 1, 8, 'hola', 'usuario', '2025-07-03 05:21:25'),
(6, 3, 9, 'no jala pai', 'usuario', '2025-07-04 00:49:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id`, `nombre`, `telefono`, `email`, `mensaje`, `fecha`) VALUES
(1, 'Jose', '82262542', 'hashs@nmsj.com', 'Holiii', '2025-07-01 18:35:48'),
(2, 'Jose', '82262542', 'hashs@nmsj.com', 'Holiii', '2025-07-01 18:35:48'),
(3, 'Jorge Orozco', '8442869617', 'Jorgeorozcox1@gmail.com', 'Holas', '2025-07-01 20:51:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_docente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nombre`, `descripcion`, `imagen`, `fecha_creacion`, `id_docente`) VALUES
(1, 'Principios de programación', 'Aprende los fundamentos esenciales de la programación desde cero. Descubre cómo funcionan los algoritmos, la lógica de programación y las bases que te permitirán aprender cualquier lenguaje y resolver problemas como un profesional.', 'programacion.WEBP', '2025-07-01 00:01:27', 0),
(2, 'Arquitectura de software', 'Entiende cómo se construyen y organizan aplicaciones complejas. Aprende sobre patrones de diseño, buenas prácticas y toma de decisiones para crear sistemas robustos, escalables y fáciles de mantener.', 'arquitectura.WEBP', '2025-07-01 00:01:27', 0),
(3, 'HTML y CSS', 'Domina la creación de páginas web modernas y atractivas. Aprende a estructurar contenido con HTML y a darle estilo profesional con CSS, incluyendo diseño responsivo para dispositivos móviles.', 'html_css.WEBP', '2025-07-01 00:01:27', 0),
(4, 'Estructuras de datos', 'Descubre cómo almacenar y gestionar datos de manera eficiente. Explora listas, pilas, colas, árboles, grafos y otras estructuras clave que optimizan el rendimiento de tus programas y algoritmos.', 'estructuras_datos.WEBP', '2025-07-01 00:01:27', 0),
(5, 'PHP', 'Adéntrate en el desarrollo backend con PHP. Aprende a crear sitios web dinámicos, manejar bases de datos, gestionar sesiones y desarrollar aplicaciones seguras y potentes para la web.', 'php.WEBP', '2025-07-01 00:01:27', 0),
(6, 'JavaScript', 'Llévate el poder de la interactividad al navegador. Aprende a programar con JavaScript para crear sitios web dinámicos, manejar eventos, consumir APIs y mejorar la experiencia del usuario.', 'javascript.WEBP', '2025-07-01 00:01:27', 0),
(7, 'Bases de datos SQL', 'Aprende a manejar bases de datos relacionales utilizando SQL. Aprende a crear, consultar, actualizar y eliminar datos en tablas, y cómo optimizar tus consultas para un rendimiento eficiente.', 'sql.WEBP', '2025-07-01 00:01:27', 0),
(8, 'Python para principiantes', 'Descubre el poder de Python, un lenguaje versátil y fácil de aprender. Aprende a trabajar con variables, estructuras de datos, funciones y mucho más.', 'python.WEBP', '2025-07-01 00:01:27', 0),
(9, 'Desarrollo web con React', 'Aprende a construir interfaces de usuario dinámicas y modernas con React, uno de los frameworks más populares para el desarrollo web.', 'react.WEBP', '2025-07-01 00:01:27', 0),
(10, 'Introducción al machine learning', 'Inicia tu camino en el aprendizaje automático con Python. Aprende a trabajar con modelos predictivos, regresiones y análisis de datos.', 'machine_learning.WEBP', '2025-07-01 00:01:27', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `id` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soportes`
--

CREATE TABLE `soportes` (
  `id` int(11) NOT NULL,
  `id_personal` int(11) NOT NULL,
  `ticket_name` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `soportes`
--

INSERT INTO `soportes` (`id`, `id_personal`, `ticket_name`, `fecha`) VALUES
(1, 0, 'a', '2025-07-02 18:45:49'),
(2, 0, 'a', '2025-07-02 18:46:07'),
(3, 0, 'a', '2025-07-02 18:46:22'),
(4, 0, 'a', '2025-07-02 18:46:48'),
(5, 0, 'b', '2025-07-02 18:47:19'),
(6, 0, 'Prueba 1', '2025-07-02 18:54:07'),
(7, 3, 'No me funciona el chat', '2025-07-03 05:04:04'),
(8, 1, 'Prueba 12', '2025-07-03 05:15:45'),
(9, 3, 'No jala', '2025-07-04 00:49:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `codigo_recuperacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `tipo`, `codigo_recuperacion`) VALUES
(1, 'Jorge', 'jorgeorozcox3@gmail.com', '1111', 'estudiante', '97418'),
(2, 'Jose', 'jorgeorozcox1@gmail.com', '12345', 'estudiante', NULL),
(3, 'admin', 'admin@dwc.com', 'admon', 'admin', NULL),
(4, 'Karen', 'karen.rios@email.com', 'karen2024', 'docente', NULL),
(5, 'Mario', 'mario.salas@email.com', 'mario2024', 'estudiante', NULL),
(6, 'Liliana', 'liliana.lopez@email.com', 'lililo123', 'estudiante', NULL),
(7, 'Pablo', 'pablo.torres@email.com', 'pabtor45', 'docente', NULL),
(8, 'Angel', 'angel.vera@email.com', 'angelpass', 'estudiante', NULL),
(9, 'Cecilia', 'cecilia.garcia@email.com', 'ceci567', 'estudiante', NULL),
(10, 'David', 'david.sanchez@email.com', 'davsan789', 'docente', NULL),
(11, 'Fernanda', 'fernanda.ruiz@email.com', 'ferpass23', 'estudiante', NULL),
(12, 'Arturo', 'arturo.mendez@email.com', 'arturo99', 'estudiante', NULL),
(13, 'Veronica', 'veronica.baeza@email.com', 'vero321', 'docente', NULL),
(14, 'Luis', 'luis.flores@email.com', 'luisf22', 'estudiante', NULL),
(15, 'Ana', 'ana.vazquez@email.com', 'anita2024', 'estudiante', NULL),
(16, 'Gabriela', 'gabriela.ramirez@email.com', 'gabpass', 'docente', NULL),
(17, 'Hugo', 'hugo.castro@email.com', 'huguito', 'estudiante', NULL),
(18, 'Monica', 'monica.diaz@email.com', 'moni2024', 'estudiante', NULL),
(19, 'Victor', 'victor.lopez@email.com', 'victorpass', 'docente', NULL),
(20, 'Sonia', 'sonia.torres@email.com', 'soniapw', 'estudiante', NULL),
(21, 'Ricardo', 'ricardo.ramos@email.com', 'ricar123', 'estudiante', NULL),
(22, 'Beatriz', 'beatriz.nava@email.com', 'bety2024', 'docente', NULL),
(23, 'Ernesto', 'ernesto.mora@email.com', 'erni90', 'estudiante', NULL),
(24, 'Claudia', 'claudia.villa@email.com', 'claupass', 'estudiante', NULL),
(25, 'Raul', 'raul.zapata@email.com', 'raulito', 'docente', NULL),
(26, 'Isabel', 'isabel.guzman@email.com', 'isabelpw', 'estudiante', NULL),
(27, 'Julian', 'julian.cano@email.com', 'juli123', 'estudiante', NULL),
(28, 'Laura', 'laura.perez@email.com', 'laupass', 'docente', NULL),
(29, 'Carolina', 'carolina.soto@email.com', 'caro2024', 'estudiante', NULL),
(30, 'Felipe', 'felipe.luna@email.com', 'felipass', 'estudiante', NULL),
(31, 'sysadmin', 'sysadmin@email.com', 'root2024', 'admin', NULL),
(32, 'admin2', 'admin2@email.com', 'superpass', 'admin', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `soportes`
--
ALTER TABLE `soportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `soportes`
--
ALTER TABLE `soportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
