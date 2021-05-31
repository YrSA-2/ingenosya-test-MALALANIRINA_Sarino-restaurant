<?php
     
require_once('../DB.php') ;

// GET DATA FORM REQUEST
$data = json_decode(file_get_contents("php://input"));

//CREATE MESSAGE ARRAY AND SET EMPTY
$msg['message'] = '';


// CHECK IF RECEIVED DATA FROM THE REQUEST
if(isset($data->id_repas) && isset($data->id_couvert)){
    // CHECK DATA VALUE IS EMPTY OR NOT
    if(!empty($data->id_repas) && !empty($data->id_couvert)){
        
        $insert_query = "INSERT INTO tbl_repas_couvert (id_repas,id_couvert) VALUES (:id_repas,:id_couvert)";
        
        $insert_stmt = $conn->prepare($insert_query);

        // DATA BINDING
        $insert_stmt->bindValue(':id_repas', htmlspecialchars(strip_tags($data->id_repas)),PDO::PARAM_STR);
        $insert_stmt->bindValue(':id_couvert', htmlspecialchars(strip_tags($data->id_couvert)),PDO::PARAM_STR);
        
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