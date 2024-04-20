<?php namespace Config;

	class AutoLoad{
		public static function run(){			 
			spl_autoload_register(function($class){
				
				$path=str_replace("\\", "/", $class).".php";				
				$pathFile = ROOT.$path;		
					 	 	 				
				include_once $pathFile;					
			});
		}
	}
?>