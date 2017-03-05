<?php
    session_start();

try{
    $dbh = new PDO('mysql:host=localhost;dbname=alumini', 'root', '', array(
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => true,
        PDO::ERRMODE_EXCEPTION => true
    ));
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}
    $title = trim($_POST['title']);
    $details = trim($_POST['details']);
    $eligibility = trim($_POST['eligibility']);
    $active_time = trim($_POST['active_time']);
    $min_money = trim($_POST['min_money']);
    $link = trim($_POST['link']);

try {
    $stmt = $dbh->prepare("INSERT INTO scholarships (title, details, eligibility, active_time, min_money, link) VALUES (:title, :details, :eligibility, :active_time, :min_money, :link)");
    
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':details', $details);
    $stmt->bindParam(':eligibility', $eligibility);
    $stmt->bindParam(':active_time', $active_time);
    $stmt->bindParam(':min_money', $min_money);
    $stmt->bindParam(':link', $link);

    $stmt->execute();
    $stmt = null; // doing this is mandatory for connection to get closed
    $dbh = null;
    header('Location: dashboard.php');
} catch (PDOException $e){
        print "Error!: ".$e->message()."<br/>";
        die();
}
?>