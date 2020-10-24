<?php
//SELECTION OF THE LAST ID
$last_id = $obj->Requete('SELECT * FROM etudiants ORDER BY ID_ETUDIANT LIMIT 1');
$last_id = $last_id->fetch();
$last_id = $last_id['ID_ETUDIANT'];
//SELECTION OF THE AMOUNT OF EXISTING ROWS
$order = $obj->Requete('SELECT COUNT(*) AS MAXI AS MAXI FROM etudiants');
$order = $order->fetch();
$order = $order['MAXI'];
if (condition) {
	# code...
}

 ?>