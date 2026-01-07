








<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MaBagnole | Blog Auto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- NAVBAR -->
<nav class="bg-slate-900 text-white px-6 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">🚗 MaBagnole</h1>
    <ul class="flex gap-6 text-sm">
        <li><a href="index.php" class="hover:text-slate-300">Accueil</a></li>
        <li><a href="vehicules.php" class="hover:text-slate-300">Véhicules</a></li>
        <li><a href="blog.php" class="text-slate-300 font-semibold">Blog</a></li>
        <li><a href="contact.php" class="hover:text-slate-300">Contact</a></li>
    </ul>
</nav>

<!-- HEADER -->
<header class="bg-slate-800 text-white py-10 text-center">
    <h2 class="text-4xl font-bold">Blog Automobile</h2>
    <p class="text-gray-300 mt-2">
        Conseils, guides et actualités pour bien louer votre véhicule
    </p>
</header>

<!-- CONTENU -->
<div class="container mx-auto px-4 py-10 grid grid-cols-1 lg:grid-cols-4 gap-8">

    <!-- THEMES -->
    <aside class="bg-white rounded-xl shadow p-6">
        <h3 class="text-xl font-bold mb-4">📂 Thèmes</h3>
        <ul class="space-y-3">
            <li>
                <a href="blog.php?id_theme=1"
                   class="block px-4 py-2 rounded hover:bg-slate-100">
                    🚘 Conseils Location
                </a>
            </li>
            <li>
                <a href="blog.php?id_theme=2"
                   class="block px-4 py-2 rounded hover:bg-slate-100">
                    🛠️ Entretien Véhicules
                </a>
            </li>
            <li>
                <a href="blog.php?id_theme=3"
                   class="block px-4 py-2 rounded hover:bg-slate-100">
                    ⚡ Nouveautés Auto
                </a>
            </li>
            <li>
                <a href="blog.php?id_theme=4"
                   class="block px-4 py-2 rounded hover:bg-slate-100">
                    🧾 Assurance & Sécurité
                </a>
            </li>
        </ul>
    </aside>

    <!-- ARTICLES -->
    <main class="lg:col-span-3 space-y-6">

        <!-- RECHERCHE -->
        <form method="GET" class="bg-white p-5 rounded-xl shadow flex gap-4">
            <input type="text"
                   name="recherche"
                   placeholder="🔍 Rechercher un article (ex: voiture économique)"
                   class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-slate-300">
            <button class="bg-slate-900 text-white px-6 rounded-lg hover:bg-slate-800">
                Chercher
            </button>
        </form>

        <!-- LISTE ARTICLES -->
        <div class="grid md:grid-cols-2 gap-6">

            <!-- CARD -->
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1502877338535-766e1452684a"
                     class="h-48 w-full object-cover rounded-t-xl" alt="">
                <div class="p-5">
                    <h4 class="text-xl font-bold">
                        Comment choisir la bonne voiture à louer ?
                    </h4>
                    <p class="text-sm text-gray-500 mt-1">
                        10 Jan 2026 • Conseils Location
                    </p>
                    <p class="text-gray-600 mt-3 line-clamp-3">
                        Citadine, SUV ou utilitaire ? Découvrez comment choisir
                        le véhicule idéal selon vos besoins...
                    </p>
                    <a href="article.php?id=1"
                       class="inline-block mt-4 text-slate-900 font-semibold hover:underline">
                        Lire l’article →
                    </a>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow hover:shadow-lg transition">
                <img src="https://images.unsplash.com/photo-1605559424843-9e4c228bf1c2"
                     class="h-48 w-full object-cover rounded-t-xl" alt="">
                <div class="p-5">
                    <h4 class="text-xl font-bold">
                        Vérifications essentielles avant une location
                    </h4>
                    <p class="text-sm text-gray-500 mt-1">
                        14 Jan 2026 • Sécurité
                    </p>
                    <p class="text-gray-600 mt-3 line-clamp-3">
                        Avant de prendre la route, voici les points à vérifier
                        pour une location sans souci...
                    </p>
                    <a href="article.php?id=2"
                       class="inline-block mt-4 text-slate-900 font-semibold hover:underline">
                        Lire l’article →
                    </a>
                </div>
            </div>

        </div>
    </main>
</div>

</body>
</html>
