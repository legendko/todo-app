<h1>Add a List</h1>
<p>Please fill out the form below to create a new task list</p>
<!--Display Errors-->
<?= validation_errors('<p class="text-error">'); ?>
<?= form_open('lists/add'); ?>
<!--Field: List Name-->
<p>
<?= form_label('List Name:'); ?>
<?php
$data = array(
              'name'        => 'list_name',
              'value'       => set_value('list_name')
            );
?>
<?= form_input($data); ?>
</p>
<!--Field: List Body-->
<p>
<?= form_label('List Body:'); ?>
<?php
$data = array(
              'name'        => 'list_body',
              'value'       => set_value('list_body')
            );
?>
<?= form_textarea($data); ?>
</p>

<!--Submit Buttons-->
<?php $data = array("value" => "Add List",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<p>
    <?= form_submit($data); ?>
</p>
<?= form_close(); ?>

