<?php 
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=baptismSystem', 'root', '');
 
if(isset($_GET['login'])) {
    $email = $_POST['username'];
    $password = $_POST['password'];
    
    $statement = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $result = $statement->execute(array('username' => $username));
    $user = $statement->fetch();
        
    //Überprüfung des Passworts
    if ($user !== false && password_verify($password, $user['passwor'])) {
        $_SESSION['userid'] = $user['id'];
        die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');
    } else {
        $errorMessage = "E-Mail oder Password war ungültig<br>";
    }
    
}
?>