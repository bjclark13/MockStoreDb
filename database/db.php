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

    	$SQL = "SELECT * FROM Customers ORDER BY LName";
    	$statement = $this->runQuery($SQL);

    	return $statement;
    }

    /**
    *	Get single customer by id
    * @param Customer ID
    */
    function getCustomerByID($id) {
    	$SQL = "SELECT * FROM Customers WHERE CustomerID = ?";
    	$results = $this->runQuery($SQL, array($id));

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
  //  	$this->pdo->beginTransaction();

    	$SQL = "DELETE FROM Customers WHERE CustomerID = ? ";

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

    function getDepartments($where = null) {
    	$SQL = "SELECT * FROM Departments ORDER BY Name";
    	$result = $this->runQuery($SQL);
    	return $result;
    } 

    function getProducts($where = null) {
    	$SQL = "SELECT * FROM Products ORDER BY Name";
    	$result = $this->runQuery($SQL);
    	return $result;
    } 

    function getDepartmentByID($id) {
    	$SQL = "SELECT * FROM Departments WHERE DepartmentID = ?";
    	$sth = $this->pdo->prepare ($SQL);
    	$sth->bindParam (1, $id); 
    	$sth->execute();  

    	$result = $sth->fetch(PDO::FETCH_ASSOC);

    	return $result;
    } 

    function getProductByID($id) {
    	$SQL = "SELECT * FROM Products WHERE ProductID = ?";
    	$sth = $this->pdo->prepare ($SQL);
    	$sth->bindParam (1, $id); 
    	$sth->execute();  

    	$result = $sth->fetch(PDO::FETCH_ASSOC);

    	return $result;
    } 

    function addProduct($name, $price,  $department_id, $notes) {
    	$SQL = "INSERT INTO Products(Name, Price, DepartmentID, Notes) VALUES(? , ? ,? , ?)";
    	$result = $this->runQuery($SQL, array($name, $price, $department_id, $notes));
    	return $result;
    }

    function completeOrder($cart) {
      $SQL = "INSERT INTO orders(DatePurchased) VALUES(now());";
     
     try {
      $this->pdo->beginTransaction();
      $sth = $this->pdo->prepare ($SQL);
      $sth->execute(); 
      $order_id = $this->pdo->lastInsertId();

      foreach($cart as $product_id => $quantity) {
        $SQL = "INSERT INTO orderdetails(`OrderID`, `ProductID`, `Quantity`) VALUES (?, ? , ?)";

        $sth = $this->pdo->prepare ($SQL);
        $sth->bindParam (1, $order_id);
        $sth->bindParam (2, $product_id); 
        $sth->bindParam (3, $quantity); 

        $sth->execute(); 
      }

      $this->pdo->commit();
    }

    catch( PDOException $Exception ) {
      $this->pdo->rollback();
      return false;
    }
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