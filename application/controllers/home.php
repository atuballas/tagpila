<?php // Test commit by harold
class Home extends FrontController{
	public function __construct(){
		// load model class that is needed for this controller
		// usual load of model must be inside the constructor
		$this->loadModel( 'home_model' );
	}
	
	public function index(){
		$this->home_model->testmodelmethod();	// sample model class method call
		$data['page_title'] = "Tagpila.com - a Philippine products search website";
		$this->loadView( 'view_home' , $data ); // sample view call
	}
}
?>