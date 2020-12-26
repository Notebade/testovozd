<?
/*
*класс для выполнеия sql
*/
class SQLManager
{
  /*
  *DBConnect хранит строку подключения к базе данных
  *select результат выполнения запроса
  */
  private $DBConnect;
  public $select;
  /*
  *при иницилизации класса производит получения строки подключения
  */
  function __construct(DBConn $DBConnect)
  {
    $this->DBConnect=$DBConnect;
  }
  /*
  *выполнений одиночного sql запроса
  */
  public function sqlsingl($sql)
  {
    $this->select=$this->DBConnect->ConOpen()->query($sql);
    $this->DBConnect->ConClose();
  }
  /*
  *выполнений нескольких sql запросов 
  */
  public function sqlmulti($sql)
  {
    $this->select=$this->DBConnect->ConOpen()->multi_query($sql);
    $this->DBConnect->ConClose();
  }
}
?>
