<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
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
                            <li><a href="members.html">Members</a></li>
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
            <article id="textStyle1">
                <div class="container">
                    <h3>Current Temperature reported by the NodeMCU</h3>
                    <?php
                        require_once('../nodeMCU_out_mysqli_connect.php');
                        $sql = "SELECT sensor, temp_value, reading_time FROM NodeMCUData WHERE id='1'";

                        $result = $dbc->query($sql);
                        if($result->num_rows > 0){
                            while($row = $result->fetch_assoc()) {
                                $row_reading_time = $row["reading_time"];
                                $date = date("l\, F jS\, Y", strtotime("$row_reading_time - 0 hours")) . " at " . date("h:i:s A", strtotime("$row_reading_time - 0 hours"));
                                echo "<p>The current room temperature from the " . $row["sensor"] . " is " . $row["temp_value"] . " &#176;F which was last updated " . $date;
                            }
                            $result->free();
                        }
                        $dbc->close();
                    ?>
                </div>
                <div class="container">
                    <h3>LED Color</h3>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <label for="red">Red</label><br>
                        <input type="number" id="red" name="fRed" min="0" max="255" placeholder="The decimal value for red.."><br>

                        <label for="green">Green</label><br>
                        <input type="number" id="green" name="fGreen" min="0" max="255" placeholder="The decimal value for green.."><br>
                        
                        <label for="blue">Blue</label><br>
                        <input type="number" id="blue" name="fBlue" min="0" max="255" placeholder="The decimal value for blue.."><br>
                        
                        <hr class="clearRule">
                
                        <input type="submit" name="submit" value="Submit >>">
                    </form>

                    <?php                       
                        require_once('../nodeMCU_in_mysqli_connect.php');

                        $index = 1;
                        $redValue = $greenValue  = $blueValue  = "";

                        if($_SERVER["REQUEST_METHOD"] == "POST"){

                            if(isset($_POST['fRed']) && isset($_POST['fGreen']) && isset($_POST['fBlue'])){

                                $redValue = formatPassed($_POST['fRed']);
                                $greenValue = formatPassed($_POST['fGreen']);
                                $blueValue = formatPassed($_POST['fBlue']);

                                $sql = "REPLACE INTO `NodeMCUData` (`id`, `red_value`, `green_value`, `blue_value`) VALUES ('" . $index . "', '" . $redValue . "','" . $greenValue . "','" . $blueValue . "')";
                                
                                $response = $dbc->query($sql);

                                if($response){
                                    echo "<p>New record created successfully</p>";
                                } else{
                                    echo "<p>Error: " . $sql . "<br>" . $dbc->error . "</p>";
                                }

                                $dbc->close();
                            } else{
                                echo "<p>Please fill in all fields</p>";
                            }
                        } else{
                            echo "<p>No Data Posted.</p>";
                        }

                        function formatPassed($data){
                            $data = trim($data);
                            $data = stripcslashes($data);
                            $data = htmlspecialchars($data);
                            if($data > 255){
                                $data = 255;
                            }
                            if($data < 0){
                                $data = 0;
                            }
                            
                            return $data;
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