 <?php
 require_once '../classes/blog/database.php';
require_once '../classes/blog/Theme.php';
require_once '../classes/blog/Article.php';
use App\Blog\Theme;
use App\Blog\Article;
$db = new Database();
 $pdo = $db->getPdo();

 $themes = Theme::listerTousActifs();

 $id_theme_selectionne = $_GET['id_theme'] ?? null;
$mot_recherche = $_GET['recherche'] ?? null; 

 if ($mot_recherche) {
    $articles = Article::rechercherParTitre($mot_recherche);
} 
elseif ($id_theme_selectionne) {
     $articles = Article::listerParTheme($id_theme_selectionne);
} 
else {
     $articles = Article::listerTout() ; 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MaBagnole | Blog Auto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<nav class="bg-slate-900 text-white px-6 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold">🚗 MaBagnole</h1>

    <!-- BOUTON AJOUT ARTICLE -->
    <a href="ajouter_article.php"
       class="bg-green-600 hover:bg-green-500 text-white px-4 py-2 rounded-lg font-semibold">
        ➕ Ajouter un article
    </a>
</nav>

<div class="container mx-auto px-4 py-10 grid grid-cols-1 lg:grid-cols-4 gap-8">

    <aside class="bg-white rounded-xl shadow p-6 h-fit">
        <h3 class="text-xl font-bold mb-4">📂 Thèmes</h3>
        <ul class="space-y-3">
            <li>
                <a href="blog.php" class="block px-4 py-2 rounded <?= ($id_theme_selectionne === null) ? 'bg-slate-900 text-white' : '' ?>">
                    📑 Tous les articles
                </a>
            </li>
            <?php foreach ($themes as $t): ?>
            <li>
                <a href="blog.php?id_theme=<?= $t['id'] ?>" class="block px-4 py-2 rounded <?= ($id_theme_selectionne == $t['id']) ? 'bg-slate-900 text-white' : '' ?>">
                    🚘 <?= htmlspecialchars($t['titre']) ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </aside>

    <main class="lg:col-span-3 space-y-6">

        <form method="GET" action="blog.php" class="bg-white p-5 rounded-xl shadow flex gap-4">
            <input type="text" name="recherche" 
                   value="<?= htmlspecialchars($mot_recherche ?? '') ?>" 
                   placeholder="🔍 Rechercher..." 
                   class="w-full border rounded-lg px-4 py-2 focus:ring focus:ring-slate-300">
            <button type="submit" class="bg-slate-900 text-white px-6 rounded-lg hover:bg-slate-800">
                Chercher
            </button>
        </form>

        <div class="grid md:grid-cols-2 gap-6">
            <?php if (!empty($articles)): ?>
                <?php foreach ($articles as $art): ?>
                    <div class="bg-white rounded-xl shadow p-5">
                        <h4 class="text-xl font-bold"><?= htmlspecialchars($art['titre']) ?></h4>
                        <a href="article.php?id=<?= $art['id'] ?>" class="text-blue-600">Lire plus...</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-center text-gray-500">Aucun article à afficher.</p>
            <?php endif; ?>
        </div>

    </main>
</div>
</body>
</html>