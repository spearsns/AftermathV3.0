<!--VIEW ID MARKS MODAL-->

<div class="modal fade" id="idMarksModal" tabindex="-1" role="dialog" aria-labelledby="idMarksModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      
      <form id="IDMarksForm" method="post" action="../inc/updateIDMarks.php">
      
        <div class="modal-body">
          <div class='container-fluid'>
            <div class='row'>
              <div class='col'>
                <div class="input-group input-group-lg">
                  <input type="hidden" name="CharacterID" id='CharacterID' value="" />
                </div>
              </div>
            </div>

            <div class='row'>

              <!--LEFT SIDE-->
                <div class='col-12 col-lg-4'>
                  <div class='row'>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>HAIR STYLE:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="HairStyle" id="HairStyle" class="form-control border text-center idMarks" value="" readonly />
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>HEAD:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="Head" id="Head" class="form-control border text-center idMarks" value='' readonly />
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>NECK:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="Neck" id="Neck" class="form-control border text-center idMarks" value='' readonly />
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>LEFT SHOULDER:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="LShoulder" id="LShoulder" class="form-control border text-center idMarks" value='' readonly />
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>LEFT RIBS:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="LRibs" id="LRibs" class="form-control border text-center idMarks" value='' readonly />
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>LEFT BICEP:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="LBicep" id="LBicep" class="form-control border text-center idMarks" value='' readonly />
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0 px-0'><p class='mb-0 TNR text-center idMarks'>LOWER BACK:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="LowerBack" id="LowerBack" class="form-control border text-center idMarks" value='' readonly />
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>LEFT FOREARM:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="LForearm" id="LForearm" class="form-control border text-center idMarks" value='' readonly />
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>REAR:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="Rear" id="Rear" class="form-control border text-center idMarks" value='' readonly />
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>LEFT HAND:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="LHand" id="LHand" class="form-control border text-center idMarks" value='' readonly />
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>LEFT THIGH:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="LThigh" id="LThigh" class="form-control border text-center idMarks" value='' readonly />
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>LEFT CALF:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="LCalf" id="LCalf" class="form-control border text-center idMarks" value='' readonly />
                      </div>
                    </div>
                    <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>LEFT FOOT:</p></div>
                    <div class='col-12 col-sm-6 col-lg-12'>
                      <div class="input-group input-group-lg">
                        <input type="text" name="LFoot" id="LFoot" class="form-control border text-center idMarks" value='' readonly />
                      </div>
                    </div>
                  </div>
                </div>

                  <!--CENTER-->
                  <div class='col-lg-4 d-none d-lg-block px-0 pt-4 pb-0'>
                    <img src='../img/virtruvian/sketchyvirtruvian.jpg' class='img-fluid h-100' />
                  </div>
                
                  <!--R SIDE-->
                  <div class='col-12 col-lg-4'>
                    <hr class='d-lg-none' />
                    <div class='row'>
                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>FACIAL HAIR:</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" name="FacialHair" id="FacialHair" class="form-control border text-center idMarks" value='' readonly />
                        </div>
                      </div>
                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>FACE:</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" name="Face" id="Face" class="form-control border text-center idMarks" value='' readonly />
                        </div>
                      </div>
                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>&nbsp;</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" class="form-control border text-center idMarks invisible" readonly />
                        </div>
                      </div>
                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>RIGHT SHOULDER:</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" name="RShoulder" id="RShoulder" class="form-control border text-center idMarks" value='' readonly />
                        </div>
                      </div>
                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>RIGHT RIBS:</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" name="RRibs" id="RRibs" class="form-control border text-center idMarks" value='' readonly />
                        </div>
                      </div>
                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>RIGHT BICEP:</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" name="RBicep" id="RBicep" class="form-control border text-center idMarks" value='' readonly />
                        </div>
                      </div>

                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>STOMACH:</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" name="Stomach" id="Stomach" class="form-control border text-center idMarks" value='' readonly />
                        </div>
                      </div>
                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>RIGHT FOREARM:</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" name="RForearm" id="RForearm" class="form-control border text-center idMarks" value='' readonly />
                        </div>
                      </div>
                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>GROIN:</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" name="Groin" id="Groin" class="form-control border text-center idMarks" value='' readonly />
                        </div>
                      </div>
                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>RIGHT HAND:</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" name="RHand" id="RHand" class="form-control border text-center idMarks" value='' readonly />
                        </div>
                      </div>
                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0 px-0'><p class='mb-0 TNR text-center idMarks'>RIGHT THIGH:</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" name="RThigh" id="RThigh" class="form-control border text-center idMarks" value='' readonly />
                        </div>
                      </div>
                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>RIGHT CALF:</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" name="RCalf" id="RCalf" class="form-control border text-center idMarks" value='' readonly />
                        </div>
                      </div>
                      <div class='col-12 col-sm-6 col-lg-12 py-sm-3 py-lg-0'><p class='mb-0 TNR text-center idMarks'>RIGHT FOOT:</p></div>
                      <div class='col-12 col-sm-6 col-lg-12'>
                        <div class="input-group input-group-lg">
                          <input type="text" name="RFoot" id="RFoot" class="form-control border text-center idMarks" value='' readonly />
                        </div>
                      </div>

                  </div>
                </div>

            </div>
          </div>

        <div class="modal-footer">

          <div class='col'></div>
          <div class='col' id='closeBtn'>
            <button type="button" class="btn btn-danger btn-lg btn-block border" data-dismiss="modal">CLOSE</button>
          </div>
          <div class='col' id='deathToggle'></div>

        </div>

      </form>
    </div>
  </div>
</div>
</div>