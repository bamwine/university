<hr />

    <div class="row">
        <div class="col-md-6">
            
          <div class="panel panel-gradient" >
            
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('Create backup');?>
                </div>
            </div>

            
            <div class="panel-body form-horizontal form-groups-bordered">
                <?php echo form_open(base_url().'index.php?admin/backup_restore/create/all' , array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'));?>
                
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <input type="submit" class="btn btn-info" value="<?php echo get_phrase('Back Up'); ?>" />
                        </div>
                    </div>
                        
                <?php echo form_close(); ?>
            </div>

        </div>
        
        </div>

		
		
        <div class="col-md-6">
                 <div class="panel panel-gradient" >
            
            <div class="panel-heading">
                <div class="panel-title">
                    <?php echo get_phrase('restore from backup');?>
                </div>
            </div>

            
            <div class="panel-body form-horizontal form-groups-bordered">
                <?php echo form_open(base_url().'index.php?admin/backup_restore/restore' , array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data'));?>
                
                    <div class="form-group">
                        <label class="col-sm-3 control-label"><?php echo get_phrase('file'); ?></label>

                        <div class="col-sm-5">

                            <input type="file" name="userfile" class="form-control file2 inline btn btn-primary" data-label="<i class='glyphicon glyphicon-file'></i> Browse" />

                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <input type="submit" class="btn btn-info" value="<?php echo get_phrase('Restore'); ?>" />
                        </div>
                    </div>
                        
                <?php echo form_close(); ?>
            </div>

        </div>
        
      
           
            
        
        </div>

    </div>
