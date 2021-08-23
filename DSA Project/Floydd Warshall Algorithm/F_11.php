<html>
    <head>
        <title>Floydd Warshall</title>
</head>
<style>
/*img
{
    height:60%;
    width:40%;
}*/
#sub1
{
    height:40px;
    width:100px;
    background-color:blue;
    border-radius:5px;
    color:white;
    font-size:18;
    border-color:blue;
}
#sub3
{
    height:40px;
    width:100px;
    background-color:green;
    border-radius:5px;
    color:white;
    font-size:18;
    border-color:green;
}
#sub3:hover
{
    background-color:darkgreen;
    border-color:darkgreen;
    font-weight:bold;
}
#sub1
{
    height:40px;
    width:100px;
    background-color:blue;
    border-radius:5px;
    color:white;
    font-size:18;
    border-color:blue;
}
#sub2
{
    height:40px;
    width:280px;
    background-color:blue;
    border-radius:5px;
    color:white;
    font-size:18;
    border-color:blue;
}
#sub1:hover,#sub2:hover
{
    background-color:darkblue;
    border-color:darkblue;
    font-weight:bold;
}
#type1
{
	width:250px;
	height:21px;
	border:0;
	outline:0;
	background:transparent;
	border-bottom:3px solid black;
	font-size:18px;
}
</style>
<script>
function t2()
{
    document.getElementById('t21').style.display='none';
}
</script>
<body style='background-color:#eeeeee'>
<br>
<h1 align='center'>Floydd Warshall Algorithm</h1>
<br>
<center><img src="<?php echo $_GET['i'];?>" alt='Try with your example'></center>

<br><br>
<div id='t21'>
<form method='POST' action=''>
    <table align='center' border=0px>
        <tr>
            <td>
    <input type='int' id='type1' name='vertex' placeholder='Enter vertices'>
</td>
<td>
    <input type='int' id='type1' name='edge' placeholder='Enter edges'></td>
</tr>
<tr>
    <td colspan=2 align='center'>
    <br><input type='submit' id='sub1' name='sub' value='Weights'></td>
</tr>
</table>
</form>
</div>


<?php
session_start();
$_SESSION['i']=$_GET['i'];
if(isset($_POST['sub']))
{
?>
<script>t2()</script>
<?php

    $v=$_POST['vertex'];
    $e=$_POST['edge'];
    $_SESSION['v']=$v;
    $_SESSION['e']=$e;
    
    ?>
    <form method='POST' action='F_22.php'>
        <table align='center' cellpadding=20px id='t1' border=0px>
        <?php
        echo "<h2 align='center'>Enter the source, destination and edge values</h2>";
            for($i=0;$i<$e;$i++)
            {
                ?><tr><td>
                <input id='type1' type='int' name='src<?php echo $i?>' placeholder='enter source'></td>
                <td><input id='type1' type='int' name='dst<?php echo $i?>' placeholder='enter destination'></td>
                <td><input id='type1' type='int' name='wht<?php echo $i?>' placeholder='weight'></td>
            </tr>
                <?php
            echo "<br>";    
        }
            
        ?>
        <tr>
            <td colspan=3 align='center'>
        <input id='sub2' type='submit' name='edges' value='Floydd Warshall Algorithm'></td></tr>
    </table>
    </form>
    <?php
}
?>
<br>
<br><br>
<center><?php echo "<a href='home_floydd.php'><button type='button' id='sub3'>Back</button></a>";?></center>
<br><br>
</body>
</html>







