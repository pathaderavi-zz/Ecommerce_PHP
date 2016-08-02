<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<title>Storing Images in DB</title>
</head>
<body>
<h2>Basic upload of image to a database</h2>
<form method="post" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
Select Image File:
<input type="file" name="userfile"  size="40">
<input type="hidden" name="MAX_FILE_SIZE" value="10000000">
<select name="image_ctgy">
<option value="animals">Animals</option>
<option value="vegetables">Vegetables</option>
<option value="minerals">Minerals</option>
</select>
<br />
<input type="submit" value="submit">
</form>

<?php

/*** check if a file was submitted ***/
if(!isset($_FILES['userfile'], $_POST['image_ctgy']))
    {
    echo '<p>Please select a file</p>';
    }
else
    {
    try {
        upload();
        /*** give praise and thanks to the php gods ***/
        echo '<p>Thank you for submitting</p>';
        }
    catch(PDOException $e)
        {
    echo '<h4>'.$e->getMessage().'</h4>';
        }
    catch(Exception $e)
        {
        echo '<h4>'.$e->getMessage().'</h4>';
        }
    }


/**
 *
 * the upload function
 * 
 * @access public
 *
 * @return void
 *
 */
function upload(){
/*** check if a file was uploaded ***/
if(is_uploaded_file($_FILES['userfile']['tmp_name']) && getimagesize($_FILES['userfile']['tmp_name']) != false)
    {
    /*** an array of allowed categories ***/
    $cat_array = array("animals", "vegetables", "minerals");
    if(filter_has_var(INPUT_POST, "notset") !== false || in_array($_POST['image_ctgy'], $cat_array) !== false)
        {
        $image_ctgy = filter_input(INPUT_POST, "image_ctgy", FILTER_SANITIZE_STRING);
        }
    else
        {
        throw new Exception("Invalid Category");
        }
    /***  get the image info. ***/
    $size = getimagesize($_FILES['userfile']['tmp_name']);

    /*** assign our variables ***/
    $image_type   = $size['mime'];
    $imgfp        = fopen($_FILES['userfile']['tmp_name'], 'rb');
    $image_width  = $size[0];
    $image_height = $size[1];
    $image_size   = $size[3];
    $image_name   = $_FILES['userfile']['name'];
    $maxsize      = 99999999;

    /***  check the file is less than the maximum file size ***/
    if($_FILES['userfile']['size'] < $maxsize )
        {
        /*** create a second variable for the thumbnail ***/
        $thumb_data = $_FILES['userfile']['tmp_name'];

        /*** get the aspect ratio (height / width) ***/
        $aspectRatio=(float)($size[0] / $size[1]);

        /*** the height of the thumbnail ***/
        $thumb_height = 100;

        /*** the thumb width is the thumb height/aspectratio ***/
        $thumb_width = $thumb_height * $aspectRatio;

        /***  get the image source ***/
        $src = ImageCreateFromjpeg($thumb_data);

        /*** create the destination image ***/
        $destImage = ImageCreateTrueColor($thumb_width, $thumb_height);

        /*** copy and resize the src image to the dest image ***/
        ImageCopyResampled($destImage, $src, 0,0,0,0, $thumb_width, $thumb_height, $size[0], $size[1]);

        /*** start output buffering ***/
        ob_start();

        /***  export the image ***/
        imageJPEG($destImage);

        /*** stick the image content in a variable ***/
        $image_thumb = ob_get_contents();

        /*** clean up a little ***/
        ob_end_clean();

        /*** connect to db ***/
        $dbh = new PDO("mysql:host=localhost;dbname=eschoppe", 'root', 'root');

        /*** set the error mode ***/
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /*** prepare the sql ***/
        $stmt = $dbh->prepare("INSERT INTO testblob (image_type ,image, image_height, image_width, image_thumb, thumb_height, thumb_width, image_ctgy, image_name)
        VALUES (? ,?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bindParam(1, $image_type);
        $stmt->bindParam(2, $imgfp, PDO::PARAM_LOB);
        $stmt->bindParam(3, $image_height, PDO::PARAM_INT);
        $stmt->bindParam(4, $image_width,  PDO::PARAM_INT);
        $stmt->bindParam(5, $image_thumb,  PDO::PARAM_LOB);
        $stmt->bindParam(6, $thumb_height, PDO::PARAM_INT);
        $stmt->bindParam(7, $thumb_width,  PDO::PARAM_INT);
        $stmt->bindParam(8, $image_ctgy);
        $stmt->bindParam(9, $image_name);

        /*** execute the query ***/
        $stmt->execute();
        }
    else
        {
    /*** throw an exception is image is not of type ***/
    throw new Exception("File Size Error");
        }
    }
else
    {
    // if the file is not less than the maximum allowed, print an error
    throw new Exception("Unsupported Image Format!");
    }
}
?>

</body>
</html>