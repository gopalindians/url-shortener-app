<?php if ('' !== validation_errors()): ?>
    <div class="alert alert-danger" role="alert"><?= validation_errors(); ?></div>
<?php endif; ?>
<?= form_open('/url-app/account/handleSignup', ['class' => 'form-horizontal', 'method' => 'post']) ?>
    <div class="form-group">
        <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-10">
            <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email'); ?>"
                   required>
        </div>
    </div>
    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
    </div>

    <div class="form-group">
        <label for="inputPassword3" class="col-sm-2 control-label">Password Confirm</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" placeholder="Password Confirm"
                   name="passwordConfirm" required>
        </div>
    </div>

    <!--Add your own key here-->
    <div class="g-recaptcha pull-right" data-sitekey="6LedKxEUAAAAADdyZQl6bRUI1gQYgWzuij7L9ELm"></div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-success">Sign up</button>
        </div>
    </div>
<?= form_close() ?>