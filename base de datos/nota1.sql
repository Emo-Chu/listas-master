DROP DATABASE IF EXISTS nota1;

CREATE DATABASE nota1;
USE nota1;

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `ap_paterno` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `alumno` (`id_alumno`, `ap_paterno`) VALUES
(3, 'Navarro'),
(4, 'Casillas'),
(6, 'Gomez');



CREATE TABLE `t_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usu` varchar(100) NOT NULL,
  `password_usu` varchar(100) NOT NULL,
  `estado` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



INSERT INTO `t_usuario` (`id_usuario`, `nombre_usu`, `password_usu`, `estado`) VALUES
(1, 'alex', '123', b'0'),
(2, 'diego', '123', b'0'),
(3, 'roxana', '123', b'0');


ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`);


ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`id_usuario`);


ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;


ALTER TABLE `t_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;
