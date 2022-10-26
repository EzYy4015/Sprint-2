function loadNotifContent() {
		
    setInterval(
        function(){
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                document.getElementById("notif-individual").innerHTML = this.responseText;
                
            }
            xhttp.open("GET", "include/notificationContentWebpage.php", true);
            xhttp.send();
    },1000);
  
}


loadNotifContent();