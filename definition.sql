DROP DATABASE IF EXISTS routedb;
CREATE DATABASE routedb;

CREATE TABLE routedb.comment (
	id INT PRIMARY KEY AUTO_INCREMENT,
    route VARCHAR(100),
    bewertung TEXT,
    userId int
);

CREATE TABLE routedb.user (
    id int PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(64),
    password VARCHAR(64)
);
