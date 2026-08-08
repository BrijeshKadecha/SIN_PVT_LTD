<?php
@ob_start();
error_reporting(0);


ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

date_default_timezone_set("Asia/Kolkata"); 

//var_dump($_POST);
//exit;
/*==================================== Below variables to review START ========================================*/
	// define('DB_SERVER', '65.0.39.16'); 
	// define('DB_USERNAME','suryam'); 
	// define('DB_PASSWORD','0YV9m4vtuQiuid76'); 
	// define('DB_DATABASE','dbformsuryam'); 
	
	// do not Edit below
	// $connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(mysqli_error());
	//$database = mysqli_select_db(DB_DATABASE) or die(mysqli_error());


	$type_of_form=ucwords(str_replace("_"," ",$_POST['type_of_form']));
	
	
	$enable_SMTP = true;
	$has_attached_file = false;	
	
	$client_name="Shyam Infra Network"; //Client Full Name
	$client_email_id="whatsapp@compubrain.in"; //Email id, whom to send emails on form submit?

		
	$is_microsite = false;
	$name_if_microsite = 'Demo Microsite Name'; // do not matter if --> $is_microsite = false;
	
	$client_website_url="https://compubrain.net.in/cdemo/shyaminfranetwork/";
	$client_logo_url_in_png="https://compubrain.net.in/cdemo/shyaminfranetwork/site/img/shyam-infranetwork-logo.jpg";
	
	$client_file_uploads_path='https://compubrain.net.in/cdemo/shyaminfranetwork/';
	
	$captcha_is_enabled = false;
	$captcha_privatekey = '6LfVfFUcAAAAAFFarBwBXnFo7jrzPEc9zxf5Duy9';
	
	// do not Edit below
	$name_if_microsite = (!empty($name_if_microsite))?$name_if_microsite:'Microsite'; 

	$name_of_project='';
    if(!empty($_POST['name_of_project']))
    {
        $name_of_project = $_POST['name_of_project'];
    }
	
	
	$email_to=$client_email_id;
	$email_subject=$type_of_form." | ".$client_name;	
	if($is_microsite) $email_subject=$type_of_form." | ".$name_if_microsite." | ".$client_name;
	if($name_of_project) $email_subject=$name_of_project." | ".$type_of_form." | ".$client_name;
	
	if($enable_SMTP)
	{
		require 'SMTP/PHPMailerAutoload.php';


			$mail = new PHPMailer(true);
		$mail = new PHPMailer(); // call the class 
		
		/*Required SMTP details as below*/
		$mail->Host = 'smtp.gmail.com'; //Hostname of the mail server
		$mail->Username = 'info@suryam.com'; //Username for SMTP authentication any valid email created in your domain
		$mail->Password = 'myvpwkqjygdedtgg'; //Password for SMTP authentication
		$mail->Port = 465; //Port of the SMTP like to be 25, 80, 465 or 587
		$mail->SMTPSecure = 'ssl'; //IF REQUIRED
		
		foreach($to as $client_email_id){
		$mail->AddAddress($client_email_id);                  // name is optional
		}
		
		//$mail->AddAddress($client_email_id);//To address who will receive this email
		
		$mail->IsSMTP();
		$mail->AddReplyTo($client_email_id); //reply-to address
		$mail->SMTPAuth = true; //Whether to use SMTP authentication
		$mail->SetFrom($client_email_id, $client_name); //From address of the mail
		// put your while loop here like below,
		$mail->Subject = $email_subject; //Subject od your mail		
	}
/*==================================== Below variables to review END ========================================*/

	
if($type_of_form=="Career" || $type_of_form=="Land" || $type_of_form=="Maintenance_Query" || $type_of_form=="Vendor_Registration" )
$has_attached_file = true;

function getIp() 
{
$ip=$_SERVER['REMOTE_ADDR'];
  if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
   	$ip=$_SERVER['HTTP_CLIENT_IP'];
  } else if(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    	$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
  return $ip;
}

$name=$_POST['name'];
if (!preg_match("/^[a-zA-Z-,]+(\s{0,1}[a-zA-Z-, ])+(\s{0,1}[a-zA-Z-, ])*$/",$name))
{
	if($type_of_form!="Newsletter")
	$name="";
	else
	$name="User";
}
$email=$_POST['email'];	
if(!preg_match('/[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b/i',$email))
		
{
  	$email="";
}

// For Check Domain Validation Start
$domain=explode("@",$email);
$domain=end($domain);

if(@checkdnsrr($domain,'ANY')) {

}
else {
	$email="";
}
// For Check Domain Validation End

$contact_no=$_POST['contact_no'];
if(!preg_match("/^([0|\+[0-9]{1,5})?([7-9][0-9]{9})$/",$contact_no)) {
	$contact_no="";
}

$email_message=trim(strip_tags($_POST['message']));
if (strlen($email_message) >= 500)
{
	$email_message="";
}

$ip1=getIp();
if(!empty($_SERVER['HTTP_REFERER'])){
	$ref_page=$_SERVER['HTTP_REFERER'];
}


$brochure_link='';
if(!empty($_POST['brochure_link']))
//$brochure_link=$_POST['brochure_link'];
$brochure_link='https://suryamrepose.com/download/'.$_POST['brochure_link'].'.pdf';
 

$onscreen_thankyou_msgs=array(
"Contact_Us" => "Hello!<br>We appreciate you contacting us.<br>We will circle back shortly.",
"Career" => "Awesome!<br>We appreciate your interest in working with us.<br>Be patient until our team scans through this and based on the relevance revert back.",
"Product_Inquiry" => "Awesome!<br>Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Redevelopment" => "Awesome!<br>Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Join_Development" => "Awesome!<br>Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Land" => "Awesome!<br>Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Channel_Partner" => "Awesome!<br>Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Nris" => "Awesome!<br>Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Request_for_Quote" => "Awesome!<br>Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Registration" => "Thank you for taking the time to register.<br>The details have been added to our database.<br>Looking forward to connect.",
"Member_Registration" => "Thank you for taking the time to register.<br>The details have been added to our database.<br>Looking forward to connect.",	
"Vendor_Registration" => "Thank you for taking the time to register.<br>The details have been added to our database.<br>Looking forward to connect.",		
"Maintenance_Query" => "Awesome!<br>Thank you for your query.<br>Our relevant officer shall soon address your qualified query.",
"Quick_Inquiry" => "Awesome!<br>Thank you for your query.<br>Our relevant officer shall soon address your qualified query.",	
"Buy_Now" => "Awesome!<br>Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Inquire_Now" => "Awesome!<br>Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",	
"Sales_Inquiry" => "Awesome!<br>Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Business_Associate_Inquiry" => "Awesome!<br>Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Book_Appointment" => "Thank you!<br>Looking forward to see you.",
"Newsletter" => "Awesome!<br>Thank you for signing up for our newsletter.<br>Welcome to our mailing list.",
"Request_for_Call_Back" => "Thank you!<br>Our relevant officer shall soon address your qualified query.",
"Download_Brochure" => "Awesome!<br>Thank you for your interest.<br>The requested brochure would have just landed in the inbox of your registered mail address. Given the quirky mailing algorithm, do check your spam if our mail has missed your inbox.");




$auto_response_thankyou_msgs=array(
"Contact_Us" => "We appreciate you contacting us.<br>Trust that our team shall connect, depending on the nature of your query.<br>Thank you.",
"Career" => "We appreciate your interest in working with us.<br>Be patient until our team scans through the details shared and based on the relevance revert back.<br>We wish you all the best.",
"Product_Inquiry" => "Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Redevelopment" => "Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Join_Development" => "Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Land" => "Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Channel_Partner" => "Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",	
"Nris" => "Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Request_for_Quote" => "Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",
"Registration" => "Thank you for taking the time to register.<br>The details have been added to our database.<br>Looking forward to connect.",
"Member_Registration" => "Thank you for taking the time to register.<br>The details have been added to our database.<br>Looking forward to connect.",	
"Vendor_Registration" => "Thank you for taking the time to register.<br>The details have been added to our database.<br>Looking forward to connect.",		
"Maintenance_Query" => "Thank you for your query.<br>Our relevant officer shall soon address your qualified query.",
"Quick_Inquiry" => "Thank you for your query.<br>Our relevant officer shall soon address your qualified query.",
"Buy_Now" => "Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",		
"Inquire_Now" => "Thank you for showing your interest.<br>Our relevant officer shall soon address your qualified query.",	
"Sales_Inquiry" => "Thank you for your query.<br>Our relevant officer shall soon address your qualified query.",	
"Business_Associate_Inquiry" => "Thank you for your query.<br>Our relevant officer shall soon address your qualified query.",		
"Book_Appointment" => "Thank you.<br>Looking forward to see you.<br>Should there be any change in your schedule, kindly let us know at your earliest convenience.",
"Newsletter" => "Thank you for signing up for our newsletter.<br>Welcome to our mailing list.",
"Request_for_Call_Back" => "Thank you.<br>Our relevant officer shall soon address your qualified query.",
"Download_Brochure" => "Awesome!<br>Thank you for your interest.<br><a href='$brochure_link' target='_blank'>Click Here to to refer and download your requested brochure.</a>");

if($captcha_is_enabled && isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
	$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$captcha_privatekey.'&response='.$_POST['g-recaptcha-response']);
	$captcha_response = json_decode($verifyResponse);
}elseif(!$captcha_is_enabled){
	$captcha_response=new stdClass();
	$captcha_response->success=true;
}
if(!$captcha_response->success || (($name=="" || $email=="" || $contact_no=="") && $type_of_form!="Newsletter"))
{
	$status="2";
}
else
{
	$digidend_table_name=$_POST['type_of_form'];
	if($is_microsite) $digidend_table_name=$digidend_table_name.'_microsite';
	
	if(($_POST['contact_no'])){
		$contactno = addslashes($_POST['contact_no']);
	}else if(($_POST['Mobile_No']))
		$contactno = addslashes($_POST['Mobile_No']);

	$create_init="CREATE TABLE IF NOT EXISTS `".$digidend_table_name."` (`id` int(11) unsigned NOT NULL auto_increment, ";
	
	$collective_create_init="CREATE TABLE IF NOT EXISTS `collective_data` (`id` int(11) unsigned NOT NULL auto_increment, `name` varchar(150)	NOT NULL, `email` varchar(150) NOT NULL, `phone` varchar(150)	NOT NULL, `page` text NOT NULL,`ip` varchar(20) NOT NULL,`datetime` datetime NOT NULL, PRIMARY KEY (`ID`), UNIQUE KEY `email` (`email`,`phone`));";
	
	$collective_insert_init="insert into `collective_data` (name,email,phone,page,ip,datetime) values ('".addslashes($_POST['name'])."','".addslashes($_POST['email'])."','".$contactno."','".$ref_page."','".$ip1."','".date('Y-m-d H:i:s')."')";	
		
	$insert_init="insert into `".$digidend_table_name."` ";
	$insert_temp1='';
	$insert_temp2='';
	
	

	$email_message="<table cellpadding='15px' cellspacing='0px' style='width: auto; color: #333; padding: 20px; font-family: Open Sans, sans-serif; border: 3px dashed #333;' border='0' bordercolor='#fff' align='center'>
	  <tr align='center'>
		<td colspan='2' bgColor='#f2f2f2'><a href='".$client_website_url."' target='_blank'><img src='".$client_logo_url_in_png."'  alt='".$client_name." Logo' /></a></td>
	  </tr>";
	  foreach($_POST as $key => $value)
		{
			if($key != 'type_of_form' && $key != 'g-recaptcha-response' && $key != 'name_of_project')
			{
				$email_message.="<tr>
					<td align='right' bgColor='#f2f2f2'><strong>".str_replace("_"," ",ucfirst($key)).":</strong></td>
					<td bgColor='#f6f6f6'>".$value."</td>
				</tr>";
				$create_init.="`".ucfirst($key)."` text NOT NULL,";	
				
				$insert_temp1.='`'.ucfirst($key)."`,";	
				$insert_temp2.="'".addslashes($value)."',";
				
			}
		}
	  
	  if(!empty($ref_page)){
		$email_message.="<tr>
		<td align='right' bgColor='#f2f2f2'><strong>URL:</strong></td>
		<td bgColor='#f6f6f6'><a href='".$ref_page."' target='_blank'>".$ref_page."</a></td>
	  	</tr>";
	  }
	$email_message.="<tr>
		<td align='right' bgColor='#f2f2f2'><strong>Visitor IP:</strong></td>
		<td bgColor='#f6f6f6'>".$ip1."</td>
	  </tr>
	</table>";
	
	
	$email_headers="From: ".$name."<".$email.">\r\n";
	$email_headers.="MIME-Version: 1.0\r\n";
	$email_headers.="Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	if($has_attached_file){
		if($enable_SMTP){
			foreach($_FILES as $userfile)
			{
				$tmp_name = $userfile['tmp_name'];
				$type = $userfile['type'];
				$file_name = $userfile['name'];
				$size = $userfile['size'];
				if (file_exists($tmp_name))
				{
				   if(is_uploaded_file($tmp_name))
				   {
					  $file = fopen($tmp_name,'rb');
					  $data = fread($file,filesize($tmp_name));
					  fclose($file);
					  $data = chunk_split(base64_encode($data));
				   }
				  $mail->AddAttachment($tmp_name,$file_name);
				}
			}			
		}
		else{	
			$mime_boundary="==Multipart_Boundary_x".md5(mt_rand())."x";
			$email_headers="From: ".$name."<".$email.">\r\n" .
			"MIME-Version: 1.0\r\n" .
			"Content-Type: multipart/mixed;\r\n" .
			" boundary=\"{$mime_boundary}\"";
			$email_message = "This is a multi-part message in MIME format.\n\n" .
			"--{$mime_boundary}\n" .
			"Content-Type: text/html; charset=\"iso-8859-1\"\n" .
			"Content-Transfer-Encoding: 7bit\n\n" .
			$email_message . "\n\n";
			foreach($_FILES as $userfile)
			{
				$tmp_name = $userfile['tmp_name'];
				$type = $userfile['type'];
				$file_name = $userfile['name'];
				$size = $userfile['size'];
				if (file_exists($tmp_name))
				{
				   if(is_uploaded_file($tmp_name))
				   {
					  $file = fopen($tmp_name,'rb');
					  $data = fread($file,filesize($tmp_name));
					  fclose($file);
					  $data = chunk_split(base64_encode($data));
				   }
				   $email_message .= "--{$mime_boundary}\n" .
					  "Content-Type: {$type};\n" .
					  " name=\"{$file_name}\"\n" .
					  "Content-Disposition: attachment;\n" .
					  " filename=\"{$file_name}\"\n" .
					  "Content-Transfer-Encoding: base64\n\n" .
				   $data . "\n\n";
				}
			}
			$email_message.="--{$mime_boundary}--\n";
		}
		
			//Attachment
			if (!file_exists('file_uploads')) {
				mkdir('file_uploads', 0777, true);
			}
			
			$uploadpaths='';			
			$ticketno=str_replace(' ','_',preg_replace('/[^\w ]/u','_',$client_name.' '.$type_of_form)).'_digidend_uploads_';			
			foreach($_FILES as $userfile)
			{
				$tmp_name = $userfile['tmp_name'];
				$type = $userfile['type'];
				$file_name = $userfile['name'];
				$size = $userfile['size'];
				if (file_exists($tmp_name))
				{
				   if(is_uploaded_file($tmp_name))
				   {
					   	$ext=pathinfo($file_name,PATHINFO_EXTENSION);
					  	$fileuplaodname=$ticketno.date('d_m_Y_H_i_s').rand(0,99999).".".$ext;
					  
						copy($tmp_name,"file_uploads/".$fileuplaodname);
						$uploadpaths.=$client_file_uploads_path.$fileuplaodname.',';
					}
				}
			}		
			$uploadpaths=trim($uploadpaths,",");		
			$create_init.="`uploads` text NOT NULL,";			
			$insert_temp1.="uploads,";
			$insert_temp2.="'".addslashes($uploadpaths)."',";
			
			$alter_add_uploads="ALTER TABLE `".$digidend_table_name."` ADD `uploads` TEXT NOT NULL  AFTER `page`;";
			mysqli_query($connection,$alter_add_uploads);
			//Attachment END
	}
	
	$create_init.=" `page` text NOT NULL,`ip` varchar(20) NOT NULL,`datetime` datetime NOT NULL, PRIMARY KEY (`ID`));";
	
	//$insert_temp1 = rtrim($insert_temp1,',');
	$insert_temp1 = $insert_temp1.'page,ip,datetime';
	$insert_init = $insert_init."(".$insert_temp1.") "."values (".$insert_temp2."'".$ref_page."','".$ip1."','".date('Y-m-d H:i:s')."')";
	//echo $insert_init;
	
	// mysqli_query($connection,$create_init);
	// mysqli_query($connection,$insert_init);	
	// mysqli_query($connection,$collective_create_init);
	// mysqli_query($connection,$collective_insert_init);
	
	// mysqli_close($connection);
	
	
	if($enable_SMTP){
		$mail->MsgHTML($email_message);
		$ok=$mail->Send();
	}
	else{
		$ok=@mail($email_to,$email_subject,$email_message,$email_headers);
		
	}
	if($ok)
	{
		$status="1";
		$email_to2=$email;
		$email_subject2=$type_of_form." | ".$client_name;
		if($is_microsite) $email_subject2=$type_of_form." | ".$name_if_microsite." | ".$client_name;
		if($name_of_project) $email_subject2=$name_of_project." | ".$type_of_form." | ".$client_name;	
		$email_from2=$client_name."<".$client_email_id.">\r\n";
		$email_headers2="From: ".$email_from2;
		$email_headers2.="MIME-Version: 1.0\r\n";
		$email_headers2.="Content-Type: text/html; charset=ISO-8859-1\r\n";
		$email_message2="<table cellpadding='2px' cellspacing='5px' style='width: auto; color: #333; padding: 20px; font-family: Open Sans, sans-serif; border: 3px dashed #333;' border='0' align='center'>
		  <tr align='center'>
			<td colspan='2' bgColor='#f2f2f2'><a href='".$client_website_url."' target='_blank'><img src='".$client_logo_url_in_png."'  alt='".$client_name." Logo' /></a></td>
		  </tr>
		  <tr>
			<td><p align='center'><font size='+2'><strong>Thank you!</strong></font></p>";
			if($type_of_form!="Newsletter"){
			  $email_message2.="Dear <strong>$name</strong>,<br />
			  <br />";
			}
			$email_message2.=$auto_response_thankyou_msgs[$_POST['type_of_form']]."</td>
		  </tr>
		  <tr>
			<td>Regards,<br />
			  <strong>".$client_name."</strong><br />
			  <br />
			  <font size='2'>This is an auto generated email. PLEASE DO NOT REPLY directly to this email.</font></td>
		  </tr>
		</table>";
		if($enable_SMTP){
			$mail->clearAddresses();
			$mail->clearCCs();
			$mail->clearBCCs();
			$mail->clearAttachments();
						
			$mail->AddAddress($email_to2);//To address who will receive this email
			$mail->MsgHTML($email_message2);
			$mail->Send();
		}
		else{
			@mail($email_to2,$email_subject2,$email_message2,$email_headers2);
		}
		
	}
	else
	{
		$status="0";
	}
}

$Mail_Msg='';
if($status==1) {
	echo $Mail_Msg="<div class='alert alert-success'>".$onscreen_thankyou_msgs[$_POST['type_of_form']]."</div>";
}
else if($status==2) {
	echo $Mail_Msg="<div class='alert alert-danger'>It seems you are not submitting all the details as they are expected.</div>";
}
else if($status==0) {
	echo $Mail_Msg="<div class='alert alert-danger'>Sorry! Some Technical issue occured. Please try again after sometime.</div>";
}

?>