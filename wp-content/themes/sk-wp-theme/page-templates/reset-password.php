<?php
/*
Template Name: Reset Password
*/

get_header();
?>
<style>
    .reset-password-container {
        border: 1px solid #8c9db9;
        border-radius: 6px;
        background: #fff;
        box-shadow: 0 0 12px #4473c58a;
        width: 50%;
        margin: 50px auto;
    }

    input#custom_pass,
    input#custom_pass_confirm {
        width: 100%;
        border: 1px solid #8db5db;
        background: #f6f6f6;
        border-radius: 7px;
        font-size: 14px;
        padding: 8px;
        margin-top: 8px;
    }

    .blue-heading {
        text-align: center;
        background: #4473c5;
        color: #fff;
        font-weight: 600;
        font-size: 19px;
        padding: 8px 0;
        border-radius: 4px 4px 0 0;
    }

    .reset-password-container .form-sec {
        padding: 30px 40px;
    }

    input[type="submit"] {
        border: 1px solid #fd9f01;
        color: #fff;
        background: #fd9f01;
        box-shadow: 0px 1px 4px #000000a3;
        width: 160px;
        font-size: 16px;
        padding: 7px 20px;
        border-radius: 7px;
    }
</style>
<div class="container">
    <div class="reset-password-container">
        <div class="blue-heading">Reset Password</div>
        <div class="form-sec">
            <?php
            // Handle password reset request
            if (isset($_GET['action']) && $_GET['action'] === 'rp' && isset($_GET['key']) && isset($_GET['login'])) {
                $user_login = sanitize_user($_GET['login']);
                $key = sanitize_text_field($_GET['key']);

                $user = check_password_reset_key($key, $user_login);

                if (is_wp_error($user)) {
                    echo '<p>Invalid or expired key. Please try again.</p>';
                } else {
                    if (isset($_POST['reset_password'])) {
                        $new_password = $_POST['custom_pass'];
                        $retype_password = $_POST['custom_pass_confirm'];

                        if ($new_password === $retype_password) {
                            reset_password($user, $new_password);
                            echo '<b><p>Your password has been reset successfully. You can now <a href="/teep/sign-in/">log in</a>.</p></b>';
                        } else {
                            echo '<b><p>Passwords do not match.</p></b>';
                        }
                    }
                    ?>
                    <form method="post">
                        <label for="password">New Password:</label><br />
                        <div class="d-flex mb-5">
                            <!-- <input type="password" name="password" id="password" required> -->
                            <input type="password" name="custom_pass"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                title="Must contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character"
                                id="custom_pass" placeholder="Password *" required>
                            <i class="far fa-eye" id="togglePassword"
                                style="margin-left: -30px;cursor: pointer;margin-top: 17px;"></i><br /><br />
                        </div>
                        <label for="retype_password">Retype Password:</label><br />
                        <div class="d-flex mb-5">
                            <input type="password" name="custom_pass_confirm"
                                pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$"
                                title="Must contain minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character"
                                id="custom_pass_confirm" placeholder="Confirm Your Password *" required>
                            <!-- <input type="password" name="retype_password" id="retype_password" required> -->
                            <i class="far fa-eye" id="togglePassword1"
                                style="margin-left: -30px;cursor: pointer;margin-top: 17px;"></i><br /><br />
                        </div>
                        <input type="submit" name="reset_password" value="Reset Password"><br />
                    </form>
                    <?php
                }
            } else {
                echo '<p>Invalid request.</p>';
            }
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>