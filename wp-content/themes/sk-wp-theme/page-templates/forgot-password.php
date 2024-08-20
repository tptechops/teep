<?php
/*
Template Name: Forget Password
*/

get_header();
?>
<style>
    .forget-password-container {
        border: 1px solid #8c9db9;
        border-radius: 6px;
        background: #fff;
        box-shadow: 0 0 12px #4473c58a;
        width: 50%;
        margin: 50px auto;
    }

    input[type="text"] {
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

    .forget-password-container .form-sec {
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
    <div class="forget-password-container">
        <div class="blue-heading">Forget Password</div>
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
                        $new_password = $_POST['password'];
                        $retype_password = $_POST['retype_password'];

                        if ($new_password === $retype_password) {
                            reset_password($user, $new_password);
                            echo '<b><p>Your password has been reset successfully. You can now <a href="' . wp_login_url() . '">log in</a>.</p></b>';
                        } else {
                            echo '<b><p>Passwords do not match.</p></b>';
                        }
                    }
                    ?>
                    <form method="post">
                        <label for="password">New Password:</label>
                        <input type="password" name="password" id="password" required>

                        <label for="retype_password">Retype Password:</label>
                        <input type="password" name="retype_password" id="retype_password" required>

                        <input type="submit" name="reset_password" value="Reset Password">
                    </form>
                    <?php
                }
            } else {
                // Handle password reset email sending
                if (isset($_POST['submit'])) {
                    $user_login = sanitize_text_field($_POST['user_login']);
                    $user = get_user_by('email', $user_login);

                    if (!$user) {
                        $user = get_user_by('login', $user_login);
                    }

                    if ($user) {
                        $reset_key = get_password_reset_key($user);
                        $reset_url = 'https://18.220.246.60/teep/reset-password/?action=rp&key=' . $reset_key . '&login=' . rawurlencode($user->user_login);
                        $message = "To reset your password, visit the following address:\n\n" . $reset_url;

                        wp_mail($user->user_email, 'Password Reset', $message);
                        echo '<p class="mb-3"><b>An email has been sent to your registered email address.</b></p>';
                    } else {
                        echo '<p>User not found.</p>';
                    }
                }
                ?>
                <form method="post">
                    <label for="user_login">Enter your email or username:</label><br />
                    <input type="text" name="user_login" id="user_login" required><br /><br />
                    <input type="submit" name="submit" value="Reset Password">
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</div>
<?php
get_footer();
?>