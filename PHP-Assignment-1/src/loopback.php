<?php
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $method = "Post";
    }
    elseif($_SERVER["REQUEST_METHOD"] == "GET"){
        $method = "Get";
    }
    
    if($method == "Post"){
        if(count($_POST) == 0){
            echo "Type: POST, Parameters: null";
        }
        else{
            echo "Type: POST, Parameters: ", json_encode($_POST);
        }
    }
    
    if($method == "Get"){
        if(count($_GET) == 0){
            echo "Type: GET, Parameters: null";
        }
        else{
            echo "Type: GET, Parameters: ", json_encode($_GET);
        }
    }
    
?>