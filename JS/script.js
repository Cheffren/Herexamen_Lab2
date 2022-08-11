let chatButton = document.querySelector(".chatButton");
//let commentAmount = document.querySelector(".amountOfComments");

chatButton.addEventListener("click", function (e) {
//postId
//userName
//comment text

let text = document.querySelector(".message").value;

//Post naar database via AJAX;
let formData = new FormData();
//Vraagt specifiek element waarop geklikt werd uit de HTML
let username = chatButton.dataset.username;
console.log(username);

//console.log(postId);

formData.append("text", text);
formData.append("username", username);
fetch("ajax/saveMessage.php", {

    method: "POST",
    body: formData
})
.then(response=>response.json()

)
.then(result => {
        let newComment = document.createElement("li");
        newComment.innerHTML = result.user + " " + result.body;
        document.querySelector(".chatMessages").appendChild(newComment);
        //commentAmount.innerHTML ++ ;
        document.querySelector(".message").value = "";
        let xH = document.querySelector(".chatMessages").scrollHeight;
        document.querySelector(".chatMessages").scrollTo(0,xH);

})
.catch (error=> {

    console.error("Error:", error);
});

e.preventDefault();
})

    let xH = document.querySelector(".chatMessages").scrollHeight;
    document.querySelector(".chatMessages").scrollTo(0,xH);

    //chatMessages.scrollTo(0,1500);
   

    let chatOpen = true;
    let closeChat = document.querySelector(".chatClose");
    closeChat.addEventListener("click", function (e) {
        let chatBox = document.querySelector(".chat");

        //Als je hier op drukt wanneer de chat open is, dan sluit je de chat.
        if(chatOpen === true) {
        
        chatBox.style.display = "none";
        chatOpen = false;

        }
        else {
            chatBox.style.display = "block";
            chatOpen = true;



        }


        e.preventDefault();








    })



let submitButton = document.querySelector(".submitComment");
//let commentAmount = document.querySelector(".amountOfComments");

submitButton.addEventListener("click", function (e) {
    console.log("hoi");
//postId
//userName
//comment text

let text = document.querySelector(".commentText").value;
//Post naar database via AJAX;
let formData = new FormData();
//Vraagt specifiek element waarop geklikt werd uit de HTML
let userName = submitButton.dataset.username;
let postId = submitButton.dataset.postid;
//console.log(postId);

formData.append("text", text);
formData.append("username", userName);
formData.append("postId", postId);

fetch("ajax/saveComment.php", {

    method: "POST",
    body: formData
})
.then(response=>response.json()

)
.then(result => {
        let newComment = document.createElement("div");
        newComment.innerHTML = result.user + " " + result.body;
        document.querySelector(".comments").appendChild(newComment);
        //commentAmount.innerHTML ++ ;
        document.querySelector("#commentText").value = "";

})
.catch (error=> {

    console.error("Error:", error);
});

e.preventDefault();
});
    




let deletePost = document.querySelectorAll("#deletePost");
for (let i = 0; i < deletePost.length; i++) {


        deletePost[i].addEventListener("click", function() {
    
            let username = deletePost[i].dataset.username;
            let id = deletePost[i].dataset.id;
    
            console.log(id);
    
            let form = new FormData();
    
            form.append("username", username);
            form.append("id", id);
    
            fetch("ajax/deletePost.php", {
                method: "POST",
                body:form
            })
            .then(response => response.json())
            .then (result => {
                console.log("comment deleted");
                console.log(result);
    
    
            })
            .catch(error => {
                console.error("Error:", error);
    
            })  
    










    
    })
}
