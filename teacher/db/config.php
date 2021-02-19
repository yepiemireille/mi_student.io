

<?php


 $con=mysqli_connect('localhost','root','','mi_student') or die (mysql_error());
/* $conn= new PDO("mysql:host=localhost; dbname=student_attendance",'root','');*/

 try{
 	$conn= new PDO("mysql:host=localhost; dbname=mi_student",'root','');
 }catch(PDOException $e){
 	die("Erreur de connexion à la base de donnée: " . $e->getMessage());
 }
 


