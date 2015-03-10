<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Log Time</title>

        <style type="text/css" media="all">
            @import url("<?php echo site_url('assets/css/style.css'); ?>");
            @import url("<?php echo site_url('assets/css/jquery.wysiwyg.css'); ?>");
            @import url("<?php echo site_url('assets/css/facebox.css'); ?>");
            @import url("<?php echo site_url('assets/css/visualize.css'); ?>");
            @import url("<?php echo site_url('assets/css/date_input.css'); ?>");
        </style>

        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.js') ?>"></script>
    </head>

    <body>

        <div id="hld">

            <div class="wrapper">		<!-- wrapper begins -->

                <div id="header">
                    <h1><a href="/logtime">Log Time</a></h1>


                    <!--                    navigation-->
                    <ul id="nav">
                        <li ><a href=<?php echo site_url('schedule') ?>>Schedules</a></li>
                    </ul>
                    <!--      navigation end-->
                    

                    <p class="user">
                        Hello, <a href="<?php echo site_url('user/editUser/id').'/'.$this->session->userdata('user_id')?>"><?php echo $this->session->userdata('username') ?></a> |
                        <a href="<?php echo site_url('user/logout') ?>">Logout</a>
                    </p>
                </div>		<!-- #header ends -->

                <?php if (!empty($notification['message'])) : ?>

                <div class="block message-block">

                    <div class="message <?php echo $notification['messageType'] ?>" style="display: block;">
                        <p><?php echo $notification['message'] ?></p>
                    </div>

                </div>

                <?php endif ?>

                <?php echo $content_for_layout ?>

                <div id="footer">
                    <p class="right">Developed by <a href="http://eftakhairul.com/">Eftakhairul Islam.</a></p>

                </div>

            </div>		<!-- wrapper ends -->

        </div>		<!-- #hld ends -->

    </body>

   <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.img.preload.js') ?>"></script>
   <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.filestyle.mini.js') ?>"></script>
   <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.wysiwyg.js') ?>"></script>
   <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.date_input.pack.js') ?>"></script>
   <script type="text/javascript" src="<?php echo site_url('assets/js/custom.js') ?>"></script>
</html>
