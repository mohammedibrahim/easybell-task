CREATE TABLE special_products (
    autoincrement_id int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    id VARCHAR(255) NOT NULL,
    special_quantity VARCHAR(255) NOT NULL,
    special_price float not null,
    FOREIGN KEY (product_id) REFERENCES products(id)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;