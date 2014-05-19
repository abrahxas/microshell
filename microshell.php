#!/usr/bin/php
<?php
// microshell.php for microshell in /Users/Abrahxas/ETNA/Piscine-PHP/microshell
//
// Made by Vincent Queguiner
// Login   <quegui_v@etna-alternance.net>
//
// Started on  Sat Apr 12 18:18:37 2014 Vincent Queguiner
// Last update Sat Apr 12 18:21:47 2014 Vincent Queguiner
//

include_once ('./include/commandes.php');
include_once ('./include/environment.php');
include_once ('./include/helpers.php');

$path = getcwd();
$previous = NULL;
my_prompt();