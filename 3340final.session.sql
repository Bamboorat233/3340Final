
--@block
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    role ENUM('user', 'admin') DEFAULT 'user',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    image VARCHAR(255), -- 图片URL
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE cart_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL DEFAULT 1,
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    
    UNIQUE KEY unique_cart (user_id, product_id)
);

CREATE TABLE receipts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    issued_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    total_paid DECIMAL(10,2) NOT NULL,
    items TEXT NOT NULL,  -- JSON 格式存储商品信息快照
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

--@block
INSERT INTO products (name, description, price, image) VALUES
  ('Fiio FT1 Pro',
   '95*86mm planar magnetic, open-back design, with interchangeable 3.5mm & 4.4mm cables.',
   219.99,
   'images/FT1-Pro.png'),
  ('Hifiman Arya Unveiled',
   'New non-grid open-back design, flagship SUSVARA-level sound.',
   1449.00,
   'images/arya-u.jpg'),
  ('Sennheiser HD 660S2',
   '300 Ω impedance, high-resolution soundstage, deep bass.',
   499.95,
   'images/660s2.webp'),
  ('Final E5000',
   '6.4 mm dynamic driver with ceramic chamber, stainless steel shell, detachable MMCX cable.',
   278.00,
   'images/final-e5000.jpg'),
  ('THIEAUDIO Origin',
   '1DD+4BA+2EST+1BC quad-driver, 20Hz-44kHz response, 102 dB sensitivity.',
   849.00,
   'images/thieaudio-origin.png'),
  ('UM Melody',
   'Hybrid driver design for rich detail and clarity.',
   1260.00,
   'images/Um-melody.webp');

