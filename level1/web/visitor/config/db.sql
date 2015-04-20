CREATE TABLE IF NOT EXISTS resources (
	resource_id int(11) NOT NULL auto_increment,
	name varchar(255) NOT NULL,
	keyword varchar(255) NOT NULL,
	link varchar(255) NOT NULL,
	PRIMARY KEY (resource_id),
	UNIQUE KEY name (name),
	UNIQUE KEY link (link)
);

CREATE TABLE IF NOT EXISTS flag (
	flag varchar(255) NOT NULL
);

INSERT INTO flag (flag) VALUES ('flag{you hacked a user agent header!}');
