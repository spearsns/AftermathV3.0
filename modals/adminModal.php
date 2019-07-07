<div class="modal fade" id="adminModal" tabindex="-3" role="dialog" aria-labelledby="adminModal" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <div class='container-fluid'>

<!--OUTPUT-->
          <div class='row black py-2'>
            <div class='col-3-lg'></div>
            <div class='col-6-lg'><h4 style='color: red;' id='adminLog' class='text-center TNR'>&nbsp;</h4></div>
            <div class='col-3-lg'></div>
          </div>
<!--GAME NAME-->
          <div class='row black'>
            
            <div class='col-md-12 col-lg'>
              <img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/GameName.png" />
            </div>

            <div class='col-md-6 col-lg'>
              <div class="input-group input-group-lg">
                <input type="text" id="currentGName" class="form-control border text-center" readonly />
              </div>
            </div>
            
            <div class='col-md-6 col-lg'>
              <div class="input-group input-group-lg">
                <input type="text" id="newGName" class="form-control border text-center" />
              </div>
            </div>
            
            <div class='col-md-12 col-lg'>
              <button type="button" class="btn btn-success btn-lg btn-block border" id='updateGNameBtn'>UPDATE</button>
            </div>

          </div>
<!--GAME DESCRIPTION-->
          <div class='row black'>
            <div class='col-lg'><img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/description1.png" /></div>
            <div class='col-lg'></div>
            <div class='col-lg'></div>
            <div class='col-lg'></div>
          </div>

          <div class='row black'>
            <div class='col-lg py-1'>
              <div class="input-group input-group-lg">
                <textarea class='form-control' id="currentGDesc" rows='4' readonly></textarea>
              </div>
            </div>

            <div class='col-lg py-1'>
              <div class="input-group input-group-lg">
                <textarea class='form-control' id="newGDesc"  rows='4'></textarea>
              </div>
            </div>
          </div>

          <div class='row black'>
            <div class='col-lg'></div>
            <div class='col-lg'></div>
            <div class='col-lg'></div>
            <div class='col-lg'>
              <button type="button" class="btn btn-success btn-lg btn-block border" id='updateGDescBtn'>UPDATE</button>
            </div>
          </div>
<!--STORYTELLER PASSWORD-->
          <div class='row black'>
            <div class='col-md-12 col-lg-3'><img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/StorytellerPassword.png" /></div>

            <div class='col-md-12 col-lg-6'>
              <div class="input-group input-group-lg">
                <input type="text" id="currentSTPass" class="form-control border text-center" readonly/>
              </div>
            </div>           
            <div class='col-md-12 col-lg-3'></div>
          </div>
<!--CONFIRM STORYTELLER PASSWORD-->
          <div class='row black'>
            <div class='col-md-12 col-lg'><img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/newPW.png" /></div>
            <div class='col-md-6 col-lg'>
              <div class="input-group input-group-lg">
                <input type="text" id="newSTPass" class="form-control border text-center" />
              </div>
            </div>
            <div class='col-md-6 col-lg'>
              <div class="input-group input-group-lg">
                <input type="text" id="confirmSTPass" class="form-control border text-center" />
              </div>
            </div>
            <div class='col-md-12 col-lg'>
              <button type="button" class="btn btn-success btn-lg btn-block border" id='updateSTPassBtn'>UPDATE</button>
            </div>
          </div>
<!--PLAYER PASSWORD-->
          <div class='row black'>
            <div class='col-lg-3'><img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/playerPassword.png" /></div>
            <div class='col-lg-6'>
              <div class="input-group input-group-lg">
                <input type="text" id="currentPPass" class="form-control border text-center" readonly />
              </div>
            </div>
            <div class='col-lg-3'></div>
          </div>
<!--CONFIRM PLAYER PASSWORD-->
          <div class='row black'>
            <div class='col-lg'><img class='img-fluid h-100 mx-auto d-block' src="img/graffiti/newPW.png" /></div>
            <div class='col-lg'>
              <div class="input-group input-group-lg">
                <input type="text" id="newPPass" class="form-control border text-center" />
              </div>
            </div>
            <div class='col-lg'>
              <div class="input-group input-group-lg">
                <input type="text" id="confirmPPW" class="form-control border text-center" />
              </div>
            </div>
            <div class='col-lg'>
              <button type="button" class="btn btn-success btn-lg btn-block border" id='updatePPassBtn' >UPDATE</button>
            </div>
          </div>

<!--CLOSE GAME-->
          <div class='row black py-2'>
            <div class='col-lg-3'></div>
            <div class='col-lg-6'><button type="button" class="btn btn-warning btn-lg btn-block border" id='endGameBtn'>END GAME</button></div>
            <div class='col-lg-3'></div>
          </div>

      <div class="modal-footer">
        <div class='col-lg'></div>
        <div class='col-lg'>
          <button type="button" class="btn btn-danger btn-lg btn-block border" id='adminCloseBtn' data-dismiss='modal'>CANCEL</button>
        </div>
        <div class='col-lg'></div>
      </div>

        </div>
      </div>
    </div>
  </div>
</div>