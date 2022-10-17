let button = document.getElementById("submitButton");
button.addEventListener('click',events=>{
    CheckPassword();
});

function CheckPassword() 
{ 
var pw = document.getElementById("password").value;

    if(pw.length < 8){
        alert('Password not strong');
    }
    else{
        alert('Nice');
    }
}