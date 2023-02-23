const formPost = document.querySelector('.add-post');
const submitBtn = document.querySelector('.submit-post');
let title = document.querySelector('.title');


submitBtn.addEventListener('click', (e) =>{
    e.preventDefault()
    let formData = new FormData(formPost);

    fetch('./php/post.php',{
        method: 'post',
        body: formData
    })
    .then(response => response.text())
    .then(data => console.log(data));
    title.value = "";
})