drop table TBL_ORDER_ITEM;
drop table TBL_ORDER;
drop table TBL_ITEM;
drop table TBL_CUSTOMER;

create table TBL_CUSTOMER (
    CUS_ID      int(11),
    CUS_NAME    varchar(100),
    CUS_EMAIL   varchar(100),
    primary key(CUS_ID)
);

create table TBL_ITEM (
    ITEM_ID     int(11),
    ITEM_DESC   varchar(255),
    ITEM_PRICE  real,
    primary key(ITEM_ID)
);

create table TBL_ORDER (
    ORDER_ID    int(11),
    CUSTOMER_ID int,
    ORDER_DATE  datetime,
    primary key (ORDER_ID),
    foreign key (CUSTOMER_ID) REFERENCES TBL_CUSTOMER(CUS_ID)
);

create table TBL_ORDER_ITEM (
    ORDER_ID int(11),
    ITEM_ID  int,
    ORDER_ITEM_QUANTITY int,
    PRIMARY KEY (ORDER_ID, ITEM_ID),
    FOREIGN KEY (ORDER_ID) REFERENCES TBL_ORDER(ORDER_ID),
    FOREIGN KEY (ITEM_ID) REFERENCES TBL_ITEM(ITEM_ID)
);