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
Improved version of PIXLHUNT web app with security features added onto the original web technologies class project.
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

   The password_hash() function, which is a component of PHP's built-in secure password hashing capabilities, is used to implement password hashing in the excerpted register.php file. 

<h6>register.php</h6>

1) In lines 11-15, we collected user input from a form submission using the $_POST superglobal. This includes the user's chosen password, username, email, and role. 
2) In lines 18-30, before hashing the password, the script checks that the password matches the confirmation, verifies the email format, and ensures user chose between two roles only.
3) In line 33, once the input is validated, the script hashes the user's password using the password_hash() function. 
4) In lines 39-43, the hashed password is then stored in a session variable along with other user details. This is a temporary step before the user details, including the hashed password, are stored in a database.

<h6>login.php</h6>

1) After registering, the user is redirected to login.php to submit their username, password, and role. The server retrieves the hashed password for the submitted username from the database if it exists.
2) In line 18, the script uses the password_verify() function to compare the submitted password with the stored hashed password. If password_verify($password, $user['password']) returns true, the user is authenticated. If it returns false, the user is not authenticated.
   
<h4> B. Two-factor authentication through email verification </h4>
   
For this enhancement, we added 2FA via email. The user enters their username, email, and role, receives an OTP, and enters it correctly to be redirected to the login page. This involves three pages: register.php, verification.php, and index.php.

<h6>register.php</h6>
    
1) An OTP and the user's email are generated and stored in the session for the verification process.
2) In lines 49-58, PHPMailer uses Gmail's SMTP server with the provided username and password. Port 587 and the SMTPSecure protocol with STARTTLS ensure secure email transmission.
3) In lines 60-67, the sender's email is set to pixlhunt37@gmail.com as "PixlHunt". The email is sent to the user's address, containing the OTP and instructions for verification.
4) In lines 70 -76, an SQL statement inserts the user's details into the users database table, including username, email, hashed password, role, OTP, and a false is_verified flag. After sending the verification email, the user is redirected to verification.php.
       
<h6> verification.php </h6>

1) This page handles OTP verification, where the user inputs the OTP sent to their email to complete 2FA.
2) In lines 21-41, the script compares the session-stored OTP ($stored_otp) with the user-entered OTP ($otp_code). The user gets an "Invalid OTP code" message if they don't match. If they match, the script updates the user's verification status in the database, setting is_verified to true for the user's email. It then clears the session data and alerts users that their account is verified, redirecting them to index.php. If the update fails, the user is asked to try the verification again.

<h4> C. Allow account lockout </h4>
For enhancement, we've added a security feature to prevent brute-force attacks by implementing an account lockout policy. This policy temporarily disables a user account after several consecutive failed login attempts. The code updates the user's database record, focusing on the failed_attempts and lockout_time fields. 

<h6> index.php </h6>

1) In lines 31-32, the code constructs and executes an SQL query to increment the failed_attempts counter for a user. If the query fails, an error message is displayed.
2) In lines 33-41, the code checks if failed_attempts reach 5. If so, it updates the lockout_time in the database with the current time, alerts the user about the maximum failed attempts, and redirects them to resetPassword.php. The exit() function then stops further script execution.

<h6> resetPassword.php </h6>

 1) After redirecting to resetPassword.php, the user submits their email and new password through a form.
 2) In lines 17-38, the script checks if both fields are provided. If so, it hashes the new password with password_hash() and updates the user's password in the database using a prepared statement to prevent SQL injection. After updating, it alerts the user of the successful password change and redirects them to the login page (index.php).

<h4> D. SSL Certificate </h4>
<img width = "650" src="enhancement/SSL Image .png">
To enhance our local XAMPP server's security and align with web authentication best practices, we implemented SSL (Secure Sockets Layer). This involved configuring the makecert.bat file to generate a new SSL certificate (server.crt) and a private key (server.key).

<h2> 3) Authorization </h2>
<h3> Methods Used or Implemented: </h3>
  
<h4> A. Role-based access control (RBAC) </h4>
In this application, security and user access are managed through Role-Based Access Control (RBAC) and secure session management. There are two roles: admin and user. Admins have full rights to perform all CRUD (Create, Read, Update, Delete) operations on user data, while regular users can only view content. This is implemented in index.php for login and session management, and admin.php for managing users. Sessions keep track of user authentication and roles securely, using cookies that are only sent over HTTPS and cannot be accessed by JavaScript, ensuring proper access control during user interactions.

<h6> admin.php </h6>
1) Access Control: The session role is checked at the start of admin.php. Non-admin users are redirected to the homepage or login page with a message.
2) CRUD Operations:
   * Create: Admins can add new users by providing a username, email, role, and password. The password is securely hashed before saving.
   * Read: Admins see a list of all users, displaying usernames, emails, and roles.
   * Update: Admins can change a user’s email or role. Passwords are not changed here.
   * Delete: Admins can delete users by specifying the username, affecting only the chosen user account.

<h4> C. Session management </h4>
For this enhancement, user sessions are managed to maintain their authenticated state and permissions throughout their interaction with the system.

<h5> Secure Session Handling: </h5>

1) Sessions are initialized securely in login.php and other pages where needed. We start the session only if it’s not already active.
2) Cookies for sessions are configured to be transmitted only over secure HTTPS connections and are inaccessible to JavaScript (httponly), protecting against common web vulnerabilities.

<h5> Session Initialization and ID Generation: </h5>

1) A unique session ID is generated for each user session to prevent session fixation attacks. This is achieved using session_regenerate_id(true) which refreshes the session ID while retaining the session data.
2) A unique identifier (user_id) is generated and stored in the session if it is not already set, ensuring that each session is uniquely identifiable.

<h5> Session Usage Across Pages: </h5>

1) In index.php, sessions manage user login status and role, directing users to appropriate pages based on their roles.
2) In admin.php, sessions ensure only users with admin roles can access and manage user data.
3) The auth_session.php file typically includes functions that check and maintain session state, providing a consistent way to verify user authentication and roles across different pages.

<h2> 4) XSS and CSRF Prevention </h2>
<h3> Methods Used or Implemented: </h3>
### 4) XSS and CSRF Prevention

#### Methods Used or Implemented:

##### admin.php page

**Code Enhancements**

**XSS (Cross-Site Scripting) Prevention**

- **Implementation:**

  - **Input Sanitization:** The script employs `htmlspecialchars()` function to sanitize user inputs (`$_POST['username']`, `$_POST['email']`, `$_POST['role']`) before processing them further. This function converts special characters to HTML entities, preventing any potential XSS attacks by ensuring that user-provided data is treated as plain text when echoed back into HTML context.

    ```php
    $username = htmlspecialchars(trim($_POST['username']), ENT_QUOTES, 'UTF-8');
    ```

  - **Output Escaping:** When displaying user data in the HTML table (`<td>`), each echoed variable (`$row["username"]`, `$row["email"]`, `$row["role"]`) is also passed through `htmlspecialchars()` to ensure that any HTML special characters are encoded. This practice prevents XSS attacks when rendering dynamic content retrieved from the database.

    ```php
    echo "<td>" . htmlspecialchars($row["username"], ENT_QUOTES, 'UTF-8') . "</td>";
    ```

**CSRF (Cross-Site Request Forgery) Prevention**

- **register.php, resetPassword.php:**

  - **Implementation:**

    - **CSRF Token Usage:** Each form in the script includes a hidden input field (`<input type="hidden" name="csrf_token" ...>`) that contains a CSRF token. This token is generated using a server-side function (`generateCsrfToken()`) and validated against the token stored in the session (`validateCsrfToken()` function) before processing any form submission (create, update, delete).

      ```php
      <input type="hidden" name="csrf_token" value="<?php echo generateCsrfToken(); ?>">
      ```

    - **Token Validation:** Before executing any user operation (create, update, delete), the script checks if the CSRF token submitted (`$_POST['csrf_token']`) matches the token stored in the session. If the tokens do not match, the script terminates the operation with an error message, preventing CSRF attacks by ensuring that the request originates from the expected user session.

      ```php
      if (!isset($_POST['csrf_token']) || !validateCsrfToken($_POST['csrf_token'])) {
          die("CSRF token validation failed. <a href='register.php'>Go back</a>");
      }
      ```

##### register.php page

**XSS (Cross-Site Scripting) Prevention**

- **Implementation:**

  - **Input Sanitization:** Uses `htmlspecialchars()` function to sanitize user inputs retrieved via `$_POST` before processing or displaying them in HTML context, preventing XSS attacks by converting special characters to HTML entities.

  - **Output Escaping:** Ensures that dynamic data echoed into HTML (e.g., OTP in the email body) is passed through `htmlspecialchars()` to encode special characters, ensuring secure rendering of user-provided content.


**Input Validation also used login.php, admin**

- **Sanitization and Validation:** Validates email format using `filter_var()` with `FILTER_VALIDATE_EMAIL` filter to ensure correct email format before proceeding with registration.

  - Validates role input to ensure it's either 'admin' or 'user', preventing unauthorized role types from being accepted.

  - Validates password and confirm password fields to ensure they match before processing registration.

- **Server-Side and Client-Side Validation**

  - **JavaScript Function (`validateForm()`):** Implements client-side validation using JavaScript to check for required fields, correct format of inputs (username, email), password length, and matching passwords before submitting the form.

  - Provides immediate feedback to users on invalid inputs, reducing unnecessary server requests and improving user experience.

<h2> 5) Database Security Principles </h2>
<h3> Methods Used or Implemented: </h3>

* Included database with db.php with custom username & password, The code uses the mysqli_connect() function to establish a connection to the MySQL database. The code checks if the connection was successful by using the ! operator to negate the result of the mysqli_connect() function. If the connection failed, the code uses the die() function to terminate the script and display an error message.


<h2> 6) File Security Principles </h2>
<h3> Methods Used or Implemented: </h3>

* Disable file directory by removing 'Indexes' in httpd.conf (Options ~~Indexes~~ FollowSymLinks Includes ExecCGI). Disabling directory indexing can improve security.
* Shortened the URL by creating .htacces file in htdocs to prevent any URL rewriting which can lead the attackers to make any changes to the folders (the .htaccess file is shown below). 
  
   
