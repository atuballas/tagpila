<?php
class Search extends FrontController{
	
	public function __construct(){

	}
	
	public function index(){
		$data['page_title'] = "Tagpila.com - search results.";
		$this->loadView( "view_search" , $data );
	}
	
	public function process(){
		$this->index();
	}
	
}

?>