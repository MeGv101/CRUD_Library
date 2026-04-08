create database IF NOT EXISTS biblioteca;
use biblioteca;
CREATE USER 'bibliotecario'@'localhost' IDENTIFIED BY 'megustanloslibros';
GRANT ALL PRIVILEGES ON biblioteca.* TO 'bibliotecario'@'localhost';
FLUSH PRIVILEGES;

CREATE TABLE IF NOT EXISTS libro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    autor VARCHAR(100),
    fecha DATE,
    genero VARCHAR(50)
);
CREATE TABLE IF NOT EXISTS rol (
    rol_id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20)
);
CREATE TABLE IF NOT EXISTS cuenta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    rol_id INT DEFAULT 1,
    foreign key (rol_id) references rol(rol_id)
);
insert into rol(nombre) values ("estudiante"),("bibliotecario"),("admin"); 
insert into cuenta(usuario, password, rol_id) values ("Administrador",SHA2('modoadmin123', 256),3);