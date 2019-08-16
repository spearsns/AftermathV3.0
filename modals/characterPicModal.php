<div class="modal fade" id="characterPicModal" tabindex="-6" role="dialog" aria-labelledby="characterPicModal" aria-hidden="true">
  <div class="modal-dialog modal modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <div class='container-fluid'>
          <div class='row'>
            <div class='col py-1'>
              <div class='border'>
                <img src='img/misc/picSlot.png' class='img-fluid h-100 w-100 mx-auto d-block' id='charPicPreview'>
              </div>
            </div>
          </div>

          <form id="charPicForm" method="post" action="inc/processCharPic.php" enctype='multipart/form-data'>
            <div class='row d-none'>
              <div class='col'>
                <input type='text' name='characterName' id='characterName' value='<?php echo $characterName; ?>'>
              </div>
            </div>

            <div class='row'>
              <div class='col-12 col-sm-8 py-1'>
                <div class='input-group input-group-lg border rounded'>
                  <div class='custom-file'>
                    <input type='file' name='image' class='custom-file-input' id='uploadImage' accept='image/*' />
                    <label class='custom-file-label' for='image'>Choose file...</label>
                  </div>
                </div>
                </div>
                <div class='col-12 col-sm-4 py-1'>
                  <button type='submit' class='btn btn-success btn-lg btn-block border'>UPLOAD</button>
                </div>
              </div>
          </form>

            <div class='row'>
              <div class='col text-center' id='charPicErrorLog'></div>
            </div>

        </div>

        <div class="modal-footer">
          <div class='col'></div>
          <div class='col'>
            <button type="button" class="btn btn-danger btn-lg btn-block border" data-dismiss="modal">CLOSE</button>
          </div>
          <div class='col'></div>
        </div>

      </div>
    </div>
  </div>
</div>