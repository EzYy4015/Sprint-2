<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title> Cacti Succulent</title>
<link rel="stylesheet" type="text/css" href="style/style-index.css"/>
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v6.1.1/css/all.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="script/script.js"></script>
<script src="script/comment.js"></script>
<style>

.underline-on-hover:hover {
    /* text-decoration: underline; */
    cursor: pointer;
}
</style>
</head>
<body>

    <?php include("include/navigation.php"); ?>


    <div class="mainbody">
        <!-- Your contents go in here, create a new div yah. Better use div for each section -->
        <div class="promo-container">
            <h1>  
                Products 

            </h1>
                <div class="newcontainer">

                
                    <div class="individual-promo-container">
                        <div class="individual-promo-section-left">
                            <h1>
                            
                                Test
                            
                            </h1>

                        </div>
                        <div class="individual-promo-section-right">
                            <h1>
                            
                                Test
                            
                            </h1>

                            <p>
                            
                                Test

                           </p>

                           <div class="individual-promo-section-bottom">
                                <h1 class="underline-on-hover" onclick="document.getElementById('comment-session').style.display=((document.getElementById('comment-session').style.display=='block')?'none':'block')">
                                
                                    Comments
                                
                                </h1>

                                <!-- <div class="dropdown">
                                    <button class="dropbtn" >Comments</button> -->
                                    <!-- <div class="comment-session" id="comment-session" style="display:none;">
                                        <div class="postcomment">
                                            <div class="list">
                                                <div class="user">
                                                    <div class="usermeta">
                                                        <div class="name">ABC</div>
                                                        <div class="day">2 hours ago</div>
                                                    </div>

                                                </div>
                                                <div class="commentPosted">abc123</div>
                                            </div>
                                            <div class="list">
                                                <div class="user">
                                                    <div class="usermeta">
                                                        <div class="name">DEF</div>
                                                        <div class="day">1 hours ago</div>
                                                    </div>

                                                </div>
                                                <div class="commentPosted">abc123fadgfsjkfuwghnwsig</div>
                                            </div>
                                        
                                        </div>

                                        <div class="commentbox">
                                            <div class="user">

                                                <div class="name">ABC</div>
                                            </div>
                                            <form action="" method="post">
                                            
                                                <textarea name="comments" id="comments" cols="30" rows="3" placeholder="Your message"></textarea>
                                                
                                                <button class="commentsubmit">Comment</button>
                                            </form>
                                        </div> -->

<!--                     
                                     </div>







                                </div> -->

                            </div>
                                
                                
                                

                            
                        </div>
                        

                       

                
                    </div>


                    <div class="comment-session" id="comment-session" style="display:none;">
                        <div class="postcomment">
                            <div class="list">
                                <div class="user">
                                    <div class="usermeta">
                                        <div class="name">ABC</div>
                                        <div class="day">2 hours ago</div>
                                    </div>

                                </div>
                                <div class="commentPosted">abc123</div>
                            </div>
                            <div class="list">
                                <div class="user">
                                    <div class="usermeta">
                                        <div class="name">DEF</div>
                                        <div class="day">1 hours ago</div>
                                    </div>

                                </div>
                                <div class="commentPosted">abc123fadgfsjkfuwghnwsig</div>
                            </div>
                           
                        </div>

                        <div class="commentbox">
                            <div class="user">

                                <div class="name">ABC</div>
                            </div>
                            <form action="" method="post">
                            
                                <textarea name="comments" id="comments" cols="30" rows="3" placeholder="Your message"></textarea>
                                
                                <button class="commentsubmit">Comment</button>
                            </form>
                        </div>

                    
                    </div>

                </div>

             
                
            
        </div>





        <?php include("include/footer.php"); ?>
    </div>


    
</body>
</html>