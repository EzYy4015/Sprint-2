function CheckPassword(inputtxt) 
{ 
var pattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;
    if(inputtxt.value.match(pattern)) 
    { 
    alert('Correct, try another...')
    return true;
    }
    else
    { 
    alert('Wrong...!')
    return false;
    }
}