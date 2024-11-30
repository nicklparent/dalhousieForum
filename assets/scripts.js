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

if (document.querySelector("#create-account-link") !== null){
    document.querySelector("#create-account-link").addEventListener("click", (event) => {
        event.preventDefault();

        const createAccountForm = document.querySelector("#create-account-container");

        if (!createAccountForm.classList.contains("show")){
            createAccountForm.classList.add("show");
            createAccountForm.classList.remove("hide");
        } else {
            createAccountForm.classList.add("hide");
            createAccountForm.classList.remove("show");
        }
    })
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
                        <p class="fw-semibold" style="text-decoration: underline; color: #b6ad9e">@${post.username}</p>
                        <p>${post.content}</p>
                    </div>
                </div>`
            })
        })
        .catch(err => console.error(err));
}

if (document.querySelector(".message-list") !== null){
    const messageList = document.querySelector("message-list");
    fetch("api/messages.php")
    .then(res => res.json())
    .then(data => {
        data.forEach(message => {
            messageList.innerHTML += `
                
            `
        })
    })
    .catch(err => console.error(err));
}

if (document.querySelector(".user-list") !== null){
    const userList = document.querySelector(".user-list");
    fetch("api/users.php")
    .then(res => res.json())
    .then(data => {
        data.forEach(user => {
            userList.innerHTML += `
                <div class="flex-1 d-flex flex-row align-items-start user" onclick="displayMessage(${user.id})">
                    <img src="assets/images/profile.png" alt="user icon" height="50" width="50" class="rounded-circle">
                    <div class="d-flex flex-column flex-1 user-body">
                        <h5 class="mb-1">${user.username}</h5>
                        <p class="mb-0">${user.content}</p>
                    </div>
                </div>
            `
        })
    })
    .catch(err => console.error(err));
}
// Asyncronus return button
if (document.querySelector("#users-return") !== null) {
    document.querySelector("#users-return").addEventListener("click", (event) => {
        event.preventDefault();
        displayMessage(null);
    });
}
function displayMessage(userId) {
    console.log(userId);

    // Check if the user list is currently showing and change accordingly
    if (document.querySelector("#user-display").classList.contains("show")) {
        // do the changing
        document.querySelector("#user-display").classList.remove("show");
        document.querySelector("#user-display").classList.add("hide");
        document.querySelector("#message-display").classList.remove("hide");
        document.querySelector("#message-display").classList.add("show");
    } else {
        document.querySelector("#user-display").classList.remove("hide");
        document.querySelector("#user-display").classList.add("show");
        document.querySelector("#message-display").classList.remove("show");
        document.querySelector("#message-display").classList.add("hide");
    }
}




















