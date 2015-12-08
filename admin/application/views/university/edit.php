<?php 
    $this->load->view("partials/top_menus"); 
?>

<div class="container-fluid">
    <div class="row">
        <?php $this->load->view("partials/aside_menus"); ?>
        <div class="col-xs-10 main tab-content">
            <form method="post" action="<?php echo base_url(); ?>university/save">
                
            </form>
        </div>
    </div>
</div>