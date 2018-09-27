function delpost(id, title) {
    if (confirm("Are you sure you want to delete '" + title + "'")) {
        window.location.href = 'posts.php?delpost=' + id;
    }
}

function deluser(id, name) {
    if (confirm("Are you sure you want to delete '" + name + "'")) {
        //window.location.href = 'verify.php?id=' + id;
        window.location.href = 'users.php?deluser=' + id;
    }
}
