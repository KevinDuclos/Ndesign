<?php

function showJson($data)
{
    header('Content-type: application/json');
    $json = json_encode($data, JSON_PRETTY_PRINT);
    if($json){
        die($json);
    } else {
        die('error in json encoding');
    }
}



function controlSubject($error, $value, $key,$max, $min){

    if(!empty($value)){

        if(strlen($value) <= $min){
            $error[$key] = 'Veuillez renseigner au moins'.$min.' caractères pour ce champs';
        }elseif (strlen($value) >= $max){
            $error[$key] = 'Veuillez renseigner au maximum'.$max.'caractères pour ce champs';
        }else{

        }
    }else{
        $error[$key] ='Veuillez renseigner ce champs';
    }
return $error;
}

function controlMessage($error, $value, $key,$max, $min){

    if(!empty($value)){

        if(strlen($value) <= $min){
            $error[$key] = 'Veuillez renseigner au moins'.$min.' caractères pour ce champs';
        }elseif (strlen($value) >= $max){
            $error[$key] = 'Veuillez renseigner au maximum'.$max.'caractères pour ce champs';
        }else{

        }
    }else{
        $error[$key] ='Veuillez renseigner ce champs';
    }
return $error;
}

function controlEmail($email, $error, $key){
    if(!empty($email)){
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $searchmail = selectemail('users', $email);

            if(!empty($searchmail)){
                $error[$key] = 'Cet email est déjà utilisé';
            }
        } else {
            $error[$key] = "Email non valide";
        }
    }else{
        $error[$key] ='Veuillez renseigner le champs email';
    }
    return $error;
}

