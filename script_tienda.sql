CREATE SCHEMA tienda_bd;
USE tienda_bd;

CREATE TABLE categorias (
	categoria VARCHAR(30) PRIMARY KEY,
    descripcion VARCHAR(255)
);

CREATE TABLE productos (
	id_producto INT PRIMARY KEY AUTO_INCREMENT,
    nombre VARCHAR(50) UNIQUE,
    precio NUMERIC(6,2),
    categoria VARCHAR(30),
    stock INT(3),
    FOREIGN KEY (nombre_estudio) REFERENCES estudios(nombre_estudio)
);
