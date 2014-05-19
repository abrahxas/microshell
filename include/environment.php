<?php
// environment.php for environment in /Users/Abrahxas/ETNA/Piscine-PHP/microshell/include
//
// Made by Vincent Queguiner
// Login   <quegui_v@etna-alternance.net>
//
// Started on  Sat Apr 12 18:30:07 2014 Vincent Queguiner
// Last update Sat Apr 12 18:31:07 2014 Vincent Queguiner
//

function	cmd_exit()
{
  die();
}

function	my_cdcase($param)
{
  global $path;
  global $previous;
  $array = explode("/", $path);

  $previous = $path;
  $path = "/";
  for ($i = 1; isset($array[$i]); $i++)
    {
      if (isset($array[$i + 1]))
	$path .= $array[$i]."/";
    }
}

function	cmd_env()
{
}

function	cmd_setenv()
{
}

function	cmd_unsetenv()
{
}