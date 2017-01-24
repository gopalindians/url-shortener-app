<?php if (NULL !== $this->session->flashdata('upload_success')): ?>
    <div class="alert alert-success" role="alert"><?= $this->session->flashdata('upload_success'); ?></div>
<?php endif; ?>

<?php if (NULL !== $this->session->flashdata('upload_error')): ?>
    <div class="alert alert-danger" role="alert"><?= $this->session->flashdata('upload_error'); ?></div>
<?php endif; ?>

<style>

    /**
     * Profile image component
     */
    .profile-header-container {
        margin: 0 auto;
        text-align: center;
    }

    .profile-header-img {
        padding: 54px;
    }

    .profile-header-img > img.img-circle {
        width: 120px;
        height: 120px;
        /*border: 2px solid #51D2B7;*/
        border: 2px solid #777777;
    }

    /**
     * Ranking component
     */
    .rank-label-container {
        margin-top: -19px;
        /* z-index: 1000; */
        text-align: center;
    }

    .label.label-default.rank-label {
        /*background-color: rgb(81, 210, 183);*/
        background-color: #777777;
        padding: 5px 10px 5px 10px;
        border-radius: 27px;
    }
</style>
<div class="container">
    <div class="row">
        <div class="profile-header-container">
            <span class="small"><a href="/url-app/profile/editImage"> Update profile image</a></span>

            <div class="profile-header-img">
                <h3><span class="label label-default"><?= $this->session->userdata('email') ?></span></h3>
                <?php if ($profileImage !== NULL): ?>
                    <img class="img-circle"
                         src="/uploads/<?= $profileImage ?>"/>
                <?php else: ?>
                    <img class="img-circle"
                         src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120"/>
                <?php endif; ?>
                <!-- badge -->
                <div class="rank-label-container">
                    <h4><span class="label label-default rank-label"><?= isset($urlCount) ? $urlCount : 0 ?> Url Shortened</span>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>