let intro = document.querySelector('.welcome-msg');

window.addEventListener('DOMContentLoaded', ()=>{
    setTimeout(()=>{
        setTimeout(()=>{
            intro.style.opacity = 0;
        }, 2100);

        setTimeout(()=>{
            intro.style.visibility = 'hidden';
        }, 1500);
    })
})

//Review Tooltip
$(document).ready(function(){
    $('[data-bs-toggle="tooltip"]').tooltip(); 
  });