CREATE DATABASE espacos_compartilhados;
USE espacos_compartilhados;

CREATE TABLE espaco(
	id_espaco INT AUTO_INCREMENT PRIMARY KEY,
    nome_espaco VARCHAR(100) NOT NULL,
    tipo VARCHAR(50) NOT NULL,
    capacidade INT NOT NULL,
    descricao TEXT
);
SELECT * FROM espaco;

CREATE TABLE usuario(
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    telefone CHAR(20),
    cpf CHAR(11) NOT NULL
);
SELECT * FROM usuario;

CREATE TABLE reserva(
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT NOT NULL,
    espaco_id INT NOT NULL,
    data_reserva DATE NOT NULL,
    hora_inicio TIME NOT NULL,
    hora_fim TIME NOT NULL,
    FOREIGN KEY (usuario_id) REFERENCES usuario(id_usuario),
    FOREIGN KEY (espaco_id) REFERENCES espaco(id_espaco)
);
SELECT * FROM reserva;