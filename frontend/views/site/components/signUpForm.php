<?php 
$model = new common\models\SignupForm();
$form = \yii\widgets\ActiveForm::begin(['id' => 'form-signup']); ?>
<!--<form class="form-register">-->
    <h3>Sign Up</h3>
    <p>Enter your account details below:</p>

    <div class="errorHandler alert alert-danger no-display">
            <i class="fa fa-remove-sign"></i> You have some form errors. Please check below.
    </div>
    <fieldset>
        <div class="form-group">
                <span class="input-icon">
                        <input type="text" class="form-control" name="SignupForm[username]" placeholder="User Name" id="signupform-username">
                        <i class="fa fa-user"></i> </span>
        </div>
        <div class="form-group">
                <span class="input-icon">
                        <input typeemail class="form-control" name="SignupForm[email]" placeholder="Email" id="signupform-email">
                        <i class="fa fa-envelope"></i> </span>
        </div>
        <div class="form-group">
                <span class="input-icon">
                        <input type="password" class="form-control" id="SignupForm[password]" name="password" placeholder="Password" id="signupform-password">
                        <i class="fa fa-lock"></i> </span>
        </div>
        <div class="form-group">
                <span class="input-icon">
                        <input type="password" class="form-control" name="password_again" placeholder="Password Again" id="">
                        <i class="fa fa-lock"></i> </span>
        </div>
        <div class="form-group">
                <div>
                        <label for="agree" class="checkbox-inline">
                                <input type="checkbox" class="grey agree" id="agree" name="agree">
                                I agree to the Terms of Service and Privacy Policy
                        </label>
                </div>
        </div>
        
        <p>
            Enter your personal details below:
        </p>
        
        <div class="form-group">
                <input type="text" class="form-control" name="full_name" placeholder="Full Name" id="">
        </div>
        <div class="form-group">
                <input type="text" class="form-control" name="address" placeholder="Address" id="">
        </div>
        <div class="form-group">
                <input type="text" class="form-control" name="city" placeholder="City" id="">
        </div>
        <div class="form-group">
                <div>
                        <label class="radio-inline">
                                <input type="radio" class="grey" value="F" name="gender" id="">
                                Female
                        </label>
                        <label class="radio-inline">
                                <input type="radio" class="grey" value="M" name="gender" id="">
                                Male
                        </label>
                </div>
        </div>
        
        <div class="form-actions">
                Already have an account?
                <a href="#" class="go-back">
                        Log-in
                </a>
                <button type="submit" class="btn btn-green pull-right">
                        Submit <i class="fa fa-arrow-circle-right"></i>
                </button>
        </div>
        
    </fieldset>
<!--</form>-->
<?php \yii\widgets\ActiveForm::end(); ?>