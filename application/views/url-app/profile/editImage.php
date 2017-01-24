<?= isset($error) ? $error : ''; ?>

<?= form_open_multipart('/url-app/profile/do_upload', ['class' => 'form-group']); ?>

    <input type="file" name="userfile" size="20"/>

    <br/><br/>

    <input type="submit" value="upload" class="btn  btn-default"/>

<?= form_close() ?>