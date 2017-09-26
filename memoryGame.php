<?php
include('session.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Spaceship Memory Game</title>
</head>
<body background="img/space.jpg">
<center>
<font color="white">
<h1>Spaceship Memory Game!</h1>
<h2>
<div id=profile">
<b id="hello">Hello, <?php echo $login_session; ?>!	</b>
<b id="logout"><a href="logout.php" style="color: #00FFFF">Logout</a></b>
</div>
</h2>
</font>
<!-- creates the board of title -->
<div id="board">
  <a href="JavaScript:Flip(0)" ><img id="0" src="img/ss_empty.png" /></a>
  <a href="JavaScript:Flip(1)" ><img id="1" src="img/ss_empty.png" /></a>
  <a href="JavaScript:Flip(2)" ><img id="2" src="img/ss_empty.png" /></a>
  <a href="JavaScript:Flip(3)" ><img id="3" src="img/ss_empty.png" /></a>
<br />
  <a href="JavaScript:Flip(4)" ><img id="4" src="img/ss_empty.png" /></a>
  <a href="JavaScript:Flip(5)" ><img id="5" src="img/ss_empty.png" /></a>
  <a href="JavaScript:Flip(6)" ><img id="6" src="img/ss_empty.png" /></a>
  <a href="JavaScript:Flip(7)" ><img id="7" src="img/ss_empty.png" /></a>
<br />
  <a href="JavaScript:Flip(8)" ><img id="8" src="img/ss_empty.png" /></a>
  <a href="JavaScript:Flip(9)" ><img id="9" src="img/ss_empty.png" /></a>
  <a href="JavaScript:Flip(10)" ><img id="10" src="img/ss_empty.png" /></a>
  <a href="JavaScript:Flip(11)" ><img id="11" src="img/ss_empty.png" /></a>
<br />
  <a href="JavaScript:Flip(12)" ><img id="12" src="img/ss_empty.png" /></a>
  <a href="JavaScript:Flip(13)" ><img id="13" src="img/ss_empty.png" /></a>
  <a href="JavaScript:Flip(14)" ><img id="14" src="img/ss_empty.png" /></a>
  <a href="JavaScript:Flip(15)" ><img id="15" src="img/ss_empty.png" /></a>
</div>

<div id="main">
<font color="white">
  <p>To play the Spaceship Memory game, start by clicking the <b>New Game</b> button.
   Click the tiles and try to match pairs of Spaceships.</p>
  <p>
  </font>
  <input type="button" value="New Game" onclick="randomize()"/>
  </p>
</div>
<!-- script to play the music -->
<script type="text/javascript">
var sound = new Audio("spaceodyssey.mp3");
sound.addEventListener('ended', function() {
    this.currentTime = 0;
    this.play();
}, false);
sound.play();
var FlipCount, Tile1, Tile2, Revealed1, Revealed2, id1, id2;
var FlipCount=0
var FlipTotal=0
//creates the tiles to be set onto the board
if (document.images){
 
var Tile1 = new Array();
Tile1[0] = new Image();
Tile1[1] = new Image();
Tile1[2] = new Image();
Tile1[3] = new Image();
Tile1[4] = new Image();
Tile1[5] = new Image();
Tile1[6] = new Image();
Tile1[7] = new Image();
Tile1[8] = new Image();
Tile1[9] = new Image();
Tile1[10] = new Image();
Tile1[11] = new Image();
Tile1[12] = new Image();
Tile1[13] = new Image();
Tile1[14] = new Image();
Tile1[15] = new Image();
 
 Tile1[0].src = "img/ss_blue.png";
 Tile1[1].src = "img/ss_cyan.png";
 Tile1[2].src = "img/ss_green.png";
 Tile1[3].src = "img/ss_orange.png";
 Tile1[4].src = "img/ss_pink.png";
 Tile1[5].src = "img/ss_purple.png";
 Tile1[6].src = "img/ss_red.png";
 Tile1[7].src = "img/ss_yellow.png";
 Tile1[8].src = "img/ss_blue.png";
 Tile1[9].src = "img/ss_cyan.png";
 Tile1[10].src = "img/ss_green.png";
 Tile1[11].src = "img/ss_orange.png";
 Tile1[12].src = "img/ss_pink.png";
 Tile1[13].src = "img/ss_purple.png";
 Tile1[14].src = "img/ss_red.png";
 Tile1[15].src = "img/ss_yellow.png";
 
var Tile2 = new Array();
Tile2[0] = new Image();
Tile2[1] = new Image();
Tile2[2] = new Image();
Tile2[3] = new Image();
Tile2[4] = new Image();
Tile2[5] = new Image();
Tile2[6] = new Image();
Tile2[7] = new Image();
Tile2[8] = new Image();
Tile2[9] = new Image();
Tile2[10] = new Image();
Tile2[11] = new Image();
Tile2[12] = new Image();
Tile2[13] = new Image();
Tile2[14] = new Image();
Tile2[15] = new Image();
 
 Tile2[0].src = "img/ss_blue.png";
 Tile2[1].src = "img/ss_cyan.png";
 Tile2[2].src = "img/ss_green.png";
 Tile2[3].src = "img/ss_orange.png";
 Tile2[4].src = "img/ss_pink.png";
 Tile2[5].src = "img/ss_purple.png";
 Tile2[6].src = "img/ss_red.png";
 Tile2[7].src = "img/ss_yellow.png";
 Tile2[8].src = "img/ss_blue.png";
 Tile2[9].src = "img/ss_cyan.png";
 Tile2[10].src = "img/ss_green.png";
 Tile2[11].src = "img/ss_orange.png";
 Tile2[12].src = "img/ss_pink.png";
 Tile2[13].src = "img/ss_purple.png";
 Tile2[14].src = "img/ss_red.png";
 Tile2[15].src = "img/ss_yellow.png";
}
//function to flip over the tiles
//if all tiles are matched then alerts the user of their score
function Flip(i) {
    if (FlipCount==0) {
    id1 = i;
    document.images[i].src = Tile1[i].src;
    Revealed1 = Tile1[i].src;
    FlipCount = 1;
    } else {
	id2 = i;
        document.images[i].src = Tile2[i].src;
        Revealed2 = Tile2[i].src;
	CheckTiles();
    }
	if (FlipTotal == Tile1.length) {
	alert("Congratulations, Space Cadet, you beat the game in " + totalSeconds + " seconds!");
	randomize();
	}
}
//checks to see if the tiles chosen match
function CheckTiles() {
    if (Revealed1 != Revealed2) {
    FlipCount=0;
    window.setTimeout('FlipBack(id1, id2)', 700);
    } else {
	FlipCount=0;
	FlipTotal+=2;
    }
}
//this is ran if the tiles dont match, and turns them back over
function FlipBack(id1, id2) {
    document.getElementById(id1).src = "img/ss_empty.png";
    document.getElementById(id2).src = "img/ss_empty.png";
    FlipCount=0;
}
//this function randomly puts the tiles into the board
function randomize() {
for(i=0; i<=15; i++) {
    document.images[i].src = "img/ss_empty.png";
Tile1.sort(function() {return 0.5 - Math.random()})
Tile1 = Tile2;
	}
totalSeconds = 0;
FlipTotal = 0;
}
//this keeps track of the amount of time the user takes to finish the game
</script>
<button style="visibility:hidden">
<label id="minutes">00</label>:<label id="seconds">00</label>
</button>
</form>
    <script type="text/javascript">
        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var totalSeconds = 0;

        setInterval(setTime, 1000);

        function setTime()
        {
            ++totalSeconds;
            secondsLabel.innerHTML = pad(totalSeconds%60);
            minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));
        }

        function pad(val)
        {
            var valString = val + "";
            if(valString.length < 2)
            {
                return "0" + valString;
            }
            else
            {
                return valString;
            }
        }
    </script>
</center>
</body>
</html>
