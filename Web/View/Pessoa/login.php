<?php header("Content-type: text/html; charset=iso-8859-1"); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>SGCOPEX - Sistema de Gerenciamento da COPEX</title>

        <link href="../View/assets/css/bootstrap.css" rel="stylesheet">
        <link href="../View/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="../View/assets/css/style.css" rel="stylesheet">
        <link href="../View/assets/css/style-responsive.css" rel="stylesheet">
    </head>
    <body>
        <div id="login-page">
	  	    <div class="container">
                <form method="POST" action="../Controller/Pessoa.php" class="form-login">
                    <h2 class="form-login-heading">sign in now</h2>
                    <div class="login-wrap">
                        <input type="text" name="login" class="form-control" placeholder="Login" autofocus>
                        <br>
                        <input type="password" name="senha" class="form-control" placeholder="Senha">
                        <label class="checkbox">
                            <span class="pull-right">
                                <a data-toggle="modal" href="login.html#myModal"> Esqueceu senha?</a>
                            </span>
                        </label>
                        <button type="submit" name="action" value="logar" class="btn btn-theme btn-block" ><i class="fa fa-lock"></i> SIGN IN</button>
                        <hr>
                        <!-- <div class="login-social-link centered">
                        <p>or you can sign in via your social network</p>
                            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
                            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
                        </div> -->
                        <div class="registration">
                            Ainda não tem uma conta?<br/>
                            <a class="" href="?action=show_cad">
                                Cadastre-se
                            </a>
                        </div>
                    </div>
            
                    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title">Forgot Password ?</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Enter your e-mail address below to reset your password.</p>
                                    <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
            
                                </div>
                                <div class="modal-footer">
                                    <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                                    <button class="btn btn-theme">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
		      </form>	  	
	  	    </div>
	    </div>
        <script src="../View/assets/js/jquery.js"></script>
        <script src="../View/assets/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="../View/assets/js/jquery.backstretch.min.js"></script>
        <script>
            $.backstretch("../View/assets/img/login-bg.jpg", {speed: 500});
        </script>
  </body>
</html>
