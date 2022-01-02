<form action="#upload" method='post' enctype="multipart/form-data">
    <input type="file" name="file" class="form-control" required /><br><br>
    <input class="btn btn-success" style="width:100%" type="submit" value="Upload" />
</form>
<?php 

$whatthehellisthis = $_GET["action"];
if($whatthehellisthis=="update_cover") {
    $nextA = $_GET["id"];
} else {
    $nextA = $conn->query("SELECT `id` FROM `anime` ORDER BY `id` DESC LIMIT 1");
    $nextA = mysqli_fetch_assoc($nextA);
    $nextA = $nextA["id"];
    $nextA++;
}

$name = $_FILES['file']['name'];

$tmp_name = $_FILES['file']['tmp_name'];

$position = strpos($name, ".");

$fileextension = substr($name, $position + 1);

$fileextension = strtolower($fileextension);

if (isset($name)) {
    $path = 'images/animes/';
    if(empty($name)) {
        echo "Please choose a file";
    } elseif(!empty($name)) {
        if(($fileextension !== "jpg") && ($fileextension !== "jpeg") && ($fileextension !== "png") && ($fileextension !== "bmp")) {
            echo "The file extension must be .jpg, .jpeg, .png, or .bmp in order to be uploaded";
        } elseif(($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp")) {
            if(move_uploaded_file($tmp_name, $path.$nextA.".".$fileextension)) {
                $success = 'Uploaded!';
                if($whatthehellisthis=="update_cover") {
                    $conn->query("UPDATE `anime` SET `image`='$fileextension' WHERE `id`='$nextA' LIMIT 1");
                    if($fileextension=="jpg") {
                        unlink("images/animes/$nextA.jpeg");
                        unlink("images/animes/$nextA.png");
                    }
                    if($fileextension=="jpeg") {
                        unlink("images/animes/$nextA.jpg");
                        unlink("images/animes/$nextA.png");
                    }
                    if($fileextension=="png") {
                        unlink("images/animes/$nextA.jpeg");
                        unlink("images/animes/$nextA.jpg");
                    }
                    echo '<script type="text/javascript"> window.location = "'.$config["url"].'system/admin/edit_anime/'.$nextA.'/"; </script>';
                } else {
                    echo '<script type="text/javascript"> window.location = "'.$config["url"].'system/admin/add_anime/2/'.$fileextension.'"; </script>';
                } 
            }
        }
    }
}
?>

<?php

if(($fileextension == "jpg") || ($fileextension == "jpeg") || ($fileextension == "png") || ($fileextension == "bmp")) {
    $image_cover = $name;
}

?>
