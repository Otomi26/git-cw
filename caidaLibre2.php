
<?php

    const GRAVEDAD = 32;
    $tablaTDV = [];

    //calcula dictancia
    function calcDistancia ($tiempo, $veli)
    {
        $dist = 0.5*GRAVEDAD*pow($tiempo, 2);
        return $dist;
    }
    
    //calcula velocidad final
    function calcVelocidad ($tiempo, $veli)
    {
        $velf = $veli+GRAVEDAD*$tiempo;
        return $velf;
    }

    function generaTabla ()
    {
        global $tablaTDV;
        $tiempo =0.0;
        for ($t = 1; $t<=10; $t++)
        {
            $tiempo=$tiempo+1.0;
            $tablaTDV[$t-1][0]=$tiempo;
            $tablaTDV[$t-1][1]=calcDistancia($tablaTDV[$t-1][0],0);
            $tablaTDV[$t-1][2]=calcVelocidad($tablaTDV[$t-1][0],0);
        }

    }

    $col;
    $t = 0;
    generaTabla();
    echo "<html>";
    echo "<link rel='stylesheet' href='tablaphp1.css'>";
    echo "<table>";
        echo "<caption>Caida Libre</caption>";
        echo"<thead>";
            echo"<tr>";
                echo "<th>Tiempo (seg) </th>";
                echo "<th>Posición final</th>";
                echo "<th>Velocidad final ft/s </th>";
            echo "</tr>";
        echo"</thead>";
        echo "<tbody>";
            for ($t = 1; $t<=10; $t++)
            {
                echo"<tr>";
                    if($t<10)
                    {
                    for ($col =0; $col < 3; $col ++)
                    {
                    
                        if($col==2)
                        {
                            if($tablaTDV[$t][2]>250)
                                echo "<td id=exceso>Exceso</td>";
                            else
                                echo "<td>".$tablaTDV[$t][2]."</td>";
                        }
                        else
                        echo "<td>".$tablaTDV[$t][$col]."</td>";
                    }
                    }
                echo "</tr>";
            
            }   
           
        echo "</tbody>";
    echo "</table>";
    echo "</html>";

?>