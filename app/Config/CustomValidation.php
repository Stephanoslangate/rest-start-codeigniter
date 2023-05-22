<?php 
namespace Config;

class CustomValidation{

    public function validusername(string $str, ?string &$error = null): bool
    {

          $usernamePreg = "/^[a-zA-Z0-9]+$/";

          if( (preg_match($usernamePreg,$str))) {
                return true;
          }

          $error = "Please enter valid username";

          return false;

    }

    public function erreurpass(string $str, ?string &$error = null): bool
    {

          $usernamePreg = "/^[a-zA-Z0-9]+$/";

          if(strlen($str)>=7) {
                return true;
          }else if(strlen($str)>=1){
            $error = "Le mot de passe 7 caractere minimum";
            return false;
          }

          $error = "Renseignez le mot de passe";

          return false;

    }

    public function requisn(string $str, ?string &$error = null): bool
    {

          if(strlen($str)>=2){
            return true;
          }

          $error = "Renseignez le nom";

          return false;

    }
    public function requisp(string $str, ?string &$error = null): bool
    {

          if(strlen($str)>=2){
            return true;
          }

          $error = "Renseignez le prenom";

          return false;

    }
    public function requisem(string $str, ?string &$error = null): bool
    {

          if(strlen($str)>=2){
            return true;
          }

          $error = "Renseignez le mail";

          return false;

    }

    public function checkmax($str, string $field, array $data): bool
    {

         if($str < $data[$field]){
              return false;
         }

         return true;

    }

}