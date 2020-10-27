
CREATE DATABASE sgcopex
    WITH ENCODING='UTF8' ;

\c sgcopex

DROP TABLE IF EXISTS area_pesquisa;
CREATE TABLE area_pesquisa (
    id_area SERIAL PRIMARY KEY,
    descricao TEXT NOT NULL,
);

DROP TABLE IF EXISTS subarea_pesquisa;
CREATE TABLE subarea_pesquisa (
    id_subarea SERIAL PRIMARY KEY,
    id_area INTEGER NOT NULL,
    descricao TEXT NOT NULL,
    FOREIGN KEY (id_area) REFERENCES area_pesquisa (id_area)
);

DROP TABLE IF EXISTS pessoa;
CREATE TABLE pessoa (
  id_pessoa SERIAL PRIMARY KEY,
  nome TEXT NOT NULL,
  cpf TEXT NOT NULL,
  rg TEXT NOT NULL,
  endereco TEXT NOT NULL,
  bairro TEXT NOT NULL,
  cep TEXT NOT NULL,
  cidade TEXT NOT NULL,
  estado CHAR(2) NULL,
  celular TEXT NOT NULL,
  email TEXT NOT NULL,
  login TEXT NOT NULL,
  senha TEXT NOT NULL,
  foto TEXT NOT NULL,
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
);

DROP TABLE IF EXISTS edital;
CREATE TABLE edital (
    id_edital SERIAL PRIMARY KEY,
    numero TEXT NOT NULL,
    nome_programa TEXT NOT NULL,
    tipo_proponente TEXT NOT NULL,
    bolsa_orientador CHAR(1) NOT NULL
);

DROP TABLE IF EXISTS projeto;
CREATE TABLE projeto (
    id_projeto SERIAL PRIMARY KEY,
    titulo TEXT NOT NULL,
    num_edital INTEGER NOT NULL,
    orientador INTEGER NOT NULL,
    co_orientador INTEGER NOT NULL,
    bolsista INTEGER NOT NULL,
    voluntario_i INTEGER NOT NULL,
    voluntario_ii INTEGER NOT NULL,
    resumo TEXT NOT NULL,
    area_pesquisa INTEGER NOT NULL,
    sub_area INTEGER NOT NULL,
    cronograma_exec TEXT NOT NULL,
    publicacoes TEXT NOT NULL,
    info_add TEXT NOT NULL,
    resultados TEXT NOT NULL,
    entrega_relatorio CHARACTER(1) NOT NULL,
    status CHARACTER(1) NOT NULL,
    FOREIGN KEY (num_edital) REFERENCES edital (id_edital),
    FOREIGN KEY (orientador) REFERENCES docente (id_docente),
    FOREIGN KEY (co_orientador) REFERENCES docente (id_docente),
    FOREIGN KEY (bolsista) REFERENCES discente (id_discente),
    FOREIGN KEY (voluntario_i) REFERENCES discente (id_discente),
    FOREIGN KEY (voluntario_ii) REFERENCES discente (id_discente)
);
