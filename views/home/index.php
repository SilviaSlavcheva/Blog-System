<h1>HOME INDEX</h1>
<a href="/account/login">Login</a>
<a href="/account/register">register</a>
<button id="show-posts">Show Posts</button>

<div id="posts"></div>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    $('#show-posts').on('click', function(ev) {
        $.ajax({
            url:'/posts/showPosts',
            method: 'GET'
        }).success(function(data) {
            $('#posts').html(data);
        })
    })
</script>