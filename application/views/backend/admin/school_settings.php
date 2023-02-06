<hr />

    <div class="row">
    <?php echo form_open(base_url() . 'index.php?admin/school_settings/do_update' , 
      array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
        <div class="col-md-6">
            
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
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('Term');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="Term" 
                              value="<?php echo $this->db->get_where('settings' , array('type'=>'term'))->row()->description;?>">
                      </div>
                  </div>
                    
                  <div class="form-group">
                      <label  class="col-sm-3 control-label"><?php echo get_phrase('Year');?></label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="Year" 
                              value="<?php echo $this->db->get_where('settings' , array('type'=>'years'))->row()->description;?>">
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

     
        <div class="col-md-6">
            
                  <?php echo form_open(base_url() . 'index.php?admin/school_settings/upload_logo' , array(
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

<script type="text/javascript">
    $(".gallery-env").on('click', 'a', function () {
        skin = this.id;
        $.ajax({
            url: '<?php echo base_url();?>index.php?admin/system_settings/change_skin/'+ skin,
            success: window.location = '<?php echo base_url();?>index.php?admin/system_settings/'
        });
});
</script>