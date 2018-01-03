<?php
$videos = $settings->selectRandomVideo();
$video = mysqli_fetch_array($videos);

echo '
<div class="row label">
    <div class="label-content"><span>losowy teledysk</span></div>
</div>
<div class="row">
    <div class="embed-responsive embed-responsive-16by9 marg-top-1 random-video">
        <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/' . $video['video_link'] . '" frameborder="0" allowfullscreen></iframe> 
    </div>
    <div class="random-video-desc">' . $video['artist'] . ' - ' . $video['title'] . '</div>
</div>
';
