<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        :root{
            --bg1 :#627CCA;
            --bg2 :#3498db;
            --text :#26ade4;
        }
        *{
            margin: 0;
            padding: 0;
            outline:none;
        }
        a{
            text-decoration: none;
        }
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            width: 100vw;
            height: 100vh;
            background: linear-gradient(to bottom right,var(--bg1),var(--bg2));
        }
        .form-login{
            width: 300px;
            height: 500px;
            background: #fff;
            border-radius: 10px;
            padding: 40px 30px;
        }
        .form-login h1{
            margin-bottom: 40px;
        }
        .form-login button{
            height: 35px;
            width: 100%;
            margin-bottom: 30px;
            background: linear-gradient(120deg,var(--bg1),var(--bg2),var(--bg1));
            border:none;
            color: #fff;
            border-radius: 5px;
            background-size: 200%;
            transition: 0.5s;
        }
        .form-login button:hover{
            background-position: right;
        }

        .form-text{
            margin-bottom: 40px;
            position: relative;
        }
        .form-text input{
            width: 100%;
            height: 40px;
            border: none;
            border-bottom: 2px solid #ccc;
            cursor: pointer;
            padding-left: 12px;

        }
        .form-text label{
            position: absolute;
            left: 12px;
            bottom: 12px;
            transition: 0.5s;
        }
        .form-text label.focus{
            transform: translateY(-45px);
        }


    </style>
</head>
<body>
<div class="container">
    <form class="form-login" method="post" >
        <h1>Login</h1>
        <div class="form-text" >
            <label for="">Email</label>
            <input type="text" name="email">
        </div>
        <div class="form-text">
            <label for="">Password</label>
            <input type="password" name="password">
        </div>
        <button type="submit">Login</button>
        <!--        <span class="psw">Forgot <a href="#">Password?</a></span>-->
        <span class="password">Forgot <a href="index.php?page=register">Register?</a></span>
    </form>
</div>
<script>
    const formLogin = document.querySelectorAll('.form-text input')
    const formLabel = document.querySelectorAll('.form-text label')
    for (let i=0; i<2; i++){
        formLogin[i].addEventListener("mouseover",function (){
            formLabel[i].classList.add("focus")
        })
        formLogin[i].addEventListener("mouseout",function (){
            if (formLogin[i].value == "") {
                formLabel[i].classList.add("focus")
            }
        })
    }
</script>

</body>
</html>
