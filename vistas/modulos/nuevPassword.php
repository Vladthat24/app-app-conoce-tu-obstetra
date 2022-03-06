<?php
$nuevPassword = new ControladorRegistro();
$nuevPassword->ctrNuevPassword();
$id = $nuevPassword->ctrNuevPassword();
?>

<style>
    @font-face {
        font-family: Poppins-Regular;
        src: url('../fonts/poppins/Poppins-Regular.ttf');
    }

    @font-face {
        font-family: Poppins-Medium;
        src: url('../fonts/poppins/Poppins-Medium.ttf');
    }

    @font-face {
        font-family: Poppins-Bold;
        src: url('../fonts/poppins/Poppins-Bold.ttf');
    }

    @font-face {
        font-family: Poppins-SemiBold;
        src: url('../fonts/poppins/Poppins-SemiBold.ttf');
    }

    @font-face {
        font-family: vision-bold-webfont;
        src: url('../../fonts/vision/woff/vision-bold-webfont.woff');
    }

    @font-face {
        font-family: Montserrat;
        src: url('../../fonts/montserrat/Montserrat-bold.otf');
    }

    * {
        margin: 0px;
        padding: 0px;
        box-sizing: border-box;
    }

    body,
    html {
        height: 100%;
        font-family: Poppins-Regular, sans-serif;
    }

    /*---------------------------------------------*/
    a {
        font-family: Poppins-Regular;
        font-size: 14px;
        line-height: 1.7;
        color: #252C28;
        margin: 0px;
        transition: all 0.4s;
        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
    }

    a:focus {
        outline: none !important;
    }

    a:hover {
        text-decoration: none;
        color: #333333;
    }

    /*---------------------------------------------*/
    h1,
    h2,
    h3,
    h4,
    h5,
    h6 {
        margin: 0px;
    }

    p {
        font-family: Poppins-Regular;
        font-size: 14px;
        line-height: 1.7;
        color: #666666;
        margin: 0px;
    }

    ul,
    li {
        margin: 0px;
        list-style-type: none;
    }


    /*---------------------------------------------*/
    input {
        outline: none;
        border: none;
    }

    textarea {
        outline: none;
        border: none;
    }

    textarea:focus,
    input:focus {
        border-color: transparent !important;
    }

    input:focus::-webkit-input-placeholder {
        color: transparent;
    }

    input:focus:-moz-placeholder {
        color: transparent;
    }

    input:focus::-moz-placeholder {
        color: transparent;
    }

    input:focus:-ms-input-placeholder {
        color: transparent;
    }

    textarea:focus::-webkit-input-placeholder {
        color: transparent;
    }

    textarea:focus:-moz-placeholder {
        color: transparent;
    }

    textarea:focus::-moz-placeholder {
        color: transparent;
    }

    textarea:focus:-ms-input-placeholder {
        color: transparent;
    }

    input::-webkit-input-placeholder {
        color: #adadad;
    }

    input:-moz-placeholder {
        color: #adadad;
    }

    input::-moz-placeholder {
        color: #adadad;
    }

    input:-ms-input-placeholder {
        color: #adadad;
    }

    textarea::-webkit-input-placeholder {
        color: #adadad;
    }

    textarea:-moz-placeholder {
        color: #adadad;
    }

    textarea::-moz-placeholder {
        color: #adadad;
    }

    textarea:-ms-input-placeholder {
        color: #adadad;
    }

    /*---------------------------------------------*/
    button {
        outline: none !important;
        border: none;
        background: transparent;
    }

    button:hover {
        cursor: pointer;
    }

    iframe {
        border: none !important;
    }


    /*//////////////////////////////////////////////////////////////////
[ Utility ]*/
    .txt1 {
        font-family: Poppins-Regular;
        font-size: 15px;
        color: #999999;
        line-height: 1.5;
    }

    .txt2 {
        font-family: Poppins-Regular;
        font-size: 15px;
        color: #81172d;
        line-height: 1.5;
    }

    /*//////////////////////////////////////////////////////////////////
[ login ]*/

    .limiter {
        width: 100%;
        margin: 0 auto;
    }

    .container-login100 {
        width: 100%;
        min-height: 100vh;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        align-items: center;
        padding: 15px;
        background: #fff;
    }

    .wrap-login100 {
        width: 390px;
        background: #fff;
    }

    /*------------------------------------------------------------------
[ Form ]*/

    .login100-form {
        width: 100%;
    }

    .login100-form-title {
        display: block;
        font-family: Montserrat;
        text-transform: uppercase;
        font-size: 39px;
        color: #444444;
        line-height: 1.2;
        text-align: center;
    }

    .logge {
        border-bottom: 3px solid rgb(253, 243, 121);
        margin: auto;
    }


    .login100-form-avatar {
        display: block;
        width: 200px;
        height: 200px;
        border-radius: 50%;
        overflow: hidden;
        margin: 0 auto;

    }

    .login100-form-avatar img {
        width: 100%;
    }

    /*------------------------------------------------------------------
[ Input ]*/

    .wrap-input100 {
        width: 100%;
        position: relative;
        border-bottom: 2px solid #DFDFDF;
    }

    .input100 {
        font-family: Poppins-SemiBold;
        font-size: 18px;
        color: #333333;
        line-height: 1.2;

        display: block;
        width: 100%;
        height: 52px;
        background: transparent;
        padding: 0 5px;
    }

    /*---------------------------------------------*/
    .focus-input100 {
        position: absolute;
        display: block;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
    }

    .focus-input100::before {
        content: "";
        display: block;
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;

        background: #81172d;
    }

    .focus-input100::after {
        font-family: Poppins-Medium;
        font-size: 18px;
        color: #808080;
        line-height: 1.2;

        content: attr(data-placeholder);
        display: block;
        width: 100%;
        position: absolute;
        top: 15px;
        left: 0px;
        padding-left: 5px;

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .input100:focus+.focus-input100::after {
        top: -20px;
        font-size: 15px;
        color: rgb(129, 23, 45);
    }

    .input100:focus+.focus-input100::before {
        width: 100%;
    }

    .has-val.input100+.focus-input100::after {
        top: -20px;
        font-size: 15px;
    }

    .has-val.input100+.focus-input100::before {
        width: 100%;
    }


    /*------------------------------------------------------------------
[ Button ]*/
    .container-login100-form-btn {
        width: 100%;
        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;

    }

    .login100-form-btn {
        font-family: Poppins-Medium;
        font-size: 16px;
        color: #fff;
        line-height: 1.2;
        text-transform: uppercase;

        display: -webkit-box;
        display: -webkit-flex;
        display: -moz-box;
        display: -ms-flexbox;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0 20px;
        width: 100%;
        height: 50px;
        background-color: #81172D;
        border-radius: 25px;

        box-shadow: 0 10px 30px 0px rgba(129, 23, 45, 0.5);
        -moz-box-shadow: 0 10px 30px 0px rgba(129, 23, 45, 0.5);
        -webkit-box-shadow: 0 10px 30px 0px rgba(129, 23, 45, 0.5);
        -o-box-shadow: 0 10px 30px 0px rgba(129, 23, 45, 0.5);
        -ms-box-shadow: 0 10px 30px 0px rgba(129, 23, 45, 0.5);

        -webkit-transition: all 0.4s;
        -o-transition: all 0.4s;
        -moz-transition: all 0.4s;
        transition: all 0.4s;
    }

    .login100-form-btn:hover {
        background-color: #333333;
        box-shadow: 0 10px 30px 0px rgba(51, 51, 51, 0.5);
        -moz-box-shadow: 0 10px 30px 0px rgba(51, 51, 51, 0.5);
        -webkit-box-shadow: 0 10px 30px 0px rgba(51, 51, 51, 0.5);
        -o-box-shadow: 0 10px 30px 0px rgba(51, 51, 51, 0.5);
        -ms-box-shadow: 0 10px 30px 0px rgba(51, 51, 51, 0.5);
    }



    /*------------------------------------------------------------------
[ Alert validate ]*/

    .validate-input {
        position: relative;
    }

    .alert-validate::before {
        content: attr(data-validate);
        position: absolute;
        max-width: 70%;
        background-color: #fff;
        border: 1px solid #c80000;
        border-radius: 2px;
        padding: 4px 25px 4px 10px;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        right: 0px;
        pointer-events: none;

        font-family: Poppins-Regular;
        color: #c80000;
        font-size: 13px;
        line-height: 1.4;
        text-align: left;

        visibility: hidden;
        opacity: 0;

        -webkit-transition: opacity 0.4s;
        -o-transition: opacity 0.4s;
        -moz-transition: opacity 0.4s;
        transition: opacity 0.4s;
    }

    .alert-validate::after {
        content: "\f06a";
        font-family: FontAwesome;
        font-size: 16px;
        color: #c80000;

        display: block;
        position: absolute;
        background-color: #fff;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        right: 5px;
    }

    .alert-validate:hover:before {
        visibility: visible;
        opacity: 1;
    }

    @media (max-width: 992px) {
        .alert-validate::before {
            visibility: visible;
            opacity: 1;
        }
    }


    /*//////////////////////////////////////////////////////////////////
[ Login more ]*/
    .login-more li {
        position: relative;
        padding-left: 16px;
    }

    .login-more li::before {
        content: "";
        display: block;
        position: absolute;
        width: 5px;
        height: 5px;
        border-radius: 50%;
        background-color: #cccccc;
        top: 45%;
        -webkit-transform: translateY(-50%);
        -moz-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        -o-transform: translateY(-50%);
        transform: translateY(-50%);
        left: 0;
    }
</style>

<div class="limiter">
    <div class="container-login100">

        <div class="wrap-login100 p-t-85 p-b-20">

            <span class="login100-form-title p-b-30" style="font-size: 35px;font-family: monospace;text-align: center;margin-bottom: 10px;">
                <strong>Restablecer Constraseña</strong>
            </span>

            <form class="login100-form validate-form" role="form" method="post" enctype="multipart/form-data">

                <span class="login100-form-title p-b-70">
                    <img src="vistas/img/plantilla/logo_blanco_obstetras_iam_gif.gif" class="img-responsive" width="450px;">
                </span>
                <span class="login100-form-avatar">

                </span>

                <div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate="Ingrese Nueva Contraseña">
                    <input class="input100" id="nuevPassword" type="password" name="nuevPassword">
                    <span class="focus-input100" data-placeholder="NUEVA CONTRASEÑA"></span>

                </div>
                <input class="hidden" type="text" value="<?php echo $id; ?>" name="id">
                <br>
                <div class="wrap-input100 validate-input m-b-50" data-validate="ingresa Confirmar Contraseña">
                    <input class="input100" id="confirPassword" type="password" name="confirPassword">
                    <span class="focus-input100" data-placeholder="CONFIRMAR CONTRASEÑA"></span>
                </div>
                <br>
                <br>
                <button class="login100-form-btn" type="submit" name="enviar" onclick="return comparePassword();">
                    CAMBIAR CONTRASEÑA
                </button>
                <br>
                <br>
                <ul class="login-more p-t-150" style="margin-top: 25px;">
                    <li class="m-b-8">
                        <span class="txt1">

                            <a href="login" class="txt2">
                                Regresar
                            </a>

                        </span>


                    </li>
                </ul>

                <?php
                $restablecer = new ControladorRegistro();
                $restablecer->ctrGenerarNuevContraseña();
                ?>

            </form>
        </div>
    </div>
    <div id="dropDownSelect1"></div>
</div>

<script>
    function comparePassword() {

        var contrasena = document.getElementById('nuevPassword').value;
        var repetirContrasena = document.getElementById('confirPassword').value;

        if (contrasena != repetirContrasena) {
            swal({
                type: "success",
                title: "Las contraseñas no coinciden.",
                showConfirmButton: true,
                confirmButtonText: "Cerrar"
            })
            return false;
        } else {
            return true;
        }

    }

    (function($) {
        "use strict";


        /*==================================================================
        [ Focus input ]*/
        $('.input100').each(function() {
            $(this).on('blur', function() {
                if ($(this).val().trim() != "") {
                    $(this).addClass('has-val');
                } else {
                    $(this).removeClass('has-val');
                }
            })
        })


        /*==================================================================
        [ Validate ]*/
        var input = $('.validate-input .input100');

        $('.validate-form').on('submit', function() {
            var check = true;

            for (var i = 0; i < input.length; i++) {
                if (validate(input[i]) == false) {
                    showValidate(input[i]);
                    check = false;
                }
            }

            return check;
        });


        $('.validate-form .input100').each(function() {
            $(this).focus(function() {
                hideValidate(this);
            });
        });

        function validate(input) {
            if ($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
                if ($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                    return false;
                }
            } else {
                if ($(input).val().trim() == '') {
                    return false;
                }
            }
        }

        function showValidate(input) {
            var thisAlert = $(input).parent();

            $(thisAlert).addClass('alert-validate');
        }

        function hideValidate(input) {
            var thisAlert = $(input).parent();

            $(thisAlert).removeClass('alert-validate');
        }

    })(jQuery);
</script>