CREATE TABLE exam_list (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR (255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE exam_tasks (
    id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    description VARCHAR(255) NOT NULL,
    is_completed BOOLEAN NOT NULL DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    list_id INT NOT NULL
);

INSERT INTO exam_list (title) VALUES 
('List 1'),
('List 2'),
('List 3');

INSERT INTO exam_tasks (title, description, list_id) VALUES 
('Task 1', 'descript 1', 1),
('Task 2', 'descript 2', 1),
('Task 3', 'descript 3', 1),
('Task 1', 'descript 1', 2),
('Task 2', 'descript 2', 2),
('Task 3', 'descript 3', 2),
('Task 1', 'descript 1', 3),
('Task 2', 'descript 2', 3),
('Task 3', 'descript 3', 3);