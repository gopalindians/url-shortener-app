<?php if (NULL !== $this->session->flashdata('signup_success')): ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('signup_success'); ?></div>
<?php endif; ?>

<h1>Home</h1>