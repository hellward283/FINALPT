// ADD COMMENT POST
function addComment(postId) {
    let comment = document.getElementById("comment-" + postId).value;

    fetch("add_comment.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "post_id=" + postId + "&comment=" + encodeURIComponent(comment)
    })
    .then(() => location.reload());
}

// EDIT COMMENT POST
function editComment(commentId) {
    let oldText = document.getElementById("comment-text-" + commentId).innerText;
    let newText = prompt("Edit your comment:", oldText);

    if (newText != null && newText !== "") {
        fetch("edit_comment.php", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: "id=" + commentId + "&comment=" + encodeURIComponent(newText)
        })
        .then(() => {
            document.getElementById("comment-text-" + commentId).innerText = newText;
        });
    }
}

// DELETE COMMENT POST
function deleteComment(commentId) {
    if (confirm("Delete this comment?")) {
        fetch("delete_comment.php", {
            method: "POST",
            headers: {"Content-Type": "application/x-www-form-urlencoded"},
            body: "id=" + commentId
        })
        .then(() => location.reload());
    }
}

// LIKE POST 
function likePost(postId) {
    fetch("like_post.php", {
        method: "POST",
        headers: {"Content-Type": "application/x-www-form-urlencoded"},
        body: "post_id=" + postId
    })
    .then(() => updateLikes(postId));
}

// UPDATE LIKE COUNT
function updateLikes(postId) {
    fetch("get_likes.php?post_id=" + postId)
    .then(res => res.text())
    .then(count => {
        document.getElementById("like-count-" + postId).innerText = count;
    });
}