<?php
$name_test = $name;
$name = preg_replace("/[^a-zA-Z0-9_-ąćęłńóśźżĄĆĘŁŃÓŚŹŻ \.!]/", '', $name);
if (isset($name) && $name === $name_test) {

    $stmt = $settings->selectBand($name);
    $num_rows = mysqli_num_rows($stmt);
    if ($num_rows > 0) {
        $row = mysqli_fetch_array($stmt);
        foreach ($stmt as $row) {
            $content = $row['content'];
            $content = str_replace("<p>", "", $content);
            if (strlen($content) > 250) {
                $contentCut = substr($content, 0, 250);
                $content = substr($contentCut, 0, strrpos($contentCut, ' '));
            }
            echo $content;
        };
    }
}
