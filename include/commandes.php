<?php
// commandes.php for  in /Users/Abrahxas/ETNA/Piscine-PHP/microshell/include
//
// Made by Vincent Queguiner
// Login   <quegui_v@etna-alternance.net>
//
// Started on  Sat Apr 12 18:22:30 2014 Vincent Queguiner
// Last update Sat Apr 12 18:29:51 2014 Vincent Queguiner
//

function	cmd_echo($params)
{
  if (isset($params[1]))
    {
      for ($i = 1; isset($params[$i]); $i++)
	{
	  if (isset($params[$i + 1]))
	    echo $params[$i]." ";
	  else
	    echo $params[$i]."\n";
	}
    }else
    echo "\n";
}

function	cmd_pwd($param)
{
  global $path;
  echo $path."\n";
}

function	cmd_cd($param = NULL)
{
  global $path;
  global $previous;

  if (isset($param[1]))
    {
      if ($param[1] == "..")
	{
	  my_cdcase($param);
	}
      elseif ($param[1] == "-")
	{
	  $tmp = $previous;
	  $path = $tmp;
	  $previous = $path;
	}
      elseif (file_exists($path.$param[1]))
	{
	  $previous = $path;
	  $path = $path.$param[1];
	}
      else
	echo "$param[0]: $param[1]: No such file or directory\n";
    }
  else
    $path = getenv('HOME');
}

function	cmd_ls($param)
{
  global $path;

  if (!isset($param[1]))
    $var = $path;
  else
    $var = $param[1];
  if (file_exists($var))
    {
      $var = opendir($var);
      while (($file = readdir($var)) !== false)
	{
	  if ($file[0] != '.')
	    {
	      if (is_link($file))
		echo $file."@\n";
	      else if (is_file($file))
		echo $file."*\n";
	      else
		echo $file."/\n";
	    }
	      }
      closedir($var);
    }
  else
    echo "$param[0]: $var: Not a directory\n";
}

function	cmd_cat($params)
{
  for ($i = 1; isset($params[$i]); $i++)
    {
      if (file_exists($params[$i]))
	{
	  if (!is_dir($params[$i]))
	    {
	      if (is_readable($params[$i]))
		{
		  my_cat($params[$i]);
		}
	      else
		echo "$params[0]: $params[$i]: Permission denied\n";
	    }
	  else
	    echo "$params[0]: $params[$i]: Is a directory\n";
	}
      else
        echo "$params[0]: $params[$i]: No such file or directory\n";
    }
}