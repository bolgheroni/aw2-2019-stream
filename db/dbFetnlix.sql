CREATE DATABASE IF NOT EXISTS dbFetnlix;

USE dbFetnlix;


CREATE TABLE usuario(
	id INT(8) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(255) NOT NULL UNIQUE,
    ehAdm BOOL
);

CREATE TABLE categoria(
	id INT(8) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL
);

CREATE TABLE video(
	id INT(8) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    link VARCHAR(1024) NOT NULL,
    visualizacoes INT(8),
    idCategoria INT(8) NOT NULL,
    CONSTRAINT fkVideoCategoria FOREIGN KEY (idCategoria) REFERENCES categoria(id)
);

CREATE TABLE assistirmaistarde(
	id INT(8) AUTO_INCREMENT PRIMARY KEY,
    idVideo INT(8) NOT NULL,
    idUsuario INT(8) NOT NULL,
    CONSTRAINT fkAssistirtardeVideo FOREIGN KEY (idVideo) REFERENCES video(id),
    CONSTRAINT fkAssistirtardeUsuario FOREIGN KEY (idUsuario) REFERENCES usuario(id)
);

CREATE TABLE favorito(
	id INT(8) AUTO_INCREMENT PRIMARY KEY,
    idVideo INT(8) NOT NULL,
    idUsuario INT(8) NOT NULL,
    CONSTRAINT fkFavoritoVideo FOREIGN KEY (idVideo) REFERENCES video(id),
    CONSTRAINT fkFavoritoUsuario FOREIGN KEY (idUsuario) REFERENCES usuario(id)
);

