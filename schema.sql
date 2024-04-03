create table state (
	idState int primary key,
	state varchar(400),
	population int,
	counties int
);

create table country (
	idCountry int primary key,
	county varchar(90),
	population int,
	idState int,
	CONSTRAINT fk_country_state FOREIGN KEY(idState) REFERENCES state(idState)
)