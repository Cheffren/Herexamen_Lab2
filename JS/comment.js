




let submitComment = document.querySelectorAll(".submitComment");
for (let i = 0; i < submitComment.length; i++) {

    let showComment = document.querySelectorAll(".comment");

    showComment[i].addEventListener("click",function (){

        document.querySelectorAll(".commentForm")[i].style.display = "block";
        document.querySelectorAll(".commentButton")[i].src = "./images/chat.png";
    


    submitComment[i].addEventListener("click", function (e) {


        //Kijk of het werkt

        //comment tekst
        let text = document.querySelectorAll(".commentText");
        let textValue = text[i].value;


        let formData = new FormData();
        let username = submitComment[i].dataset.username;
        let postId = submitComment[i].dataset.postid;


        formData.append("text", textValue);
        formData.append("username", username);
        formData.append("postId", postId);


        fetch("ajax/saveComment.php", {

                method: "POST",
                body: formData

            })
            .then((response) => response.json()

            )
            .then((result) => {
                let newComment = document.createElement("div");
                newComment.innerHTML = result.user + " " + result.body;
                document.querySelectorAll(".comments")[i].appendChild(newComment);
                //commentAmount.innerHTML ++ ;
                document.querySelectorAll(".commentText")[i].value = "";
                document.querySelectorAll(".amountOfComments")[i].innerHTML ++;
                document.querySelectorAll(".deleteComment")[i].style.display = "block";




            })
            .catch((error) => {

                console.error("Error:", error);
                e.preventDefault();

            });
        e.preventDefault();


    })

})
}

let deleteButton = document.querySelectorAll(".deleteComment");
for (let i = 0; i < deleteButton.length; i++) {


    deleteButton[i].addEventListener("click", function(e) {

        let username = deleteButton[i].dataset.username;
        let commentId = deleteButton[i].dataset.commentid;

        console.log(commentId);

        let form = new FormData();

        form.append("username", username);
        form.append("id", commentId);

        fetch("ajax/deleteComment.php", {
            method: "POST",
            body:form
        })
        .then(response => response.json())
        .then (result => {
            console.log("comment deleted");
            console.log(result);
            document.querySelectorAll(".amountOfComments")[i].innerHTML --;




        })
        .catch(error => {
            console.error("Error:", error);

        })  


        e.preventDefault();














    })
    


















}
let deletePost = document.querySelectorAll(".deletePost");
for (let i = 0; i < deletePost.length; i++) {
    
        deletePost[i].addEventListener("click", function() {

            //console.log("hi");
            let username = deletePost[i].dataset.username;
            let id = deletePost[i].dataset.id;
    
            console.log(username);
    
            let form = new FormData();
    
            form.append("username", username);
            form.append("id", id);
    
            fetch("ajax/deletePost.php", {
                method: "POST",
                body:form
            })
            .then(response => response.json())
            .then (result => {
                console.log("Post deleted");
                console.log(result);
    
    
            })
            .catch(error => {
                console.error("Error:", error);
    
            })  
    
    })
}


let buttonCount = 0;
let likeButton = document.querySelectorAll(".like");
for (let i = 0; i < likeButton.length; i++) {
    likeButton[i].addEventListener("click", function (e) {


        let username = likeButton[i].dataset.username;
        let postId = likeButton[i].dataset.postid;

        //console.log(username);

        let form = new FormData();

        form.append("username", username);
        form.append("postId", postId);

        if (buttonCount == 0) {

        fetch("ajax/saveLikes.php", {
            method: "POST",
            body:form
        })
        .then(response => response.json())
        .then (result => {
            console.log("Like is correct");
            console.log(result);

             document.querySelectorAll(".amountOfLikes")[i].innerHTML ++ ;
             document.querySelectorAll(".likeButton")[i].src = "./images/like.png";
             buttonCount = 1;
            

        })
        .catch(error => {
            console.error("Error:", error);

        })  
        e.preventDefault();
    }


    if (buttonCount == 1) {




        fetch("ajax/deleteLike.php", {
            method: "POST",
            body:form
        })
        .then(response => response.json())
        .then (result => {
            console.log("Like is verwijderd");
            console.log(result);

             document.querySelectorAll(".amountOfLikes")[i].innerHTML --;
             document.querySelectorAll(".likeButton")[i].src = "./images/thumbs-up.png";

            
            buttonCount = 0;
        })
        .catch(error => {
            console.error("Error:", error);

        })  
        e.preventDefault();









        
    }
        
    })

       




}
    

