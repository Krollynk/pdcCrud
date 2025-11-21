create database pdcdb;

use pdcDb;

create table pdc_pais(
	pdc_pai_id int primary key auto_increment,
    pdc_pai_pais varchar(50) not null,
    pdc_pai_siglas varchar(20) not null,
    pdc_pai_eliminado int not null,
    pdc_pai_fecha_creado datetime not null
);

create table pdc_departamentos(
	pdc_dep_id int primary key auto_increment,
    pdc_dep_departamento varchar(255) not null,
    pdc_pai_id int,
    pdc_dep_eliminado int not null,
    pdc_dep_fecha_creado datetime not null,
    
    
    CONSTRAINT departamentos_pais_FK
    FOREIGN KEY (pdc_pai_id) REFERENCES pdcdb.pdc_pais(pdc_pai_id)
);

create table pdc_municipios(
	pdc_mun_id int primary key auto_increment,
    pdc_mun_municipio varchar(255) not null,
    pdc_dep_id int,
    pdc_dep_eliminado int not null,
    pdc_dep_fecha_creado datetime not null,
    
    CONSTRAINT municipio_departamento_FK
    FOREIGN KEY (pdc_dep_id) REFERENCES pdcdb.pdc_departamentos(pdc_dep_id)
);

create table pdc_empresas(
	pdc_emp_id int primary key auto_increment,
    pdc_emp_nombre_comercial varchar(100) not null,
    pdc_emp_razon_social varchar(100) not null,
    pdc_emp_nit varchar(40),
    pdc_emp_telefono varchar(40),
    pdc_emp_correo varchar(50),
    pdc_pai_id int,
    pdc_dep_id int,
    pdc_mun_id int,
    pdc_emp_eliminado int not null,
    pdc_emp_fecha_creado datetime not null,
    
    CONSTRAINT empresa_pais_FK
    FOREIGN KEY (pdc_pai_id) REFERENCES pdcdb.pdc_pais(pdc_pai_id),
    CONSTRAINT empresa_departamento_FK
    FOREIGN KEY (pdc_dep_id) REFERENCES pdcdb.pdc_departamentos(pdc_dep_id),
    CONSTRAINT empresa_municipio_FK
    FOREIGN KEY (pdc_mun_id) REFERENCES pdcdb.pdc_municipios(pdc_mun_id)
);

create table pdc_colaboradores(
	pdc_col_id int primary key auto_increment,
    pdc_col_nombre varchar(255) not null,
    pdc_col_apellido varchar(255) not null,
    pdc_col_edad varchar(10),
    pdc_col_telefono varchar(40),
    pdc_col_correo varchar(50),
    pdc_col_eliminado int not null,
    pdc_col_fecha_creado datetime not null
);

create table empresa_colaborador(
	pdc_emp_id int,
    pdc_col_id int,
    
    PRIMARY KEY (pdc_emp_id, pdc_col_id),
    
    CONSTRAINT empresa_colaborador_empresa_FK
    FOREIGN KEY (pdc_emp_id) REFERENCES pdcdb.pdc_empresas(pdc_emp_id),
    
    CONSTRAINT empresa_colaborador_colaborador_FK
    FOREIGN KEY (pdc_col_id) REFERENCES pdcdb.pdc_colaboradores(pdc_col_id)
);










