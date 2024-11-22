// JavaScript functionality for Dalhousie Forum
console.log("hello")
if (document.querySelector("#login-link") !== null){
    console.log("link found")
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

