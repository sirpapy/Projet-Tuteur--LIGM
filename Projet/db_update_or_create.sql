
CREATE DATABASE IF NOT EXISTS ligm;

CREATE TABLE IF NOT EXISTS langue(
   langue_id INT NOT NULL AUTO_INCREMENT,
   langue_name VARCHAR(100) NOT NULL,
   PRIMARY KEY ( langue_id )
);

CREATE TABLE IF NOT EXISTS version(
   version_id INT NOT NULL AUTO_INCREMENT,
   PRIMARY KEY ( version_id )
);

CREATE TABLE IF NOT EXISTS category_type(
   cat_id VARCHAR(100) NOT NULL,
   PRIMARY KEY ( category_type_id )
);

CREATE TABLE IF NOT EXISTS category(
   cat_id VARCHAR(100) NOT NULL,
   PRIMARY KEY ( category_id )
);

CREATE TABLE IF NOT EXISTS format(
   format_id VARCHAR(100) NOT NULL,
   PRIMARY KEY ( format_id )
);

CREATE TABLE IF NOT EXISTS codage(
   codage_id VARCHAR(100) NOT NULL,
   PRIMARY KEY ( codage_id )
);

CREATE TABLE IF NOT EXISTS tables(
   tables_id VARCHAR(100) NOT NULL,
   PRIMARY KEY ( tables_id )
);
