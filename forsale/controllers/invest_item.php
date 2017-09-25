<?php
$query = $settings->selectAllInvestments();
foreach($stmt as $row)  
{
    $user_id = $row['user_id'];

    $user_value = $settings->selectUser($user_id);  

    echo ' 
        <div class="news-modal modal fade" id="news' . $row['invest_id'] .'" tabindex="-1" role="dialog" aria-hidden="true" >
            <div class="modal-dialog" >
                <div class="modal-content">
                    <div class="close-modal" data-dismiss="modal">
                        <div>
                            <div>
                                <i class="fa fa-times fa-4x"></i>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <ul class="list-inline">
                                <li><strong>Data dodania: </strong>' . $row['created_at'] . '</li>
                                <li><strong>Dodał: </strong>' . $user_value . '</li>
                            </ul>
                            <div class="col-lg-10 col-lg-offset-1 col-xs-12">
                                <div class="modal-body">
                                    <div class="col-xs-12">
                                        <h3 clas="news-title">' . $row['title'] . '</h3>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="col-sm-6 col-xs-12 text-left non_margin">
                                            <div class="col-xs-6 non_margin"><strong>Cena: </strong></div><div class="col-xs-6 non_margin text-left">' . number_format($row['price'], 2, ',', ' ') . ' zł</div>

                                            <div class="col-xs-6 non_margin"><strong>Cena za m<sup>2</sup>: </strong></div><div class="col-xs-6 non_margin text-left">' . number_format($row['price_per_meter'], 2, ',', ' ') . ' zł</div>

                                            <div class="col-xs-6 non_margin"><strong>Metraż: </strong></div><div class="col-xs-6 non_margin text-left">' . number_format($row['meterage'], 2, ',', ' ') . ' m<sup>2</sup></div>

                                            <div class="col-xs-6 non_margin"><strong>Powierzchnia działki: </strong></div><div class="col-xs-6 non_margin text-left">' . number_format($row['plot'], 0, ',', ' ') . ' m<sup>2</sup> / ' . $row['plot']/100 . ' arów</div>

                                            <div class="col-xs-6 non_margin"><strong>Liczba pokoi: </strong></div><div class="col-xs-6 non_margin text-left">' . $row['rooms'] . '</div>
                                            
                                            <div class="col-xs-6 non_margin"><strong>Liczba pomieszczeń: </strong></div><div class="col-xs-6 non_margin text-left">' . $row['all_rooms'] . '</div>

                                            <div class="col-xs-6 non_margin"><strong>Miejscowość: </strong></div><div class="col-xs-6 non_margin text-left">' . $row['city'] . '</div>

                                            <div class="col-xs-6 non_margin"><strong>Ulica: </strong></div><div class="col-xs-6 non_margin text-left">' . $row['street'] . '</div>

                                        </div>
                                        <div class="col-sm-6 col-xs-12 non_margin">';
    echo '
                                            <div class="col-sm-12 box_invest">';
                                                $images = $settings->selectImagenvestments($row['invest_id']);
                                                foreach ($images as $image) {
                                                    echo '                                                
                                                        <div  class="col-xs-4 box">
                                                            <a data-lightbox="investments' . $row['invest_id'] . '" href="' . SITE_PATH . 'app/res/images/investments/' . $image['image_name'] . '" >
                                                                <img src="' . SITE_PATH . 'app/res/images/investments/' . $image['image_name'] . '" class="image" alt="">
                                                            </a>
                                                        </div>
                                                    ';
                                                }
    echo '                                  </div>  
                                        </div>             
                                    </div>
                                    <div class="col-xs-12 offset-50">
                                        ' . $row['content'] . '
                                    </div>   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
};






