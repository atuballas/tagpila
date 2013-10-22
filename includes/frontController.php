<?php
class FrontController{
	
	private static $controller = 'home';
	private static $method = 'index';
	private static $parameters = array();
	
	final public function initSystem(){
		include_once( 'includes/configuration.php' );
		include_once( 'includes/database.php' );
		Database::dbConnect();
		self::router();
	}
	
	final private function loadController(){
		if( ! file_exists( CONTROLLERSFOLDER . self::$controller . EXT ) ){
			echo 'error 404';
			exit;
		}
		/*
		Load the controller class file and execute its method, based
		on the requested URI string
		*/
		include_once( CONTROLLERSFOLDER . self::$controller . EXT );
		$classname = ucfirst( strtolower( self::$controller ) );
		$classname = new $classname();	// create class instance
		$method = self::$method;
		if( ! method_exists( $classname, $method ) ){
			echo 'error 404';
			exit;
		}
		$classname->$method();
	}
	
	final protected function loadModel( $model ){
		if( ! file_exists( MODELSFOLDER . $model . EXT ) ){
			echo 'unable to load the requested model file';
			exit;
		}
		include_once( MODELSFOLDER . $model . EXT );
		$classname = ucfirst( strtolower( $model ) );
		$this->$model = new $classname();	// create class instance, and return the instance to the passed parameter
	}
	
	final protected function loadView( $view , $data = null ){
		if( ! file_exists( VIEWSFOLDER . $view . EXT ) ){
			echo 'unable to load the requested view file';
			exit;
		}
		if( ! file_exists( THEMESFOLDER . TEMPLATEFILE . EXT ) ){
			echo 'unable to load the template file';
			exit;
		}
		include_once( THEMESFOLDER . TEMPLATEFILE . EXT );
	}
	
	final private function router(){
		$uri = $_SERVER['REQUEST_URI'];
		$uri = rtrim( ltrim( $uri, '/' ), '/' );
		$uri = explode( '/', $uri );

		if( APPDIR == '' ){
			if( isset( $uri[0] ) && ! empty( $uri[0] ) ){
				self::$controller = $uri[0];
			}

			if( isset( $uri[1] ) && ! empty( $uri[1] ) ){
				self::$method = $uri[1];
			}

			$segments = count( $uri ); 
			if( $segments > 2 ){
				for( $i=2; $i<$segments; $i++ ){
					self::$parameters[] = $uri[$i];
				}
			}
		}else{
			if( isset( $uri[1] ) && ! empty( $uri[1] ) ){
				self::$controller = $uri[1];
			}

			if( isset( $uri[2] ) && ! empty( $uri[2] ) ){
				self::$method = $uri[2];
			}

			$segments = count( $uri ); 
			if( $segments > 3 ){
				for( $i=3; $i<$segments; $i++ ){
					self::$parameters[] = $uri[$i];
				}
			}
		}
		self::loadController();
	}
}
?>