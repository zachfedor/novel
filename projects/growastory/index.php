<!DOCTYPE html>

<html>
<head>
	<title>How To Grow A Story</title>
	<link rel="stylesheet" href="style.css" type="text/css" />
	
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<meta name="description" content="A Story For the People, By the People. Read the tale that everyone has written, then write the next chapter yourself!" />
	<meta name="author" content="zach fedor" />
	<meta name="keywords" content="how to grow a story, write, organic, community, story-telling, project" />
	
	<script>
		var html5_audiotypes = {
			"mp3" : "audio/mpeg",
			"ogg" : "audio/ogg"
		}
		
		function createsoundbite(sound) {
			var html5audio = document.createElement('audio');

			if (html5audio.canPlayType){
				for (var i=0; i<arguments.length; i++){
				var sourceel=document.createElement('source');
				sourceel.setAttribute('src', arguments[i]);

				if (arguments[i].match(/\.(\w+)$/i))
					sourceel.setAttribute('type', html5_audiotypes[RegExp.$1])
					html5audio.appendChild(sourceel)
				}
				html5audio.load()
				html5audio.playclip=function(){
					html5audio.pause()
					html5audio.currentTime=0 
					html5audio.play()
				}
				return html5audio
			} 
			else {
				return {playclip:function(){throw new Error("Your browser done fucked up")}}
			}
		}
		
		var garden = createsoundbite("garden.ogg", "garden.mp3");
		var belch = createsoundbite("belch.ogg", "belch.mp3");
		var raven = createsoundbite("raven.ogg", "raven.mp3");
		var roar = createsoundbite("roar.ogg", "roar.mp3");
		var glassShatter = createsoundbite("glass_shatter.ogg", "glass_shatter.mp3");
		
		function init() {
			var t = setInterval(function(){loadXMLDoc()}, 30000);
		}
		
		function loadXMLDoc() {
			var url = "story.xml";
			var xmlhttp;
			var txt,x,xx,i,d,dd;
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else {
				// code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200)	{
					txt="<table>";
					x=xmlhttp.responseXML.documentElement.getElementsByTagName("entry");
					for (i=0;i<x.length;i++) {
						txt=txt + "<tr>";
						xx=x[i].getElementsByTagName("date");
						{
							try {
								txt=txt + "<td class='left time'>" + xx[0].firstChild.nodeValue + "&nbsp;&nbsp;&nbsp;&nbsp;\>\> <br />";
							} catch (er) {
								txt=txt + "<td class='left time'>?<br />";
							}
						}
						xx=x[i].getElementsByTagName("time");
						{
							try {
								txt=txt + xx[0].firstChild.nodeValue + "<br />";
							} catch (er) {
								txt=txt + "?<br />";
							}
						}
						xx=x[i].getElementsByTagName("author");
						{
							try {
								txt=txt + "by: " + xx[0].firstChild.nodeValue + "</td>";
							} catch (er) {
								txt=txt + "by:</td>";
							}
						}
						d=x[i].getElementsByTagName("pic");
						{
							try {
								dd=d[0].firstChild.nodeValue;
								dd=dd.toString();
							} catch (er) {
								dd=0;
							}
						}
						if (dd.length > 1) {
							txt=txt + "<td class='right entry pic'><img src='" + dd + "' alt='illustration' width='400px' /></td>";
						} else {
							xx=x[i].getElementsByTagName("content");
							{
								try {
									txt=txt + "<td class='right entry'>" + xx[0].firstChild.nodeValue + "</td>";
								} catch (er) {
									txt=txt + "<td class='right entry'>?</td>";
								}
							}
						}
						xx=x[i].getElementsByTagName("audio");
						{
							try {
								txt=txt + "<td class='far audio'><img src='play.jpg' width='100px' alt='play sound clip' onclick='" + xx[0].firstChild.nodeValue + ".playclip()' /></td>";
							} catch (er) {
								txt=txt + "<td class='far'></td>";
							}
						}
						txt=txt + "</tr>";
					}
					txt=txt + "</table>";
					document.getElementById('story').innerHTML=txt;
				}
			}
			xmlhttp.open("POST",url,true);
			xmlhttp.send();
		}
	</script>
</head>
<body onload="loadXMLDoc(); init();">
	<?php
		$note = "Writing the next chapter? Feel free to use HTML tags like &lt;b&gt; and &lt;i&gt; to format your addition to the story. Add as much or as little as you want. And thanks for contributing!";
		$post = "Make sure you don't double post by making sure you only hit Submit once!";
		if (isset($_POST["newEntry"])) {
			
			$file = 'story.xml';
	
			if(file_exists($file)) {
				$new = $_POST["newEntry"];
				$bad = array('&', '<', '>', '%', '\'', '"', '&#13;');
				$good = array('&amp;', '&lt;', '&gt;', '&#37;', '&apos;', '&quot;', '&gt;br /&lt;');
				$new = str_replace($bad, $good, $new);
				
				$name = $_POST["newName"];
				$bad = array('&', '<', '>', '%', '\'', '"');
				$good = array('&amp;', '&lt;', '&gt;', '&#37;', '&apos;', '&quot;');
				$name = str_replace($bad, $good, $name);
				
				$date = date("m/d/y");
				$time = date("H:i a");
				$story = simplexml_load_file($file);

				$entry = $story->addChild('entry');
				$entry->addChild('date', $date);
				$entry->addChild('time', $time);
				$entry->addChild('author', $name);
				$entry->addChild('content', $new);
				$entry->addChild('pic', '0');
				
				file_put_contents($file, $story->asXML(), LOCK_EX);
			} else {
				exit('Failed to open story file...');
			}
			
			$note = "Thanks for adding your voice! Make sure to keep checking back to see where this project will go.";
			$post = "If you don't see your update at the moment, don't worry, the server might just be a tad slow. If there is a problem, feel free to contact me.";
		}
	?>
	<div id="wrapper">
		<table><tbody>
			<tr>
				<td class="left"></td>
				<td class="right topper"><img src="header.jpg" alt="roots" /></td>
				<td class="far"></td>
			</tr>
			<tr class="banner">
				<td class="left"></td>
				<td class="right"><h1 class="header">How To Grow A Story</h1>
				<br /><a href="about.html" class="about">- About This Project -</a></td>
				<td class="far"></td>
			</tr>
			<tr>
				<td class="left time">The Story &nbsp;&nbsp;&nbsp;>> <br /> Begins... <br /> by: -zachfedor- </td>
				<td class="right entry">Esther Danberry was out in her garden planting petunias. She didn't necessarily love the way petunias look, but she thoroughly enjoyed saying the word "petunias." In fact, the only reason she had petunias in her garden was that she could tell everyone about them. Everytime Esther said the word "petunias," her day got a little brighter. Horticulture Society Meetings were a riot. Unbeknownst to Esther, she and her petunias were not alone in her garden. Of course there were other flowers and herbs and such, but these aren't important right now. While she was toiling about in the soil, she came across a stone. If it was an ordinary stone, she would've tossed it away and given it little other thought. But it <i>wasn't</i> ordinary. Esther thought that this was odd, and rightfully so. She has been working in this garden since she was a young woman and she has found plenty of ordinary stones. They were all sorts of shapes and sizes and colors, but all very much ordinary. Not like this one. Wondering how it got there, she put it in her pocket to ask the Ladies about it at the Horticulture Society Meeting later that night. Then she went back to her petunias.</td>
				<td class="far audio"><img src='play.jpg' width='100px' alt='play sound clip' onclick='garden.playclip();' /></td>
			</tr>
			<tr>
				<td class="left time">----- &nbsp;&nbsp;&nbsp;&nbsp;>> <br /> - <br /> by: -zachfedor- </td>
				<td class="right entry"><img src="illustration1.jpg" alt="illustration 1" class="pic" width="500px" /></td>
				<td class="far"></td>
			</tr>
		</tbody></table>
		<div id="story"></div>
		<form action="index.php" method="POST" name="entryForm">
		<table><tbody>
			<tr>
				<td class="left"></td>
				<td class="right"><textarea name="newEntry" rows="5" placeholder="Only you can tell us what will happen next..."></textarea></td>
				<td class="far"></td>
			</tr>
			<tr>
				<td class="left"></td>
				<td class="right name">Name: <input type="text" name="newName" maxlength="20" placeholder="optional"></td>
				<td class="far"></td>
			</tr>
			<tr>
				<td class="left"></td>
				<td class="right"><input type="submit" value="Submit"></td>
				<td class="far"></td>
			</tr>
			<tr>
				<td class="left"></td>
				<td class="right"><p class="note"><?php echo $note; ?></p><p class="post"><?php echo $post; ?></p></td>
				<td class="far"></td>
			</tr>
		</form>
			<tr>
				<td class="left"></td>
				<td class="right footer"><img src="footer.jpg" width="250px" alt="petunia" /></td>
				<td class="far"></td>
			</tr>
		</tbody></table>
	</div>
</body>
</html>