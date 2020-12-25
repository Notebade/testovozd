<?
require_once('db_conn.php');
require_once('db_sql_manager.php');
/**
 *
 */
class Filter extends SQLManager
{
  private
  public function htmlget()
  {
    echo '
    <form method="GET">
      <input type="number" name="id" placeholder="id">
      <input type="text" name="search" placeholder="pipeline or elements">
      <input type="date" name="date">
      <input type="date" name="date2">
      <input type="submit" value="фильтр">
      <input type="reset" value="сбросить">
    </form>';
  }
}

?>
