<?
/*
*класс для подключения к базе данных
*/
class DBConn
{
  /*
  *conn-переменная для хранения подключения к бд
  *переменные login, pass, ip для авторизации к базе данных
  */
  private $conn,$login="root",$pass="root",$ip="127.0.0.1";
  /*
  *открытие подключения
  */
  public function ConOpen()
  {
    return $this->conn=mysqli_connect($this->ip,$this->login,$this->pass);
  }
  /*
  *закрытие подключения
  */
  public function ConClose()
  {
    mysqli_close($this->conn);
  }
}
?>
