<!DOCTYPE html>
<html>
<head>
<style>
h1 {
  animation: color-change 2s infinite;
}

.exception
{
    background-color: brown;
    color: white;
    border-radius: 20px;
    width: 100px;
    height: 50px;
}

#type1
{
    width:250px;
    height:21px;
    border:0;
    outline:0;
    background:transparent;
    border-bottom:3px solid black;
    font-size:15px;
}

.exception:hover
{
    background-color: blue;
    color: white;
}

body
{
    color: #654321 ;
    font-size: 18px;
}

@keyframes color-change {
  10% { color: red; }
  30% { color: blue; }
  80% { color: green; }
  100% {color: orange; }
}
</style>
</head>
<body style="background-color: orange">

<center><h1>Bellman Ford Algorithm</h1></center>
<br><br>
<center>
    <form method="post" action="bellman.php">
    <table>
    <tr>
            <td><b>Vertices: </b></td>
            <td><input type="text" id='type1' placeholder="Enter the number of vertices" name="no_of_vertices" value="<?php echo isset($_POST['submitted']) ? $_POST['no_of_vertices'] : '' ?>" size="25"></td>
    </tr>
    <tr>     
            <td><b>Edges: </b></td>
            <td><input type="text" id='type1' placeholder="Enter the number of edges" name="no_of_edges" value="<?php echo isset($_POST['submitted']) ? $_POST['no_of_edges'] : '' ?>" size="25"></td>
        </tr>
        <tr>     
            <td><b>Source Vertex: </b></td>
            <td><input type="text" id='type1' placeholder="Enter the source vertex" name="source_vertex" value="<?php echo isset($_POST['submitted']) ? $_POST['source_vertex'] : '' ?>" size="25"></td>
        </tr></table>
        <br><input type="submit" class="exception" name= "submitted" value="Add" style="border: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="home_bellman.php"><input type="button" class="exception" value="Back" style="border: none;"></a>
        
    </form>
</center>
    <br><center>
    <?php 
    if(isset($_POST['submitted']))
    {
            $edge=$_POST['no_of_edges'];
            $vertices=$_POST['no_of_vertices'];
            $s_v=$_POST['source_vertex'];
            ?>
            <form action="bellman_result.php" method="post">
            <?php 
            for ($i = 0; $i < $edge ; $i++) 
            {?>
                    <b>Edge <?php echo $i+1 ?>: </b>&nbsp; &nbsp;<input type="text" id='type1' placeholder="Enter source" name="source<?php echo $i ?>"/> &nbsp; &nbsp;
                    <input type="text" id='type1' placeholder="Enter destination" name="destination<?php echo $i ?>"/> &nbsp; &nbsp;
                    <input type="text" id='type1' placeholder="Enter weights" name="weights<?php echo $i ?>"/>
                    <br><br><?php
            }?>
            <br>
            <input type="hidden" name="edge" value="<?php echo $edge ?>">
            <input type="hidden" name="vertices" value="<?php echo $vertices ?>">
            <input type="hidden" name="source_vertex" value="<?php echo $s_v ?>">
            <input type="submit" class="exception" name="calculate" value="Calculate" style="border: none;"/>
            </form><?php    
    } 
    ?></center>
</body>
</html>