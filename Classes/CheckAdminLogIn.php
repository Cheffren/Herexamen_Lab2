<?php
class CheckAdminLogIn {
    private static function getConfig(){
        //Config file ophalen
        return parse_ini_file(__DIR__ . "/../config/admin.ini");
    }
    

    public static function checkAdmin() {
        $config = self::getConfig();
        $adminEmail = $config['adminEmail'];
        if($_SESSION["email"] !== $adminEmail){
            header('Location: __DIR__ . /../live.php');
        };
    }
}
?>