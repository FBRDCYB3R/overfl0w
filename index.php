<?php
  session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital@1&display=swap" rel="stylesheet">
    <script type='text/javascript'>
        function min() {
            var min = document.getElementsByClassName("postmin");
            var imin;
            for (imin = 0; imin < min.length; imin++) {
                min[imin].style.display = "";
            }
        
            var max = document.getElementsByClassName("post");
            var imax;
            for (imax = 0; imax < max.length; imax++) {
                max[imax].style.display = "none";
            }
        }
        
        function max() {
            var max = document.getElementsByClassName("post");
            var imax;
            for (imax = 0; imax < max.length; imax++) {
                max[imax].style.display = "";
            }
            
            var min = document.getElementsByClassName("postmin");
            var imin;
            for (imin = 0; imin < min.length; imin++) {
                min[imin].style.display = "none";
            }
        }
        
        window.onload = function() {
            min();
        }
    </script>
</head>

<body>
    <header>
        <!--NavBar Section-->
        <div class="navbar">
            <nav class="navigation hide" id="navigation">
                <span class="close-icon" id="close-icon" onclick="showIconBar()"><i class="fa fa-close"></i></span>
                <ul class="nav-list">
                    <li class="nav-item"><a href="posts.php">Posts</a></li>
                </ul>
            </nav>
            <a class="bar-icon" id="iconBar" onclick="hideIconBar()"><i class="fa fa-bars"></i></a>
            <div class="brand">Overflow</div>
        </div>
        <!--SearchBox Section-->
        <div class="search-box">
            <div>
                <select name="" id="">
                   
                    <option value="Titles">Users</option>
                    
                </select>
                <input type="text" name="q" placeholder="search ...">
                <button><i class="fa fa-search"></i></button>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="subforum">
            <div class="subforum-title">
                <h1>Chat forum - 500 characters maximum!, Think before u post... keep the fourm SFW</h1><br><br>
                <button id='max' onclick='document.getElementById("post").style.display = ""; document.getElementById("postmin").style.display = "none";'>Expand</button>
                <button id='min' onclick='document.getElementById("post").style.display = "none"; document.getElementById("postmin").style.display = "";'>Minimize</button>
            </div>
            <br><br><br>
        </div>
        <?php
            $host = 'ec2-18-215-44-132.compute-1.amazonaws.com';
            $username = 'rjsmgkwowkvldr';
            $password = '9c4a10e89783466af42e3efa46540bf7680bc27ec270b65773e174690dbc60ac';
            $database = 'dfi1ekl7pe7hfn';
        
            try
            {
                $conn = new PDO("pgsql:host=$host;dbname=$database", $username, $password);
        
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
                $query = "SELECT * FROM posts ORDER BY id DESC";
                $data = $conn->query($query);
                
                if ($data) {
                    foreach ($data as $row)
                    {
                        echo $row['postmin'].'<br><br>';
                        echo $row['post'].'<br><br>';
                    }
                } else { echo 'Nope.'; }
            }
            catch (PDOException $error)
            {
                $err = $error->getMessage();
                die($err);
            }
        ?>
    </div> 

    <footer>
        <span>&copy; FBRDCYB3R (^_-)db(-_^), zXCV Hax101 (*^_^*)</span>
    </footer>
    <script type='text/javascript' src='main.js'></script>
</body>
</html>
