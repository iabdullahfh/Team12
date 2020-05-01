<?php
include('Header.php');
include 'includes/db.inc.php';
if (!($_SESSION['Type']==1))
{

    header('Location: index.php');
}


?>

<!DOCTYPE html>

<!-- New codes from Billy in line 19-63 (CSS), 190-196 (comment box), 207-217 (reply submit button), 219-247 (buttons and layouts) -->
<html lang="en">
        <link href="css/websiteFeedback.css" type="text/css" rel="stylesheet" />
    
    
<head>
    <meta charset="UTF-8">
    <script src= "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	</script>
		<!-- Additional CSS from Billy -->
		<style>
				.mybutton {
				  background-color: #4CAF50;
				  border: none;
				  color: white;
				  padding: 5px 20px;
				  text-align: center;
				  text-decoration: none;
				  display: inline-block;
				  font-size: 16px;
				  margin: 4px 2px;
				  cursor: pointer;
				  float: left;
				}
				.mybutton: hover {opacity: 1}
				
				.mybutton2 {
					color: #20bf6b ;
					background: #ffffff;
					padding: 6px 20px;
					border: 2px solid #20bf6b ;
					border-radius: 2px;
					display: inline-block;
					transition: all 0.3s ease 0.2s;
					font-size: 17px;
				}
				.mybutton2:hover {
					
					border-radius: 5px;
					border-color: #ADFF2F;
					transition: all 0.3s ease 0s;
					font-size: 19px;
					
				}
				.catButton:hover {
					color: #56e647;
					border-radius: 5px;
					border-color: #494949;
					transition: all 0.5s ease 0s;
					
				}
				
		</style>
		<!-- Also added few lines of codes to .displayTitle in website.css (in line 223) -->
    

    
    </head>
     <body>
         <div class="flex-container">
           <div class="flex-item1"> 
            <h2>Administration page</h2>
            <br>
            <h4>Publish, delete or respond to reviews below</h4>

            </div>
         </div>



        
    
            <div class="container">

           <div class="flex-cat-1"> 
           <form method="get" id="switch">
            <input type="submit" class="catButton" name="idea" value="Idea" />
            <input type="submit" class="catButton" name="feedback" value="Feedback" />
            <input type="submit" class="catButton" name="feature" value="Feature request" />
            </form>
            </div>

           
            </div>


          







<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Something posted

        if (isset($_GET['idea'])) {
            printTable($conn, "Idea");
        
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
    }
    
        
         function printTable($conn, $a)
    { 
             
        $index = 1;
        $content = $conn->query("SELECT * FROM feedback WHERE Category = '$a' ORDER BY Date DESC");
        //print the content of the table
        foreach ($content->fetch_all(MYSQLI_ASSOC) as $value) {
            $user = $value['UserID'];
            $reviewID = $value['FeedbackID'];
            
             $stat = $value['Status'];
            
            echo '<br>
            <div class="commentBox">';
            if($stat ==0)
            {
                echo '<div id = "displayTitleNew">';
            echo "New!";
                echo '</div>';
                
            }
            
           echo  '<div class="commentTop">
            <div class="displayUser">
            <img class="userImage" src="images/account.png"  height="50" width="50">';
            echo  "User ID: $user";
            echo '</div>
            <div class="displayDate">
            posted on ';
            echo $value['Date'];
            echo '</br>';
            echo  "Review ID: $reviewID";
            echo '</div>
            </div>';



            echo '<div class="commentBottom">
            <div class="displayTitle">' . $value['Title'] . '</div>';
	



            $commentSec = $value['Comment'];
            $upVote = $value['upVote'];
            $res = $value['Response'];
           
            $commentWords = explode(" ", $commentSec);
            $commentCount = sizeof($commentWords);
            $numberOfWord = 60;
            $feedback_id = $value['FeedbackID'];
           
           
            
            
            
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
			
			// little addition to comment box
                echo '<div class="displayComment">';
                
						echo $commentSec;
				
            // end of addition
                echo '</div>';
                
                
            }
            
            echo '</div>';
            
			echo '<div class="commentFooter">';
            echo '<div class="stat"> ';
           
			// reply submit part amendments
			
             echo ' <form method="post" id="respondForm" action ="respond.php">';
                 
            echo '<input "name="Response" placeholder="Enter your reply" type="text" id="Response" size="40"/> 
				<input class = "catButton" name="id" type="hidden" id="submitForm" value=" '.$feedback_id.';"/>
				<input class="mybutton2" type="submit" name="Submit" value="Submit reply" />'; // changed from default button to class mybutton2
				
            echo '</form>';
			// end of reply submit amendments
			
			
			// changed these buttons to class mybutton2 and some layout
            if($stat == 2)  
            {
                echo 'Deleted!';
            }else
            {
                
                echo '<div class="stat" >';
				echo  '<button  type="button" href="javascript:;" onClick="makeChange('.$feedback_id.',\'delete\');" class ="mybutton2" id ="'.$feedback_id.'" name="delete">Delete</button>';
                // echo '</div>';
            }
            if($stat ==0)
            {
				//echo '<form>';     
				echo  '<button  type="button" href="javascript:;" onClick="makeChange('.$feedback_id.',\'publish\');" class ="mybutton2" id ="'.$feedback_id.'" name="publish">Publish</button>';
				//echo '</form>';
				echo '</div>';
            }
            else if($stat == 1)
            {
				echo '<br>'; // added to move the "Published" to the next line
                echo "Published!";
            }
            
			
			echo ' </div>'; // for <div class="commentFooter">
			
			echo ' </div>'; // for <div class="stat">'
			// end of buttons and layout amendments
			
            echo '</div>';
           echo '</div>';
           echo '<br>';
            
            
           
        }
        }
         
         
         
?>
         <script>
         function makeChange(id,type){

$.post('adminFunctions.php', {id:id, type:type}, function(data){

$('#'+id).text($.trim(data));

});

}  
           
        </script>
          <script>
    function sendToServer(id, type)
            {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.open('POST', 'adminFunctions.php', true);
                xmlhttp.onreadystatechange = function() 
                {
                    if(this.readyState == 4 && this.status == 200)
                         {
                document.getElementById("submitForm").innerHTML = this.responseText;
            }
        }
                
                var response = document.forms[2]["response"].value;
                    
                
         xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xmlhttp.send('response=' + encodeURIComponent(response));
           
        return false;
            }
              
            
            
    
    </script>
         
         <script >
    $(document).ready(function() {
  $("#formButton").click(function() {
    $("#submitForm").toggle();
  });
});
</script>

       
</body>
</html>