<?php if($this->session->flashdata('registered')): ?>
    <p class="alert-dismissable alert-success"><?= $this->session->flashdata('registered'); ?></p>
<?php endif; ?>
<?php if($this->session->flashdata('login_success')): ?>
    <p class="alert-dismissable alert-success"><?= $this->session->flashdata('login_success'); ?></p>
<?php endif; ?>
<?php if($this->session->flashdata('login_failed')): ?>
    <p class="alert-dismissable alert-danger"><?= $this->session->flashdata('login_failed'); ?></p>
<?php endif; ?>
<?php if($this->session->flashdata('no_access')): ?>
    <p class="alert-dismissable alert-danger"><?= $this->session->flashdata('no_access'); ?></p>
<?php endif; ?>

<h1>Welcome to your DailyTasks personal page!</h1>
    <p>This is a simple application to help you manage your daily tasks :)</p>

    <?php if($this->session->userdata('logged_in')): ?>
<br />
<h3>My Latest Lists</h3>
<table class="table table-striped" width="50%" cellspacing="5" cellpadding="5">
    <tr>
        <th>List Name</th>
        <th>Created On</th>
        <th>View</th>
    </tr>
    <?php if(isset($lists)) : ?>
    <?php foreach($lists as $list) : ?>
    <tr>
        <td><?= $list->list_name; ?></td>
        <td><?= $list->create_date; ?></td>
        <td><a href="<?= base_url(); ?>lists/show/<?= $list->id; ?>">View List</a></td>
    </tr>
    <?php endforeach; ?>
    <?php endif; ?>
</table>

<h3>Latest Tasks</h3>
<table class="table table-striped" width="50%" cellspacing="5" cellpadding="5">
    <tr>
        <th>Task Name</th>
        <th>List Name</th>
        <th>Created On</th>
        <th>View</th>
    </tr>
    <?php if(isset($tasks)) : ?>
<?php foreach($tasks as $task) : ?>
     <tr>
        <td> <?= $task->task_name; ?></td>
         <td><?= $task->list_name; ?></td>
        <td><?= $task->create_date; ?></td>
        <td><a href="<?= base_url(); ?>tasks/show/<?= $task->id; ?>">View Task</a></td>

    </tr>
<?php endforeach; ?>
     <?php endif;?>
</table>
<?php endif;?>