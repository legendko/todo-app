<h1>Lists</h1>
<?php if($this->session->flashdata('list_created')) : ?>
    <?= '<p class="text-success">' .$this->session->flashdata('list_created') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('list_deleted')) : ?>
    <?= '<p class="text-success">' .$this->session->flashdata('list_deleted') . '</p>'; ?>
<?php endif; ?>
<?php if($this->session->flashdata('list_updated')) : ?>
    <?= '<p class="text-success">' .$this->session->flashdata('list_updated') . '</p>'; ?>
<?php endif; ?>
<p>These are your current lists:</p>
<ul class="list_items">
<?php foreach($lists as $list): ?>
    <li>
        <div class="list_name"><a href="<?= base_url();?>lists/show/<?= $list->id;?>"><?= $list->list_name.'<br>'; ?></a></div>
        <div class="list_body"><?= $list->list_body.'<br>'; ?></div>
        
    </li>
<?php endforeach; ?>
</ul>
<br>
<p><a href="<?= base_url();?>lists/add">Create a New List</a></p>
