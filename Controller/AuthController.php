<?php
include_once "Model/UserModel.php";
class AuthController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }
    public function showFormLogin()
    {
        include_once "View/auth/login.php";
    }

    public function login($request)
    {
        $email = $request["email"];
        $password = $request["password"];

        if ($this->userModel->checkLogin($email, $password)){
            $user = $this->userModel->getByEmail($email);
            $_SESSION["email"] = $user["email"];
            header("Location:index.php?page=#");
        } else {
            header("Location:index.php?page=login");
        }
    }
    public function showFormRegister()
    {
        include_once "View/auth/register.php";
    }

    public function register($data)
    {
        $data2 = [
            "name" => $data['name'],
            "email" => $data['email'],
            "password" => $data['password']
        ];
        $this->userModel->add($data2);
        header("location:index.php?page=login");
    }
    public function logout()
    {
        session_destroy();
        header("Location:index.php?page=login");
    }

    public function checkAuth()
    {
        if (isset($_SESSION["username"])) {
            header("Location:index.php?page=login");
        }
    }
}