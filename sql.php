<?php
    error_reporting(E_ALL);    
    ini_set('error_reporting', E_ALL);

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

        foreach ($data as $row)
        {
            echo $row['post'].'<br>';
        }
    }
    catch (PDOException $error)
    {
        $err = $error->getMessage();
        die($err);
    }
?>
