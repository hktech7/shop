<?php
ob_start();
$name = $_GET['img'];
custom_image_rewrite($name) ;
function custom_image_rewrite($name) {
    $new_w = 200;
    $new_h = 200;
    $info = getimagesize($name);
    if ($info[2] == IMAGETYPE_JPEG) {
        $img = @imagecreatefromjpeg($name);
    } elseif ($info[2] == IMAGETYPE_PNG) {
        $img = @imagecreatefrompng($name);
    } elseif ($info[2] == IMAGETYPE_GIF) {
        $img = @imagecreatefromgif($name);
    }

    if (!$img)
        return false;
    $old_x = imageSX($img);
    $old_y = imageSY($img);
    if ($old_x < $new_w && $old_y < $new_h) {
        $thumb_w = $old_x;
        $thumb_h = $old_y;
    } elseif ($old_x > $old_y) {
        $thumb_w = $new_w;
        $thumb_h = floor(($old_y * ($new_w / $old_x)));
    } elseif ($old_x < $old_y) {
        $thumb_w = floor($old_x * ($new_h / $old_y));
        $thumb_h = $new_h;
    } elseif ($old_x == $old_y) {
        $thumb_w = $new_w;
        $thumb_h = $new_w; //$new_h;
    }
    $thumb_w = ($thumb_w < 1) ? 1 : $thumb_w;
    $thumb_h = ($thumb_h < 1) ? 1 : $thumb_h;
    $im = ImageCreateTrueColor($thumb_w, $thumb_h);
    
    imagecopyresampled($im, $img, 0, 0, 0, 0, $thumb_w, $thumb_h, $old_x, $old_y);
    
    $image = '';
    //$data = file_get_contents($new_img);   
    //$im = imagecreatefromstring($data);
    if ($im !== false) {
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        switch ($info[2]) {
            case IMAGETYPE_GIF:
                imagegif($im);
                break;
            case IMAGETYPE_JPEG:
                imagejpeg($im);
                break;
            case IMAGETYPE_PNG:
                imagepng($im);
                break;
            default:
                return false;
        }
        file_get_contents($im);
        imagedestroy($im);
    }

    return true;
}


?>

