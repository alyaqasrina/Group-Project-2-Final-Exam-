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
   
<h4> A. Password hashing using password_hash() and password_verify() </h4>

   The password_hash() function, which is a component of PHP's built-in secure password hashing capabilities, is used to implement password hashing in the excerpted register.php file. Below is the breakdown of the process:

<h6>register.php</h6>

1) In line 12, we collected user input from a form submission using the $_POST superglobal. This includes the user's chosen password, username, email, and role. 
2) In lines 16 - 23, before hashing the password, the script checks that the password matches the confirmation, verifies the email format and ensures essential fields are not empty.
3) In line 25, once the input is validated, the script hashes the user's password using the password_hash() function. 
4) In lines 28-33, the hashed password is then stored in a session variable along with other user details. This is a temporary step before the user details, including the hashed password, are stored in a database.

<h6>index.php</h6>

1) After registering, the user is redirected to login.php to submit their username, password, and role. The server then retrieves the hashed password for the submitted username from the database, if it exists.
2) In line 19, the script uses the password_verify() function to compare the submitted password with the stored hashed password. If password_verify($password, $user['password']) returns true, the user is authenticated. If it returns false, the user is not authenticated.
   
<h4> B. Two-factor authentication through email verification </h4>
   
For this enhancement, we added 2FA via email. The user enters their username, email, and role, receives an OTP, and enters it correctly to be redirected to the login page. This involves three pages: register.php, verification.php, and index.php.

<h6>register.php</h6>

1) In lines 26 and 34-35, an OTP and the user's email are generated and stored in the session for the verification process.
2) In lines 37-47, PHPMailer uses Gmail's SMTP server with the provided username and password. Port 587 and the SMTPSecure protocol with STARTTLS ensure secure email transmission.
3) In lines 49-56, the sender's email is set to pixlhunt37@gmail.com as "PixlHunt". The email is sent to the user's address, containing the OTP and instructions for verification.
4) In lines 58-63, an SQL statement inserts the user's details into the users database table, including username, email, hashed password, role, OTP, and a false is_verified flag. After sending the verification email, the user is redirected to verification.php.
5) In lines 58-66, a new user is inserted into the users table with username, email, password, role, and OTP. The is_verified column is set to false. A prepared statement is used for security, and after execution, the user is redirected to verification.php.
      
<h6> verification.php </h6>

1) This page handles OTP verification, where the user inputs the OTP sent to their email to complete 2FA.
2) In lines 23-46, the script compares the session-stored OTP ($stored_otp) with the user-entered OTP ($otp_code). If they don't match, the user gets an "Invalid OTP code" message. If they match, the script updates the user's verification status in the database, setting is_verified to true for the user's email. It then clears the session data and alerts the user that their account is verified, redirecting them to index.php. If the update fails, the user is asked to try the verification again.

<h4> C. Allow account lockout </h4>
For enhancement, we've added a security feature to prevent brute-force attacks by implementing an account lockout policy. This policy temporarily disables a user account after several consecutive failed login attempts. The code updates the user's database record, focusing on the failed_attempts and lockout_time fields. Here's a simplified step-by-step explanation of the process:

<h6> index.php </h6>

1) In lines 33-34, the code constructs and executes an SQL query to increment the failed_attempts counter for a user. If the query fails, an error message is displayed.
2) In lines 35-43, the code checks if failed_attempts reach 5. If so, it updates the lockout_time in the database with the current time, alerts the user about the maximum failed attempts, and redirects them to resetPassword.php. The exit() function then stops further script execution.

<h6> resetPassword.php </h6>

 1) After redirecting to resetPassword.php, the user submits their email and new password through a form.
 2) In lines 5-21, the script checks if both fields are provided. If so, it hashes the new password with password_hash() and updates the user's password in the database using a prepared statement to prevent SQL injection. After updating, it alerts the user of the successful password change and redirects them to the login page (index.php).


<h4> D. SSL Certificate </h4>


  


  



<h2> 3) Authorization </h2>
<h3> Methods Used or Implemented: </h3>
  
<h4> A. Role-based access control (RBAC) </h4>
For this,



<h4> C. Session management </h4>



<h2> 4) XSS and CSRF Prevention </h2>
<h3> Methods Used or Implemented: </h3>

<h2> 5) Database Security Principles </h2>
<h3> Methods Used or Implemented: </h3>

* Included database with db.php with custom username & password, The code uses the mysqli_connect() function to establish a connection to the MySQL database. The code checks if the connection was successful by using the ! operator to negate the result of the mysqli_connect() function. If the connection failed, the code uses the die() function to terminate the script and display an error message.


<h2> 6) File Security Principles </h2>
<h3> Methods Used or Implemented: </h3>

* Disable file directory by removing 'Indexes' in httpd.conf (Options ~~Indexes~~ FollowSymLinks Includes ExecCGI). Disabling directory indexing can improve security.
* Shortened the URL by creating .htacces file in htdocs to prevent any URL rewriting which can lead the attackers to make any changes to the folders (the .htaccess file is shown below). 
  
   
