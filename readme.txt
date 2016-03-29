test: push

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
    password VARCHAR(250),
    role varchar(20),
    created DATETIME DEFAULT NULL,
    modified DATETIME DEFAULT NULL
);

CREATE TABLE templates (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(250),
    image VARCHAR(250)
);

CREATE TABLE addtemplates (
    id INT PRIMARY KEY,
    name VARCHAR(250)
);

INSERT INTO addtemplates VALUES ( 0,  'blue');
INSERT INTO addbanners VALUES ( 0,  'mountains.jpg');
INSERT INTO templates VALUES ( 1,  'blue',  'blue.png' );
INSERT INTO templates VALUES ( 2,  'magenta',  'magenta.png' );
INSERT INTO templates VALUES ( 3,  'green',  'green.png' );
INSERT INTO templates VALUES ( 4,  'sommer',  'sommer.png' );

Sollte man per Hand den Tabelleinhalt von starts,footers löschen muss beim neuen Anlegen darauf geachtet werden das die id den Wert 1 besitzt.
Bei der Tabelle addbanners muss eine 0 stehen.

Einen User (role: Admin ) "per Hand" anlegen bzw. über /user/add.