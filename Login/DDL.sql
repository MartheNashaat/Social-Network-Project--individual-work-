DROP DATABASE login;
CREATE DATABASE login;

CREATE TABLE users (
id              INT(10) NOT NULL AUTO_INCREMENT,
fname     		VARCHAR(50) NOT NULL,  
lname       	VARCHAR(50) NOT NULL,
password        blob NOT NULL,
email           VARCHAR(50) NOT NULL,
gender          varchar(10) NOT NULL,
day 			int(5) NOT NULL,
month 			int(5) NOT NULL,
year  			int(5) NOT NULL,
phonenumber 	int(20) NOT NULL,
hometown 		varchar(30) NOT NULL,
country 		varchar(20) NOT NULL,
marital 		varchar(15) NOT NULL,
about 			varchar(200) NOT NULL,
profilepic		varchar(200) NOT NULL
);


CREATE TABLE posts (
  id 			int(11) NOT NULL AUTO_INCREMENT,
  body 			varchar(100) NOT NULL,
  image 		varchar(200) NOT NULL,
  postdate 		datetime(6) NOT NULL,
  poster   		varchar(50) NOT NULL,
  public  		varchar(20) NOT NULL
);


CREATE TABLE friends (
  id 			int(10) NOT NULL AUTO_INCREMENT ,
  userid 		varchar(50) NOT NULL,
  friendid 		varchar(50) NOT NULL
);


CREATE TABLE friendrequests (
  id 			int(10) NOT NULL AUTO_INCREMENT,
  userid 		varchar(50) NOT NULL,
  friendid 		varchar(50) NOT NULL
);



ALTER TABLE friendrequests
  ADD PRIMARY KEY (id);


ALTER TABLE friends
  ADD PRIMARY KEY (id);


ALTER TABLE posts
  ADD PRIMARY KEY (id);

ALTER TABLE users
  ADD PRIMARY KEY (id),
  ADD UNIQUE KEY email (email);
