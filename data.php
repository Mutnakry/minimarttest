<?php

require 'pdoconnect.php';


if(isset($_POST['pid'])){
    $db = new PDOconnect();
    $conn = $db->connect();

    $select = $conn->prepare("SELECT * FROM tblproduct WHERE id = ".$_POST['pid']);
    $select->execute();
    $fetch = $select->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($fetch);
}
function loadproduct(){
    $db = new PDOconnect();
    $conn = $db->connect();
    $query = $conn->prepare("SELECT * FROM tblproduct");
    $query->execute();
    $fetchAll = $query->fetchAll(PDO::FETCH_ASSOC);
    return $fetchAll;
}
?>