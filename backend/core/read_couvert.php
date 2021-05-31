<?php require_once('../DB.php');

try {
    $statement = $conn->prepare('SELECT id_couvert, element_couvert ,prix_couvert FROM tbl_couvert');

$statement->execute();

$couvertList = [];

$i = 0;
while($data = $statement->fetch( PDO::FETCH_ASSOC )){ 
   $couvertList[$i]['id_couvert'] = $data['id_couvert'];
   $couvertList[$i]['element_couvert'] = $data['element_couvert'];
   $couvertList[$i]['prix_couvert'] = $data['prix_couvert'];
    $i++;
}

echo json_encode(['data'=>$couvertList]);
} catch (\Throwable $th) {
    echo "TSY MANDEHA";
}
?>