<div class="modal fade" id="adminModal" tabindex="-3" role="dialog" aria-labelledby="adminModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <div class='container-fluid'>

<!--OUTPUT-->
          <div class='row black py-2'>
            <div class='col-3'></div>
            <div class='col-6'><h4 style='color: red;' id='adminLog' class='text-center TNR'>&nbsp;</h4></div>
            <div class='col-3'></div>
          </div>

          <div class='row black'>
            <div class='col'></div>

            <div class='col'>
              <h4 style='color: white;' class='TNR text-right font-weight-bold'>CURRENT:<h4>
            </div>
            <div class='col'>
              <h4 style='color: white;' class='TNR text-center font-weight-bold'>NEW:<h4>
            </div>
            <div class='col'></div>
          </div>
<!--GAME NAME-->
          <div class='row black'>
            <div class='col'><img class='d-block img-fluid' src="img/graffiti/GameName.png" /></div>

            <div class='col'>
              <div class="input-group input-group-lg">
                <input type="text" id="currentGName" class="form-control border text-center" readonly />
              </div>
            </div>
            <div class='col'>
              <div class="input-group input-group-lg">
                <input type="text" id="newGName" class="form-control border text-center" />
              </div>
            </div>
            <div class='col'>
              <button type="button" class="btn btn-success btn-lg btn-block border" id='updateGNameBtn'>UPDATE</button>
            </div>
          </div>
<!--GAME DESCRIPTION-->
          <div class='row black'>
            <div class='col'><img class='d-block img-fluid' src="img/graffiti/description1.png" /></div>
            <div class='col'></div>
            <div class='col'></div>
            <div class='col'></div>
          </div>

          <div class='row black py-1'>
            <div class='col'>
              <div class="input-group input-group-lg">
                <textarea class='form-control' id="currentGDesc" rows='4' readonly></textarea>
              </div>
            </div>

            <div class='col'>
              <div class="input-group input-group-lg">
                <textarea class='form-control' id="newGDesc"  rows='4'></textarea>
              </div>
            </div>
          </div>

          <div class='row black'>
            <div class='col'></div>
            <div class='col'></div>
            <div class='col'></div>
            <div class='col'>
              <button type="button" class="btn btn-success btn-lg btn-block border" id='updateGDescBtn'>UPDATE</button>
            </div>
          </div>
<!--STORYTELLER PASSWORD-->
          <div class='row black'>
            <div class='col'><img class='d-block img-fluid' src="img/graffiti/StorytellerPassword.png" /></div>

            <div class='col'>
              <div class="input-group input-group-lg">
                <input type="text" id="currentSTPass" class="form-control border text-center" readonly/>
              </div>
            </div>
            <div class='col'>
              <div class="input-group input-group-lg">
                <input type="text" id="newSTPass" class="form-control border text-center" />
              </div>
            </div>
            <div class='col'></div>
          </div>
<!--CONFIRM STORYTELLER PASSWORD-->
          <div class='row black'>
            <div class='col'><img class='d-block img-fluid' src="img/graffiti/STConfirmPassword.png" /></div>

            <div class='col'></div>
            <div class='col'>
              <div class="input-group input-group-lg">
                <input type="text" id="confirmSTPass" class="form-control border text-center" />
              </div>
            </div>
            <div class='col'>
              <button type="button" class="btn btn-success btn-lg btn-block border" id='updateSTPassBtn'>UPDATE</button>
            </div>
          </div>
<!--PLAYER PASSWORD-->
          <div class='row black'>
            <div class='col'><img class='d-block img-fluid' src="img/graffiti/playerPassword.png" /></div>

            <div class='col'>
              <div class="input-group input-group-lg">
                <input type="text" id="currentPPass" class="form-control border text-center" readonly />
              </div>
            </div>
            <div class='col'>
              <div class="input-group input-group-lg">
                <input type="text" id="newPPass" class="form-control border text-center" />
              </div>
            </div>
            <div class='col'></div>
          </div>
<!--CONFIRM PLAYER PASSWORD-->
          <div class='row black'>
            <div class='col'><img class='d-block img-fluid' src="img/graffiti/PConfirmPassword.png" /></div>
            <div class='col'></div>
            <div class='col'>
              <div class="input-group input-group-lg">
                <input type="text" id="confirmPPW" class="form-control border text-center" />
              </div>
            </div>
            <div class='col'>
              <button type="button" class="btn btn-success btn-lg btn-block border" id='updatePPassBtn' >UPDATE</button>
            </div>
          </div>

<!--CLOSE GAME-->
          <div class='row black py-2'>
            <div class='col-3'></div>
            <div class='col-6'><button type="button" class="btn btn-warning btn-lg btn-block border" id='endGameBtn'>END GAME</button></div>
            <div class='col-3'></div>
          </div>

      <div class="modal-footer">
        <div class='col'></div>
        <div class='col'>
          <button type="button" class="btn btn-danger btn-lg btn-block border" id='adminCloseBtn' data-dismiss='modal'>CANCEL</button>
        </div>
        <div class='col'></div>
      </div>

        </div>
      </div>
    </div>
  </div>
</div>