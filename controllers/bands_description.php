<?php

if(is_numeric($_GET['name'])){
    $id = $_GET['id'];
} else {
    $id = 0;  
}

$stmt = $settings->selectOneNews($id);
$num_rows = mysqli_num_rows($stmt);
if($num_rows > 0){
    $row = mysqli_fetch_array($stmt);
    foreach($stmt as $row)  
    {
        $content = $row['content'];
        $content = str_replace("<p>","", $content);
        if (strlen($content) > 300) {
            $contentCut = substr($content, 0, 300);
            $content = substr($contentCut, 0, strrpos($contentCut, ' ')); 
        }
        echo '<meta name="Description" content="' . $content . '"/>';
    };
}
