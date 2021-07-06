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
    from_id int not null,
    to_id int not null,
    transactionDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id),
    FOREIGN KEY (from_id) REFERENCES users(id),
    FOREIGN KEY (to_id) REFERENCES users(id),
)

alter table transactions ADD amount int;