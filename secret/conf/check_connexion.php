<?php

if($_SESSION['logged'] !== true) {
	header('location:index?echec=Tu n\'es pas connecté.');
	exit();
}

?>