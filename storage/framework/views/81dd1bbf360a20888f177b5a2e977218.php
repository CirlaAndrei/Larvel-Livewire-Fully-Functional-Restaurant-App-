<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant</title>
    <meta name="description" content="Proiect Restaurant">
    <meta name="googlebot" content="index,follow">
    <meta name="robots" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <meta name="googlebot" content="max-snippet:-1,max-image-preview:large,max-video-preview:-1"/>
    <link rel="stylesheet" href="<?php echo e(asset('style.css')); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap" rel="stylesheet">
</head>
<body>
<nav class="nav">
    <div class="poza-logo">
    <a href="/"><img src="imagini/Logo-Restaurant.svg" alt="poza logo"></a>
    </div>
    <div class="nav-container">
        <ul class="nav-items">
            <li><a class="nav-element" href='/'>HOME</a></li>
        </ul>
        <div class="butoane-log">
            <button class="btn-sign" id="signButton" type="button">Sign in</button>
            <button class="btn-log" id="logButton" type="button">Log in</button>
        </div>
    </div>
</nav>
        <div class="Sign-In-Page">
            <div class="formular-sign">
            <div  class="flex-already">
               <a href="<?php echo e(route('login')); ?>"><p><?php echo e(__('Already have an account?')); ?></p></a>
            </div>
            <form class="form-sign" action="<?php echo e(route('register')); ?>" method="POST">
            <?php echo csrf_field(); ?>
                <div class="row1-sign">
                        <input class="input-sign" type="text" placeholder="First Name"  name="name" value="<?php echo e(__('name')); ?>" required>
                        <input class="input-sign" type="text"  placeholder="Last Name" name="last">
                    </div>
                    <div class="row2-sign">
                        <input class="input-sign-email" type="text" placeholder="Email"  name="email" value="<?php echo e(__('email')); ?>" required >
                    </div>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="row3-sign">
                        <input class="input-password" type="password" placeholder="Password" name="password" id="Password" value="<?php echo e(__('password')); ?>" required >
                        <span class="toggle-password" onclick="togglePasswordVisibility('Password')">
                            <img src="imagini/Iconita-Ochi.svg" alt="Toggle Password" class="eye-icon">
                        </span>
                    </div>
                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <div class="row4-sign">
                        <input class="input-sign-confirm" type="password" placeholder="Confirm Password" name="password_confirmation" id="confirmPassword">
                        <span class="toggle-password" onclick="togglePasswordVisibility('confirmPassword')">
                            <img src="imagini/Iconita-Ochi.svg" alt="Toggle Password" class="eye-icon">
                        </span>
                    </div>
                    <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="error-message"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                <?php if(Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature()): ?>
                <div class="checkbox">
                    <input type="checkbox" class="check" id="terms" name="terms" value="check" required>
                    <label for="terms">
                        I agree to the
                        <a href="<?php echo e(route('terms.show')); ?>" target="_blank">Terms of Service</a>
                        and
                        <a href="<?php echo e(route('policy.show')); ?>" target="_blank">Privacy Policy</a>.
                    </label>
                </div>
                <?php endif; ?>
            <button class="btn-sign-in" type="submit">Create account</button <?php echo e(__('register')); ?>>
            </form>
            <p class="or">Or sign in with</p>
            <div class="butoane-create-account">
                <button class="btn-google" type="button" onclick="window.location='<?php echo e(route('google.redirect')); ?>'">
                     <img src="imagini/Iconita-Google.svg" alt="Google Icon" class="btn-icon"> <p>Google</p>
                </button>
                <button class="btn-facebook" type="button" onclick="window.location='<?php echo e(route('facebook.redirect')); ?>'">
                    <img src="imagini/Iconita-Facebook.svg" alt="Facebook Icon" class="btn-icon"> <p>Facebook</p>
                </button>
            </div>
            </div>
        </div>
        <footer class="footer1">
        <div class="social-media">
            <div class="social">
                <img class="poza-social" src="imagini/Icoana-Facebook-Desktop.svg" alt="poza instagram">
                <img class="poza-social" src="imagini/Icoana-Instagram-Desktop.svg" alt="poza facebook">
                <img class="poza-social" src="imagini/Icoana-Youtube-Desktop.svg" alt="poza twitter">
                <img class="poza-social" src="imagini/Icoana-X-Desktop.svg" alt="poza youtube">
            </div>
        </div>
    </footer>
    </body>
<script>
    const routes = {
        login: "<?php echo e(route('login')); ?>",
        register: "<?php echo e(route('register')); ?>"
    };
</script>
<script src="<?php echo e(asset('index.js')); ?>"></script>
</html><?php /**PATH C:\xampp\htdocs\Restaurant - Copy\resources\views/auth/register.blade.php ENDPATH**/ ?>