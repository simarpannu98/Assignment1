<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Cars</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<main class="container">
    <h1>Customize your car</h1>

    <form method="post" action="savingpage.php">
        <fieldset class="form-group">
            <label for="class" class="col-sm-1">Choose your Class:</label>
            <input name="class" id="class" required placeholder="Select Class"/>
        </fieldset>



        <fieldset class="form-group">
            <label for="year" class="col-sm-1">Choose year</label>
            <input name="year" id="year" required placeholder="Choose year"/>
        </fieldset>

        <fieldset class="form-group">
            <label for="transmission" class="col-sm-1">Choose year</label>
            <input name="transmission" id="transmission" required placeholder="Choose transmission"/>



        </fieldset>
        <fieldset class="form-group">
            <label for="company" class="col-sm-1">Choose your company:</label>
            <select name="company" id="company">
                <?php
                //Step 1 - connect to the DB
                $conn = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200359541',
                    'gc200359541', 'wl3tDZWsQf');
                $conn->setAttribute(PDO::ERRMODE_EXCEPTION);
                //Step 2 - create the SQL statement
                $sql = "SELECT * FROM companies";
                //Step 3 - prepare & execute the SQL statement
                $cmd = $conn->prepare($sql);
                $cmd->execute();
                $companies = $cmd->fetchAll();
                //Step 4 - loop over the results to build the list with <option> </option>
                foreach ($companies as $company)

                    echo '<option>'.$company['company'].'</option>';

                //Step 5 - disconnect from the DB
                $conn = null;
                ?>
            </select>
        </fieldset>

        <button class="btn btn-success col-sm-offset-2">SAVE</button>
    </form>
</main>
</body>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>