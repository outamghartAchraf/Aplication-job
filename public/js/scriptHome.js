let fixed = document.getElementById('fixed');
let menubar = document.getElementById('menubar');

menubar.addEventListener("click", function() {
    fixed.style.display = "block";
})

let closemenu = document.getElementById('closemenu');
closemenu.addEventListener("click", ()=>{
    fixed.style.display = "none" ;
})






document.addEventListener("DOMContentLoaded", function() {
    let changemode = document.getElementById('changemode');
    let mode = localStorage.getItem('mode');

    // Apply the stored mode when the page loads
    if (mode === 'darkmode') {
        document.body.classList.add('darkmode');
    }

    changemode.addEventListener("click", function(){
        // Toggle mode between 'darkmode' and 'lightmode'
        if (mode === 'darkmode') {
            mode = 'lightmode';
        } else {
            mode = 'darkmode';
        }

        localStorage.setItem('mode', mode); // Store the updated mode in localStorage

        // Toggle the CSS class of the body element based on the mode stored in localStorage
        document.body.classList.toggle('darkmode', mode === 'darkmode');
        document.body.classList.toggle('lightmode', mode === 'lightmode');
    });
});



// page load

const loader_wrapper = document.querySelector('.loader-wrapper');
window.addEventListener('load',()=>{
    loader_wrapper.style.opacity = "0";

    setTimeout(()=>{
        loader_wrapper.style.display = "none";
    },200)
})


// handele logout


 
let logout = document.getElementById('logout');
let formlogout = document.getElementById('formlogout');

logout.addEventListener("click",()=>{
    formlogout.submit();
})


 

// handelle menu profile


