<?php

/*
*	Database Helper Class. This class manages connecting to the MySQL
*	database to make sure it is always safe, and also easily maintainable.
*/

include_once('../config.php');

class DatabaseHelper {
	/*	Connection to database */
	private $conn;

	/*	Constructor */
	function __construct($connect_db = true) {
		$this->make_conn($connect_db);
	}

	/*	Destructor */
	function __destruct() {
		$this->close_conn();
	}

	/*	Creates a connection to the database */
	public function make_conn($connect_db = true) {
		// Try make a connection
		$this->conn = new mysqli(MYSQL_HOST, MYSQL_USERNAME, MYSQL_PASSWORD);
		
		// Test connection
		if ($this->conn->connect_error) die("Connection to MySQL failed: " . $this->conn->connect_error);

		// Connect to database
		if ($connect_db) {
			if (!mysqli_select_db($this->conn, DATABASE_NAME)) {
				echo "Database does not exist";
			}
		}
	}

	/*	Runs a SQL query on the database 
	*	Precondition:	conn is a connection
	*	sql:			MySQL Query to execute
	*	Return val:		FALSE on failure, TRUE otherwise, or mysqli_result object
	*/
	public function run_query($sql) {
		$ret = $this->conn->query($sql);
		
		return $ret;
	}

	/*	Closes database connection */
	public function close_conn() {
		$this->conn->close();
	}
}

?>