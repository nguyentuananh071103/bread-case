<?php
include_once "database/DB.php";
include_once "BaseModel.php";

class UserModel extends BaseModel
{
    protected $table = "users";

    public function checkLogin($email, $password)
    {
        $sql = "SELECT * FROM $this->table WHERE email = :email AND password = :password";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(":email",$email);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
        return $stmt->rowCount() >0;
    }

    public function getByEmail($email)
    {
        $sql = "SELECT * FROM $this->table WHERE email= :email";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(":email",$email);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function add($data)
    {
        $sql = "INSERT INTO $this->table (`name`,`email`,`password`) VALUE(?,?,?)";
        $stmt = $this->dbConnect->prepare($sql);
        $stmt->bindParam(1, $data["name"]);
        $stmt->bindParam(2, $data["email"]);
        $stmt->bindParam(3, $data["password"]);
        $stmt->execute();
    }
}