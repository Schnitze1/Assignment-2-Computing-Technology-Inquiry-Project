<?php
require_once ("settings.php"); //connection info
$conn = mysqli_connect($host, $user, $pwd, $sql_db);
if (!$conn) {
    echo "<p>Database connection failure</p>";
} else {
    // Connection success


    $sql_table = "Postcodes"; // Postcodes table
    $postcode = mysqli_real_escape_string($conn, $_POST["postcode"]);
    $state = mysqli_real_escape_string($conn, $_POST["state"]);

    // Validation for postcode ranges based on state
    $valid_ranges = array(
        'ACT' => array(200, 299),
        'NSW' => array(1000, 2999),
        'NT' => array(800, 899),
        'QLD' => array(4000, 4999),
        'SA' => array(5000, 5999),
        'VIC' => array(3000, 3999),
        'TAS' => array(7000, 7999),
        'WA' => array(6000, 6999)
    );
    if (!array_key_exists($state, $valid_ranges) || $postcode < $valid_ranges[$state][0] || $postcode > $valid_ranges[$state][1]) {
        echo "<p class=\"wrong\">Invalid postcode for the selected state</p>";
    } else {
        $query = "INSERT INTO $sql_table (postcode, state) VALUES ('$postcode', '$state')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
        } else {
            echo "<p class=\"ok\">Successfully added application</p>";
        }

        $sql_table = "Address"; // Address Table
        $address = trim($_POST["address"]);
        $suburb = trim($_POST["suburb"]);
        $query_select = "SELECT PostcodeID FROM Postcodes ORDER BY PostcodeID DESC LIMIT 1";
        $result_select = mysqli_query($conn, $query_select);
        $row = mysqli_fetch_assoc($result_select);
        $postcodeID = $row['PostcodeID'];
        $query = "INSERT INTO $sql_table (StreetAddress, SuburbOrTown, PostcodeID) VALUES ('$address', '$suburb', '$postcodeID')";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
        } else {
            echo "<p class=\"ok\">Successfully added application</p>";
        }

        $sql_table = "EOI"; // EOI Table
        $referenceID = trim($_POST["referenceID"]);
        $firstname = trim($_POST["firstname"]);
        $surname = trim($_POST["surname"]);
        $dob = trim($_POST["dob"]);

        // Date of birth validation for age between 15 and 80 years
        $currentDate = new DateTime();
        $maxDob = $currentDate->modify('-15 years')->format('Y-m-d');
        $minDob = $currentDate->modify('-65 years')->format('Y-m-d'); // 80 years - 15 years = 65 years ago from the -15 years date

        if ($dob < $minDob || $dob > $maxDob) {
            echo "<p class=\"wrong\">Date of birth must be between 15 and 80 years old.</p>";
        } else {
            $pronouns = isset($_POST['category']) ? $_POST['category'][0] : "No Pronouns Selected";
            $addSkills = isset($_POST["enableAdditionalSkills"]) ? trim($_POST["addSkills"]) : "";
            $email = trim($_POST["email"]);
            $phone = trim($_POST["phone"]);
            $skillProgram = isset($_POST["skillProgram"]) ? "1" : "0";
            $skillWeb = isset($_POST["skillWeb"]) ? "1" : "0";
            $skillNetwork = isset($_POST["skillNetwork"]) ? "1" : "0";
            $skillDB = isset($_POST["skillDB"]) ? "1" : "0";
            $addSkills = trim($_POST["addSkills"]);

            $query_select = "SELECT AddressID FROM Address ORDER BY AddressID DESC LIMIT 1";
            $result_select = mysqli_query($conn, $query_select);
            $row = mysqli_fetch_assoc($result_select);
            $addressID = $row['AddressID'];
            $query = "INSERT INTO $sql_table (JobReferenceNumber, FirstName, LastName, DateOfBirth, Gender, EmailAddress, PhoneNumber, AddressID, SkillProgram, SkillWeb, SkillNetwork, SkillDB, AdditionalSkills) VALUES ('$referenceID', '$firstname', '$surname', '$dob', '$pronouns', '$email', '$phone', '$addressID', '$skillProgram', '$skillWeb', '$skillNetwork', '$skillDB', '$addSkills')";

            $result = mysqli_query($conn, $query);
            if (!$result) {
                echo "<p class=\"wrong\">Something is wrong with ", $query, "</p>";
            } else {
                echo "<p class=\"ok\">Successfully added application</p>";
            }
        }

        // Close the database connection
        mysqli_close($conn);
    }
}
?>