<html>
<head>
<title>Floydd Warshall</title>
</head>
<style>
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
</script>
<body style="background-color:#eeeeee">
<br>
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
<center><?php echo "<a href='F_11.php?i=$_SESSION[i]'><button type='button' id='sub'>Back</button></a>";?></center>
<br><br>
