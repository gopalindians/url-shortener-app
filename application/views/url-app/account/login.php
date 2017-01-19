<?php if ('' !== validation_errors()): ?>
    <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
<?php endif; ?>


<?php if (NULL !== $this->session->flashdata('login_error')): ?>
    <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('login_error'); ?></div>
<?php endif; ?>

<?= form_open('/url-app/account/handleLogin', ['class' => 'form-horizontal']) ?>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control"  placeholder="Email" name="email" required
                   value="<?= set_value('email'); ?>">
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control"  placeholder="Password" name="password" required>
        </div>
    </div>
    <!--Add your own key here-->
    <div class="g-recaptcha pull-right" data-sitekey="6LedKxEUAAAAADdyZQl6bRUI1gQYgWzuij7L9ELm"></div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default ">Sign in</button>
        </div>
    </div>


<?= form_close() ?>