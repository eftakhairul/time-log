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
        <?php if (!empty($notification['message'])) : ?>

        <div class="block message-block">

            <div class="message <?php echo $notification['messageType'] ?>" style="display: block;">
                <p><?php echo $notification['message'] ?></p>
            </div>

        </div>

        <?php endif ?>

        <?php echo $content_for_layout ?>

    </body>

        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.img.preload.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.filestyle.mini.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.wysiwyg.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.date_input.pack.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/facebox.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/excanvas.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.visualize.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.select_skin.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/jquery.pngfix.js') ?>"></script>
        <script type="text/javascript" src="<?php echo site_url('assets/js/custom.js') ?>"></script>
</html>
