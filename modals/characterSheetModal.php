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
                            <input type="text" id="name" name="name" class="form-control border text-center"
                              value='<?php echo $characterName; ?>' readonly />
                          </div>
                        </div>
                        <div class='col-2'><p class='pt-2 TNR text-center'>BACKGROUND:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="background" name="background" class="form-control border text-center"
                              value="<?php echo $charInfo['Background']; ?>" readonly />
                          </div>
                        </div>
                      </div>

                      <div class='row no-gutters'>
                        <div class='col-2'><p class='pt-2 TNR text-center'>HABITAT:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="habitat" name="habitat" class="form-control border text-center"
                              value="<?php echo $charInfo['Habitat']; ?>" readonly />
                          </div>
                        </div>
                        <div class='col-2'><p class='pt-2 TNR text-center'>ETHNICITY:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="ethnicity" name="ethnicity" class="form-control border text-center"
                              value="<?php echo $charInfo['Ethnicity']; ?>" readonly />
                          </div>
                        </div>
                      </div>

                      <div class='row no-gutters'>
                        <div class='col-2'><p class='pt-2 TNR text-center'>AGE:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="age" name="age" class="form-control border text-center"
                              value="<?php echo $charInfo['Age']; ?>" readonly />
                          </div>
                        </div>
                        <div class='col-2'><p class='pt-2 TNR text-center'>SEX:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="sex" name="sex" class="form-control border text-center"
                              value="<?php echo $sex; ?>" readonly />
                          </div>
                        </div>
                      </div>

                      <div class='row no-gutters'>
                        <div class='col-2'><p class='pt-2 TNR text-center'>HAIR STYLE:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="hairStyle" name="hairStyle" class="form-control border text-center"
                              value="<?php echo $charInfo['HairStyle']; ?>" readonly />
                          </div>
                        </div>
                        <div class='col-2'><p class='pt-2 TNR text-center'>HAIR COLOR:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="hairColor" name="hairColor" class="form-control border text-center"
                              value="<?php echo $charInfo['HairColor']; ?>" readonly />
                          </div>
                        </div>
                      </div>

                      <div class='row no-gutters'>
                        <div class='col-2'><p class='pt-2 TNR text-center'>FACIAL HAIR:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="facialHair" name="facialHair" class="form-control border text-center"
                              value="<?php echo $charInfo['FacialHair']; ?>" readonly/>
                          </div>
                        </div>
                        <div class='col-2'><p class='pt-2 TNR text-center'>EYE COLOR:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="eyeColor" name="eyeColor" class="form-control border text-center"
                              value="<?php echo $charInfo['EyeColor']; ?>" readonly />
                          </div>
                        </div>
                      </div>

                      <div class='row no-gutters'>
                        <div class='col-2'><p class='pt-2 TNR text-center'>EXP POOL:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="expPool" name="expPool" class="form-control border text-center experience"
                              value="<?php echo $charInfo['RemainingExp']; ?>" readonly />
                          </div>
                        </div>
                        <div class='col-2'><p class='pt-2 TNR text-center'>TOTAL EXP:</p></div>
                        <div class='col-4'>
                          <div class="input-group input-group-lg">
                            <input type="text" id="totalExp" name="totalExp" class="form-control border text-center"
                              value="<?php echo $charInfo['TotalExp']; ?>" readonly />
                          </div>
                        </div>
                      </div>

                  <div class='row no-gutters'>
                    <div class='col'><h4 class='TNR text-center'><u>COMBAT SKILLS</u></h4></div>
                    <div class='col'><h4 class='TNR text-center'><u>PHYSICAL TRAITS</u></h4></div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>UNARMED:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="unarmed" name='unarmed' class="form-control border text-center"
                          value="<?php echo $charSkills['Unarmed']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>THROWN:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="thrown" name='thrown' class="form-control border text-center"
                          value="<?php echo $charSkills['Thrown']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>MEM:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="memory" name='memory' class="form-control border text-center"
                          value="<?php echo $charTraits['Memory']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>STR:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="strength" name='strength' class="form-control border text-center"
                          value="<?php echo $charTraits['Strength']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>GRAPPLE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="grapple" name='grapple' class="form-control border text-center"
                          value="<?php echo $charSkills['Grapple']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>ARCHERY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="archery" name='archery' class="form-control border text-center"
                          value="<?php echo $charSkills['Archery']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>LOG:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="logic" name='logic' class="form-control border text-center"
                          value="<?php echo $charTraits['Logic']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>END:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="endurance" name='endurance' class="form-control border text-center"
                          value="<?php echo $charTraits['Endurance']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>SHORT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="shortWeapons" name='shortWeapons' class="form-control border text-center"
                          value="<?php echo $charSkills['ShortWeapons']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>PISTOLS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="pistols" name='pistols' class="form-control border text-center"
                          value="<?php echo $charSkills['Pistols']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>PER:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="perception" name='perception' class="form-control border text-center"
                          value="<?php echo $charTraits['Perception']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>AGL:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="agility" name='agility' class="form-control border text-center"
                          value="<?php echo $charTraits['Agility']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>LONG:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="longWeapons" name='longWeapons' class="form-control border text-center"
                          value="<?php echo $charSkills['LongWeapons']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>RIFLES:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="rifles" name='rifles' class="form-control border text-center"
                          value="<?php echo $charSkills['Rifles']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>WILL:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="willpower" name='willpower' class="form-control border text-center"
                          value="<?php echo $charTraits['Willpower']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>SPD:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="speed" name='speed' class="form-control border text-center"
                          value="<?php echo $charTraits['Speed']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>2 HAND:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="twoHand" name='twoHand' class="form-control border text-center"
                          value="<?php echo $charSkills['TwoHandWeapons']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>BURST:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="burst" name='burst' class="form-control border text-center"
                          value="<?php echo $charSkills['Burst']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CHA:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="charisma" name='charisma' class="form-control border text-center"
                          value="<?php echo $charTraits['Charisma']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>BTY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="beauty" name='beauty' class="form-control border text-center"
                          value="<?php echo $charTraits['Beauty']; ?>" readonly />
                      </div>
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>CHAIN:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="chain" name='chain' class="form-control border text-center"
                          value="<?php echo $charSkills['ChainWeapons']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>SPECIAL:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="special" name='special' class="form-control border text-center"
                          value="<?php echo $charSkills['SpecialWeapons']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>ACTIONS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="actions" name='actions' class="form-control border text-center"
                          value="<?php echo $charTraits['Actions']; ?>" readonly />
                      </div>
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>SEQ:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="sequence" name='sequence' class="form-control border text-center"
                          value="<?php echo $charTraits['Sequence']; ?>" readonly />
                      </div>
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>SHIELD:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="shield" name='shield' class="form-control border text-center"
                          value="<?php echo $charSkills['Shield']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>WPN SYS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="weaponSys" name='weaponSys' class="form-control border text-center"
                          value="<?php echo $charSkills['WeaponSystems']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'></div>
                    <div class='col'><p class='pt-2 TNR text-center'>OFF HAND:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="offHand" name='offHand' class="form-control border text-center"
                          value="<?php echo $charSkills['OffHand']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'></div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>BLOCK:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="block" name='block' class="form-control border text-center"
                          value="<?php echo $charSkills['Block']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>DODGE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="dodge" name='dodge' class="form-control border text-center"
                          value="<?php echo $charSkills['Dodge']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'></div>
                    <div class='col'><p class='pt-2 TNR text-center'>GAMBLE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="gambling" name='gambling' class="form-control border text-center"
                          value="<?php echo $charSkills['Gambling']; ?>" readonly />
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
                        <input type="text" id="stealth" name='stealth' class="form-control border text-center"
                          value="<?php echo $charSkills['Stealth']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CONCEAL:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="concealment" name='concealment' class="form-control border text-center"
                          value="<?php echo $charSkills['Concealment']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>ENV AWR:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="envAware" name='envAware' class="form-control border text-center"
                          value="<?php echo $charSkills['EnvAware']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>SURVEY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="surveillance" name='surveillance' class="form-control border text-center"
                          value="<?php echo $charSkills['Surveillance']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>SLEIGHT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="sleight" name='sleight' class="form-control border text-center"
                          value="<?php echo $charSkills['Sleight']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>LOCKPICK:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="lockpick" name='lockpick' class="form-control border text-center"
                          value="<?php echo $charSkills['Lockpick']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>NAVIG:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="navigation" name='navigation' class="form-control border text-center"
                          value="<?php echo $charSkills['Navigation']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>PRESERVE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="preservation" name='preservation' class="form-control border text-center"
                          value="<?php echo $charSkills['Preservation']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>FORGERY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="forgery" name='forgery' class="form-control border text-center"
                          value="<?php echo $charSkills['Forgery']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CRYPTO:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="cryptography" name='cryptography' class="form-control border text-center"
                          value="<?php echo $charSkills['Cryptography']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>TRACK:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="tracking" name='tracking' class="form-control border text-center"
                          value="<?php echo $charSkills['Tracking']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>TRAPS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="trapping" name='trapping' class="form-control border text-center"
                          value="<?php echo $charSkills['Trapping']; ?>" readonly />
                      </div>    
                    </div>
                  </div>
                  
                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>DISGUISE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="disguise" name='disguise' class="form-control border text-center"
                          value="<?php echo $charSkills['Disguise']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>RESTRAIN:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="restraints" name='restraints' class="form-control border text-center"
                          value="<?php echo $charSkills['Restraints']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>FISH:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="fishing" name='fishing' class="form-control border text-center"
                          value="<?php echo $charSkills['Fishing']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>FIRST AID:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="firstAid" name='firstAid' class="form-control border text-center"
                          value="<?php echo $charSkills['FirstAid']; ?>" readonly />
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
                        <input type="text" id="skateboard" name='skateboard' class="form-control border text-center"
                          value="<?php echo $charSkills['Skateboard']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>BICYCLE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="bicycle" name='bicycle' class="form-control border text-center"
                          value="<?php echo $charSkills['Bicycle']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CRAFT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="crafting" name='crafting' class="form-control border text-center"
                          value="<?php echo $charSkills['Crafting']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'></div>
                    <div class='col'></div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>HORSE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="horsemanship" name='horsemanship' class="form-control border text-center"
                          value="<?php echo $charSkills['Horsemanship']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>AUTOS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="automobile" name='automobile' class="form-control border text-center"
                          value="<?php echo $charSkills['Automobile']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>COMPS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="computers" name='computers' class="form-control border text-center"
                          value="<?php echo $charSkills['Computers']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>PROGRAM:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="programming" name='programming' class="form-control border text-center"
                          value="<?php echo $charSkills['Programming']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>MOTOR X:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="motorcycle" name='motorcycle' class="form-control border text-center"
                          value="<?php echo $charSkills['Motorcycle']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>JET SKI:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="jetSki" name='jetSki' class="form-control border text-center"
                          value="<?php echo $charSkills['Jet Ski']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>RADIOS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="radios" name='radios' class="form-control border text-center"
                          value="<?php echo $charSkills['Radios']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>NETWORK:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="networks" name='networks' class="form-control border text-center"
                          value="<?php echo $charSkills['Networks']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>SAIL:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="sailing" name='sailing' class="form-control border text-center"
                          value="<?php echo $charSkills['Sailing']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>BOAT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="boating" name='boating' class="form-control border text-center"
                          value="<?php echo $charSkills['Boating']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>MECHS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="mechanics" name='mechanics' class="form-control border text-center"
                          value="<?php echo $charSkills['Mechanics']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>ELECTRIC:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="electrical" name='electrical' class="form-control border text-center"
                          value="<?php echo $charSkills['Electrical']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>MX GEAR:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="multiGear" name='multiGear' class="form-control border text-center"
                          value="<?php echo $charSkills['Multi Gear']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>HV EQUIP:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="hvyEquip" name='hvyEquip' class="form-control border text-center"
                          value="<?php echo $charSkills['Heavy Equip']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CIRCUIT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="circuitry" name='circuitry' class="form-control border text-center"
                          value="<?php echo $charSkills['Circuitry']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>EXPLODE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="explosives" name='explosives' class="form-control border text-center"
                          value="<?php echo $charSkills['Explosives']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>HELIS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="helicopters" name='helicopters' class="form-control border text-center"
                          value="<?php echo $charSkills['Helicopters']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>PLANES:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="airplanes" name='airplanes' class="form-control border text-center"
                          value="<?php echo $charSkills['Airplanes']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CONSTR:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="construction" name='construction' class="form-control border text-center"
                          value="<?php echo $charSkills['Construction']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>ARCHIT:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="architecture" name='architecture' class="form-control border text-center"
                          value="<?php echo $charSkills['Architecture']; ?>" readonly />
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
                        <input type="text" id="negotiation" name='negotiation' class="form-control border text-center"
                          value="<?php echo $charSkills['Negotiation']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>GUILE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="guile" name='guile' class="form-control border text-center"
                          value="<?php echo $charSkills['Guile']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>HISTORY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="history" name='history' class="form-control border text-center"
                          value="<?php echo $charSkills['History']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>FORENS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="forensics" name='forensics' class="form-control border text-center"
                          value="<?php echo $charSkills['Forensics']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>ETIQ:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="etiquette" name='etiquette' class="form-control border text-center"
                          value="<?php echo $charSkills['Etiquette']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>ANIMALS:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="animals" name='animals' class="form-control border text-center"
                          value="<?php echo $charSkills['Animal Handling']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>BIO:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="biology" name='biology' class="form-control border text-center"
                          value="<?php echo $charSkills['Biology']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>CHEM:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="chemistry" name='chemistry' class="form-control border text-center"
                          value="<?php echo $charSkills['Chemistry']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'><p class='pt-2 TNR text-center'>APPRAISE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="appraisal" name='appraisal' class="form-control border text-center"
                          value="<?php echo $charSkills['Appraisal']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>LEGAL:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="legal" name='legal' class="form-control border text-center"
                          value="<?php echo $charSkills['Legal']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>BOTANY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="botany" name='botany' class="form-control border text-center"
                          value="<?php echo $charSkills['Botany']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>MYCO:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="mycology" name='mycology' class="form-control border text-center"
                          value="<?php echo $charSkills['Mycology']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="lang1" name='lang1' class="form-control border text-center TNR langSlot" data-target='lang1Value'
                          value="<?php echo $charInfo['SecondLanguage']; ?>" readonly /> 
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="lang1Value" name='lang1Value' class="form-control border text-center"
                          value="<?php echo $charSkills['SecondLang']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="lang2" name='lang2' class="form-control border text-center TNR langSlot" data-target='lang2Value'
                           value="<?php echo $charInfo['ThirdLanguage']; ?>" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="lang2Value" name='lang2Value' class="form-control border text-center"
                          value="<?php echo $charSkills['ThirdLang']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>TOXIC:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="toxicology" name='toxicology' class="form-control border text-center"
                          value="<?php echo $charSkills['Toxicology']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>PHARMA:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="pharmacology" name='pharmacology' class="form-control border text-center"
                          value="<?php echo $charSkills['Pharmacology']; ?>" readonly />
                      </div>    
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="lang3" name='lang3' class="form-control border text-center TNR langSlot" data-target='lang3Value'
                            value="<?php echo $charInfo['FourthLanguage']; ?>" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="lang3Value" name='lang3Value' class="form-control border text-center"
                          value="<?php echo $charSkills['FourthLang']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="lang4" name='lang4' class="form-control border text-center TNR langSlot" data-target='lang4Value'
                            value="<?php echo $charInfo['FifthLanguage']; ?>" readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="lang4Value" name='lang4Value' class="form-control border text-center"
                          value="<?php echo $charSkills['FifthLang']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>SURGERY:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="surgery" name='surgery' class="form-control border text-center"
                          value="<?php echo $charSkills['Surgery']; ?>" readonly />
                      </div>    
                    </div>
                    <div class='col'><p class='pt-2 TNR text-center'>MEDICINE:</p></div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="medicine" name='medicine' class="form-control border text-center"
                          value="<?php echo $charSkills['Medicine']; ?>" readonly />
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
                        <input type="text" id="ability1" name='ability1' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["1"] ?>' readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability2" name='ability2' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["2"] ?>' readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability3" name='ability3' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["3"] ?>' readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability4" name='ability4' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["4"] ?>' readonly />
                      </div>
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability5" name='ability5' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["5"] ?>' readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability6" name='ability6' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["6"] ?>' readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability7" name='ability7' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["7"] ?>' readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability8" name='ability8' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["8"] ?>' readonly />
                      </div>
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability9" name='ability9' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["9"] ?>' readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability10" name='ability10' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["10"] ?>' readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability11" name='ability11' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["11"] ?>' readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability12" name='ability12' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["12"] ?>' readonly />
                      </div>
                    </div>
                  </div>

                  <div class='row no-gutters'>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability13" name='ability13' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["13"] ?>' readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability14" name='ability14' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["14"] ?>' readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability15" name='ability15' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["15"] ?>' readonly />
                      </div>
                    </div>
                    <div class='col'>
                      <div class="input-group input-group-lg">
                        <input type="text" id="ability16" name='ability16' class="form-control border text-center TNR abilitySlot" 
                          value='<?php echo $charAbilities["16"] ?>' readonly />
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