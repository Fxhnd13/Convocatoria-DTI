CREATE TABLE IF NOT EXISTS person (
    cui BIGINT NOT NULL , 
    name VARCHAR(30) NOT NULL, 
    last_name VARCHAR(30) NOT NULL, 
    address VARCHAR(50) NOT NULL, 
    phone_number INTEGER NOT NULL, 
    birth_day DATE, 
    username VARCHAR(20) NOT NULL UNIQUE, 
    password VARCHAR(200) NOT NULL, 
    PRIMARY KEY (cui)
);

CREATE TABLE IF NOT EXISTS institution (
    id_institution INTEGER NOT NULL auto_increment , 
    institution VARCHAR(40) NOT NULL, 
    PRIMARY KEY (id_institution)
);

CREATE TABLE IF NOT EXISTS academic_achievement (
    id_achievement INTEGER NOT NULL auto_increment , 
    year INTEGER NOT NULL, 
    tittle VARCHAR(40) NOT NULL, 
    cui BIGINT NOT NULL, 
    id_institution INTEGER NOT NULL, 
    PRIMARY KEY (id_achievement), 
    FOREIGN KEY (cui) REFERENCES person (cui) ON DELETE CASCADE ON UPDATE CASCADE, 
    FOREIGN KEY (id_institution) REFERENCES institution (id_institution) ON DELETE CASCADE ON UPDATE CASCADE
);

CREATE TABLE IF NOT EXISTS performance_area (
    id_area INTEGER NOT NULL auto_increment , 
    performance_area VARCHAR(30) NOT NULL, 
    PRIMARY KEY (id_area)
);

CREATE TABLE IF NOT EXISTS area_assignment (
    id_assignment INTEGER NOT NULL auto_increment , 
    id_area INTEGER NOT NULL, 
    cui BIGINT NOT NULL, 
    PRIMARY KEY (id_assignment), 
    FOREIGN KEY (id_area) REFERENCES performance_area (id_area) ON DELETE CASCADE ON UPDATE CASCADE, 
    FOREIGN KEY (cui) REFERENCES person (cui) ON DELETE CASCADE ON UPDATE CASCADE
);

ALTER TABLE person ADD INDEX (username);