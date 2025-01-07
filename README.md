# A.C.E.S

Access Control Entry System

## Description:

This project has been developed for a Year 2, Software Development, Higher Education assignment. The following scenario summarises the users and requirements.

A college requires a card access entry system to enable users to swipe a card to access rooms within the college campus buildings. The users of the card will have different roles, including; teaching staff, students, managers, security, contract cleaners, guests and emergency responders. Each role will have restricted access depending on the time of day, room state (emergency or normal) and types of rooms (e.g. staff rooms, teaching rooms, lecture halls or secure rooms). 
The prototype system which has been created enables a user to manage data on the card holders and rooms whilst enabling a simulation of accessing a room with a card, generating the correct log details. Three main software applications have been created to interact with each other to meet the requirements; MySQL for data storage, C++/CLI for coding the simulation of the access control and a Website application with PHP, HTML, CSS and SQL for the data management.
	The following information will enable the installation of relevant software applications to install and run all three aspects.

## Table of contents: 

	Installation and Configuration
		Database (Wamp64, MySQL)
		Website (Visual Studio Code, PHPMyAdmin)
		C++ Files (Visual Studio 2022, MySQL Connector)
	User Interaction
		Website Data Management
		Simulation of Card Holder
  	Credits

## Installation and Configuration

   The implementation of the design has been created on a Windows 10 system, for alternative operating systems installation and running instructions may vary, please refer to the given 
   websites support pages.

### Files Download

   Download and extract the zip for the repository folders into an easily accessible location on your system.

### Database

 1. Download the Wamp Server 64 bit (X64) 3.3.7 from:

     https://www.wampserver.com/en/download-wampserver-64bits/ 

 2.Install the application and run the WampManager

 3.Access PHPMyAdmin (current version 5.2.1) through the manager or through  browser on a local network system: http://localhost/phpmyadmin/ 

   At first the username will be “root” and password blank and can be changed after logging in.

 4. Go to the extracted repository folder location and copy the door_access folder

 5. Go into the wamp64 file location (For me this was in the Local Disk (C:) drive)

 6. Select bin>mysql>mysql8.2.0>data and past the door_card file here

    (8.2.0 may vary due to version)

 7. Go back to the localhost/phpmyadmin website to check the door_cards database is visible in the left hand menu

### Website

 1. Download Visual Studio Code for Windows 10/11: 

    https://code.visualstudio.com/download 

 2. Go to the extracted repository folder location and copy the “aces data management website” folder

 3. Open this new folder in Visual Studio Code and access the db-connection.php in the  db-files folder

 4. Change the username and password value if you have these set on the PHPMyAdmin login

 5. Go into the wamp64 file location

 6. Select the www folder and paste the “aces data management website” file here

    Go to http://localhost/ 

 7. Select “Add a Virtual Host”

 8. Enter aces into the “Name for the Virtual Host”

 9. Enter:  c:/wamp64/www/aces into the “Complete absolute path” 

 10. Click “Start the creation.modification of the VirtualHost”

 11. Go back to http://localhost/ and check there are no errors

 12. Select aces under “Your Virtual Host” (Unless you named the virtual host differently)

### Simulation

 1. Go to the extracted repository folder location and copy the “aces - C++ simulation” folder

 2. Paste this folder into a location of your choice (Generally this goes into Visual Studio: Repos file)

 3. Download Visual Studio 2022 from: 

   https://visualstudio.microsoft.com/downloads/ 

 4. Ensure the following are selected in the Visual Studio Installer:

   - Desktop Development with C++  
   - .NET Desktop Development 
   - Windows Application Development

Data Storage and Processing

 1. Open Visual Studio and select continue without code, below all other options under Get Started

 2. Select Manage>Manage Extensions

 3. Expand Visual Studio Marketplace and select Visual C++

 4. Install the C++ Windows Forms for VS 2022 .NET framework

 5. Close Visual Studio after selecting install for this to take effect

 6. Download MySQL Connector/C++ Library from:

   https://dev.mysql.com/downloads/connector/cpp/ (I have placed this in documents/libraries for ease)

 7. Selecting Windows (x84, 64-bit), ZIP Archive

 8. Go to the “aces - C++ simulation” folder and open the “aces_v3.sln” file

 9. Ensure the Release and x64 are selected from the dropdowns

 10. Ignore any red underlines at this stage

 11. Go to project>properties
 
 12. Make sure Configuration is release and Platform is x64

 13. In Configuration Properties> VC++ Directories

  a. For Include Directories insert: 

   “FilePath”\mysql-connector-c++-9.0.0-winx64\include\jdbc;$(VC_IncludePath);$(WindowsSDK_IncludePath); 

   (Change the red to your final path location of the downloaded connector)

  b. For Library Directories insert:	“FilePath”\mysql-connector-c++-9.0.0-winx64\lib64\vs14;$(VC_LibraryPath_x64);$(WindowsSDK_LibraryPath_x64)

 14. In C/C++>General

  a. For Additional Include Directories insert:

   “FilePath”\mysql-connector-c++-9.0.0-winx64\include\jdbc

 15. In C/C++>Preprocessor

  a. For Preprocessor Definitions insert:

   _CRT_SECURE_NO_WARNINGS;NDEBUG;%(PreprocessorDefinitions)

 16. In Linker>Input

  a. For Additional Dependencies insert:

   mysqlcppconn.lib;%(AdditionalDependencies)

 17. In Configuration Properties>Build Events>Post-Build-Events

  a. For Command Line Insert

   xcopy /y  “FilePath”\mysql-connector-c++-9.0.0-winx64\lib64\*.dll

 18. Select Apply then Ok

 19. For the following lines in Form1.h,  change “root” to your database username and insert a password in “”

   - 512

   - 586

   - 741


## User Interactions

 For all applications ensure that the Wamp64 server is running.

###  Data Management Website Application:

 Access the A.C.E.S website. The first page you will come across is a login page. There are two levels of log in, at the higher level there is the manager's account and the lower level is 
 for the general administrator. The Manager can access any account level pages.

 The login page will allow you to login with the following details: 

 Managers Account:	

   Username: ManagerAccount		Password: Password1

 General Admin Account:

   Username: AdminAccount		Password: Password1
 
 In the General Administrator and Managers Account you can: 

   View rooms, users and logs 

   Edit room and building states between emergency and normal

   Logout

 In the Managers Account you can:

   Create new general administrator login accounts
	
   Edit and delete users and rooms

### Simulation System

 For this simulation it is best to have the A.C.E.S website open to view rooms and users to use information that exists in the database. 

 Open the “aces - C++ simulation” folder and the “aces_v3.sln” file and run the program with “Local Windows Debugger”. 

 A GUI will appear where you can attempt to swipe a card and view the message output.

 Input a date and time to reflect when a card holder wants to access a room.

 Input either genuine database room and card details or ones that do not exist to see the verification, authentication, authorisation and log messages.

 (Please note the Door, Card Reader, Door Lock Labels and buttons for Door Handle and Reset are currently unavailable, an update may be available at a future date)

## Credits

 Visual Studio Code: 
 https://code.visualstudio.com/download 

 Visual Studio 2022: 
 https://visualstudio.microsoft.com/downloads/

 WampServer download provided by SourceForge: 
 https://www.wampserver.com/en/download-wampserver-64bits/ 

 C++ WinForms for Visual Studio 2022 (Getting Started) tutorial by Hacked: 
 https://www.youtube.com/watch?v=IYLYX5Ei48I 

 Oracle MySQL Connector/C++: 
 https://dev.mysql.com/downloads/connector/cpp/ 

 “Featuring MySQL database with C++ in Visual Studio 2022” guide by Neal Lad: 
 https://medium.com/@neel.lad3110/featuring-mysql-database-in-visual-studio-2022-for-a-c-application-a90befbc0420
