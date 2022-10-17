function AddBooking(){
    var form = document.getElementById("form");
    form.onsubmit = validateBooking;
}

function validateBooking(){
    var total_slot = document.getElementById("total_slot")
    if(total_slot < 0){
        alert("Please add more than 1 slot");
    }
}