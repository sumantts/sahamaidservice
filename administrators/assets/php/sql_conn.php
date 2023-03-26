<?php
	$host = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'sahamaidservice';
	
	// $host = 'localhost';
	// $username = 'sahamaidservice_sahamaidservice';
	// $password = 'sahamaidservice123';
	// $dbname = 'sahamaidservice_sahamaidservice';
	
	$mysqli = new mysqli($host, $username, $password, $dbname);

	// Check connection
	if ($mysqli -> connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
		exit();
	}else{
		//echo "Connected Successfully";
	}

	$con = mysqli_connect($host, $username, $password, $dbname);
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
		exit();
	}
	session_start();
	
	/*echo "connected...";
	
	try {
		$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
		$sql = "CALL usp_validateuser('admin','bagnan')";
		$q = $pdo->query($sql);
		$q->setFetchMode(PDO::FETCH_ASSOC);
	} catch (PDOException $e) {
		die("Error occurred:" . $e->getMessage());
	}
		
	while ($r = $q->fetch()): 
		echo $r['SocietyNm'];
	endwhile;*/

	$title = 'Saha Maid Service and Enterprise';
	$logo_text = 'Saha';

    $p_name = 'Saha Maid Service and Enterprise';
	$logo = 'logo.png';
	$ico = 'favicon.ico';

	$banner_text1 = 'Saha Maid Service and Enterprise';
	$banner_text2 = 'Manpower Service Provider, Home Help Service Agency in P.s: Bauria; Open 24 X 7';

	//About Us
	$about_us = 'We are providing reliable made and verify all documents properly with local agent . And also our replacement police is too easy and quickly.';

	$about_us_right = 'In the Western world, comparatively few households can afford live-in domestic help employees, in lieu of live-in staff, a maid service is utilized as a periodic cleaner. In developing nations, differences found within income and social status between different socio-economic classes, lesser educated women, with less opportunity are believed to provide a labor source for domestic work.';

	//FAQ
	$faq_sub_text = 'Feel free to ask any questions regarding our services. Here are a few questions and answers provided below, asked by our customers.';
	$questions_answers = array();

	$question_answer = new stdClass();
	$question_answer->q = "Non consectetur a erat nam at lectus urna duis?";
	$question_answer->a = "Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.";
	array_push($questions_answers, $question_answer);

	$question_answer = new stdClass();
	$question_answer->q = "Feugiat scelerisque varius morbi enim nunc?";
	$question_answer->a = "Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.";
	array_push($questions_answers, $question_answer);

	$question_answer = new stdClass();
	$question_answer->q = "Dolor sit amet consectetur adipiscing elit?";
	$question_answer->a = "Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis";
	array_push($questions_answers, $question_answer);

	//Need Services
	$need_service = 'Need Services?';
	$need_service2 = 'Please feel free to send your request we will contact with you within 12 Hours. Just fill up the Quotation form and send it to us.';

	//Contact Us
	$contact_us_text = 'Feel free to contact us. We will be available on your doorstep with a single message. We are ready to serve you.';

	$location = 'NCC park, West Burikhali; opposite of Electric office, P.O: Santosh pur Burikhali, Bauria, Howrah: 711310';
	$contact_email = '24x7@sahamaidservice.com';
	$contact_ph_number = '+91 7003662260';
	
	//Posrfolio
	$portfolio_text = 'We are happy to serve you. We have been working in this fields from a long before. Here are a few portfolios we served to people.';

	$portfolio_categories = ["cleaning", "coocking", "sister"];

	$portfolios = array();
	$portfolio = new stdClass();
	$portfolio->category = '0';
	$portfolio->image = 'clean2.jpeg';
	$portfolio->name = 'Cleaning';
	$portfolio->description = 'Cleaning description';
	array_push($portfolios, $portfolio);
	$portfolio = new stdClass();
	$portfolio->category = '0';
	$portfolio->image = 'clean3.jpeg';
	$portfolio->name = 'Cleaning';
	$portfolio->description = 'Cleaning description';
	array_push($portfolios, $portfolio);
	$portfolio = new stdClass();
	$portfolio->category = '0';
	$portfolio->image = 'clean4.jpeg';
	$portfolio->name = 'Cleaning';
	$portfolio->description = 'Cleaning description';
	array_push($portfolios, $portfolio);
	
	$portfolio = new stdClass();
	$portfolio->category = '1';
	$portfolio->image = 'coock1.jpeg';
	$portfolio->name = 'Coocking';
	$portfolio->description = 'Coocking description';
	array_push($portfolios, $portfolio);	
	$portfolio = new stdClass();
	$portfolio->category = '1';
	$portfolio->image = 'coock2.jpeg';
	$portfolio->name = 'Coocking';
	$portfolio->description = 'Coocking description';
	array_push($portfolios, $portfolio);	
	$portfolio = new stdClass();
	$portfolio->category = '1';
	$portfolio->image = 'coock3.jpeg';
	$portfolio->name = 'Coocking';
	$portfolio->description = 'Coocking description';
	array_push($portfolios, $portfolio);
	
	$portfolio = new stdClass();
	$portfolio->category = '2';
	$portfolio->image = 'sister2.jpeg';
	$portfolio->name = 'Sister';
	$portfolio->description = 'Sister description';
	array_push($portfolios, $portfolio);	
	$portfolio = new stdClass();
	$portfolio->category = '2';
	$portfolio->image = 'sister3.jpeg';
	$portfolio->name = 'Sister';
	$portfolio->description = 'Sister description';
	array_push($portfolios, $portfolio);	
	$portfolio = new stdClass();
	$portfolio->category = '2';
	$portfolio->image = 'sister4.jpeg';
	$portfolio->name = 'Sister';
	$portfolio->description = 'Sister description';
	array_push($portfolios, $portfolio);
	
	//Customer Review
	$review_text = 'We gain some blessings from our beloved customers. They have written ther satisfactions within a few lines. These Lines are assets for us.';

	$reviews = array();
	$review = new stdClass();
	$review->customer_name = 'Rahul Kumar Jha';
	$review->from_area = 'Kolkata';
	$review->review_desc = 'So polite behaviour and provide responsible maid as per my requirement with more option. Great service.';
	array_push($reviews, $review);

	$review = new stdClass();
	$review->customer_name = 'Ankit Sahani';
	$review->from_area = 'Kolkata';
	$review->review_desc = 'Happy from the services good and reliable maid provided by the owner';
	array_push($reviews, $review);

	$review = new stdClass();
	$review->customer_name = 'Aman Choudhary';
	$review->from_area = 'Kolkata';
	$review->review_desc = 'Getting good services, reliable and responsible and service on time';
	array_push($reviews, $review);

	//Services
	$services_text = 'We are providing below services.';

	$services = array();
	$service = new stdClass();
	$service->name = 'All Types of Maid';
	$service->description = 'Basic House Cleaning, Deep/Spring Cleaning, Green Cleaning Services, Ceiling and Wall Cleaning, Curtain Cleaning, Carpet and Upholstery Maid Services, Blind and Chimney Cleaning, Pressure Washing';
	array_push($services, $service);

	$service = new stdClass();
	$service->name = 'House keepingin office & Commercial Place';
	$service->description = 'Housekeeping refers to day-to-day cleanliness, tidiness and good order in all parts of the office. Good housekeeping provides a clean and pleasant working environment. It also helps prevent accidents in the workplace and aids the efficient operation of the office.';
	array_push($services, $service);

	$service = new stdClass();
	$service->name = 'All types of man power supply';
	$service->description = 'We have all types of employess (Skilled, Unskilled & Semiskilled). We supply man power for Driver Services, Contract Labour Supplier Services, Plumbing Contractors, Industrial Manpower Services, Staffing Service, and Labour Consultants.';
	array_push($services, $service);
		 
?>
