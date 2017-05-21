<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="<?= base_url(); ?>assets/css/custom.css" rel="stylesheet" type="text/css"/> 
    <link href="<?= base_url(); ?>assets/css/bootstrap.css" rel="stylesheet" type="text/css"/> 
    <title>TODOapp</title>
</head>
<body>
    
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container-fluid">
                <a class="brand" href="#">DailyTasks</a>
                <div class="nav-collapse collapse">
                    <p class="navbar-text pull-right">
                        
                    </p>
                    <ul class="nav">
                        <li><a href="<?= base_url(); ?>">Home</a></li>
                        <?php if($this->session->userdata('logged_in')): ?>
                            <li><a href="<?= base_url();?>lists">My Lists</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                <div class="well sidebar-nav">
                    <div style="margin:0 0 10px 10px;">
                        <?php $this->load->view('users/login'); ?>
                        <?php if (!$this->session->userdata('logged_in')): ?>
                            <a href="<?= base_url(); ?>users/register">Register</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="span9">
                <?php $this->load->view($main_content); ?>
            </div>
        </div>
        
    </div>
    
    <footer>
            <p>&copy; 2017</p>
    </footer>
</body>
</html>