<html>
	<head>
		<title>FragsCON</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css">
		<?php
			mysql_connect('localhost', 'root', '') or die('Nie można połączyć się z siecią');
			mysql_select_db('db') or die('Błąd!!');
			ob_start();
			session_start();
		?>
	</head>
	<body>
		<div id="header">
			<img src="logo.png">
		</div>
		<div id="content">
			<div id="players">
				<table>
					<tr>
						<td style="width: 300px; background-color: #222;">Nick</td>
						<td style="width: 110px; background-color: #222">Wins</td>
						<td style="width: 110px; background-color: #222">Draws</td>
						<td style="width: 110px; background-color: #222">Loses</td>
						<td style="width: 110px; background-color: #222">Points</td>
						<td style="width: 100px; background-color: #222">Kills</td>
						<td style="width: 110px; background-color: #222">Deaths</td>
					</tr>
					<?php
						$ids = mysql_query('SELECT id FROM players');
						while ($row = mysql_fetch_array($ids, MYSQL_NUM)) 
						{
							echo("<tr>");
   	 						$player = mysql_fetch_array(mysql_query('SELECT * FROM players WHERE id='.$row[0]));
							echo("<td>");
							echo($player['nick']);
							echo("</td>");
							echo("<td>");
							echo($player['wins']);
							echo("</td>");
							echo("<td>");
							echo($player['draws']);
							echo("</td>");
							echo("<td>");
							echo($player['loses']);
							echo("</td>");
							echo("<td>");
							echo($player['points']);
							echo("</td>");
							echo("<td>");
							echo($player['kills']);
							echo("</td>");
							echo("<td>");
							echo($player['deaths']);
							echo("</td>");
							echo("</tr>");
						}
					?>
				</table>
			</div>
		</div>
	</body>
</html>