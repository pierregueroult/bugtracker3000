<?php

// header component used in all pages

// the header adapts to the user role and displays the appropriate links and buttons

// if the session is started and the user is connected, we set the variable to true else to false
$isConnected = isset($_SESSION['user']) ? true : false;

// if the user is connected, we get his role
if ($isConnected === true) {
  $role = $_SESSION['user']['roleUser'];
}
?>

<header class="w-screen h-24 bg-indigo-900 flex flex-row justify-between items-center">

  <h1 class="text-4xl text-white font-bold ml-10">Bug Tracker 3000</h1>

  <?php if ($isConnected === true) { ?>

    <div class="flex flex-row justify-between items-center mr-10">
      <a href="/sae203/account/logout.php" class="text-white font-bold text-xl mr-5">Déconnexion</a>
      <?php
      if ($role === 'user') {
        ?>
        <a href="/sae203/tickets/create.php" class="text-white font-bold text-xl mr-5">Créer un ticket</a>
        <?php
      }
      ?>
      <a href="/sae203/tickets/index.php" class="text-white font-bold text-xl mr-5">
        <?php
        if ($role === 'user') {
          echo "Mes tickets";
        } else if ($role === 'dev') {
          echo "Tickets assignés";
        } else {
          echo "Tous les tickets";
        }
        ?>
      </a>
      <a href="/sae203/account/profile.php" class="text-white font-bold text-xl flex flex-row gap-6">
        <p>Profil</p>
        <?php
        if (strlen($_SESSION['user']['imageUser']) > 0) {
          ?>

          <img src="<?= $_SESSION['user']['imageUser'] ?>" alt="profile image" class="w-10 h-10 rounded-full" />

          <?php
        }

        ?>


      </a>
    </div>


  <?php } else { ?>

    <div class="flex flex-row justify-between items-center mr-10">
      <a href="/sae203/account/login.php" class="text-white font-bold text-xl mr-5">Connexion</a>
      <a href="/sae203/account/register.php" class="text-white font-bold text-xl">Inscription</a>
    </div>


  <?php } ?>
</header>

<?php include('notification.php') ?>