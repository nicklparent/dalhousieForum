// JavaScript functionality for Dalhousie Forum
if (document.querySelector("#login-link") !== null){
    document.querySelector("#login-link").addEventListener("click", (event) => {
       event.preventDefault();

       const loginForm = document.querySelector("#login-container");

       if (!loginForm.classList.contains("show")){
            loginForm.classList.add("show");
            loginForm.classList.remove("hide");
       } else {
           loginForm.classList.add("hide");
           loginForm.classList.remove("show");
       }
    });
}

if (document.querySelector("#post-list") !== null){
const postList = document.querySelector("#post-list");
    fetch("api/posts.php")
        .then(res => res.json())
        .then(data => {
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

}
