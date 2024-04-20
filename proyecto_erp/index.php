<?php
ini_set("display_errors","on");
    require_once "Config/AutoLoad.php";
    require_once "Config/JRequest.php";
    require_once "Config/JRouter.php";
     

    define("DS", DIRECTORY_SEPARATOR);
    define("ROOT", realpath(dirname(__FILE__)).DS);
    define("TITLE_APP","JAMA");

    Config\AutoLoad::run();
    require_once "Template/index.php";
    Config\JRouter::run(new Config\JRequest());

?>