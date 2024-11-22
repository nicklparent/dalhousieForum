<?php

    include_once "templates/header.php";

?>

<div class="container d-flex flex-row">
    <div class="post-list" id="post-list">

    </div>
</div>
<script>
    const postList = document.querySelector("#post-list");
    fetch("api/posts.php")
    .then(res => res.json())
    .then(data => {
        console.log(data);
        data.forEach(post => {
        //     add each post element
        })
    })
    .catch(err => console.error(err))
    function makePost(title, content, created){

    }
</script>

<div class="forum-post">

</div>