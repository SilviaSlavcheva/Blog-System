<div>
    <?php if(!empty($post)) :?>
    <h3><?= $this->post[0]['title']?></h3>
    <div><?= $this->post[0]['text']?></div>
    <?php endif;?>
    <?php if(!empty($this->comments)) :?>
    <ul>
        <?php foreach ($this->comments as $comment) : ?>
        <li>
           <?= $comment['text'] ?>
        </li>
        <?php endforeach ?>
    </ul>
    <?php endif; ?>
</div>

