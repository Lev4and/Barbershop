<?php
class VisibleError
{
    public static function show($message = null){
        if(!is_null($message)){
            $_SESSION["error"] = $message;
        }

        if(isset($_SESSION["error"]) && iconv_strlen($_SESSION["error"], "UTF-8") > 0){
            printf('<script>alert("%s");</script>', $_SESSION["error"]);
        }

        $_SESSION["error"] = "";
    }
}
?>