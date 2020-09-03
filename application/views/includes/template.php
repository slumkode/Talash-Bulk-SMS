<?php $this->load->view('includes/header'); ?>

<?php $this->load->view('includes/top-header'); ?>

<section id="main">
    <div class="container">
        <div class="row">
            <?php $this->load->view($main_body); ?>
        </div>
    </div>
</section>

<?php $this->load->view('includes/footer'); ?>