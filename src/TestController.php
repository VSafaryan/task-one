<?php

namespace src;

class TestController{

    public function insertInfo()
    {
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            echo json_encode(['Error message' => 'Request type error']);
        }
            
                 
    }
}