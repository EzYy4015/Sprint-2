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

// Modal Box
document.getElementById('add_btn').addEventListener('click', function(){
    document.querySelector('.bg-modal').style.display = 'flex';
  });
  
  document.querySelector('.close').addEventListener('click', function(){
    document.querySelector('.bg-modal').style.display = 'none';
  });
  
  var errorMsg = ""; //global variable
  
  // Validate Add Review Function
  function validateReview(){
    errorMsg = ""; // Reset error message
  
    var ratingOK = validateRating();
    var commentOK = validateComment();
  
    if(ratingOK && commentOK){
      return true;
    }
    else{
      alert(errorMsg);
      return false;
    }
  }
  
  function validateRating(){
    var star1 = document.getElementById("star1").checked;
    var star2 = document.getElementById("star2").checked;
    var star3 = document.getElementById("star3").checked;
    var star4 = document.getElementById("star4").checked;
    var star5 = document.getElementById("star5").checked;
  
    if(star1 || star2 || star3 || star4 || star5){
        return true;
    }
    else{
        errorMsg = errorMsg + "Please give rating.\n"
        return false;
    }   
  }
  
  function validateComment(){
    var comment = document.getElementById("comment").value;
  
    if(comment == ""){
      errorMsg = errorMsg + "Please give comment.\n"
      return false;
    }
    else{
      return true;
    }
  }