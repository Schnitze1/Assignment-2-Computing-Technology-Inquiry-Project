<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Character encoding and viewport settings -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Title of the webpage -->
  <title>About | Auris AI</title>
  <!-- Link to external stylesheet -->
  <link rel="stylesheet" type="text/css" href="./styles/style.css">
</head>

<body>
<!-- Header section -->
<?php include_once("header.inc"); ?>

<!-- Introduction section -->
<section class="intro-content">
  <div class="intro-content-wrapper">
    <!-- Main heading and background video -->
    <h1 class="intro-content-heading">About Us</h1>
    <video autoplay muted loop class="intro-content-video">
      <source src="./images/b2b-animation.mp4" type="video/mp4">
      <track kind="captions">
    </video>
    <!-- Subheading description -->
    <div class="ptext">
      <p class="ptext1">Making AI systems</p>
      <p class="ptext2">You can rely on</p>
    </div>
    <!-- Button to apply -->
    <a href="apply.php" class="button-black button-black-about">Join Us</a>
  </div>
</section>

<!-- Navigation section -->
<?php include_once("menu.inc"); ?>

<!-- Team section -->
<section class="team">
  <!-- Team heading -->
  <h2 id="team">The Team</h2>
  <!-- Profile container -->
  <div class="profile-container">
    <!-- Image container -->
    <div class="img-container">
      <img src="./images/tim.webp" alt="Tim's photo">
      <img src="./images/toby.webp" alt="Toby's photo">
      <img src="./images/ved.webp" alt="Ved's photo">
    </div>
    
    <!-- Information container -->
    <div class="info-container">
      <!-- Tim's information -->
      <dl class="info-content">
        <!-- Tim's details -->
        <dt>Name:</dt>
        <dd>Tim</dd>
        <dt>Student ID:</dt>
        <dd>105334128</dd>
        <dt>Course ID:</dt>
        <dd>BA-CS</dd>
        <dt>Course Major:</dt>
        <dd>Artificial Intelligence</dd>
        <dt>Discord:</dt>
        <dd><a href="https://discord.gg/wZP9hzdD">Group Discord</a></dd>
        <dt>Email:</dt>
        <dd><a href="mailto:105334128@student.swin.edu.au">105334128@student.swin.edu.au</a></dd>
        <dt>Favorite Music Artist:</dt>
        <dd>Kendrick Lamar</dd>
        <dt>Favorite Song:</dt>
        <dd>Humble</dd>
        <dt>Favorite Movie:</dt>
        <dd>Intersteller</dd>
        <dt>Favorite TV Show:</dt>
        <dd>Drive to Survive</dd>
      </dl>

      <!-- Toby's information -->
      <dl class="info-content">
        <!-- Toby's details -->
        <dt>Name:</dt>
        <dd>Toby</dd>
        <dt>Student ID:</dt>
        <dd>105355132</dd>
        <dt>Course ID:</dt>
        <dd>BA-CSPROF</dd>
        <dt>Course Major:</dt>
        <dd>Cybersecurity</dd>
        <dt>Discord:</dt>
        <dd><a href="https://discord.gg/wZP9hzdD">Group Discord</a></dd>
        <dt>Email:</dt>
        <dd><a href="mailto:105355132@student.swin.edu.au">105355132@student.swin.edu.au</a></dd>
        <dt>Favorite Music Artist:</dt>
        <dd>TWICE</dd>
        <dt>Favorite Song:</dt>
        <dd>Gone</dd>
        <dt>Favorite Movie:</dt>
        <dd>Across the Spider-Verse</dd>
        <dt>Favorite TV Show:</dt>
        <dd>Cyberpunk: Edgerunners</dd>
      </dl>

      <!-- Ved's information -->
      <dl class="info-content">
        <!-- Ved's details -->
        <dt>Name:</dt>
        <dd>Ved</dd>
        <dt>Student ID:</dt>
        <dd>104762184</dd>
        <dt>Course ID:</dt>
        <dd>BA-CS</dd>
        <dt>Course Major:</dt>
        <dd>Artificial Intelligence</dd>
        <dt>Discord:</dt>
        <dd><a href="https://discord.gg/wZP9hzdD">Group Discord</a></dd>
        <dt>Email:</dt>
        <dd><a href="mailto:104762184@student.swin.edu.au">104762184@student.swin.edu.au</a></dd>
        <dt>Favorite Music Artist:</dt>
        <dd>Justin Bieber</dd>
        <dt>Favorite Song:</dt>
        <dd>Harvey-her</dd>
        <dt>Favorite Movie:</dt>
        <dd>The Bee Movie</dd>
        <dt>Favorite TV Show:</dt>
        <dd>The Big Bang Theory</dd>
      </dl>
    </div>
  </div>
</section>

<!-- Timetable section -->
<section class="timetable" id="timetable">
  <!-- Timetable heading -->
  <h1 class="timetable_h1text">Timetable</h1>
  <!-- Timetable -->
  <table>
    <!-- Table headers -->
    <thead>
      <tr>
        <td></td>
        <td></td>
        <th>&nbsp;Monday&nbsp;</th>
        <th>&nbsp;Tuesday&nbsp;</th>
        <th>&nbsp;Wednesday&nbsp;</th>
        <th>&nbsp;Thursday&nbsp;</th>
        <th>&nbsp;Friday&nbsp;</th>
      </tr>
    </thead>
    <!-- Timetable rows -->
    <tbody>
      <tr>
        <td id="am" rowspan="8"></td>
        <td>&nbsp;08:00&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;08:30&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;09:00&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;09:30&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;10:00&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;10:30&nbsp;</td>
        <td rowspan="5" class="class">
          <section class="sectionBox">
            <a href="./images/EN402.png">EN402</a>
          </section>
        </td>
        <td rowspan="5" class="class">
          <section class="sectionBox">
            <a href="./images/ATC101.png">ATC101</a>
          </section>
        </td>
        <td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;11:00&nbsp;</td>
        <td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;11:30&nbsp;</td>
        <td></td><td></td><td></td>
      </tr>
      <tr>
        <td id="pm" rowspan="18"></td>
        <td>&nbsp;12:00&nbsp;</td>
        <td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;12:30&nbsp;</td>
        <td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;13:00&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;13:30&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;14:00&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;14:30&nbsp;</td>
        <td></td>
        <td rowspan="3" class="class">
          <section class="sectionBox">
            <a href="./images/ATC101.png">ATC101</a>
          </section>
        </td>
        <td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;15:00&nbsp;</td>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;15:30</td>
        <td rowspan="6" class="class">
          <section class="sectionBox">
            <a href="./images/ATC627.png">ATC627</a>
          </section>
        </td>
        <td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;16:00&nbsp;</td>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;16:30&nbsp;</td>
        <td rowspan="5" class="class">
          <section class="sectionBox">
            <a href="./images/EN401.png">EN401</a>
          </section>
        </td>
        <td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;17:00&nbsp;</td>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;17:30&nbsp;</td>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;18:00&nbsp;</td>
        <td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;18:30&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;19:00&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;19:30&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;20:00&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
      <tr>
        <td>&nbsp;20:30&nbsp;</td>
        <td></td><td></td><td></td><td></td><td></td>
      </tr>
    </tbody>
  </table>
</section>


<br>
<!-- Team photo section -->
<section class="team">
  <img id="grppic" src="./images/group_pic.webp" alt="Team Group Photo"/>
</section>

<br><br>
<!-- Footer section -->
<?php include_once("footer.inc"); ?>
</body>
</html>