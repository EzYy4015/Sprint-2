
<?php  ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL); ?>
<!--  -->
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

.pagination {
  display: inline-block;
}

.pagination a {
  color: black;
  float: left;
  padding: 8px 16px;
  text-decoration: none;
}

.pagination a.active {
  background-color: #4CAF50;
  color: white;
  border-radius: 5px;
}

.pagination a:hover:not(.active) {
  background-color: #ddd;
  border-radius: 5px;
}
</style>

<script>
  function showAlert() {
    var myText = "Please login";
    alert (myText);
  }
</script>

</head>
<body>

    <?php include("include/navigation.php");
    
     include ('include/connection.php'); 
     include("include/functions.php");
     check_login();

     ?> 


    <div class="mainbody">
        <!-- Your contents go in here, create a new div yah. Better use div for each section -->
        <div class="promo-container">
            <h1>  
                Products 

            </h1>
            <?php 
                
                

                if (!isset ($_GET['page']) ) {  

                    $page_number = 1;  
                
                } else {  
                
                    $page_number = $_GET['page'];  
                
                }  
                
                // variable to store the number of rows per page       
                $limit = 5;  
                
                // get the initial page number
                $initial_page = ($page_number-1) * $limit; 
                
                 // query to retrieve all rows from the table Countries
                 $getProduct = "SELECT * FROM  products WHERE prodVisible = '1'";  
                
                 // get the result
                 $result = mysqli_query($con, $getProduct);  
                
                 $total_rows = mysqli_num_rows($result); 
                
                 // get the required number of pages
                 $total_pages = ceil ($total_rows / $limit);  
                
                // get data of selected rows per page    
                $getProduct = "SELECT * FROM products LIMIT " . $initial_page . ',' . $limit;  

                //$getComment = "SELECT * FROM pro_comments";  
        
                $result = mysqli_query($con, $getProduct);  
                //$commentresult = mysqli_query($con, $getComment);      
               
                //display the retrieved result on the webpage  
                while ($row = mysqli_fetch_array($result)) {  
                    echo '
                    <div class="individual-promo-container"> 
                        <div class="individual-promo-section-left">
                            <img src="'?> 

                            <?php echo $row['prodImage']; ?>
                            
                        <?php echo '">

                        </div>
                        <div class="individual-promo-section-right">
                            <h1>'?> 
                            
                            <?php echo $row['prodTitle']; ?> 
                            
                            <?php echo'</h1>

                            <p>'?> 
                            
                            <?php echo $row['prodDesc']; ?> 

                            <?php echo'</p>
                            <h1 class="underline-on-hover" onclick="this.nextElementSibling.style.display=((this.nextElementSibling.style.display==\'block\')?\'none\':\'block\')">
                                
                            Comments
                        
                            </h1>
                            <div class="comment-session" id="comment-session" style="display:none;">
                                <div class="postcomment">
                                    <div class="list">
                                        <div class="user">
                                            <div class="usermeta">
                                                 
                                                <div class="name">' ?> <?php  include_once("productComment.php");
                                                //echo $row["prodID"];
                                                echo getUser($row["prodID"]);?>
                                                <?php echo'
                                                </div>
                                                
                                            </div> 
                                        </div>
                                    </div> 
                                    <div class="commentbox">
                                        <div class="user">

                                            <div class="name">' ?> <?php require_once __DIR__.'/include/meekrodb-2.4/db.class.php';
                                            if (isset($_SESSION['userid']) || $_SESSION['userid'] > 0 || $_SESSION['loggedin'] == 1 ||$_SESSION['loggedin'] == 2){
                                                // not logged in
                                                $accName = DB::queryFirstField("SELECT accName  FROM accounts WHERE accID = %i", $_SESSION['userid']);
                                                echo $accName;
                                                
                                            }else{
                                                echo ''; 
                                            }
                                            echo'</div>'; ?>
                                        <?php echo'
                                        </div>
                                            <form action="saveComment.php" method="post">
                                        
                                            <textarea name="comments" id="comments" cols="30" rows="3" placeholder="Your message"></textarea>
                                            
                                            <input type="hidden" name="userID" value="'.$_SESSION['userid'].'">
                                            <input type="hidden" name="productid" value="'.$row["prodID"].'">

                                            <button type="submit" class="commentsubmit" onclick="';
                                            
                                            
                                            if (!isset($_SESSION['userid']) || $_SESSION['userid'] <= 0){
                                            // not logged in
                                            echo 'showAlert();return false;'; 
                                            }
                                            
                                            
                                            echo '">Comment</button>
                                        </form>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>'; 
            
                }
                     
                // show page number with link   
            
                for($page_number = 1; $page_number<= $total_pages; $page_number++) {  
            
                    echo '<div class="pagination"><a href = "productAndDiscussion.php?page=' . $page_number . '">' . $page_number . ' </a> </div>';  
            
                }    

               
            ?>
<!-- 
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

                           <h1 class="underline-on-hover" onclick="this.nextElementSibling.style.display=((this.nextElementSibling.style.display=='block')?'none':'block')">
                                
                                Comments
                            
                            </h1>
                               

                           
                                
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

                                    <div class="list">
                                        <div class="user">
                                            <div class="usermeta">
                                                <div class="name">DEF</div>
                                                <div class="day">1 hours ago</div>
                                            </div>

                                        </div>
                                        <div class="commentPosted">abc123fadgfsjkfuwghnwsig</div>
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

                           <h1 class="underline-on-hover" onclick="this.nextElementSibling.style.display=((this.nextElementSibling.style.display=='block')?'none':'block')">
                                
                                Comments
                            
                            </h1>
                                
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
                                                <div class="name">DFG-</div>
                                                <div class="day">1 hours ago</div>
                                            </div>

                                        </div>
                                        <div class="commentPosted">abc123fadgfsjkfuwghnwsig</div>
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

                                    <div class="list">
                                        <div class="user">
                                            <div class="usermeta">
                                                <div class="name">DEF</div>
                                                <div class="day">1 hours ago</div>
                                            </div>

                                        </div>
                                        <div class="commentPosted">abc123fadgfsjkfuwghnwsig</div>
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


                   
                    

                </div> -->

             
                
            
        </div>





        <?php include("include/footer.php"); ?>
    </div>


    
</body>
</html>