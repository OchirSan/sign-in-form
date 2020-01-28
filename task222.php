<?php
if (!empty($_POST)){
    require(__DIR__.'/logs.php');
    require(__DIR__.'/passes.php');
}
$success = false;
$error = false;
if(isset($_POST['login_id']) && isset($_POST['password_id'])){
    $key = array_search($_POST['login_id'], $logs);
    if ($key != 0 &&  $_POST['password_id'] == $passes[$key]){
        $success = true;
    } else {
        $error = true;
    }
} else {
    $error = true;
}
?>
<?php require(__DIR__.'/template/header.php') ?>
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td class="left-collum-index">
            
                <h1>Возможности проекта —</h1>
                <p>Вести свои личные списки, например покупки в магазине, цели, задачи и многое другое. Делится списками с друзьями и просматривать списки друзей.</p>
                
            
            </td>
            <td class="right-collum-index">
                
                <div class="project-folders-menu">
                    <ul class="project-folders-v">
                        <li class="project-folders-v-active"><a href="?login=yes">Авторизация</a></li>
                        <li><a href="#">Регистрация</a></li>
                        <li><a href="#">Забыли пароль?</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                
                <div class="index-auth">
                    <?php if (isset($_GET['login']) && $_GET['login'] == 'yes'){?>
                    <form action="" method="post">
                        <table width="100%" border="0" cellspacing="0" cellpadding="0">
                            <tr>
                                <td class="iat">
                                    <label for="login_id">Ваш e-mail: <input type="text" name="login_id" value = <?= $_POST['login_id'] ?? '' ?>></label>
                                </td>
                            </tr>
                            <tr>
                                <td class="iat">
                                    <label for="password_id">Ваш пароль:<input type="text" name="password_id" value = <?= $_POST['password_id'] ?? '' ?>></label>
                                </td>
                            </tr>
                            <tr>
                                    <input type="submit" value="Войти" name="send">
                            </tr>
                             <tr>
                                <?php if($success){
                                    require(__DIR__.'/success.php');
                                } else {
                                    if (isset($_POST['send']) && $_POST['send'] == "Войти") {
                                        require(__DIR__.'/error.php');
                                    }
                                }
                                ?>
                            </tr>  
   
                        </table>
                    </form>
                    <? }?>
                </div>
            
            </td>
        </tr>
    </table>
 <?php require(__DIR__.'/template/footer.php') ?>