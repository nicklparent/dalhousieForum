<?php

    include_once "templates/header.php";

?>

<div class="d-flex flex-column align-items-center justify-content-center container bg-secondary" style="width: 70%" id="post-list">

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
            `<div class="forum-post d-flex flex-column mb-3 p-2" style="color: aliceblue">
                <div class="d-flex justify-content-between border-bottom post-header">
                    <p class="fw-bold">${post.title}</p>
                    <p class="fw-light">${post.created_at}</p>
                </div>
                <div class="d-flex flex-column p-3">
                    <p class="fw-semibold">@${post.username}</p>
                    <p>${post.content}</p>
                </div>
            </div>`
        })
    })
    .catch(err => console.error(err))
</script>

<?php
    require "templates/footer.php";
?>