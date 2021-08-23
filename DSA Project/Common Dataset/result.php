<!DOCTYPE html>
<html>
<head>
	<title>Result</title>
</head>

<style>
	#astar:hover
	{
		background-color:white;
		border:none;
	}
	#t1
	{
		border:4px solid black;
		background-color:#ffffff;
		border-collapse:collapse;
		box-shadow: 5px 7px #888888;
		width:40%;
	}
	th,td
	{
		font-size:20;
		width:20%;
	}
	th
	{
		background-color:brown;
		color:white;
		border:1px solid black;
	}
/* #t1
{
    background-color:black; 
    height:34px;
    margin-bottom:-2225px;
    margin-left:-15px;
    margin-right:-15px;
    width:1130px;
    padding:2.5px;
    border:none;
    border-radius:10px;
    } */
    td:hover
    {
    	background-color:black;
    	color:white;
    	border:1px solid black;
    	font-weight:bold;
    }
    #bel:hover
    {
    	background-color:yellow;
    	border:1px solid yellow;
    	font-weight:bold;
    	color:black;
    }
    #bel
    {
    	background-color: white;
    }
    th:hover
    {
    	background-color:green;
    	color:white;
    	border:2px solid black;
    	font-weight:bold;
    }

    #close1,#open1,#sub
    {
    	height:40px;
    	width:100px;
    	background-color:blue;
    	border-radius:5px;
    	color:white;
    	font-size:18;
    	border-color:blue;
    }
    #sub:hover,#close1:hover,#open1:hover
    {
    	background-color:darkblue;
    	border-color:darkblue;
    }
    #close1
    {
    	display:none;
    }
        #back5:hover
{
	background-color: darkorange;
	border-color: darkorange;
}
#back5
{
	background-color:#e6b800;
	border-color: #e6b800;
	height:25px;
	color:white;
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
    height:50%;
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
	function open2()
	{
		document.getElementById('open1').style.display='none';
		document.getElementById('close1').style.display='block';
		document.getElementById('details').style.display='block';
	}
	function close2()
	{
		document.getElementById('open1').style.display='block';
		document.getElementById('close1').style.display='none';
		document.getElementById('details').style.display='none';
	}

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
<body>

<body style='background-color: lightyellow;'>

<?php

//echo isset($_POST['edges1'])+2;

// echo isset($_POST['edges2'])+3;

// echo isset($_POST['edges3'])+4;


if(isset($_POST['edges1']))
{
	//Floydd?>
	<h1 align='center'>Floydd Warshall Algorithm</h1>
	<br><?php
	session_start();
	echo "<center><img src='$_SESSION[i]' alt='Try with your example'></center>";
	$l1=array();
	$l=array();
	$l2=array();
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
//print_r($l2);
	$l1=array();
	$l=array();
	for($i=0;$i<$_SESSION['v'];$i++)
	{
		for($j=0;$j<$_SESSION['v'];$j++)
		{
			$c=0;
			for($k=0;$k<count($l2);$k++)
			{
				if($l2[$k][0]==$i && $l2[$k][1]==$j)
				{
					$c=1;
					$d=$l2[$k][2];
					break;
				}
			}
			if($c==1)
			{
				array_push($l1,$d);
			}
			else if($i==$j)
			{
				array_push($l1,0);
			}
			else
			{
				array_push($l1,9999);
			}   
		}
		array_push($l,$l1);
		$l1=array();
	}
	echo "<br>";
//print_r($l);
	echo "<br><h2 align='center'>Adjacency matrix of the above graph</h2>";
	?>
	<table align='center' cellpadding=20px border=1px id='t1'>
		<tr>
			<td></td>
			<?php
			for($i=0;$i<$_SESSION['v'];$i++)
			{
				?>
				<th><?php echo $i;?></td><?php
			}
			?>
		</tr>
		<?php
		for($i=0;$i<$_SESSION['v'];$i++)
		{
			?>
			<tr><th align='center'><?php echo $i;?></td>
				<?php
				for($j=0;$j<$_SESSION['v'];$j++)
				{
					if($l[$i][$j]!=9999)
					{
						?>
						<td align='center'><?php echo ($l[$i][$j]);?></td><?php
					}
					else
					{
						?><td align='center'><?php echo "INF";?></td><?php
					}
				}
				?></tr>
				<?php
			}
			?>
		</table>
		<br><br><br>
		<center><button type='button' onclick='open2()' id='open1'>Show</button></center>
		<center><button type='button' onclick='close2()' id='close1'>Close</button></center>

		<div id='details' style='display:none'>
			<?php
			for($k=0;$k<$_SESSION['v'];$k++)
			{
				for($i=0;$i<$_SESSION['v'];$i++)
				{
					for($j=0;$j<$_SESSION['v'];$j++)
					{
						if($l[$i][$k]+$l[$k][$j]<$l[$i][$j])
						{
							$l[$i][$j]=$l[$i][$k]+$l[$k][$j];
						}
					}
				}
				echo "<br><br><h2><center>Shortest Distance considering $k as the intermediate vertex</center><br><br>";?>
				<table align='center' cellpadding=20px id='t1' border=1px>
					<tr>
						<td></td>
						<?php
						for($i=0;$i<$_SESSION['v'];$i++)
						{
							?>
							<th><?php echo $i;?></td><?php
						}
						?>
					</tr>
					<?php
					for($i=0;$i<$_SESSION['v'];$i++)
					{
						?>
						<tr><th align='center'><?php echo $i;?></td>
							<?php
							for($j=0;$j<$_SESSION['v'];$j++)
							{
								if($l[$i][$j]!=9999)
								{
									?>
									<td align='center'><?php echo ($l[$i][$j]);?></td><?php
								}
								else
								{
									?><td align='center'><?php echo "INF";?></td><?php
								}
							}
							?></tr>
							<?php
						}
						?>
					</table>

					<?php
				}
				?>
			</div>
			<br>

			<?php
			echo "<br><h2 align='center'>Adjacency matrix of the above graph which gives the shortest distance between each and every vertex</h2>";?>
			<table align='center' cellpadding=20px id='t1' border=1px>
				<tr>
					<td></td>
					<?php
					for($i=0;$i<$_SESSION['v'];$i++)
					{
						?>
						<th><?php echo $i;?></td><?php
					}
					?>
				</tr>
				<?php
				for($i=0;$i<$_SESSION['v'];$i++)
				{
					?>
					<tr><th align='center'><?php echo $i;?></td>
						<?php
						for($j=0;$j<$_SESSION['v'];$j++)
						{
							if($l[$i][$j]!=9999)
							{
								?>
								<td align='center'><?php echo ($l[$i][$j]);?></td><?php
							}
							else
							{
								?><td align='center'><?php echo "INF";?></td><?php
							}
						}
						?></tr>
						<?php
					}
					?>

				</table>
				<br><br>
				<center><?php echo "<a href='common.php?i=abc.png'><button type='button' id='back5'>Back</button></a>";?></center><br>
				<?php
			}
			else if(isset($_POST['edges2']))
			{
				//Bellman
				if(isset($_POST['edges2']))
				{
					//echo isset($_POST['calculate']);
					function bellman_ford($l, $vertices, $edges, $s_v)
					{        
						$dist = [];
						for($i=0;$i<$vertices;$i++)
						{
							$dist[$i]=INF;
						}
						$dist[$s_v] = 0;
						for($relax=0; $relax<=$vertices-2; $relax++) 
						{
							for($e=0; $e<$edges; $e++)
							{
								if($dist[$l[$e][0]] != INF && $dist[$l[$e][0]] + $l[$e][2] < $dist[$l[$e][1]])
								{
									$dist[$l[$e][1]] = $dist[$l[$e][0]] + $l[$e][2];
								}
							}
						}


						for($n_e=0; $n_e<$edges; $n_e++)
						{
							if($dist[$l[$n_e][0]] != INF && $dist[$l[$n_e][0]] + $l[$n_e][2] < $dist[$l[$n_e][1]])
							{
								echo "<script>alert('Sorry!!! Graph contains negative weight cycle');</script><br><br><br>
								<center><a href='common.php?i=abc.png'><input type='button' style='width: 120px; height: 50px; background-color: #05a3ff; border: none; font-size: 17px; color: white;' value='Back'></a></center>";
								return;
							}
						}
						?>
						<center><h1> Result</h1></center><br>
						<center><h1>Shortest Distance when <?php echo $s_v ?> is taken as the Source Vertex</h1></center><br><br>
						<center><table style="border:3px solid black; box-shadow: 3px 6px #888888; text-align: center; width: 50%; height: 20%; border-collapse: collapse;">
							<tr>
								<th style="border: 1px solid black; padding: 38px; font-size: 20px; text-align: center; background-color: brown; color: white;">Source</th>
								<th style="border: 1px solid black; padding: 38px; font-size: 20px; text-align: center; background-color: brown; color: white;">Destination</th>
								<th style="border: 1px solid black; padding: 38px; font-size: 20px; text-align: center; background-color: brown; color: white;">Distance</th>
							</tr>
							<?php
							for($i=0; $i<$vertices; $i++)
							{
								?><tr><td id='bel' style="border: 1px solid black; padding: 38px; font-size: 18px; text-align: center;"><?php
								print($s_v);?></td>
								<td id='bel' style="border: 1px solid black; padding: 38px; font-size: 18px; text-align: center;"><?php print($i);?></td>
								<td id='bel' style="border: 1px solid black; padding: 38px; font-size: 18px; text-align: center;"><?php
								print($dist[$i]);?></td></tr><?php
                // echo "<br/>";
							}
							?></table></center><?php
						}



						$l = [];
						$edges=$_POST['edge'];
						$vertices=$_POST['vertices'];
						$s_v=$_POST['source_vertex'];
						for($i=0;$i<$edges;$i++)
						{
							for($j=0;$j<3;$j++)
							{
								if($j==0)
								{
									$l[$i][$j]=$_POST['src'.$i];
								}
								else if($j==1)
								{
									$l[$i][$j]=$_POST['dst'.$i];
								}
								else
								{
									$l[$i][$j]=$_POST['wht'.$i];
								}
							}
						}

						bellman_ford($l, $vertices, $edges,$s_v);

					}?>
					<br><br>
				<center><?php echo "<a href='common.php?i=abc.png'><button type='button' id='back5'>Back</button></a>";?></center><br><?php

				}
				else if(isset($_POST['edges3']))
				{?>
					
					<h1 align='center'>A* Search Algorithm</h1>

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
			<td align='center'id='astar'>
	<?php echo "<br><h2 style='color:red'>Shortest Distance";?></td></tr>
	<tr><td id='astar' align='center'><h2 style='color:green; font-size:23'>
<?php
#print_r($l2);
for($i=0;$i<count($kkk)-2;$i++)
{
	echo $kkk[$i]," --- ";
}
echo $kkk[$i];
?></span></td></tr>
<tr><td id='astar' align='center'><h2 style='color:blue; font-size:22'>Total Distance <?php echo $kkk[$i];?></td></tr>

	<tr><td id='astar'>
		<center><?php echo "<a href='common.php?i=abc.png'><button type='button' id='back1'>Back</button></a>";?></center><br></td></tr>
	</table>
</div>
<br>
<?php
				}






				?>