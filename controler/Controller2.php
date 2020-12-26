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
*проверка на GET запрос
*выполняет sql команды и получает ответ в виде json
*/
if($_GET)
{
  /*
  *выбирает числа из строки запроса по типу ?page=dsa23dsa1 получит:231
  */
  $limit=filter_var($_GET['limit'], FILTER_SANITIZE_NUMBER_INT);
  $page=filter_var($_GET['page'], FILTER_SANITIZE_NUMBER_INT);
  /*
  *проверка на пустоту обоих запросов
  *$body- запись массива полученых данных
  */
  if($limit!="" and $page!="")
  {
    $SQLM->sqlsingl("select * from test.test LIMIT ".$limit." OFFSET ".$page);
    while ($row=$SQLM->select->fetch_row()) {
      $body[]=$row;
    }
    $array = array(
    'status' => '1',
    'error' => '',
    'data' => array('id','pipeline-ORG','pipeline-AREA','pipeline-LINE_NUMBER','pipeline-PIPE_CLASS','pipeline-MAIN_MATERIAL','pipeline-PB_PIPELINE_CATEGORY','pipeline-FLUID_CODE','elements-MEMBER_1','elements-MEMBER_2','characteristics-D_INCHES_MEMBER_1','characteristics-MEMBER_1_DIAMETER_MM','characteristics-THICKNESS_MEMBER_1_IDENTIFICATION_SCHEDULE','characteristics-THICKNESS_MEMBER_1_MM','characteristics-D_INCHES_MEMBER_2','characteristics-MEMBER_2_DIAMETER_MM','characteristics-THICKNESS_MEMBER_2_IDENTIFICATION_SCHEDULE','characteristics-THICKNESS_MEMBER_2_MM','welding-WELDING_DATE','welding-WELDING_METHOD','welding-TYPE_OF_WELDS','welding-TYPE_OF_JOINT','welding-NO_OF_THE_JOINT_AS_PER_AS_BUILT_SURVEY','welding-WELDER_S_STAMP_ROOT_PASS','KSS'),
    'body' => $body,
  );
  /*
  *$json строка для формирования Json ответа
  */
  $json = json_encode($array, JSON_UNESCAPED_UNICODE);
  echo $json;
  }
  else
  {
    echo "Ваш запрос не правильный<br>Пример:table_json.php?page=1&limit=2";
  }
}
else
{
  Echo "вводи данные";
}
?>
