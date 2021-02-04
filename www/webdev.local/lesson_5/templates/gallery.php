<h2>Галерея</h2>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?php foreach ($gallery as $item) : ?>
        <!-- class="photo" -->
            <a rel="gallery" href="/galleryOne/?id=<?=$item['id']?>"><img
                        src="<?=SMALL_IMAGES_DIR . $item['name'] ?>" width="150"
                        height="100"/></a>
        <?php endforeach; ?>
        <br><?= $message ?><br>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="myFile">
        <input type="submit" value="Отправить">
    </form>
</div>
