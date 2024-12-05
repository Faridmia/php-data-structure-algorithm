<?php 
   echo "<style>
   .box {
       width: 50px; 
       height: 50px;
       display: inline-block;
       text-align: center;
       vertical-align: middle;
       line-height: 50px; 
       border: 1px solid black; 
       margin: 2px;
   }
   .row {
       display: block;
   }
</style>";

for ($row = 1; $row <= 10; $row++) {
    echo "<div class='row'>"; 
    
    for ($col = 1; $col <= 10; $col++) {
        $p = $col * $row; 
        echo "<div class='box'>$p</div>"; 
    }
    
    echo "</div>"; 
}

?>