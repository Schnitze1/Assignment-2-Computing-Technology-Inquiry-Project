<?php
session_start();

// Check for inactivity
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity'] > 300)) {
    session_unset();
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
$_SESSION['last_activity'] = time(); // Update last activity time

// Check for failed login attempts
if (!isset($_SESSION['failed_login_attempts'])) {
    $_SESSION['failed_login_attempts'] = 0;
}

// Lockout duration in seconds
$lockout_duration = 15;

if ($_SESSION['failed_login_attempts'] >= 3 && isset($_SESSION['lockout_time']) && time() - $_SESSION['lockout_time'] < $lockout_duration) {
    // User is locked out
    echo "Error: Too many login attempts. Please try again after $lockout_duration seconds.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    // Authenticate user
    require_once("settings.php"); // Connection info
    $conn = mysqli_connect($host, $user, $pwd, $sql_db);

    if (!$conn) {
        echo "Database connection failure";
    } else {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query = "SELECT * FROM admin_credentials WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['loggedin'] = true;
        } else {
            // Increment failed login attempts
            $_SESSION['failed_login_attempts']++;

            if ($_SESSION['failed_login_attempts'] >= 3) {
                // Set lockout time
                $_SESSION['lockout_time'] = time();
            }

            $login_error = "Invalid username or password";
        }
        mysqli_close($conn);
    }
}

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Show login form if not logged in
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login</title>
    </head>
    <body>
    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="submit" name="login" value="Login">
        <a type="submit" href="about.php">Back</a>

    </form>
    <?php
    if (isset($login_error)) {
        echo "<p style='color:red;'>$login_error</p>";
    }
    ?>
    </body>
    </html>
    <?php
    exit();
}

// Continue with the administration panel if logged in
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Administration Panel</title>
</head>
<body>
<h1>Administration Panel</h1>
<form method="post" action="">
    <input type="submit" name="logout" value="Logout">
</form>
<form method="post" action="">
    <!-- Show All button -->
    <p><strong><label for="show_all">Show All</label>
            <input type="submit" name="show_all" value="Click Here"></strong></p>
    <!-- Job Position search box -->
    <p><strong><label for="job_reference">Job Position search box:</label></strong></p>
    <p><input type="text" name="job_reference" id="job_reference">
        <input type="submit" name="search_by_job_reference" value="Search"></p>
    <!-- Search by Applicant -->
    <p><strong>Search by applicant name:</strong></p>
    <p><label for="applicant_first_name">First name:</label>
        <input type="text" name="applicant_first_name" id="applicant_first_name">
        <label for="applicant_last_name">Last Name:</label>
        <input type="text" name="applicant_last_name" id="applicant_last_name">
        <input type="submit" name="search_by_applicant" value="Search"></p>
    <!-- Delete all EOIs with specified job reference number -->
    <p><strong><label for="delete_job_reference">Delete all EOIs with specified job reference number:</label></strong></p>
    <p><input type="text" name="delete_job_reference" id="delete_job_reference">
        <input type="submit" name="delete_by_job_reference" value="Delete"></p>
    <!-- Change the Status of an EOI -->
    <p><strong>Change status of EOI:</strong></p>
    <p><label for="change_eoi_number">EOI Number:</label>
        <input type="text" name="change_eoi_number" id="change_eoi_number">
        <label for="change_status"> Update Status to:</label>
        <select name="change_status" id="change_status">
            <option value="New">New</option>
            <option value="Current">Current</option>
            <option value="Final">Final</option>
            <input type="submit" name="change_eoi_status" value="Change"></p>
</form>
<?php
// Process administration actions
if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['login']) && !isset($_POST['logout'])) {
    // Handle Show All button
    if (isset($_POST["show_all"])) {
        // Perform action to show all records in the EOI table
        require_once("settings.php");
        $conn = mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            echo "<p>Database connection failure</p>";
        } else {
            // Perform SQL query to select all records from the EOI table
            $query = "SELECT * FROM EOI";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "<p>Error fetching records from the EOI table</p>";
            } else {
                // Display the fetched records
                echo "<h2>All Records in EOI Table</h2>";
                echo "<table border='1'>";
                echo "<tr>\n "
                    . "<th scope=\"col\">EOI Number</th>\n "
                    . "<th scope=\"col\">Reference Number</th>\n "
                    . "<th scope=\"col\">First Name</th>\n "
                    . "<th scope=\"col\">Last Name</th>\n "
                    . "<th scope=\"col\">DOB</th>\n "
                    . "<th scope=\"col\">Gender</th>\n "
                    . "<th scope=\"col\">Address ID</th>\n "
                    . "<th scope=\"col\">Email</th>\n "
                    . "<th scope=\"col\">Phone Number</th>\n "
                    . "<th scope=\"col\">Programming</th>\n "
                    . "<th scope=\"col\">Web Development</th>\n "
                    . "<th scope=\"col\">Networking</th>\n "
                    . "<th scope=\"col\">Database Management</th>\n "
                    . "<th scope=\"col\">Additional Skills</th>\n "
                    . "<th scope=\"col\">Application Status</th>\n "
                    . "</tr>\n ";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n ";
                    echo "<td>", $row["EOINumber"], "</td>\n ";
                    echo "<td>", $row["JobReferenceNumber"], "</td>\n ";
                    echo "<td>", $row["FirstName"], "</td>\n ";
                    echo "<td>", $row["LastName"], "</td>\n ";
                    echo "<td>", $row["DateOfBirth"], "</td>\n ";
                    echo "<td>", $row["Gender"], "</td>\n ";
                    echo "<td>", $row["AddressID"], "</td>\n ";
                    echo "<td>", $row["EmailAddress"], "</td>\n ";
                    echo "<td>", $row["PhoneNumber"], "</td>\n ";
                    echo "<td>", $row["SkillProgram"], "</td>\n ";
                    echo "<td>", $row["SkillWeb"], "</td>\n ";
                    echo "<td>", $row["SkillNetwork"], "</td>\n ";
                    echo "<td>", $row["SkillDB"], "</td>\n ";
                    echo "<td>", $row["AdditionalSkills"], "</td>\n ";
                    echo "<td>", $row["ApplicationStatus"], "</td>\n ";
                    echo "</tr>\n ";
                }
            }

            // Close the database connection
            mysqli_close($conn);
        }
    } // if search by job reference is selected
    else if (isset($_POST["search_by_job_reference"])) {
        // Perform action to show all records in the EOI table
        require_once("settings.php");
        $conn = mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            echo "<p>Database connection failure</p>";
        } else {
            // Perform SQL query to show EOIs for specific reference number
            $job_reference = mysqli_real_escape_string($conn, $_POST["job_reference"]);
            $query = "SELECT * FROM EOI where JobReferenceNumber = '$job_reference'";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "<p>Error fetching records from the EOI table</p>";
                echo "<p class=\"error\">MySQL Error: " . mysqli_error($conn) . "</p>";
            } else {
                // Display the fetched records
                echo "<h2>All Records in EOI Table</h2>";
                echo "<table border='1'>";
                echo "<tr>\n "
                    . "<th scope=\"col\">EOI Number</th>\n "
                    . "<th scope=\"col\">Reference Number</th>\n "
                    . "<th scope=\"col\">First Name</th>\n "
                    . "<th scope=\"col\">Last Name</th>\n "
                    . "<th scope=\"col\">DOB</th>\n "
                    . "<th scope=\"col\">Gender</th>\n "
                    . "<th scope=\"col\">Address ID</td>\n "
                    . "<th scope=\"col\">Email</th>\n "
                    . "<th scope=\"col\">Phone Number</th>\n "
                    . "<th scope=\"col\">Programming</th>\n "
                    . "<th scope=\"col\">Web Development</th>\n "
                    . "<th scope=\"col\">Networking</th>\n "
                    . "<th scope=\"col\">Database Management</th>\n "
                    . "<th scope=\"col\">Additional Skills</th>\n "
                    . "<th scope=\"col\">Application Status</th>\n "
                    . "</tr>\n ";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n ";
                    echo "<td>", $row["EOINumber"], "</td>\n ";
                    echo "<td>", $row["JobReferenceNumber"], "</td>\n ";
                    echo "<td>", $row["FirstName"], "</td>\n ";
                    echo "<td>", $row["LastName"], "</td>\n ";
                    echo "<td>", $row["DateOfBirth"], "</td>\n ";
                    echo "<td>", $row["Gender"], "</td>\n ";
                    echo "<td>", $row["AddressID"], "</td>\n ";
                    echo "<td>", $row["EmailAddress"], "</td>\n ";
                    echo "<td>", $row["PhoneNumber"], "</td>\n ";
                    echo "<td>", $row["SkillProgram"], "</td>\n ";
                    echo "<td>", $row["SkillWeb"], "</td>\n ";
                    echo "<td>", $row["SkillNetwork"], "</td>\n ";
                    echo "<td>", $row["SkillDB"], "</td>\n ";
                    echo "<td>", $row["AdditionalSkills"], "</td>\n ";
                    echo "<td>", $row["ApplicationStatus"], "</td>\n ";
                    echo "</tr>\n ";
                }
            }

            // Close the database connection
            mysqli_close($conn);
        }
    } // if search by applicant name is selected
    else if (isset($_POST["search_by_applicant"])) {
        // Perform action to show all records in the EOI table
        require_once("settings.php");
        $conn = mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            echo "<p>Database connection failure</p>";
        } else {
            // Gets the user input for first or last name
            $ApplicantFirstName = mysqli_real_escape_string($conn, $_POST["applicant_first_name"]);
            $ApplicantLastName = mysqli_real_escape_string($conn, $_POST["applicant_last_name"]);
            // if only last name is given, searches for last name
            if (empty($ApplicantFirstName) && !empty($ApplicantLastName)) {
                $query = "SELECT * FROM EOI where LastName = '$ApplicantLastName'";
            } // if only first name is given
            else if (!empty($ApplicantFirstName) && empty($ApplicantLastName)) {
                $query = "SELECT * FROM EOI where FirstName = '$ApplicantFirstName'";
            } // if both first and last names are given
            else if (!empty($ApplicantFirstName) && !empty($ApplicantLastName)) {
                $query = "SELECT * FROM EOI where FirstName = '$ApplicantFirstName' AND LastName = '$ApplicantLastName'";
            } // if neither is given, asks user to enter name
            else {
                echo "<p>Please enter a name</p>";
            }


            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "<p>Error fetching records from the EOI table</p>";
                echo "<p class=\"error\">MySQL Error: " . mysqli_error($conn) . "</p>";
            } else {
                // Display the fetched records
                echo "<h2>All Records in EOI Table</h2>";
                echo "<table border='1'>";
                echo "<tr>\n "
                    . "<th scope=\"col\">EOI Number</th>\n "
                    . "<th scope=\"col\">Reference Number</th>\n "
                    . "<th scope=\"col\">First Name</th>\n "
                    . "<th scope=\"col\">Last Name</th>\n "
                    . "<th scope=\"col\">DOB</th>\n "
                    . "<th scope=\"col\">Gender</th>\n "
                    . "<th scope=\"col\">Address ID</th>\n "
                    . "<th scope=\"col\">Email</th>\n "
                    . "<th scope=\"col\">Phone Number</th>\n "
                    . "<th scope=\"col\">Programming</th>\n "
                    . "<th scope=\"col\">Web Development</th>\n "
                    . "<th scope=\"col\">Networking</th>\n "
                    . "<th scope=\"col\">Database Management</th>\n "
                    . "<th scope=\"col\">Additional Skills</th>\n "
                    . "<th scope=\"col\">Application Status</th>\n "
                    . "</tr>\n ";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n ";
                    echo "<td>", $row["EOINumber"], "</td>\n ";
                    echo "<td>", $row["JobReferenceNumber"], "</td>\n ";
                    echo "<td>", $row["FirstName"], "</td>\n ";
                    echo "<td>", $row["LastName"], "</td>\n ";
                    echo "<td>", $row["DateOfBirth"], "</td>\n ";
                    echo "<td>", $row["Gender"], "</td>\n ";
                    echo "<td>", $row["AddressID"], "</td>\n ";
                    echo "<td>", $row["EmailAddress"], "</td>\n ";
                    echo "<td>", $row["PhoneNumber"], "</td>\n ";
                    echo "<td>", $row["SkillProgram"], "</td>\n ";
                    echo "<td>", $row["SkillWeb"], "</td>\n ";
                    echo "<td>", $row["SkillNetwork"], "</td>\n ";
                    echo "<td>", $row["SkillDB"], "</td>\n ";
                    echo "<td>", $row["AdditionalSkills"], "</td>\n ";
                    echo "<td>", $row["ApplicationStatus"], "</td>\n ";
                    echo "</tr>\n ";
                }
            }

            // Close the database connection
            mysqli_close($conn);
        }

    } // if delete by job reference is selected
    else if (isset($_POST["delete_by_job_reference"])) {

        require_once("settings.php");
        $conn = mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            echo "<p>Database connection failure</p>";
        } else {
            // gets the reference number of jobs that need to be deleted and deletes them all from the EOI table
            $deletereference = mysqli_real_escape_string($conn, $_POST["delete_job_reference"]);
            $query = "DELETE FROM EOI where JobReferenceNumber = '$deletereference'";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "<p>Error deleting from EOI table</p>";
                echo "<p class=\"error\">MySQL Error: " . mysqli_error($conn) . "</p>";
            } else {
                echo "<p>Successfully deleted from EOI table</p>";
            }


            // Close the database connection
            mysqli_close($conn);
        }
    } else if (isset($_POST["change_eoi_status"])) {

        require_once("settings.php");
        $conn = mysqli_connect($host, $user, $pwd, $sql_db);

        if (!$conn) {
            echo "<p>Database connection failure</p>";
        } else {
            // gets the number of EOI to be changed
            $EOIchange = mysqli_real_escape_string($conn, $_POST["change_eoi_number"]);
            // gets the status to change to
            $changestatus = mysqli_real_escape_string($conn, $_POST["change_status"]);
            $query = "UPDATE EOI SET ApplicationStatus = '$changestatus' WHERE EOINumber = '$EOIchange'";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                echo "<p>Error changing status</p>";
            } else {
                echo "<p>Successfully changed status of application</p>";
            }

            mysqli_close($conn);
        }
    }
}
?>
</body>
</html>