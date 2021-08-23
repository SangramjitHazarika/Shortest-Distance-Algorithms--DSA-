<html>
<head>
	<title>A Star Answer</title>
	
</head>
<style>

#road
{
    border-bottom: 7px dashed black;
}

#runner
{
    background: url(WalkingMan3.svg);
    width: 250px;
    height: 330px;
    animation: walk 1s steps(1),forward 5s linear;
}

@keyframes walk{
    0%{
        background-position: 0px;
    }
    100%{
        background-position: 300px;
    }
}

@keyframes forward{
    0%{
        transform: translateX(-10px)
    }

    100%{
        transform: translateX(1000px);
    }
}
#back1:hover
{
	background-color: darkorange;
	border-color: darkorange;
}
#back1
{
	background-color:#e6b800;
	border-color: #e6b800;
	height:25px;
	color:white;
}
#a_star_popup
{
	border:4px solid black;
    background-color:#ffffff;
    border-collapse:collapse;
    box-shadow: 5px 7px #888888;
    width:26%;
    height:80%;
    margin-left:415px;
    margin-top:50px;
    border-radius: 10px;
}
#open2
{
    height:40px;
    width:100px;
    background-color:blue;
    border-radius:5px;
    color:white;
    font-size:18;
    border-color:blue;
}
</style>
<script>
function back1()
{
	document.getElementById('a_star_popup').style.display='none';
	document.getElementById('open2').style.visibility='visible';
}
function open1()
{
	document.getElementById('a_star_popup').style.display='block';
	document.getElementById('open2').style.visibility='hidden';
}

</script>
<body  style='background-color:rgb(238,238,238)'>
	<h1 align='center'>A* Search Algorithm</h1>
<br>
<img src='weights graph_2.png' id='i2' style='margin-left:140px; height:60%; width:80%;'>
<br><br>
	<br>
	<center><button type="button" id='open2' onclick='open1()' style='visibility:hidden;'>Open</button></center>
	<br>
<?php

session_start();
$l2=array();
$l1=array();
for($i=0;$i<$_SESSION['e'];$i++)
{
    $s=$_POST["src$i"];
    $d=$_POST["dst$i"];
    $w=$_POST["wht$i"];
    array_push($l1,$s);
    array_push($l1,$d);
    array_push($l1,$w);
    array_push($l2,$l1);
    $l1=array();
}
#print_r($l2);
#echo "<br><br>";
$hv=[5,6,8,5,4,15,0];
array_push($hv,0);
#print_r($hv);
#echo "<br><br>";
$v=array();
for($i=0;$i<$_SESSION['v'];$i++)
{
	array_push($v,$i);
}
$m=$v[0];
$a_star=array();
$k=0;
for($i=0;$i<count($l2);$i++)
{
	if($l2[$i][0]==$m)
	{
		array_push($a_star,$l2[$i]);
		$a_star[$k][2]=$a_star[$k][2]+$hv[$a_star[$k][1]];
		$k=$k=1;
	}
}

#print_r($a_star);
#echo "<br><br>";
#print_r($l2);


for($u=0;$u<count($a_star)+1;$u++)
{
	#echo "<br><br>";
	#print_r($a_star);

	$mini=$a_star[0];
	$min1=$a_star[0][count($a_star[0])-1];
	$k=0;
	//echo "<br>$min1<br>";
	for($j=0;$j<count($a_star);$j++)
	{
		if($a_star[$j][count($a_star[$j])-1]<$min1)
		{
			$min1=$a_star[$j][2];
			$mini=$a_star[$j];
			$k=$j;
		}
	}
	$kkk=$mini;
	array_pop($mini);
	//echo "<br>$k<br>$min1<br>";
	#print_r($mini);
	//echo "<br><br>";
	//print_r($a_star);
	for($g=0;$g<count($l2);$g++)
	{
		if($l2[$g][0]==$mini[count($mini)-1])
		{
			$nini=$mini;
			$sum=0;
			array_push($nini,$l2[$g][1]);
			//echo "<br><br>";
			//print_r($nini);
			for($z=0;$z<count($nini)-1;$z++)
			{
				for($g1=0;$g1<count($l2);$g1++)
				{
					if($l2[$g1][0]==$nini[$z] && $l2[$g1][1]==$nini[$z+1])
					{
						$sum=$sum+$l2[$g1][2];
						//echo "<br>Sum is ".$sum;
					}
				}
			}
			$sum=$sum+$hv[$nini[count($nini)-1]];
			array_push($nini,$sum);
			array_push($a_star,$nini);
		}
	}
	unset($a_star[$k]);
	$a_star=array_merge($a_star);
	//print_r($a_star);
}
#echo "<br><br>";
#print_r($mini);
#echo "<br><br>";
#print_r($min1);
#echo "<br><br>";
#print_r($l2);

#$l2[0]=$mini;



?>

<div id='a_star_popup'>
	<table align='center' cellpadding=2px>
		<tr>
		<td align='center'><img src='inside_gmaps.jpg' style='width:180px; height:140px'></td>
	</tr>
		<tr>
			<td align='center'>
	<?php echo "<br><h2 style='color:red'>Shortest Distance";?></td></tr>
	<tr><td align='center'><h2 style='color:green; font-size:23'>
<?php
#print_r($l2);
for($i=0;$i<count($kkk)-2;$i++)
{
	echo $kkk[$i]," --- ";
}
echo $kkk[$i];
?></span></td></tr>
<tr><td align='center'><h2 style='color:blue; font-size:22'>Total Distance <?php echo $kkk[$i];?></td></tr>

	<tr><td>
		<center><button type='button' onclick='back1()' id='back1'>Back</button></center><br></td></tr>
	</table>
</div>
<br><br><br>
    <div id="runner"></div>
    <div id="road"></div>
    <img src="grocery_store.jpg" style="margin-left: 20%; width: 140px; height: 120px;">
    <img src="hotel.jpg" style="margin-left: 20%; width: 150px; height: 120px;">
    <img src="college.jpg" style="margin-left: 20%; width: 150px; height: 120px;">
    <br><br>
    <center><p style="font-size: 30px; color: red;"><b>Thank You!!!&#128522;<br><br>
    Now, you can proceed using our website......<br><br>
    <a href="Home.html"><input type="button" style="width: 120px; height: 50px; background-color: #05a3ff; border: none; font-size: 17px; color: white;" value="Back"></a></b></p></center>
</body>
</html>