
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

    generaTabla();

    echo "________________________________________________________\n";
    echo "|Tiempo (seg)\t|Posición final\t|Velocidad final (ft/s)\t|\n";
    echo "________________________________________________________\n";
   
    $col;
    $t = 0;
    while ($t<10)
    {
        for ($col =0; $col < 3; $col ++)
        {
            if($col==2)
                if($tablaTDV[$t][2]>250)
                    echo"|\t Exceso ";
                else
                    printf("|\t %2.0f\t", $tablaTDV[$t][2]);
            else
                printf("|\t %2.0f\t", $tablaTDV[$t][$col]);  
        }
        echo "\t|\n";
        $t++;
    }

    echo "__________________________________________________________\n";


?>