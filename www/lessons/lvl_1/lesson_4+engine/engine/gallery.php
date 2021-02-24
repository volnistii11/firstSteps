<?php
function getGallery() {
    $scan = scandir($_SERVER['DOCUMENT_ROOT'] . "/images/gallery_img/small");
    $gallery = array_splice($scan, 2);

    return $gallery;
}