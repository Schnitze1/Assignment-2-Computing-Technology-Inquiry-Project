<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Character encoding and viewport settings -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the webpage -->
    <title>Apply | Auris AI</title>
    <!-- Link to external stylesheet -->
    <link rel="stylesheet" type="text/css" href="./styles/style.css">
    <script>
        function toggleAdditionalSkills() {
            var checkbox = document.getElementById("enableAdditionalSkills");
            var textarea = document.getElementById("addSkills");
            textarea.disabled = !checkbox.checked;
            if (!checkbox.checked) {
                textarea.value = ""; // Clear textarea if checkbox is unchecked
            }
        }
    </script>
</head>

<body>
<!-- Header section -->
<?php include_once("header.inc"); ?>



<!-- Introduction section -->
<section class="intro-content">
    <div class="intro-content-wrapper">
        <!-- Main heading and background video -->
        <h1 class="intro-content-heading">Job Applications</h1>
        <video autoplay muted loop class="intro-content-video">
            <source src="./images/b2b-animation.mp4" type="video/mp4">
            <track kind="captions">
        </video>
        <!-- Subheading description -->
        <h2 class="intro-content-subheading">
            As an applicant, join our vibrant team <br> where creativity thrives and innovation <br> is celebrated.
            Expect daily challenges,<br> providing  meaningful contributions,<br> embracing diversity, and problem-solving.
        </h2>
    </div>
</section>

<!-- Navigation section -->
<?php include_once("menu.inc"); ?>

<!-- Application form section-->
<section class="application-content">
    <div class = "apply-container">
        <div class = "apply-container-content">
            <form method="post" action="processEOI.php" id="form">
                <!-- Form for job application -->
                <fieldset>
                    <legend>Application Form</legend>
                    <!-- Input fields for job application details -->
                    <p>
                        <label for="referenceID">Job Reference Number</label>
                        <input type="text" name= "referenceID" id="referenceID" maxlength="6" size="10" required="required" pattern="[A-Z]{2}-[0-9]{3}" placeholder="AB-123" />
                    </p>
                    <!-- Input fields for first and last name -->
                    <p>
                        <label for="firstname">Given Name(s)</label>
                        <input type="text" name= "firstname" id="firstname" maxlength="20" size="10" required="required" pattern="^[^0-9]+$"/>
                        <label for="surname">Family Name</label>
                        <input type="text" name= "surname" id="surname" maxlength="20" size="10" required="required" pattern="^[^0-9]+$"/>
                    </p>
                    <!-- Input calendar for date of birth -->
                    <p>
                        <label for="dob">Date of Birth</label>
                        <br>
                        <input type="date" id="dob" name="dob" required>
                    </p>
                    <!-- Radio buttons for pronouns -->
                    <p>
                        <label>Pronouns</label>
                        <br>
                        <input type="radio" id="he" name="category[]" value="He/Him"/>
                        <label for="he">He/Him</label>
                        <br>
                        <input type="radio" id="she" name="category[]" value="She/Her"/>
                        <label for="she">She/Her</label>
                        <br>
                        <input type="radio" id="they" name="category[]" value="They/Them"/>
                        <label for="they">They/Them</label>
                    </p>
                    <!-- Input field for street address and icon -->
                    <p>
                        <img src="./images/house.png" alt="House image" class="icon">
                        <label for="address">Street Address</label>
                        <input type="text" name= "address" id="address" maxlength="20" size="20" required="required" />
                    </p>
                    <!-- Input field for suburb/town -->
                    <p>
                        <label for="suburb">Suburb/Town</label>
                        <input type="text" name= "suburb" id="suburb" maxlength="20" size="10" required="required" />
                    </p>
                    <!-- Select dropdown for state selection -->
                    <p>
                        <label for="state">State</label>
                        <select name="state" id="state">
                            <option value="">Please Select</option>                        
                            <option value="ACT">ACT</option>
                            <option value="NSW">NSW</option>
                            <option value="NT">NT</option>
                            <option value="QLD">QLD</option>
                            <option value="SA">SA</option>
                            <option value="TAS">TAS</option>
                            <option value="VIC">VIC</option>
                            <option value="WA">WA</option>
                        </select>
                    </p>
                    <!-- Input field for postcode -->
                    <p>
                        <label for="postcode">Postcode</label>
                        <input type="text" name= "postcode" id="postcode" maxlength="4" size="4" required="required" pattern="[0-9]{4}" placeholder="1234" />
                    </p>
                    <!-- Input field for email and icon -->
                    <p>
                        <img src="./images/email.png" alt="Email image" class="icon">
                        <label for="email">Email</label>
                        <input type="email" name= "email" id= "email" size="30" required="required" placeholder="test@exmaple.com" />
                    </p>
                    <p>
                        <!-- Input field for phone number and icon -->
                        <img src="./images/phone.png" alt="Phone image" class="icon">
                        <label for="phone">Phone Number</label>
                        <input type="text" name= "phone" id="phone" maxlength="10" size="10" required="required" pattern="[0-9]{10}" placeholder="xxxx-xxx-xxx" />
                    </p>
                    <!-- Checkboxes for skills -->
                    <p>
                        <label>Skills List</label>
                        <br>
                        <input type="checkbox" id="skillProgram" name="skillProgram" value="True">
                        <label for="skillProgram">Programming</label>
                        <br>
                        <input type="checkbox" id="skillWeb" name="skillWeb" value="True">
                        <label for="skillWeb">Web Development</label>
                        <br>
                        <input type="checkbox" id="skillNetwork" name="skillNetwork" value="True">
                        <label for="skillNetwork">Networking</label>
                        <br>
                        <input type="checkbox" id="skillDB" name="skillDB" value="True">
                        <label for="skillDB">Database Management</label>
                    </p>
                    <p>


                    <!-- Textarea for additional skills -->
                        <label for="addSkills">Additional Skills</label>
                        <!-- Checkbox to enable additional skills -->
                    <p>
                        <input type="checkbox" id="enableAdditionalSkills" onchange="toggleAdditionalSkills()">
                        <label for="enableAdditionalSkills">Additional Skills</label>
                    </p>
                        <textarea name= "addSkills" id="addSkills" cols="40" rows="10" disabled></textarea>
                    </p>
                </fieldset>
                <!-- Form buttons -->
                <div class="formButtons">
                    <!-- Button to reset form -->
                    <input class="button-black" type= "reset" value="Restart Application"/>
                    <!-- Button to submit form -->
                    <input class="button-black" type= "submit" value="Submit Application"/>
                </div>
            </form>
        </div>
    </div>
</section>

<!-- Footer section -->
<?php include_once("footer.inc"); ?>
</body>
</html>