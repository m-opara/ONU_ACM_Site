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
            <form method = "post" action = "">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" placeholder="Your name..">

                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" placeholder="Your last name..">
                
                <label for="email">email</label>
                <input type="text" id="email" name="email" placeholder="Your ONU email..">
                
                <label for="date_of_birth">Date of birth</label>
                <input type="text" id="date_of_birth" name="date_of_birth" placeholder="Your ONU email..">
                
                <label for="graduating_year">Graduating Year</label>
                <input type="text" id="graduating_year" name="graduating_year" placeholder="Your Graduating Year..">
                                
                <label for="bio">Bio</label>
                <textarea id="bio" name="bio" maxlength="500" placeholder="Who are you..?"></textarea>
                
                
                
                <input type="submit" value="Submit >>">
            </form>
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


