<?php
$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
$text_align = $this->db->get_where('settings', array('type' => 'text_align'))->row()->description;
$running_session = $this->db->get_where('settings', array('type' => 'session'))->row()->description;
$footer = $this->db->get_where('settings', array('type' => 'footer'))->row()->description;

$acadmic_term   = $this->db->get_where('settings', array('type' => 'term'))->row()->description;
//$acadmic_period = $this->db->get_where('settings', array('type' => 'years'))->row()->description;

$account_type = $this->session->userdata('login_type');

$skin_colour = $this->db->get_where('settings', array('type' => 'skin_colour'))->row()->description;
$active_sms_service = $this->db->get_where('settings', array('type' => 'active_sms_service'))->row()->description;
?>
<!DOCTYPE html>
<html lang="en" dir="<?php if ($text_align == 'right-to-left') echo 'rtl'; ?>">
    <head>

        <title><?php echo $page_title; ?> | <?php echo $system_title; ?></title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="Optimum Linkup Universal Concepts" />
        <meta name="author" content="optimumlinkup.com.ng" />



        <?php include 'includes_top.php'; ?>

    </head>
    <body class="nav-md page-body <?php if ($skin_colour != '') echo 'skin-' . $skin_colour; ?>">

        <div class="container body page-container <?php if ($text_align == 'right-to-left') echo 'right-sidebar'; ?>">
            <div class="main-content main_container">
                <div class="col-md-3 left_col sidebar-menu">
                    <div class="left_col scroll-view">

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <?php
                            $key = $this->session->userdata('login_type') . '_id';
                            $face_file = 'uploads/' . $this->session->userdata('login_type') . '_image/' . $this->session->userdata($key) . '.jpg';
                            if (!file_exists($face_file)) {
                                $face_file = 'uploads/default_avatar.jpg';
//                                    if ($key = $this->session->userdata('login_type') == 'admin') {
//                                        $face_file = base_url() . 'uploads/' . $this->session->userdata('login_type') . '_image/1.jpg';
//                                    }
                            }
                            ?>
                            <div class="profile_pic">
                                <div style="background-image: url('<?php echo base_url() . $face_file; ?>')" alt="..." class="img-circle profile_img"></div>
                            </div>
                            <div class="profile_info">
                                <span><?php echo $this->session->userdata('login_type') ?></span>
                                <h2>
                                    <?php
                                    if ($this->session->userdata('name') == '')
                                        echo $this->session->userdata('login_type');
                                    else
                                        echo $this->session->userdata('name');
                                    ?>
                                </h2>
                            </div>
                        </div>

                        <br />
                        <?php include $account_type . '/navigation.php'; ?>

                    </div>
                </div>


                <?php include 'header.php'; ?>

                <?php include $account_type . '/' . $page_name . '.php'; ?>
            </div>
            <?php include 'footer.php'; ?>

        </div>
        <?php //include 'chat.php';   ?>
    </div>
    <?php include 'modal.php'; ?>
    <?php include 'includes_bottom.php'; ?>

</body>
</html>