<h1>Log in or create an account</h1>
<?php if($error): ?>
<div class="alert alert-danger" role="alert">
  <?=$error?>
</div>
<?php endif; ?>
<div id="content">
    <div>
        <h3>Log in</h3>
        <form action="/account/login" method="post">
            <?php
                $csrf = array(
                    'name' => $this->security->get_csrf_token_name(),
                    'hash' => $this->security->get_csrf_hash()
                );
            ?>
            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
            <div class="form-group">
                <label>Username (your email)</label>
                <input type="text" class="form-control input-lg" value="" placeholder="Please type your username/email" name="username" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control input-lg" value="" placeholder="Please type your password" name="pwd" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Log in</button>
            </div>
        </form>
    </div>
    <div>
        <h3>Create an account</h3>
        <form action="/account/create" method="post">
            <?php
                $csrf = array(
                    'name' => $this->security->get_csrf_token_name(),
                    'hash' => $this->security->get_csrf_hash()
                );
            ?>
            <input type="hidden" name="<?=$csrf['name'];?>" value="<?=$csrf['hash'];?>" />
            <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control input-lg" value="<?=$this->session->fname?>" placeholder="Please type your first name" name="fname" />
            </div>
            <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control input-lg" value="<?=$this->session->lname?>" placeholder="Please type your last name" name="lname" />
            </div>
            <div class="form-group">
                <label>Email (this will be your username)</label>
                <input type="text" class="form-control input-lg" value="<?=$this->session->username?>" placeholder="Please type your email address" name="username" />
            </div>
            <div class="form-group">
                <label>Confirm email</label>
                <input type="text" class="form-control input-lg" value="<?=$this->session->confirmUsername?>" placeholder="Please type your email again" name="confirmUsername" />
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control input-lg" value="<?=$this->session->pwd?>" placeholder="Please type your password" name="pwd" />
            </div>
            <div class="form-group">
                <label>Confirm password</label>
                <input type="password" class="form-control input-lg" value="<?=$this->session->confirmPwd?>" placeholder="Please type your password again" name="confirmPwd" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create your account</button>
            </div>
        </form>
    </div>
</div>