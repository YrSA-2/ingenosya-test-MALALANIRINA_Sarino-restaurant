<?php
     
require_once('../DB.php') ;

// GET DATA FORM REQUEST
$data = json_decode(file_get_contents("php://input"));

//CREATE MESSAGE ARRAY AND SET EMPTY
$msg['message'] = '';


// CHECK IF RECEIVED DATA FROM THE REQUEST
if(isset($data->element_couvert)){
    // CHECK DATA VALUE IS EMPTY OR NOT
    if(!empty($data->element_couvert)){
        
        $insert_query = "INSERT INTO tbl_couvert (element_couvert) VALUES (:element_couvert)";
        
        $insert_stmt = $conn->prepare($insert_query);

        // DATA BINDING
        $insert_stmt->bindValue(':element_couvert', htmlspecialchars(strip_tags($data->element_couvert)),PDO::PARAM_STR);
        
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