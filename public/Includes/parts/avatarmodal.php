<?php

global $context;

$data = $context->data;

?>
<style>
    #dropArea {
            /* width: 300px; */
            height: 100px;
            border: 2px dashed #ccc;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
        }
        #dropArea.dragover {
            background-color: #e0f7fa;
        }
        #imageContainer {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }
        .previewImage {
            max-width: 100px;
            max-height: 100px;
            border-radius: 50%;
            margin-left: auto!important;
    margin-right: auto!important;
        }
</style>

<div class="modal fade text-left modal-borderless" id="avatarModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body text-center">
                <form action="updateImage" method="POST" enctype="multipart/form-data" id="avatarForm">
                <div id="dropArea" ondrop="handleDrop(event)" ondragover="handleDragOver(event)" ondragleave="handleDragLeave(event)">
                    <p>Drag and drop files here or click to select files</p>
                    <input type="text" id="user_id" name="user_id" hidden value="<?php echo $data['user_id'];?>">
                    <input type="file" id="fileInput" name="fileInput" style="display: none;" multiple accept=".png, .img, jpeg, jpg">
                </div>
                </form>
                <div class="m-3 mx-auto">
                <div id="imageContainer"></div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal" id="avatarModalCancel">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Cancel</span>
                </button>
                <button type="button" class="btn btn-danger ml-1" data-bs-dismiss="modal" id="avatarModalAccept" >
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Accept</span>
                </button>
            </div>
        </div>
    </div>
</div>

