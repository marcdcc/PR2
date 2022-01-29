CREATE DATABASE `2122_diazmarc`;
USE `2122_diazmarc`;

-----------------------------------------------------

--
-- Estructura de la tabla 'tbl_ubicacion'
--

CREATE TABLE `tbl_ubicacion` (
  `id_ubi` int NOT NULL AUTO_INCREMENT,
  `tipo_ubi` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_ubi`)
);

-----------------------------------------------------

--
-- Estructura de la tabla 'tbl_users'
--

CREATE TABLE `tbl_users` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nom_user` varchar(10) DEFAULT NULL,
  `apellido_user` varchar(20) DEFAULT NULL,
  `email_user` varchar(45) DEFAULT NULL,
  `password_user` varchar(20) DEFAULT NULL,
  `rol_user` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
);

-----------------------------------------------------

--
-- Estructura de la tabla 'tbl_mesa' 
--

CREATE TABLE `tbl_mesa` (
  `id_mesa` int NOT NULL AUTO_INCREMENT,
  `num_silla_dispo` varchar(2) DEFAULT NULL,
  `reservada` tinyint DEFAULT NULL,
  `id_ubi` int DEFAULT NULL,
  PRIMARY KEY (`id_mesa`),
  KEY `fk_ubi_mesa_idx` (`id_ubi`),
  CONSTRAINT `fk_ubi_mesa` FOREIGN KEY (`id_ubi`) REFERENCES `tbl_ubicacion` (`id_ubi`)
);

-----------------------------------------------------

--
-- Estructura de la tabla 'tbl_reserva' 
--

CREATE TABLE `tbl_reserva` (
  `id_reserva` int NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date DEFAULT NULL,
  `hora_reserva` time DEFAULT NULL,
  `nombre_cliente` varchar(20)  DEFAULT NULL,
  `num_personas` varchar(2) DEFAULT NULL,
  `id_mesa` int DEFAULT NULL,
  `estado_reserva` boolean DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `fk_mesa_reserva_idx` (`id_mesa`),
  CONSTRAINT `fk_mesa_reserva` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id_mesa`)
);
