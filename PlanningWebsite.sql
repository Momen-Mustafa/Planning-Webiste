DROP DATABASE IF EXISTS PlanningWebsite;
CREATE DATABASE PlanningWebsite;
USE PlanningWebsite;

CREATE TABLE users (
    username VARCHAR(200) NOT NULL PRIMARY KEY,
    password VARCHAR(200) NOT NULL,
    role VARCHAR(200) NOT NULL
    ); 

CREATE TABLE board (
    boardName VARCHAR(200) NOT NULL PRIMARY KEY,
    username VARCHAR(200) NOT NULL,
    FOREIGN KEY (username) REFERENCES users(username)
    );
    
CREATE TABLE status (
    statusName VARCHAR(200) NOT NULL PRIMARY KEY,
    username VARCHAR(200),
    boardName VARCHAR(200) NOT NULL,
    FOREIGN KEY (boardName) REFERENCES board(boardName)
    );
    
 CREATE TABLE task (
	taskName VARCHAR(200) NOT NULL PRIMARY KEY,
	desciption VARCHAR(400),
	image BLOB,
	due_date DATE,
    username VARCHAR(200),
    boardName VARCHAR(200) NOT NULL,
	statusName VARCHAR(200) NOT NULL,
	FOREIGN KEY (username) REFERENCES users(username),
	FOREIGN KEY (boardName) REFERENCES board(boardName),
	FOREIGN KEY (statusName) REFERENCES status(statusName)
	);
    
CREATE TABLE label (
	labelType VARCHAR(200) NOT NULL PRIMARY KEY,
    color VARCHAR(200) NOT NULL,
    username VARCHAR(200),
    boardName VARCHAR(200) NOT NULL,
	statusName VARCHAR(200) NOT NULL,
    taskName VARCHAR(200) NOT NULL,
    FOREIGN KEY (username) REFERENCES users(username),
	FOREIGN KEY (boardName) REFERENCES board(boardName),
	FOREIGN KEY (statusName) REFERENCES status(statusName),
    FOREIGN KEY (taskName) REFERENCES task(taskName)
    );
    
CREATE TABLE history (
	historyID INT AUTO_INCREMENT PRIMARY KEY,
	action VARCHAR(400) NOT NULL,
	username VARCHAR(200),
    boardName VARCHAR(200) NOT NULL,
	statusName VARCHAR(200) NOT NULL,
	labelType VARCHAR(200) NOT NULL,
	taskName VARCHAR(200) NOT NULL,
	FOREIGN KEY (username) REFERENCES users(username),
	FOREIGN KEY (boardName) REFERENCES board(boardName),
	FOREIGN KEY (statusName) REFERENCES status(statusName),
	FOREIGN KEY (labelType) REFERENCES label(labelType),
	FOREIGN KEY (taskName) REFERENCES task(taskName)
    );
    
