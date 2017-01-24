<?php if ('' !== validation_errors()): ?>
    <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
<?php endif; ?>


<?php if (NULL !== $this->session->flashdata('url_success')): ?>
    <div class="alert alert-success" role="alert">
        Shortened url is <a target="_blank"
                            href="<?= base_url('url-app/url/r/') . $this->session->flashdata('url_success') ?>">
            <?= base_url('url-app/url/r/') . $this->session->flashdata('url_success'); ?>
        </a>
    </div>
<?php endif; ?>


<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3" id="main">
    <?= form_open('/url-app/url/handleUrl') ?>
    <div class="form-group">
        <input type="url" class="form-control" id="url" placeholder="http://mylongurl.com" name="url" required>
    </div>
    <div class="text-center">
        <button type="submit" class="btn btn-default">Shorten it</button>
    </div>
    <?= form_close() ?>
</div>