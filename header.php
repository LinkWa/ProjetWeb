<?php
function loadClass($classname)
{
    require 'class//'.$classname.'.php';
}

spl_autoload_register('loadClass');

$base = new PDO('mysql:host=localhost;dbname=project3il', 'projetAnto', '123456789');
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
?>
