create table brothers (
    id int not null auto_increment,
    name varchar(255),
    pledge_name varchar(255),
    pledge_class varchar(255),
    crossing varchar(255),
    ethnicity varchar(255),
    hometown varchar(255),
    alumnus boolean,
    created_at datetime,
    updated_at datetime,    
    photo_file_name varchar(255),
    photo_content_type varchar(255),    
    photo_file_size int,    
    photo_updated_at int,
    bio text,
    PRIMARY KEY (id)
);  

create table galleries (
    id int not null auto_increment,
    title varchar(255),
    created_at datetime,
    updated_at datetime,
    PRIMARY KEY (title),
    KEY(id)
);

create table photos (
    id int not null auto_increment,
    gallery varchar(255),
    foreign key (gallery) references galleries(title),
    image_file_name varchar(255),
    image_content_type varchar(255),
    image_file_size int,
    image_updated_at datetime,
    created_at datetime,
    updated_at datetime,
    PRIMARY KEY (id)
);


