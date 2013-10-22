<?php
class Database{
	
	const hostname = 'localhost';
	const username = 'root';
	const password = '';
	const database = 'tagpila_db';
	
	public function dbConnect(){
		$connection = mysql_connect( self::hostname, self::username, self::password );
		if( $connection ){
			if( ! mysql_select_db( self::database, $connection ) ){
				die( 'Unable to find database. Terminating application.' );
				exit;
			}
		}else{
			die( 'Unable to create MySQL Connection. Terminating application.' );
			exit;
		}
	}
	
}
?>