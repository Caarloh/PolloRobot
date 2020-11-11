--
-- Database: `PolloRobot`
--
-- La base de datos se debe llamar PolloRobot.
-- Se debe crear la base de datos con el nombre escrito mas arriba y debe ser utf8_general_ci
-- Luego seleccionar la parte donde dice Importar y seleccionar el archivo.
-- Listo, Base de datos subida.

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Table structure for table `Empleado`
--

CREATE TABLE `Empleado` (
  `usuario` varchar(200) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `apellidos` varchar(300) NOT NULL,
  `correo` varchar(300) NOT NULL,
  `cargo` varchar(200) NOT NULL,
  `contrasena` varchar(300) NOT NULL,
  `perfilGit` varchar(500) NOT NULL,
  `tipoEmpleado` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `InvitacionProyecto`
--

CREATE TABLE `InvitacionProyecto` (
  `id` int(11) NOT NULL,
  `refProyecto` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `link` varchar(1000) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Nota`
--

CREATE TABLE `Nota` (
  `id` int(11) NOT NULL,
  `usuario` varchar(200) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `refTarea` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Proyecto`
--

CREATE TABLE `Proyecto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `repositorioGit` varchar(1000) NOT NULL,
  `jefeProyecto` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `RelacionProyectoMiembro`
--

CREATE TABLE `RelacionProyectoMiembro` (
  `refProyecto` int(11) NOT NULL,
  `refUsuario` varchar(200) NOT NULL,
  `rol` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `Tarea`
--

CREATE TABLE `Tarea` (
  `nombre` varchar(500) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `prioridad` varchar(50) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `fechaLimite` varchar(50) NOT NULL,
  `refProyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Empleado`
--
ALTER TABLE `Empleado`
  ADD PRIMARY KEY (`usuario`);

--
-- Indexes for table `InvitacionProyecto`
--
ALTER TABLE `InvitacionProyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKInvitecionProyecto` (`refProyecto`);

--
-- Indexes for table `Nota`
--
ALTER TABLE `Nota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKRelacionMiebroNota` (`usuario`),
  ADD KEY `FKRelacionTareaNota` (`refTarea`);

--
-- Indexes for table `Proyecto`
--
ALTER TABLE `Proyecto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FKJefeProyectoUsuario` (`jefeProyecto`);

--
-- Indexes for table `RelacionProyectoMiembro`
--
ALTER TABLE `RelacionProyectoMiembro`
  ADD KEY `FKRelacionProyecto` (`refProyecto`),
  ADD KEY `FKRelacionUsuario` (`refUsuario`);

--
-- Indexes for table `Tarea`
--
ALTER TABLE `Tarea`  
  ADD PRIMARY KEY (`nombre`),
  ADD KEY `FKRelacionProyectoTarea` (`refProyecto`);
	

--
-- Constraints for dumped tables
--

--
-- Constraints for table `InvitacionProyecto`
--
ALTER TABLE `InvitacionProyecto`
  ADD CONSTRAINT `FKInvitecionProyecto` FOREIGN KEY (`refProyecto`) REFERENCES `Proyecto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Nota`
--
ALTER TABLE `Nota`
  ADD CONSTRAINT `FKRelacionMiebroNota` FOREIGN KEY (`usuario`) REFERENCES `Empleado` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKRelacionTareaNota` FOREIGN KEY (`refTarea`) REFERENCES `Tarea` (`nombre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Proyecto`
--
ALTER TABLE `Proyecto`
  ADD CONSTRAINT `FKJefeProyectoUsuario` FOREIGN KEY (`jefeProyecto`) REFERENCES `Empleado` (`usuario`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `RelacionProyectoMiembro`
--
ALTER TABLE `RelacionProyectoMiembro`
  ADD CONSTRAINT `FKRelacionProyecto` FOREIGN KEY (`refProyecto`) REFERENCES `Proyecto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FKRelacionUsuario` FOREIGN KEY (`refUsuario`) REFERENCES `Empleado` (`usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Tarea`
--
ALTER TABLE `Tarea`  
  ADD CONSTRAINT `FKRelacionProyectoTarea` FOREIGN KEY (`refProyecto`) REFERENCES `Proyecto` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;