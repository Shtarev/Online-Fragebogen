<?php
session_start();
if (isset($_POST['csrf_token'])) {
    if ( isset( $_SESSION['csrf_token'] ) && $_SESSION['csrf_token'] == @$_POST['csrf_token'] ) {
        require_once(__DIR__.'/db.php');
        $response = array();
        foreach($_POST as $key=>$value){
            if(!is_array($value)){
                if($key == 'name'){
                    $name = testInput($value);
                }
                else{
                    $key = mb_substr($key, 5);
                    $response[$key] = $value;
                }
            }
            else{
                $key = mb_substr($key, 8);
                $i=0;
                foreach($value as $value2){
                    $response[$key][$i] = $value2;
                    $i++;
                }
            }
        }
        $res = $mysqli->query("SELECT id, question FROM `question`")->fetch_all(MYSQLI_ASSOC);
        $res2 = $mysqli->query("SELECT response, question_id FROM `response` WHERE ja='checked'")->fetch_all(MYSQLI_ASSOC);
        $ja = array();
        $j = 0;
        foreach($res2 as $key=>$value){
            if($res2[$key]['question_id'] != $res2[$key+1]['question_id']){
                if(!$j){
                    $ja[$value['question_id']] = $value['response'];
                    $j = 0;
                }
                else{
                    $ja[$value['question_id']][$j] = $value['response'];
                    $j = 0;
                }
            }
            else{
                $ja[$value['question_id']][$j] = $value['response'];
                $j++;
            }
        }
        $result = array();
        $result[0]['name'] = $name;
        $result[0]['ids'] = rand(1000,9999);
        foreach($res as $value){
            $key = $value['id'];
            $result[$key]['question'] = $value['question'];
            if($response[$key]){
                if(!is_array($response[$key])){
                    $result[$key]['response'] = $response[$key];
                    if($response[$key] == $ja[$key]){
                        $result[$key]['note'] = 1;
                    }
                    else {
                        $result[$key]['note'] = 0;
                    }
                }
                else{
                    $t = '';
                    $pruf = 0;
                    $i = 0;
                    foreach($response[$key] as $val){
                        $t = $t.$val.' / ';
                        if(is_array($ja[$key])){
                            foreach($ja[$key] as $jaa){
                                if($jaa == $val){
                                    $pruf++;
                                }
                            }
                        }
                        else{
                            $pruf = 0;
                        }
                        $i++;
                    }
                    if($pruf != count($ja[$key]) || $i != count($ja[$key]))
                    { 
                        $pruf = 0; 
                    }
                    else{
                        $pruf = 1;
                    }

                    $result[$key]['response'] = $t;
                    $result[$key]['note'] = $pruf;
                }

            }
            else{
                $result[$key]['response'] = 'Nicht beantwortet';
                $result[$key]['note'] = 0;
            }
        }
        $userid = $_POST['userid'];
        $ids;
        $name;
        foreach($result as $key=>$value){
            if($key == 0){
                $ids = $value['ids'];
                $name = $value['name'];
            }
            else{
                $question = $value['question'];
                $response = $value['response'];
                $note = $value['note'];
                $end = $mysqli->query("INSERT INTO `poll` (ids, name, question, response, note, ip) VALUES ('$ids', '$name','$question', '$response', '$note', '$userid')");
            }
        }
        if($end){
            $_SESSION['ids'] = $result[0]['ids'];
            header( 'Location: '.$_SERVER['HTTP_REFERER'] ); 
        }
        else{
            die('Datenbank Fehler');
        }
    }  
    else {echo "Ungültiges Token";}  
}
function testInput($data) {
    $data = trim($data);
    $pattern = '/^[\'\:\?\!\.\,\-\d\s\p{L}]+$/u';
    $result = preg_match($pattern, $data);
    if($result == 1){
        $data = addslashes($data);
    }
    else{
        $data = strip_tags($data);
        $data = addslashes($data);  
        $data = htmlspecialchars($data);
        $data = htmlspecialchars($data, ENT_QUOTES, "UTF-8");
    }
    return $data;
}