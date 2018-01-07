****Welcome to CHARLOTTE EVENTS website*****************************************

1. To run this web application, you need to install a localhost server XAMPP (version higher or equal to v3.2.2)

2. Once you have installed XAMPP in your specified location which is in most cases in C drive i.e. "C:/xampp".
-> Extract the folder and place the Charlotte Events folder in htdocs folder of xampp -> "C:\xampp\htdocs\".

3.DB Setup:

In the CharlotteEvents directory, you will find a "DB" folder. In it, events.sql is there.

-> Run XAMPP control panel by starting Apache and SQL ports.
-> Go to browser and type localhost/phpmyadmin/

-> create database events before importing the events.sql file in the database by giving the following command in SQL terminal located on top navigation bar-

	create database `events`;
	
-> Now, click on Import-> Choose file(events.sql)-> Hit Go
-> You can view the 4 tables in your database.


4. Once you have setup your database, type URL "localhost/CharlotteEvents".

5. You can now browse/surf the website.


********ADMIN LOGIN****************

-> UNCC ID= asharm50@uncc.edu
-> Password= admin


**********CONTRIBUTOR LOGIN***********

-> Signup or if you want to login without registering, following are the test credentials you can use-

	UNCC ID= ray@uncc.edu
	Password= ray
	
	
*********KNOWN BUGS*********************

 -> There is only 1 admin, use the above mentioned ADMIN credentials or update the credentials as per your choice in the table "user".
 -> Remember your password after signing up because md5 encryption is used and it will convert it to some random key.
 -> In Carpool Forum, send email button will only show alert box. There is no sendemail php code for it.
 -> Only 4 event categories are allowed to add in event- "musical,sports,food,career" and all in lowercase.
 
 

	