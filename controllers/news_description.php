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
        $content = $row['content'];
        $characters = ["<p>", "</p>", "<br />", "<span>", "</span>", "<br>"];
        foreach($characters as $char)
        {
            $content = str_replace($char,"", $content);
        }
        if (strlen($content) > 300) {
            $contentCut = substr($content, 0, 300);
            $content = substr($contentCut, 0, strrpos($contentCut, ' ')); 
        }
        echo '<meta name="Description" content="' . $content . '"/>';
    };
}
