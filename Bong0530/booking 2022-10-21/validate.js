function confirmDelete(){
    return confirm("Are you sure you want to delete?");    
}

function confirmUpdate(){
    return confirm("Are you sure you want to update?");    
}

function confirmBook(){
    return confirm("Are you sure you want to book?");    
}

const btn = document.getElementById('filter_button');
if(btn){
    btn.addEventListener('click', function handleClick() {
    const from_date = document.getElementById('from_date');
    const to_date = document.getElementById('to_date');

    if(!from_date.value &&!to_date.value) {
        alert('Please select a range of date to filter the booking slots');
    } 
    }
    );
};
