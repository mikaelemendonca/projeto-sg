
CREATE DATABASE sgcopex
    WITH ENCODING='UTF8' ;

\c sgcopex

DROP TABLE IF EXISTS pessoa;
CREATE TABLE pessoa (
  id_pessoa SERIAL PRIMARY KEY,
  nome TEXT NOT NULL,
  cpf TEXT NOT NULL,
  rg TEXT NOT NULL,
  endereco TEXT NULL,
  bairro TEXT NULL,
  cep TEXT NULL,
  cidade TEXT NULL,
  estado CHAR(2) NULL,
  celular TEXT NOT NULL,
  email TEXT NOT NULL,
  login TEXT NOT NULL,
  senha TEXT NOT NULL,
  perfil TEXT NOT NULL
);

DROP TABLE IF EXISTS discente;
CREATE TABLE discente (
    id_discente SERIAL PRIMARY KEY,
    id_pessoa INTEGER,
    matricula TEXT NOT NULL,
    campus TEXT NOT NULL,
    curso TEXT NOT NULL,
    cv_Lattes TEXT NOT NULL,
    FOREIGN KEY (id_pessoa) REFERENCES pessoa (id_pessoa)
);

DROP TABLE IF EXISTS docente;
CREATE TABLE docente (
    id_docente SERIAL PRIMARY KEY,
    id_pessoa INTEGER,
    matricula_siape TEXT NOT NULL,
    campus_setor TEXT NOT NULL,
    cargo TEXT NOT NULL,
    FOREIGN KEY (id_pessoa) REFERENCES pessoa (id_pessoa)
)

DROP TABLE IF EXISTS edital;
CREATE TABLE edital (
    id_edital SERIAL PRIMARY KEY,
    numero TEXT NOT NULL,
    nome_programa TEXT NOT NULL,
    tipo_proponente TEXT NOT NULL,
    bolsa_orientador CHAR(1) NOT NULL
)

DROP TABLE IF EXISTS projeto;
CREATE TABLE projeto (
    id_projeto SERIAL PRIMARY KEY,
    titulo TEXT NOT NULL,
    id_edital INTEGER NOT NULL,
    orientador INTEGER NOT NULL,
    co_orientador INTEGER NULL,
    bolsista INTEGER NULL,
    voluntario_i INTEGER NULL,
    voluntario_ii INTEGER NULL,
    resumo TEXT NULL,
    area_pesquisa INTEGER NULL,
    sub_area INTEGER NULL,
    cronograma_exec TEXT NULL,
    publicacoes TEXT NULL,
    info_add TEXT NULL,
    resultados TEXT NULL,
    entrega_relatorio CHARACTER(1) NULL,
    status CHARACTER(1) NULL,
    FOREIGN KEY (id_edital) REFERENCES edital (id_edital),
    FOREIGN KEY (orientador) REFERENCES docente (id_docente)
);
