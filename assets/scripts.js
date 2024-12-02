// JavaScript functionality for Dalhousie Forum
/*
This section covers the functionallity of the login and create account system.
It is made such that it can be done asyncronously
It first checks if the required elements are loaded then proceeds to add appropriate event listeners


 */
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


/*
Post showing
 */
if (document.querySelector("#post-list") !== null){
    refreshPosts();

    setInterval(() => refreshPosts(), 5000);
}
/*
This section loads both the users list and the

 */
if (document.querySelector(".user-list") !== null){
    const userList = document.querySelector(".user-list");
    fetch("api/users.php")
    .then(res => res.json())
    .then(data => {
        data.forEach(user => {
            let content;
            if (user.content == null){
                content = "Start the conversation!";
            } else {
                content = user.content;
            }
            userList.innerHTML += `
                <div class="flex-1 d-flex flex-row align-items-start user" onclick="displayMessage(${user.id})">
                    <img src="assets/images/profile.png" alt="user icon" height="50" width="50" class="rounded-circle">
                    <div class="d-flex flex-column flex-1 user-body">
                        <h5 class="mb-1">@${user.username}</h5>
                        <p class="mb-0">${content}</p>
                    </div>
                </div>
            `
        })
    })
    .catch(err => console.error(err));
}

function displayMessage(userId) {
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

    window.currChatId = userId;

    refreshMessages(userId);

    window.messageInterval = setInterval(() => refreshMessages(window.currChatId), 5000);
}
function refreshMessages(userId){
    fetch("api/messages.php", {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({"senderId": userId, "type": "read"})
    })
    .then(res => res.json())
    .then(data => {
        const messageList = document.querySelector(".message-list");
        messageList.innerHTML = ``;
        data.forEach(message => {
            messageList.innerHTML += `
            <div class="message">
              <p class="message-content">${message.content}</p>
              <p class="timestamp">${message.timestamp}</p>
            </div>
        `
        })
    })
    .catch(err => console.error(err))
}

if (document.querySelector("#message-submit") !== null){
    document.querySelector("#message-submit").addEventListener("click", (event) => {
        event.preventDefault();

        const message = document.querySelector("#message-in").value;
        const userId = window.currChatId;
        fetch("api/messages.php", {
            method: 'POST',
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({"type": "write", "senderId": userId, "content": message})
        })
        .then(res => res.json())
        .then(data => {
            document.querySelector("#message-in").value = "";
            refreshMessages(userId);
        })
        .catch(err => console.log(err));
    })
}

if (document.querySelector("#new-post-submit") !== null){
    document.querySelector("#new-post-submit").addEventListener("click", (event) => {
        event.preventDefault();

        const title = document.querySelector("#title-in").value;
        const content = document.querySelector("#content-in").value;

        fetch("api/posts.php", {
            method: 'POST',
            headers: {
                "Content-Type": "application/json"
            },
            body: JSON.stringify({
                "type": "write", 
                "title": title,
                "content": content
            })
        })
        .then(res => res.json())
        .then(data => {
            console.log(data);
            if (data["Error"] !== null){
                console.log("error");
                document.querySelector(".error").innerText = "Could Not Submit Post";
            } else {
                document.querySelector("#title-in").value = "";
                document.querySelector("#content-in").value = "";
                // Refresh the posts list
                refreshPosts();
            }
        })
        .catch(err => {
            console.error(err);
            document.querySelector(".error").innerText = "Error submitting post";
        });
    })
}


function refreshPosts(){
    const postList = document.querySelector("#post-list");
    fetch("api/posts.php", {
        method: 'POST',
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({"type": "read"})
    })
        .then(res => res.json())
        .then(data => {
            postList.innerHTML = '';
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













