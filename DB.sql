CREATE TABLE Users(
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    Fname VARCHAR(30),
    Lname VARCHAR(30),
    email VARCHAR(50) UNIQUE,
    password VARCHAR(255)
);
CREATE TABLE Stickies(
	id_sticky INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    name_sticky VARCHAR(30),
    description_sticky VARCHAR(70),
    color_sticky VARCHAR(20),
    FOREIGN KEY (id_user) REFERENCES Users(id_user)
);
CREATE TABLE Lists(
	id_list INT AUTO_INCREMENT PRIMARY KEY,
    id_user INT,
    name_list VARCHAR(20),
    color_list VARCHAR(20),
    FOREIGN KEY (id_user) REFERENCES Users(id_user)
);
CREATE TABLE Tasks(
	id_task INT AUTO_INCREMENT PRIMARY KEY,
    id_list INT,
    name_task VARCHAR(20),
    description_task VARCHAR(150),
    due_date DATETIME,
    FOREIGN KEY (id_list) REFERENCES Lists(id_list)
);
CREATE TABLE Subtasks(
	id_subtask INT AUTO_INCREMENT PRIMARY KEY,
    id_task INT,
    name_subtask VARCHAR(20),
    FOREIGN KEY (id_task) REFERENCES Tasks(id_task)
);
