<!--VIEW CHARACTER SHEET MODAL-->
      <div class="modal fade" id="characterSheetModal" tabindex="-2" role="dialog" aria-labelledby="characterSheetModal" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
          <div class="modal-content">

            <div class="modal-body">
              <div class='container-fluid'>

                <div class='characterSheet my-4'>
                  <br />
                  <br />
                  <div class='row no-gutters'>
                    <div class='col'><h4 class='TNR text-center'><u>DEMOGRAPHIC INFORMATION</u></h4></div>
                  </div>

                  <!--DEMOGRAPHIC INFO-->
                      <div class='row no-gutters'>
                        <div class='col-2'><p class='pt-2 TNR text-center'>NAME:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="CharacterName" class="form-control border text-center demographic" value="" readonly />
                          </div>
                        </div>
                        <div class='col-2'><p class='pt-2 TNR text-center'>BACKGROUND:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="Background" class="form-control border text-center demographic" value="" readonly />
                          </div>
                        </div>
                      </div>

                      <div class='row no-gutters'>
                        <div class='col-2'><p class='pt-2 TNR text-center'>HABITAT:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="Habitat" class="form-control border text-center demographic" value="" readonly />
                          </div>
                        </div>
                        <div class='col-2'><p class='pt-2 TNR text-center'>ETHNICITY:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="Ethnicity" class="form-control border text-center demographic" value="" readonly />
                          </div>
                        </div>
                      </div>

                      <div class='row no-gutters'>
                        <div class='col-2'><p class='pt-2 TNR text-center'>AGE:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="Age" class="form-control border text-center demographic" value="" readonly />
                          </div>
                        </div>
                        <div class='col-2'><p class='pt-2 TNR text-center'>SEX:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="Sex" class="form-control border text-center demographic" value="" readonly />
                          </div>
                        </div>
                      </div>

                      <div class='row no-gutters'>
                        <div class='col-2'><p class='pt-2 TNR text-center'>HAIR STYLE:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="HairStyle" class="form-control border text-center demographic" value="" readonly />
                          </div>
                        </div>
                        <div class='col-2'><p class='pt-2 TNR text-center'>HAIR COLOR:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="HairColor" class="form-control border text-center demographic" value="" readonly />
                          </div>
                        </div>
                      </div>

                      <div class='row no-gutters'>
                        <div class='col-2'><p class='pt-2 TNR text-center'>FACIAL HAIR:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="FacialHair" class="form-control border text-center demographic" value="" readonly />
                          </div>
                        </div>
                        <div class='col-2'><p class='pt-2 TNR text-center'>EYE COLOR:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="EyeColor" class="form-control border text-center demographic" value="" readonly />
                          </div>
                        </div>
                      </div>

                      <div class='row no-gutters'>
                        <div class='col-2'><p class='pt-2 TNR text-center'>EXP POOL:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="RemainingExp" class="form-control border text-center experience demographic" value="" readonly />
                          </div>
                        </div>
                        <div class='col-2'><p class='pt-2 TNR text-center'>TOTAL EXP:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="TotalExp" class="form-control border text-center demographic" value="" readonly />
                          </div>
                        </div>
                      </div>

                  <div class='row no-gutters'>
                    <div class='col'><h4 class='TNR text-center'><u>COMBAT SKILLS</u></h4></div>
                    <div class='col'><h4 class='TNR text-center'><u>PHYSICAL TRAIT</u></h4></div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>UNARMED:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Unarmed" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>THROWN:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Thrown" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>MEM:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Memory" class="form-control border text-center trait" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>STR:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Strength" class="form-control border text-center trait" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>GRAPPLE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Grapple" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>ARCHERY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Archery" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>LOG:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Logic" class="form-control border text-center trait" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>END:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Endurance" class="form-control border text-center trait" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>SHORT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ShortWeapons" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>PISTOLS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Pistols" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>PER:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Perception" class="form-control border text-center trait" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>AGL:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Agility" class="form-control border text-center trait" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>LONG:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="LongWeapons" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>RIFLES:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Rifles" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>WILL:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Willpower" class="form-control border text-center trait" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>SPD:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Speed" class="form-control border text-center trait" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>2 HAND:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="TwoHandWeapons" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>BURST:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Burst" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CHA:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Charisma" class="form-control border text-center trait" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>BTY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Beauty" class="form-control border text-center trait" value="" readonly />
                      </div>
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>CHAIN:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ChainWeapons" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>SPECIAL:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="SpecialWeapons" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>ACTIONS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Actions" class="form-control border text-center" value="" readonly />
                      </div>
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>SEQ:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Sequence" class="form-control border text-center" value="" readonly />
                      </div>
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>SHIELD:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Shield" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>WPN SYS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="WeaponSystems" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'></div>
                    <div class='col'><p class='pt-2 TNR text-center'>OFF HAND:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="OffHand" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'></div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>BLOCK:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Block" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>DODGE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Dodge" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'></div>
                    <div class='col'><p class='pt-2 TNR text-center'>GAMBLE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Gambling" class="form-control border text-center" value="" readonly />
                      </div>
                    </div>
                    <div class='col'></div>                
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><h4 class='TNR text-center'><u>COVERT SKILLS</u></h4></div>
                    <div class='col'><h4 class='TNR text-center'><u>SURVIVAL SKILLS</u></h4></div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>STEALTH:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Stealth" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CONCEAL:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Concealment" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>ENV AWR:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="EnvAware" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>SURVEY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Surveillance" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>SLEIGHT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Sleight" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>LOCKPICK:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Lockpick" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>NAVIG:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Navigation" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>PRESERVE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Preservation" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>FORGERY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Forgery" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CRYPTO:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Cryptography" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>TRACK:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Tracking" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>TRAPS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Trapping" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>
                  
                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>DISGUISE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Disguise" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>RESTRAIN:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Restraints" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>FISH:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Fishing" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>FIRST AID:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="FirstAid" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col-6'><h4 class='TNR text-center'><u>TRANSPORTATION SKILLS</u></h4></div>
                    <div class='col-6'><h4 class='TNR text-center'><u>TECHNOLOGY SKILLS</u></h4></div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>SKATE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Skateboard" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>BICYCLE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Bicycle" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CRAFT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Crafting" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'></div>
                    <div class='col'></div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>HORSE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Horsemanship" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>AUTOS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Automobile" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>COMPS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Computers" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>PROGRAM:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Programming" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>MOTOR X:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Motorcycle" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>JET SKI:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="JetSki" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>RADIOS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Radios" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>NETWORK:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Networks" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>SAIL:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Sailing" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>BOAT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Boating" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>MECHS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Mechanics" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>ELECTRIC:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Electrical" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>MX GEAR:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="MultiGear" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>HV EQUIP:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="HeavyEquip" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CIRCUIT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Circuitry" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>EXPLODE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Explosives" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>HELIS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Helicopters" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>PLANES:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Airplanes" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CONSTR:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Construction" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>ARCHIT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Architecture" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><h4 class='TNR text-center'><u>SOFT SKILLS & LANGUAGES</u></h4></div>
                    <div class='col'><h4 class='TNR text-center'><u>SCIENCE SKILLS</u></h4></div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>NEGOT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Negotiation" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>GUILE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Guile" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>HISTORY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="History" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>FORENS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Forensics" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>ETIQ:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Etiquette" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>ANIMALS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Animals" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>BIO:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Biology" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CHEM:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Chemistry" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>APPRAISE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Appraisal" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>LEGAL:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Legal" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>BOTANY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Botany" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>MYCO:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Mycology" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="SecondLanguage" class="form-control border text-center TNR langSlot" data-target='lang1Value'
                          value="" readonly /> 
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="SecondLang" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ThirdLanguage" class="form-control border text-center TNR langSlot" data-target='lang2Value'
                          value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ThirdLang" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>TOXIC:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Toxicology" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>PHARMA:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Pharmacology" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="FourthLanguage" class="form-control border text-center TNR langSlot" data-target='lang3Value'
                          value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="FourthLang" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="FifthLanguage" class="form-control border text-center TNR langSlot" data-target='lang4Value'
                          value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="FifthLang" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>SURGERY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Surgery" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>MEDICINE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Medicine" class="form-control border text-center" value="" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'></div>
                    <div class='col'><h4 class='TNR text-center'><u>COMBAT ABILITIES</u></h4></div>
                    <div class='col'></div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability1" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability2" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability3" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability4" class="form-control border text-center TNR abilitySlot" value="" readonly /> 
                      </div>
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability5" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability6" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability7" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability8" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability9" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability10" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability11" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability12" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability13" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability14" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability15" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="Ability16" class="form-control border text-center TNR abilitySlot" value="" readonly />
                      </div>
                    </div>
                  </div>
                </div>
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