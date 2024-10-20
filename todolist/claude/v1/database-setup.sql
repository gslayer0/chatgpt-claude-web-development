CREATE TABLE lists (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    deadline DATE,
    description TEXT,
    is_done BOOLEAN DEFAULT FALSE
);
