 <?php
require_once 'classes/Database.php';
require_once 'classes/Article.php';
use App\Blog\Article;
 $db = new Database();
 $pdo = $db->getPdo();


 
 $id = $_GET['id'] ?? null;

if (!$id) {
    header("Location: blog.php");
    exit;
}

 $article = Article::trouverParId($id);

if (!$article) {
    die("Hélas ! Cet article n'existe pas.");
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
    </main>

</body>
</html>