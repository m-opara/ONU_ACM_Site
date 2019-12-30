<html>
    <head>
        <title>ACM@ONU | Members</title>
        <link rel="shortcut icon" href="Images/Favicon_Basic_ACM_Logo_Polar_Bear_Circuits_color_changed.png" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="The ACM@ONU Website for the Ohio Northern University Local Chapter of the Association of Computing Machinery">
        <meta name="keywords" content="ACM, ONU, Ohio Northern University, Association of Computing Machinery, STEM">
        <meta name="author" content="Matthew Opara">
        <script src="https://kit.fontawesome.com/7aa432375a.js"></script>
        <link href="CSS/style.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <div class="nonFooter">
        <header>
            <div class="container">
                <div class="container">
                    <div id="branding">
                        <figure>
                            <img src="Images/ACM_Logo_Polar_Bear_Circuits_scaled.png" alt=""/>
                            <h1><span class="ACMColor">ACM</span>@<span class="ONUColor">ONU</span></h1>
                        </figure>
                        
                    </div>
                <nav class="social">
                    <ul>
                        <li><a href="https://discord.gg/42PUPvD"><i class="fab fa-discord"></i></a></li>
                        <li><a href="mailto:ACM@ONU.edu?subject=Wanted%20to%20reach%20out!"><i class="fab fa-google"></i></a></li>
                        <li><i class="fab fa-facebook-square"></i></li>
                        <li><i class="fab fa-instagram"></i></li>
                        <li><i class="fab fa-twitter-square"></i></li>
                    </ul>
                </nav>
                </div>
                <div class="navWrap">
                    <nav class="pages">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="dropdown">
                                <a href="council.html">Council</a>
                                <div class="dropdown-content">
                                    <a href="councilMemberPages/President.html">President</a>
                                    <a href="councilMemberPages/VicePresident.html">Vice President</a>
                                    <a href="councilMemberPages/Treasurer.html">Treasurer</a>
                                    <a href="councilMemberPages/Secretary.html">Secretary</a>
                                    <a href="councilMemberPages/SocialMediaCoordinator.html">Social Media Coordinator</a>
                                    <a href="councilMemberPages/JECRepresentative.html">JEC Representative</a>
                                    <a href="council.html#candidateRegistration">2019 - 2020 candidate registration</a>
                                </div>
                            </li>
                            <li class="current"><a href="members.html">Members</a></li>
                            <li><a href="gallery.html">Gallery</a></li>
                            <li><a href="events.html">Events</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="join.html">Join</a></li>
                            <li><a href="sponsors.html">Sponsors</a></li>
                            <li><a href="https://github.com/m-opara/ONU_ACM_Site">Git Archive</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>    
            </div>
        </header>
            <?php
            // Get a connection for the database
            require_once('../mysqli_connect.php');

            //passed Year 
            $year = 2023;
            
            if(isset($_POST['search'])){
                $year = $_POST['year'];
            }
            
            $query = "SELECT first_name, last_name, email, graduating_year FROM members WHERE graduating_year ='" . $year . "'";
            // Get a response from the database by sending the connection
            // and the query
            $response = @mysqli_query($dbc, $query);

            //Used to count the number of rows to know when to put in the container
            $rowCount = 0;
            
            //The title for the year being queried
            echo '<div class="container">'
            . '<h2 class="title"Graduating class of >' . $year . ' Members</h2>'
            . '</div>'
            . '<article id="textStyle1">';

            // If the query executed properly proceed
            if($response){
                echo '<div class="container">';

                // mysqli_fetch_array will return a row of data from the query
                // until no further data is available
                while($item = mysqli_fetch_array($response)){
                    if($rowCount % 5 == 0 && $rowCount != 0){
                        echo '</div>'
                        . '<hr class="clearRule">'
                        . '<div class="container">';
                    }
                    echo '<div class="membersPrevew">'
                    . '<h4>' . $item['first_name'] . " " . $item['last_name'] . '</h4>' .
                    '<h4>' . 'Email: ' . '<a href="mailto:' . $item['email'] . '?Subject=Hello%20' . $item['first_name'] . '" target="_top">' . $item['email'] . '</a></h4>' . 
                    '<h4>' . 'Graduation Year: ' . $item['graduating_year'] . '</h4></div>';
                    
                    $rowCount = $rowCount + 1;
                }
                echo '</article>';
            } 
            else{

            echo "Couldn't issue database query<br />";

            echo mysqli_error($dbc);

            }

            // Close connection to the database
            mysqli_close($dbc);
            ?>
            <article id="textStyle1">
                <div class="container">
                    <form method = "post" action = "">
                        <label for="first_name">Search for a graduation year</label>
                        <select id="year" name="year" placeholder="Year..">
                            <?php
                                $startYear = 1979;
                                $endYear = 2079;
                                $year = 2023;
                                
                                if(isset($_POST['search'])){
                                    $year = $_POST['year'];
                                }
                                
                                while ($startYear <= $endYear)
                                {
                                    if($startYear == $year){
                                        echo '<option value="' . $startYear . '" selected="' . $year . '">'. $startYear . '</option>';
                                    }
                                    
                                    echo '<option value="' . $startYear . '">'. $startYear . '</option>';
                                    $startYear++;
                                }   
                            ?>
                        </select>
                        <input type="submit" name="search" value="Search >>">
                    </form>
                </div>
            </article>
        <div class="container">
            <h2 class="title">Add yourself to the database</h2>
        </div>
            <article id="textStyle1">
        <div class="container">
            <form method = "post" action = "" enctype="multipart/form-data">
                <label for="first_name">First Name</label><br>
                <input type="text" id="first_name" name="first_name" maxlength="30" placeholder="Your first name.."><br>

                <label for="last_name">Last Name</label><br>
                <input type="text" id="last_name" name="last_name" maxlength="30" placeholder="Your last name.."><br>
                
                <label for="email">email</label><br>
                <input type="email" id="email" name="email" maxlength="255" placeholder="Your ONU email.."><br>
                
                <label for="date_of_birth">Date of birth</label><br>
                <input type="date" id="date_of_birth" name="date_of_birth"><br>
                
                <label for="graduating_year">Graduating Year</label><br>
                <input type="text" id="graduating_year" name="graduating_year" maxlength="4" placeholder="Your Graduating Year.."><br>
                                
                <label for="bio">Bio</label><br>
                <textarea id="bio" name="bio" maxlength="500" placeholder="Who are you..?"></textarea><br>
                                
                <label for="filleToUpload">Choose a photo</label><br>
                <input type="file" name="fileToUpload" id="fileToUpload">
                
                <hr class="clearRule">
                
                <input type="submit" name="submit" value="Submit >>">
            </form>
            
            <?php
            
            error_reporting(E_ALL);
            ini_set('display_errors', 1);
            
            if(isset($_POST['submit'])){
                echo 'pos1';
                $data_missing = array();
                $data_incorrect = array();
                
                $email_regex = "/^[a-zA-Z][-][a-zA-Z]{1,}[.]{0,1}[\d]{0,3}[@]{1}(onu.edu){1}$/";
                                
                $target_dir = "Images/members/";
                
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                if(empty($_POST['first_name'])){ 
                    //Adds missing item to the array
                    $data_missing[] = 'First Name';
                } else {
                    //removes excess white space and stores the name
                    $f_name = trim($_POST['first_name']);
                    echo $f_name;
                }
                
                if(empty($_POST['last_name'])){
                    //Adds missing item to the array
                    $data_missing[] = 'Last Name';

                } else{
                    //removes excess white space and stores the name
                    $l_name = trim($_POST['last_name']);
                    echo $l_name;
                }
// DEBUG                 
//                if(empty($_POST['email'])){
//                    //Adds missing item to the array
//                    $data_missing[] = 'email';
//
//                } else{
//                    $output_array = array();
//                    preg_match($email_regex, $_POST['email'], $output_array);
//                    
//                    if(empty($output_array)){
//                        $data_incorrect[] = 'Email must be an ONU email';
//                    }else{
//                        //removes excess white space and stores the name
//                        $email = trim($_POST['email']);
//                    }
//                    
//                }
                
                if(empty($_POST['email'])){
                    //Adds missing item to the array
                    $data_missing[] = 'email';

                } else{
                    //removes excess white space and stores the name
                    $email = trim($_POST['email']);
                    echo $email;
                }
                
                if(empty($_POST['date_of_birth'])){
                    //Adds missing item to the array
                    $data_missing[] = 'Date of birth';

                } else{
                    //removes excess white space and stores the name
                    $dob = trim($_POST['date_of_birth']);
                    echo $dob;
                }
                
                if(empty($_POST['graduating_year'])){
                    //Adds missing item to the array
                    $data_missing[] = 'Graduating year';

                } else{
                    //removes excess white space and stores the name
                    $grad_year = trim($_POST['graduating_year']);
                    echo $grad_year;
                }
                
                if(empty($_POST['bio'])){
                    //Adds missing item to the array
                    $data_missing[] = 'Your Bio';

                } else{
                    //removes excess white space and stores the name
                    $bio = trim($_POST['bio']);
                    echo $bio;
                }
// DEBUG                 
//                if(empty($_POST['fileToUpload'])){
//                    //Adds missing item to the array
//                    $data_missing[] = 'Your Photo';
//
//                } else{
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        //File is an image
                        $uploadOk = 1;
                        // Check if file already exists
                        if (file_exists($target_file)) {
                            $data_incorrect[] = 'Sorry, file already exists.(Try renaming the file)';
                            $uploadOk = 0;
                        }
                        if ($_FILES["fileToUpload"]["size"] > 15000000) {
                            $data_incorrect[] = 'Sorry, your file is too large.';
                            $uploadOk = 0;
                        }
                        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                            $data_incorrect[] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
                            $uploadOk = 0;
                        }
                    } else{
                        $data_incorrect[] = 'File selected is not an image.';
                        $uploadOk = 0;
                    }
                    
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        $data_incorrect[] = 'Sorry, your file was not uploaded.';
                    // if everything is ok, try to upload file
                    } else{
                        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                            $success_info[] = 'Picture successfully uploaded!';
                            echo $target_file;
                        } else{
                            
                            echo '<script language="javascript">';
                            echo 'alert("Sorry, there was an error uploading your file.")';
                            echo '</script>';
                        }
                    }
                //}
                //If we don't have any saved error messages
                if(empty($data_missing)&& empty($data_incorrect)){
                    echo 'pos 2';
                    
                    require_once('../mysqli_connect.php');

                    $query = "INSERT INTO members (id, first_name, last_name, email, date_of_birth, graduating_year, bio, photo_path, date_entered) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, NOW())";
                    
                    $stmt = $dbc->prepare("INSERT INTO `members` (`first_name`, `last_name`, `email`, `date_of_birth`, `graduating_year`, `bio`, `photo_path`, `date_entered`, `id`) VALUES (?, ?, ?, ?, ?, ?, ?, NOW(), NULL)");
                    echo $stmt;
                    $stmt->bind_param("sssssss", $f_name, $l_name, $email, $dob, $grad_year, $bio, $target_file);
                    
                    echo $stmt;
                    
                    if ($stmt == FALSE) {
                        die($mysqli->error);
                        echo 'NOPE';
                    }
                    $stmt->execute();
// DEBUG                    
//                    $stmt = mysqli_prepare($dbc, $query);
//                    echo '$stmt: ' . $stmt;
//                    //i Integers
//                    //d Double
//                    //b Blobs
//                    //s Everything Else
//                    echo '$target_file:' . $target_file;    
//                    mysqli_stmt_bind_param($stmt, "sssssss", $f_name, $l_name, $email, $dob, $grad_year, $bio, $target_file);
//                    
//                    mysqli_stmt_execute($stmt);
                    
//                    $affected_rows = mysqli_stmt_affected_rows($stmt);
//                    
//                    if($affected_rows == 1){
//            
//                        echo 'yup3';
//                        
//                        echo '<script language="javascript">';
//                        echo 'alert("Member Data Submitted!")';
//                        echo '</script>';
//                        
//                        mysqli_stmt_close($stmt);
//
//                        mysqli_close($dbc);
//            
//                    } else {
//                        
//                        echo '<script language="javascript">';
//                        echo 'alert("Error Occurred\n'. mysqli_error() .'")';
//                        echo '</script>';
//                        
//                        mysqli_stmt_close($stmt);
//                        
//                        mysqli_close($dbc);
//                    }
//
//                } else {
//                    
//                    echo json_encode($data_missing);
//                    echo json_encode($data_incorrect);
//                    
//                    $error_sum =  'alert("You need to enter the following data\n"';
//
//                    foreach($data_missing as $missing){
//
//                        $error_sum = $error_sum . $missing . '\n';
//
//                    }
//                    
//                    echo '<script language="javascript">';
//                    echo $error_sum .')';
//                    echo '</script>';
                }
            }
            ?>
            
        </div>
        </article>
        </div>
        <footer>
            <div class="container">
                <p>The Local Association of Computing Machinery at Ohio Northern University (ACM@ONU) 2019 </p>
            </div>
        </footer>
    </body>
</html>