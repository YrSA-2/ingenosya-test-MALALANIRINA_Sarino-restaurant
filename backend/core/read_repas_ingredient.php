<?php 

require_once('../DB.php');

try {
    $statement = $conn->prepare('SELECT ri.id_repas,r.quantite_repas,ig.nom_ingredient,ig.prixUnitaire_ingredient,ri.id_ingredient,ri.quantite_ingredient, 
                                ri.id_repas_ingredient FROM tbl_repas r INNER JOIN tbl_repas_ingredient ri INNER JOIN tbl_ingredient ig 
                                WHERE ri.id_ingredient = ig.id_ingredient AND ri.id_repas=r.id_repas ORDER BY ri.id_repas ASC');

$statement->execute();

$ingredientrepastList = [];

$i = 0;
while($data = $statement->fetch( PDO::FETCH_ASSOC )){ 
   $ingredientrepastList[$i]['id_repas'] = $data['id_repas'];
   $ingredientrepastList[$i]['quantite_repas'] = $data['quantite_repas'];
   $ingredientrepastList[$i]['nom_ingredient'] = $data['nom_ingredient'];
   $ingredientrepastList[$i]['prixUnitaire_ingredient'] = $data['prixUnitaire_ingredient'];
   $ingredientrepastList[$i]['id_ingredient'] = $data['id_ingredient'];
   $ingredientrepastList[$i]['quantite_ingredient'] = $data['quantite_ingredient'];
   $ingredientrepastList[$i]['id_repas_ingredient'] = $data['id_repas_ingredient'];
    $i++;
}

echo json_encode(['data'=>$ingredientrepastList]);
} catch (\Throwable $th) {
    echo "TSY MANDEHA";
}
?>