<h1>Create New Post</h1>

<form method="post" action="/posts/create">
    Name: <input type="text" name="title" value="<?php echo $this->getFieldValue('title')?>">
    <?php echo $this->getValidationerror('title')?>
    <br/>
    <input type="submit" value="Create">
</form>
