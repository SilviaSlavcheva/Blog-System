<!DOCTYPE html>
<html>
    <head>
        <title>
            <?php if(isset($this->title)) echo htmlspecialchars ($this->title)?>
        </title>
    </head>
    <body>
        <?php if(isset($this->title)) echo htmlspecialchars ($this->title)?>
        <ul>
            <li><a href="/">Home</a></li>
            <li><a href="/posts">Posts</a></li>
            <li><a href="/comments">Comments</a></li>
            <li><a href="/tags">Tags</a></li>
            <li><a href="/users">Users</a></li>
        </ul>
        <?php if($this->isLoggedIn) :?>
        <div>
            <span>Hello, <?php echo $_SESSION['username'] ?></span>
            <form action="/account/logout"><input type="submit" value="Logout"/></form>
        </div>
        <?php endif; ?>
        <?php include('messages.php'); ?>



