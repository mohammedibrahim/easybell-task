CREATE TABLE products (
                           product_id VARCHAR(255) PRIMARY KEY,
                           name VARCHAR(255) NOT NULL,
                           price float not null
                           product_type VARCHAR(255) not null
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;