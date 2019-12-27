
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


