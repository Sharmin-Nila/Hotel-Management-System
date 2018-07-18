CREATE TABLE IF NOT EXISTS Register (
	name varchar(500) NOT NULL,
	username varchar(500) PRIMARY KEY NOT NULL,
	password varchar(500) NOT NULL,
	age varchar(100) NOT NULL,
	mobile varchar(500) NOT NULL,
	address varchar(500) NOT NULL,
	email varchar(500) NOT NULL,
	gender varchar(500) NOT NULL,
	usertype varchar(500) NOT NULL
	);


INSERT INTO Register (name, username, password, age, mobile, address, email, gender, usertype) VALUES
	('X', 'admin', '123456', '35', '01681000515', 'Road no:8, House no: 54, Banashree', 'ssnila1994@gmial.com', 'female', 'admin');
