<h2>Отзывы</h2>
<?=$message?><br>
<form action="/feedback/?action=<?=$action?>" method="post">
    <input hidden type="text" name="id" value="<?=$row['0']['id']?>"><br>
    <input type="text" name="name" value="<?=$row['0']['name']?>"><br>
    <input type="text" name="feedback" value="<?=$row['0']['feedback']?>"><br>
    <input type="submit" value="<?=$buttonText?>">
</form>

<?php foreach ($feedback as $item): ?>
    <p>
        <b><?=$item['name']?>:</b><?=$item['feedback']?>
        <a href="/feedback/?action=edit&id=<?=$item['id']?>">[edit]</a>
        <a href="/feedback/?action=delete&id=<?=$item['id']?>">[x]</a>
    </p>
<?php endforeach;?>