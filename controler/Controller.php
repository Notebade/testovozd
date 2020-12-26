<?
/*
*db_conn.php файл класса для подключения к базе данных
*db_sql_manager.php файл класса для выполнения sql команд
*/
require_once('db_conn.php');
require_once('db_sql_manager.php');
$dbConect=new DBConn();
$SQLM=new SQLManager($dbConect);
/*
*проверка на пост запрос отправленный через форму
*выполняет sql команды из файлов
*/
if($_POST)
{
  $SQLM->sqlsingl(file_get_contents("sql/db_test.sql"));
  $SQLM->sqlsingl(file_get_contents("sql/table_test.sql"));
  $SQLM->sqlmulti(file_get_contents("sql/table_test_data.sql"));
  echo "дамп прошел успешно";
}
else
{
  Echo "выбирай<br>";
}
?>
