-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2017-10-01 13:34:39.748

CREATE DATABASE conect_ideias;

-- tables
-- Table: notificacoes
CREATE TABLE notificacoes (
    id int(11) NOT NULL AUTO_INCREMENT,
    id_usuario int(11) NOT NULL,
    id_projeto int(11) NOT NULL,
    tipo varchar(15) NOT NULL,
    CONSTRAINT notificacoes_pk PRIMARY KEY (id)
) ENGINE InnoDB CHARACTER SET latin1;

-- Table: projetos
CREATE TABLE projetos (
    id int(11) NOT NULL AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    descricao text NOT NULL,
    proximos_passos text NOT NULL,
    estado tinyint(1) NOT NULL,
    criado_em varchar(50) NOT NULL,
    palavras_chave varchar(500) NOT NULL,
    id_dono int(11) NOT NULL,
    tipo_ajuda varchar(50) NOT NULL,
    CONSTRAINT projetos_pk PRIMARY KEY (id)
) ENGINE InnoDB CHARACTER SET latin1;

CREATE INDEX id_dono ON projetos (id_dono);

-- Table: solicitacoes
CREATE TABLE solicitacoes (
    id int(11) NOT NULL AUTO_INCREMENT,
    id_usuario int(11) NOT NULL,
    id_projeto int(11) NOT NULL,
    tipo_ajuda varchar(25) NOT NULL,
    CONSTRAINT solicitacoes_pk PRIMARY KEY (id)
) ENGINE InnoDB CHARACTER SET latin1;

-- Table: usuarios
CREATE TABLE usuarios (
    id int(11) NOT NULL AUTO_INCREMENT,
    nome varchar(100) NOT NULL,
    senha varchar(150) NOT NULL,
    email varchar(100) NOT NULL,
    descricao text NOT NULL,
    avatar varchar(300) NOT NULL,
    telefone varchar(15) NOT NULL,
    CONSTRAINT usuarios_pk PRIMARY KEY (id)
) ENGINE InnoDB CHARACTER SET latin1;

-- Table: usuarios_projetos
CREATE TABLE usuarios_projetos (
    id int(11) NOT NULL AUTO_INCREMENT,
    id_usuario int(11) NOT NULL,
    id_projeto int(11) NOT NULL,
    tipo_ajuda varchar(25) NOT NULL,
    CONSTRAINT usuarios_projetos_pk PRIMARY KEY (id)
) ENGINE InnoDB CHARACTER SET latin1;

-- foreign keys
-- Reference: id_dono (table: projetos)
ALTER TABLE projetos ADD CONSTRAINT id_dono FOREIGN KEY id_dono (id_dono)
    REFERENCES usuarios (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Reference: notificacoes_ibfk_1 (table: notificacoes)
ALTER TABLE notificacoes ADD CONSTRAINT notificacoes_ibfk_1 FOREIGN KEY notificacoes_ibfk_1 (id_usuario)
    REFERENCES usuarios (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Reference: notificacoes_ibfk_2 (table: notificacoes)
ALTER TABLE notificacoes ADD CONSTRAINT notificacoes_ibfk_2 FOREIGN KEY notificacoes_ibfk_2 (id_projeto)
    REFERENCES projetos (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Reference: solicitacoes_ibfk_1 (table: solicitacoes)
ALTER TABLE solicitacoes ADD CONSTRAINT solicitacoes_ibfk_1 FOREIGN KEY solicitacoes_ibfk_1 (id_usuario)
    REFERENCES usuarios (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Reference: solicitacoes_ibfk_2 (table: solicitacoes)
ALTER TABLE solicitacoes ADD CONSTRAINT solicitacoes_ibfk_2 FOREIGN KEY solicitacoes_ibfk_2 (id_projeto)
    REFERENCES projetos (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Reference: usuarios_projetos_ibfk_1 (table: usuarios_projetos)
ALTER TABLE usuarios_projetos ADD CONSTRAINT usuarios_projetos_ibfk_1 FOREIGN KEY usuarios_projetos_ibfk_1 (id_usuario)
    REFERENCES usuarios (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- Reference: usuarios_projetos_ibfk_2 (table: usuarios_projetos)
ALTER TABLE usuarios_projetos ADD CONSTRAINT usuarios_projetos_ibfk_2 FOREIGN KEY usuarios_projetos_ibfk_2 (id_projeto)
    REFERENCES projetos (id)
    ON DELETE CASCADE
    ON UPDATE CASCADE;

-- End of file.
