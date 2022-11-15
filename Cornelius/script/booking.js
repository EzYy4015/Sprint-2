function validateBookingFilter(){
    const booking_from_date = document.getElementById('booking_from_date');
    const booking_to_date = document.getElementById('booking_to_date');

    if((!booking_from_date.value && booking_to_date.value)||(booking_from_date.value && !booking_to_date.value)) {
        alert('Please select a range of date to filter the bookings');
        return false;
    }
}

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