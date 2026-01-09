<?php
require_once '../classes/blog/database.php';
require_once '../classes/blog/Theme.php';
require_once '../classes/blog/Article.php';
use App\Blog\Theme;
use App\Blog\Article;

$logerrors = [];
$succes = [];
$themes = Theme::listerTousActifs();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    
    $titre = trim($_POST['titre']);
    $id_theme = $_POST['id_theme'];
    $contenu = trim($_POST['contenu']);

    
    if (!empty($titre) && !empty($id_theme) && !empty($contenu)) {
        
        $article = new Article();
        $article->setClientId(1);
        $article->setThemeId($_POST["id_theme"]);
       
        
        $res = $article->ajouter();
        
        if($res){
            $succes[] = "Article ajouté avec succès !";
        } else {
            $logerrors[] = "Erreur lors de l'insertion en base de données.";
        }
    } else {
        $logerrors[] = "Veuillez remplir tous les champs obligatoires.";
    }      
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Ajouter un article</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

  <main class="w-full max-w-3xl bg-white p-8 rounded-xl shadow-lg">

    <h1 class="text-3xl font-bold mb-8 text-slate-800">
      ✍️ Nouvel Article
    </h1>

    <?php if (!empty($logerrors)): ?>
        <?php foreach ($logerrors as $error): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4 rounded shadow-sm" role="alert">
                <p class="font-bold">Erreur !</p>
                <p><?= htmlspecialchars($error) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (!empty($succes)): ?>
        <?php foreach ($succes as $msg): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4 rounded shadow-sm" role="alert">
                <p class="font-bold">Succès !</p>
                <p><?= htmlspecialchars($msg) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <form class="space-y-6" method="POST" action="">

      <div>
        <label class="block font-medium mb-1 text-gray-700">Titre</label>
        <input
          type="text" name="titre"
          placeholder="Titre de l'article"
          class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500 outline-none"
          required>
      </div>

      <div>
        <label class="block font-medium mb-1 text-gray-700">Thème</label>
        <select name="id_theme" class="w-full border rounded-lg p-3 bg-white focus:outline-none focus:ring-2 focus:ring-green-500 outline-none" required>
            <option value="">-- Choisir un thème --</option>
            <?php foreach ($themes as $theme): ?>
                <option value="<?= $theme['id'] ?>">
                    <?= htmlspecialchars($theme['titre'] ?? $theme['nom']) ?>
                </option>
            <?php endforeach; ?>
        </select>
      </div>

      <div>
        <label class="block font-medium mb-1 text-gray-700">Contenu</label>
        <textarea
          name="contenu"
          rows="8"
          placeholder="Contenu de l'article..."
          class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-green-500 outline-none"
          required></textarea>
      </div>

      <div class="flex justify-end">
        <button
          type="submit" name="submit"
          class="bg-green-600 hover:bg-green-700 text-white px-10 py-3 rounded-lg font-semibold transition shadow-md">
          Publier
        </button>
      </div>

    </form>

  </main>

</body>
</html>