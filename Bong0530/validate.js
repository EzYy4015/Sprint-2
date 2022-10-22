function confirmDelete(){
    return confirm("Are you sure you want to delete?");    
}

function confirmUpdate(){
    return confirm("Are you sure you want to update?");    
}

function confirmBook(){
    return confirm("Are you sure you want to book?");    
}

function confirmUseIt(){
    return confirm("Are you sure you want to use this banner?");    
}

function validateFilter(){
    const from_date = document.getElementById('from_date');
    const to_date = document.getElementById('to_date');

    if((!from_date.value &&!to_date.value)||(!from_date.value)||(!to_date.value)) {
        alert('Please select a range of date to filter the booking slots');
        return false;
    } 
}