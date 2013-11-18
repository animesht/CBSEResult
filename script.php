<?php

//initialize a function
function get_data($url, $i) {          

//Define the URL for the cURL request
$url='http://cbseresults.nic.in/class12/cbse122013.asp';         	

//Initialize cURL
$ch = curl_init($url);	         	

//Define the roll number variable
$rollno="regno=".$i;	         	

//Enable cURL posting
curl_setopt($ch, CURLOPT_POST, 1);  
       	
//Define the data to be posted 
curl_setopt($ch, CURLOPT_POSTFIELDS, $rollno);        
 	 
//Setting required for validation
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);	  
       
//Makes the CBSE website think we're coming from the original results page	
curl_setopt($ch, CURLOPT_REFERER, 'http://cbseresults.nic.in/class12/cbse122013.htm');	

//Execute cURL request
$result = curl_exec($ch);

//Close cURL request         	 
curl_close($ch);	   
//Truncate header      	 
$v1 = explode ('Senior', $result);	         	
$v2 = $v1[1];
//Truncate footer
$var = explode('Check ', $v2);         	 
$disp = $var[0];

//Check if roll number is invalid, else display result
if (stripos($disp,'Result Not Found') !== false) {}         	
else { echo $disp; }         	 

}

//Initializing a 'for' loop
for ($i=9173430; $i<9180000; $i++) {        
  	 
//Get the result for every roll number
get_data($url, $i);	         	 

}

?>
