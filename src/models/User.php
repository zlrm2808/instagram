<?php
    
    namespace Zlrm2\Instagram\models;

    use PDO;
    use PDOException;
    use Zlrm2\Instagram\lib\Model;

    class User extends Model{

        private int $id;
        private array $posts;
        private string $profile;

        public function __construct(private string $username, private string $password){

            $this->posts = [];
            $this->profile = "";

        }

        public function save(){

            try {
                // TODO: Validar si existe el usuario
                $hash = $this->getHashedPassword($this->password);
                $query = $this->prepare("INSERT INTO users(username, password, profile) VALUES(:username, :password, :profile)");
                $query->execute([
                    "username" => $this->username,
                    "password" => $this->password,
                    "profile" => $this->profile
                ]);
                return TRUE;
            } catch (PDOException $e){
                error_log($e->getMessage());
                return FALSE;
            }

        }

        private function getHashedPassword($password){
            return password_hash($password, PASSWORD_DEFAULT, ["cost" => 10]);
        }

        public function getId(){
            return $this->id;
        }

        public function setId($value){
            $this->id = $value;
        }

        public function getUsername(){
            return $this->username;
        }

        public function setUsername($value){
            $this->username = $value;
        }

        public function getProfile(){
            return $this->profile;
        }

        public function setProfile($value){
            $this->profile = $value;
        }

        public function getPosts(){
            return $this->posts;
        }

        public function setPosts($value){
            $this->posts = $value;
        }

    }