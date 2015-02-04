<html>
	<head>
		<title>FragsCON</title>
		<meta charset="utf-8"/>
		<link rel="stylesheet" type="text/css" href="style.css">
		<link rel="icon" href="icon.ico">
		<?php
			mysql_connect('mysql1.ugu.pl', 'db674118', 'franekdolot123') or die('Nie można połączyć się z siecią');
			mysql_select_db('db674118') or die('Błąd!!');
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
			<div id="matches">
				<?php
					$matches = mysql_query('SELECT id FROM matches');
					while ($row = mysql_fetch_array($matches, MYSQL_NUM)) 
					{
						$match = mysql_fetch_array(mysql_query('SELECT * FROM matches WHERE id='.$row[0]));
						$player1 = mysql_fetch_array(mysql_query('SELECT * FROM players WHERE id='.$match['player1']));
						$player2 = mysql_fetch_array(mysql_query('SELECT * FROM players WHERE id='.$match['player2']));
						echo('<b>'.$player1['nick'].' vs '.$player2['nick'].'</b> | <i>'.$match['date'].'</i> | <i><u>'.$match['time'].'</u></i></br>');
					}
				?>
			</div>
		</div>
	</body>
</html>