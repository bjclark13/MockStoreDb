<?php $title="Add a Customer"; include("../header.php"); ?>

<form id="customer-add" action="customer-add.php" method="post">

<label for="Fname">First Name</label>
<input type="text" name="FName" id="Fname">

<label for="Lname">Last Name</label>
<input type="text" name="LName" id="Lname">

<label for="Notes">Notes: </label>
<textarea name="Notes"></textarea>

<button type="submit">Add Customer</button>

</form>

<?php include("../footer.php"); ?>
