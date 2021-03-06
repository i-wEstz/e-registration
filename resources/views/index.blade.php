<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.head')
</head>
<body>
        <div class="views">
                <div class="view view-main">
        <div data-page="login" class="page no-navbar">
                <!-- Begin: Page Content -->
              <div class="page-content">
                    <div class="content-block">
                        <img class="logo" src="assets/custom/img/logo.svg" alt="Nectar" />
                    </div>
            
                    <form name="login" action="#" method="POST" enctype="multipart/form-data">
                        <div class="list-block no-hairlines">
                            <ul>
                                <li>
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="material-icons">mail_outline</i>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-input">
                                                <input type="email" name="email" placeholder="Email" required />
                                            </div>
                                            <div class="item-text input-error"></div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="item-content">
                                        <div class="item-media">
                                            <i class="material-icons">lock_outline</i>
                                        </div>
                                        <div class="item-inner">
                                            <div class="item-input">
                                                <input type="password" name="password" placeholder="Password" data-toggle="show-hide-password" required />
                                            </div>
                                            <div class="item-after show-hide-password">
                                                <a href="#" class="color-gray" title="Show" data-action="show-hide-password">
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                            </div>
                                            <div class="item-text input-error"></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <a href="forgot-password.html">Forgot Password?</a>
                        </div>
                        <div class="content-block">
                            <button type="submit" class="button button-big button-block button-fill">Log In</button>
                            <p class="text-center">Don't have an account? <a href="signup.html">Sign Up</a></p>
                        </div>
                    </form>
            
                </div>
                <!-- End: Page Content -->
            </div>
        </div>
    </div>
     @include('includes.script')
</body>
</html>