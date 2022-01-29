SELECT DATABASE `2122_diazmarc`;

USE `2122_diazmarc`;

INSERT INTO `tbl_users` (`id_user`, `nom_user`, `apellido_user`, `email_user`, `password_user`, `rol_user`) VALUES
(1, 'Dani', 'Ruano', 'dani.ruano@gmail.com', 'dani.ruano', 'Camarero'),
(2, 'Miguel', 'Gras', 'miguel.gras@gmail.com', 'miguel.gras', 'Camarero'),
(3, 'Marc', 'Diaz', 'marc.diaz@gmail.com', 'marc.diaz', 'Camarero'),
(4, 'Alfredo', 'Blum', 'alfredo.blum@gmail.com', 'alfredo.blum', 'Camarero'),
(5, 'Pol', 'Garcia', 'pol.garcia@gmail.com', 'pol.garcia', 'Camarero'),
(6, 'Admin', 'Admin', 'admin@gmail.com', 'admin', 'Admin'),

INSERT INTO `tbl_ubicacion` (`id_ubi`, `tipo_ubi`) VALUES
(1,	'Sala Blanca'),
(2,	'Sala Roja'),
(3,	'Sala Azul'),
(4,	'Sala Verde');



INSERT INTO `tbl_reserva` (`id_reserva`, `fecha_inicio`, `hora_reserva`, `nombre_cliente`, `id_mesa`, `estado_reserva`) VALUES
(1,	2021-12-18,	24:00:00, 'Pol', 9,	1),
(2,	2021-12-18,	24:00:00, 'Marc', 17, 1),
(3,	2021-12-18,	24:00:00, 'Myke Towers', 25, 1),
(4,	2021-12-17,	16:00:00, 'J.Balvin', 1, 0),
(5,	2021-12-17,	08:00:00, 'Annuel', 3, 0),
(6,	2021-12-25,	14:00:00, 'Feo', 3,	0),
(7,	2021-12-30,	14:00:00, 'FEO', 1,	1),
(8,	2021-12-31,	08:00:00, 'Dani', 2, 1),
(9,	2021-12-28,	22:00:00, 'Miguel', 3, 0),
(10, 2022-01-13, 22:00:00, 'Gerard', 15, 1),
(11, 2022-01-01, 16:00:00, 'Rode', 12, 1),
(12, 2022-02-20, 10:00:00, 'CR7', 23, 1),
(13, 2022-01-20, 10:00:00, 'Messi', 32, 1),
(14, 2021-12-19, 08:00:00, 'Birguir', 22, 1),
(15, 2021-12-31, 22:00:00, 'Arnau', 2, 1),
(16, 2021-12-20, 10:00:00, 'Dani', 32, 0),
(17, 2021-12-30, 08:00:00, 'Skippy', 26, 1);

INSERT INTO `tbl_mesa` (`id_mesa`, `num_silla_dispo`, `reservada`, `id_ubi`) VALUES
(1, '4', 0, 1),
(2, '2', 0, 1),
(3, '6', 0, 1),
(4, '2', 0, 1),
(5, '2', 0, 1),
(6, '4', 0, 1),
(7, '8', 0, 1),
(8, '4', 0, 2),
(9, '4', 0, 2),
(10, '4', 1, 2);
(11, '4', 1, 2);
(12, '2', 1, 2);
(13, '6', 1, 2);
(14, '4', 1, 2);
(15, '2', 1, 2);
(16, '8', 1, 3);
(17, '2', 1, 3);
(18, '2', 1, 3);
(19, '6', 1, 3);
(20, '2', 1, 3);
(21, '6', 1, 3);
(22, '6', 1, 3);
(23, '6', 1, 3);
(24, '8', 1, 4);
(25, '4', 1, 4);
(26, '4', 1, 4);
(27, '4', 1, 4);
(28, '8', 1, 4);
(29, '4', 1, 4);
(30, '4', 1, 4);
(31, '6', 1, 4);
(32, '2', 1, 4);