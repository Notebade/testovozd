<?
class DBConn
{
  private $conn,$login="root",$pass="root",$ip="127.0.0.1";
  public function SetDBN($dbn)
  {
    if($dbn!="")
    {
      $this->dbn=$dbn;
    }
  }
  public function ConOpen()
  {
    return $this->conn=mysqli_connect($this->ip,$this->login,$this->pass,$this->dbn);
  }
  public function ConClose()
  {
    mysqli_close($this->conn);
  }
}
?>
