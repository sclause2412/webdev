<?php
use function Adminer\get_nonce;
class WebdevNoDatabase
{
    function loginForm()
    {
        echo '<h1>This environment has no database!</h1>';
        return true;
    }
}
class WebdevMySQL
{
    function loginForm()
    {
        ?>
        <input type="hidden" name="auth[driver]" value="server">
        <input type="hidden" name="auth[server]" value="webdev-mysql">
        <input type="hidden" name="auth[username]" value="dev">
        <input type="hidden" name="auth[password]" value="dev">
        <input type="hidden" name="auth[db]" value="dev">
        <input style="display: none;" type="submit" id="webdev-autologin">
        <script nonce="<?= get_nonce() ?>">
            window.setTimeout(function () {
                document.getElementById("webdev-autologin").click();
            }, 1000);
        </script>
        <?php
        return true;
    }
}
class WebdevSQLite
{
    function loginForm()
    {
        ?>
        <input type="hidden" name="auth[driver]" value="sqlite">
        <input type="hidden" name="auth[db]" value="../html/database/database.sqlite">
        <input style="display: none;" type="submit" id="webdev-autologin">
        <script nonce="<?= get_nonce() ?>">
            window.setTimeout(function () {
                document.getElementById("webdev-autologin").click();
            }, 1000);
        </script>
        <?php
        return true;
    }
    function login($login, $password)
    {
        return true;
    }
}
function adminer_object()
{
    if (file_exists('../html/.docker/mysql') && trim(file_get_contents('../html/.docker/mysql')) != 'None')
        return new Adminer\Plugins([new WebdevMySQL]);
    if (file_exists('../html/database/database.sqlite'))
        return new Adminer\Plugins([new WebdevSQLite]);
    return new Adminer\Plugins([new WebdevNoDatabase]);
}
include_once './adminer.php';
