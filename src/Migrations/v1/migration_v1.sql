CREATE USER 'mgradek'@'localhost' IDENTIFIED BY 'mgradek12345#';
GRANT ALL PRIVILEGES ON *.* TO 'mgradek'@'localhost' WITH GRANT OPTION;

CREATE TABLE cafe.users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    address_id INT DEFAULT NULL,
    username VARCHAR(50) NOT NULL,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(100) NOT NULL,
    is_admin INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `users`(`username`, `password`, `email`, `is_admin`) VALUES ('mgradek','xxx','test@mgradek.pl', 1)
;

CREATE TABLE cafe.products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    short_name VARCHAR(16) NOT NULL,
    description VARCHAR(255) NOT NULL,
    cost DECIMAL(10, 2) DEFAULT 0,
    price DECIMAL(10, 2) NOT NULL,
    stock_quantity INT NOT NULL,
    manufacturer VARCHAR(100),
    url VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
;

INSERT INTO `products`(`product_name`, `short_name`, `description`, `price`, `stock_quantity`, `manufacturer`, `url`) 
    VALUES 
        ('Szarlotka','szarlo','Klasyczny jabłecznik  z półkruchego lub kruchego ciasta oraz spora warstwa przepysznych jabłek. ', 12, 50, 'własny', '/src/Assets/img/szarlotka.jpg'),
        ('Sernik','ser','Klasyczny sernik z lukrem oraz dekoracją.', 12, 40, 'własny', '/src/Assets/img/sernik.jpg'),
        ('Makowiec','mak','Makowy smak tradycji', 8, 20, 'własny', '/src/Assets/img/makowiec.jpg'),
        ('Murzynek','murzyn','Mocno czekoladowe ciasto z dużą ilością kakao i czekoladową polewą.', 8, 50, 'własny', '/src/Assets/img/murzynek.jpg'),
        ('Pączki','pacz','Jeśli kochasz pączki nie tylko w Tłusty Czwartek pokochasz ten produkt tak samo jak my.', 3, 100, 'własny', '/src/Assets/img/paczek.jpg'),
        ('Mufinki','mufin','Klasyczna waniliowa muffinka z delikatnego, puszystego ciasta.', 3, 100, 'własny', '/src/Assets/img/mufinka.jpg'),
        ('Pierniczki','piernik',' Te pyszne ciastka charakteryzuje się ciemną barwą, intensywnym korzennym zapachem i niepowtarzalnym smakiem.', 1, 100, 'własny', '/src/Assets/img/piernik.jpg'),
        ('Tartaletka','Pyszne, niewielkie bankietowe tartaletki o średnicy około 4 cm to połączenie kruchego ciasta z pysznymi owocami.','test 8', 4, 50, 'własny', '/src/Assets/img/tartaletki.jpg'),
        ('Cupcake','cupc','Lekka waniliowa babeczka z puszystym kolorowym kremem o wybranym smaku.', 3, 100, 'własny', '/src/Assets/img/cupcake.jpg'),
        ('Eklerki','ekler', 'Ciasto ptysiowe z bitą śmietaną w czekoladzie', 3, 75, 'własny', '/src/Assets/img/eklerki.jpg'),
        ('Orzeszki','orzesz', 'Kruche, wypieczone drobne ciasteczka o smaku orzechowo-czekoladowym', 3, 150, 'własny', '/src/Assets/img/orzeszki.jpg')
;

CREATE TABLE `cafe`.`orders` ( 
    order_id INT AUTO_INCREMENT PRIMARY KEY,
    users_id INT, 
    address_id INT DEFAULT NULL,
    total_amount DECIMAL(10, 2) DEFAULT 0, 
    total_quantity INT DEFAULT 0,
    order_status INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
)
;

CREATE TABLE `cafe`.`orders_product` ( 
    orders_product_id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT,
    product_id INT,
    product_price DECIMAL(10, 2), 
    product_quantity DECIMAL(10, 2),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP 
)
;

CREATE TABLE address (
    address_id INT AUTO_INCREMENT PRIMARY KEY,
    street VARCHAR(255),
    city VARCHAR(100),
    state VARCHAR(100),
    postal_code VARCHAR(20),
    country VARCHAR(100)
)
;