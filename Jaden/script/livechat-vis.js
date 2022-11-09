function openChat() {
    document.getElementById("chat-box").style.display = "block";
    document.getElementById("chat-box-minimized").style.display = "none";
    document.getElementById("chat-callout").style.display = "none";
  }
  
  function closeChat() {
    document.getElementById("chat-box").style.display = "none";
    document.getElementById("chat-box-minimized").style.display = "block";
    document.getElementById("chat-callout").style.display = "block";
  }