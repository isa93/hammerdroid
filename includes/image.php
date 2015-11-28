<?php

require_once LIB_PATH . DS . "database.php";

$upload_errors = [
    UPLOAD_ERR_OK => "No errors.",
    UPLOAD_ERR_INI_SIZE => "Image is larger than upload_max_filesize.",
    UPLOAD_ERR_FORM_SIZE => "Image is larger than form MAX_FILE_SIZE.",
    UPLOAD_ERR_PARTIAL => "Partial image upload.",
    UPLOAD_ERR_NO_FILE => "No image.",
    UPLOAD_ERR_NO_TMP_DIR => "No temporary image directory.",
    UPLOAD_ERR_CANT_WRITE => "Can't write image to disk.",
    UPLOAD_ERR_EXTENSION => "Image upload stopped by extension."
];

function check_image($file)
{
    global $upload_errors;
    $errors = [];

    //error check
    if (!$file || empty($file) || !is_array($file)) {
        $errors[] = "No file was uploaded!";
        return array_shift($errors);
    } elseif ($file['error'] != 0) {
        //report what PHP says went wrong
        $errors[] = $upload_errors[$file['error']];
        return array_shift($errors);
    } else {
        return true;
    }
}

function save_image($file)
{
    $check = check_image($file);

    if ($check === true) {
        $temp_path = $file['tmp_name'];
        $filename = $file['name'];
        if (exif_imagetype($temp_path) == IMAGETYPE_JPEG || exif_imagetype($temp_path) == IMAGETYPE_PNG) {
            $extension = substr($filename, strrpos($filename, '.'), strlen($filename));
            $filename = date('Ymd-His') . $extension;
            $target_path = SITE_ROOT . DS . 'public' . DS . 'images' . DS . 'user' . DS . $filename;

            if (file_exists($target_path)) {
                return "The file {$filename} already exists!";
            }
            if (move_uploaded_file($temp_path, $target_path)) {
                return [true, $filename];
            } else {
                return "The file upload failed!";
            }
        } else return "Only JPEG or PNG file types are allowed!";
    } else return $check;
}

function delete_image($image_name)
{
    $target_path = SITE_ROOT . DS . 'public' . DS . 'images' . DS . 'user' . DS . $image_name;
    if (file_exists($target_path)) {
        return unlink($target_path) ? true : "Image remove failed!";
    } else return "The file {$image_name} doesn't exists!";
}

function update_image($old_image_name, $file)
{
    if ($file['error'] != 4) {
        $image_check = save_image($file);
        if (is_array($image_check) && array_shift($image_check) == true) {
            $delete_check = delete_image($old_image_name);
            return ($delete_check != true) ? $delete_check : [true,array_shift($image_check)];
        } else return $image_check;
    } else return [false]; // just so we can check always with array_shift
}