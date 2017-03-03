<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 11-Jan-17
 * Time: 12:57
 */
?>
<!DOCTYPE>
<html>

<head>
    <?php include_once("views/includes/head.inc.php");?>
    <title>Plateau96</title>
</head>



<body>
<div id="wrapper">
    <header>
        <!---MENU----->
        <?php include_once("views/includes/menu.inc.php");?>
        <!---/MENU----->
    </header>
    <div id="page-wrapper">
        <div class="container-fluid">


 <?php echo $content?>



        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</div>
<!-- /#wrapper -->



<!-- Bootstrap Core JavaScript -->
<script src="views/resource/js/bootstrap.min.js"></script>
<script charset="utf8" src="views/resource/js/jquery.tablesorter.js"></script>
<script type="text/javascript">/* applique le script sur tout les tables*/
    $(document).ready(function()
        {
            $("table").tablesorter();
        }
    );
</script>

<!-- Morris Charts JavaScript -->
<script src="views/resource/js/plugins/morris/raphael.min.js"></script>
<script src="views/resource/js/plugins/morris/morris.min.js"></script>
<script src="views/resource/js/plugins/morris/morris-data.js"></script>
</body>

</html>