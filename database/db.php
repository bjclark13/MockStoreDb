<?php 
class Database {
		private $pdo;
    function __construct($values=array( 'mysql:host=localhost;dbname=MockDatabase', 'root', '')) {
          $connString = $values[0];
          $user = $values[1]; 
          $password = $values[2];

          $this->pdo = new PDO($connString,$user,$password);

          $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
    * Get all customers, return as array
    * @param optional where clause
    */
    function getCustomers($where = NULL) {

    	$SQL = "SELECT * FROM Customers";
    	$statement = $this->runQuery($SQL);

    	return $statement;
    }

    /**
    *	Get single customer by id
    * @param Customer ID
    */
    function getCustomerByID($id) {
    	$SQL = "SELECT * FROM Customers WHERE CustomerID = ?";
    	$results = $this->runQuery($SQL);

    	return $results;
    }

    /**
	  * Add customer to database
	  * @todo Also add to login table
	  */
    function addCustomer($fname, $lname, $notes = NULL) {
    	$SQL = "INSERT INTO Customers( FName, LName, Notes) VALUES (? , ? , ?)";
    	$results = $this->runQuery($SQL, array($fname, $lname, $notes));
    	return true;
    }

	  /**
	  * Delete customer from database
	  * @todo incorporate customer logins -- uncomment for transactions
	  */
    function deleteCustomer($id) {
  //  	$this->pdo->startTransaction();

    	$SQL = "DELETE FROM Customers WHERE CustomerID = ?";

    	$result = $this->runQuery($SQL, $id);
    	// if($result == false)
    	// 	$this->pdo->rollback();

    	//$SQL = "DELETE FROM CustomerLogins WHERE CustomerID = ?";

    //	$result = $this->runQuery($SQL, $id);
   // 	if($result == false)
    //		$this->pdo->rollback();

    //	$this->pdo->commit();
    	return true;
    }

    function runQuery($sql, $parameters=array()) {
      // Ensure parameters are in an array
      if (!is_array($parameters)) {
          $parameters = array($parameters);
      }

      $statement = null;
      if (count($parameters) > 0) {
          // Use a prepared statement if parameters 
          $statement = $this->pdo->prepare($sql);
          $executedOk = $statement->execute($parameters);
          if (! $executedOk) {
              throw new PDOException;
          }
      } else {
          // Execute a normal query     
          $statement = $this->pdo->query($sql); 
          if (!$statement) {
              throw new PDOException;
          }
      }
      return $statement;
  }    
} ?>