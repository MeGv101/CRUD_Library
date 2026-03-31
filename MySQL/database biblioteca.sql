create database IF NOT EXISTS biblioteca;
use biblioteca;
CREATE USER 'bibliotecario'@'localhost' IDENTIFIED BY 'megustanloslibros';
GRANT ALL PRIVILEGES ON biblioteca.* TO 'bibliotecario'@'localhost';
FLUSH PRIVILEGES;
CREATE TABLE IF NOT EXISTS cuenta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);
CREATE TABLE IF NOT EXISTS libro (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100),
    autor VARCHAR(100),
    fecha DATE,
    genero VARCHAR(50)
);