function validateBooking(){
    var total_slot = document.getElementById("total_slot").value;
    if(total_slot <= 0){
        alert("Please add more than 1 total slot");
        return false;
    }
    else{
        return true;
    }    
}

function confirmDelete(){
    return confirm("Are you sure you want to delete?");    
}

function confirmUpdate(){
    return confirm("Are you sure you want to update?");    
}