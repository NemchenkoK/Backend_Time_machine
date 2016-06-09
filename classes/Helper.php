<?php
class Helper{

  public static function checkedAdult($data) {
    try {
      if($data < 0) {
        throw new Exception('The number of adults can not be negative!');
      }
      if(!ctype_digit($data)) {
        throw new Exception('The number of adults can not be string!');
      }
      return $data;
    } catch (Exception $ex) {
      $result = $ex->getMessage() . '<br>' . InputOutput::renderBackControl();
      die($result);
    }
  }
  public static function checkedChildren($data) {
    try {
      if($data < 0) {
        throw new Exception('The number of children can not be negative!');
      }
      if(!ctype_digit($data)) {
        throw new Exception('The number of children can not be string!');
      }
      if($data == 0) {
        throw new Exception('Traveling without children is impossible!');
      }
      return $data;
    } catch (Exception $ex) {
      $result = $ex->getMessage() . '<br>' . InputOutput::renderBackControl();
      die($result);
    }
  }
}

