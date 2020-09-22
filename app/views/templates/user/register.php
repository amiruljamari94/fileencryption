<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form method="POST" action="login/registerUser">
                                            <div class="form-group"><label class="small mb-1" for="inputNameAddress">Name</label><input class="form-control py-4" name="name" id="inputNameAddress" type="text" placeholder="Enter Your Name" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputEmailAddress">Email</label><input class="form-control py-4" name="email" id="inputEmailAddress" type="email" placeholder="Enter email address" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Password</label><input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" /></div>
                                            <div class="form-group"><label class="small mb-1" for="inputPassword">Confirm Password</label><input class="form-control py-4" name="confirmPassword" id="inputPassword" type="password" placeholder="Enter confirm password" /></div>  
                                            <div><a class="small"></a>
                                            <input type="submit" class="btn btn-primary" value="Register"></div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="register.php">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
    
</body>
</html>
