
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        
       <ul id="main-menu" class="nav side-menu">
        <!-- add class "multiple-expanded" to allow multiple submenus to open -->
        <!-- class "auto-inherit-active-class" will automatically add "active" class for parent elements who are marked already with class "active" -->


        <!-- DASHBOARD -->
        <li class="<?php if ($page_name == 'dashboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/dashboard">
                <i class="entypo-gauge"></i>
                <span><?php echo get_phrase('dashboard'); ?></span>
            </a>
        </li>




        <!-- TEACHER -->
        <li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/teacher_list">
                <i class="entypo-users"></i>
                <span><?php echo get_phrase('Lecturer'); ?></span>
            </a>
        </li>

        <!-- CLASS ROUTINE -->
        <li class="<?php if ($page_name == 'class_routine') echo 'opened active';?> ">
            <a href="#">
                <i class="entypo-target"></i>
                <span><?php echo get_phrase('Time_Table'); ?></span><span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
            <?php 
                $children_of_parent = $this->db->get_where('student' , array(
                    'parent_id' => $this->session->userdata('parent_id')
                ))->result_array();
                foreach ($children_of_parent as $row):
            ?>
                <li class="<?php if ($page_name == 'class_routine') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/class_routine/<?php echo $row['student_id'];?>">
                        <span> <?php echo $row['name'];?></span>
                    </a>
                </li>
            <?php endforeach;?>
            </ul>
        </li>

        <!-- EXAMS -->
        <li class="<?php
        if ($page_name == 'marks') echo 'opened active';?> ">
            <a href="#">
                <i class="entypo-graduation-cap"></i>
                <span><?php echo get_phrase('exam_marks'); ?></span<span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
            <?php 
                foreach ($children_of_parent as $row):
            ?>
                <li class="<?php if ($page_name == 'marks') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/marks/<?php echo $row['student_id'];?>">
                        <span> <?php echo $row['name'];?></span>
                    </a>
                </li>
            <?php endforeach;?>
            </ul>
        </li>

        <!-- PAYMENT -->
        <li class="<?php if ($page_name == 'invoice') echo 'opened active';?> ">
            <a href="#">
                <i class="entypo-credit-card"></i>
                <span><?php echo get_phrase('payment'); ?></span><span class="fa fa-chevron-down"></span>
                </a>
                <ul class="nav child_menu">
            <?php 
                foreach ($children_of_parent as $row):
            ?>
                <li class="<?php if ($page_name == 'invoice') echo 'active'; ?> ">
                    <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/invoice/<?php echo $row['student_id'];?>">
                        <span> <?php echo $row['name'];?></span>
                    </a>
                </li>
            <?php endforeach;?>
            </ul>
        </li>

		
		 <!-- study material -->
        <li class="<?php if ($page_name == 'manage_document') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/document">
                <i class="entypo-book-open"></i>
                <span><?php echo get_phrase('Study Material'); ?></span>
            </a>
        </li>

        <!-- LIBRARY -->
        <li class="<?php if ($page_name == 'book') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/book">
                <i class="entypo-book"></i>
                <span><?php echo get_phrase('library'); ?></span>
            </a>
        </li>

        <!-- TRANSPORT -->
        <li class="<?php if ($page_name == 'transport') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/transport">
                <i class="entypo-location"></i>
                <span><?php echo get_phrase('transport'); ?></span>
            </a>
        </li>

        <!-- NOTICEBOARD -->
        <li class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/noticeboard">
                <i class="entypo-doc-text-inv"></i>
                <span><?php echo get_phrase('noticeboard'); ?></span>
            </a>
        </li>

        <!-- MESSAGE -->
        <li class="<?php if ($page_name == 'message') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/message">
                <i class="entypo-mail"></i>
                <span><?php echo get_phrase('message'); ?></span>
            </a>
        </li>

        <!-- ACCOUNT -->
        <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
            <a href="<?php echo base_url(); ?>index.php?<?php echo $account_type; ?>/manage_profile">
                <i class="entypo-lock"></i>
                <span><?php echo get_phrase('account'); ?></span>
            </a>
        </li>

    </ul>

</div>
</div>
