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

# Web Application Security Enhancements
1) <h3> Input Validation </h3>



2) <h3> Authentication </h3>
Authentication is the process of verifying the identity of a user. In our web application, we can implement this through user login and registration functionalities.
   <h5> Methods Used or Implemented: </h5>
   
   * Password hashing using password_hash() and password_verify()
  


     
   * Secure session cookie settings
   * SSL Certificate
   * Two-factor authentication through email verification
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
  
   
