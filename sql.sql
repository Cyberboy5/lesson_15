

CREATE DATABASE lesson_15_db;


USE lesson_15_db;

CREATE TABLE products(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255),
    price INT DEFAULT 1,
    image TEXT,
    category_id INT 
);

CREATE TABLE categories(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255)
);


INSERT INTO products (name,price,image,category_id) VALUES ('TEMIR',12999,'alivali',1);

INSERT INTO categories (name) VALUES ('Tools'); 