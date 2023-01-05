<?php
session_start();
if($_SESSION["status1"]!=true){
  $_SESSION["status1"]=false;
  header("Location: loginstudent.php");
  // die();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Student's Chamber</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="stupage.css">
  <link rel="icon" type="image/x-icon" href="Page_Logo.png">
  <script src="https://kit.fontawesome.com/7eaaa8df92.js" crossorigin="anonymous"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
    crossorigin="anonymous"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Student's Chamber</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02"
        aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav hoo ms-auto">
          <li class="nav-item">
            <button><a class="nav-link  active" href="logout.php">Log Out</a></button>
          </li>
        </ul>
      </div>
    </div>
  </nav>






  <!-- questions asked to topper -->
  <div class="first1">
    <div class="inner">
      <div><img
          src="data:image/jpeg;base64,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"
          alt="error"></div>
      <div id="usersession">
        <h3>Raj Mittal</h3>
        <div id="session"><span>🧑‍🎓</span><span>2020-2024</span>
        </div>
      </div>
      <div class="icons1">
        <a href=""><i class="fa-brands fa-instagram"></i></a>
        <a href=""><i class="fa-brands fa-linkedin"></i></a>
        <!-- <a href=""><i class="fa-brands fa-facebook"></i></a>
     <a href=""><i class="fa-brands fa-twitter"></i></a> -->
      </div>
    </div>
    <hr>
    <h2>Google</h2>
    <textarea>Hiring Process :

   Online Assessment Round
   Technical Interview Round 1
   Technical Interview Round 2
   Hiring Manager Interview
   Online Assessment Round: Platform: HackerRank.
                           
   Assessment consists of two sections:
                           
   Coding Challenge – It consists of two easy coding problems that you need to solve in 105 minutes alongwith explaining the approach and time complexity.
   I don’t remember the exact problems, but the topic covered was generally arrays(insertion in sorted array using binary search, sorting array based on 
   a condition).
                           
   Amazon Work Style Survey – This takes approx. 10-15 minutes to be completed and contains questions to assess your work ethics and principles. It also 
   tests how you approach work in general and whether you are a good fit for the company as per Amazon Leadership Principles. 
   Each question consists of two parts where you have to choose from options like most like me, somewhat like me, etc.
                           
   The next day I received a mail that I successfully passed the online assessment round and got information about the next three rounds along with some 
   preparatory materials and tips. My next two rounds were scheduled on the same day with a gap of around 3-4 hours between them.
                           
   Technical Round 1 (60 minutes): Initially, the interviewer introduced himself and asked me to do the same. Then he asked me to explain a situation 
   where I learned something new or from scratch. This discussion took 5 minutes. After that interviewer jumped to the coding question.
                           
   Question 1:  Devise a sorting algorithm
                           
   I started with a brute force algorithm and the interviewer asked me to think of an optimized way. After some hints, I was able to solve it using 
   heap and wrote the code for the same. I accidentally made a mistake which I corrected on a dry run myself. </textarea>
  </div>
  <div class="first1">
    <div class="inner">
      <div><img
          src="data:image/jpeg;base64,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"
          alt="error"></div>
      <div id="usersession">
        <h3>Raj Mittal</h3>
        <div id="session"><span>🧑‍🎓</span><span>2020-2024</span>
        </div>
      </div>
      <div class="icons1">
        <a href=""><i class="fa-brands fa-instagram"></i></a>
        <a href=""><i class="fa-brands fa-linkedin"></i></a>
        <!-- <a href=""><i class="fa-brands fa-facebook"></i></a>
     <a href=""><i class="fa-brands fa-twitter"></i></a> -->
      </div>
    </div>
    <hr>
    <h2>Google</h2>
    <textarea>Hiring Process :

   Online Assessment Round
   Technical Interview Round 1
   Technical Interview Round 2
   Hiring Manager Interview
   Online Assessment Round: Platform: HackerRank.
                           
   Assessment consists of two sections:
                           
   Coding Challenge – It consists of two easy coding problems that you need to solve in 105 minutes alongwith explaining the approach and time complexity.
   I don’t remember the exact problems, but the topic covered was generally arrays(insertion in sorted array using binary search, sorting array based on 
   a condition).
                           
   Amazon Work Style Survey – This takes approx. 10-15 minutes to be completed and contains questions to assess your work ethics and principles. It also 
   tests how you approach work in general and whether you are a good fit for the company as per Amazon Leadership Principles. 
   Each question consists of two parts where you have to choose from options like most like me, somewhat like me, etc.
                           
   The next day I received a mail that I successfully passed the online assessment round and got information about the next three rounds along with some 
   preparatory materials and tips. My next two rounds were scheduled on the same day with a gap of around 3-4 hours between them.
                           
   Technical Round 1 (60 minutes): Initially, the interviewer introduced himself and asked me to do the same. Then he asked me to explain a situation 
   where I learned something new or from scratch. This discussion took 5 minutes. After that interviewer jumped to the coding question.
                           
   Question 1:  Devise a sorting algorithm
                           
   I started with a brute force algorithm and the interviewer asked me to think of an optimized way. After some hints, I was able to solve it using 
   heap and wrote the code for the same. I accidentally made a mistake which I corrected on a dry run myself. </textarea>
  </div>
  <div class="first1">
    <div class="inner">
      <div><img
          src="data:image/jpeg;base64,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"
          alt="error"></div>
      <div id="usersession">
        <h3>Raj Mittal</h3>
        <div id="session"><span>🧑‍🎓</span><span>2020-2024</span>
        </div>
      </div>
      <div class="icons1">
        <a href=""><i class="fa-brands fa-instagram"></i></a>
        <a href=""><i class="fa-brands fa-linkedin"></i></a>
        <!-- <a href=""><i class="fa-brands fa-facebook"></i></a>
     <a href=""><i class="fa-brands fa-twitter"></i></a> -->
      </div>
    </div>
    <hr>
    <h2>Google</h2>
    <textarea>Hiring Process :

   Online Assessment Round
   Technical Interview Round 1
   Technical Interview Round 2
   Hiring Manager Interview
   Online Assessment Round: Platform: HackerRank.
                           
   Assessment consists of two sections:
                           
   Coding Challenge – It consists of two easy coding problems that you need to solve in 105 minutes alongwith explaining the approach and time complexity.
   I don’t remember the exact problems, but the topic covered was generally arrays(insertion in sorted array using binary search, sorting array based on 
   a condition).
                           
   Amazon Work Style Survey – This takes approx. 10-15 minutes to be completed and contains questions to assess your work ethics and principles. It also 
   tests how you approach work in general and whether you are a good fit for the company as per Amazon Leadership Principles. 
   Each question consists of two parts where you have to choose from options like most like me, somewhat like me, etc.
                           
   The next day I received a mail that I successfully passed the online assessment round and got information about the next three rounds along with some 
   preparatory materials and tips. My next two rounds were scheduled on the same day with a gap of around 3-4 hours between them.
                           
   Technical Round 1 (60 minutes): Initially, the interviewer introduced himself and asked me to do the same. Then he asked me to explain a situation 
   where I learned something new or from scratch. This discussion took 5 minutes. After that interviewer jumped to the coding question.
                           
   Question 1:  Devise a sorting algorithm
                           
   I started with a brute force algorithm and the interviewer asked me to think of an optimized way. After some hints, I was able to solve it using 
   heap and wrote the code for the same. I accidentally made a mistake which I corrected on a dry run myself. </textarea>
  </div>
  <footer></footer>



</body>

</html>