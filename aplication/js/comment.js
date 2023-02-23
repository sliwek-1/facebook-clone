const commentSubmitBtns = document.querySelectorAll('.submit-comment');

commentSubmitBtns.forEach(btn =>{
    btn.addEventListener('click',(e) =>{
        e.preventDefault();
        let currentComment = e.target.parentElement.parentElement;
        let commentText = currentComment.querySelector('.comment-text').value;
        let currentComentArea = currentComment.querySelector('.comment-area');
        let form = currentComment.querySelector('.comment');

        let formdata = new FormData(form);

        fetch('./php/send-comment.php',{
            method: 'post',
            body: formdata,
        })
        .then(response => response.text())
        .then(data => currentComentArea.innerHTML = data)
        .catch(error => console.log(error))
        commentText = "";
    })

})

