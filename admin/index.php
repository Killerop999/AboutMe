<?php
$username = "Admin";
$password = "Tejas@2003";

if (isset($_POST['submit'])) {
    $pusername = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
    $ppassword = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);

    if ($pusername == $username && $ppassword == $password) {
        session_start();

        $_SESSION['username'] = $username;

        header("Location: admin.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/maincss.css">

    <style>
        #admin-login {
            background-color: #232323;
            height: 100vh;
        }

        #admin-login .admin-part {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #admin-login .form-box {
            width: 100%;
            max-width: 550px;
            margin: auto;
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 15px;
        }

        .logo-box {
            text-align: center;
        }

        .pass {
            position: relative;
        }

        .pass>a:has(> i) {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 15px;
            cursor: pointer;
            color: #000 !important;
        }

        .form-control:focus {
            box-shadow: none !important;
        }
    </style>
</head>

<body>

    <section id="admin-login">
        <div class="admin-part">
            <div class="container">
                <!-- alert box  -->
                <?php if (isset($_POST['submit'])) {
                    if ($pusername != $username || $ppassword != $password) {
                ?>

                        <div class="alert alert-danger alert-dismissible fade show" role="alert" id="error">
                            <strong>Error!</strong> Username Or Password Is Incorrect
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                <?php }
                } ?>

                <div class="form-box">
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="mb-3">
                            <div class="logo-box">
                                <img src="../assets/images/logo-color.png" alt="logo">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="user_name" class="form-label"><i class="fa-solid fa-user"></i> User Name</label>
                            <input type="text" class="form-control <?php
                                                                    if (isset($_POST['submit']) && $pusername != $username) {
                                                                        echo "is-invalid";
                                                                    }
                                                                    ?>" id="user_name" name="username" style="padding: .375rem .75rem;">

                            <?php
                            if (isset($_POST['submit']) && empty($pusername)) {
                                echo '<div style="color:red;">Username is required.</div>';
                            } elseif (isset($_POST['submit']) && $pusername != $username) {
                                echo '<div style="color:red;">Username is incorrect.</div>';
                            }
                            ?>

                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"><i class="fa-solid fa-lock"></i> Password</label>
                            <div class="pass">
                                <input type="password" class="form-control  <?php
                                                                            if (isset($_POST['submit']) && $ppassword != $password) {
                                                                                echo "is-invalid";
                                                                            }
                                                                            ?>" id="password" name="password" style="padding: .375rem .75rem;padding-right: 45px;">

                                <?php
                                if (isset($_POST['submit']) && empty($ppassword)) {
                                    echo '<div style="color:red;">Password is required.</div>';
                                } elseif (isset($_POST['submit']) && $ppassword != $password) {
                                    echo '<div style="color:red;">Password is incorrect.</div>';
                                }
                                ?>

                                <a onclick="myFunction()">
                                    <i class="show-pass fa-solid fa-eye"></i>
                                </a>
                            </div>


                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-shutter-out-horizontal" name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Bootstrap JS and Custom JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/custom.js"></script>
    <script>
        $(document).ready(function() {
            // Function to toggle the password visibility
            function myFunction() {
                var x = document.getElementById("password");
                var icon = $("a i"); // Get the icon
                if (x.type === "password") {
                    x.type = "text"; // Show password
                    icon.removeClass("fa-eye").addClass("fa-eye-slash"); // Change icon to 'hide'
                } else {
                    x.type = "password"; // Hide password
                    icon.removeClass("fa-eye-slash").addClass("fa-eye"); // Change icon to 'show'
                }
            }

            // Attach the function to the click event of the 'a' tag with password toggle
            $("a:has(> i)").click(function(e) {
                e.preventDefault(); // Prevent default behavior of the anchor tag
                myFunction(); // Toggle password visibility
            });
        });
    </script>


</body>

</html>