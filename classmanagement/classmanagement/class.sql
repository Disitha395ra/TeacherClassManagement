CREATE TABLE login (
    email VARCHAR(100) NOT NULL,
    password VARCHAR(100) NOT NULL,
    standard ENUM('english', 'sinhala','maths','science') NOT NULL
);


INSERT INTO login (email, password, standard)
VALUES
    ('englishadmin@gmail.com', 'English@123', 'english'),
    ('sinhalaadmin@gmail.com', 'Sinhala@123', 'sinhala'),
    ('mathsadmin@gmail.com', 'Maths@123', 'maths'),
    ('scienceadmin@gmail.com', 'science@123', 'science');