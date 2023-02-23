const header = document.querySelector('.side');
const hideBtn = document.querySelector('.hide-btn');


hideBtn.addEventListener('click',() =>{
    header.classList.toggle("active");
})

