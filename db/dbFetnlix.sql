CREATE DATABASE IF NOT EXISTS dbFetnlix;

USE dbFetnlix;


CREATE TABLE usuario(
	id INT(8) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    senha VARCHAR(30) NOT NULL UNIQUE,
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

-- Volume de dados: Usuário
INSERT INTO usuario(username, senha, email, ehAdm) VALUES('victorgirardi', 'vic123', 'victor@gmail.com', true);
INSERT INTO usuario(username, senha, email, ehAdm) VALUES('pedrosplugues', 'ped123', 'splugues@gmail.com', true);
INSERT INTO usuario(username, senha, email, ehAdm) VALUES('betobolg', 'beto123', 'roberto@gmail.com', false);
INSERT INTO usuario(username, senha, email, ehAdm) VALUES('pepevic', 'pepe123', 'pedro@gmail.com', false);

-- Volume de dados: Categoria
INSERT INTO categoria(nome) VALUES ('Terror');
INSERT INTO categoria(nome) VALUES ('Comédia');
INSERT INTO categoria(nome) VALUES ('Ação');
INSERT INTO categoria(nome) VALUES ('Esportes');
INSERT INTO categoria(nome) VALUES ('Música');
INSERT INTO categoria(nome) VALUES ('Documentários');
INSERT INTO categoria(nome) VALUES ('Trailer');

-- Volume de dados: Vídeos
INSERT INTO video(nome, link, visualizacoes, idCategoria) VALUES ('O Rappa - Pescador de Ilusões', 'https://www.youtube.com/watch?v=1kX9t-SZd38', 0, 5);
INSERT INTO video(nome, link, visualizacoes, idCategoria) VALUES ('Shake it Bololo', 'https://www.youtube.com/watch?v=oowBXzfcl90', 0, 5);
INSERT INTO video(nome, link, visualizacoes, idCategoria) VALUES ('O Universo em 4k', 'https://www.youtube.com/watch?v=O2IbCKQYPbc', 0, 6);
INSERT INTO video(nome, link, visualizacoes, idCategoria) VALUES ('O silêncio dos homens', 'https://www.youtube.com/watch?v=NRom49UVXCE', 0, 6);
INSERT INTO video(nome, link, visualizacoes, idCategoria) VALUES ('Dentão vs Cobrador no bilhar valendo 20k', 'https://www.youtube.com/watch?v=GiKbUxdo7Tw&t', 0, 4);
INSERT INTO video(nome, link, visualizacoes, idCategoria) VALUES ('Nerd Nerf Wars', 'https://www.youtube.com/watch?v=tk8bQpRHoNs', 0, 3);
INSERT INTO video(nome, link, visualizacoes, idCategoria) VALUES ('Truques impossíveis de fidget spinner', 'https://www.youtube.com/watch?v=jbr8ydMU5xM', 0, 3);
INSERT INTO video(nome, link, visualizacoes, idCategoria) VALUES ('10 horas de mendonça falando Lineuzinho', 'https://www.youtube.com/watch?v=ZBT2aMzx2ww', 0, 2);
INSERT INTO video(nome, link, visualizacoes, idCategoria) VALUES ('Lendo todas as palavras do dicionário', 'https://www.youtube.com/watch?v=25HAtbNyRIM', 0, 2);
INSERT INTO video(nome, link, visualizacoes, idCategoria) VALUES ('Eae galera', 'https://www.youtube.com/watch?v=M0zcdgekHds&list=PL8fzGD7OmQYyw2pFB8GkWDGGqJGRWanE9&index=3&t=0s', 0, 2);
INSERT INTO video(nome, link, visualizacoes, idCategoria) VALUES ('Ignorado por anjos desbafei com homens demônio', 'https://www.youtube.com/watch?v=m1Zps8ywnoo&list=PL8fzGD7OmQYyw2pFB8GkWDGGqJGRWanE9&index=8&t=0s', 0, 1);
INSERT INTO video(nome, link, visualizacoes, idCategoria) VALUES ('Lendas Urbanas - Standard Collection', 'https://www.youtube.com/watch?v=ltEYjoSvgdA', 0, 1);

-- Volume de dados: Assistir mais tarde
INSERT INTO assistirmaistarde(idUsuario, idVideo) VALUES (1, 1);
INSERT INTO assistirmaistarde(idUsuario, idVideo) VALUES (1, 8);
INSERT INTO assistirmaistarde(idUsuario, idVideo) VALUES (1, 11);
INSERT INTO assistirmaistarde(idUsuario, idVideo) VALUES (2, 5);
INSERT INTO assistirmaistarde(idUsuario, idVideo) VALUES (2, 6);
INSERT INTO assistirmaistarde(idUsuario, idVideo) VALUES (3, 12);
INSERT INTO assistirmaistarde(idUsuario, idVideo) VALUES (4, 2);
INSERT INTO assistirmaistarde(idUsuario, idVideo) VALUES (4, 8);
INSERT INTO assistirmaistarde(idUsuario, idVideo) VALUES (4, 9);

-- Volume de dados: Favoritos
INSERT INTO favorito(idUsuario, idVideo) VALUES (1, 8);
INSERT INTO favorito(idUsuario, idVideo) VALUES (1, 12);
INSERT INTO favorito(idUsuario, idVideo) VALUES (2, 8);
INSERT INTO favorito(idUsuario, idVideo) VALUES (3, 1);
INSERT INTO favorito(idUsuario, idVideo) VALUES (3, 2);
INSERT INTO favorito(idUsuario, idVideo) VALUES (3, 5);
INSERT INTO favorito(idUsuario, idVideo) VALUES (4, 3);
