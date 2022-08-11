let likeButton = document.querySelectorAll(".like");

for (let i = 0; i < likeButton.length; i++) {
    likeButton[i].addEventListener("click", function () {

        let username = likeButton[i].dataset.username;
        let postId = likeButton[i].dataset.postid;

        console.log(postId);

        let form = new FormData();

        form.append("username", username);
        form.append("postId", postId);

        fetch("ajax/saveLikes.php", {
            method: "POST",
            body:form
        })
        .then(response => response.json())
        .then (result => {
            console.log("Like is correct");
            console.log(result);
            document.querySelectorAll(".amountOfLikes")[i].innerHTML ++;

        })
        .catch(error => {
            console.error("Error:", error);

        })  


    })






    

}

