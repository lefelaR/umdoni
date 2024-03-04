<?php
global $context;
$data = $context->data;
$crumbs = getCrumbs();
?>

<div class="row">
    <h1>
        Permissions
    </h1>
</div>

<div class="col-md-12 order-md-2 order-first">
    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
        <ol class="breadcrumb">
            <?php
            foreach ($crumbs as $key => $crumb) {
                if ($key == (count($crumbs) - 1)) {
                    $active = 'active';
                    echo ' <li class="breadcrumb-item ' . $active . '" aria-current="page">' . $crumb . '</li>  ';
                } else {
                    $active = '';
                    echo '<li class="breadcrumb-item ' . $active . '" aria-current="page">' . $crumb . '</li>';
                }
            }
            ?>
        </ol>
    </nav>
</div>
</div>