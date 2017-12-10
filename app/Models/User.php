<?php 

    namespace App\Models;
    use App\Banco;

    class User extends Banco{

        public static function selectAll($id = null) {

            $table = "users";
            $fields = array("id", "name", "email", "gender", "birthdate");
            $where = !empty($id) ? array("id" => $id) : null;

            $users = self::select($table, $fields, $where, null, null, "name ASC");

            return $users;
        }

        public static function save($name, $email, $gender, $birthdate) {

            if (empty($name) || empty($email) || empty($gender) || empty($birthdate)) {
                echo "Volte e preencha todos os campos";
                return false;
            }

            $isoDate = dateConvert($birthdate);

            $table = "users";
            $data = array("name" => $name, "email" => $email, "gender" => $gender, "birthdate" => $isoDate);

            if(self::insert($table, $data)) {
                return true;
            } else {
                echo "Erro ao cadastrar";
                echo self::getError();
                return false;
            }
        }


        public static function updateUser($id, $name, $email, $gender, $birthdate) {

            if (empty($name) || empty($email) || empty($gender) || empty($birthdate)) {
                echo "Volte e preencha todos os campos";
                return false;
            }

            $isoDate = dateConvert($birthdate);

            $table = "users";
            $data = array("name" => $name, "email" => $email, "gender" => $gender, "birthdate" => $isoDate);
            $where = array("id" => $id);

            if(parent::update($table, $data, $where)) {
                return true;
            } else {
                echo "Erro ao atualizar";
                echo self::getError();
                return false;
            }
        }


        public static function remove($id) {
            if (empty($id)) {
                echo "ID não informado";
                exit;
            }

            $table = "users";
            $where = array("id" => $id);

            if(self::delete($table, $where)){
                return true;
            } else {
                echo "Erro ao remover";
                echo self::getError();
                return false;
            }
        }
    }
?>