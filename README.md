# Group-Project-2-Final-Exam
Web Application Security Final Exam

# Group Name
Innovators

# Group Members
1. Nooralya Qasrina binti Zuraimi (2118228)
2. Siddiqui Maryam (2115928)
3. Yaya ali hassane (1928095)

# Introduction
PIXLHUNT is a web application aimed to guide visitors to trending and iconic places around Kuala Lumpur. Experience the three boroughs of Kuala Lumpur with PIXLHUNT. Find out what to do, where to go, and what to eat in Kuala Lumpur - the city of contrast and diversity. Our organization focuses on Sustainable Development Goal 2 and 8. We aim to focus on Sustainable Development Goal 2 which is Zero Hunger where we will collaborate with cafes we promote in our website. We also focus on Sustainable Development Goal 8 which is Decent Work and Economic Growth while supporting and promoting local attractions and food through this website. You will also find yourself codes to redeem where this code will help attract customers to the business and introduce new customers to the place.

# Objective of the enhancements
The objective of the enhancements is to improve the security of the existing web application by implementing various security measures to protect against common vulnerabilities and ensure the safety and integrity of user data.

# Web Application Security Enhancements
1) <h3> Input Validation </h3>



2) <h3> Authentication </h3>
Authentication is the process of verifying the identity of a user. In our web application, we can implement this through user login and registration functionalities.
   <h5> Methods Used or Implemented: </h5>
   
   * Password hashing using password_hash() and password_verify()
  


   * Session management with session_start(), session_regenerate_id()
   * Secure session cookie settings
   * Multi-factor authentication (optional, but recommended for added security)
  




3) <h3> Authorization </h3>
    <h5> Methods Used or Implemented: </h5>
    Controller: AuthController.php
    

The registration method handles user input, validates it, and then saves the new user to the database.

    * Role-based access control (RBAC)
    * Session checks to ensure users have appropriate roles to access resources
    * Middleware pattern to handle authorization checks



4) <h3> XSS and CSRF Prevention </h3>

5) <h3> Database Security Principles </h3>

6) <h3> File Security Principles </h3>
   
