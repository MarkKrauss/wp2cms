Datenbank:

CREATE TABLE contents (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(250),
    user_id int(4)
);

CREATE TABLE users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(250),
    passwort VARCHAR(250),
    role varchar(20)
);