<?php
echo "<table class='column'>";
        echo "<tr>";
        echo "<td><h3>MESA {$mesa['id_mesa']}</h3></td>";
        echo "</tr>";
        
        echo "<tr>";
        echo "<td><p>{$mesa['tipo_ubi']}</p></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><p>Nº Sillas {$mesa['num_silla_dispo']}</p></td>";
        echo "</tr>";

        echo "<tr>";
        if ($mesa['reservada']==1) {
            echo "<td><p>OCUPADA</p></td>";
        }else {
            echo "<td><p>LIBRE</p></td>";
        }
        echo "</tr>";