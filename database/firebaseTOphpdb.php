<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "technow";

// #1: create the conn object
$conn = new mysqli($host, $user, $pw, $db);


$file = fopen('technow-4b3ab-export.json', "r");
$string = fread($file, filesize('technow-4b3ab-export.json'));
$json = json_decode($string, true);
// foreach ($json['Products'] as $key => $value) {
//     foreach ($value as $type => $info) {
//         $sql = 'Insert into products (type,description,spec,name,price) values(?,?,?,?,?)';
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param('ssssi',$key,$info['desc'],$info['detail'],$info['name'],$info['price']);
//         $stmt->execute();
//         $row = $conn->insert_id;

//         $sql = 'Insert into productimage (productID,img1,img2,img3,img4) values(?,?,?,?,?)';
//         $stmt = $conn->prepare($sql);
//         $stmt->bind_param('issss',$row,$info["avatarURL"],$info["avatarURL1"],$info["avatarURL2"],$info["avatarURL3"]);
//         $stmt->execute();
//     }
// }

foreach ($json['Users'] as $key => $value) {
    $sql = 'Insert into users (username,password) values(?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $value["Information"]["username"], $value["Information"]["password"]);
    $stmt->execute();
    $row = $conn->insert_id;

    $sql = 'Insert into deliveryinfo (address,name,phone,userID) values(?,?,?,?)';
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('sssi', $value["Address book"]["Address - 01"]["Address"], $value["Address book"]["Address - 01"]["Name"],$value["Address book"]["Address - 01"]["Phone Number"],$row);
    $stmt->execute();
}

echo 1;
?>

<?php echo 1; ?>