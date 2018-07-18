CREATE TABLE IF NOT EXISTS bookingTable (
	guest_name varchar(500) NOT NULL,
	room_number varchar(500) NOT NULL,
	check_in DATE NOT NULL,
	check_out DATE NOT NULL,
	room_type varchar(500) NOT NULL,
	num_days integer(11) NOT NULL,
	num_adult integer(11) NOT NULL,
	num_children integer(11) NOT NULL,
	balance integer(11) NOT NULL
	);
