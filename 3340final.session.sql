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

--@block
INSERT INTO products (name, description, price, image) VALUES
('MOONDROP Silver pill', 'Three-Layer Coaxial Braided Oil-Immersed Oxygen-Free Copper Silver-Plated Upgrade Cable', 780.44, 'images/MOONDROP Silver pill.png'),
('Moondrop Atami', 'Litz-Structure Single Crystal Copper + Special Silver Solder High-Quality Braided Upgrade Cable', 169.08, 'images/Moondrop Atami.png'),
('TWISTURA CHENXI', 'Headphone Upgrade Cable', 141.78, 'images/TWISTURA CHENXI.png'),
('Tripowin Aurora', 'HiFi Replacement Cable for Wired Earbuds', 78.03, 'images/Tripowin Aurora.png'),
('Kiwi Ears Terras', '4N OCC Audiophile Cable', 59.82, 'images/Kiwi Ears Terras.png');


--@block
INSERT INTO products (name, description, price, image) VALUES
('TRN BT1', '1DD+1BA Hybrid Driver TWS True Wireless Bluetooth 5.0 Earphones', 39.01, 'images/TRN BT1.png'),
('KINERA YH623', 'Kinera YH623 adopts the new driver and active noise-cancelling technology to achieve a HiFi class stereo sound.', 89.75, 'images/KINERA YH623.png'),
('Moondrop PILL', 'Built-in AI ENC High-quality Ear-clip Earbuds', 65.02, 'images/Moondrop PILL.png'),
('KZ Carol Pro', 'Wireless Earbuds, Six-Microphone Hybrid Noise Cancellation, LDAC High-Resolution Wireless Audio', 42.91, 'images/KZ Carol Pro.png'),
('Moondrop Pavane', '13.5mm Dynamic Driver Flagship Earbuds', 494.27, 'images/Moondrop Pavane.png');
