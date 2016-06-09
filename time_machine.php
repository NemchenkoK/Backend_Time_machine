<?php
define('TM_LOG','time_machine.log');
  require __DIR__ . '/vendor/autoload.php';

if($_SERVER['REQUEST_METHOD'] == 'GET'){
	if(file_exists(TM_LOG))
		unlink(TM_LOG);
  echo InputOutput::renderInputData();
	exit;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['preview'])){
	echo InputOutput::renderLog();
	exit;
} 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['adult']) && isset($_POST['children']) ){
  $adult = Helper::checkedAdult($_POST['adult']) + 1;
  $children = Helper::checkedChildren($_POST['children']);

  $pr = new Present();
  $pr->setAdult($adult);
  $pr->setChildren($children);
  $fut = new Future();

  echo "Before time travel: ",$pr->info(),'. ',$fut->info(),'<br>';
  file_put_contents(TM_LOG,"Before time travel: ".$pr->info().". ".$fut->info()." \n", FILE_APPEND);

  $travel = new Leaps();
  while($pr->getAdult() !== $fut->getAdult() or $fut->getChildren() == 0){
    if($pr->getAdult() == 0){
      $travel->leap2($pr, $fut);
      echo "Whole family into the future after ".Leaps::$i." leaps<br>";
      file_put_contents(TM_LOG,"After time travel: ".$pr->info()." ".$fut->info()."\nWhole family into the future after ".Leaps::$i." leaps \n\n", FILE_APPEND);
      break;
    }
    else
      $travel->leap($pr, $fut);
  }
  echo "After time travel: ",$pr->info(),' ',$fut->info(),'<br>';
  echo InputOutput::renderLogControl();
  echo InputOutput::renderBackControl();
}