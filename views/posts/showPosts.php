<div>
    <ul>
        <?php foreach ($this->posts as $post): ?>
        <li>
            <a href="/posts/seePost/<?=$post['id']?>" > <?= htmlspecialchars($post['title']) ?></a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
