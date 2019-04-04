CREATE TABLE users(
	user_id INTEGER NOT NULL UNIQUE AUTO_INCREMENT,
	first_name VARCHAR(30),
	last_name VARCHAR(30),
	address	 VARCHAR(30),
	city VARCHAR(30),
	state VARCHAR(2),
	phone CHAR(14),
	email CHAR(50),
	is_admin BOOLEAN,
	PRIMARY KEY(user_id)
);	

CREATE TABLE events(
	event_id INTEGER NOT NULL UNIQUE AUTO_INCREMENT,
	title VARCHAR(30),
	date_of DATE,
	start_time TIME,
	end_time TIME,
	address	 VARCHAR(30),
	city VARCHAR(30),
	state VARCHAR(2),
	c_phone CHAR(14),
	c_email CHAR(50),
	capacity INTEGER,
	PRIMARY KEY(event_id)
);	

CREATE TABLE is_registered(
	event_id INTEGER,
	user_id INTEGER,
	PRIMARY KEY(event_id,user_id),
	FOREIGN KEY(event_id) REFERENCES events (event_id) ON DELETE CASCADE, --I believe this is how it needs to be written
	FOREIGN KEY(user_id) REFERENCES users (user_id)
);


--Don't need this but it's just there just in case
CREATE TABLE is_admin(
	admin_id INTEGER NOT NULL UNIQUE AUTO_INCREMENT,
	user_id INTEGER NOT NULL UNIQUE,
	PRIMARY KEY(admin_id) REFERENCES users (user_id)
);