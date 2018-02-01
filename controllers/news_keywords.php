<?php

if(is_numeric($_GET['id'])){
    $id = $_GET['id'];
}
else{
    $id = 0;  
}

$stmt = $settings->selectOneNews($id);
$num_rows = mysqli_num_rows($stmt);
if($num_rows > 0){
    $row = mysqli_fetch_array($stmt);
    foreach($stmt as $row)  
    {
        $title = $row['title'];
        $titleClear = preg_replace('~[^\\pL\d]+~u', ' ', $title);
        $titlesArray = explode(" ", $titleClear);

        foreach($titlesArray as $key=>$titleValue)
        {
            if(strlen($titleValue) < 3){
            unset($titlesArray[$key]);
            }
        }

        foreach($titlesArray as $keyword){
            echo ', ' . $keyword;
        }

    };
}
