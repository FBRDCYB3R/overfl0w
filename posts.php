<?php
    session_start();
    date_default_timezone_set('America/New_York');

    if (ISSET($_POST['name'], $_POST['title'], $_POST['country'], $_POST['post'])) {
        $min = "<div onclick='<?php if (isset($row)) {echo $row[\'post\'];} ?>' id='newmin' style='border-radius: 5px; background-color: #292b2e; margin: auto; padding: 20px; position: relative; height: auto; width: 69vw;'>".'<txt style=\'color: silver;\'>'.date('M d, H:i, ').$_POST['name'].' ('.$_POST['country'].'): </txt>'."<div id='newmintd' style='border-radius: 5px; height: auto; width: auto; text-align: center;'><h3 id='newmintt' style='color: silver; line-height: 0;'>".'<br><br>'.$_POST['title']."</h3>";
        $post = "<div onclick='<?php if (isset($row)) {echo $row[\'postmin\'];} ?>' id='new' style='border-radius: 5px; background-color: #292b2e; margin: auto; padding: 20px; position: relative; height: auto; width: 69vw;'>".'<txt style=\'color: silver;\'>'.date('M d, H:i, ').$_POST['name'].' ('.$_POST['country'].')<br><br></txt>'."<div id='newtd' style='border-radius: 5px; height: auto; width: auto; text-align: center;'><h3 id='newtt' style='color: silver; line-height: 0;'>".'<br><br>'.$_POST['title']."</h3><br><hr><br></div><br><br><div id='newpd' style='border-radius: 5px; background-image: linear-gradient(to bottom right, #182841, #450045); height: auto; width: auto; text-align: center;'><br><br><p id='newpp' style='color: silver;'>".$_POST['post']."</p><br><br></div></div>";
        $host = 'ec2-18-215-44-132.compute-1.amazonaws.com';
        $username = 'rjsmgkwowkvldr';
        $password = '9c4a10e89783466af42e3efa46540bf7680bc27ec270b65773e174690dbc60ac';
        $database = 'dfi1ekl7pe7hfn';

        try
        {
            $conn = new PDO("pgsql:host=$host;dbname=$database", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $conn->prepare("INSERT INTO posts(post, postmin) VALUES(:post, :postmin)");
            $qex = $statement->execute(array(
                'post' => $post,
                'postmin' => $min,
            ));

            if ($qex) { header("Location: ./index.php"); } else { echo "Error while adding post, please try again later."; }
        }
        catch (PDOException $error)
        {
            $err = $error->getMessage();
            die($err);
        }
    }
?>

<html style='background-image: linear-gradient(to right, #35224e, #00c5ca)'>
    <style>
        input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid slategrey;
        border-radius: 4px;
        box-sizing: border-box;
        }

        input[type=submit] {
        width: 100%;
        background-color: #400080;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        input[type=submit]:hover {
        background-color: #182841;
        }

        div {
        border-radius: 5px;
        background-color: #292b2e;
        padding: 20px;
        }

        #post {
        width: 100%;
        height: 150px;
        padding: 12px 20px;
        box-sizing: border-box;
        border: 2px solid #ccc;
        border-radius: 4px;
        background-color: #202020;
        color: silver;
        resize: none;
        }
        #by {
            font: 14px 'Trebuchet MS', sans-serif;
            color: silver;
        }
        #tt {
            font: 14px 'Trebuchet MS', sans-serif;
            color: silver;
        }
        #con {
            font: 14px 'Trebuchet MS', sans-serif;
            color: silver;
        }

        #new {
            border-radius: 5px; background-color: #292b2e; margin: auto; padding: 20px; position: relative; height: auto; width: 69vw;
        }
        #newtd {
            border-radius: 5px; background-image: linear-gradient(to bottom right, #182841, #450045); height: 3vw; width: auto; text-align: center;
        }
        #newtt {
            color: silver; line-height: 0
        }
        #newpd {
            border-radius: 5px; background-image: linear-gradient(to bottom right, #182841, #450045); height: auto; width: auto; text-align: center;
        }
        #newpp {
            color: silver;
        }
    </style>
    <body>
        <center>
            <form method='POST'>
                <h3 style="color: silver; font: 3vw 'Trebuchet MS';">Create post</h3>

                <div>
                <form method='POST'>
                    <label for="fname" id='by'>By: </label>
                    <input type="text" id="fname" name="name" placeholder="Your name..">

                    <label for="lname" id='tt'>Title</label>
                    <input type="text" id="lname" name="title" placeholder="Enter your post's title">

                    <label for="country" id='con'>Topics</label>
                    <select id="country" name="country">
                    <option value="Shows">Shows</option>
                    <option value="Anime">Anime</option>
                    <option value="Code">Code</option>
                    <option value="Ask overflow">Ask overflow</option>
                    <option value="other">other</option>
                    </select>
                    <input type='text' id='post' name='post'/>
                    <input type="submit" value="Submit">
                </form>
                </div>
            </form>
        </center>
    </body>
</html>
