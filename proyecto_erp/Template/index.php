<?php
    $Template = new Template();
    class Template{

        private $jbody;

        function __construct(){
            $path = "Template/Valid/";
            $temp = file_get_contents( $path."index.html");
            $this->jbody = explode("{JBODY}",$temp );
            echo $this->jbody[0];
        }

        function __destruct(){
            echo $this->jbody[1];
        }
    }

 ?>