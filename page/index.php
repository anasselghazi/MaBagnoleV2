<?php
session_start(); 
require_once "classes/database.php";
require_once "classes/client.php";

$logerrors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    $client = Client::trouverParEmail($email);

    if ($client && $client->verifierMotDePasse($password)) {
        $_SESSION['id_client'] = $client->getId();
        $_SESSION['nom'] = $client->getNom();
        $_SESSION['role'] = $client->getRole();

        if ($client->getRole() === 'admin') {
            header("Location: dashboard/dashboard_admin.php");
        } else {
            header("Location: dashboard/dashboard_client.php");
        }
        exit();
    } else {
        $logerrors[] = "Email ou mot de passe incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>DriveNow | Car Rental</title>
<script src="https://cdn.tailwindcss.com"></script>

<style>
body {
  background: radial-gradient(circle at top, #0f172a, #020617);
}
@keyframes scale {
  from { transform: scale(.85); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}
.animate-scale {
  animation: scale .25s ease-out;
}
</style>
</head>

<body class="text-white">

<nav class="fixed top-0 w-full z-50 backdrop-blur bg-white/10 border-b border-white/10">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-black">🚗 Drive<span class="text-blue-400">Now</span></h1>
    <button onclick="openAuth()" class="bg-blue-500 px-5 py-2 rounded-full hover:bg-blue-600">
      Sign In
    </button>
  </div>
</nav>

<section class="min-h-screen flex items-center pt-32">
  <div class="max-w-7xl mx-auto px-6">
    <h2 class="text-6xl font-black">
      Rent the <span class="text-blue-400">Future</span>
    </h2>
  </div>
</section>

<!-- AUTH MODAL -->
<div id="authModal" class="fixed inset-0 <?php echo !empty($logerrors) ? 'flex' : 'hidden'; ?> items-center justify-center bg-black/70 z-[999] backdrop-blur-sm">

  <div class="relative w-[90%] max-w-md backdrop-blur-2xl bg-white/10 border border-white/20 rounded-3xl p-10 animate-scale">

    <button onclick="closeAuth()" class="absolute top-5 right-5 text-2xl text-gray-400 hover:text-white">✕</button>

    <div class="text-center mb-8">
      <h2 id="authTitle" class="text-3xl font-black mb-2">Welcome Back</h2>
      <p id="authSubtitle" class="text-gray-400">Login to your account</p>
    </div>

    <?php if (!empty($logerrors)): ?>
      <div class="mb-4 p-3 bg-red-500/20 border border-red-500 text-red-200 rounded-xl text-center">
        <?= $logerrors[0] ?>
      </div>
    <?php endif; ?>

    <!-- LOGIN -->
    <div id="loginBox">
      <form method="POST">
        <div class="space-y-4">
          <input type="email" name="email" placeholder="Email"
            class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-blue-500" required>

          <input type="password" name="password" placeholder="Password"
            class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-blue-500" required>

          <button name="login"
            class="w-full bg-blue-500 py-4 rounded-xl font-bold hover:bg-blue-600">
            Sign In
          </button>
        </div>
      </form>

      <p class="mt-6 text-center text-sm text-gray-400">
        No account?
        <button onclick="showSignup()" class="text-blue-400 font-bold">Create one</button>
      </p>
    </div>

    <!-- SIGNUP -->
    <div id="signupBox" class="hidden">
      <form class="space-y-4">
        <input type="text" placeholder="Full name"
          class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-green-500">

        <input type="email" placeholder="Email"
          class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-green-500">

        <input type="password" placeholder="Password"
          class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-green-500">

        <input type="password" placeholder="Confirm password"
          class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-green-500">

        <button type="submit"
          class="w-full bg-green-500 py-4 rounded-xl font-bold hover:bg-green-600">
          Create Account
        </button>
      </form>

      <p class="mt-6 text-center text-sm text-gray-400">
        Already registered?
        <button onclick="showLogin()" class="text-blue-400 font-bold">Sign In</button>
      </p>
    </div>

  </div>
</div>

<script>
const modal = document.getElementById("authModal");
const loginBox = document.getElementById("loginBox");
const signupBox = document.getElementById("signupBox");
const title = document.getElementById("authTitle");
const subtitle = document.getElementById("authSubtitle");

function openAuth() {
  modal.classList.remove("hidden");
  modal.classList.add("flex");
}

function closeAuth() {
  modal.classList.add("hidden");
  modal.classList.remove("flex");
}

function showSignup() {
  loginBox.classList.add("hidden");
  signupBox.classList.remove("hidden");
  title.textContent = "Create Account";
  subtitle.textContent = "Join DriveNow today";
}

function showLogin() {
  signupBox.classList.add("hidden");
  loginBox.classList.remove("hidden");
  title.textContent = "Welcome Back";
  subtitle.textContent = "Login to your account";
}

modal.addEventListener("click", e => {
  if (e.target === modal) closeAuth();
});
</script>

</body>
</html>
