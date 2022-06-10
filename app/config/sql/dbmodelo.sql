CREATE TABLE tb_servidor (
  id int NOT NULL AUTO_INCREMENT,
  matricula varchar(10) NOT NULL UNIQUE,
  nome varchar(60) NOT NULL,
  situacao char(1) NOT NULL DEFAULT 'A',
  data_admissao date NOT NULL,
  data_criacao timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  cargo int NOT NULL,
  PRIMARY KEY(id)
);

CREATE TABLE tb_cargo (
  id int NOT NULL AUTO_INCREMENT,
  cargo varchar(45) NOT NULL,
  PRIMARY KEY(id)
);

INSERT INTO tb_cargo(cargo) VALUE('Professor');
INSERT INTO tb_cargo(cargo) VALUE('Orientador Educacional'); 
INSERT INTO tb_cargo(cargo) VALUE('Secretário');
INSERT INTO tb_cargo(cargo) VALUE('Administrativo');
INSERT INTO tb_cargo(cargo) VALUE('Auxiliar');

CREATE TABLE tb_abono (
  id int NOT NULL AUTO_INCREMENT,
  data_inicial date NOT NULL,
  data_final date NOT NULL,
  descricao varchar(100) DEFAULT NULL,
  tipo_abono int NOT NULL,
  servidor int NOT NULL,
  PRIMARY KEY (id)
);


CREATE TABLE tb_tipo_abono (
  id int NOT NULL AUTO_INCREMENT,
  tipo varchar(45) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO tb_tipo_abono(tipo) VALUE('TRE');
INSERT INTO tb_tipo_abono(tipo) VALUE('Abono');
INSERT INTO tb_tipo_abono(tipo) VALUE('Atestado Médico');


ALTER TABLE tb_servidor
  ADD CONSTRAINT fk_servidor_cargo FOREIGN KEY (cargo) REFERENCES tb_cargo (id) ON DELETE RESTRICT ON UPDATE RESTRICT;

ALTER TABLE tb_abono
  ADD CONSTRAINT fk_abono_servidor FOREIGN KEY (servidor) REFERENCES tb_servidor (id) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT fk_abono_tipo_abono FOREIGN KEY (tipo_abono) REFERENCES tb_tipo_abono (id) ON DELETE RESTRICT ON UPDATE RESTRICT;

-- Carga de exemplo SERVIDOR
INSERT INTO tb_servidor (matricula,nome,situacao,data_admissao,cargo)
VALUES ('2237865', 'Sávio Chaves Cardoso da Silva', 'A', '2022-05-02', '1');


