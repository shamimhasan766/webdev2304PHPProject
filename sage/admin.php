
<?php require "includes/header.php" ?>

<?php 

// users
$users = "SELECT COUNT(*) AS total_users FROM users";
$users_result = mysqli_query($connect, $users);
$user_row = mysqli_fetch_assoc($users_result);
$totalUsers = $user_row['total_users'];


// services
$services = "SELECT COUNT(*) AS total_services FROM services";
$service_result = mysqli_query($connect, $services);
$service_row = mysqli_fetch_assoc($service_result);
$totalServices = $service_row['total_services'];

// skills
$skills = "SELECT COUNT(*) AS total_skills FROM skills";
$skills_result = mysqli_query($connect, $skills);
$skills_row = mysqli_fetch_assoc($skills_result);
$totalSkills = $skills_row['total_skills'];

// Portfolios
$portfolios = "SELECT COUNT(*) AS total_portfolios FROM portfolios";
$portfolios_result = mysqli_query($connect, $portfolios);
$portfolios_row = mysqli_fetch_assoc($portfolios_result);
$totalportfolios = $portfolios_row['total_portfolios'];

// Testimonials
$testimonial = "SELECT COUNT(*) AS total_testimonial FROM testimonial";
$testimonial_result = mysqli_query($connect, $testimonial);
$testimonial_row = mysqli_fetch_assoc($testimonial_result);
$totalTestimonails = $testimonial_row['total_testimonial'];


// Messages
$messages = "SELECT COUNT(*) AS total_messages FROM messages";
$messages_result = mysqli_query($connect, $messages);
$messages_row = mysqli_fetch_assoc($messages_result);
$totalmessages = $messages_row['total_messages'];


// Menu
$menu = "SELECT COUNT(*) AS total_menu FROM menu";
$menu_result = mysqli_query($connect, $menu);
$menu_row = mysqli_fetch_assoc($menu_result);
$totalmenu = $menu_row['total_menu'];


?>
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header"><h3>Welcome To Dashboard</h3></div>
      <div class="card-body bg-light">
      <div class="container mt-5">
        <div class="row">

          <div class="col-md-3 p-2">
            <div class="card">
              <a href="./user/users.php?section=User List">
                <div class="card-body">
                  <h3 class="count-card-title"><?=$totalUsers?></h3>
                  <h3 class="count-card-text">Total Users</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-3 p-2">
            <div class="card">
              <a href="./menu/menu.php?section=Menu Bar">
                <div class="card-body">
                  <h3 class="count-card-title"><?=$totalmenu?></h3>
                  <h3 class="count-card-text">Total Menu</h3>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-3 p-2">
            <div class="card">
            <a href="./skills/skills.php?section=Skills">
              <div class="card-body">
                <h3 class="count-card-title"><?=$totalSkills?></h3>
                <h3 class="count-card-text">Total Skills</h3>
              </div>
            </a>
            </div>
          </div>

          <div class="col-md-3 p-2">
            <div class="card">
              <a href="./services/services.php?section=Services">
                <div class="card-body">
                  <h3 class="count-card-title"><?=$totalServices?></h3>
                  <h3 class="count-card-text">Total Services</h3>
                </div>
              </a>
            </div>
          </div>

          <div class="col-md-3 p-2">
            <div class="card">
              <a href="./portfolios/portfolios.php?section=Portfolios">
                <div class="card-body">
                  <h3 class="count-card-title"><?=$totalportfolios?></h3>
                  <h3 class="count-card-text">Total Portfolios</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-3 p-2">
            <div class="card">
              <a href="./testimonial/testimonial.php?section=Testimonials">
                <div class="card-body">
                  <h3 class="count-card-title"><?=$totalTestimonails?></h3>
                  <h3 class="count-card-text">Total Testimonials</h3>
                </div>
              </a>
            </div>
          </div>
          <div class="col-md-3 p-2">
            <div class="card">
              <a href="./messages/allmessages.php?section=All Messages">
                <div class="card-body">
                  <h3 class="count-card-title"><?=$totalmessages?></h3>
                  <h3 class="count-card-text">Total Messagess</h3>
                </div>
              </a>
            </div>
          </div>

        </div>
      </div>	
      </div>
    </div>
  </div>
</div>





<?php require "includes/footer.php"?>

<?php if(isset($_SESSION['login_message'])){  ?>
<script>
    const Toast = Swal.mixin({
  toast: true,
  position: "bottom-end",
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.onmouseenter = Swal.stopTimer;
    toast.onmouseleave = Swal.resumeTimer;
  }
});
Toast.fire({
  icon: "success",
  title: "Signed in successfully"
});
</script>
<?php }
unset($_SESSION['login_message']);
?>

       