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

<div class=" col-lg-offset-4">
    <?= form_open('/url-app/url/handleUrl', ['class' => 'form-inline']) ?>
    <div class="form-group">
        <input type="url" class="form-control" id="url" placeholder="http://mylongurl.com" name="url">
    </div>
    <button type="submit" class="btn btn-default">Shorten it</button>
    <?= form_close() ?>
</div>