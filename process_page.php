<?php include('conn.php') ?>
<?php
// session_start();
if (isset($_POST['btnSubmit'])) {

    // move_uploaded_file($file_tmp, "upload/" . $file_name);
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $session = $_POST['session'];
    $branch = $_POST['branch'];
    $jobpos = $_POST['jobpos'];
    $jobrole = $_POST['jobrole'];
    $files = $_FILES['uploadFile'];

    $filename = $files['name'];
    $fileerror = $files['error'];
    $filetmp = $files['tmp_name'];
    $filesize = $files['size'];
    if ($filesize > 50000) {
        echo "gfh";
    } 
    else {
        $fileext = explode('.', $filename);
        $filecheck = strtolower(end($fileext));

        $fileextstored = array('png', 'jpg', 'jpeg');

        if (in_array($filecheck, $fileextstored)) {
            $dfile = 'upload/' . $filename;
            move_uploaded_file($filetmp, $dfile);
            $sql = "insert into alumnisignup Values ('" . $name . "','" . $email . "','" . $password . "','" . $session . "','" . $branch . "',
        '" . $jobpos . "','" . $jobrole . "','" . $dfile . "')";
            $result = mysqli_query($conn, $sql);
            $sql1 = "insert into alumnilogin(email,pass) Values('" . $email . "','" . $password . "')";
            $result1 = mysqli_query($conn, $sql1);
            header("Location:login.php");
        }
        else
        {
            echo "Upload valid extension";
        }
    }
}

?>