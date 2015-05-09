<h1><?= htmlspecialchars($this->title) ?></h1>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Action</th>
    </tr>
    <?php foreach ($this->posts as $post) : ?>
        <tr>
            <td><?= $post[0] ?></td>
            <td><?= htmlspecialchars($post[1]) ?></td>
            <td><a href="/posts/delete/<?=$post[0]?> ">[Delete]</a></td>
        </tr>
    <?php endforeach ?>
</table>

<a href="/posts/create">[New]</a>
<a href="/posts/showUserPosts">My Posts</a>
<a href="/posts/index/<?= $this->page - 1?>/<?= $this->pageSize ?>">Previous</a>
<a href="/posts/index/<?= $this->page + 1?>/<?= $this->pageSize ?>">Next</a>

<?php foreach ($this->tags as $tag) : ?>
        <ul>
            <li><a href="posts/SeePostByTag/<?=$tag['id']?>"><?= $tag['name'] ?></a></li>
        </ul>
    <?php endforeach ?>