<?php
require "main/header.php";
?>
<body>
<div id="err" name="err" style="display:none;">
</div>
<div class="auth-container">
    <div class="auth-container-helper">
        <div class="auth-content">
            <div class="auth-block-wrap" data-page="auth">
                <div style="position: relative;">
                    <div style="padding: 1rem; text-align: center; color: #fff;">
                        <img src="img/logo_big_white.png" alt="" style="max-width: 80%; height: auto;">
                        <h2 class="customer_logo-label mt1" style="color: #fff;">DEMO</h2>
                        <div class="customer_logo-img"></div>
                    </div>
                </div>
                <div class="auth-block">
                    <div class="auth-title">
                        Аутентификация            </div>
                    <div style="margin-bottom: 2rem;"></div>
                    <form method="POST" action="#" accept-charset="UTF-8" class="ui form" id="auth">
                        <div class="field required">
                            <label for="userName1">Логин</label>
                            <input required="required" tabindex="1" autofocus="autofocus" name="userName" type="text" id="userName1" class="user">
                        </div>
                        <div class="field required">
                            <label for="password2">Пароль</label>
                            <div style="display: flex;">
                                <input required="required" tabindex="2" name="password" type="password" value="" id="password2">
                                <button id="submitBtn" class="ui button primary ml1 mr0 submitBtn">Войти</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>