<?php
require_once(__DIR__.'/db.php');
$benennung = $mysqli->query("SELECT * FROM `benennung`")->fetch_all(MYSQLI_ASSOC);
$benennung = $benennung[0]['title'];

if(isset($_POST['benennung'])) {
    $benennung = $_POST['benennung'];
    $res = $mysqli->query("SELECT COUNT(id) AS skoka FROM `benennung`")->fetch_array();
    if($res['skoka']){
        $mysqli->query("UPDATE `benennung` SET `title`='$benennung' WHERE id=1");
    }
    else {
        $mysqli->query("INSERT INTO `benennung` (`title`) VALUES ('$benennung')");
    }
    $url = '../admin.php?displ&result=Daten in die Datenbank aufgenommen';
	mysql_test($url, $mysqli);
}

if(isset($_GET['alle'])){
    $all = $mysqli->query("SELECT DISTINCT ids, name FROM `poll`")->fetch_all(MYSQLI_ASSOC);
}
elseif(isset($_GET['ids'])) {
    $ein = $mysqli->query("SELECT DISTINCT * FROM `poll` WHERE ids = ".$ids."")->fetch_all(MYSQLI_ASSOC);
}
elseif(isset($_GET['displ'])){
    $res = $mysqli->query("SELECT * FROM `response` INNER JOIN `question` ON response.question_id=question.id")->fetch_all(MYSQLI_ASSOC);
    $new = array();
    $i = 1;
    $I = 0;
    $j = $res[0]['id'];
    foreach($res as $value){
        if($value['id'] == $j){
            $new[$i]['id'] = $value['id'];
            $new[$i]['question'] = $value['question'];
            $new[$i]['type'] = $value['type'];
            $new[$i]['response'][$I] = $value['response'];
            $new[$i]['ja'][$I+1] = $value['ja'];
            $I++;
        }
        else {
            $i++;
            $I = 0;
            $j = $value['id'];
            $new[$i]['id'] = $value['id'];
            $new[$i]['question'] = $value['question'];
            $new[$i]['type'] = $value['type'];
            $new[$i]['response'][$I] = $value['response'];
            $new[$i]['ja'][$I+1] = $value['ja'];
            $I++;
        }
    }
}

if(isset($_POST['new'])) {
	$question = $_POST['question0'];
    
	if(isset($_POST['type0'])){
		$mysqli->query("INSERT INTO `question` (`question`, `type`) VALUES ('$question', 'checkbox')");
	}
	else{
		$mysqli->query("INSERT INTO `question` (`question`, `type`) VALUES ('$question', 'radio')");
	}
	$lastid = mysqli_insert_id($mysqli);
	$response = $_POST['response0'];
    $ja = $_POST['ja0'];
	foreach($response as $key=>$value){
        if($ja[$key]) { 
            $Ja = $ja[$key];
        }
        else {
            $Ja = '';
        }
		$mysqli->query("INSERT INTO `response` (`response`, `response_nr`, `question_id`, `ja`) VALUES ('$value', '$key', '$lastid', '$Ja')");
	}
	$url = '../admin.php?displ&result=Daten in die Datenbank aufgenommen';
	mysql_test($url, $mysqli);
}

if(isset($_POST['erneuen'])) {
    $post = $_POST;
    $question = array();
    $response = array();
    $i = 0;
    foreach($post as $key=>$value){
        if(strstr($key, 'question')){
            $id = substr($key, strlen('question'));
            if(isset($_POST['type'.$id])){
                $mysqli->query("UPDATE `question` SET `question`='$value', `type`='checkbox' WHERE `id`=$id");
                }
                else{
                    $mysqli->query("UPDATE `question` SET `question`='$value', `type`='radio' WHERE `id`=$id");
                }
                $response = $_POST['response'.$id];
                foreach($response as $key=>$value){
                    $mysqli->query("UPDATE `response` SET `response`='$value' WHERE `response_nr`='$key' AND `question_id`='$id'");
                }
                $ja = $_POST['ja'.$id];
                $mysqli->query("UPDATE `response` SET `ja`='' WHERE `question_id`='$id'");
                foreach($ja as $key=>$value){
                    $mysqli->query("UPDATE `response` SET `ja`='$value' WHERE `response_nr`='$key' AND `question_id`='$id'");
                }
        }
    }
	$url = '../admin.php?displ&result=Daten in die Datenbank aufgenommen';
	mysql_test($url, $mysqli);
}

if(isset($_GET['del'])){
	$del = $_GET['del'];
	if($del != 'all'){
		$mysqli->query("DELETE FROM `response` WHERE `question_id`='$del' ");
		$mysqli->query("DELETE FROM `question` WHERE `id`='$del'");
        $mysqli->query("DELETE FROM `benennung` WHERE `id`=1");
	}
	else {
		$mysqli->query("TRUNCATE TABLE `response`");
		$mysqli->query("TRUNCATE TABLE `question`");
		$mysqli->query("TRUNCATE TABLE `poll`");
        $mysqli->query("TRUNCATE TABLE `benennung`");
	}
    
	$url = '../admin.php?displ&result=Daten sind gelöscht';
	mysql_test($url, $mysqli);
}

function mysql_test($url, $mysqli){
	if($mysqli->errno === 0){
		header( 'Location: '.$url);
	}
	else {
		die('<font color="#FF0000">Datenbankfehler.</font><br>Beschreibung des Fehlers: <font color="#0066FF"><b>'.$mysqli->error.'</b></font><br>Код ошибки: <font color="#0066FF"><b>'.$mysqli->errno).'</b></font>';
	}
}
function dirweg($weg=true){
    $pieces = explode('/', $_SERVER['PHP_SELF']);  
    $file = array_pop($pieces);
    if($weg){
        $url = $_SERVER['SERVER_NAME'].$_SERVER['PHP_SELF'];
        $url =  "http://".mb_strstr($url, $file, true);
    }
    else{
        $url = $_SERVER['DOCUMENT_ROOT'].$_SERVER['PHP_SELF'];
        $url =  mb_strstr($url, $file, true);
    }
    return $url;
}
