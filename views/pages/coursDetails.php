<?php
/**
 * Created by IntelliJ IDEA.
 * User: Tatar
 * Date: 14-Mar-17
 * Time: 12:31
 */
?>
<section class="row">
    <article class="col-xl-12 col-lg-12">
        <h2 class="pages-header">Ateliers 2016-2017</h2>
        <ol class="breadcrumb">
            <li>
                <i class="fa fa-dashboard"></i>
                <a href="?pages=ateliers2016_2017">Tranche Age</a>
            </li>
            <?php
             if($cours instanceof Categorie){
                 echo '<li>
                        <i class="fa fa-dashboard"></i>
                        <a href="?pages=ateliers2016_2017&ta=2">Sous Categories</a>
                      </li>';
             }
            ?>
            <li class="active">
                <i class="fa fa-table"></i>
                Details Cours
            </li>
        </ol>
        <hr class="featurette-divider">
    </article>
</section>

<section class="row">

    <?php
     var_dump($cours);
    ?>

</section>