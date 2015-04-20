CREATE TABLE IF NOT EXISTS accts (
	acct_id int(11) NOT NULL auto_increment,
	ccnumber int(11) NOT NULL,
	pin int(11) NOT NULL,
	acct_extra varchar(255) NOT NULL,
	PRIMARY KEY (acct_id),
	UNIQUE KEY ccnumber (ccnumber)
);
