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

  function openFAQ1(){
    document.getElementById("faq-intro").style.display = "none";
    document.getElementById("faq-faq1").style.display = "block";
  }
  
  function openFAQ2(){
    document.getElementById("faq-intro").style.display = "none";
    document.getElementById("faq-faq2").style.display = "block";
  }

  function mainFAQ(){
    document.getElementById("faq-intro").style.display = "block";
    document.getElementById("faq-faq1").style.display = "none";
    document.getElementById("faq-faq2").style.display = "none";
  }

  function connectAgent(loggedin){
    document.getElementById("faq-intro").style.display = "none";
    document.getElementById("faq-faq1").style.display = "none";
    document.getElementById("faq-faq2").style.display = "none";

    document.getElementById("connect-chat").style.display = "block";

    const date = new Date();

    if(loggedin == 0 && (date.getHours() >= 9 && date.getHours() <= 14)){
      setTimeout(showForm, 5000);
    } else if (loggedin == 1 && (date.getHours() >= 9 && date.getHours() <= 14)){
      setTimeout(connectChatSuccessful, 5000);
    } else {
      setTimeout(outsideWorkingHours, 5000);
    }
  }

  function showForm(){
    document.getElementById("admin-icon").style.display = "none";
    document.getElementById("faq-intro").style.display = "none";
    document.getElementById("faq-faq1").style.display = "none";
    document.getElementById("faq-faq2").style.display = "none";
    document.getElementById("connect-chat").style.display = "none";

    document.getElementById("form-fill-text").style.display = "block";
    document.getElementById("show-form").style.display = "block";

  }

  function connectChatSuccessful(){
    document.getElementById("connect-chat").style.display = "none";
    document.getElementById("admin-icon").style.display = "none";

    document.getElementById("success-text").style.display = "block";
    document.getElementById("send-message-box").style.display = "block";
  }

  function outsideWorkingHours(){
    document.getElementById("connect-chat").style.display = "none";
    document.getElementById("admin-icon").style.display = "none";

    document.getElementById("outside-working-hours").style.display = "block";
    document.getElementById("show-form").style.display = "block";
  }

  function checkingForm(loggedin){
    $(document).ready(function() {
      $("#submit-inquiry").submit(function(event){
        event.preventDefault();

        var name = document.getElementById("name").value
        var email = document.getElementById("email").value
        var phoneno = document.getElementById("phoneno").value
        var inquiry = document.getElementById("inquiry").value
        var userid = document.getElementById("userid").value

        $.post("include/submit-form.php", {name: name, email: email, phoneno: phoneno, inquiry: inquiry, userid: userid, function(data){
          const date = new Date();

          if (date.getHours() >= 9 && date.getHours() <= 14){
            connectChatAfterForm();
            location.reload();
          } else{
            successForm();
          }
        }})
      })
    })
  }

  function createRegisteredForm(){
    const date = new Date();
    if(date.getHours() >= 9 && date.getHours() <= 14){
      $(document).ready(function(){
        $("#startchat").click(function(event){
          event.preventDefault();

          var accid = document.getElementById("accid").value

          $.post("include/create-registered-chats.php", {accid: accid, function(){
            location.reload();
          }})
        })
      })
    } else{
      outsideWorkingHours();
    }
  }

  function sendingChatMessages(){
    $(document).ready(function(){
      $("#send-message-chat").submit(function(e){
        e.preventDefault();

        var message = document.getElementById("message").value
        var chatid = document.getElementById("chatid").value
        var userid = document.getElementById("userid").value

        $.post("include/live-chat-messages.php", {message: message, chatid: chatid, userid: userid, function(){
          
        }})
        document.getElementById("message").reset();
      })
    })
  }

  function refreshPage(){
    setInterval(function(){
      $("#main-chat-body").load("include/chat-loader.php");
    }, 100)
  }

  function successForm(){
    document.getElementById("show-form").style.display = "none";
    document.getElementById("outside-working-hours").style.display = "none";
    document.getElementById("form-submit-success").style.display = "block";
  }

  function connectChatAfterForm(){
    document.getElementById("form-fill-text").style.display = "none";
    document.getElementById("show-form").style.display = "none";


    document.getElementById("connect-chat").style.display = "block";
    document.getElementById("admin-icon").style.display = "block";

    setTimeout(connectChatSuccessful, 5000);
  }

  function confirmEndChat(){
    if(confirm("Are you sure you want to end this chat?")){
      $.post("include/end-chat.php", {endchat: 0})

      location.reload();

    }
  }

  function continueLiveChat(){
    document.getElementById("admin-icon").style.display = "none";
    document.getElementById("faq-intro").style.display = "none";
    document.getElementById("faq-faq1").style.display = "none";
    document.getElementById("faq-faq2").style.display = "none";
    document.getElementById("connect-chat").style.display = "none";

    connectChatSuccessful();
  }
