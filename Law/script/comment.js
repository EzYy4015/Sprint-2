
// Law Yuk Fung
// Laet edit: 12/11/2022 7:12 pm
function showAlert() {
  var myText = "Please login";
  alert (myText);
}

function buttoncolour(id) {
 //location.href = 'http://localhost/GotYukFung/productAndDiscussion.php?page=' + id;
 
  const btn = document.getElementById('page' + id);
  btn.style.backgroundColor = 'lightgrey';
  //btn.style.color = 'white';
  btn.style.fontWeight = 'bold';
 
}


function editComment(commentid) {
  const button = document.getElementById("editsubmit_commentid_"+commentid);
    const div = document.getElementById("commentbox_commentid_"+commentid);
    
    var buttonwo = button.textContent.trim(); // remove whitespace
    //alert(button.textContent);
    if (buttonwo === "Edit") { 
        //alert(buttonwo);
        var content = document.getElementById("commentposted_commentid_"+commentid);
        //alert(content);
        
        //create a comment box
        const input = document.createElement('input');
        input.setAttribute("id", "commentinput_commentid_"+commentid); 
        input.type = 'text';
        input.value = content.textContent;
        input.classList.add('commentboxinput');

        div.insertBefore(input, content);
        div.removeChild(content);
        button.textContent = 'Send'; //change the button content from "Edit" to "Send"
        
    } else if (buttonwo === 'Send') {
        //alert(buttonwo);
        //get the new comment
        var input = document.getElementById("commentinput_commentid_"+commentid);
        const div2 = document.createElement('div');
        let inputdata = input.value;
        //alert(inputdata);
        div2.setAttribute("id", "commentposted_commentid_"+commentid); 
        div2.classList.add('commentPosted');
        div2.textContent = inputdata;
        div.insertBefore(div2, input);  
        div.removeChild(input);
        button.textContent = 'Edit'; //change the button content back to "Edit"

        //send data to php file and save into database
        //refer from https://www.w3schools.com/xml/ajax_php.asp 
        // using POST method refer from https://stackoverflow.com/questions/9713058/send-post-data-using-xmlhttprequest
        var http = new XMLHttpRequest();
        var url = 'editComment.php'; //send to this php file
        var params = new Object();
        params.commentid = commentid;
        params.comments = inputdata;

        // Turn the data object into an array of URL-encoded key/value pairs.
        let urlEncodedData = "", urlEncodedDataPairs = [], name;
        for( name in params ) {
        urlEncodedDataPairs.push(encodeURIComponent(name)+'='+encodeURIComponent(params[name]));  //combine data with "="
        }
        urlEncodedData = urlEncodedDataPairs.join('&');
        http.open('POST', url, true); //send data to php file 

        //Send the proper header information along with the request
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
                // alert(http.responseText);
                if (http.responseText.trim() == 'OK') { //response from server side to client side
                  alert('Edit successful!');
                } else {
                  alert('There was an error saving your edit. Please try again.');
                  console.error(http.responseText);
                }
            }
        }
        http.send(urlEncodedData); 

    } else {
        alert("");
    }
}

