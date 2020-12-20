<?php
if(isset($_GET['file'])) {
    $file = $_GET['file'];
}
$xml=simplexml_load_file("uploads/".$file) or die("Error: Cannot create object");
// foreach($xml->children() as $students) {
//   echo $students->name . ", ";
//   echo $students->birthyear . ", ";
//   echo $students->school . "<br>";
// }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" type = "text/css"/>
</head>
<body>
    <div class="page-header">    </div>
    <div class = "container-fluid">
        <div class = "row" >
            
            <div class="vl"></div>
            <div class="col-md-6 col-md-offset-1">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Birthyear</th>
                            <th>School</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    //
					foreach($xml->children() as $students) {
					  echo "<tr><td>".$students->name . "</td> ";
					  echo "<td>".$students->birthyear . "</td> ";
					  echo "<td>".$students->school . "</td></tr> ";
					}

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>