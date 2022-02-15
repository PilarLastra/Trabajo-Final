CREATE DATABASE URLdin;

USE URLdin;

CREATE TABLE company(
    id INT AUTO_INCREMENTE,
    cuil INT NOT NULL,
    legal_name VARCHAR(30) NOT NULL,
    address VARCHAR (20) NOT NULL,
    contact_number int  NOT NULL,
    email VARCHAR(30) NOT NULL,
    CONSTRAINT pk_company PRIMARY KEY (id)

) ENGINE = INNODB;