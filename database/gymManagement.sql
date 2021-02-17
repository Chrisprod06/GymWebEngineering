create database gym;
use  gym;

/*Table creation*/

create table users(
    userID int auto_increment,
    firstName varchar(20),
    lastName varchar(20),
    telephone int,
    address varchar(30),
    email varchar (20),
    password varchar(20),
    role int,
   
    
);

create table classes(
	classID varchar(20),
    className varchar(20),
    day date,
    hour time,
    
    primary key (classID)
);

create table enrolledClasses(
	userID int auto_increment,
    classID varchar(20),
    
    primary key (userID,classID),
    foreign key(userID) references users(userID),
    foreign key(classID) references classes(classID)
);

create table contactQueries(
	userID int auto_increment,
    subject varchar(30),
    message varchar(100),
    
    foreign key (userID) references users(userID)
    );


create table trainingClass(
	classID varchar(20),
    trainerID int auto_increment,
    
    foreign key (classID) references classes(classID),
    foreign key (trainerID) references users(userID)
);

