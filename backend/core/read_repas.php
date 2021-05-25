<?php

require_once('../DB.php');

try {
    $statement = $conn->prepare('SELECT id_repas, nom_repas, quantite_repas, 
				serviette_repas, id_emballage FROM tbl_repas');

$statement->execute();

$repasList = [];

$i = 0;
while($data = $statement->fetch( PDO::FETCH_ASSOC )){ 
   $repasList[$i]['id_repas'] = $data['id_repas'];
   $repasList[$i]['nom_repas'] = $data['nom_repas'];
   $repasList[$i]['quantite_repas'] = $data['quantite_repas'];
   $repasList[$i]['serviette_repas'] = $data['serviette_repas'];
   $repasList[$i]['id_emballage'] = $data['id_emballage'];
    $i++;
}

echo json_encode(['data'=>$repasList]);
} catch (\Throwable $th) {
    echo "TSY MANDEHA";
}

?>