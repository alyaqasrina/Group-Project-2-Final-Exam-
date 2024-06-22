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
<h2> 1) Input Validation </h2>




<h2> 2) Authentication </h2>
<h3> Methods Used or Implemented: </h3>
   
* Password hashing using password_hash() and password_verify() <br>
   
The password_hash() function, which is a component of PHP's built-in secure password hashing capabilities, is used to implement password hashing in the excerpted register.php file. Below is the breakdown of the process:

<h6>register.php</h6>

1) In line 12, we collected user input from a form submission using the $_POST superglobal. This includes the user's chosen password among other details like username, email, and role. 
2) In lines 16 - 23, before hashing the password, the script performs basic validation where it checks if the password matches a confirmed password entry to prevent user errors in typing the password. It also checks if the email is in a valid format and if the essential fields are not empty. 
3) In line 25, once the input is validated, the script hashes the user's password using the password_hash() function. 
4) In lines 28-33, the hashed password is then stored in a session variable along with other user details. This is a temporary step before the user details, including the hashed password, are stored in a database.
5) 

<h6>login.php</h6>

1) After the user has successfully registered, 


* Two-factor authentication through email verification <br>
   
For this enhancement, we used 2FA via email verification where once the user has entered the relevant details which are username, email, and role, an OTP will be sent to them via email. Once the user has entered the correct OTP it will be redirected to the login page. For this process, there are 3 pages involved which are register.php, verification.php, and login,php. Below is the breakdown of the process:

<h6>register.php</h6>

1) In lines 26 and 34-35, an OTP and the user's email are generated and stored in the session. This OTP is crucial for the next step of the verification process.
2) In lines 37-47, the PHPMailer library handles email-sending functionalities. The script is then set up to use Gmail's SMTP server with the supplied  password and username. The port 587 is used by the SMTPSecure protocol, which is configured to use STARTTLS, the standard for secure email transmission.
3) In lines 49-56, the sender's email address is set to pixlhunt37@gmail.com with the name "PixlHunt". The email is structured in HTML and the recipient's email address is set to the user's email. In addition, the OTP is included in the body of the email with the subject line "Email Verification" and instructions for the user to use to confirm their email address.
4) In lines 58-63, an SQL statement is prepared to insert the new user's details into the users database table which includes the username, email, hashed password, role, OTP, and a boolean is_verified flag set to false initially. The prepared statement is then executed, securely inserting the user data into the database. Upon successful sending of the verification email, the user is redirected to verification.php.
5) In line 58-66,The code inserts a new user into a database table called users with the provided values for username, email, password, role, and otp (One-Time Password). The is_verified column is set to false by default. The code uses a prepared statement to prevent SQL injection attacks. After the query is executed, the script redirects the user to a page called verification.php.
      
<h6> verification.php </h6>

1) This page is responsible for handling the OTP verification process, where the user will input the OTP sent to their email to complete the 2FA process.
2) In lines 23-46, the OTP stored in the session ($stored_otp) against the OTP code entered by the user ($otp_code) are compared to whether they match. If the OTPs do not match, the user is alerted with an "Invalid OTP code" message. Upon successful OTP match, the script updates the user's verification status in the database. It sets the is_verified field to 1 (true) for the user's email, marking the account as verified. After updating the verification status, the script clears the temporary user data and OTP from the session. The user is then alerted that their account has been verified successfully and is redirected to the login.php page. If the verification status update fails (e.g., due to a database issue), the user is alerted to try the verification process again.

* SSL Certificate


  


  



<h2> 3) Authorization </h2>
<h3> Methods Used or Implemented: </h3>
  
* Role-based access control (RBAC)
For this,
  
* CRUD
* Session management



<h2> 4) XSS and CSRF Prevention </h2>
<h3> Methods Used or Implemented: </h3>

<h2> 5) Database Security Principles </h2>
<h3> Methods Used or Implemented: </h3>

* Included database with db.php with custom username & password, The code uses the mysqli_connect() function to establish a connection to the MySQL database. The code checks if the connection was successful by using the ! operator to negate the result of the mysqli_connect() function. If the connection failed, the code uses the die() function to terminate the script and display an error message.


<h2> 6) File Security Principles </h2>
<h3> Methods Used or Implemented: </h3>

* Disable file directory by removing 'Indexes' in httpd.conf (Options ~~Indexes~~ FollowSymLinks Includes ExecCGI)
* Shortened the URL by creating .htacces file in htdocs to prevent any URL rewriting which can lead the attackers to make any changes to the folders.
  
   
