
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
        margin-left: auto !important;
        margin-right: auto !important;
    }
</style>

<div class="modal fade text-left modal-borderless" id="userStatusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-body ">

            <div>
                <p class="fw-bold">
                    Lock or unlock user
                </p>
            </div>
            
            <div class="divider "></div>
                <div class="form-check form-switch">
                    <label class="form-check-label" for="flexSwitchCheckChecked">
                        Locked    
                    </label>
                    <input class="form-check-input" type="checkbox" name="switch" id="userStatusSwitch">
                </div>
            </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="userStatusModalCancel">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
             
            </div>
        </div>
    </div>
</div>