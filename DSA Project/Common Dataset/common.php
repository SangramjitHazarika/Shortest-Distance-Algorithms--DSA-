<html>
    <head>
        <title>Shortest Path Algorithm</title>
</head>
<style>
/*img
{
    height:60%;
    width:40%;
}*/
h1 {
  animation: color-change 2s infinite;
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
    width:250px;
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
@keyframes color-change {
  10% { color: red; }
  30% { color: blue; }
  80% { color: green; }
  100% {color: brown; }
}
</style>
<script>
function t2()
{
    document.getElementById('t21').style.display='none';
}
</script>
<body style='background-color:orange'>
<br>
<h1 align='center'>Shortest Path Algorithm</h1>

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
<td>
    <input type='int' id='type1' name='source_vertex' placeholder='Enter source vertex'></td>
</tr>
<tr>
    <td colspan=3 align='center'>
    <br><input type='submit' id='sub1' name='sub' value='Weights'></td>
</tr>
</table>
</form>
</div>


<?php
session_start();if(isset($_POST['sub']))
{
?>
<script>t2()</script>
<?php

    $v=$_POST['vertex'];
    $e=$_POST['edge'];
    $_SESSION['v']=$v;
    $_SESSION['e']=$e;
    $s_v=$_POST['source_vertex'];
    
    ?>
    <form method='POST' action='result.php'>
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
            <td align='center'>
        <input id='sub2' type='submit' name='edges1' value='Floydd Warshall Algorithm'></td>
    <td align='center'>
            <input type="hidden" name="edge" value="<?php echo $e; ?>">
            <input type="hidden" name="vertices" value="<?php echo $v; ?>">
            <input type="hidden" name="source_vertex" value="<?php echo $s_v; ?>">
        <input id='sub2' type='submit' name='edges2' value='Bellman Ford Algorithm'></td>
    <td align='center'>
        <input id='sub2' type='submit' name='edges3' value='A* Search Algorithm'></td></tr>
    </table>
    </form>
    <?php
}
?>
<br>
<br><br>
<center><?php echo "<a href='home.html'><button type='button' id='sub3'>Back</button></a>";?></center>
<br><br>
</body>
</html>







