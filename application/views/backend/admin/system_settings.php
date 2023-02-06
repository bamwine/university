<hr />

    <div class="row">
	 <div class="col-md-6">
    <?php echo form_open(base_url() . 'index.php?admin/system_settings/do_update' , 
      array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
        <div class="col-md-12">
            
            <div class="panel panel-gradient" >
            
                <div class="panel-heading">
                    <div class="panel-title">
                        <?php echo get_phrase('system_settings');?>
                    </div>
                </div>
                
                <div class="panel-body">
                    
                 <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('paypal_email');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="paypal_email" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'paypal_email'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('currency');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="currency" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'currency'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('system_email');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="system_email" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'system_email'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('language');?></label>
                      <div class="col-sm-9">
                          <select name="language" class="form-control">
                                <?php
									$fields = $this->db->list_fields('language');
									foreach ($fields as $field)
									{
										if ($field == 'phrase_id' || $field == 'phrase')continue;
										
										$current_default_language	=	$this->db->get_where('settings' , array('type'=>'language'))->row()->description;
										?>
                                		<option value="<?php echo $field;?>"
                                        	<?php if ($current_default_language == $field)echo 'selected';?>> <?php echo $field;?> </option>
                                        <?php
									}
									?>
                           </select>
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('text_align');?></label>
                      <div class="col-sm-9">
                          <select name="text_align" class="form-control">
                          	  <?php $text_align	=	$this->db->get_where('settings' , array('type'=>'text_align'))->row()->description;?>
                              <option value="left-to-right" <?php if ($text_align == 'left-to-right')echo 'selected';?>> left-to-right</option>
                              <option value="right-to-left" <?php if ($text_align == 'right-to-left')echo 'selected';?>> right-to-left</option>
                          </select>
                      </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('save');?></button>
                    </div>
                  </div>
                    <?php echo form_close();?>
                    
                </div>
            
            </div>
			
			<div class="panel panel-gradient" >
            
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('update_product');?>
                </div>
            </div>

            
            <div class="panel-body form-horizontal form-groups-bordered">
                <?php echo form_open(base_url().'index.php?updater/update' , array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'));?>
                
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('file'); ?></label>

                        <div class="col-sm-5">

                            <input type="file" name="file_name" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" />

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <input type="submit" class="btn btn-info" value="<?php echo get_phrase('install_update'); ?>" />
                        </div>
                    </div>
                        
                <?php echo form_close(); ?>
            </div>

        </div>
        
        </div>

      <?php 
        $skin = $this->db->get_where('settings' , array(
          'type' => 'skin_colour'
        ))->row()->description;
      ?>
    
        <div class="col-md-12">
            
             <div class="panel panel-gradient" >
            
                <div class="panel-heading">
                    <div class="panel-title">
                        <?php echo get_phrase('theme_settings');?>
                    </div>
                </div>
                
                <div class="panel-body">

                <div class="gallery-env">

                    <div class="col-sm-4">
                        <article class="album">
                            <header>
                                <a href="#" id="default">
                                    <img src="assets/images/skins/default.png"
                                    <?php if ($skin == 'default') echo 'style="background-color: black; opacity: 0.3;"';?> />
                                </a>
                                <a href="#" class="album-options" id="default">
                                    <i class="entypo-check"></i>
                                    <?php echo get_phrase('default');?>
                                </a>
                            </header>
                        </article>
                    </div>

                    <div class="col-sm-4">
                        <article class="album">
                            <header>
                                <a href="#" id="black">
                                    <img src="assets/images/skins/black.png" 
                                      <?php if ($skin == 'black') echo 'style="background-color: black; opacity: 0.3;"';?> />
                                </a>
                                <a href="#" class="album-options" id="black">
                                    <i class="entypo-check"></i>
                                    <?php echo get_phrase('select_theme');?>
                                </a>
                            </header>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="album">
                            <header>
                                <a href="#" id="blue">
                                    <img src="assets/images/skins/blue.png"
                                    <?php if ($skin == 'blue') echo 'style="background-color: black; opacity: 0.3;"';?> />
                                </a>
                                <a href="#" class="album-options" id="blue">
                                    <i class="entypo-check"></i>
                                    <?php echo get_phrase('select_theme');?>
                                </a>
                            </header>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="album">
                            <header>
                                <a href="#" id="cafe">
                                    <img src="assets/images/skins/cafe.png"
                                    <?php if ($skin == 'cafe') echo 'style="background-color: black; opacity: 0.3;"';?> />
                                </a>
                                <a href="#" class="album-options" id="cafe">
                                    <i class="entypo-check"></i>
                                    <?php echo get_phrase('select_theme');?>
                                </a>
                            </header>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="album">
                            <header>
                                <a href="#" id="green">
                                    <img src="assets/images/skins/green.png"
                                    <?php if ($skin == 'green') echo 'style="background-color: black; opacity: 0.3;"';?> />
                                </a>
                                <a href="#" class="album-options" id="green">
                                    <i class="entypo-check"></i>
                                    <?php echo get_phrase('select_theme');?>
                                </a>
                            </header>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="album">
                            <header>
                                <a href="#" id="purple">
                                    <img src="assets/images/skins/purple.png"
                                    <?php if ($skin == 'purple') echo 'style="background-color: black; opacity: 0.3;"';?> />
                                </a>
                                <a href="#" class="album-options" id="purple">
                                    <i class="entypo-check"></i>
                                    <?php echo get_phrase('select_theme');?>
                                </a>
                            </header>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="album">
                            <header>
                                <a href="#" id="red">
                                    <img src="assets/images/skins/red.png"
                                    <?php if ($skin == 'red') echo 'style="background-color: black; opacity: 0.3;"';?> />
                                </a>
                                <a href="#" class="album-options" id="red">
                                    <i class="entypo-check"></i>
                                    <?php echo get_phrase('select_theme');?>
                                </a>
                            </header>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="album">
                            <header>
                                <a href="#" id="white">
                                    <img src="assets/images/skins/white.png"
                                    <?php if ($skin == 'white') echo 'style="background-color: black; opacity: 0.3;"';?> />
                                </a>
                                <a href="#" class="album-options" id="white">
                                    <i class="entypo-check"></i>
                                    <?php echo get_phrase('select_theme');?>
                                </a>
                            </header>
                        </article>
                    </div>
                    <div class="col-sm-4">
                        <article class="album">
                            <header>
                                <a href="#" id="yellow">
                                    <img src="assets/images/skins/yellow.png"
                                    <?php if ($skin == 'yellow') echo 'style="background-color: black; opacity: 0.3;"';?> />
                                </a>
                                <a href="#" class="album-options" id="yellow">
                                    <i class="entypo-check"></i>
                                    <?php echo get_phrase('select_theme');?>
                                </a>
                            </header>
                        </article>
                    </div>

                </div>
                <center>
                  <div class="label label-primary" style="font-size: 12px;">
                    <i class="entypo-check"></i> <?php echo get_phrase('select_a_theme_to_make_changes');?>
                  </div>
                </center>
                </div>
            
            </div>

            
        
        </div>

		</div>
		
	<div class="col-md-6">
    <div class="row">
    <?php echo form_open(base_url() . 'index.php?admin/system_settings/do_update' , 
      array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
        <div class="col-md-12">
            
            <div class="panel panel-gradient" >
            
                <div class="panel-heading">
                    <div class="panel-title">
                        <?php echo get_phrase('University_settings');?>
                    </div>
                </div>
                
                <div class="panel-body">
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('University name');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="school_name" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'school_name'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('University Motto');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="school_motto" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'school_motto'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('University address');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="school_address" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'school_address'))->row()->description;?>">
                      </div>
                  </div>
				  
				  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('Registration Number');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="school_reg_number" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'school_reg_number'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('Contact Numbers');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="school_phone" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'school_phone'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('University_email');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="school_email" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'school_email'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('Center Number');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="school_uneb" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'school_no'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('Box Number');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="school_boxno" 
                              value="<?php echo $this->db->get_where('settings' , array('type' =>'school_boxno'))->row()->description;?>">
                      </div>
                  </div>
                   

					<div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('Period_of_study');?></label>
                      <div class="col-sm-9">
                          <!--input type="text" class="form-control" name="Term" value="<?php //echo $this->db->get_where('settings' , array('type'=>'term'))->row()->description;?>"-->
                      
					  <select name="Term" class="form-control select2">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$session = $this->db->get('sessionp')->result_array();
								foreach($session as $row){
									?>
                            		
									<option value="<?php echo $row['name'];?>"
                                			<?php if ($this->db->get_where('settings' , array('type'=>'term'))->row()->description == $row['name'])
                                				echo 'selected';?>>
													<?php echo $row['name'];?>
                                        </option>
									
								<?php
								}
							  ?>
                                
                          </select>
					  </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('Academic period');?></label>
                      <div class="col-sm-9">
                    <!--input type="text" class="form-control" name="Year" value="<?php echo $this->db->get_where('settings' , array('type'=>'years'))->row()->description;?>"-->
                      
					  <select name="Year" class="form-control select2">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$session = $this->db->get('session')->result_array();
								foreach($session as $row){
									?>
                            		
									<option value="<?php echo $row['name'];?>"
                                			<?php if ($this->db->get_where('settings' , array('type'=>'years'))->row()->description == $row['name'])
                                				echo 'selected';?>>
													<?php echo $row['name'];?>
                                        </option>
									
								<?php
								}
							  ?>
                                
                          </select>
					  
					  </div>
                  </div>
                 
                  
                  <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-9">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('save');?></button>
                    </div>
                  </div>
                    <?php echo form_close();?>
                    
                </div>
            
            </div>
			
			
        </div>

     
        <div class="col-md-12">
            
                  <?php echo form_open(base_url() . 'index.php?admin/system_settings/upload_logo' , array(
            'class' => 'form-horizontal form-groups-bordered validate','target'=>'_top' , 'enctype' => 'multipart/form-data'));?>

             <div class="panel panel-gradient" >
              
                  <div class="panel-heading">
                      <div class="panel-title">
                          <?php echo get_phrase('upload_logo');?>
                      </div>
                  </div>
                  
                  <div class="panel-body">
                      
                    
                      <div class="form-group">
                          <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                          
                          <div class="col-sm-9">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                      <img src="<?php echo base_url();?>uploads/schoo_badge.png" alt="...">
                                  </div>
                                  <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                  <div>
                                      <span class="btn btn-white btn-file">
                                          <span class="fileinput-new">Select image</span>
                                          <span class="fileinput-exists">Change</span>
                                          <input type="file" name="userfile" accept="image/*">
                                      </span>
                                      <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                  </div>
                              </div>
                          </div>
                      </div>
                    
                    
                    <div class="form-group">
                      <div class="col-sm-offset-3 col-sm-9">
                          <button type="submit" class="btn btn-info"><?php echo get_phrase('upload');?></button>
                      </div>
                    </div>
                      
                  </div>
              
              </div>

            <?php echo form_close();?>
            
        
        </div>

    </div>


 
  </div>
		
    </div>

<script type="text/javascript">
    $(".gallery-env").on('click', 'a', function () {
        skin = this.id;
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/system_settings/change_skin/'+ skin,
            success: window.location = '<?php echo base_url();?>index.php?admin/system_settings/'
        });
});
</script>