<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Saving options</title>
</head>

<body>
<h1>CONGRATULATIONS Your data has been saved</h1>
<?php
$class = $_POST['class'];
$year = $_POST['year'];
$transmission = $_POST['transmission'];
$company = $_POST['company'];


//step 1 - connect to the database
$conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200359541',
    'gc200359541', 'wl3tDZWsQf');

//step 2 - create the SQL command to INSERT a record

$sql = "INSERT INTO tbl_cars (class,  year, transmission, company) VALUES (:class,  :year, :transmission, :company)";

//step 3 - prepare the SQL command and bind the arguments to prevent SQL injection

$cmd = $conn->prepare($sql);
$cmd->bindParam(':class', $class, PDO::PARAM_STR, 50);

$cmd->bindParam(':year', $year, PDO::PARAM_INT, 4);
$cmd->bindParam(':transmission', $transmission, PDO::PARAM_STR, 20);
$cmd->bindParam(':company', $company, PDO::PARAM_STR, 20);

//step 4 - execute
$cmd->execute();
//step 5 - disconnect from database
$conn = null;
//step 6 - redirect to the albums page

?>
<h1><a href="tablespage.php">Cars List</a></h1>
</body>

</html>

