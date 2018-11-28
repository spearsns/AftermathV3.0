<div class="modal fade" id="confirmCloseModal" tabindex="-4" role="dialog" aria-labelledby="adminModal" aria-hidden="true">
  <div class="modal-dialog modal modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <div class='container-fluid'>
          <div class='row'>

            <div class='col'>
              <h4 class='TNR text-center'>ARE YOU CERTAIN YOU WANT TO END THIS GAME?</h4>              
            </div>

          </div>
        </div>
      </div>

      <div class="modal-footer">
        <div class='col'>
          <button type="button" class="btn btn-success btn-lg btn-block border" id='yesCloseBtn' data-reference='<?php echo $gameID ?>'>YES</button>
        </div>

        <div class='col'>
          <button type="button" class="btn btn-danger btn-lg btn-block border" id='noCloseBtn'>NO</button>
        </div>
      </div>

    </div>
  </div>
</div>