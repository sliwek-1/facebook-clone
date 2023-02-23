const commentBtn = document.querySelectorAll('.comment-btn');

commentBtn.forEach(btn =>{
    btn.addEventListener('click',(e) =>{

        e.preventDefault();
        let currentPost = e.target.parentElement.parentElement.parentElement;
        let commentAreas = currentPost.querySelector('.comment-area');
        let form = currentPost.querySelector('.get-comments');
        let formdata = new FormData(form);

        commentAreas.classList.toggle("active");
        setInterval(() =>{
                fetch('./php/insert-comment.php',{
                    method: 'post',
                    body: formdata
                })
                .then(response => response.text())
                .then(data => commentAreas.innerHTML = data)
                .catch(error => console.log(error))
        },100)
    })
})

