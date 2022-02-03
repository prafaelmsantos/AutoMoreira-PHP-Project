<?php
$user = 'auto';
$pass = 'auto';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=veiculos;charset=utf8', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
/* site PHP PDO https://www.php.net/manual/en/book.pdo.php */
?>