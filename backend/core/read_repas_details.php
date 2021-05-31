<?php

require_once('../DB.php');

try {
    $statement = $conn->prepare('SELECT r.id_repas,r.nom_repas, r.quantite_repas, i.nom_ingredient, 
    ri.quantite_ingredient FROM tbl_repas r 
    INNER JOIN tbl_repas_ingredient ri 
    INNER JOIN tbl_ingredient i 
    WHERE r.id_repas= ri.id_repas AND 
    i.id_ingredient = ri.id_ingredient ORDER BY ri.id_repas ASC');

$statement->execute();

$repasDetails = [];

$i = 0;
while($data = $statement->fetch( PDO::FETCH_ASSOC )){ 
   $repasList[$i]['id_repas'] = $data['id_repas'];
   $repasList[$i]['nom_repas'] = $data['nom_repas'];
   $repasList[$i]['quantite_repas'] = $data['quantite_repas'];
   $repasList[$i]['nom_ingredient'] = $data['nom_ingredient'];
   $repasList[$i]['quantite_ingredient'] = $data['quantite_ingredient'];
    $i++;
}

echo json_encode(['data'=>$repasList]);
} catch (\Throwable $th) {
    echo "TSY MANDEHA";
}

?>