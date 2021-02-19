<h2><?=$catalogOne['name']?></h2>
<p><?=$catalogOne['description']?></p>

<h2>Отзывы</h2>
<?=$message?><br>
<form action="/catalogOne/?action=<?=$action?>" method="post">
    <input hidden type="text" name="feedback_id" value="<?=$row['id']?>">
    <input hidden type="text" name="catalog_id" value="<?=$catalog_id?>">
    <input type="text" name="author" value="<?=$row['author']?>"><br>
    <input type="text" name="feedback" value="<?=$row['feedback']?>"><br>
    <input type="submit" value="<?=$buttonText?>">
</form>

<?php foreach ($feedback as $feedback): ?>
    <p>
        <b><?=$feedback['author']?>:</b><?=$feedback['feedback']?>
        <a href="/catalogOne/?action=edit&catalog_id=<?=$catalog_id?>&feedback_id=<?=$feedback['id']?>">[edit]</a>
        <a href="/catalogOne/?action=delete&catalog_id=<?=$catalog_id?>&feedback_id=<?=$feedback['id']?>">[x]</a>
    </p>
<?php endforeach;?>
