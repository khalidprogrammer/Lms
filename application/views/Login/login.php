<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Neon Admin Panel" />
    <meta name="author" content="" />

    <title>login</title>


   
    <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic">
    <link rel="stylesheet" href="<?php echo base_url('assets_login/css/bootstrap.css'); ?>">
    
    
    <link rel="stylesheet" href="<?php echo base_url('assets_login/css/neon-forms.css'); ?>">

    <script src="<?=base_url()?>assets_login/js/jquery.min.js"></script>

   

</head>

<body class="page-body login-page login-form-fall">


    <!-- This is needed when you send requests via Ajax -->
    <script type="text/javascript">
    var baseurl = '<?php echo base_url();?>';
    </script>

    <div class="login-container">

        <div class="login-header login-caret">

            <div class="login-content" style="width:100%;">

                <a href="<?php echo base_url();?>" class="logo">
                    <img src="<?=base_url()?>assets_front/img/ashana-Logo-1.png" style="width: 100px;" alt="">
                </a>

                <p class="description">
                    <h2 style="color:#cacaca; font-weight:100;">
                        Ashna University
                    </h2>
                </p>

                <!-- progress bar indicator -->
                <div class="login-progressbar-indicator">
                    <h3>43%</h3>
                    <span>logging in...</span>
                </div>
            </div>

        </div>

        <div class="login-progressbar">
            <div></div>
        </div>

        <div class="login-form">

            <div class="login-content">

                <div class="form-login-error">
                    <h3>Invalid login</h3>
                    <p>Please enter correct email and password!</p>
                </div>

                <form method="post" role="form" id="form_login">

                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="entypo-user"></i>
                            </div>

                            <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                autocomplete="off" data-mask="email" />
                        </div>

                    </div>

                    <div class="form-group">

                        <div class="input-group">
                            <div class="input-group-addon">
                                <i class="entypo-key"></i>
                            </div>

                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" autocomplete="off" />
                        </div>

                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block btn-login">
                            <i class="entypo-login"></i>
                            Login
                        </button>
                    </div>


                </form>


               

            </div>

        </div>

    </div>


    <!-- Bottom Scripts -->
    <script src="<?php echo base_url('assets_login/js/main-gsap.js'); ?>"></script>
   
    <script src="<?php echo base_url('assets_login/js/bootstrap.js'); ?>"></script>
   
    <script src="<?php echo base_url('assets_login/js/jquery.validate.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets_login/js/neon-login.js'); ?>"></script>
   
    

</body>

</html>