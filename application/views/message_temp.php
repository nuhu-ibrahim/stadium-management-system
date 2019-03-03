<?php
    if ($this->session->flashdata('flashError'))
    {
        $message = $this->session->flashdata('flashError');
?>
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <?php echo $message['message']; ?>
    </div>
<?php   
    }
?>
    
<?php
    if ($this->session->flashdata('flashSuccess'))
    {
    $message = $this->session->flashdata('flashSuccess');
?>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
        </button>
        <?php echo $message['message']; ?>
    </div>
<?php   
    }
?>