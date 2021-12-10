<form action="#upload" method='post' enctype="multipart/form-data">
    <input type="file" name="file" class="form-control" required /><br><br>
    <input class="btn btn-success" style="width:100%" type="submit" value="Upload" />
</form>
<?php 

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
                echo '<script type="text/javascript"> window.location = "'.$config["url"].'system/admin/add_anime/2/'.$fileextension.'"; </script>';
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
