console.log('Iam working'); 
$(document).ready(function(){
    $(window).scroll(function(){
        if(this.scrollY > 20){
            $('.navbar').addClass("sticky");
        }else{
            $('.navbar').removeClass("sticky");
        }
        if(this.scrollY > 500){
            $('.scroll-up-btn').addClass("show");
        }
        else{
            $('.scroll-up-btn').removeClass("show");
        }
    });

    // slide-up script 
    $('.scroll-up-btn').click(function(){
        $('html').animate({scrollTop: 0});
    });

    //toggle menu/navbar script
     $('.menu-btn').click(function(){
        $('.navbar .menu').toggleClass("active"); 
        $('.menu-btn i').toggleClass("active"); 

     }); 
})

//typing animation script 
var typed = new Typed(".typing", {
    strings : ["Youtuber", 'Software engineer', 'Photografer'],
    typeSpeed: 100, 
    backspeed: 60, 
    loop: true
})
var typed = new Typed(".typing-2", {
    strings : ["Youtuber", 'Software engineer', 'Photografer'],
    typeSpeed: 100, 
    backspeed: 60, 
    loop: true
})

// functional contact form 

const form = document.querySelector("form"),
statusTxt = form.querySelector(".button-area span"); 
form.onsubmit = (e)=>{
    e.preventDefault(); // preventing form from submit
    statusTxt.style.color = blue; 
    statusTxt.style.display= "block"; 

    let xhr = new XMLHttpRequest(); // creating new xml object 
    xhr.open("OST", "message.php", true); //sending post request to message.php file 
    xhr.onload = ()=>{ //once ajax loaded 
        if(xhr.readyState == 4 && xhr.status == 200){ // if ajax response status is 200 & ready status is 4 means there is no error 
            let response = xhr.response; // storing ajax response in a response variable 
            //if response is an error like enter email adress then we'll change status color to red else reset the form
            if(response.indexOf("Email and message field is required!") != -1 || response.indexOf("Enter a valid email address!")|| response.indexOf("Sorry, failed to send your message!")) {
                statusTxt.style.color = "red"; 
            }
            else {
                form.reset(); 
                setTimeout(() =>{
                    statusTxt.style.display="none";
                }, 3000); // hide the statustxt after 3 seconds if the msg is sent. 
            }
            console.log(response); 
        }
    }
    let formData = new FormData(); //creating new FormData obj. This obj is used to send form data 
    xhr.send(formData); // sending form data
}