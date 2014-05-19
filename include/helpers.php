<?php
// helpers.php for helpers in /Users/Abrahxas/ETNA/Piscine-PHP/microshell/include
//
// Made by Vincent Queguiner
// Login   <quegui_v@etna-alternance.net>
//
// Started on  Sat Apr 12 18:31:21 2014 Vincent Queguiner
// Last update Sat Apr 12 18:32:33 2014 Vincent Queguiner
//

function	my_prompt()
{
  $fd = fopen("php://stdin", "r");
  if ($fd !== false)
    {
      my_affprompt();
      while (($line = fgets($fd)) !== false)
	{
	  $params = my_explodeparams($line);

	  $ptr = 'cmd_'.$params[0];
	  if (function_exists($ptr))
	    {
	      $ptr($params);
	    }
	  my_affprompt();
	}
      fclose($fd);
    }
}

function	my_affprompt()
{
  echo "$> ";
}

function	my_explodeparams($params)
{
  $array = '';

  for ($i = 0; isset($params[$i]); $i++)
    {
      if(isset($params[$i + 1]) && $params[$i] != '"')
	$array .= $params[$i];
    }
  return (explode(' ', $array));
}

function	my_cat($param)
{
  if (!fopen($param, "r"))
    echo "cat: $param: Cannot open file\n";
  else
    {
      $handle = fopen($argv[$i], "r");
      $contents = fread($handle, filesize($argv[$i]) + 1);
      echo $contents;
      fclose($handle);
    }
}