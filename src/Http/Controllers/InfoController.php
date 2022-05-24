<?php 

namespace src\Http\Controllers;

use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Validation;

class InfoController{

    private $dbConection;

    public function __construct()
    {
        $this->dbConection = DatabaseController::getInstance();
    }

    public function insertInfo()
    {
        if($_SERVER['REQUEST_METHOD'] !== 'POST'){
            echo json_encode(['Error message' => 'Request type error']);
        }
        
        $validator = Validation::createValidator();
        $violations = $validator->validate(
            'email', [
                new Length(['min' => 10]),
                new NotBlank(),
            ]
        );

        if (0 !== count($violations)) {
            // there are errors, now you can show them
            foreach ($violations as $violation) {
                echo $violation->getMessage().'<br>';
            }
        } else {

            $this->dbConection->startCondition()->query('INSERT INTO info' , [
                'email'     => $_POST['email'],
                'phone'     => $_POST['phone'],
                'message'   => $_POST['message'],
            ]);

            echo json_encode(['status' => true]);
        } 
    }

}