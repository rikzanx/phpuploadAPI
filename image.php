<?php
header('Content-type: application/json');

$uploaddir = 'upload/'; //physical address of uploads directory
$nameproduct = $_POST['name'];
$name = 'aslinbeauty-'.$nameproduct.'-'.date("Y-m-d-h-i-s").'.png';
$uploadfile = $uploaddir . basename($name);
// print_r(basename($_FILES['myFile']['name']));

    if(move_uploaded_file($_FILES['myFile']['tmp_name'], $uploadfile)){
        $array=array(
            'code' => 200,
            'message' => 'Success upload',
            'link' => 'http://rikzanx.online/'.$uploadfile,
            'data' => $_POST
        );
    // echo "File was successfully uploaded.\n";
    /* Your file is uploaded into your server and you can do what ever you want with */
    }else{
        $array=array(
            'code' => 400,
            'message' => 'Eror'
        );
    // echo "Possible file upload attack!\n";
    }
    echo json_encode($array,JSON_PRETTY_PRINT);
?>