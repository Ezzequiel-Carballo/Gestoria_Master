
CREATE DATABASE IF NOT EXISTS Automotriz_clientes;

USE Automotriz_clientes;

CREATE TABLE IF NOT EXISTS usuarios(

id              int(255) auto_increment not null,
name            varchar(100) not null,
surname         varchar(100) not null,
email           varchar(100) not null,
empresa         varchar(100) not null,
message         text,
created_at      datetime,

CONSTRAINT pk_usuarios PRIMARY KEY (id)

)ENGINE = Inno_DB;