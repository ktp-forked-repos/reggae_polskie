<?php

echo '<ul class="nav nav-tabs">';

$char = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
$result = count($char);

for ($i = 0; $i < $result; $i++) {
    if ($i == 0) {
        echo '<li class="active"><a data-toggle="tab" href="#' . $char[$i] . '">' . strtoupper($char[$i]) . '</a></li>';
    } else {
        echo '<li><a data-toggle="tab" href="#' . $char[$i] . '">' . strtoupper($char[$i]) . '</a></li>';
    }
}
echo '</ul>';
echo '<div class="tab-content container">';
for ($i = 0; $i < $result; $i++) {
    $stmt = $settings->selectEntry($char[$i]);
    $row = mysqli_fetch_array($stmt);

    if ($i == 0 || $char[$i] == 'a') {
        echo '<div id="' . $char[$i] . '" class="tab-pane fade in active">';
        if (mysqli_num_rows($stmt) == 0) {
            echo '<h4 class="row entry-empty col-xs-12">brak wyników</h4>';
        };
        foreach ($stmt as $row) {
            echo '<h4 class="row entry-title col-xs-12">' . $row['title'] . ' </h4>
            <h3 class="row entry-content col-xs-12 col-sm-11 col-sm-offset-1">' . $row['content'] . ' </h3>';
            if (isset($_SESSION['loggedin'])) {
                include("views/vocabulary_update_form.php");
            };
            echo '<hr class="row col-xs-12"/>';
        };
        echo '</div>';
    } else {
        echo '<div id="' . $char[$i] . '" class="tab-pane fade">';
        if (mysqli_num_rows($stmt) == 0) {
            echo '<div class="row text-center entry-empty col-xs-12"><i class="fa fa-meh-o" aria-hidden="true"></i> brak haseł</div>';
        };
        foreach ($stmt as $row) {
            echo '<h4 class="row entry-title col-xs-12">' . $row['title'] . ' </h4>
            <h3 class="row entry-content col-xs-12 col-sm-11 col-sm-offset-1">' . $row['content'] . ' </h3>';
            if (isset($_SESSION['loggedin'])) {
                include("views/vocabulary_update_form.php");
            };
            echo '<hr class="row col-xs-12"/>';
        };
        echo '</div>';
    }
}
echo '</div>';
