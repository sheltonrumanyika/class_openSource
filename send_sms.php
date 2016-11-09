<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dorosms</title>
<link rel="stylesheet" href="css/sms.css" />
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
<script src="js/jquery-1.3.2.js"></script>
<script src="js/jquery.form.js"></script>
<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script>
$(document).ready(function(){
//user attaching files and documents
$("#register_user_for_sms").hide();

//event image

$('#photoimg').live('change', function(){ 

			           $("#Preview").html('');
					   
				$("#current").hide();
				
			    $("#Preview").html('<img src="images/loadings.gif" alt="Uploading...."/>');
				
			$("#imageform").ajaxForm({
					
					target: '#Preview'		
						
		}).submit();
		
			});
			
			
			
			//post image

$('#postimg').live('change', function(){ 

			           $("#Post_Preview").html('');
					  
				
			    $("#Post_Preview").html('<img src="images/loadings.gif" alt="Uploading...."/>');
				
			$("#postform").ajaxForm({
					
					target: '#Post_Preview'		
						
		}).submit();
		
			});
			
			
			
			
			//gallery image

$('#galleryimg').live('change', function(){ 

			           $("#gallery_Preview").html('');
					  
				
			    $("#Post_Preview").html('<img src="images/loadings.gif" alt="Uploading...."/>');
				
			$("#garellyform").ajaxForm({
					
					target: '#gallery_Preview'		
						
		}).submit();
		
			});

			
		
		$("#update_web").click(function(){


         
        var ID=$(".preview").attr("id");
		
	
		
		var titles=$("#evt_titles").val();
        var msg=$("#write").val();
		 
		 var Datastring=' titles=' + titles +'&msg=' +msg + '&Id=' +ID;
		 
	if(titles==''){
	
	alert('Please Enter the Heading of the Event.');
	}
	else if(msg==''){
	
	alert('Please Enter Event Description.');
	
	}
	else{
	
	$.ajax({
	
	type:'POST',
	url:'post_event.php',
	data: Datastring,
	cache: false,
	beforeSend: function(){
	
$("#pillow_posts_displayer").html('<div style=font-family: Verdana, Geneva, sans-sarif; font-size:12px; color:black; align="center">Posting...<img src="images/loadings.gif" alt="posting..." title="posting..." align="absmiddle"></div> <br clear="all"');	

},
	
success: function(data){
	
	$("#pillow_posts_displayer").html('');
	$("#evt_titles").val('');
	$("#write").val('');
	$("#Preview").hide();
	$("#post_current_event").prepend(data);
		}
	
	
	
	
	});
	
	
	
	}
		return false;
		
		
		});	
	
$("#send_msg").click(function(){

   $("#Response_sent").show();
   
   $("#wrapp_all_msg").hide();

	var message=$("#write_message").val();
	
	var datastr=' message=' + message;
	
	if(message==''){alert("Please Enter Your message");}
	
	else{	
	$.ajax({
	
	type:'POST',
	url:'send_sms.php',
	data: datastr,
	cache: false,
	beforeSend: function(){
	
$("#pillow_posts_displayer").html('<div style=font-family: Verdana, Geneva, sans-sarif; font-size:12px; color:black; align="center">sending...<img src="images/loadings.gif" alt="Sending...." title="Sending...." align="absmiddle"></div> <br clear="all"');	

},

	success: function(data){

	$("#write_message").val('');
	$("#pillow_posts_displayer").html('');
	}
	
	
	});
	
	}
	
	
	return false;
	});
				
			
			
			
		$("#add_more_users").click(function(){
		
		$("#register_user_for_sms").slideToggle();
		
		return false;
		});	
		
	$("#update_users").click(function(){
	
	
	var fullname=$("#fullname").val();
	var tel=$("#tel").val();
	
	var datastr=' fullname=' + fullname +'&tel=' +tel;

	if(fullname==''){alert("Please Enter Receiver Fullname");}
	else if(tel==''){alert("Please Enter Receiver number with +256");}
	else{	
	$.ajax({
	
	type:'POST',
	url:'save_users.php',
	data: datastr,
	cache: false,
	beforeSend: function(){
	
$("#indicator").html('<div style=font-family: Verdana, Geneva, sans-sarif; font-size:12px; color:black; align="center">Saving...<img src="images/loadings.gif" alt="Saving...." title="Saving...." align="absmiddle"></div> <br clear="all"');	

},

	success: function(data){
	
	$("#fullname").val('');
	$("#tel").val('');
	$("#indicator").html('');
	$("#wrapp_send_msg").prepend(data);
	}
	
	
	});
	
	}
	return false;
	});	
	
//delete post

$(".delete_post").click(function(){

var ID=$(this).attr("id");

dataString=' id=' +ID;

$.ajax({

type:'POST',
url:'delete_post.php',
data: dataString,
beforeSend: function(){
	
$("#delete_indicator").html('<div style=font-family: Verdana, Geneva, sans-sarif; font-size:12px; color:black; align="center">Deleting...<img src="images/loadings.gif" alt="Deleting...." title="Deleting..." align="absmiddle"></div> <br clear="all"');	

},
success: function(data){

$("#delete_holders"+ID).hide();

}

});
});	
	//delete_vent
	
	
	$(".delete_vent").click(function(){
	
	var ID=$(this).attr("id");
	
 dataString=' id=' +ID;

$.ajax({

type:'POST',
url:'delete_event.php',
data: dataString,
beforeSend: function(){
	
$("#delete_indicator").html('<div style=font-family: Verdana, Geneva, sans-sarif; font-size:12px; color:black; align="center">Deleting...<img src="images/loadings.gif" alt="Deleting...." title="Deleting..." align="absmiddle"></div> <br clear="all"');	

},
success: function(data){

$("#delete_event_holders"+ID).hide();
$("#delete_indicator").html('');

}
	
	
	
	});
	
	return false;
	});

	
	
	
	
	
	
	
	
	
	
	
	
	//remove number and users from list of people to receive sms
	$(".remove_number").click(function(){
	
	var ID=$(this).attr("id");
	
 dataString=' id=' +ID;

$.ajax({

type:'POST',
url:'delete_user_for_sms.php',
data: dataString,
beforeSend: function(){
	
$("#delete_indicator").html('<div style=font-family: Verdana, Geneva, sans-sarif; font-size:12px; color:black; align="center">Deleting...<img src="images/loadings.gif" alt="Deleting...." title="Deleting..." align="absmiddle"></div> <br clear="all"');	

},
success: function(data){

$("#delete_users_holder"+ID).hide();

}
	
	
	
	});
	
	return false;
	});

	
	
		$("#write_new_event").click(function(){
		
		var transition='bounceInUp';
		
		$("#main_timeline").show().addClass('animated ' +transition);
		$("#main_timeline_second_part").hide();
		
		return false;
		
		});
		
		$("#Add_new").click(function(){
		
		var transition='bounceInUp';
		
		$("#main_timeline").hide();
		$("#main_timeline_second_part").show().addClass('animated ' +transition);
		
		
		
		return false;
		});	


$("#add_images").click(function(){

var transition='bounceInUp';
$("#main_timeline").hide();
$("#main_timeline_second_part").hide();
$("#main_timeline_gallery_part").show().addClass('animated ' +transition);

});


});


</script>
<style>
.preview{
width:150px;
height:150px;
background-color:#FFFFFF;
border:1px solid #cecece;
}
.preview img{
width:150px;
height:150px;
}

</style>
</head>

<body>


<div id="wrapp_page">

<div id="fixed_nav">
<div id="logo"><span class="home_icon" style="width:40px; float:left"><img src="images/home153.png" /></span><span class="logo_text" style="float:left; width:600px; text-decoration:none;font-family: 'Tangerine', serif;font-size: 32px;">Dorosms</span></div>

<div id="socialnet_notification">
<div id="Logged_in_info">
<div id="user_photo"><a href="javascript:void(0)"><img src="images/sms.png" style="width:25px; height:20px;" /></a></div>
<div id="user_username">Dorosms Master</div>
</div>
<div id="message"><a href="dashboard.php"><img src="images/home153.png" /></a></div>
<div id="message"><a href="javascript:void(0)"><img src="images/social12 (1).png" /></a></div>
<div id="Notification"><a href="javascript:void(0)"><img src="images/bell70.png"  style="height:25px; width:25px;"/></a></div>
<div id="sms"><a href="javascript:void(0)"><img src="images/sms.png" /></a></div>
<div id="Settings" style="margin-left:10px;"><a href="index.php"><img src="images/logout.png" /></a></div>
</div>


</div>



<div id="wrap_dashboard">

<div id="main">

<div id="main_fixed_left">

<div id="admin"><a href="javascript:void(0)"><img src="images/sms.png"  style="width:38px; height:40px; background-color:#fff"/></a></div>

</div><!-------------------------main_fixed_left-------------------->


<div id="wrapp_all_timeline">

<div id="main_timeline">

<div id="wrapp_users_post">

<div id="user_image"><img src="images/sms.png"  style="width:68px; height:68px; padding: 1px 1px 1px 1px;"/></div>

<div id="user_post_box">

<div id="box_title"><a href="javascript:void(0)"><img src="images/edit45.png" style="height:12px; width:12px;" /></a>Write message you want to Send</div>

<div id="box_post"><textarea id="write_message" placeholder="write your message"></textarea></div>

<div id="post_button"><button id="send_msg">Send To All</button></div>


</div><!------------user_post_box----------------->

</div><!------------wrapp_users_post------------------>

<div id="wrapp_users_post_blog2">
<div id="pillow_posts_displayer" style="text-align:center;"></div>
<div id="userspost_images"><img src="images/sms.png"   style="width:68px; height:68px; padding: 1px 1px 1px 1px;"/></div>
<div id="post_current_event">
<div id="hold_user_post">
<div id="wrapp_all_msg">
<h1 style="margin-left:24px;"></h1>

<table border="1" align="center" id="table1" cellpadding="0" cellspacing="0">
<tr>
<td align="left">Id</td>
<td>STUDENTS NAMES</td>
<td>CONTACTS</td>
<td>Delivery status</td>
</tr>
<?php
//connect to the database
include('includes/db.php');
//

$sql1=mysql_query("SELECT * from sms_users ");
while($sqlfetch=mysql_fetch_assoc($sql1)){
$sign="+256";
?>
<tr>
<td width="250">
<?php echo $sqlfetch['id'];?></a>
</td>
<td width="250">
<?php echo $sqlfetch['fullname'] ;?></a>
</td>
<td width="250">
<?php echo $sign.$sqlfetch['contact'] ;?></a>
</td>

<td width="300">
<?php echo "waiting.."; ?></a>

</td>
</tr>
<?php 
}?>
</table>
</div>
<div id="Response_sent" style="float:left; width:100%; display:none;"><h2>Message Sent To:</h2>

<?php
/* Send an SMS using Twilio. You can run this file 3 different ways:
*
* - Save it as sendnotifications.php and at the command line, run
* php sendnotifications.php
*
* - Upload it to a web host and load mywebhost.com/sendnotifications.php
* in a web browser.
* - Download a local server like WAMP, MAMP or XAMPP. Point the web root
* directory to the folder containing this file, and load
* localhost:8888/sendnotifications.php in a web browser.
*/
$dsn = 'mysql:dbname=buchurch;host=mysqlcluster4.registeredsite.com';

$user = 'bu';

$password = '123456Bu';

try {
    $pdo = new PDO($dsn, $user, $password);
     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 
// Step 1: Download the Twilio-PHP library from twilio.com/docs/libraries,
// and move it into the folder containing this file.
require ('twilio-php-master/Services/Twilio.php');
// Step 2: set our AccountSid and AuthToken from www.twilio.com/user/account
$AccountSid = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";

$AuthToken = "xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx";
// Step 3: instantiate a new Twilio Rest Client
$client = new Services_Twilio($AccountSid, $AuthToken);
// Step 4: make an array of people we know, to send them a message.
// Feel free to change/add your own phone number and name here.

//insert this message into database...


$sms=$_POST['message'];
	
$date=date('h:i A M d',time());//

if($sms===""){
	
	echo'<div id="warning" style=" color:red;">Please type message you want to sent.</div>';
	die();//
	}
	else{
	
$sql=$pdo->prepare("insert into  sent_message SET msg=? ,date=? ");
$sql->bindvalue(1,$sms);
$sql->bindvalue(2,$date);
$sql->execute();
}



$message=$_POST['message'];

$select=$pdo->prepare("select * from sms_users ");

$select->execute();

while($row1=$select->fetch(PDO::FETCH_ASSOC)){

$id = $row1['id'];

$owner=$row1['fullname'];

$PHONE=$row1['contact'];

$sign="+256";
$realphone=$sign.$row1['contact'];//+256771073927

echo $realphone;

$people = array(
$realphone => $owner,
);
// Step 5: Loop over all our friends. $number is a phone number above, and
// $name is the name next to it
foreach ($people as $number => $names) {

$sms = $client->account->messages->sendMessage('+12018318013', $number,$message);
// Display a confirmation message on the screen
echo "Sent message to $names<br/>";

header("location:dashboard.php");

}
}	 
	 
	 
	 
} 
catch (PDOException $e) {
$e->getMeessage();
}


?>

</div>
</div>
</div>


</div><!-----wrapp_page-------------->

<div id="footer"><p>Copy &copy; Dorocode 2016</p></div>

</body>
</html>
