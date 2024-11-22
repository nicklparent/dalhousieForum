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
            const entry = document.createElement("")
        })
    })
    .catch(err => console.error(err))
    function makePost(title, content, created){

    }
</script>

<div class="d-flex flex-column px-3">
    <div class="d-flex align-item-center justify-content-between">
        <p>${title}</p>
        <p>${created}</p>
    </div>
    <div class="p-2">

    </div>
</div>