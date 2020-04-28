<?php require 'header.php';
include 'includes/db.inc.php';
?>
<!doctype html>
<html lang="en">
    <head>
    <title>Feedback</title>
         <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="css/web.css" type="text/css" rel="stylesheet" />
    
    

    
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    
   
<!--    add reviews to database-->
    <script>
    function sendToServer()
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open('POST', 'feedbackSubmit.php', true);
                xmlhttp.onreadystatechange = function() 
                {
                    if(this.readyState == 4 && this.status == 200)
                         {
                document.getElementById("submitForm").innerHTML = this.responseText;
            }
        };
                
                var category = document.forms[1]["category"].value;
                var title = document.forms[1]["title"].value;
                var comments = document.forms[1]["comments"].value;   
                var product = document.forms[1]['product'].value;
                
         xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.send('category=' + encodeURIComponent(category) + "&title=  " + encodeURIComponent(title) + "&comments=" + encodeURIComponent(comments) + "&product=" + encodeURIComponent(product) );
           
        return false;
            }
       
    
    </script>

    
    </head>
    
    
 
    <body>

        
        

        <div class="flex-container">
           <div class="flex-item1"> 
               
            <h2>Customer reviews are essential for our products</h2>
            <br><br>
            <h4>Start by reading the reviews </h4>
            <h4>...and then share your ideas with us</h4>
               <br>
               <h4>Reviews for <?php
        
        $p = $_GET['id'];
        $content = $conn->query("SELECT ProductName FROM products WHERE ProductID = '$p'  ");
    
        foreach ($content->fetch_all(MYSQLI_ASSOC) as $value)
        {
            $name = $value['ProductName'];
            echo $name;
            
        }
        
        
        ?></h4>
               <br><br>
               <a style="text-decoration:none" class = "introBtn" href="index.php">Product Page</a>
               
               
            
            
            </div>

            
        </div>

        
    <!-- Buttons to change between ideas, feature request and feedback  -->
        
            <div class="container">
                

           <div class="flex-cat-1"> 
           <form method="get" id="switch" >
            <input type="submit" class="catButton" name="idea" value="Idea" />
            <input type="submit" class="catButton" name="feedback" value="Feedback" />
                
            <input type="submit" class="catButton" name="feature" value="Feature request" 
                   />
               <input name="id" type="hidden" id="" value="<?php echo htmlspecialchars($_GET['id']); ?>"/>
               <select name="sort" id="sortButton" style="width:150px; height= 100px;color: #00a376;border: 1.5px solid;font-size: 16px;line-height: 1.3;">
                <option value="Date DESC" selected>Sort by:</option>
                <option value="Date DESC">Newest</option>
                <option value="`upVote` DESC">Vote: High to Low</option>
                <option value="`upVote`">Vote: Low to High</option>
            </select>
               
            </form>
                    </div>
           
       
                 

            <div class="flex-cat-2"> 
<!-- add ! to change - infront of isset -->
            <!--  Write review button, changes if users are not logged in. Only logged in users can submit feedback. -->
                <?php if (isset($_SESSION['UserID']))
           {
  
    echo '<button class ="submitButton" type="button" id="formButton">Write a Review!</button>';
                
               
           }else{
              echo '<form action ="index.php" >
                <button  class ="submitButton" type="submit" id="fakeButton">Log in</button>
               </form>';
                 }
                ?>
 </div>
            </div>
            

<!--  Form to submit feedback, includes catageory, title and comments sections -->
            <form method="post" id="submitForm" onSubmit="return sendToServer()">
                
             <div class="category">
            <p>
            <label for="catagory">   </label>
            <select name="category"  style="width:155px; height= 100px;color: #00a376;border: 1.5px solid;font-size: 16px;line-height: 1.3;" size="1" id="category">
            <option selected hidden value="">Select a category</option>
            <option value="Idea" >Idea</option>
            <option value="Feedback" >Feedback</option>
            <option value="Feature request" >Feature request</option>
            <option value="Other" >Other</option>      
            </select>
            </p>
            <textarea name="title" cols="90" rows="1" > Title</textarea><br><br>
            <textarea name="comments" cols="90" rows="7"> Tell us what you thought...</textarea>
            <br><br>
                  <input name="product" type="hidden" id="pageID" value="<?php echo $_GET['id']; ?>"/>
            <input class = "submitButton" type="submit" name="submit" value="Submit review" />
                  <input name="id" type="hidden" id="pageID" value="<?php echo htmlentities($_GET['id']); ?>"/>
            
            </div>
            </form>





<!--review box toggle-->
<script >
    $(document).ready(function() {
  $("#formButton").click(function() {
    $("#submitForm").toggle();
  });
});
</script>


<!--Switch between 'Idea', 'Feature' and 'Feedback request' tabs     -->
<?php
         {
             
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Something posted
     

        if (isset($_GET['idea'])) {
           
            printTable($conn, "Idea", $_GET['sort'] );
            
        
        }
        else if (isset($_GET['feedback']))
        {
            printTable($conn, "Feedback");
        }
        else if (isset($_GET['feature'])){
            printTable($conn, "Feature request");
        
        } 
        else
        {
            printTable($conn, "Idea");
        }
    }}
          
        
//Function which prints reviews for specific products and allows voting function
        // What is seen depends on whether the user is logged in or not
    function printTable($conn, $a, $sort='Date DESC')
    {
        
       $prod_id = $_GET['id'];
       
        $domain = $_SERVER['HTTP_HOST'];
        // to get the path of the file
        $path = $_SERVER['SCRIPT_NAME'];
        // query strıng
        $queryString = $_SERVER['QUERY_STRING'];
        // getting the url for different pages
        $url = "http://" . $domain . $path . "?" . $queryString;
        //url should have the format below
        preg_match("/([0-9]+)\/?/", $url, $page_no);
        // if none of the page buttons selected the page is set to 1
        if(empty($page_no)){
            $page = 1;
        }
        // get page no from url
        else{
            $page = $page_no[0];
        }
        
        // number of comments per page
        $num_per_page = 2;
        // number of total comments
        
        $sql = $conn->query("SELECT * FROM feedback WHERE Category = '$a'  AND Status=1 AND ProductID = '$prod_id' ORDER BY $sort ");
        $count = mysqli_num_rows($sql);
        // number of pages needed
        $num_of_pages = ceil($count / $num_per_page);
        // offset to be used in query to limit the number of comments
        $offset = (($page - 1) *  $num_per_page ) ;
        // query with limit of comments per page
        
        $content = $conn->query("SELECT * FROM feedback WHERE Category = '$a'  AND Status=1  AND ProductID = '$prod_id' LIMIT " . $offset  . " ,".  $num_per_page);
        
        

        foreach ($content->fetch_all(MYSQLI_ASSOC) as $value) {
            
            
             $user = $value['UserID'];
            echo '<br>
            <div class="commentBox">
            <div class="commentTop">
            <div class="displayUser">
            <img class="userImage" src="images/account.png"  height="50" width="50" >';
             echo  "User ID: $user";
            echo '</br>';
            '</div>
            <div class="displayDate">
            posted on ';
            echo $value['Date'];
            echo '</div>
            </div>';

            echo '<div class="commentBottom">
            <div class="displayTitle">' . $value['Title'] . '</div>';
            

            $commentSec = $value['Comment'];
            $upVote = $value['upVote'];
            
            $commentWords = explode(" ", $commentSec);
            $commentCount = sizeof($commentWords);
            $numberOfWord = 60;
            $feedback_id = $value['FeedbackID'];
            
            
            $response = $value['Response'];
            
            
            
            if($commentCount > $numberOfWord){
                $firstPart = array_slice($commentWords, 0, $numberOfWord);
                $secPart = array_slice($commentWords, $numberOfWord);
                echo '<div class="displayComment">';
                echo implode(" ", $firstPart);
                echo '<span class="dots">...</span>
                <span class="more">';
                echo implode(" ", $secPart);
                echo '</span>
                <span class="read">read more></span>
                </div>';
                 
                
            }
            else{
                
                echo '<div class="displayComment">';
                echo $commentSec;
               
                
                echo '</div>';
                
                
            }
            
            echo '</div>';          
           
      {
            echo '<div class="commentFooter">';
            echo '<div class="up" >';
           if (!isset($_SESSION['UserID']))
               
           {
               echo "You must be logged in to vote";
               
           }else{
            if ($response == null)
            {
            
            echo '<a  href="javascript:;" onClick="makeChange('.$feedback_id.',\'like\');"><img src="thumb_up.png" style="width:30px;height:30px"></a><br>';
              
             
             
          echo '<span id="'.$feedback_id.'" >'.$upVote.' </span>';
               
                
                echo '</br>';
                
             echo '<a name = "dislikes" style="text-decoration:none" href="javascript:;" onClick="makeChange('.$feedback_id.',\'dislike\');"><img src="thumb_down.png" style="width:30px;height:30px"></a><br>';
               
            }
            else
            {
                echo "Voting is locked for this post";
            }
             }
            
                echo '</div>';
       
            
            echo '</div>';
          if($response != null)
            {
      
            echo '<div class="commentBottom">';
            echo '<div class="displayTitle">Administrator reply</div>';
            echo '</br>';
            echo $response;
           
                 echo '</div>';
            }
           echo '</div>';
           echo '<br>';
            
           
            
        
    }
    }
         //creating the pagination links at the bottom of the page
        //this part works with manually adding url as href to anchors
        
        echo '<div class="pagination">';
        //link the buttons at the bottom to the pages
        for ( $page=1;$page<=$num_of_pages;$page++) {
            
            
            if($a === "Idea") {
              //href should be the latest version of the page for example  "index.php?idea=Idea?page="
                
                echo '<a href="feedback.php?idea=Idea?page=' . $page . '&id='.$prod_id.'" >'.$page.'</a> ';
                
               
            }
            else if($a === "Feedback") {
              //href should be the latest version of the page for example index.php
               
            echo '<a href="feedback.php?feedback=Feedback?page=' . $page . '&id='.$prod_id.'">' . $page . '</a> ';
                 
            }
            else if($a === "Feature request") {
              //href should be the latest version of the page for example index.php
                echo '<a href="feedback.php?feature=Feature+request?page=' . $page . '&id='.$prod_id.'">' . $page . '</a> ';
            }
        }
        echo '</div>';

    }
        
        
        
    
        
?><!-- Script for voting buttons--> 
       <script>
         function makeChange(id,type){

$.post('upVote.php', {id:id, type:type}, function(data){

$('#'+id).text($.trim(data));

});

}  
        </script>       
       

<!--Read more script-->
<script>
    $(document).ready(function(){
        $(".read").click(function(){
            $(this).prev().toggle();
            $(this).siblings('.dots').toggle();
            if($(this).text()=='read more>'){
                $(this).text('read less<');
            }
            else{
                $(this).text('read more>');
            }
        });
    });
</script>
       

</body>
    
</html>