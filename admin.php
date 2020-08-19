<?php
function __autoload( $className ) {  
    include "src/" . $className . ".php";
}
$dirweg = new Dirweg;
$pass_view = $dirweg->serdirurl.'src';
$pass = new Pass;
if(isset($_POST['ausgang'])){
    $pass->aus();
    $pass->pruf($pass_view);
}
else {
    $pass->pruf($pass_view);
}
require_once('src/anschluss.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Almin</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css">
</head>

<body class="py-4 px-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="index.php" target="_blank">FRAGEBOGEN</a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="admin.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?displ">Redigieren</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?alle">Umfrage ansehen</a>
          </li>
        </ul>
      </div>
	  <form method="post" action="">
		<input type="hidden" name="ausgang">
		<input type="submit" class="btn btn-secondary" value="Ausgang">
	  </form>
    </nav>
    <?php
      if(isset($_GET['result'])){
        $result = $_GET['result'];
        echo '<div class="alert alert-success" role="alert">'.$result.'</div>';
      }
    ?>
    <form id="del"></form>
    <div class="<?=$alle?>">
        <h3 class="text-center">Liste der Umfragen</h3>
        <ol class="list-counter-square">
        <?php
        foreach($all as $value){
            echo "<li>ID-".$value['ids']." | Имя: ".$value['name']."&#160;&#160;&#160;<a href='?ids=".$value['ids']."' class='text-dark text-uppercase'>Sehen</a></li>";
        }
        ?>
    </ol>
    </div>
    <div class="<?=$eine?>">
        <h3 class="text-center">Der Befragte <?=$ein[0]['name']?> c ID-<?=$ein[0]['ids']?></h3>
        <table class="table table-striped table-bordered">
          <thead class="thead-light">
            <tr>
              <th>#</th>
              <th>Frage</th>
              <th>Antwort</th>
            </tr>
          </thead>
          <tbody>
        <?php
        if($ids){
            $i=1;
            $gesamt=0;
            $gut=0;
            $schlecht=0;
            $notemarker = '';
            foreach($ein as $value){
                if($value['note']){
                    $notemarker = 'text-success';
                    $gut++;
                    $gesamt++;
                }
                else {
                    $notemarker = 'text-danger';
                    $schlecht++;
                    $gesamt++;
                }
                echo '
                    <tr>
                      <th>'.$i.'</th>
                      <td>'.$value['question'].'</td>
                      <td>
                        <ul class="list-group">
                          <li class="list-group-item '.$notemarker.'">'.$value['response'].'</li>
                        </ul>
                      </td>
                    </tr>
                    ';
                    $i++;
            }
            echo '<p><b class="text-muted">Der richtigen Antworten:</b> '.$gut.' aus '.$gesamt.'<br><b class="text-muted">Falsche Antworten:</b> '.$schlecht.' aus '.$gesamt.'</p>';
        }
        ?>
        </tbody>
        </table>
    </div>
    <div class="<?=$questnew?>"> 
	<div class="shadow-lg p-3 mb-5 bg-white rounded">
    <br><br><h4 class="text-center">Umfragename</h4><br>
    <form method="POST" action="src/admin_robot.php">
        <input type="text" name="benennung" class="form-control mb-2 mr-3 col" value="<?=$benennung?>">
		<br>
        <center><input type="submit" class="btn btn-success" value="Editieren"></center>
	</form>
    <br><br>
    
    <form id="newForm" method="POST" action="src/admin_robot.php">
		<br><br><h4 class="text-center">Frage hinzufügen</h4>
        <br><h5><b>Frage</b></h5>
        <input type="text" id="question0" name="question0" class="form-control border-success mb-4" value="">
        <b>Antworten</b>&#160;&#160;&#160;Markieren Sie, wenn die erwarteten Antworten mehr als eine sind&#160;<input type="checkbox" id="type0" name="type0" value="checked"><br><br>
        <p>Markieren Sie der richtigen Antwort</p>
        <div class="row"><input class="col-1" type="checkbox" id="ja01" name="ja0[1]" value="checked"><input type="text" id="response01" name="response0[1]" class="form-control mb-2 mr-3 col" value=""></div>
        <div class="row"><input class="col-1" type="checkbox" id="ja02" name="ja0[2]" value="checked"><input type="text" id="response02" name="response0[2]" class="form-control mb-2 mr-3 col" value=""></div>
        <div class="row"><input class="col-1" type="checkbox" id="ja03" name="ja0[3]" value="checked"><input type="text" id="response03" name="response0[3]" class="form-control mb-2 mr-3 col" value=""></div>
        <div class="row"><input class="col-1" type="checkbox" id="ja04" name="ja0[4]" value="checked"><input type="text" id="response04" name="response0[4]" class="form-control mb-2 mr-3 col" value=""></div>
        <div class="row"><input class="col-1" type="checkbox" id="ja05" name="ja0[5]" value="checked"><input type="text" id="response05" name="response0[5]" class="form-control mb-2 mr-3 col" value=""></div>
        <div class="row"><input class="col-1" type="checkbox" id="ja06" name="ja0[6]" value="checked"><input type="text" id="response06" name="response0[6]" class="form-control mb-2 mr-3 col" value=""></div>
        <input type="hidden" name="new">
		<center><input type="button" class="btn btn-success" onClick="newPruf()" value="Neue Frage erstellen"></center>
	</form>
    </div>
	<br><br><h4 class="text-center">Verfügbare Fragen</h4>
    <form id="formID" method="POST" action="src/admin_robot.php">
        <?php
        foreach($new as $key=>$value){
            if($value['type'] == 'checkbox'){
                $type = 'checked';
            }
            else {
                $type = '';
            }
            if(isset($value['response'][0])){$response[0] = $value['response'][0];}else{$response[0] = '';}
            if(isset($value['response'][1])){$response[1] = $value['response'][1];}else{$response[1] = '';}
            if(isset($value['response'][2])){$response[2] = $value['response'][2];}else{$response[2] = '';}
            if(isset($value['response'][3])){$response[3] = $value['response'][3];}else{$response[3] = '';}
            if(isset($value['response'][4])){$response[4] = $value['response'][4];}else{$response[4] = '';}
            if(isset($value['response'][5])){$response[5] = $value['response'][5];}else{$response[5] = '';}
            echo '
            <br>
            <h5><b>Frage № '.$key.'</b>&#160;&#160;&#160;<button type="button" class="btn btn-danger" onClick="del(\''.$admin_robot.'src/admin_robot.php?del='.$value['id'].'\', \'Frage № '.$key.'\')">Frage löschen</button></h5>
            <input type="text" id="question'.$value['id'].'" name="question'.$value['id'].'" class="form-control border-success mb-4" value="'.$value['question'].'">
            <b>Antworten</b>&#160;&#160;&#160;Markieren Sie, wenn die erwarteten Antworten mehr als eine sind&#160;<input type="checkbox" id="type'.$value['id'].'" name="type'.$value['id'].'" value="checked" '.$type.'><br><br>
            <p>Markieren Sie der richtigen Antwort</p>
            <div class="row"><input class="col-1" type="checkbox" id="ja'.$value['id'].'1" name="ja'.$value['id'].'[1]" value="checked" '.$value['ja'][1].'><input type="text" id="response'.$value['id'].'1" name="response'.$value['id'].'[1]" class="form-control mb-2 mr-3 col" value="'.$response[0].'"></div>
            <div class="row"><input class="col-1" type="checkbox" id="ja'.$value['id'].'2" name="ja'.$value['id'].'[2]" value="checked" '.$value['ja'][2].'><input type="text" id="response'.$value['id'].'2" name="response'.$value['id'].'[2]" class="form-control mb-2 mr-3 col" value="'.$response[1].'"></div>
            <div class="row"><input class="col-1" type="checkbox" id="ja'.$value['id'].'3" name="ja'.$value['id'].'[3]" value="checked" '.$value['ja'][3].'><input type="text" id="response'.$value['id'].'3" name="response'.$value['id'].'[3]" class="form-control mb-2 mr-3 col" value="'.$response[2].'"></div>
            <div class="row"><input class="col-1" type="checkbox" id="ja'.$value['id'].'4" name="ja'.$value['id'].'[4]" value="checked" '.$value['ja'][4].'><input type="text" id="response'.$value['id'].'4" name="response'.$value['id'].'[4]" class="form-control mb-2 mr-3 col" value="'.$response[3].'"></div>
            <div class="row"><input class="col-1" type="checkbox" id="ja'.$value['id'].'5" name="ja'.$value['id'].'[5]" value="checked" '.$value['ja'][5].'><input type="text" id="response'.$value['id'].'5" name="response'.$value['id'].'[5]" class="form-control mb-2 mr-3 col" value="'.$response[4].'"></div>
            <div class="row"><input class="col-1" type="checkbox" id="ja'.$value['id'].'6" name="ja'.$value['id'].'[6]" value="checked" '.$value['ja'][6].'><input type="text" id="response'.$value['id'].'6" name="response'.$value['id'].'[6]" class="form-control mb-2 mr-3 col" value="'.$response[5].'"></div>
            <br><br>
            ';
        }
        ?>
        <input type="hidden" name="erneuen">
		<br><br>
        <center><input id="send" type="button" class="btn btn-success mt-2" value="Speichern">&#160;&#160;&#160;<input type="button" class="btn btn-danger mt-2" value="Alle löschen" onClick="del('<?=$admin_robot?>src/admin_robot.php?del=all', 'all')"></center>
    </form>
    <br>
    </div>
    <div class="<?=$home?>">
        <h3 class="text-center">Hallo Admin!</h3>
    </div>
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>