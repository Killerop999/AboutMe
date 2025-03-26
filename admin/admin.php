<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit;
}

$username = $_SESSION['username'];

$conn = new mysqli('sql312.infinityfree.com', 'if0_37172028', 'Tejas2003', 'if0_37172028_my_data', 3306);

if ($conn->connect_error) {
    die("Connection failed");
}

// Write SQL query
$sql = "SELECT * FROM contactus ORDER BY id";
$sql1 = "SELECT * FROM team_data ORDER BY id";

// Execute query
$result = $conn->query($sql);
$result1 = $conn->query($sql1);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/maincss.css">
    <link rel="stylesheet" href="admin.css">


</head>

<body>
    <div class="main-box">
        <div class="left">
            <a class="navbar-brand" style="width: 100%;text-align: center; margin: 5px 0;">
                <img class="logo logo-color" src="../assets/images/logo-color.png" alt="logo" />
            </a>
            <div class="toggle-bar m-bar">
                <a class="open bar"> <i class="fa-solid fa-bars"></i></a>
            </div>
            <section class="about about-timeline-style active">
                <div class="nav-tab-menu">
                    <ul class="nav nav-tabs" id="mgsAboutTab" role="tablist" style="margin: 15px 0;">
                        <li>
                            <button class="nav-link active" id="tab1-tab" data-bs-toggle="tab" data-bs-target="#tab1" type="button" role="tab" aria-controls="tab1" aria-selected="true">
                                <i class="fa-solid fa-people-group"></i>
                                <span class="tab-title text-bold">My Team</span>
                            </button>
                        </li>
                        <li>
                            <button class="nav-link" id="tab2-tab" data-bs-toggle="tab" data-bs-target="#tab2" type="button" role="tab" aria-controls="tab2" aria-selected="false" tabindex="-1">
                                <i class="fa-solid fa-user-graduate"></i>
                                <span class="tab-title text-bold">Education</span>
                            </button>
                        </li>

                        <li>
                            <button class="nav-link" id="tab4-tab" data-bs-toggle="tab" data-bs-target="#tab4" type="button" role="tab" aria-controls="tab4" aria-selected="false" tabindex="-1">
                                <i class="fa-solid fa-shekel-sign"></i>
                                <span class="tab-title text-bold">Skills</span>
                            </button>
                        </li>
                        <li>
                            <button class="nav-link" id="tab5-tab" data-bs-toggle="tab" data-bs-target="#contact_us" type="button" role="tab" aria-controls="contact_us" aria-selected="false" tabindex="-1">
                                <i class="fa-solid fa-phone"></i>
                                <span class="tab-title text-bold">Contact Us</span>
                            </button>
                        </li>
                        <li>
                            <form action="logout.php" method="post">
                                <button class="nav-link logout" type="submit" name="logout" style="text-align: left !important;"><i class="fa-solid fa-arrow-right-from-bracket" style="color: red;text-align: center;"></i>
                                    <span class="tab-title text-bold">Logout</span>
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </section>

        </div>
        <div class="right">
            <div id="header" class="top-bar header headerbg-darkcolor">
                <div class="toggle-bar">
                    <a class="open bar"> <i class="fa-solid fa-bars"></i></a>
                    <!-- <a class="close bar"> <i class="fa-solid fa-xmark"></i></a> -->
                </div>
                <div class="left">
                    <h1>Welcome, <?php echo $username; ?></h1>
                    <p>This is the admin page. You can manage your site frome here.</p>
                </div>
            </div>

            <section class="about about-timeline-style active">
                <div class="container">
                    <div class="tab-content" style="padding: 15px 0px;">
                        <div class="tab-pane fade active show" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
                            <div class="add-btn">
                                <a class="btn green-btn btn-shutter-out-horizontal" type="button" data-bs-toggle="modal" data-bs-target="#add_team" chalu>Add Team</a>
                            </div>
                            <div class="table-responsive">
                                <table id="example" class="table table-hover table-bordered table-pagination">
                                    <thead>
                                        <tr>
                                            <th scope="col">No</th>
                                            <th scope="col">Facebook</th>
                                            <th scope="col">Twitter</th>
                                            <th scope="col">Instagram</th>
                                            <th scope="col">Linkedin</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Details</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php
                                        $index = 1;
                                        if ($result1->num_rows > 0) {
                                            while ($row = $result1->fetch_assoc()) {
                                        ?>
                                                <tr>
                                                    <td><?php echo $index++; ?></td> <!-- This will display the index (starting from 1) -->
                                                    <td><?php echo $row['facebook_link']; ?></td>
                                                    <td><?php echo $row['twitter_link']; ?></td>
                                                    <td><?php echo $row['instagram_link']; ?></td>
                                                    <td><?php echo $row['linkedin_link']; ?></td>
                                                    <td><?php echo $row['team_Name']; ?></td>
                                                    <td><?php echo $row['team_position']; ?></td>
                                                    <td><?php echo $row['team_description']; ?></td>
                                                    <td><?php echo $row['team_photo']; ?></td>
                                                    <td class="action-btn">
                                                        <a class="edit-btn" data-bs-toggle="modal" data-bs-target="#add_team"><i class="fa-regular fa-pen-to-square"></i></a>
                                                        <a class="delete-btn" href="Team/delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa-regular fa-trash-can"></i></a>
                                                    </td>

                                                </tr>

                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td colspan="10" style="text-align: center;"> No Data available</td>
                                            </tr>
                                        <?php } ?>
                                        <!-- <tr>
                                            <th>1</th>
                                            <td>Tejas Makwana</td>
                                            <td>Founder</td>
                                            <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, molestiae!</td>
                                            <td style="text-align: center;"><img src="../assets/images/my-img.webp" alt="image" style="width:40px;height:40px;object-fit:cover;"></td>
                                            <td class="action-btn">
                                                <a class="edit-btn" data-bs-toggle="modal" data-bs-target="#add_team"><i class="fa-regular fa-pen-to-square"></i></a>
                                                <a class="delete-btn"><i class="fa-regular fa-trash-can"></i></a>
                                            </td>
                                        </tr> -->
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">2</div>
                        <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">3</div>
                        <div class="tab-pane fade" id="contact_us" role="tabpanel" aria-labelledby="tab4-tab">
                            <div class="contactus-data">
                                <div class="table-responsive">
                                    <table id="contact_data" class="table table-hover table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">Id</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Phone</th>
                                                <th scope="col">Message</th>
                                                <th scope="col">Action</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $index = 1;
                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $index++; ?></td> <!-- This will display the index (starting from 1) -->
                                                        <td><?php echo $row['fname']; ?></td>
                                                        <td><?php echo $row['email']; ?></td>
                                                        <td><?php echo $row['phone']; ?></td>
                                                        <td><?php echo $row['message']; ?></td>
                                                        <td class="action-btn">
                                                            <a class="edit-btns" data-id="<?php echo $row['id'] ?>" data-fname="<?php echo $row['fname'] ?>" data-email="<?php echo $row['email'] ?>" data-phone="<?php echo $row['phone'] ?>" data-message="<?php echo $row['message'] ?>" data-bs-toggle="modal" data-bs-target="#cont_us"><i class="fa-regular fa-pen-to-square"></i></a>
                                                            <a class="delete-btn" href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are you sure you want to delete this user?')"><i class="fa-regular fa-trash-can"></i></a>
                                                        </td>

                                                    </tr>

                                                <?php }
                                            } else { ?>
                                                <tr>
                                                    <td colspan="6" style="text-align: center;"> No Data available</td>
                                                </tr>
                                            <?php } ?>



                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    <!-- My team start-->
    <div class="modal fade" id="add_team" tabindex="-1" aria-labelledby="add_team" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Modal title</h1>
                    <button type="button" class="btn close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>

                </div>
                <div class="modal-body">
                    <form action="Team/add-team.php" method="post" enctype="multipart/form-data">
                        <div class="form-group mb-3 upload-btn">
                            <input type="file" class="btn" name="team_photo">
                            <label class="btn btn-primary">Select Image..... </label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="facebook_link" id="facebook_link" placeholder="facebook_link">
                            <label for="facebook_link">Facebook</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="twitter_link" id="twitter_link" placeholder="twitter">
                            <label for="twitter_link">twitter</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="instagram_link" id="instagram_link" placeholder="Instagram">
                            <label for="instagram_link">Instagram</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="linkedin_link" id="linkedin_link" placeholder="linkedin">
                            <label for="linkedin_link">Linkedin</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="team_Name" id="team_Name" placeholder="Name">
                            <label for="team_Name">Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="textss" class="form-control" name="team_position" id="team_position" placeholder="position">
                            <label for="team_position">position</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea rows="3" name="team_description" id="team_description" class="form-control"></textarea>
                            <label for="team_description">Message</label>
                        </div>
                        <div class="form-group mb-0">
                            <div class="btn-box">
                                <ul>
                                    <li><input type="submit" value="Save" class="btn save-btn green-btn btn-success"></li>
                                    <li><button type="button" class="btn cancel-btn btn-danger" data-bs-dismiss="modal">Cancel</button></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- My team end-->

    <!-- Modal for editing contact us entry -->

    <div class="modal fade" id="cont_us" tabindex="-1" aria-labelledby="cont_us" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5">Edit Contact Us</h1>
                    <button type="button" class="btn close-btn" data-bs-dismiss="modal" aria-label="Close"><i class="fa-solid fa-xmark"></i></button>
                </div>
                <div class="modal-body">
                    <form action="update.php" method="post">
                        <input type="hidden" id="user_id" name="id" value="<?php echo $row['id']; ?>"> <!-- Hidden field for id -->
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="user_name" name="fname" value="<?php echo $row['fname']; ?>" placeholder="Your Name">
                            <label for="user_name">Your Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="user_email" name="email" value="<?php echo $row['email']; ?>" placeholder="Your Email">
                            <label for="user_email">Your Email</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="tel" class="form-control" id="user_phone" name="phone" value="<?php echo $row['phone']; ?>" placeholder="Phone">
                            <label for="user_phone">Phone</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea rows="3" name="message" id="user_message" class="form-control"><?php echo $row['message']; ?></textarea>
                            <label for="user_message">Message</label>
                        </div>
                        <div class="form-group mb-3">
                            <div class="btn-box">
                                <ul>
                                    <li><input type="submit" name="update" value="Save" class="btn save-btn green-btn btn-success"></li>
                                    <li><button type="button" class="btn cancel-btn btn-danger" data-bs-dismiss="modal">Cancel</button></li>
                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    <!-- Bootstrap JS and Custom JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

</body>

<script src="../assets/js/jquery-3.7.1.min.js"></script>
<script src="../assets/js/popper.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.vide.js"></script>
<script src="../assets/js/circle-progress.js"></script>
<script src="../assets/js/isotope.pkgd.min.js"></script>
<script src="../assets/js/lightbox.min.js"></script>
<script src="../assets/js/owl.carousel.min.js"></script>
<script src="../assets/js/jquery.ajaxchimp.min.js"></script>
<script src="../assets/js/waypoint.js"></script>
<script src="../assets/js/jquery.counterup.min.js"></script>
<script src="../assets/js/validator.min.js"></script>
<script src="../assets/js/main.js"></script>

<script>
    $(document).ready(function() {
        $(".toggle-bar").click(function() {
            $(this).toggleClass("slide-open");
        })
    });
</script>

<script>
    // jQuery to populate the modal with user data
    $('.edit-btn').on('click', function() {
        var userId = $(this).data('id');
        var userName = $(this).data('fname');
        var userEmail = $(this).data('email');
        var userPhone = $(this).data('phone');
        var userMessage = $(this).data('message');

        // Set values in the modal form fields
        $('#user_id').val(userId);
        $('#user_name').val(userName);
        $('#user_email').val(userEmail);
        $('#user_phone').val(userPhone);
        $('#user_message').val(userMessage);
    });
</script>
<script>
    // jQuery to populate the modal with user data
    $('.edit-btns').on('click', function() {
        var userId = $(this).data('id');
        var userName = $(this).data('fname');
        var userEmail = $(this).data('email');
        var userPhone = $(this).data('phone');
        var userMessage = $(this).data('message');

        // Set values in the modal form fields
        $('#user_id').val(userId);
        $('#user_name').val(userName);
        $('#user_email').val(userEmail);
        $('#user_phone').val(userPhone);
        $('#user_message').val(userMessage);
    });
</script>

<script>
    $(document).ready(function() {
        $('#example').DataTable({
            dom: 'Bfrtlip', // This sets the layout for the DataTable controls
            pagingType: 'input', // Changes pagination to input type
            columnDefs: [{
                "searchable": true,
                "orderable": true,
                "targets": 0
            }]
        });
    });
</script>

</html>
<?php
$conn->close();
?>