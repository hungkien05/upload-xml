<?php
include_once 'config.php';
// fetch files
$sql = "SELECT filename FROM xml_files";
$result = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Upload View & Download file</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" >
    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" type="text/css" /> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" type = "text/css"/>
</head>
<body>
<br/>
<div class="container">
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2 well">
            <form action="Page/upload.php" method="post" enctype="multipart/form-data">
                <legend>Select File to Upload:</legend>
                <div class="form-group">
                    <input type="file" name="file1" />
                </div>
                <div class="form-group">
                    <input type="submit" name="submit" value="Upload" class="btn btn-info"/>
                </div>
                <?php if(isset($_GET['st'])) { ?>
                    
                    <?php if ($_GET['st'] == 'success') {
                            echo "<div class='alert alert-success text-cente'>";
                            echo "File Uploaded Successfully!";
                            echo "</div>";
                        }
                        else
                        {
                            echo "<div class='alert alert-danger text-center'>";
                            echo 'Invalid file extension !';
                            echo "</div>";
                        } ?>
                    
                <?php } ?>
            </form>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-8 col-xs-offset-2">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>File Name</th>
                        <th>View</th>
                        <th>Download</th>
                        <th>Parse XML</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                while($row = mysqli_fetch_array($result)) { ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row['filename']; ?></td>
                    <td><a href="uploads/<?php echo $row['filename']; ?>" target="_blank">View</a></td>
                    <td><a href="uploads/<?php echo $row['filename']; ?>" download>Download</td>
                    <td><a href="parser.php?file=<?php echo $row['filename']; ?>" target="_blank">Parse/ <a href="parser_fixed.php?file=<?php echo $row['filename']; ?>" target="_blank">Parse_fixed</td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>