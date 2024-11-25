DROP SCHEMA IF EXISTS `isd-entities`;

CREATE SCHEMA `isd-entities`;

use `isd-entities`;

SET FOREIGN_KEY_CHECKS = 0;

-- Create the user table
CREATE TABLE user (
                      id INT PRIMARY KEY AUTO_INCREMENT,
                      username VARCHAR(255) UNIQUE,
                      first_name VARCHAR(255) NOT NULL ,
                      last_name VARCHAR(255) NOT NULL ,
                      email VARCHAR(255) UNIQUE,
                      password char(68) NOT NULL ,
                      phone_number VARCHAR(20),
                      about_me TEXT,
                      verified BOOLEAN,
                      image VARCHAR(255),
                      enabled boolean
);

-- Create the event table
CREATE TABLE Event (
                       id INT PRIMARY KEY AUTO_INCREMENT,
                       title VARCHAR(255) NOT NULL ,
                       date DATE NOT NULL ,
                       time TIME NOT NULL ,
                       location VARCHAR(255) NOT NULL ,
                       description TEXT,
                       image VARCHAR(255),
                       date_of_creation TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                       organizer_id INT NOT NULL,
                       category_id INT,
                       number_of_seats INT,
                       FOREIGN KEY (organizer_id) REFERENCES user(id),
                       FOREIGN KEY (category_id) REFERENCES category(id)
);

-- Create the category table
CREATE TABLE category (
                          id INT PRIMARY KEY AUTO_INCREMENT,
                          name VARCHAR(255),
                          description TEXT
);

-- Create the event_reviews table
CREATE TABLE event_reviews (
                               user_id INT,
                               event_id INT,
                               comment TEXT,
                               rating FLOAT,
                               PRIMARY KEY (user_id, event_id),
                               FOREIGN KEY (user_id) REFERENCES user(id),
                               FOREIGN KEY (event_id) REFERENCES Event(id)
);

-- Create the attended_by table
CREATE TABLE attended_by (
                             attendee_id INT,
                             event_id INT,
                             PRIMARY KEY (attendee_id, event_id),
                             FOREIGN KEY (attendee_id) REFERENCES user(id),
                             FOREIGN KEY (event_id) REFERENCES Event(id)
);

-- Create the saved_events table
CREATE TABLE saved_events (
                              user_id INT,
                              event_id INT,
                              PRIMARY KEY (user_id, event_id),
                              FOREIGN KEY (user_id) REFERENCES user(id),
                              FOREIGN KEY (event_id) REFERENCES Event(id)
);

ALTER TABLE event ADD status varchar(255);
CREATE TABLE user_role (
    user_id int,
    role_id int
);

use `isd-entities`
ALTER TABLE event ADD remaining_seats int;
