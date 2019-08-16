<div class="modal fade" id="gameMapModal" tabindex="-1" role="dialog" aria-labelledby="gameMapModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
            
      <div class="modal-body">
        <div class='container-fluid'>

          <div class='row'>
            <div class='col py-1'>
              <div id='mapSlot' class='border'>
                <img src='../img/misc/grid.png' class='img-fluid h-100 w-100 d-block'>
              </div>
            </div>
          </div>

          <form id="mapForm" method="post" action="../inc/processGameMap.php" enctype='multipart/form-data'>
            <div class='row d-none' id='updateMapRow'>
              <div class='col-md-1 col-lg-2'></div>
              <div class='col-12 col-sm-8 col-md-6 col-lg-5 py-1'>
                <div class='input-group input-group-lg border rounded'>
                  <div class='custom-file'>
                    <input type='file' name='image' class='custom-file-input' id='uploadImage' accept='image/*' />
                    <label class='custom-file-label' for='image'>Choose file...</label>
                  </div>
                </div>
                </div>
                <div class='col-12 col-sm-4 col-md-4 col-lg-3 py-1'>
                  <button type='submit' class='btn btn-success btn-lg btn-block border'>UPLOAD</button>
                </div>
                <div class='col-md-1 col-lg-2'></div>
              </div>
          </form>

            <div class='row d-none' id='updateMapError'>
              <div class='col text-center' id='mapErrorLog'></div>
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