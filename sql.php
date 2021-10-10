<?php
    error_reporting(E_ALL);    
    ini_set('error_reporting', E_ALL);

    $host = '';
    $username = '';
    $password = '';
    $database = '';

    try
    {
        $conn = new PDO("pgsql:host=ec2-18-215-44-132.compute-1.amazonaws.com:5432;dbname=dfi1ekl7pe7hfn", 'rjsmgkwowkvldr', '9c4a10e89783466af42e3efa46540bf7680bc27ec270b65773e174690dbc60ac');

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*$query = "SELECT * FROM posts ORDER BY id DESC";
        $data = $conn->query($query);

        foreach ($data as $row)
        {
            echo $row['post'].'<br>';
        }*/
        if ($conn) {
            echo "YES";
        }

    }
    catch (PDOException $error)
    {
        $err = $error->getMessage();
        die($err);
    }
?>
