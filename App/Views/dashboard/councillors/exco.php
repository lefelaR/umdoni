<?php
global $context;
$data = $context->data;

$crumbs =  getCrumbs();

echo '
<div class="row">
    <h1>
        Exco Memebers
    </h1>
    <div class="col-12 col-md-12 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">';
            

foreach ($crumbs as $key => $crumb) {
    if ($key == (count($crumbs) - 1)) {
        $active = 'active';
        echo ' <li class="breadcrumb-item" ' . $active . ' aria-current="page">' . $crumb . '</li>  ';
    } else {
        $active = '';
        echo '<li class="breadcrumb-item ' . $active . '" aria-current="page">'.$crumb.'</li>';
    }
}
echo '
            </ol>
        </nav>
    </div>
</div>';
?>
<div class="row">
    <div class="col-md">
        <section class="section">
            <div class="card">
                <div class="card-header">
                 
                    <p class="card-title fw-light">Councillor Member List</p>
                    <div class="float-start float-lg-end">
                        <a class="btn btn-sm" href="<?php echo buildurl("dashboard/councillors/addexco") ?>" role="button">
                            <i class="bi bi-plus"></i> Add
                        </a>
                        <button class="btn  btn-sm">
                            <i class="bi bi-download"></i> Save
                        </button>
                    </div>
                </div>
                <?php include('Includes/parts/alerts.php') ?>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>-</th>
                                <th>NAME</th>
                                <th>MIDDLE NAME</th>
                                <th>SURNAME</th>
                                <th>TELEPHONE</th>
                                <th>EMAIL</th>
                                <th>POSITION</th>
                                <th>CATEGORY</th>
                                <th>WARD</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody id="list">
                            <?php
                            foreach ($data as $key => $exco) {
                                $key++;
                                echo '
                                <tr>
                                    <td>
                                        <div class="avatar me-3">
                                            <img src="' . $exco['location'] . '" alt="avatar" >
                                        </div>
                                    </td>
                                    <td>' . $exco['name'] . '</td>
                                    <td>' . $exco['middlename'] . '</td>
                                    <td>' . $exco['surname'] . '</td>
                                    <td>' . $exco['telephone'] . '</td>
                                    <td>' . $exco['email'] . '</td>
                                    <td>' . $exco['title'] . '</td>
                                    <td>' . $exco['category'] . '</td>
                                    <td>' . $exco['ward'] . '</td>
                                    <td>
                                    <a class="btn  btn-sm" href="addexco?id=' .  $exco['id'] . '">
                                    <i class="bi bi-pencil"></i>
                                    </a>
                                    <a class="btn btn-sm" id="deleteexco"  [id=' . $exco['id'] . ']  href="deleteexco?id=' .  $exco['id'] . '"onclick="handleDelete(event, '.$exco['id'].')">
                                     <i class="bi bi-trash"></i>
                                </a>
                                    </td>
                                </tr>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
    </div>
    </section>
</div>
</div>

<script>
    document.querySelectorAll('#list').addEventListener('click', (ev)=>{
debugger
    })
</script>