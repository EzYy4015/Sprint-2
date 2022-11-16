function confirmDelete(){
    return confirm("Are you sure you want to delete?");    
}

function confirmUpdate(){
    return confirm("Are you sure you want to update?");    
}

function confirmBook(){
    return confirm("Are you sure you want to book?");    
}

function validateFilter(){
    const from_date = document.getElementById('from_date');
    const to_date = document.getElementById('to_date');

    if((!from_date.value &&!to_date.value)||(!from_date.value)||(!to_date.value)) {
        alert('Please select a range of date to filter the booking slots');
        return false;
    } 
}

function validateSearchReview(){
    const search_guide = document.getElementById('search_guide');
    if(!search_guide.value) {
        alert("Please enter something to search");
        return false;
    }
    else if(search_guide.value.trim()==''){
        alert("Please enter something instead of spacing");
        return false;
    }
}
