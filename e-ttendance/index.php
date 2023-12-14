<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  </head>
  <body>
  <style>
     body {
        background-image: url(backimg.jfif);
        background-repeat: no-repeat;
        background-size: cover;
        background-attachment: fixed;
    }
  </style>

    <div class="container">
        <div class="row d-flex align-items-center justify-content-center" style="height: 100vh; width:100%">
            <div class="col-md-5">
                <h2 class="row d-flex justify-content-center">E-ttendance</h2>
                <div class="card border-1 shadow rounded">
                    <div class="card-body">
                        <div   div class="row">
                            <form action="actionLogin.php" method="post" id="loginForm">
                            <strong>Login</strong>
                                <div class="card-header mb-8">
                                    
                                </div>
                                <input 
                                    class="form-control"
                                    type="text"
                                    name="username"
                                    placeholder="Username"
                                    autofocus
                                    autocomplete="off">
                                <input 
                                    class="form-control mt-3"
                                    type="password"
                                    name="password"
                                    placeholder="Password"
                                    autocomplete="off">
                                <button type="submit" class="btn btn-primary mt-3"><i class="bi bi-box-arrow-in-right"></i> Login</button>
                                <a href="#" class="btn btn-outline-secondary mt-3" onclick="switchForms('registerForm')">Register</a>
                            </form>
                        <form action="registrasi.php" method="post" id="registerForm" style="display: none;">
                            <div class="card-header mb-3">
                                <strong>Registrasi Akun Baru</strong>
                            </div>
                            <input 
                                class="form-control"
                                type="text"
                                id="regUsername"
                                name="reg_username"
                                placeholder="Username register"
                                autofocus
                                autocomplete="off">
                            <input 
                                class="form-control mt-3"
                                type="password"
                                id="regPassword"
                                name="reg_password"
                                placeholder="Password register"
                                autofocus
                                autocomplete="off">
                            <button type="submit" class="btn btn-primary mt-3" onclick="showAlert()">Register</button>
                            <a href="#" class="btn btn-outline-danger mt-3" onclick="switchForms('loginForm')">Cancel</a>
                        </form>
                        </div>
                    </div>
                  </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function switchForms() {
            var loginForm = document.getElementById("loginForm");
            var registerForm = document.getElementById("registerForm");

            if (loginForm.style.display === "none") {
                loginForm.style.display = "block";
                registerForm.style.display = "none";
            } else {
                loginForm.style.display = "none";
                registerForm.style.display = "block";
            }
        }
    </script>
    <script>
        function showAlert(){
            swal.fire({
                title: 'Registrasi Berhasil',
                text: 'Anda telah berhasil mendaftar',
                icon: 'success',
                confirmButtonText: 'Ok',
            }).then((result) => {
               if(result.isConfirmed){
                window.location.href = 'index.php';
               }     
            }).finally(() => {
                switchForms('#loginForm');
            });
        }
    </script>
  </body>
</html>