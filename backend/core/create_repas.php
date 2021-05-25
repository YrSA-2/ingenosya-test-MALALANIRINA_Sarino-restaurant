<?php
     
require_once('../DB.php') ;

// GET DATA FORM REQUEST
$data = json_decode(file_get_contents("php://input"));

//CREATE MESSAGE ARRAY AND SET EMPTY
$msg['message'] = '';


// CHECK IF RECEIVED DATA FROM THE REQUEST
if(isset($data->nom_repas) && isset($data->quantite_repas) && isset($data->serviette_repas) && isset($data->id_emballage) ){
    // CHECK DATA VALUE IS EMPTY OR NOT
    if(!empty($data->nom_repas) && !empty($data->quantite_repas) && !empty($data->serviette_repas)  && !empty($data->id_emballage)){
        
        $insert_query = "INSERT INTO tbl_repas (nom_repas,quantite_repas,serviette_repas,
        id_emballage) VALUES (:fnom_repas,:quantite_repas,:serviette_repas,
        :id_emballage)";
        
        $insert_stmt = $conn->prepare($insert_query);

        // DATA BINDING
        $insert_stmt->bindValue(':fnom_repas', htmlspecialchars(strip_tags($data->nom_repas)),PDO::PARAM_STR);
        $insert_stmt->bindValue(':quantite_repas', htmlspecialchars(strip_tags($data->quantite_repas)),PDO::PARAM_STR);
        $insert_stmt->bindValue(':serviette_repas', htmlspecialchars(strip_tags($data->serviette_repas)),PDO::PARAM_STR);
        $insert_stmt->bindValue(':id_emballage', htmlspecialchars(strip_tags($data->id_emballage)),PDO::PARAM_STR);
        
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