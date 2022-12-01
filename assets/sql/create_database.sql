CREATE DATABASE biblioteca;

USE biblioteca;

CREATE TABLE generos(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE livros(
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    id_generos INT NOT NULL,
    FOREIGN KEY (id_generos) REFERENCES generos(id)
);
