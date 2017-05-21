<ul id="actions">
    <h4>Task Actions</h4>
    <li> <a href="<?= base_url(); ?>tasks/add/<?= $task->list_id; ?>">Add Task</a></li> 
    <li> <a href="<?= base_url(); ?>tasks/edit/<?= $task->id; ?>">Edit Task</a></li> 
    <?php if($task->is_completed != 0) : ?>
        <li> <a href="<?= base_url(); ?>tasks/mark_new/<?= $task->id; ?>">Mark New</a></li> 
    <?php else : ?>
        <li> <a href="<?= base_url(); ?>tasks/mark_complete/<?= $task->id; ?>">Mark Complete</a></li> 
    <?php endif; ?>
    <li> <a onclick="return confirm('Are you sure?')" href="<?= base_url(); ?>tasks/delete/<?= $task->list_id; ?>/<?= $this->uri->segment(3); ?>">Delete Task</a></li>
</ul>
<h1><?= $task->task_name; ?></h1>
<ul id="info">
    <li>Created On: <strong><?= date("d-M-Y",strtotime($task->create_date)); ?></strong></li>

<?php if($task->is_completed == 0) : ?>
    <li>Status: <strong>Uncomplete</strong></li>
<?php else : ?>
    <li>Status: <strong>Completed</strong></li>
<?php endif; ?>

<li>Due Date: <strong><?= date("d-M-Y",strtotime($task->due_date)); ?></strong></li>
</ul><br />
<div style="max-width:500px;"><?= $task->task_body; ?></div>
<br /><hr />
