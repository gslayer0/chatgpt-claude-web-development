CREATE DATABASE todolist;

USE todolist;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task_name VARCHAR(255) NOT NULL,
    description TEXT,
    deadline DATE,
    is_done BOOLEAN DEFAULT 0
);

ALTER TABLE tasks ADD completed_at DATETIME NULL;

