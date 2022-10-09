# Pals-and-Partner

Welcome to Pals And Partner Cleaning Service PHP Script

**Overview**
We would like you to thank you for purchasing Pals and Partner Cleaning Service PHP script for your business. We are pleased you have chosen Pals and Partner Cleaning PHP script for your business, you will not be disappointed! Before you get started please be sure to always check out these documentation files. We outline all kinds of good information and provide you all the details you need to install and run the system . This CRM is build for only Pals and Partner Cleaning Company , if you want to get your custom build CRM for your company please contact us at admin@palsandpartner.stackweb.com.au.
If you are unable to find your answer here in our documentation, watch our Video Tutorials, you can also visit our Help & Support. Chances are your question or issue has been brought up already and the answer is waiting to be found. If you are unable to find it anywhere, then please go to our Support section and open a new Support Ticket with all the details we need. Please be sure to include your site URL as well. Thank you, we hope you enjoy using Pals and Partner PHP script. 

**System Requirements**
Domain/Subdomain
Web Hosting
PHP>=7.1.0
cPanel
Webmail by cPanel
Version 2.1.3

**Team Members**
Prabin Bhattarai(30390581)(Full stack developer)
Sampurna Thapa magar(30389924)(Frontend and Backend Developer, Scrum Master)
Nilaja Dahal(30379754)(Frontend and backend Designer)
Dipesh Malla(30402005)(Tester, Documentation Master)

Client: Sudip Sinju


**Installation Guide**

**Working with File Manager**

Login to you Cpanel
Create a destination either domain/subdomain where you want to install the system. I am choosing subdomain for demo purpose.
Go to Cpanel File Manager and open the destination Domain/subdomain folder that you just created
Click on Upload option from the top bar of file Manager
Select the zip file of the PHP script that you downloaded ,and wait till the upload progress reach 100%. Then click on Go Back option.
Select the zip file that you just uploaded and click on Extract option from top bar of file manager and click on Extract files
 
**Working with Databases in cPanel**

Now go back to Cpanel and Click on MYSQL database from Databases section.
Create New Database with unique name and click on Create Database.
Create MySQL Users with username and password in Add New User Section. After user is successfully created go back to same section.
Now, its time to Add the relation between the User and Database you just created.Select the respective user and database from the options and press on Add Button
Press and tick on “All privileges” and click on Make changes button
Now you will see the successful popup for changing the settings

Go to Cpanel and open PHPmyAdmin and select the database you just created
Go to Import and Select the *.SQL file that you have got with this PHP script
After you select the file from choose file press on Go  button from the bottom
 
Now finally your databases has been imported successfully. You Can see all the table in the database.
 
**Editing Database Connection File(dbconnect.php)**
Open File Manager and Edit  all the dbconn.php files credentials 
Change the connection file as 
(“host”, “database_user”, “user_password”, “databasename”) for following file

Main Folder>Php>dbconn.php
Admin>Php>dbconn.php
Staff>Php>dbconn.php
Customer>Php>dbconn.php

**Editing Webmail Notification File:**
Please Edit following file with appropriate credential you want to receive notification to
 
Customer>php>appointmentpaid.php
Admin>php>Shiporder.php
Admin>php>Assignappointment.php

**Editing Payment Gateway API**
Please edit following API detail and replace with your own by creating from Paypal Developer Accounts
 
Customer>include>payforappointment.php

**Running the Website**
Now Enter the Web address(domain/subdomain) in the browser where you have installed the PHP script (Note: Please make sure Cpanel cache is cleared so that everything is loaded instantly)
 


**Get support**
Support: admin@palsandpartner.stackweb.com.au
Web        : http://palsandpartner.stackweb.com.au/ 

**Credentials: **

customerpalsandpartner@stackweb.com.au 
staffpalsandpartner@stackweb.com.au 
adminpalsandpartner@stackweb.com.au 
Password:12345678 

**PayPal sandbox account **

credential to check the payment 
adminpalsandpartner@stackweb.com.au 
12345678 

**Product Walkthrough**

**Video Walkthrough**

https://youtu.be/x9zzgmgcso8?t=178
