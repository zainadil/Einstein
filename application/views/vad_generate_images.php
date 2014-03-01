<html>
 <head>
  <title>Generating Images</title>
 </head>
 <body>
 <?php
 
 // echo '<p>Hello World</p>';



//1) Specify Image URL
// $targetFileIcon = "new_nidale.jpg";
// $targetFileIcon = "../../images/unprocessed/nidale_unprocessed.jpg";
// $targetFileIcon = '../../images/nidalelarge.png';



// $url_concat_name = 'nidale';



// $url_concat_name = 'HermanSinghBadwal';
// $url_concat_name = 'KhadyLoSeck';
// $url_concat_name = 'ManjeetKaur';
// $url_concat_name = 'MdZahedHossain';
// $url_concat_name = 'MehsumMansoorNaqvi';
// $url_concat_name = 'NatalySheinin';
// $url_concat_name = 'NidaleHajjar';
// $url_concat_name = 'OmeedSafeeRad';
// $url_concat_name = 'VadimStark';
// $url_concat_name = 'WillSmith';
// $url_concat_name = 'ZainAdil';







// $url_concat_name = 'Abdullah99Bangali';
// $url_concat_name = 'Aditya99Murray';
// $url_concat_name = 'Anirudh99Agnihotri';
// $url_concat_name = 'Ashwin99Dey';
// $url_concat_name = 'Asim99Delavenne';
// $url_concat_name = 'Fahad99Siddiqui';
// $url_concat_name = 'Haroon99Awan';
// $url_concat_name = 'HermanSinghBadwal';
// $url_concat_name = 'Itzik99JKob';
// $url_concat_name = 'Jatin99Behl';
// $url_concat_name = 'Jorge99Pinilla';
// $url_concat_name = 'KhadyLoSeck';
// $url_concat_name = 'Khan99Obyoy99Azad';
// $url_concat_name = 'ManjeetKaur';
// $url_concat_name = 'Matthew99Walczyk';
// $url_concat_name = 'Maynil99Patel';
// $url_concat_name = 'MdZahedHossain';
// $url_concat_name = 'MehsumMansoorNaqvi';
// $url_concat_name = 'Milandeep99Singh99Shergill';
// $url_concat_name = 'Moustapha99Seck';
// $url_concat_name = 'NatalySheinin';
// $url_concat_name = 'NidaleHajjar';
// $url_concat_name = 'OmeedSafeeRad';
// $url_concat_name = 'Shuayb99Khan';
// $url_concat_name = 'Taha99Rizvi';
// $url_concat_name = 'VadimStark';
// $url_concat_name = 'Vivek99Chaudhari';
// $url_concat_name = 'ZainAdil';




// pic taken from
 //http://cdn.vectorstock.com/i/composite/84,35/map-marker-with-iconsset-five-vector-1328435.jpg





// $targetFileIcon = 'http://localhost/Einstien/images/unprocessed/' . $url_concat_name . '_unprocessed.jpg';
// $targetFileIcon = 'images/unprocessed/' . $url_concat_name . '_unprocessed.jpg';
$targetFileIcon = 'images/unprocessed/' . $url_concat_name . '.jpg';
$targetFileIcon2 = 'images/unprocessed/IconHolder.png';// . $url_concat_name . '.jpg';

// $destinationFile = 'http://localhost/Einstien/images/processed' . $url_concat_name . '.png';

// $targetFileIcon = "nidale.jpg";


// ../../images/unprocessed/nidale_unprocessed.jpg
// ../../images/unprocessed/nidale_200.png
// ../../images/unprocessed/nidale_circle.png




//connect to db


// $con=mysqli_connect("127.0.0.1:8888","root","","einstein_local");
// $con=mysqli_connect("127.0.0.1:8888","einstein_local","","root");


//         $my_query = "SELECT * FROM OWING";

//     echo $my_query;



// $this->db = $this->load->database();

// $this->load->database();
// $query = $this->db->query('SELECT * FROM owing');//name, title, email FROM my_table');

// foreach ($query->result() as $row)
// {
//     echo $row->title;
//     echo $row->name;
//     echo $row->email;
// }

// echo 'Total Results: ' . $query->num_rows();
// $this->db->select('names, age');
// // $query = $this->db->get_where('people', array('age' => '>' . $someAge));

// $q = $this->db->query("SELECT * FROM OWING");//SUM(value) as sum FROM Owing WHERE id_from = '" . $uid . "'");
//         if ($q->num_rows > 0) {
//             foreach ($q->result() as $row) {
//                 $data[] = $row;
//                 echo $data[0];
//             }
//         }
        // return $this->ObjectToArray($data);








//2) load the image
$im = loadImage($targetFileIcon);
//3) make it square
$square_image = make_square_from_rectangle($im);
//5) scale the square image down to 200x200
$im = scale_image_down_to_200($square_image);

// imagepng($im, '../../images/processed/nidale_200.png');
imagepng($im, 'images/processed/' . $url_concat_name . '_200.png');

//6) make it round (100x100)
$im = scale_image_down_to_100($square_image);
$round_100_image = vad_round_image_from_rectangle($im, imagecolorat($im, 0, 0));

// imagepng($im, '../../images/processed/nidale_circle.png');
// imagepng($im, 'http://localhost/Einstien/images/processed/' . $url_concat_name . '_circle.png');



// imagepng($round_100_image, 'images/processed/' . $url_concat_name . '_circle.png');
$im2 = loadImage($targetFileIcon2);
draw_alpha_image_ontop_of_another($round_100_image, $im2, -8);

// imagepng($im2, 'images/processed/' . $url_concat_name . '_circle.png');
imagepng($round_100_image, 'images/processed/' . $url_concat_name . '_circle.png');




//clean up used images
imagedestroy($im);
imagedestroy($im2);
imagedestroy($round_100_image);
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

function scale_image_down_to_100($img)
{
    $width = imagesx($img);
    $height = imagesy($img);
    $ratio = ($width/100);//
    $new_width = 100;
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


//alpha stuff
function draw_alpha_image_ontop_of_another($img_over, $img_under, $offset_of_2nd)
{
    $width = imagesx($img_under);
    $height = imagesy($img_under);
    $new_width = imagesx($img_over);
    $new_height = imagesy($img_over);//floor($height/$ratio);

    $image_1 = $img_under;
    $image_2 = $img_over;
    imagealphablending($image_1, true);
    imagesavealpha($image_1, true);
    imagealphablending($image_2, true);
    imagesavealpha($image_2, true);


    // imagecopy($image_1, $image_2, 0, 0, $offset_of_2nd, $offset_of_2nd, 100, 100);
        imagecopy($image_1, $image_2, 8, 8, 0, 0, 100, 100);
        // imagecopy($image_1, $image_2, 0, 0, 0, 0, 100, 100);
    // imagecopy($image_1, $image_2, 0, 0, 0, 0, 50, 50);
    // imagepng($image_1, 'image_3.png');
}




 ?> 
 </body>
</html>