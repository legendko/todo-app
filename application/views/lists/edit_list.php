<h1>Edit List</h1>
<!--Display Errors-->
<?= validation_errors('<p class="text-error">'); ?>
 <?= form_open('lists/edit/'.$this_list->id.''); ?>
<!--Field: List Name-->
<p>
<?= form_label('List Name:'); ?>
<?php
$data = array(
              'name'        => 'list_name',
              'value'       => $this_list->list_name
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
              'value'       => $this_list->list_body
            );
?>
<?= form_textarea($data); ?>
</p>

<!--Submit Buttons-->
<?php $data = array("value" => "Update List",
                    "name" => "submit",
                    "class" => "btn btn-primary"); ?>
<p>
    <?= form_submit($data); ?>
</p>
<?= form_close(); ?>