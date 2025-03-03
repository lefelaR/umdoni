<?php

global $context;
if (!is_null($context->data))
    $data = $context->data;


$crumbs = getCrumbs();

echo '
<div class="row">
    <h1>
       Add Document
    </h1>
    <div class="col-12 col-md-12 order-md-2 order-first">
        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
            <ol class="breadcrumb">
            ';

foreach ($crumbs as $key => $crumb) {
    if ($key == (count($crumbs) - 1)) {
        $active = 'active';
        echo ' <li class="breadcrumb-item ' . $active . '" aria-current="page">' . $crumb . '</li>  ';
    } else {
        $active = '';
        echo '<li class="breadcrumb-item ' . $active . '" aria-current="page">Add</li>';
    }
}
echo '   
            </ol>
        </nav>
    </div>
</div>';

if (isset($data[0]['id'])) {
    $id =  $data[0]['id'];
    $action = 'update';
} else {
    $id = '';
    $action = 'save';
}
$title = (isset($data[0]['title'])) ? $data[0]['title'] : '';
$subtitle = (isset($data[0]['subtitle'])) ? $data[0]['subtitle'] : '';
$body = (isset($data[0]['body'])) ? $data[0]['body'] : '';
$category = (isset($data[0]['category'])) ? $data[0]['category'] : '';

echo '
<div class="card">
    <div class="card-header">
        <h4 class="card-title">Add a Document</h4>
    </div>
    <form class="form" action="' . $action . '" method="post" enctype="multipart/form-data">
        <div class="card-body">
            <div class="row">
            <div class="col-md-6">
            <input type="hidden"  id="id" name="id" value="' . $id . '" >
                <div class="form-group">
                    <label for="basicInput">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="' . $title . '">
                </div>

                <div class="form-group">
                    <label for="helperText">Subtitle</label>
                    <input type="text" id="subtitle" name="subtitle" class="form-control" value="' . $subtitle . '">
                </div>
                <div class="col-md-6">
                        <div class="form-group">
                                <fieldset class="form-group">
                                <select class="form-select" id="category" name="category" value="' . $category . '">
                                    <option value="NL" class="text-uppercase">Newsletters</option>
                                    <option value="AR" class="text-uppercase">Annual Reports</option>
                                    <option value="WP" class="text-uppercase">Ward Profiles</option>
                                    <option value="IDP"class="text-uppercase">IDP</option>
                                    <option value="PB" class="text-uppercase">Policies & Bylaws</option>
                                    <option value="BR" class="text-uppercase">Budget & Reporting</option>
                                    <option value="VR" class="text-uppercase">Valuation Roll</option>
                                    <option value="IA" class="text-uppercase">Internal Audit</option>
                                    <option value="CM" class="text-uppercase">Council Minuts</option>
                                    <option value="SDA" class="text-uppercase">Service Delivery Agreements</option>
                                    <option value="LED" class="text-uppercase">LED</option>
                                    <option value="SDBIP" class="text-uppercase">SDBIP</option>
                                    <option value="PAF" class="text-uppercase">Perfomance Agreement</option>
                                </select>
                            </fieldset>    
                        </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <input type="file" class="form-control text-black" id="image" name="name" aria-describedby="inputGroupFileAddon04" aria-label="Upload" value="" accept="application/pdf>
                </div>
            </div>

                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea type="text" name="body" class="form-control text-black" id="body" value="' . $body . '" rows="3">
                    '.$body.'
                    </textarea>
                </div>

                <div id="editor"></div>
            <button class="btn btn-primary btn-lg">
            submit
        </button>
        </div>
            </div>
        </div>
    </form>
</div>';
