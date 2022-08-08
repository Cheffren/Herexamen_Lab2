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


   /* let submitButton = document.querySelector("#submitPost");
    submitButton.addEventListener("click", function () {


        //Haal de username, tekst en afbeeldingen er van

        let text = document.querySelector("#postText").value;
        let image = document.querySelector("#postImage").value;
        let username = submitButton.dataset.username;

        let form = new FormData();
        form.append("text",text);
        form.append("image", image);
        form.append("username", username);

        fetch("ajax/savePost", {











            
        })















    })
*/
    
    