<?php

function validation($page, $NbPages) : bool
{
    $check = true;
    for ($i = 1; $i <= $NbPages; $i++){
        if(!preg_match("/^[^-\p{L}\p{N} #&()!*,.;'\/\\\\]+$/s",$_POST["Description"])){
            //error
            $check = false;
        }
    }
    return $check;
}
