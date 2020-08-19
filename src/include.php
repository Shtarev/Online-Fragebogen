<?php
require_once(__DIR__.'/db.php');
$benennung = $mysqli->query("SELECT * FROM `benennung`")->fetch_all(MYSQLI_ASSOC);
$result = $mysqli->query("SELECT * FROM `question` INNER JOIN `response` ON question.id=response.question_id")->fetch_all(MYSQLI_ASSOC);
$benennung = $benennung[0]['title'];
$arr = array();
if($result[0]['question_id']){
    $key = $result[0]['question_id'];
    $i = 1;
    foreach($result as $value){
        if($key == $value['question_id']){
            $arr[$key]['id'] = $key;
            $arr[$key]['question'] = $value['question'];
            $arr[$key]['type'] = $value['type'];
            $arr[$key]['response'][$i] = $value['response'];
            $i++;
        }
        else{
            $i = 1;
            $key = $value['question_id'];
            $arr[$key]['id'] = $key;
            $arr[$key]['question'] = $value['question'];
            $arr[$key]['type'] = $value['type'];
            $arr[$key]['response'][$i] = $value['response'];
            $i++;
        }
    }
}
else {
    $arr = 0;
}
$resip = $mysqli->query("SELECT DISTINCT `ip`, `ids` FROM `poll`")->fetch_all(MYSQLI_ASSOC);
function generate_form_token() {
	return $_SESSION['csrf_token'] = substr( str_shuffle( 'qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM' ), 0, 10 );
}
function userid(){
	$client  = @$_SERVER['HTTP_CLIENT_IP'];  
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];  
	$remote  = @$_SERVER['REMOTE_ADDR'];  
	   
	if(filter_var($client, FILTER_VALIDATE_IP)) {  
		$ip = $client;  
	}  
	elseif(filter_var($forward, FILTER_VALIDATE_IP)) {  
		$ip = $forward;  
	}  
	elseif(filter_var($remote, FILTER_VALIDATE_IP)) {  
		$ip = $remote;  
	}  
	else {  
		$ip = false;  
	}  
	return $ip; 
}