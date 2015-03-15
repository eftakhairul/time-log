<div class="block">

    <?php if (!empty($errorMessage)) : ?>
    <div class="message errormsg">
        <?php echo $errorMessage ?>
    </div>
    <?php endif ?>

    <div class="block_content">

        <form id = "create_entry_form" action="<?php echo site_url('logtime/edit/' . $logtime->id ) ?>" method="POST">

            <p>
                <label for="project_id">
                    Project Name: <span class="required">*</span>
                </label>

                <select id="project_id" name="project_id" class="styled">
                    <option value=''>- Select -</option>

                    <?php foreach ($projects as $project) : ?>
                        <option value="<?php echo $project->id ?>"
                            <?php echo ($project->id == $logtime->project_id)? 'selected="selected"' : '' ?>>
                            <?php echo $project->title ?></option>
                    <?php endforeach ?>

                </select>
                <span class='note error'>
                    <?php echo form_error('project_id') ?>
                </span>
            </p>



              <p>
                <label for="team_id">
                    Team: <span class="required">*</span>
                </label>

                <select id="team_id" name="team_id" class="styled">
                    <option value=''>- Select -</option>

                    <?php foreach ($teams as $team) : ?>
                        <option value="<?php echo $team->id ?>"
                            <?php echo ($team->id == $logtime->team_id)? 'selected="selected"' : '' ?>>
                            <?php echo $team->title ?></option>
                    <?php endforeach ?>

                </select>
                <span class='note error'>
                    <?php echo form_error('team_id') ?>
                </span>
            </p>


              <p>
                <label for="status_id">
                   Status : <span class="required">*</span>
                </label>

                <select id="status_id" name="status_id" class="styled">
                    <option value=''>- Select -</option>

                    <?php foreach ($statuses as $status) : ?>
                        <option value="<?php echo $team->id ?>"
                            <?php echo ($status->id == $logtime->status_id)? 'selected="selected"' : '' ?>>
                            <?php echo $status->title ?></option>
                    <?php endforeach ?>

                </select>
                <span class='note error'>
                    <?php echo form_error('status_id') ?>
                </span>
            </p>


            <p>
                <label for="type_id">
                   Type : <span class="required">*</span>
                </label>

                <select id="type_id" name="type_id" class="styled">
                    <option value=''>- Select -</option>

                    <?php foreach ($types as $type) : ?>
                        <option value="<?php echo $type->id ?>"
                            <?php echo ($type->id == $logtime->type_id)? 'selected="selected"' : '' ?>>
                            <?php echo $type->title ?></option>
                    <?php endforeach ?>

                </select>
                <span class='note error'>
                    <?php echo form_error('type_id') ?>
                </span>
            </p>


             <p>
                <label for="activity_id">
                   Activity : <span class="required">*</span>
                </label>

                <select id="activity_id" name="activity_id" class="styled">
                    <option value=''>- Select -</option>

                    <?php foreach ($activities as $activity) : ?>
                        <option value="<?php echo $activity->id ?>"
                            <?php echo ($activity->id == $logtime->activity_id)? 'selected="selected"' : '' ?>>
                            <?php echo $activity->title ?></option>
                    <?php endforeach ?>

                </select>
                <span class='note error'>
                    <?php echo form_error('activity_id') ?>
                </span>
            </p>

             <p>
                <label for="date">
                    Date: <span class="required">*</span>
                </label>

                <input id="date" type="text" name="date" class="text date_picker" value= "<?php echo set_value('date', $logtime->date)?>" /><br />
                <span class='note error'>
                    <?php echo form_error('date') ?>
                </span>
            </p>


              <p>
                <label for="hours">
                   Hrs : <span class="required">*</span>
                </label>

                <select id="hours" name="hours" class="styled">
                    <?php foreach ([0, 1,2,3,4,5,6,7,8,9,10, 11,12,13,14,15,16, 17, 18, 19,20, 21, 22, 23] as $hours) : ?>
                        <option value="<?php echo $hours ?>"
                            <?php echo ($hours == $logtime->hours)? 'selected="selected"' : '' ?>>
                            <?php echo $hours ?></option>
                    <?php endforeach ?>
                </select>
            </p>

            <p>
                <label for="mins">
                   Min : <span class="required">*</span>
                </label>

                <select id="mins" name="mins" class="styled">
                    <?php foreach ([0, 15, 30, 45] as $mins) : ?>
                        <option value="<?php echo $mins ?>"
                            <?php echo ($mins == $logtime->mins)? 'selected="selected"' : '' ?>>
                            <?php echo $mins ?></option>
                    <?php endforeach ?>
                </select>
            </p>

            <p>
                <label for="notes">
                  Notes:
                </label>

                <input id="notes" type="text" name="notes" class="text large" value= "<?php echo set_value('notes', $logtime->notes )?>" /><br />
            </p>

            <p>
                <input type="submit" value="Update" class="submit small" id="submit_entry" />
                <input type="button" value ="Exit" class="submit small" onClick = "window.location = '<?php echo site_url('logtime')?>'" />
            </p>

        </form>
    </div>		<!-- .block_content ends -->
</div>		<!-- .block ends -->

<script type="application/javascript">
      jQuery(function($) {
        $('input.date_picker').date_input();
      });
</script>