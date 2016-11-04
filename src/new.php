<?php include 'header.php'; ?>

<div class="all-list">
	<h1>New player</h1>
	<p>URL should be made up of numbers! <a href="http://www.steamid.ru/">Generate</a> to numbers.</p>
	<p style="padding: 10px 0;">
		<strong>Good:</strong><br/>
		<code class="green">http://steamcommunity.com/profiles/76561198102701267/</code>
		<strong>Bad:</strong><br/>
		<code class="red">http://steamcommunity.com/profiles/bifot/</code>
	</p>
	<form action="" method="POST">
		
		<input type="text" name="url" required="" placeholder="URL (e.g. http://steamcommunity.com/profiles/76561198102701267/)">

		<input type="submit" placeholder="Send">

	</form>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<?php

if(isset($_POST)) {
	$xml = $_POST["url"] . "?xml=1";
	$url = simplexml_load_file($xml); // читаем XML

	// info

	$status = $url->onlineState; // статус
	$gamename = $url->inGameInfo->gameName; // игра, в которую играет
	$getGameURL = $url->inGameInfo->gameLink; // ссылка на игру, в которую играет
	$login = $url->steamID; // логин
	$avatar = $url->avatarFull; // аватар
	$active = $url->mostPlayedGames->mostPlayedGame->hoursPlayed; // сыгранные часы

	// status

	if ($status == "offline")
		$status = "<span class='status offline-status'>offline</span>";
	else if ($status == "online")
		$status = "<span class='status online-status'>online</span>";
	else if ($status == "in-game")
		$status = "<span class='status ingame-status'>in-game</span>";

	// many hours

	// if ($active == 0)
	// $active = "<p class='profile-closed'>Private profile privacy settings</p>";	
	if ($active > 0)
		$active = "<p class='active-game'>Activity in the last two weeks: <strong>{$active} hours in CS:GO</strong></p>";


echo <<<EOT
	<div class="all">
		<div class="block-player">
			<a href="{$getURL}">
				<img src="{$avatar}"/>
			</a>
			<h1 class="h1-players"><a href={$getURL}>{$login}</a></h1>
			<p>{$status} <a href={$getGameURL}>{$gamename}</a></p>
			<p>$active</p>
EOT;

	echo "</div></div>";
}

?>

<?php include 'footer.php'; ?>