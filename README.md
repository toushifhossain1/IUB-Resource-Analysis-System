**PROJECT NAME: TABLES & CHARTS MANAGEMENT SYSTEM**

**BACKGROUND OF THE ORGANIZATION**

Founded in 1993, Independent University, Bangladesh is one of the oldest private universities in Bangladesh where academic excellence is a tradition, teaching a passion and lifelong learning a habit. IUB currently has more than 7,048 undergraduate and graduate students and over 10,455 alumni. The student population is projected to grow at 10% annually. The students of IUB experience an exciting academic life with copious opportunities to explore and nurture their innate talent.
IUB uses smart and new techniques of education which are robust and is committed to produce graduates who will be equipped to provide new leadership through skilled employment.

**BACKGROUND OF THE PROJECT**

The goal of this project is to create a web-based system that will enable a university to make meaningful analysis of its resources and revenue in the form of tables and graphs. The system will have the capability to calculate IUB classroom requirements as per course offering, enrolment-wise course distribution among the schools, revenue, and much more. 
It will provide a range of tools intended to help universities and other stakeholders to evaluate its resources and revenue and provide strategies for improvements.


**OBJECTIVES OF THE PROJECT**

The main purpose of creating this system is to reduce the amount of work and make the work more orderly. The university has a lot of work that takes a lot of time to do, like if we want to see how many classrooms the university has, how many have been enrolled in different departments and how much money the university has been able to generate revenue and the difference in departmental revenue. This kind of work requires a lot of time and a lot of calculations but the system we are building will show all this information in the form of tables and charts in a few moments so that it will take a lot of time and make the work much easier. Will be done.

**SCOPE OF THE PROJECT**

In the existing system all the data that is required for making meaningful analysis of concerns such as Resource Usage or Classroom Requirements among other topics for each semester is done manually. For each type of data employees have to tediously reach out to different offices and departments and then use those data to make necessary calculations by hand.All this inconvenience can be avoided by implementing a centralized database from which all the required data can be downloaded at once in the form of tally sheets. The tally sheets can then be uploaded into a system that can extract all the data from it and make required calculations using those data to automatically generate meaningful tables and graphs as per user requirements.

**BUSINESS SYSTEM (WITH RICH PICTURE)**

![alt text](https://github.com/Nakib00/University_Analysis_System/blob/main/Repost%20File/business%20system%20with%20rich%20picture.PNG?raw=true)

**BUSINESS PROCESS** 

![alt text](https://github.com/Nakib00/University_Analysis_System/blob/main/Repost%20File/process%20diagram.PNG?raw=true)

**BUSINESS-RULES**
Business rules describe the operations, definitions, and constraints that govern the data model. As opposed to the ERD, they are made using regular English sentences so that a non-technical A stakeholder can decipher information about the data model without notation knowledge. The business rules that govern our data model are as follows:   

Department must offer at least one Course and a Course must belong to exactly one Department. DEPARTMENT includes departmentid, schooltitle 

A course must have at least one section and a section is allocated to exactly one course. COURSE contains courseid,DepartmentId, Credit . 

A Classroom may be allocated for many sections. A Section is allocated in exactly one Classroom. CLASSROOM includes roomid,roomcapacity. SECTION Includes sectionnumber, semestername, semesteryear ,courseid ,schooltitle ,roomid and studentenrolled.

**ENTITY-RELATIONSHIP DIAGRAM (ERD)**

![alt text](https://github.com/Nakib00/University_Analysis_System/blob/main/Repost%20File/RED.png?raw=true)


**RELATIONAL SCHEMA**

![alt text](https://github.com/Nakib00/University_Analysis_System/blob/main/Repost%20File/Relational%20schema%20diagram.png?raw=true)
</br>

</br></br>
**PROBLEM AND SOLUTION**</br>

Analysis Phase</br> 
During the analysis phase conceptualization was made on how to improve the existing system. While working on the Rich Picture and Six Element Analysis of operations of the organization, simultaneously, assumptions for the queries required to make the project were made. Interviews with faculty members and senior students were done for better understating of the project. 

Designing Phase</br> 
Upon further research all entities related the project were created and the relation between all entities were defined. which was also introduced in the Relational Schema schematic. Feedback from course instructor also played a very valid and crucial role in this phase. 

Implementation Phase</br> 
All software requirements were reached. Deliverables 1,2,3,4 and 5 were achieved.</br> 
Front-End Developing tools: HTML, CSS, Bootstrap JavaScript 
Back End Developing tools: Raw PHP</br> 
Database-integration: MySQL</br>

**ADDITIONAL FEATURE AND FUTURE DEVELOPMENT**</br>
Future Developing Purposes:</br>
1.•	Add feature to automatically generate optimal classroom allocation based on number of students enrolled in a particular course for a particular semester.</br>
2.•	Deployment.</br></br></br>

**Project website overview**</br>
**index page**

![alt text](https://github.com/Nakib00/University_Analysis_System/blob/main/Repost%20File/Websit%20overview/1.PNG?raw=true)


**Login page**

![alt text](https://github.com/Nakib00/University_Analysis_System/blob/main/Repost%20File/Websit%20overview/2.PNG?raw=true)


**Registration page**

![alt text](https://github.com/Nakib00/University_Analysis_System/blob/main/Repost%20File/Websit%20overview/3.PNG?raw=true)


**Dashboard welcome page**

![alt text](https://github.com/Nakib00/University_Analysis_System/blob/main/Repost%20File/Websit%20overview/4.PNG?raw=true)


**CSV file import page**

![alt text](https://github.com/Nakib00/University_Analysis_System/blob/main/Repost%20File/Websit%20overview/5.PNG?raw=true)


**Uses of Resources Comparison page**

![alt text](https://github.com/Nakib00/University_Analysis_System/blob/main/Repost%20File/Websit%20overview/6.PNG?raw=true)
![alt text](https://github.com/Nakib00/University_Analysis_System/blob/main/Repost%20File/Websit%20overview/7.PNG?raw=true)
![alt text](https://github.com/Nakib00/University_Analysis_System/blob/main/Repost%20File/Websit%20overview/8.PNG?raw=true)



