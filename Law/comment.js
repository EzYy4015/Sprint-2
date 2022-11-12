// function myFunction() {
//   document.getElementById("myDropdown").classList.toggle("show");
// }

// // Close the dropdown if the user clicks outside of it
// window.onclick = function(event) {
//   if (!event.target.matches('.dropbtn')) {
//     var dropdowns = document.getElementsByClassName("dropdown-content");
//     var i;
//     for (i = 0; i < dropdowns.length; i++) {
//       var openDropdown = dropdowns[i];
//       if (openDropdown.classList.contains('show')) {
//         openDropdown.classList.remove('show');
//       }
//     }
//   }
// }

// const button = document.getElementById("editsubmit");
// button.addEventListener("click", editComment);

function editComment(commentid) {
  const button = document.getElementById("editsubmit_commentid_"+commentid);
    const div = document.getElementById("commentbox_commentid_"+commentid);
    
    var buttonwo = button.textContent.trim(); // remove whitespace
    //alert(button.textContent);
    if (buttonwo === "Edit") { 
        //alert(buttonwo);
        var content = document.getElementById("commentposted_commentid_"+commentid);
        //alert(content);
        //document.getElementById("demo2").innerHTML = buttonwo;
        const input = document.createElement('input');
        input.setAttribute("id", "commentinput_commentid_"+commentid); 
        input.type = 'text';
        input.value = content.textContent;// <--cannot access textcontent of something that doesnt exist (null) how to design this input style and update the database
        input.classList.add('commentboxinput');
        // input.style.backgroundColor = "#eee";
        // input.style.width = "#eee";
        // input.style.margin = "#eee";
        // input.style.padding = "#eee";
        // input.style.resize = "#eee";
        // input.style.padding = "#eee";
        // input.style.padding = "#eee";
        // input.style.padding = "#eee";

        //input.setAttribute("rows", "3"); 
        div.insertBefore(input, content);
        div.removeChild(content);
        button.textContent = 'Send';
        //document.getElementById("demo").innerHTML = "Hello World";
    } else if (buttonwo === 'Send') {
        //alert(buttonwo);
        // const input = div.children[1];
        
        var input = document.getElementById("commentinput_commentid_"+commentid);
        const div2 = document.createElement('div');
        let inputdata = input.value;
        //alert(inputdata);
        div2.setAttribute("id", "commentposted_commentid_"+commentid); 
        div2.classList.add('commentPosted');
        div2.textContent = inputdata;
        div.insertBefore(div2, input);  // didnt put content?
        div.removeChild(input);
        button.textContent = 'Edit';

        var http = new XMLHttpRequest();
        var url = 'editComment.php';
        var params = new Object();
        params.commentid = commentid;
        params.comments = inputdata;

        // Turn the data object into an array of URL-encoded key/value pairs.
        let urlEncodedData = "", urlEncodedDataPairs = [], name;
        for( name in params ) {
        urlEncodedDataPairs.push(encodeURIComponent(name)+'='+encodeURIComponent(params[name])); 
        }
        urlEncodedData = urlEncodedDataPairs.join('&');
        http.open('POST', url, true);

        //Send the proper header information along with the request
        http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

        http.onreadystatechange = function() {//Call a function when the state changes.
            if(http.readyState == 4 && http.status == 200) {
                // alert(http.responseText);
                if (http.responseText.trim() == 'OK') { //response from server side 
                  alert('Edit successful!');
                } else {
                  alert('There was an error saving your edit. Please try again.');
                  console.error(http.responseText);
                }
            }
        }
        http.send(urlEncodedData);

    } else {}
}

// function editComment() {
//   const div = document.getElementById("commentbox");
//   if(button.textContent === 'Edit'){
//       const content = document.getElementsByClassName('commentposted');
//       const input = document.createElement('input');
//       input.type = 'text';
//       input.value = content.textContent;
    
//       div.insertBefore(input, content);
//       div.removeChild(content);
//       button.textContent = 'Send';
//     }else if(button.textContent === 'Send'){
//       const input = li.firstElementChild;
//       const div2 = document.createElement('div');
//       div2.textContent = input.value;
//       div.insertBefore(div2, input);
//       div.removeChild(input);
//       button.textContent = 'Edit';

//     }else{}
// }

// div.addEventListener('click', (event) => {
//   if(event.target.tagName === 'BUTTON'){
//     const button = event.target;
//     const p = button.parrentNode;
//     const div = p.parrentNode;
//     //const node = document.getElementById('commentbox').parrentNode.nodename;
    
//     if(button.textContent === 'Edit'){
//       //const span = li.firstElementChild;
//       const content = document.getElementById('commentPosted');
//       const input = document.createElement('input');
//       input.type = 'text';
//       input.value = content.textContent;
//       content.insertBefore(input, content);
//       content.removeChild(content);
//       button.textContent = 'Send';
//     }else if(button.textContent === 'Send'){
//       const input = li.firstElementChild;
//       const span = document.createElement('span');
//       span.textContent = input.value;
//       li.insertBefore(span, input);
//       li.removeChild(input);
//       button.textContent = 'edit';

//     }

//   }
// });
