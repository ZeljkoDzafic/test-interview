CREATE TABLE MenuElements (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    parent_id INT,
    menu_id INT,
    `order` INT,
    FOREIGN KEY (parent_id) REFERENCES MenuElements(id)
    FOREIGN KEY (menu_id) REFERENCES Menu(id)
);


CREATE TABLE Menu (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
);
