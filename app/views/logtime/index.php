<div class="block">

    <div class="block_head">
        <h2>Events</h2>
        <ul>
            <li> <a href='#' id="add_entry"> Add Entry </a>   | <a href='<?php echo site_url('schedule/export') ?>'>Export</a></li>
        </ul>

    </div> <!--.block_head ends -->
    
    <div class="block_content">
        <table cellpadding="0" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="centered" width="12%">Project</th>
                    <th class="centered" width="10%">Team</th>
                    <th class="centered" width="8%">Username</th>
                    <th class="centered" width="30%">Date</th>
                    <th class="centered" width="16%">Hours</th>
                    <th class="centered" width="12%">Mins</th>
                    <th class="centered" width="20%">Action</th>
                </tr>

            </thead>
            
            <tbody>

            <?php if (empty ($logtimes)) : ?>
                
            <tr>
                <td colspan="7" class="nodatamsg">No entry is available.</td>
            </tr>

            <?php else : foreach($logtimes AS $logtime) : ?>
                
            <tr>
                <td class="centered"><?php echo $logtime['project_title'] ?></td>
                <td class="centered"><?php echo $logtime['team_title'] ?></td>
                <td class="centered"><?php echo $logtime['username'] ?></td>
                <td class="centered"><?php echo DateHelper::mysqlToHuman($logtime['date']) ?></td>
                <td class="centered"><?php echo $logtime['hours'] ?></td>
                <td class="centered"><?php echo $logtime['mins'] ?></td>
                <td class="action">
                    <a href="<?php echo site_url("logtime/edit/{$logtime['id']}") ?>">Edit</a>
                    | <a href="<?php echo site_url("logtime/delete/id/{$logtime['id']}") ?>" id='delete'>Delete</a>

                </td>
            </tr>

            <?php endforeach; endif ?>
                
            </tbody>
            
        </table>

        <div class="pagination right">
            <?php echo $this->pagination->create_links() ?>
        </div> <!--.pagination ends-->

    </div> <!--.block_content ends-->

</div> <!--.block ends-->


<script>

      jQuery(function($) {

          $("#add_entry").click(function(){
              $.facebox({ajax: "<?php echo site_url('logtime/createLogtime') ?>" });
          });

           $('#submit_entry').live('click', function(){

            $.ajax({
                url: $("#create_entry_form").attr('action'),
                type: 'POST',
                data: $('#create_entry_form').serialize(),
                success: function(content) {

                    if (content == 1) {
                        jQuery.facebox.close();
                    } else {
                        jQuery.facebox(content);
                        return false;
                    }
                }
            });

            return false;
        });

        $('#cancel').live('click', function(){
            jQuery.facebox.close();
            return false;
        });


    });
</script>