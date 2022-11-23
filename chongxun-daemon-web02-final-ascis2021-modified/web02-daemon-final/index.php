<form action="index.php" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php
	define('SERVER_ROOT', 'http://'.$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].'/');

    function uuid4()
    {
        return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),
            mt_rand(0, 0xffff),
            mt_rand(0, 0x0fff) | 0x4000,
            mt_rand(0, 0x3fff) | 0x8000,
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

    if(isset($_POST["submit"])) {
        $tmp  = basename($_FILES["fileToUpload"]["name"]);
        $extension = pathinfo($tmp, PATHINFO_EXTENSION);
        $filename = uuid4();
        $target_file = "images/upload/".$filename.".".$extension;

        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<center><b><p style='font-size:20px; color:#ff5050'>Your file has been uploaded.</p></b></center>";
            $target_file = SERVER_ROOT.$target_file;
            echo "<center><b><p style='font-size:15px; color:#cc0066'>The file locate at: <a href ='".htmlentities($target_file)."'>".htmlentities($target_file)."</a></p></b></center>";
            echo "<center><b><p style='font-size:15px; color:#cc0066'>Click <a href='/'>here</a> for redirect to the account page.</p></b></center>";

        } else {
            echo "<center><b><p style='font-size:15px; color:#cc0066'>Sorry, there was an error uploading your file. The page auto refresh after 5 second</p></b></center>";
            echo '<meta http-equiv="refresh" content="5;url=/"/>';
        }
    }
?>