<?php
trait TTenses {
  public function setAdult($adult){
    $this->_adult = $this->_adult + $adult;
  }
  public function setChildren($children) {
    $this->_children = $this->_children + $children;
  }
  public function getAdult() {
    return $this->_adult;
  }
  public function getChildren(){
    return $this->_children;
  }
  public function info() {
    return $infoPresent = 'IN '.__CLASS__.' adult: '.$this->getAdult().', children: '.$this->getChildren();
  }
}