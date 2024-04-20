<?php namespace Config;

	class JRouter{
		public static function run(JRequest $request){		
			
			
			$controllerName= $request->getController()."Controller";
			 

			$method = $request->getMethod();
			$argument = $request->getArgument();

			$path= ROOT."Controllers".DS.$controllerName.".php";

			

			$FoundFile=false;
			if(is_readable($path)){
				$FoundFile=true;							 
			}

			

			if($FoundFile){		
				 
				require_once $path;
					
				$Show = "Controllers\\".$controllerName;				
				$controller = new $Show;											 
				if(!$argument){					
					$JData = call_user_func(array($controller, $method));
				}else{				 
					$JData = call_user_func_array(array($controller, $method), $argument);
				}	
			}
			

			echo '<title>'.TITLE_APP." - ".$request->getController()." - ".$method.'</title>' ;
			
			$path = ROOT."Views".DS.$request->getController().DS.$method.".php";				 
		
			if(is_readable($path)){
				require_once $path;
			}

			
		}
	}

?>