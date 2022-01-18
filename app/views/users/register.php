<?php require APPROOT . '/views/parts/header.php'; ?>

<main class="form-signin" style="max-width: 420px; margin:100px auto 100px;">
    <form action="<?php echo URLROOT . '/users/register'; ?>" method="POST">
        <h1>Register</h1>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control <?php echo (!empty($data['name_err'])) ? 'is-invalid' : '';  ?> " id="name" value="<?php echo $data['name']; ?>" aria-describedby="nameHelp">
            <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : '';  ?> " id="email" value="<?php echo $data['email']; ?>" aria-describedby="emailHelp">
            <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : '';  ?> " id="password" value="<?php echo $data['password']; ?>" aria-describedby="passwordHelp">
            <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" class="form-control <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : '';  ?> " id="confirm_password" value="<?php echo $data['confirm_password']; ?>" aria-describedby="confirm_passwordHelp">
            <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>
        </div>

        <div class="row mt-3">
            <div class="col">
                <input type="submit" value="Register" class="btn btn-success btn-block">
            </div>
            <div class="col">
                <a href="<?php echo URLROOT . '/users/login'; ?>" class="btn btn-light btn-block">Have an account? Login</a>
            </div>
        </div>
    </form>
</main>
<?php require APPROOT . '/views/parts/footer.php'; ?>