function LoggedIn(){
    registeration1 = document.querySelectorAll(".removeForLoggedIn");
    registeration1.forEach((element) => {
            element.style.display="none";
        });
    registeration2 = document.querySelectorAll(".keepForLoggedIn")
    registeration2.forEach((element)=>{
        element.style.display="inline-block";
    })
        
}
function notLoggedIn(){
    registeration1 = document.querySelectorAll(".removeForLoggedIn");
    registeration1.forEach((element) => {
        element.style.display="inline-block";
    });
    registeration2 = document.querySelectorAll(".keepForLoggedIn")
    registeration2.forEach((element)=>{
        element.style.display="none";
    })
}