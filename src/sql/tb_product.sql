CREATE TABLE IF NOT EXISTS product (
    id BIGINT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    price DECIMAL(6, 2) NOT NULL,
    description TEXT NOT NULL
);