<?php

    include_once "templates/header.php";

?>

<div class="d-flex flex-column align-items-center justify-content-center border container" style="width: 70%" id="post-list">

</div>
<script>
    const postList = document.querySelector("#post-list");
    fetch("api/posts.php")
    .then(res => res.json())
    .then(data => {
        console.log(data);
        data.forEach(post => {
        //     add each post element
            postList.innerHTML +=
            `<div class="forum-post d-flex mb-2">
                <div class="d-flex justify-content-between border-bottom post-header">
                    <p>${post[2]}</p>
                    <p>${post[4]}</p>
                </div>
            </div>`
        })
    })
    .catch(err => console.error(err))
    function makePost(title, content, created){

    }
</script>

