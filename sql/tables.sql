create table users(
    id int NOT NULL AUTO_INCREMENT,
    username varchar(50) not null,
    email varchar(60) not null,
    amount int not null,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (id)
);