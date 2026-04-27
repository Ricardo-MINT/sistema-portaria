CREATE DATABASE IF NOT EXISTS conddb
  DEFAULT CHARACTER SET utf8mb4
  DEFAULT COLLATE utf8mb4_unicode_ci;

USE conddb;

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS visitantes;
DROP TABLE IF EXISTS funcionarioseprestadores;
DROP TABLE IF EXISTS moradores;
DROP TABLE IF EXISTS controladoresdeacesso;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE controladoresdeacesso (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    usuario VARCHAR(50) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);

CREATE TABLE moradores (
    cpf_mor VARCHAR(14) PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(120),
    veiculo VARCHAR(80),
    placaVeiculo VARCHAR(20),
    endereco VARCHAR(150),
    compEndereco VARCHAR(100),
    vagaGaragem VARCHAR(20),
    foto VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE visitantes (
    cpf_vis VARCHAR(14) PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(120),
    veiculo VARCHAR(80),
    placaVeiculo VARCHAR(20),
    situacao VARCHAR(30),
    cpf_mor VARCHAR(14),
    foto VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_visitante_morador
        FOREIGN KEY (cpf_mor)
        REFERENCES moradores(cpf_mor)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);

CREATE TABLE funcionarioseprestadores (
    cpf_fEP VARCHAR(14) PRIMARY KEY,
    nome VARCHAR(120) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(120),
    veiculo VARCHAR(80),
    placaVeiculo VARCHAR(20),
    empresa VARCHAR(120),
    cnpjEmpresa VARCHAR(20),
    telEmpresa VARCHAR(20),
    emailEmp VARCHAR(120),
    ocupacao VARCHAR(100),
    foto VARCHAR(255),
    criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO controladoresdeacesso (nome, usuario, senha)
VALUES ('Administrador', 'admin', 'admin');
