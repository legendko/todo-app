<ul id="actions">
    <h4>List Actions</h4>
    <li><a href="<?= base_url();?>tasks/add/<?= $list->id;?>">Add Task</a></li>
    <li><a href="<?= base_url();?>lists/edit/<?= $list->id;?>">Edit List</a></li>
    <li><a onclick="return confirm('Are you sure?')" href="<?= base_url();?>lists/delete/<?= $list->id;?>">Delete List</a></li>
</ul>
<?php if($this->session->flashdata('task_deleted')) : ?>
    <?= '<p class="text-success">' .$this->session->flashdata('task_deleted') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('task_created')) : ?>
    <?= '<p class="text-success">' .$this->session->flashdata('task_created') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('task_updated')) : ?>
    <?= '<p class="text-success">' .$this->session->flashdata('task_updated') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('marked_complete')) : ?>
    <?= '<p class="text-success">' .$this->session->flashdata('marked_complete') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('marked_new')) : ?>
    <?= '<p class="text-success">' .$this->session->flashdata('marked_new') . '</p>'; ?>
<?php endif; ?>
<h1><?= $list->list_name;?></h1>
Created on:  <strong><?= date("d-M-Y",strtotime($list->create_date)); ?></strong>
<br /><br />
<div style="max-width:500px;"><?= $list->list_body; ?></div>
<br /><br />
<h4> Current Active Tasks: </h4>
<?php if($active_tasks) : ?>
    <ul>
    <?php foreach($active_tasks as $task) : ?>
        <li><a href="<?= base_url(); ?>tasks/show/<?= $task->task_id; ?>"><?= $task->task_name; ?></a></li>
    <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>There are no active tasks</p>
<?php endif; ?>
<br />

<h4> Completed Tasks: </h4>
<?php if($inactive_tasks) : ?>
    <ul>
    <?php foreach($inactive_tasks as $task) : ?>
        <li><a href="<?= base_url(); ?>tasks/show/<?= $task->task_id; ?>"><?= $task->task_name; ?></a></li>
    <?php endforeach; ?>
    </ul>
<?php else : ?>
    <p>There are no completed tasks</p>
<?php endif; ?>
<br />