<?php
function autoload($class)
{
    str_replace('\\', '/', $class);
    $path = "$class.php";

    if (is_file($path))
        require_once($path);
}
spl_autoload_register("autoload");
