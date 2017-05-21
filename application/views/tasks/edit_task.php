<h1>Edit Task</h1>
<p>List:<strong> <?= $list_name; ?></strong></p>

<!--Display Errors-->
<?= validation_errors('<p class="text-error">'); ?>
<?= form_open('tasks/edit/'.$this->uri->segment(3).''); ?>

<!--Field: Task Name-->
<p>
<?= form_label('Task Name:'); ?>
<?php
$data = array(
              'name'        => 'task_name',
              'value'       => $this_task->task_name
            );
?>
<?= form_input($data); ?>
</p>

<!--Field: Task Body-->
<p>
<?= form_label('Task Body:'); ?>
<?php
$data = array(
              'name'        => 'task_body',
              'value'       => $this_task->task_body
            );
?>
<?= form_textarea($data); ?>
</p>

<!--Field: Date-->
<p>
<?= form_label('Date:'); ?>
<input type="date" name="due_date" value="<?= $this_task->due_date; ?>"/>
</p>

<!--Submit Buttons-->
<?php $data = array("value" => "Update Task",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<p>
    <?= form_submit($data); ?>
</p>
<?= form_close(); ?>