<?php

$to = "bifot@bifot.ru";
$name = htmlspecialchars($_POST["name"], ENT_QUOTES);
$email = htmlspecialchars($_POST["email"], ENT_QUOTES);
$message = htmlspecialchars($_POST["message"], ENT_QUOTES);
$ip = $_SERVER["REMOTE_ADDR"];

mail($to, 'Письмо с сайта (status.bifot.ru)', "Имя: " . $name . "\n\nEmail: " . $email . "\n\nСообщение: " . $message . "\n\nОтправлено с IP: " . $ip);

header( 'refresh:3;url=http://status.bifot.ru/contact' );

if (mail) {
	echo '
	<body>
		<main>
			<p>
			Thanks for message!
			You will be redirected <a href="http://status.bifot.ru/contact">back</a>.
			</p>
		</main>
	</body>
	<link rel="stylesheet" type="text/css" href="http://bifot.ru/theme/main/css/style.css" media="all" />
	';
} else {
	echo '
	<body>
		<main>
			<p>
			Error. Sorry, the message was not sent.<br/>
			Try other ways:</p>
			<ul>
				<li><b>Telegram:</b> @bifot</li>
				<li><b>Email:</b> bifot@bifot.ru</li>
			</ul>
		</main>
	</body>
	<link rel="stylesheet" type="text/css" href="http://bifot.ru/theme/main/css/style.css" media="all" />
	';
}

?>