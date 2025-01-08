CREATE TABLE users (
    userID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    username VARCHAR (150) NOT NULL UNIQUE,
    password CHAR (60) NOT NULL,
    role VARCHAR (150)
);

CREATE TABLE lists (
    listID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    userID INT NOT NULL,
    FOREIGN KEY (userID) REFERENCES users(userID) 

);

CREATE TABLE tasks (
    taskID INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    is_completed BOOLEAN NOT NULL DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    listID INT NOT NULL,
    FOREIGN KEY (listID) REFERENCES lists(listID) ON DELETE CASCADE

);
INSERT INTO users(userID, username, password, role) VALUES
('1', 'admin', '$2a$12$GNvXC3RhyO2Ed08OMqTn5.HsBApDDZf4CEMSVlRCSu.cxrEWVlqQy', 'admin');

INSERT INTO lists(title, description, userID) VALUES
('List 1', 'Kitchen', '1'),
('List 2', 'Living Room', '1'),
('List 3', 'Bathroom', '1');

INSERT INTO tasks(title, listID) VALUES
('Task 1', 1),
('Task 2', 1),
('Task 3', 1),
('Task 1', 2),
('Task 2', 2),
('Task 3', 2),
('Task 1', 3),
('Task 2', 3),
('Task 3', 3);

