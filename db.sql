CREATE DATABASE university_ecommerce;

USE university_ecommerce;

CREATE TABLE Customers (
   id BIGINT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(100) NOT NULL,
   email VARCHAR(40) NOT NULL UNIQUE,
   password VARCHAR(30) NOT NULL,
   address VARCHAR(200),
   phone_number VARCHAR(12),
   profile_picture VARCHAR(255)
);

CREATE TABLE Categories (
   id BIGINT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(70) NOT NULL,
    description VARCHAR(400),
   creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Products (
   id BIGINT AUTO_INCREMENT PRIMARY KEY,
   name VARCHAR(255) NOT NULL,
   description TEXT,
   price DECIMAL(10, 2) NOT NULL,
   stock_quantity INT NOT NULL,
   category_id BIGINT,
   FOREIGN KEY (category_id) REFERENCES Categories(id)
);

CREATE TABLE Orders (
   id BIGINT AUTO_INCREMENT PRIMARY KEY,
   customer_id BIGINT,
   order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   status ENUM('pending', 'processing', 'shipped', 'delivered', 'cancelled') DEFAULT 'pending',
   FOREIGN KEY (customer_id) REFERENCES Customers(id)
);

CREATE TABLE OrderItems (
   id BIGINT AUTO_INCREMENT PRIMARY KEY,
   order_id BIGINT,
   product_id BIGINT,
   quantity INT NOT NULL,
   price DECIMAL(10, 2) NOT NULL,
   FOREIGN KEY (order_id) REFERENCES Orders(id),
   FOREIGN KEY (product_id) REFERENCES Products(id)
);

CREATE TABLE Reviews (
   id BIGINT AUTO_INCREMENT PRIMARY KEY,
   product_id BIGINT,
   customer_id BIGINT,
   rating INT NOT NULL,
   comment TEXT,
   review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
   FOREIGN KEY (product_id) REFERENCES Products(id),
   FOREIGN KEY (customer_id) REFERENCES Customers(id)
);

CREATE TABLE ShoppingCart (
   id BIGINT AUTO_INCREMENT PRIMARY KEY,
   customer_id BIGINT,
   product_id BIGINT,
   quantity INT NOT NULL,
   FOREIGN KEY (customer_id) REFERENCES Customers(id),
   FOREIGN KEY (product_id) REFERENCES Products(id)
); 