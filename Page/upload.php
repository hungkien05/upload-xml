<?php
require_once "../config.php";
//check if form is submitted
if (isset($_POST['submit']))
{
    $filename = $_FILES['file1']['name'];

    //upload file
    if($filename != '')
    {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        $allowed = ['xml','txt'];
    
        //check if file type is valid
        if ((in_array($ext, $allowed)))
        {
            // get last record id
            $sql = 'select max(id) as id from xml_files';
            $result = mysqli_query($con, $sql);
            if (count($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $filename = ($row['id']+1) . '-' . $filename;
            }
            else
                $filename = '1' . '-' . $filename;

            //set target directory
            $path = '../uploads/';
                
            $created = @date('Y-m-d H:i:s');
            if (move_uploaded_file($_FILES['file1']['tmp_name'],($path . $filename))){
            // insert file details into database
                echo $filename;
                $sql = "INSERT INTO xml_files (filename, created) VALUES('$filename', '$created')";
                mysqli_query($con, $sql);
                header("Location: ../index.php?st=success");
            } else {
                echo "loi move_uploaded_file";
                header("Location: ../index.php?st=error");
            }
        }    
        else
        {
            header("Location: ../index.php?st=error");
        }
    }
    else
        header("Location: ../index.php");
}
?>