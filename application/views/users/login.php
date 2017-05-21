
<?php if ($this->session->userdata('logged_in')): ?>
    <p>You are logged in as <?= $this->session->userdata('username'); ?></p>
    
    <?php $attributes = array('id' => 'logout_form', 'class' => 'form-horizontal'); ?>
    <?= form_open('users/logout', $attributes); ?>
    
    <?php $data = array(
        'value' => 'Log out',
        'name' => 'submit',
        'class' => 'btn btn-primary'
    ); ?>
    <?= form_submit($data); ?>
    <?= form_close(); ?>
<?php else: ?>
    <h3>Log in</h3>
    <?php $attributes = array('id' => 'login_form', 'class' => 'form-horizontal'); ?>
    <?= form_open('users/login', $attributes); ?>

    <p>
        <?= form_label('Username:'); ?>
        <?php
        $data = array('name'        => 'username',
                      'placeholder' => 'Enter Username',
                      'style'       => 'width:90%',);
        ?>
        <?= form_input($data); ?>
    </p>
    <p>
        <?= form_label('Password:'); ?>
        <?php
        $data = array('name'        => 'password',
                      'placeholder' => 'Enter Password',
                      'style'       => 'width:90%',);
        ?>
        <?= form_password($data); ?>
    </p>
    <p>
        <?php
        $data = array('name'        => 'submit',
                      'class'       => 'btn btn-primary',
                      'value'       => 'Log in');
        ?>
        <?= form_submit($data); ?>
    </p>

    <?= form_close(); ?>
<?php endif; ?>


