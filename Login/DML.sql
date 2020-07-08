
INSERT INTO users (id, fname, lname, password, email, gender, day, month, year, phonenumber, hometown, country, marital, about, profilepic) VALUES
(22, 'user', 'user11', 0x313233, 'user@email.com', 'female', 18, 8, 1931, 1, 'my home', 'country', 'single', '	hi 		    					    	', 'profilewoman2.png'),
(28, 'test', 'test11', 0x313233, 'test@email.com', 'female', 19, 12, 1938, 0, '', '', '', '', 'profilewoman2.png'),
(29, 'test1', 'test11', 0x313233, 'test12@email.com', 'male', 18, 11, 1939, 0, '', '', '', '', 'profileman2.png'),
(30, 'user12', 'user', 0x313233, 'user1@email.com', 'male', 14, 11, 2008, 0, '', '', '', '', 'profileman2.png'),
(31, 'user122', 'user', 0x313233, 'user122@email.com', 'female', 17, 11, 1979, 0, '', '', '', '', 'profilewoman2.png');



INSERT INTO posts (id, body, image, postdate, poster, public) VALUES
(549, 'New post', 'Stick1.png', '2020-05-16 19:34:23.000000', 'user@email.com', 'public'),
(550, 'Hello friends!!', '', '2020-05-16 19:34:37.000000', 'user@email.com', 'private'),
(553, 'hello', '', '2020-05-16 20:08:49.000000', 'test@email.com', 'public'),
(554, 'hi friends', 'Accept.png', '2020-05-16 20:09:02.000000', 'test@email.com', 'private'),
(555, 'New profile picture!', 'Stick1.png', '2020-05-16 20:09:47.000000', 'user@email.com', 'private'),
(556, 'New post!!', 'giraffe2.jpg', '2020-05-17 11:01:54.000000', 'user@email.com', 'public'),
(557, 'Hi ! ', 'friends1.png', '2020-05-17 11:02:51.000000', 'user@email.com', 'private'),
(558, 'hello everyone!!', '', '2020-05-17 11:40:05.000000', 'user122@email.com', 'public'),
(559, 'new picture!', 'farfalla.jpg', '2020-05-17 11:40:24.000000', 'user122@email.com', 'public');



INSERT INTO friends (id, userid, friendid) VALUES
(52, 'user1@email.com', 'user@email.com'),
(53, 'user@email.com', 'test12@email.com'),
(54, 'user1@email.com', 'test12@email.com'),
(55, 'test@email.com', 'test12@email.com');


INSERT INTO friendrequests (id, userid, friendid) VALUES
(94, 'user@email.com', 'test12@email.com'),
(95, 'user1@email.com', 'test12@email.com'),
(97, 'user@email.com', 'user1@email.com');
