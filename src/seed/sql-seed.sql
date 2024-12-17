CREATE TABLE lists (
    listid INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE tasks (
    taskid INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    is_completed BOOLEAN NOT NULL DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    list_id INT NOT NULL
);

CREATE TABLE users (
    userid INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR (150) NOT NULL,
    password CHAR (60) NOT NULL,
    role VARCHAR (150)
)

INSERT INTO lists(title, description) VALUES
('List 1', 'Kitchen'),
('List 2', 'Living Room'),
('List 3', 'Bathroom');

INSERT INTO tasks(title, list_id) VALUES
('Task 1', 1),
('Task 2', 1),
('Task 3', 1),
('Task 1', 2),
('Task 2', 2),
('Task 3', 2),
('Task 1', 3),
('Task 2', 3),
('Task 3', 3);

INSERT INTO user (username, password, role) VALUES
('admin', 'admin', 'admin');