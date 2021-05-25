<?php 

require_once('../DB.php');

try {
    $statement = $conn->prepare('SELECT id_ingredient, nom_ingredient, quantite_ingredient, 
                                prixUnitaire_ingredient FROM tbl_ingredient');

$statement->execute();

$ingredienttList = [];

$i = 0;
while($data = $statement->fetch( PDO::FETCH_ASSOC )){ 
   $ingredienttList[$i]['id_ingredient'] = $data['id_ingredient'];
   $ingredienttList[$i]['nom_ingredient'] = $data['nom_ingredient'];
   $ingredienttList[$i]['quantite_ingredient'] = $data['quantite_ingredient'];
   $ingredienttList[$i]['prixUnitaire_ingredient'] = $data['prixUnitaire_ingredient'];
    $i++;
}

echo json_encode(['data'=>$ingredienttList]);
} catch (\Throwable $th) {
    echo "TSY MANDEHA";
}
?>