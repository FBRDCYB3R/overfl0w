//NavBar
function hideIconBar() {
    var iconBar = document.getElementById("iconBar");
    var navigation = document.getElementById("navigation");
    iconBar.setAttribute("style", "display:none;");
    navigation.classList.remove("hide");
}

function showIconBar() {
    var iconBar = document.getElementById("iconBar");
    var navigation = document.getElementById("navigation");
    iconBar.setAttribute("style", "display:block;");
    navigation.classList.add("hide");
}

//Comment
function showComment() {
    var commentArea = document.getElementById("comment-area");
    commentArea.classList.remove("hide");
}

//Reply
function showReply() {
    var replyArea = document.getElementById("reply-area");
    replyArea.classList.remove("hide");
}

//Min/Max
function max() {
    document.getElementById("postmin").style.visibility = "none";
    document.getElementById("post").style.visibility = "";
}

function min() {
    document.getElementById("post").style.visibility = "none";
    document.getElementById("postmin").style.visibility = "";
}
