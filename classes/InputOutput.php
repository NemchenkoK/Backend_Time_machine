<?php
class InputOutput{
  public static function renderLog() {
    $result = '';
    if(file_exists(TM_LOG)){
      $result .= 'Preview travel log:<br>';
      $res = file(TM_LOG);
      foreach($res as $row){
        $result .= $row.'<br>';
      }
    } else {
      $result = 'Error reading file!';
      return $result;
    }
    $result .= self::renderBackControl();
    return $result;
  }
  public static function renderInputData() {
    return '<form  action="time_machine.php" method="POST">
            Enter the number of adults(without owner) and children<br>
            <input type="text" name="adult" size="5">
            <input type="text" name="children" size="5">
            <input type="submit" value="Ok">
            </form>';
  }
  public static function renderLogControl() {
    return '<form action="time_machine.php" method="POST">
            <input type="hidden" name="preview" value="1">
            <input type="submit" value="Preview travel log">
            </form>';
  }
  public static function renderBackControl() {
    return '<form action="time_machine.php" method="GET">
            <input type="submit" value="Back and clear Travel log">
            </form>';
  }
}