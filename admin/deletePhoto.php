<?php
include_once('includes/loginChecker.php');
if (isset($_GET['id'])) {
    include_once('includes/conn.php');
    try {
        $id = $_GET['id'];
        $sql = 'DELETE FROM `catalog` WHERE `id` = ?';
        $stmt = $conn->prepare($sql);
        $stmt->execute([$id]);
        // echo "deleted";
        header('location: photos.php');
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
