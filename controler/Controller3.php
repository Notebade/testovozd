<?
require_once('db_conn.php');
require_once('db_sql_manager.php');
$dbConect=new DBConn();
$SQLM=new SQLManager($dbConect);
if($_GET)
{
  if($_GET['id']!="")
  {
    $SQLM->sqlsingl("SELECT * FROM test.test where id=".$_GET['id']);
    while($row=$SQLM->select->fetch_row()){
      $body[]=$row;
    }
    $array = array(
    'status' => '1',
    'error' => '',
    'data' => array('id','pipeline-ORG','pipeline-AREA','pipeline-LINE_NUMBER','pipeline-PIPE_CLASS','pipeline-MAIN_MATERIAL','pipeline-PB_PIPELINE_CATEGORY','pipeline-FLUID_CODE','elements-MEMBER_1','elements-MEMBER_2','characteristics-D_INCHES_MEMBER_1','characteristics-MEMBER_1_DIAMETER_MM','characteristics-THICKNESS_MEMBER_1_IDENTIFICATION_SCHEDULE','characteristics-THICKNESS_MEMBER_1_MM','characteristics-D_INCHES_MEMBER_2','characteristics-MEMBER_2_DIAMETER_MM','characteristics-THICKNESS_MEMBER_2_IDENTIFICATION_SCHEDULE','characteristics-THICKNESS_MEMBER_2_MM','welding-WELDING_DATE','welding-WELDING_METHOD','welding-TYPE_OF_WELDS','welding-TYPE_OF_JOINT','welding-NO_OF_THE_JOINT_AS_PER_AS_BUILT_SURVEY','welding-WELDER_S_STAMP_ROOT_PASS','KSS'),
    'body' => $body,
  );
  $json = json_encode($array, JSON_UNESCAPED_UNICODE);
  }
  else
  {
    if($_GET['search']!="" and $_GET['date']!="" and $_GET['date2']!="")
    {
      $SQLM->sqlsingl("SELECT * FROM test.test WHERE test.`pipeline-AREA` LIKE '%".$_GET['search']."%' OR test.`elements-MEMBER_1` LIKE '%".$_GET['search']."%' AND (test.`welding-WELDING_DATE` BETWEEN '".$_GET['date']."' AND '".$_GET['date2']."')");
      while($row=$SQLM->select->fetch_row()){
        $body[]=$row;
      }
      $array = array(
      'status' => '1',
      'error' => '',
      'data' => array('id','pipeline-ORG','pipeline-AREA','pipeline-LINE_NUMBER','pipeline-PIPE_CLASS','pipeline-MAIN_MATERIAL','pipeline-PB_PIPELINE_CATEGORY','pipeline-FLUID_CODE','elements-MEMBER_1','elements-MEMBER_2','characteristics-D_INCHES_MEMBER_1','characteristics-MEMBER_1_DIAMETER_MM','characteristics-THICKNESS_MEMBER_1_IDENTIFICATION_SCHEDULE','characteristics-THICKNESS_MEMBER_1_MM','characteristics-D_INCHES_MEMBER_2','characteristics-MEMBER_2_DIAMETER_MM','characteristics-THICKNESS_MEMBER_2_IDENTIFICATION_SCHEDULE','characteristics-THICKNESS_MEMBER_2_MM','welding-WELDING_DATE','welding-WELDING_METHOD','welding-TYPE_OF_WELDS','welding-TYPE_OF_JOINT','welding-NO_OF_THE_JOINT_AS_PER_AS_BUILT_SURVEY','welding-WELDER_S_STAMP_ROOT_PASS','KSS'),
      'body' => $body,
    );
    $json = json_encode($array, JSON_UNESCAPED_UNICODE);
    }
    else
    {
      if($_GET['search']!="" or $_GET['date']!="" and $_GET['date2']!="")
      {
        $SQLM->sqlsingl("SELECT * FROM test.test WHERE test.`pipeline-AREA` LIKE '%".$_GET['search']."%' OR test.`elements-MEMBER_1` LIKE '%".$_GET['search']."%' or (test.`welding-WELDING_DATE` BETWEEN '".$_GET['date']."' AND '".$_GET['date2']."')");
        while($row=$SQLM->select->fetch_row()){
          $body[]=$row;
        }
        $array = array(
        'status' => '1',
        'error' => '',
        'data' => array('id','pipeline-ORG','pipeline-AREA','pipeline-LINE_NUMBER','pipeline-PIPE_CLASS','pipeline-MAIN_MATERIAL','pipeline-PB_PIPELINE_CATEGORY','pipeline-FLUID_CODE','elements-MEMBER_1','elements-MEMBER_2','characteristics-D_INCHES_MEMBER_1','characteristics-MEMBER_1_DIAMETER_MM','characteristics-THICKNESS_MEMBER_1_IDENTIFICATION_SCHEDULE','characteristics-THICKNESS_MEMBER_1_MM','characteristics-D_INCHES_MEMBER_2','characteristics-MEMBER_2_DIAMETER_MM','characteristics-THICKNESS_MEMBER_2_IDENTIFICATION_SCHEDULE','characteristics-THICKNESS_MEMBER_2_MM','welding-WELDING_DATE','welding-WELDING_METHOD','welding-TYPE_OF_WELDS','welding-TYPE_OF_JOINT','welding-NO_OF_THE_JOINT_AS_PER_AS_BUILT_SURVEY','welding-WELDER_S_STAMP_ROOT_PASS','KSS'),
        'body' => $body,
      );
      $json = json_encode($array, JSON_UNESCAPED_UNICODE);
      }
      else
      {
        if($_GET['select'])
        {
          $SQLM->sqlsingl("SELECT * FROM test.test WHERE test.`pipeline-AREA`='".$_GET['select']."'");
          while($row=$SQLM->select->fetch_row()){
            $body[]=$row;
          }
          $array = array(
          'status' => '1',
          'error' => '',
          'data' => array('id','pipeline-ORG','pipeline-AREA','pipeline-LINE_NUMBER','pipeline-PIPE_CLASS','pipeline-MAIN_MATERIAL','pipeline-PB_PIPELINE_CATEGORY','pipeline-FLUID_CODE','elements-MEMBER_1','elements-MEMBER_2','characteristics-D_INCHES_MEMBER_1','characteristics-MEMBER_1_DIAMETER_MM','characteristics-THICKNESS_MEMBER_1_IDENTIFICATION_SCHEDULE','characteristics-THICKNESS_MEMBER_1_MM','characteristics-D_INCHES_MEMBER_2','characteristics-MEMBER_2_DIAMETER_MM','characteristics-THICKNESS_MEMBER_2_IDENTIFICATION_SCHEDULE','characteristics-THICKNESS_MEMBER_2_MM','welding-WELDING_DATE','welding-WELDING_METHOD','welding-TYPE_OF_WELDS','welding-TYPE_OF_JOINT','welding-NO_OF_THE_JOINT_AS_PER_AS_BUILT_SURVEY','welding-WELDER_S_STAMP_ROOT_PASS','KSS'),
          'body' => $body,
        );
        $json = json_encode($array, JSON_UNESCAPED_UNICODE);
        }
      }
    }
  }
}
?>
