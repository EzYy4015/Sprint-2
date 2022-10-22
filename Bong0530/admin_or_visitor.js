let visibility = '';
visibility = 0;

function visibility_check(){
    if (visibility==1){
        document.getElementById("banner_form").style.display = "none";
    }
    else{
        document.getElementById('banner_form').style.visibility = 'visible';
    }
}

visibility_check()

