<?php require_once('../DB.php');

try {
    $statement = $conn->prepare('SELECT * FROM tbl_emballage');

$statement->execute();

$couvertList = [];

$i = 0;
while($data = $statement->fetch( PDO::FETCH_ASSOC )){ 
   $couvertList[$i]['id_emballage'] = $data['id_emballage'];
   $couvertList[$i]['type_emballage'] = $data['type_emballage'];
   $couvertList[$i]['prix_emballage'] = $data['prix_emballage'];
    $i++;
}

echo json_encode(['data'=>$couvertList]);
} catch (\Throwable $th) {
    echo "TSY MANDEHA";
}
?>