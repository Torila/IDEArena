DROP TABLE posts;
CREATE TABLE posts(
	postID int(11) unsigned NOT NULL AUTO_INCREMENT,
	postTitle varchar(255) DEFAULT NULL,
	user text,
	postQst text,
	postDate datetime DEFAULT NULL,
	PRIMARY KEY (postID)
	);
	
INSERT INTO posts (`postID`, `postTitle`, `postQst`, `postDate`)
VALUES
	(1, 'test', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus, vero, obcaecati, aut, error quam sapiente nemo saepe quibusdam sit excepturi nam quia corporis eligendi eos magni recusandae laborum minus inventore?', '2017-02-14 00:00:00');
	
DROP TABLE users;
CREATE TABLE users (
	userID int(11) unsigned NOT NULL AUTO_INCREMENT,
	username varchar(255) DEFAULT NULL,
	password varchar(255) DEFAULT NULL,
	email varchar(255) DEFAULT NULL,
	PRIMARY KEY (userID)
	);	


