<h2>Галерея</h2>
<div id="main">
    <div class="post_title"><h2>Моя галерея</h2></div>
    <div class="gallery">
        <?php foreach ($gallery as $item) : ?>
            <a rel="gallery" class="photo" href="/images/gallery_img/big/<?= $item ?>"><img
                        src="/images/gallery_img/small/<?= $item ?>" width="150"
                        height="100"/></a>
        <?php endforeach; ?>
        <br><?= $message ?><br>
    </div>

    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="myFile">
        <input type="submit" value="Отправить">
    </form>
</div>
