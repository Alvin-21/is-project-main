create table `user` (
  `user_id` int not null auto_increment,
  `user_type` varchar(100) not null,
  `f_name` varchar(100) not null,
  `l_name` varchar(100) not null,
  `username` varchar(100) not null,
  `phone_number` varchar(100) not null,
  `email` varchar(100) not null,
  `password` varchar(100) not null,
  primary key (`user_id`)
) ENGINE=InnoDB;

create table `admin` (
  `admin_id` int not null auto_increment,
  `user_id` int not null,
  primary key (`admin_id`),
  foreign key (`user_id`) references user(`user_id`)
) ENGINE=InnoDB;

create table `employee` (
  `employee_id` int not null auto_increment,
  `user_id` int not null,
  primary key (`employee_id`),
  foreign key (`user_id`) references user(`user_id`)
) ENGINE=InnoDB;

create table `court_official` (
  `court_official_id` int not null auto_increment,
  `employee_id` int not null,
  `occupation` varchar(100) not null,
  primary key (`court_official_id`),
  foreign key (`employee_id`) references employee(`employee_id`)
) ENGINE=InnoDB;

create table `record_officer` (
  `record_officer_id` int not null auto_increment,
  `employee_id` int not null,
  `occupation` varchar(100) not null,
  primary key (`record_officer_id`),
  foreign key (`employee_id`) references employee(`employee_id`)
) ENGINE=InnoDB;

create table `case_file` (
  `file_id` int not null auto_increment,
  `user_id` int not null,
  `case_number` varchar(100) not null,
  `file_name` varchar(100) not null,
  `file` blob not null,
  primary key (`file_id`),
  foreign key (`user_id`) references user(`user_id`)
) ENGINE=InnoDB;