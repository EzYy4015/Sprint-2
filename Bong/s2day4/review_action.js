function validateReviewFilter(){
    const review_from_date = document.getElementById('review_from_date');
    const review_to_date = document.getElementById('review_to_date');

    if((!review_from_date.value && review_to_date.value)||(review_from_date.value && !review_to_date.value)) {
        alert('Please select a range of date to filter the reviews');
        location.reload();
        return false;
    }
    
}

function confirmHideReview(){
    return confirm("Are you sure you want to hide this review?");    
}

function confirmShowReview(){
    return confirm("Are you sure you want to show this review?");    
}

function confirmDeleteReview(){
    return confirm("Are you sure you want to delete this review?");    
}