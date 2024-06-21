# Group-Project-2-Final-Exam
Web Application Security Enhancement Final Assessment Group Project

# Group Name
Innovators

# Group Members
1. Nooralya Qasrina binti Zuraimi (2118228)
2. Siddiqui Maryam (2115928)
3. Yaya ali hassane (1928095)

# Title
PIXLHUNT

# Introduction
Improved version of Chillax Cafe web app with security features added onto the original web technologies class project.
Original owners are:

* Nooralya Qasrina Binti Zuraimi 
* Maryam Umairah Binti Arman Yatim 
* Fariha Hadaina Binti Mohd Shazali

PIXLHUNT is a website aimed to guide visitors to trending and iconic places around Kuala Lumpur. Experience the three boroughs of Kuala Lumpur with PIXLHUNT. Find out what to do, where to go, and what to eat in Kuala Lumpur - the city of contrast and diversity.


# Objective of the enhancements
1. To improve the security of the existing website by implementing various security measures to protect against common vulnerabilities and ensure the safety and integrity of user data.
2. To create a safer environment for the user to access and use the website.
3. To prevent unauthorize access by implementing session management.
4. File directory cannot be accessed by unauthorize user since it has been disabled.

# Task Distribution

| Task                          | Assigned To       |
|-------------------------------|-------------------|
| Input Validation    | Yaya             |
| Authentication        | Alya, Maryam               |
| Authorization | Alya           |
| XSS and CSRF Prevention           | Yaya              |
| Database Security Principles     | Maryam             |
| File Security Principles              | Maryam               |

# Web Application Security Enhancements
<h3> 1) Input Validation </h3>




<h3> 2) Authentication </h3>
Authentication is the process of verifying the identity of a user. In our web application, we can implement this through user login and registration functionalities.
<h4> Methods Used or Implemented: </h4>
   
   * Password hashing using password_hash() and password_verify() <br>
   
The password_hash() function, which is a component of PHP's built-in secure password hashing capabilities, is used to implement password hashing in the excerpted register.php file. Below is the breakdown of the process:

   1) In line 12, we collected user input from a form submission using the $_POST superglobal. This includes the user's chosen password among other details like username, email, and role. [Alya]
   2) In lines 16 - 23, before hashing the password, the script performs basic validation where it checks if the password matches a confirmed password entry to prevent user errors in typing the password. It also checks if the email is in a valid format and if the essential fields are not empty. [Alya]
   3) In line 25, once the input is validated, the script hashes the user's password using the password_hash() function. [Alya]
   4) In lines 28-33, the hashed password is then stored in a session variable along with other user details. This is a temporary step before the user details, including the hashed password, are stored in a database.
   5) 
  
   * Two-factor authentication through email verification <br>
For this enhancement, we used 2FA via email verification where once the user has entered the relevant details which are username, email, and role, an OTP will be sent to them via email. Once the user has entered the correct OTP it will be redirected to the login page. Below is the breakdown of the process:

   1) In line 
   2) 

     
   * Secure session cookie settings
   * SSL Certificate
   * SQL injection Prevention in line 58-66 (register.php)

  



3) <h3> Authorization </h3>
    <h5> Methods Used or Implemented: </h5>
  
    * Role-based access control (RBAC)
    * Session management



4) <h3> XSS and CSRF Prevention </h3>

5) <h3> Database Security Principles </h3>
* Included database with db.php with custom username & password.

6) <h3> File Security Principles </h3>

* Disable file directory by removing 'Indexes' in httpd.conf (Options Indexes FollowSymLinks Includes ExecCGI)
  
   
