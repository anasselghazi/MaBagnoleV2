 <?php
session_start(); 

require_once '../classes/blog/client.php';
use App\Blog\Client;

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
            header("Location: admin_blog.php");
        } else {
            header("Location: blog.php");
        }
        exit();
    } else {
        $logerrors[] = "Email ou mot de passe incorrect.";
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register'])) {
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($password !== $confirm_password) {
        $logerrors[] = "Les mots de passe ne correspondent pas.";
    } else {
        $hash = password_hash($password, PASSWORD_BCRYPT);

        if (Client::cree($nom, $email, $hash)) {
             header("Location: index.php?success=registered");
             exit();
        } else {
            $logerrors[] = "Erreur : Cet email est déjà utilisé.";
        }
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
        body { background: radial-gradient(circle at top, #0f172a, #020617); }
        @keyframes scale { from { transform: scale(.85); opacity: 0; } to { transform: scale(1); opacity: 1; } }
        .animate-scale { animation: scale .25s ease-out; }
    </style>
</head>
<body class="text-white">

<nav class="fixed top-0 w-full z-50 backdrop-blur bg-white/10 border-b border-white/10">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-black">🚗 Drive<span class="text-blue-400">Now</span></h1>
        <button onclick="openAuth()" class="bg-blue-500 px-5 py-2 rounded-full hover:bg-blue-600">Sign In</button>
    </div>
</nav>

<section class="min-h-screen flex items-center pt-32">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-6xl font-black">Rent the <span class="text-blue-400">Future</span></h2>
    </div>
</section>

<div id="authModal" class="fixed inset-0 <?php echo (!empty($logerrors) || isset($_GET['success'])) ? 'flex' : 'hidden'; ?> items-center justify-center bg-black/70 z-[999] backdrop-blur-sm">
    <div class="relative w-[90%] max-w-md backdrop-blur-2xl bg-white/10 border border-white/20 rounded-3xl p-10 animate-scale">
        <button onclick="closeAuth()" class="absolute top-5 right-5 text-2xl text-gray-400 hover:text-white">✕</button>

        <?php if (isset($_GET['success']) && $_GET['success'] === 'registered'): ?>
            <div class="mb-6 p-4 bg-green-500/20 border border-green-500 text-green-300 rounded-xl text-center text-sm">
                ✅ Inscription réussie ! Connectez-vous.
            </div>
        <?php endif; ?>

        <div class="text-center mb-8">
            <h2 id="authTitle" class="text-3xl font-black mb-2">Welcome Back</h2>
            <p id="authSubtitle" class="text-gray-400">Login to your account</p>
        </div>

        <?php if (!empty($logerrors)): ?>
            <div class="mb-4 p-3 bg-red-500/20 border border-red-500 text-red-200 rounded-xl text-center">
                <?= $logerrors[0] ?>
            </div>
        <?php endif; ?>

        <div id="loginBox">
            <form method="POST">
                <div class="space-y-4">
                    <input type="email" name="email" placeholder="Email" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-blue-500" required>
                    <input type="password" name="password" placeholder="Password" class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-blue-500" required>
                    <button name="login" class="w-full bg-blue-500 py-4 rounded-xl font-bold hover:bg-blue-600">Sign In</button>
                </div>
            </form>
            <p class="mt-6 text-center text-sm text-gray-400">No account? <button onclick="showSignup()" class="text-blue-400 font-bold">Create one</button></p>
        </div>

        <div id="signupBox" class="hidden">
            <form class="space-y-4" method="POST" action="index.php">
                <input type="text" name="nom" placeholder="Full name" required class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-green-500">
                <input type="email" name="email" placeholder="Email" required class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-green-500">
                <input type="password" name="password" placeholder="Password" required class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-green-500">
                <input type="password" name="confirm_password" placeholder="Confirm password" required class="w-full bg-white/5 border border-white/10 p-4 rounded-xl focus:ring-2 ring-green-500">
                <button type="submit" name="register" class="w-full bg-green-500 py-4 rounded-xl font-bold hover:bg-green-600">Create Account</button>
            </form>
            <p class="mt-6 text-center text-sm text-gray-400">Already registered? <button onclick="showLogin()" class="text-blue-400 font-bold">Sign In</button></p>
        </div>
    </div>
</div>

<script>
const modal = document.getElementById("authModal");
const loginBox = document.getElementById("loginBox");
const signupBox = document.getElementById("signupBox");
const title = document.getElementById("authTitle");
const subtitle = document.getElementById("authSubtitle");

 window.addEventListener('load', () => {
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('success')) {
        openAuth();        
        showLogin();      
    }
});

function openAuth() {
    modal.classList.remove("hidden");
    modal.classList.add("flex");
}

function closeAuth() {
    modal.classList.add("hidden");
    modal.classList.remove("flex");
    window.history.replaceState({}, document.title, window.location.pathname);
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

modal.addEventListener("click", e => { if (e.target === modal) closeAuth(); });
</script>
</body>
</html>