<!--VIEW CHARACTER SHEET MODAL-->
<div class="modal fade" id="characterSheetModal" tabindex="-2" role="dialog" aria-labelledby="characterSheetModal" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">

      <div class="modal-body">
        <div class='container-fluid'>

          <div class='characterSheet my-4'>
            <div class='row'>
              <div class='col pt-2'><h4 class='text-center'><strong>DEMOGRAPHIC INFORMATION</strong></h4></div>
            </div>

            <!--DEMOGRAPHIC INFO-->
            <div class='row'>
              <div class='col-12 py-1'>
                <img src='../img/misc/picSlot.png' class='img-fluid h-100 mx-auto d-block' id='characterPic'>
              </div>
            </div>

            <div class='row'>
              <div class='col-12 col-sm-6 col-md-3 py-1'><h6 class='pt-3 text-center'><strong>NAME:</strong></h6></div>
              <div class='col-12 col-sm-6 col-md-3 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="CharacterName" class="form-control border text-center demographic px-0" value="" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-1'><h6 class='pt-3 text-center'><strong>BACKGROUND:</strong></h6></div>
              <div class='col-12 col-sm-6 col-md-3 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Background" class="form-control border text-center demographic px-0" value="" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-1'><h6 class='pt-3 text-center'><strong>HABITAT:</strong></h6></div>
              <div class='col-12 col-sm-6 col-md-3 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Habitat" class="form-control border text-center demographic px-0" value="" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-1'><h6 class='pt-3 text-center'><strong>ETHNICITY:</strong></h6></div>
              <div class='col-12 col-sm-6 col-md-3 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ethnicity" class="form-control border text-center demographic px-0" value="" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-1'><h6 class='pt-3 text-center'><strong>AGE:</strong></h6></div>
              <div class='col-12 col-sm-6 col-md-3 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Age" class="form-control border text-center demographic px-0" value="" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-1'><h6 class='pt-3 text-center'><strong>SEX:</strong></h6></div>
              <div class='col-12 col-sm-6 col-md-3 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Sex" class="form-control border text-center demographic px-0" value="" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-1'><h6 class='pt-3 text-center'><strong>HAIR STYLE:</strong></h6></div>
              <div class='col-12 col-sm-6 col-md-3 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="HairStyle" class="form-control border text-center demographic px-0" value="" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-1'><h6 class='pt-3 text-center'><strong>HAIR COLOR:</strong></h6></div>
              <div class='col-12 col-sm-6 col-md-3 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="HairColor" class="form-control border text-center demographic px-0" value="" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-1'><h6 class='pt-3 text-center'><strong>FACIAL HAIR:</strong></h6></div>
              <div class='col-12 col-sm-6 col-md-3 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="FacialHair" class="form-control border text-center demographic px-0" value="" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-1'><h6 class='pt-3 text-center'><strong>EYE COLOR:</strong></h6></div>
              <div class='col-12 col-sm-6 col-md-3 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="EyeColor" class="form-control border text-center demographic px-0" value="" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-1'><h6 class='pt-3 text-center'><strong>EXP POOL:</strong></h6></div>
              <div class='col-12 col-sm-6 col-md-3 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="RemainingExp" class="form-control border text-center experience demographic px-0" value="" readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-3 py-1'><h6 class='pt-3 text-center'><strong>TOTAL EXP:</strong></h6></div>
              <div class='col-12 col-sm-6 col-md-3 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="TotalExp" class="form-control border text-center demographic px-0" value="" readonly />
                </div>
              </div>
            </div>
            <hr />

            <div class='row'>
              <div class='col py-1'><h4 class='text-center'><strong>MENTAL TRAITS</strong></h4></div>
            </div>

            <div class='row no-gutters'>
              <div class='col-6 col-sm-3 col-md-2 py-1'><h6 class='pt-3 text-center'><strong>MEM:</strong></h6></div>
              <div class='col-6 col-sm-3 col-md-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Memory" class="form-control border text-center trait px-0" value="" readonly />
                </div>    
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1'><h6 class='pt-3 text-center'><strong>WILL:</strong></h6></div>
              <div class='col-6 col-sm-3 col-md-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Willpower" class="form-control border text-center trait px-0" value="" readonly />
                </div>    
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1'><h6 class='pt-3 text-center'><strong>LOG:</strong></h6></div>
              <div class='col-6 col-sm-3 col-md-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Logic" class="form-control border text-center trait px-0" value="" readonly />
                </div>    
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1'><h6 class='pt-3 text-center'><strong>PER:</strong></h6></div>
              <div class='col-6 col-sm-3 col-md-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Perception" class="form-control border text-center trait px-0" value="" readonly />
                </div>    
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1 offset-sm-6 offset-md-4'><h6 class='pt-3 text-center'><strong>CHA:</strong></h6></div>
              <div class='col-6 col-sm-3 col-md-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Charisma" class="form-control border text-center trait px-0" value="" readonly />
                </div>    
              </div>
            </div>
            <hr />

            <div class='row'>
              <div class='col py-1'><h4 class='text-center'><strong>PHYSICAL TRAITS</strong></h4></div>
            </div>

            <div class='row no-gutters'>
              <div class='col-6 col-sm-3 col-md-2 py-1'><h6 class='pt-3 text-center'><strong>STR:</strong></h6></div>
              <div class='col-6 col-sm-3 col-md-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Strength" class="form-control border text-center trait px-0" value="" readonly />
                </div>    
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1'><h6 class='pt-3 text-center'><strong>SPD:</strong></h6></div>
              <div class='col-6 col-sm-3 col-md-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Speed" class="form-control border text-center trait px-0" value="" readonly />
                </div>    
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1'><h6 class='pt-3 text-center'><strong>END:</strong></h6></div>
              <div class='col-6 col-sm-3 col-md-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Endurance" class="form-control border text-center trait px-0" value="" readonly />
                </div>    
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1'><h6 class='pt-3 text-center'><strong>AGL:</strong></h6></div>
              <div class='col-6 col-sm-3 col-md-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Agility" class="form-control border text-center trait px-0" value="" readonly />
                </div>    
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1 offset-sm-6 offset-md-4'><h6 class='pt-3 text-center px-0'><strong>BTY:</strong></h6></div>
              <div class='col-6 col-sm-3 col-md-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Beauty" class="form-control border text-center trait px-0" value="" readonly />
                </div>
              </div>
            </div>
            <hr />

            <div class='row no-gutters'>
              <div class='col-6 col-sm-3 col-lg-2 py-1'><h6 class='pt-3 text-center'><strong>ACTIONS:</strong></h6></div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Actions" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'><h6 class='pt-3 text-center'><strong>SEQUENCE:</strong></h6></div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Sequence" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'><h6 class='pt-3 text-center'><strong>GAMBLE:</strong></h6></div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Gambling" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'><h6 class='pt-3 text-center'><strong>OFF HAND:</strong></h6></div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="OffHand" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'><h6 class='pt-3 text-center'><strong>BLOCK:</strong></h6></div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Block" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'><h6 class='pt-3 text-center'><strong>DODGE:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Dodge" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
            </div>
            <hr/>

            <div class='row'>
              <div class='col py-1'><h4 class='text-center'><strong>COMBAT SKILLS</strong></h4></div>
            </div>

            <div class='row no-gutters'>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>UNARM:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Unarmed" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>GRAPPLE:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Grapple" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
                <h6 class='pt-3 text-center'><strong>SHIELD:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Shield" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>SHORT:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="ShortWeapons" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>LONG:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="LongWeapons" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>2 HAND:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="TwoHandWeapons" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 offset-sm-6 offset-lg-4'>
                <h6 class='pt-3 text-center'><strong>CHAIN:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="ChainWeapons" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
            </div>
            <hr />

            <div class='row no-gutters'>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>THROWN:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Thrown" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>ARCHERY:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Archery" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
                <h6 class='pt-3 text-center'><strong>SPECIAL:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="SpecialWeapons" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>PISTOLS:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Pistols" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>RIFLES:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Rifles" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>BURST:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Burst" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 offset-sm-6 offset-lg-4'>
                <h6 class='pt-3 text-center'><strong>WPN SYS:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="WeaponSystems" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
            </div>
            <hr/>

            <div class='row'>
              <div class='col py-1'><h4 class='text-center'><strong>SURVIVAL SKILLS</strong></h4></div>
            </div>

            <div class='row no-gutters'>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>ENV AWARE:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="EnvAware" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>SURVEY:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Surveillance" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
                <h6 class='pt-3 text-center'><strong>NAVIG:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Navigation" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>PRESERVE:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Preservation" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>FISH:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Fishing" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>TRAPS:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Trapping" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>TRACK:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Tracking" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 offset-lg-4'>
                <h6 class='pt-3 text-center'><strong>1ST AID:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="FirstAid" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
            </div>
            <hr/>

            <div class='row'>
              <div class='col'><h4 class='text-center'><strong>COVERT SKILLS</strong></h4></div>
            </div>

            <div class='row no-gutters'>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>STEALTH:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Stealth" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>CONCEAL:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Concealment" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
                <h6 class='pt-3 text-center'><strong>SLEIGHT:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Sleight" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>LOCKPICK:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Lockpick" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>FORGERY:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Forgery" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>CRYPTO:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Cryptography" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>DISGUISE:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Disguise" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 offset-lg-4'>
                <h6 class='pt-3 text-center'><strong>RESTRAINT:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Restraints" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
            </div>
            <hr/>

            <div class='row'>
              <div class='col'><h4 class='text-center'><strong>TECHNOLOGY SKILLS</strong></h4></div>
            </div>

            <div class='row no-gutters'>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>CRAFT:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Crafting" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>COMPUTER:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Computers" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
                <h6 class='pt-3 text-center'><strong>PROGRAM:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Programming" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>RADIOS:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Radios" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>NETWORKS:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Networks" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>MECHANIC:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Mechanics" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>ELECTRIC:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Electrical" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>CIRCUITRY:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Circuitry" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>EXPLOSIVE:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Explosives" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>CONSTRUCT:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Construction" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 offset-sm-6 offset-lg-4'>
                <h6 class='pt-3 text-center'><strong>ARCHIT:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Architecture" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
            </div>
            <hr/>

            <div class='row'>
              <div class='col'><h4 class='text-center'><strong>TRANSPORTATION SKILLS</strong></h4></div>
            </div>

            <div class='row no-gutters'>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>SKATE:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Skateboard" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>BICYCLE:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Bicycle" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
                <h6 class='pt-3 text-center'><strong>HORSE:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Horsemanship" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>AUTOS:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Automobile" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>MOTOR-X:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Motorcycle" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>JET SKI:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="JetSki" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>SAILING:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Sailing" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>BOATING:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Boating" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>MX GEAR:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="MultiGear" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>HVY EQUIP:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="HeavyEquip" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>HELIS:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Helicopters" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>PLANES:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Airplanes" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
            </div>
            <hr/>

            <div class='row'>
              <div class='col'><h4 class='text-center'><strong>SCIENCE SKILLS</strong></h4></div>
            </div>

            <div class='row no-gutters'>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>HISTORY:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="History" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>FOREN:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Forensics" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
                <h6 class='pt-3 text-center'><strong>BIOLOGY:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Biology" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
                <h6 class='pt-3 text-center'><strong>BOTANY:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Botany" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>CHEMISTRY:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Chemistry" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>MYCO:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Mycology" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>TOXIC:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Toxicology" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>PHARMA:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Pharmacology" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>SURGERY:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Surgery" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 offset-lg-4'>
                <h6 class='pt-3 text-center'><strong>MEDICINE:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Medicine" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
            </div>
            <hr/>

            <div class='row'>
              <div class='col'><h4 class='text-center'><strong>SOFT SKILLS</strong></h4></div>
            </div>

            <div class='row no-gutters'>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>NEGOT:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Negotiation" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>GUILE:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Guile" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
                <h6 class='pt-3 text-center'><strong>ETIQ:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Etiquette" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1 '>
                <h6 class='pt-3 text-center'><strong>ANIMALS:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Animals" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>APPRAISE:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Appraisal" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1 my-1'>
                <h6 class='pt-3 text-center'><strong>LEGAL:</strong></h6>
              </div>
              <div class='col-6 col-sm-3 col-lg-2 py-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Legal" class="form-control border text-center px-0" value="" readonly />
                </div>
              </div>
            </div>
            <hr />

            <div class='row'>
              <div class='col'><h4 class='text-center'><strong>LANGUAGES</strong></h4></div>
            </div>

            <div class='row no-gutters'>
              <div class='col-6 col-sm-3 col-md-2 offset-md-2 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="SecondLanguage" class="form-control border text-center langSlot px-0" data-target='lang1Value' value="" readonly /> 
                </div>
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="SecondLang" class="form-control border text-center px-0" value="" readonly />
                </div>    
              </div>          
              <div class='col-6 col-sm-3 col-md-2 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="ThirdLanguage" class="form-control border text-center langSlot px-0" data-target='lang2Value' value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="ThirdLang" class="form-control border text-center px-0" value="" readonly />
                </div>    
              </div>
              <div class='col-6 col-sm-3 col-md-2 offset-md-2 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="FourthLanguage" class="form-control border text-center langSlot px-0" data-target='lang3Value' value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="FourthLang" class="form-control border text-center px-0" value="" readonly />
                </div>    
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1 my-1'>
                <div class="input-group input-group-lg">
                 <input type="text" id="FifthLanguage" class="form-control border text-center langSlot px-0" data-target='lang4Value' value="" readonly />
                </div>
              </div>
              <div class='col-6 col-sm-3 col-md-2 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="FifthLang" class="form-control border text-center px-0" value="" readonly />
                </div>    
              </div>
            </div>
            <hr />

            <div class='row'>
              <div class='col'><h4 class='text-center'><strong>COMBAT ABILITIES</strong></h4></div>
            </div>

            <div class='row'>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability1" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability2" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability3" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability4" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability5" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability6" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability7" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability8" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability9" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability10" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability11" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability12" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability13" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability14" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 col-lg-3 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability15" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
              <div class='col-12 col-sm-6 col-md-4 offset-md-4 col-lg-3 offset-lg-0 py-1 my-1'>
                <div class="input-group input-group-lg">
                  <input type="text" id="Ability16" class="form-control border text-center abilitySlot px-0" value='' readonly />
                </div>
              </div>
            </div>

          </div><!--END CHARACTER SHEET-->
        </div><!--END CONTAINER-FLUID-->
      </div><!--END MODAL-BODY-->

      <div class="modal-footer">
        <div class='col'></div>
        <div class='col'>
          <button type="button" class="btn btn-danger btn-lg btn-block border" data-dismiss="modal">CLOSE</button>
        </div>
        <div class='col'></div>
      </div>

    </div><!--END MODAL-CONTENT-->
  </div><!--END MODAL-DIALOG-->
</div><!--END MODAL-FADE-->