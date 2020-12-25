<?
class SQLManager
{
  private $DBConnect;
  public $select;
  function __construct(DBConn $DBConnect)
  {
    $this->DBConnect=$DBConnect;
  }
  public function sqlsingl($sql)
  {
    $this->select=$this->DBConnect->ConOpen()->query($sql);
    $this->DBConnect->ConClose();
  }
  public function sqlmulti($sql)
  {
    $this->select=$this->DBConnect->ConOpen()->multi_query($sql);
    $this->DBConnect->ConClose();
  }
}
?>
