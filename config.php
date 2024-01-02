<?php
$user = 'root'; // Database username
$password = ''; // Database password

try {
    $db = new PDO('mysql:host=localhost;dbname=pokemon;charset=utf8', $user, $password);
    // If you need to end the connection later, use "$db = null;"
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    // Return the PDO instance
    return $db;
} catch (PDOException $e) {
    // If the above code encounters an error, it will execute the following
    print "ERROR!: " . $e->getMessage();
    die();
}
?>
