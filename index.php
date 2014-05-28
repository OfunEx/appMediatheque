<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="CSS/style.css" rel="stylesheet" type="text/css"/>

        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.4.custom.js"></script>
        <script type="text/javascript" src="js/jquery-ui-1.10.4.custom.min.js"></script>
        <link href="CSS/custom-theme/jquery-ui-1.10.4.custom.css" rel="stylesheet">
        <title>AppMediatheque</title>
    </head>
    <body>
        <?php

            session_start();
//            var_dump($_GET);

            if (!empty($_GET['page0']) && is_file('controleurs/'.$_GET['page0'].'.php')){

                include 'controleurs/'.$_GET['page0'].'.php';
            }
            elseif (!empty($_GET['page1']) && is_file('controleurs/'.$_GET['page1'].'.php')){

                include 'controleurs/'.$_GET['page1'].'.php';
            }
            elseif (!empty($_GET['page2']) && is_file('controleurs/'.$_GET['page2'].'.php')){

                include 'controleurs/'.$_GET['page2'].'.php';
            }
            elseif (!empty($_GET['page']) && is_file('controleurs/'.$_GET['page'].'.php')){
                
                include 'controleurs/'.$_GET['page'].'.php';
            }
            else{
                session_destroy();
                include 'controleurs/accueil.php';
            }
        ?>
    </body>
</html>
