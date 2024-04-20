<?php
$nom = $_POST['nom'];
$pre = $_POST["pre"];
$email = $_POST["email"];
$tel = $_POST['tel'];
$password = $_POST['pwd'];
if (isset($_POST['type1'])) {
    $type = $_POST['type1'];
} elseif (isset($_POST['type2'])) {
    $type = $_POST['type2'];}
// Database connection settings
$dsn = 'mysql:host=localhost;dbname=zayani';
$username = 'root';
$password = '';

try {
    // Create a PDO instance
    $pdo = new PDO($dsn, $username, $password);
    
    // Set PDO to throw exceptions on errors
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully";
} 
catch (PDOException $e) {
    // Handle connection errors
    echo "Connection failed: " . $e->getMessage();
}
// Prepare SQL statement
$sql = "insert into your_table_name (nom ,pre,passwor,email,num_tel,typ) values (:$nom, :$pre,:$email,:$tel,:$password,:$type)";
$stmt = $pdo->prepare($sql);

// Bind parameters
$stmt->bindParam(':value1', $value1);
$stmt->bindParam(':value2', $value2);



// Execute the statement
if ($stmt->execute()) {
    echo "Insertion réussie";
} else {
    echo "Erreur lors de l'insertion: " . $stmt->errorInfo()[2];
}
?>
