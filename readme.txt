Datenbank:

CREATE TABLE contents (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250),
    body mediumtext
);

CREATE TABLE banners (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(250)
);

CREATE TABLE addbanners (
    id INT PRIMARY KEY,
    filename VARCHAR(250)
);

CREATE TABLE footers (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    body mediumtext
);

CREATE TABLE starts (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    body mediumtext
);

CREATE TABLE homes (
    id INT PRIMARY KEY
);

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(250),
    passwort VARCHAR(250),
    role varchar(20)
);