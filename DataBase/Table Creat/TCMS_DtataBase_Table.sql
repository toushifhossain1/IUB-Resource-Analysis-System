
-- Classroom_T
CREATE TABLE classroom_t (room_id varchar(11) NOT NULL,roomcapacity int(3), PRIMARY KEY(room_id));

-- Section_T
CREATE TABLE section_t (courseid varchar(10),school_title varchar(5),section_number int(2),semester_name varchar(6),
    std_enrolled int(3),semester_year int(4),room_id varchar(15),
                        PRIMARY KEY(courseid,school_title,section_number,semester_name,semester_year),
                       	FOREIGN KEY(courseid) REFERENCES course_t(courseid),
                       	FOREIGN KEY(school_title) REFERENCES school_t(school_title),
                        FOREIGN KEY(semester_name,semester_year) REFERENCES semester_t(semester_name,semester_year),
                       	FOREIGN KEY(room_id) REFERENCES classroom_t(room_id));

-- Semester_T
CREATE TABLE semester_t (semester_name varchar(6) NOT NULL,semester_year int(4) NOT NULL, PRIMARY KEY (semester_name,semester_year));

-- Course_T
CREATE TABLE course_t (courseid varchar(10) NOT NULL,Credit DECIMAL(3,2),school_title varchar(5),
                       PRIMARY KEY (courseid),
                       FOREIGN KEY (school_title) REFERENCES school_t(school_title)); 


-- School_T
CREATE TABLE school_t (scrial_number int(3) NOT NULL, school_title varchar(5) NOT NULL, PRIMARY KEY (school_title,scrial_number));

-- Deferment
CREATE TABLE department_t (department_id varchar(15) NOT NULL,school_title varchar(5),PRIMARY KEY(department_id),
                        FOREIGN KEY (school_title) REFERENCES school_t(school_title));
