<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <nav>
            <li><a href="<?php echo BASE_URL;?>">INICIO</a></li>
            <li><a href="<?php echo BASE_URL;?>/galeria">GALERIA</a></li>
        </nav>
        
       <?php $this->loadViewInTemplate($viewFile, $viewData);?>
        
        
    </body>
</html>
