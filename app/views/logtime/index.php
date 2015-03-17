<div class="block">

    <div class="block_head">
        <h2><?php echo $title ?></h2>
        <ul>
            <li> <a href='#' id="add_entry">Add New Entry</a>   | <a href='<?php echo site_url('logtime/export') ?>'>Export Excel</a></li>
        </ul>

    </div> <!--.block_head ends -->
    
    <div class="block_content">

        <div>
            <form action="<?php echo site_url('logtime/filter') ?>" method="POST">

                <div style="display: inline-block">

                <select  name="project_id"   style="width: 85px">
                    <option value=''>Project</option>

                    <?php foreach ($projects as $project) : ?>
                        <option value="<?php echo $project->id ?>"
                            <?php echo (!empty($filter['project_id']) && $filter['project_id'] == $project->id)? "selected='selected'":"" ?>>
                            <?php echo $project->title ?>
                        </option>
                    <?php endforeach ?>
                </select>
                </div>

                <div style="display: inline-block">

                  <select  name="team_id"   style="width: 85px">
                    <option value=''>Team</option>

                    <?php foreach ($teams as $team) : ?>
                        <option value="<?php echo $team->id ?>"
                        <?php echo (!empty($filter['team_id']) && $filter['team_id'] == $team->id)? "selected='selected'":"" ?>>
                            <?php echo $team->title ?></option>
                    <?php endforeach ?>

                    </select>
                </div>

                <div style="display: inline-block">

                  <select  name="type_id" style="width: 80px">
                    <option value=''>Type </option>

                    <?php foreach ($types as $type) : ?>
                        <option value="<?php echo $type->id ?>"
                        <?php echo (!empty($filter['type_id']) && $filter['type_id'] == $type->id)? "selected='selected'":"" ?>>
                            <?php echo $type->title ?></option>
                    <?php endforeach ?>

                    </select>
                </div>

                <div style="display: inline-block">
                     <select name="activity_id" style="width: 95px">
                     <option value=''>Activity</option>

                     <?php foreach ($activities as $activity) : ?>
                        <option value="<?php echo $activity->id ?>"
                        <?php echo (!empty($filter['activity_id']) && $filter['activity_id'] ==  $activity->id)? "selected='selected'":"" ?>>
                            <?php echo $activity->title ?></option>
                     <?php endforeach ?>
                    </select>
                </div>
                <div style="display: inline-block">
                    <select name="status_id" style="width: 85px">
                        <option value=''>Status</option>

                        <?php foreach ($statuses as $status) : ?>
                            <option value="<?php echo $status->id ?>"
                            <?php echo (!empty($filter['status_id']) && $filter['status_id'] ==  $status->id)? "selected='selected'":"" ?>>
                                <?php echo $status->title ?></option>
                        <?php endforeach ?>

                    </select>
                </div>

                <div style="display: inline-block">
                    <select name="user_id" style="width: 80px">
                        <option value=''>User</option>

                        <?php foreach ($users as $user) : ?>
                            <option value="<?php echo $user->id ?>"
                            <?php echo (!empty($filter['user_id']) && $filter['user_id'] ==  $user->id )? "selected='selected'":"" ?>>
                                <?php echo $user->username ?></option>
                        <?php endforeach ?>

                    </select>
                </div>

                <div style="display: inline-block">
                    <input id="date" type="text" name="date" class="text date_picker" value= " <?php echo (!empty($filter['date']))? $filter['date']:"" ?>"  style="Width: 90px" /><
                </div>


                <div style="display: inline-block">
                    <input type="submit" value="Filter" class="submit small" />|
                    <input type="button" value ="Clear" class="submit small" onClick = "window.location = '<?php echo site_url('logtime/clearFilter')?>'" />
                </div>

            </form>
        </div>
        <br/>
        <hr/>

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
            <?php $total_hours = $total_mins = 0; if (empty ($logtimes)) : ?>
                
            <tr>
                <td colspan="7" class="nodatamsg">No entry is available.</td>
            </tr>

            <?php else : foreach($logtimes AS $logtime) : ?>
                
            <tr>
                <td class="centered"><?php echo $logtime->project_title ?></td>
                <td class="centered"><?php echo $logtime->team_title ?></td>
                <td class="centered"><?php echo $logtime->username ?></td>
                <td class="centered"><?php echo DateHelper::mysqlToHuman($logtime->date) ?></td>
                <td class="centered"><?php $total_hours += $logtime->hours; echo $logtime->hours ?></td>
                <td class="centered"><?php $total_mins += $logtime->mins; echo $logtime->mins ?></td>
                <td class="action">
                    <a href="<?php echo site_url("logtime/edit/{$logtime->id}") ?>">Edit</a>
                    | <a href="<?php echo site_url("logtime/delete/id/{$logtime->id}") ?>" id='delete'>Delete</a>

                </td>
            </tr>
            <?php endforeach; endif;
                $total_mins += ($total_hours * 60);
                $total_mins  = $total_mins /60;
                $total_hours = floor($total_mins);
                $total_mins  = $total_mins - $total_hours;
            ?>


             <tr>
                <td class="centered" colspan="3"></td>
                <td class="centered" ><p style="font-weight: bold;">Total</p></td>
                <td class="centered"><?php echo $total_hours ?></td>
                <td class="centered"><?php echo $total_mins ?></td>
                <td class="action"></tr>
                
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