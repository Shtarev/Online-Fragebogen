<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="content-language" content="de" />
<meta name="description" content="Online-Fragebogen"/>
<meta name="keywords" content="Online,Fragebogen"/>
<meta name="copyright" lang="ru" content="Netzexplorer"/>
<meta name="robots" content="index,follow"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Online-Fragebogen</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>
<?php include(__DIR__.'/src/include.php');?>
<body class="py-4 px-4">
<?php
$userid = userid();
if(!$userid){
	$userid = true;
}
$check = false;
$ids;
foreach($resip as $key=>$value){
	if(array_search($userid, $value)){
		$check = true;
		$ids = $resip[$key]['ids'];
		break;
	}
}
if(isset($_SESSION['ids'])){
	$anzeigen = 'displ';
    $ids = $_SESSION['ids'];
    $warning = '
    <div class="alert alert-success" role="alert">
        Die Daten werden gesendet. Ihre Umfrage-ID = '.$ids.'
    </div>
    ';
	session_destroy();
}
elseif($check){
	$anzeigen = 'displ';
    $warning = '
    <div class="alert alert-success" role="alert">
        Sie haben die Umfrage bereits gesendet. Ihre Umfrage-ID = '.$ids.'
    </div>
    ';
	session_destroy();
}
else {
	$anzeigen = '';
	$warning = '';
}
if(!$arr){
	$anzeigen = 'displ';
	$warning = '<center><h4 class="text-danger mb-4">Keine Fragen</h4><center>';
}
?>
  <a href="admin.php">Admin</a>
  <h3 class="text-center"><?=$benennung?></h3>
  <?=$warning?>
  <div class="<?=$anzeigen?>">
    <form id="formId" method="POST" action="src/robot.php">
		<input name="csrf_token" type="hidden" value="<?=generate_form_token()?>">
		<input type="hidden" name="userid" value="<?=$userid?>">
        <input type="text" id="namen" name="name" class="form-control mb-4 mt-4" value="" placeholder="Geben Sie Ihren Vor- und Nachnamen"/>
        <table class="table table-striped table-bordered">
          <thead class="thead-light">
            <tr>
              <th class="">#</th>
              <th class="tabwidthfrage">Frage</th>
              <th class="tabwidthantwort">Optionen für Antworten</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($arr){
                $disabled = '';
                $i = 1;
                foreach($arr as $value){
                    $li = '';
                    if($value['type'] == 'radio'){
                        foreach($value['response'] as $key=>$val){
							if($val != ''){
								$li = $li.'<li class="list-group-item"><input type="'.$value["type"].'" name="'.$value["type"].$value["id"].'" value="'.$val.'"> '.$val.'</li>';
							}
                        }
                    }
                    else {
                        foreach($value['response'] as $key=>$val){
							if($val != ''){
								$li = $li.'<li class="list-group-item"><input type="'.$value["type"].'" name="'.$value["type"].$value["id"].'[]" value="'.$val.'"> '.$val.'</li>';
							}
                        }
                    }
                    echo '
                    <tr>
                      <th class="">'.$i.'</th>
                      <td class="tabwidthfrage">'.$value["question"].'</td>
                      <td class="tabwidthantwort">
                        <ul class="list-group">
                        '.$li.'
                        </ul>
                      </td>
                    </tr>
                    ';
                    $i++;
                }
            }
            else{
                $disabled = 'disabled';
            }
            ?>
          </tbody>
        </table>
        <center><input type="button" id="send" value="Antwort senden" class="btn btn-primary" <?=$disabled?>></center>
    </form>
  </div>
<script>
    send.onclick = function(){
        if(!namen.value){ 
            namen.style.backgroundColor = '#fcbaba';
            alert('Sie haben Ihren Namen nicht eingegeben');
            namen.scrollIntoView();
        }
        else{
            formId.submit();
        }
    }
</script>
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>