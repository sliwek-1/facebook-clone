const form = document.querySelector('.form');
const submitBtn = document.querySelector('.submit-btn');
let info = "";

form.addEventListener('submit',(e) =>{
    e.preventDefault();
})  

submitBtn.addEventListener('click', () =>{
    let formData = new FormData(form);

    fetch('php/login.php',{
        method: 'post',
        body: formData
    }).then(response => response.text())
    .then(data => info = data);
    console.log(info);
    if(info == "success"){
        location.href = "main.php";
    }
})