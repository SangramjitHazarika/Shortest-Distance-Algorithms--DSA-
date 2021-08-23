<html>
    <head>
        <title>Bellman Result</title>
    </head>
    <body style="background-color: lightyellow;">
        <?php
    if(isset($_POST['calculate']))
    {
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
                        <center><a href='bellman.php'><input type='button' style='width: 120px; height: 50px; background-color: #05a3ff; border: none; font-size: 17px; color: white;' value='Back'></a></center>";
                    return;
                }
            }
            ?>
            <center><h1> Result</h1></center><br>
            <center><h1>Shortest Distance when <?php echo $s_v ?> is taken as the Source Vertex</h1></center><br><br>
            <center><table style="border:3px solid black; box-shadow: 3px 6px #888888; text-align: center; width: 50%; height: 20%;">
            <tr>
                <th style="border: 1px solid black; padding: 38px; font-size: 20px; text-align: center; background-color: brown; color: white;">Source</th>
                <th style="border: 1px solid black; padding: 38px; font-size: 20px; text-align: center; background-color: brown; color: white;">Destination</th>
                <th style="border: 1px solid black; padding: 38px; font-size: 20px; text-align: center; background-color: brown; color: white;">Distance</th>
            </tr>
            <?php
            for($i=0; $i<$vertices; $i++)
            {
                ?><tr><td style="border: 1px solid black; padding: 38px; font-size: 18px; text-align: center;"><?php
                print($s_v);?></td>
                <td style="border: 1px solid black; padding: 38px; font-size: 18px; text-align: center;"><?php print($i);?></td>
                <td style="border: 1px solid black; padding: 38px; font-size: 18px; text-align: center;"><?php
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
                    $l[$i][$j]=$_POST['source'.$i];
                }
                else if($j==1)
                {
                    $l[$i][$j]=$_POST['destination'.$i];
                }
                else
                {
                    $l[$i][$j]=$_POST['weights'.$i];
                }
            }
        }

        bellman_ford($l, $vertices, $edges,$s_v);
        
    }
    ?>
    </body>
    </html>

