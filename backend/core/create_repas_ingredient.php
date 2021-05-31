<?php
     
require_once('../DB.php') ;

// GET DATA FORM REQUEST
$data = json_decode(file_get_contents("php://input"));

//CREATE MESSAGE ARRAY AND SET EMPTY
$msg['message'] = '';


// CHECK IF RECEIVED DATA FROM THE REQUEST
if(isset($data->id_repas) && isset($data->id_ingredient) && isset($data->quantite_ingredient)){
    // CHECK DATA VALUE IS EMPTY OR NOT
    if(!empty($data->id_repas) && !empty($data->id_ingredient) && !empty($data->quantite_ingredient)){
        
        $insert_query = "INSERT INTO tbl_repas_ingredient (id_repas,id_ingredient,quantite_ingredient) VALUES (:id_repas,:id_ingredient,:quantite_ingredient)";
        
        $insert_stmt = $conn->prepare($insert_query);

        // DATA BINDING
        $insert_stmt->bindValue(':id_repas', htmlspecialchars(strip_tags($data->id_repas)),PDO::PARAM_STR);
        $insert_stmt->bindValue(':id_ingredient', htmlspecialchars(strip_tags($data->id_ingredient)),PDO::PARAM_STR);
        $insert_stmt->bindValue(':quantite_ingredient', htmlspecialchars(strip_tags($data->quantite_ingredient)),PDO::PARAM_STR);
        
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