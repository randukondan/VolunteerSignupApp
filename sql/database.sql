CREATE TABLE users(
	user_id INTEGER NOT NULL UNIQUE AUTO_INCREMENT,
	first_name VARCHAR(30),
	last_name VARCHAR(30),
	address	 VARCHAR(50),
	city VARCHAR(30),
	state VARCHAR(2),
	phone CHAR(14),
	email VARCHAR(50),
	password VARCHAR(100),
	is_admin BOOLEAN,
	PRIMARY KEY(user_id)
);	

CREATE TABLE events(
	event_id INTEGER NOT NULL UNIQUE AUTO_INCREMENT,
	title VARCHAR(30),
	date_of VARCHAR(20),
	start_time VARCHAR(7),
	end_time VARCHAR(7),
	address	 VARCHAR(50),
	city VARCHAR(30),
	state VARCHAR(2),
	description VARCHAR(300),
	capacity INTEGER,
	c_name VARCHAR(100),
	c_phone CHAR(14),
	c_email VARCHAR(50),
	PRIMARY KEY(event_id)
);	

CREATE TABLE is_registered(
	event_id INTEGER,
	user_id INTEGER,
	PRIMARY KEY(event_id,user_id),
	FOREIGN KEY(event_id) REFERENCES events (event_id) ON DELETE CASCADE, --I believe this is how it needs to be written
	FOREIGN KEY(user_id) REFERENCES users (user_id)
);
