create table users(
    id int NOT NULL AUTO_INCREMENT,
    username varchar(50) not null,
    email varchar(60) not null,
    amount int not null,
    createdAt TIMESTAMP DEFAULT CURRENT_TIMESTAMP, 
    PRIMARY KEY (id)
);

alter table users ADD unique (email);

create table transactions(
    id int not null AUTO_INCREMENT,
    
)