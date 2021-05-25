<?php
     
require_once('../DB.php') ;

// GET DATA FORM REQUEST
$data = json_decode(file_get_contents("php://input"));

//CREATE MESSAGE ARRAY AND SET EMPTY
$msg['message'] = '';

// CHECK IF RECEIVED DATA FROM THE REQUEST
if(isset($data->nom_ingredient) && isset($data->quantite_ingredient) && isset($data->prixUnitaire_ingredient)){
    // CHECK DATA VALUE IS EMPTY OR NOT
    if(!empty($data->nom_ingredient) && !empty($data->quantite_ingredient) &&!empty($data->prixUnitaire_ingredient)){
        
        $insert_query = "INSERT INTO tbl_ingredient (nom_ingredient, quantite_ingredient,prixUnitaire_ingredient) VALUES 
                    (:nom_ingredient,:quantite_ingredient,:prixUnitaire_ingredient)";
        
        $insert_stmt = $conn->prepare($insert_query);

        // DATA BINDING
        $insert_stmt->bindValue(':nom_ingredient', htmlspecialchars(strip_tags($data->nom_ingredient)),PDO::PARAM_STR);
        $insert_stmt->bindValue(':quantite_ingredient', htmlspecialchars(strip_tags($data->quantite_ingredient)),PDO::PARAM_STR);
        $insert_stmt->bindValue(':prixUnitaire_ingredient', htmlspecialchars(strip_tags($data->prixUnitaire_ingredient)),PDO::PARAM_STR);

        if($insert_stmt->execute()){
            $msg['message'] = 'Data Inserted Successfully';
        }else{
            $msg['message'] = 'Data not Inserted';
        } 
        
    }else{
        $msg['message'] = 'Oops! empty field detected. Please fill all the fields';
    }
}
else{
    $msg['message'] = 'Please fill all the fields ';
}
//ECHO DATA IN JSON FORMAT
echo  json_encode($msg);

?>