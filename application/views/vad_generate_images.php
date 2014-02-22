<html>
 <head>
  <title>Generating Images</title>
 </head>
 <body>
 <?php
 
 // echo '<p>Hello World</p>';



//1) Specify Image URL
$targetFileIcon = "new_nidale.jpg";

//2) load the image
$im = loadImage($targetFileIcon);
//3) make it square
$square_image = make_square_from_rectangle($im);
//5) scale the square image down to 200x200
$im = scale_image_down_to_200($square_image);
imagepng($im, 'nidale_hajjar');
//6) make it round, also 100x100
$round_100_image = vad_round_image_from_rectangle($im, imagecolorat($im, 0, 0));

//7) scale down the round images to desired width and save to disc
$image_scaled_90 = save_scaled_image($round_100_image, 90);
imagepng($image_scaled_90, 'nidale_round_90.png');

$image_scaled_60 = save_scaled_image($round_100_image, 60);
imagepng($image_scaled_60, 'nidale_round_60.png');

//clean up used images
imagedestroy($im);
imagedestroy($round_100_image);
imagedestroy($image_scaled_90);
imagedestroy($image_scaled_60);
imagedestroy($square_image);







function loadImage($imagePath) {

	// echo "printed it2";
    $resource = false;
    if( strstr($imagePath, '.jpg') || strstr($imagePath, '.jpeg') )
        $resource = @imagecreatefromjpeg($imagePath);
    if( strstr($imagePath, '.png') )
        $resource = @imagecreatefrompng($imagePath);

    	// echo "printed it";

    return $resource;
}

function scale_image_down_to_200($img)
{
    $width = imagesx($img);
    $height = imagesy($img);
    $ratio = ($width/200);//
    $new_width = 200;
    $new_height = floor($height/$ratio);
    $out = ImageCreateTrueColor($new_width,$new_height);
    imagecopyresized($out, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);
    return $out;
}

function save_scaled_image($img, $new_width)
{
    $width = imagesx($img);
    $out = ImageCreateTrueColor($new_width,$new_width);
    imagesavealpha($out, true);
    imagealphablending($out, false);
    imagecolorallocatealpha($out, 255, 255, 255, 127);
    imagecopyresized($out, $img, 0, 0, 0, 0, $new_width, $new_width, $width, $width);
    return $out;
}

function make_square_from_rectangle($src_image)
{
    $width = imagesx($src_image);
    $height = imagesy($src_image);

    if ($height <= $width) $width = $height; //if image is in landscape

    //http://stackoverflow.com/questions/1855996/crop-image-in-php
    $dst_x = 0;   // X-coordinate of destination point.
    $dst_y = 0;   // Y --coordinate of destination point.
    $src_x = 0; // Crop Start X position in original image
    $src_y = 0; // Crop Srart Y position in original image
    $dst_w = $width; // Thumb width
    $dst_h = $width; // Thumb height
    $src_w = $width; // $src_x + $dst_w Crop end X position in original image
    $src_h = $width; // $src_y + $dst_h Crop end Y position in original image
    $dst_image = imagecreatetruecolor($dst_w,$dst_h);
    imagecopyresampled($dst_image, $src_image, $dst_x, $dst_y, $src_x, $src_y, $dst_w, $dst_h, $src_w, $src_h);
    return $dst_image;

}


function test_if_point_inside_circle($x, $y, $width, $height)
{
    // http://stackoverflow.com/questions/481144/equation-for-testing-if-a-point-is-inside-a-circle
	$center = floor($width/2);
	$square_dist = ($center - $x) * ($center - $x) + ($center - $y) * ($center - $y); 
	if ($square_dist <= ($center * $center)) return true;
	return false; 
}


// the function is slow because it checks every pixel
function vad_round_image_from_rectangle($img, $color) {

    $width = imagesx($img);
    $height = imagesy($img);
    $out = ImageCreateTrueColor($width,$width);
    imagesavealpha($out, true);
    imagealphablending($out, false);
    $white = imagecolorallocatealpha($out, 255, 255, 255, 127);
    imagefill($out, 0, 0, $white);
    for ($y = 0; $y < $width; $y++) {
        for ($x = 0; $x < $width; $x++) {
            $at = imagecolorat($img, $x, $y);
            if (test_if_point_inside_circle($x, $y, $width, $width))
                imagesetpixel($out, $x, $y, $at);

        }
    }
    return $out;
}







 ?> 
 </body>
</html>