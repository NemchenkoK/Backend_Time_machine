<?php
class Leaps{
	static $i = 0;

	public function twoChildrenToFuture($pr, $fut){
		$pr->setChildren(-2);
		$fut->setChildren(2);
		file_put_contents(TM_LOG,"LEAP#".++self::$i.": 2 children to Future. RESULT: ".$pr->info().", ".$fut->info()." \n", FILE_APPEND);
	}
	
	public function childToPresent($pr, $fut){
		$pr->setChildren(1);
		$fut->setChildren(-1);
		file_put_contents(TM_LOG,"LEAP#".++self::$i.": 1 children to Present. RESULT: ".$pr->info().", ".$fut->info()." \n", FILE_APPEND);
	}
	
	public function adultToFuture($pr, $fut){
		$pr->setAdult(-1);
		$fut->setAdult(1);
		file_put_contents(TM_LOG,"LEAP#".++self::$i.": 1 adult to Future. RESULT: ".$pr->info().", ".$fut->info()." \n", FILE_APPEND);
	}
	
	public function adultToPresent($pr, $fut){
		$pr->setAdult(1);
		$fut->setAdult(-1);
		file_put_contents(TM_LOG,"LEAP#".++self::$i.": 1 adult to Present. RESULT: ".$pr->info().", ".$fut->info()." \n", FILE_APPEND);
	}

	public function leap($pr, $fut){
		$this->twoChildrenToFuture($pr, $fut);
		$this->childToPresent($pr, $fut);
		$this->adultToFuture($pr, $fut);
		$this->childToPresent($pr, $fut);
	}
	public function leap2($pr, $fut){
		$this->twoChildrenToFuture($pr, $fut);
		while($pr->getChildren() !== 0){
			$this->childToPresent($pr, $fut);
			$this->twoChildrenToFuture($pr, $fut);
		}			
		$this->adultToPresent($pr, $fut);
	}
}