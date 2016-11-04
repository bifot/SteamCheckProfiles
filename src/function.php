<?php
foreach (array_combine($xmlURL, $twitter) as $value => $accs) { // выводим весь массив
	$xml = "http://steamcommunity.com/profiles/{$value}/?xml=1";
	$url = simplexml_load_file($xml); // читаем XML
	$getURL = substr($xml, 0, -6);

	// теперь получаем инфу

	$status = $url->onlineState; // статус 
	$gamename = $url->inGameInfo->gameName; // игра, в которую играет
	$getGameURL = $url->inGameInfo->gameLink; // ссылка на игру, в которую играет
	$login = $url->steamID; // логин
	$avatar = $url->avatarFull; // аватар
	$active = $url->mostPlayedGames->mostPlayedGame->hoursPlayed;
	$twitt = "https://twitter.com/{$accs}";

	switch($status) { // присваиваем классы надписи со статусом
		case 'offline' :
			$status = "<span class='status offline-status'>offline</span>";
			break;
		case 'online' :
			$status = "<span class='status online-status'>online</span>";
			break;
		case in-'game' :
			$status = "<span class='status ingame-status'>in-game</span>";
			break;
		}

		// выводим все

echo <<<EOT
	<div class="block-player">
		<a href="$twitt"><img class="twitter-icon" src="/img/twitter-icon.png"/></a>
		<a href="{$getURL}">
			<img src="{$avatar}"/>
		</a>
		<h1 class="h1-players"><a href={$getURL}>{$login}</a></h1>
		<p>{$status} <a href={$getGameURL}>{$gamename}</a></p>
EOT;

	if ($active == 0) {
		echo "<p class='profile-closed'>Private profile privacy settings</p>";
	} else {
		echo "<p class='active-game'>Activity in the last two weeks: <strong>{$active} hours in CS:GO</strong></p>";
	}

	echo "</div>";

}
?>