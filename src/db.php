<?php
@$mysqli = mysqli_connect("localhost","user4432_botrezm","141100","user4432_botrezm");
if(!$mysqli){
	die('<font color="#FF0000">Fehler bei der Arbeit mit der Datenbank</font>');
}