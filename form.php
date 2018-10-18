<?php 

$error = '';
$leerling = '';
$vak = '';
$klas = '';
$leraar = '';

function clean_text($str) {
  $str = trim($str);
  $str = stripcslashes($str);
  $str = htmlspecialchars($str);
  return $str;
}

if(isset($_POST['submit'])){
  // form has been submitted
  // check if all the fields were also submited
  // Setup optional error variable
  if(empty($_POST['leerling'])){
    $error .= '<p>Het leerling veld is niet correct ingevult</p>';
  } else {
    $leerling = clean_text($_POST['leerling']);    
    // now put data in the database somehow
  }
  if(empty($_POST['vak'])){
    $error .= '<p>Er ging iets mis met het gekozen vak, probeer opnieuw</p>';
  } else {
    $vak = clean_text($_POST['vak']); 
    // now put data in the database somehow
  }

} elseif (isset($_POST['submit2'])) {
  if(empty($_POST['leraar'])) {
    $error .= '<p>Het leraren veld is niet geheel correct ingevult</p>';
  } else {
    $leraar = clean_text($_POST['leraar']); 
    // now put data in the database somehow
  }
  
} else {
  // form has not yet been submitted do nothing
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>From</title>
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"></head>
  <style>
    .cont {
      width: 80vw;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .recieved {
      width: 100%;
      max-width: 800px;
      margin: 4em auto 4em;
    }
    form {
      /* width: 80vw;
      max-width: 750px; */
    }
    .row {
      margin-right: 1em;
      margin-left: 1em;
    }
  </style>
<body>

  <div class="recieved">
    <div class="row">
      <div class="col-xs-12">
        <?php
          if(isset($_POST['submit'])){
            echo "<h2>Succesvol leerling formulier verstuurd</h2>";
            echo "</div></div><div class=\"row\"><div class=\"col-xs-12\">";
            echo "<p>Verstuurde informatie:</p>";
            echo "</div></div><div class=\"row\"><div class=\"col-xs-12\">";
            
            foreach($_POST as $key => $val) {
              if($key !== "submit") {
                echo "<p><span class=\"ontvangen\">$key</span> <span>$val</span></p></div</div><div class=\"row\"><div class=\"col-xs-12\">";
              }
            }
          }
          if(isset($_POST['submit2'])){
            echo "<h2>Succesvol leraar formulier verstuurd</h2>";
            echo "</div></div><div class=\"row\"><div class=\"col-xs-12\">";
            echo "<p>Verstuurde informatie:</p>";
            echo "</div></div><div class=\"row\"><div class=\"col-xs-12\">";
            
            foreach($_POST as $key => $val) {
              if($key !== "submit2") {
                echo "<p><span class=\"ontvangen\">$key</span> <span>$val</span></p></div></div><div class=\"row\"><div class=\"col-xs-12\">";
              }
            }
          }

        ?>
      </div>
    </div>
  </div>

<div class="container">
  <form action="form.php" method="post">
    <fieldset>
    <legend>Voeg leerling toe</legend>
    <div class="form-group">
      <label for="leerlingnaam">Leerling Naam</label>
      <input 
        type="text" 
        class="form-control" 
        name="leerling" 
        id="leerling_naam" 
        placeholder="Jan Klasen">
    </div>
    <div class="form-group">
      <label for="vak">Vak toevoegen</label>
      <select class="form-control" id="vak" name="vak">
        <option>Scheikunde</option>
        <option>Biologie</option>
        <option>Natuurkunde</option>
        <option selected>Wiskunde</option>
        <option>Economie</option>
        <option>Duits</option>
        <option>Frans</option>
      </select>
    </div>
    <input type="submit" name="submit" value="Verstuur">
    </fieldset>
  </form>
  <form action="form.php" method="post">
    <fieldset>
    <legend>Voeg leraar toe</legend>
    <div class="form-group">
      <label for="leraarnaam">Leraar naam</label>
      <input 
        type="text" 
        class="form-control" 
        name="leraar" 
        id="leraar_naam" 
        placeholder="Jan Klasen">
    </div>
    <div class="form-group">
      <label for="vak">Lesgeven in:</label>
      <select multiple class="form-control" id="vak" name="vak">
        <option>Scheikunde</option>
        <option>Biologie</option>
        <option>Natuurkunde</option>
        <option selected>Wiskunde</option>
        <option>Economie</option>
        <option>Duits</option>
        <option>Frans</option>
      </select>
    </div>
    <input type="submit" name="submit2" value="Verstuur">
    </fieldset>
  </form>
</div>

</body>
</html>