ALTER TABLE lists
ADD COLUMN completed_at DATETIME DEFAULT NULL;

-- If you haven't created the table yet, use this complete CREATE TABLE statement:
-- CREATE TABLE lists (
--     id INT AUTO_INCREMENT PRIMARY KEY,
--     name VARCHAR(255) NOT NULL,
--     deadline DATE,
--     description TEXT,
--     is_done BOOLEAN DEFAULT FALSE,
--     completed_at DATETIME DEFAULT NULL
-- );