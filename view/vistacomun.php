<?php
echo "<table class='column'>";
        echo "<tr>";
        echo "<td><h3>MESA {$mesa['id_mesa']}</h3></td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td><p>Nº Sillas {$mesa['num_silla_dispo']}</p></td>";
        echo "</tr>";

        echo "<tr>";
        if ($mesa['reservada']==1) {
            echo "<td><b><p class='ocupada'>OCUPADA</p></b></td>";
        }else {
            echo "<td><b><p class='libre'>LIBRE</p></b></td>";
        }
        echo "</tr>";