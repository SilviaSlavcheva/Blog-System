<div>
    <h3><?= $this->post[0]['title']?></h3>
    <div><?= $this->post[0]['text']?></div>
    <ul>
        <?php foreach ($this->comments as $comment) : ?>
        <li>
           <?= $comment['text'] ?>
        </li>
        <?php endforeach ?>
    </ul>
</div>