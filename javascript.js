
//HIDE SHOW COMMENTS ON SINGLE-POST SIDE
var hideDiv = document.getElementById("div-hide");
var hideCommentsButton = document.getElementById("hide-button");
hideCommentsButton.addEventListener("click", function(){
  hideDiv.classList.toggle("div-hide");
  if (hideCommentsButton.innerHTML == "Hide comments") {
    hideCommentsButton.innerHTML = "Show comments";
  } else {
    hideCommentsButton.innerHTML = "Hide comments";
  }
})





//DELETE POST  ON SINGLE-POST SIDE
var deleteButton = document.getElementById("delete-post");
deleteButton.addEventListener("click", function(){
  alert("Button clicked");
  var question = prompt("Do you really want to delete this post? Answer with yes/no please.");
  if (question =="yes") {
    alert('Post deleted.');
  }
  
});
