 <?php
require_once '../classes/blog/database.php';
require_once '../classes/blog/Article.php';
use App\Blog\Article;

 $db = new Database();
 $pdo = $db->getPdo();


 
 $id = $_GET['id'];

if (!$id) {
    header("Location: blog.php");
    exit;
}

 $article = Article::trouverParId($id);

if (!$article) {
    die(" Cet article n'existe pas.");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($article['titre']) ?> | MaBagnole</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-slate-900 text-white p-4 shadow-md">
        <div class="container mx-auto">
            <a href="blog.php" class="font-bold">🚗 MaBagnole Blog</a>
        </div>
    </nav>

    <main class="container mx-auto py-10 px-4 max-w-3xl">
        <a href="blog.php" class="text-slate-500 hover:text-slate-900 mb-6 inline-block">← Retour au blog</a>

        <article class="bg-white rounded-2xl shadow-lg overflow-hidden">
            <img src="https://images.unsplash.com/photo-1492144534655-ae79c964c9d7" class="w-full h-64 object-cover">
            
            <div class="p-8">
                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase">
                    <?= htmlspecialchars($article['theme_nom']) ?>
                </span>

                <h1 class="text-4xl font-bold text-slate-900 mt-4 mb-6">
                    <?= htmlspecialchars($article['titre']) ?>
                </h1>

                <div class="flex gap-4 text-sm text-gray-400 mb-8 pb-4 border-b">
                    <span>📅 <?= date('d/m/Y', strtotime($article['date_publication'])) ?></span>
                    <span>👤 Par <?= htmlspecialchars($article['auteur'] ?? 'Admin') ?></span>
                    <?php if(!empty($article['tags'])): ?>
                        <span class="text-blue-500">🏷️ <?= htmlspecialchars($article['tags']) ?></span>
                    <?php endif; ?>
                </div>

                <div class="text-gray-700 leading-relaxed text-lg space-y-4">
                    <?= nl2br(htmlspecialchars($article['contenu'])) ?>
                </div>
            </div>
        </article>
        <!-- 💬 Section Commentaires -->
<section class="mt-12 bg-white rounded-2xl shadow-lg p-8">

    <h2 class="text-2xl font-bold mb-6 text-slate-800">
        💬 Commentaires
    </h2>

    <!-- ➕ Ajouter un commentaire -->
    <form class="space-y-4 mb-10">
        <div>
            <label class="block font-medium mb-1">Votre nom</label>
            <input
                type="text"
                placeholder="Ex : Anas"
                class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required>
        </div>

        <div>
            <label class="block font-medium mb-1">Votre commentaire</label>
            <textarea
                rows="4"
                placeholder="Écrivez votre commentaire..."
                class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500"
                required></textarea>
        </div>

        <button
            type="submit"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition">
            Publier le commentaire
        </button>
    </form>

    <!-- 📜 Liste des commentaires -->
    <div class="space-y-6">

        <!-- Commentaire -->
        <div class="border-b pb-4">
            <div class="flex justify-between items-center mb-2">
                <span class="font-semibold text-slate-800">Youssef</span>
                <span class="text-sm text-gray-400">12/01/2026</span>
            </div>
            <p class="text-gray-700">
                Très bon article, j’ai appris beaucoup de choses sur les voitures électriques 👍
            </p>
        </div>

        <!-- Commentaire -->
        <div class="border-b pb-4">
            <div class="flex justify-between items-center mb-2">
                <span class="font-semibold text-slate-800">Sara</span>
                <span class="text-sm text-gray-400">10/01/2026</span>
            </div>
            <p class="text-gray-700">
                Design propre et contenu clair, continuez comme ça 👌
            </p>
        </div>

    </div>

</section>

    </main>

</body>
</html>