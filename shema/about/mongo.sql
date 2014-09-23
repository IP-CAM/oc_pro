OC_ORDER

{
	_id mongodid,
	uid int,
	order_no varchar(128),
	shipping:{
		username varchar(64),
		iphone varchar(11),
		address varchar(255),
		postcode int,
		province varchar(64),
		city varchar(64),
		area varchar(64),
	},
	total:{
		sub_total decimal(15,2),
		shipping decimal(5,2),
		total decimal(15,2),
	},
	payment:{

	},
	comment varchar(255),
	ctime timestamp,
}

OC_ADDR

{
	_id:uid,
	addr:[
		{
			id:uniqueid,
			name varchar(64),
			iphone int,
			province varchar(64),
			city varchar(64),
			area varchar(64),
			postcode int,
			sort int,
			status boolean,
			default boolean,
		}
	]
}