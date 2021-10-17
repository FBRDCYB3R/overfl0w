<?php
    session_start();
    date_default_timezone_set('America/New_York');

    if (ISSET($_POST['name'], $_POST['title'], $_POST['country'], $_POST['post'])) {
        $post = "<div id='new' style='border-radius: 5px; background-color: #292b2e; margin: auto; padding: 20px; position: relative; height: auto; width: 69vw;'>".'<txt style=\'font: 2vw Papyrus; color: silver;\'>'.date('M d, H:i, ').$_POST['name'].' ('.$_POST['country'].')<br><br></txt>'."<div id='newtd' style='border-radius: 5px; height: auto; width: auto; text-align: center;'><h3 id='newtt' style='color: silver; font: 2vw Papyrus; line-height: 0;'>".'<br><br>'.$_POST['title']."</h3><br><hr><br></div><br><br><div id='newpd' style='border-radius: 5px; background-image: linear-gradient(to bottom right, #182841, #450045); height: auto; width: auto; text-align: center;'><br><br><p id='newpp' style='color: silver; font: 1.25vw Papyrus;'>".$_POST['post']."</p><br><br></div></div>";
        $host = 'ec2-18-215-44-132.compute-1.amazonaws.com';
        $username = 'rjsmgkwowkvldr';
        $password = '9c4a10e89783466af42e3efa46540bf7680bc27ec270b65773e174690dbc60ac';
        $database = 'dfi1ekl7pe7hfn';

        try
        {
            $conn = new PDO("pgsql:host=$host;dbname=$database", $username, $password);

            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $conn->prepare("INSERT INTO posts(post) VALUES(:post)");
            $qex = $statement->execute(array(
                'post' => $post
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
            font: 14px 'Ariel', ;
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
            color: silver; font: 2vw Papyrus; line-height: 0
        }
        #newpd {
            border-radius: 5px; background-image: linear-gradient(to bottom right, #182841, #450045); height: auto; width: auto; text-align: center;
        }
        #newpp {
            color: silver; font: 1.25vw Papyrus;
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

                    <label for="country" id='con'>Country</label>
                    <select id="country" name="country">
                    <option value="australia">Australia</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                    <option value="LMAO I know where u live">bruh</option>
                    </select>
                    <input type='text' id='post' name='post'/>
                    <input type="submit" value="Submit">
                </form>
                </div>
            </form>
        </center>
    </body>
</html>
