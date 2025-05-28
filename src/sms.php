
<?php
try{
	$key="e73fc8e9221596bd13d877807dbc2f686a2256c3"; //mag generate ka ng sayo dun sa site tas paste mo na lang dito
	$device = 181; // ito yung device id pag na register mo na yung device mo sa site
	$sim = 2; // anong sim gamit mo pang send
	$message = $_GET['message'];
	$phoneNumber =$_GET['phone'];
	if($message !=null && $phoneNumber !=null){
		$url = "https://sms.teamssprogram.com/api/send/sms/SendSMS?key=".$key."&device=".$device."&sim=".$sim."&phone=".$phoneNumber."&message=".urlencode($message); // yung https://sms.teamssprogram.com/api/send/ eto url pang send tapos yung sms/SendSMS folder ko to saka file name hahaha
		$curl = curl_init($url);
		curl_setopt($curl,CURLOPT_RETURNTRANSFER, true);
		$curl_response = curl_exec($curl);




		if($curl_response === false){
			$info = curl_getinfo($curl);
			curl_close($curl);
			die('Error occurred'.var_export($info));
		}

		curl_close($curl);

		$response  = json_decode($curl_response);

		if($response->status == 200){
			echo 'Message has been sent';

            header('location:typesms.php');
		}else{
			'Technical Problem';
		}

	}
}catch(Exception $ex){
	echo "Exception: ".$ex;
}
?>