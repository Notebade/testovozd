<?
require_once('controler/Controller3.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <title>Document</title>
</head>
<body>
  <h2>фильтрация работает:</h2>
  <ul>
    <li>Ввести только id</li>
    <li>Заполнить все поля кроме id</li>
    <li>дата от до</li>
    <li>Ввести только pipeline</li>
    <li>Ввести только elements</li>
  </ul>
  <form method="GET">
    <input type="number" name="id" placeholder="id">
    <input type="text" name="search" placeholder="pipeline or elements">
    pipeline-AREA
    <select name="select">
      <option></option>
    <?
    $SQLM->sqlsingl("SELECT test.`pipeline-AREA` FROM test.test GROUP BY test.`pipeline-AREA` ORDER BY test.`pipeline-AREA`");
    while($row=$SQLM->select->fetch_assoc()){
      echo "<option>".$row['pipeline-AREA']."</otipn>";
    }
    ?>
    </select>
    <input type="date" name="date">
    <input type="date" name="date2">
    <input type="submit" value="фильтр">
    <input type="reset" value="сбросить">
  </form>
    <?  echo $json; ?>
</body>
</html>
