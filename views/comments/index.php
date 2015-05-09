
<h1>comments controller INDEX</h1>
<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($this->comments as $comment) : ?>
        <tr>
            <td><?= $comment['id'] ?></td>
            <td><?= htmlspecialchars($comment['text']) ?></td>
            <td><a href="/comments/delete/<?=$comment['id']?> ">[Delete]</a></td>
        </tr>
    <?php endforeach ?>
</table>

<a href="/comments/create">[New]</a>