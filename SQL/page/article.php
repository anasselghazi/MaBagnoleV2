



<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Article | MaBagnole</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<!-- HEADER -->
<header class="bg-white shadow">
  <div class="max-w-5xl mx-auto px-6 py-4 flex justify-between items-center">
    <h1 class="text-xl font-bold text-blue-600">🚗 MaBagnole</h1>

    <!-- BOUTON AJOUT ARTICLE -->
    <button onclick="openModal()"
      class="bg-green-600 text-white px-4 py-2 rounded font-semibold">
      + Ajouter article
    </button>
  </div>
</header>

<!-- CONTENU ARTICLE -->
<main class="max-w-4xl mx-auto px-6 py-10 bg-white shadow rounded-xl mt-8">

  <h1 class="text-3xl font-bold mb-2">Tesla Model 3 – Mon expérience</h1>
  <p class="text-gray-500 mb-6">Publié le 12/01/2026 • par John</p>

  <p class="leading-relaxed text-gray-700 mb-10">
    Contenu détaillé de l’article affiché depuis la base de données.
  </p>

  <!-- COMMENTAIRES -->
  <section>
    <h2 class="text-2xl font-bold mb-4">💬 Commentaires</h2>

    <div class="bg-gray-100 p-4 rounded mb-4">
      <strong>Ali :</strong> Très bon article !
    </div>

    <form class="space-y-4">
      <textarea class="w-full border rounded p-3"
        placeholder="Votre commentaire..."></textarea>

      <button class="bg-blue-600 text-white px-6 py-2 rounded">
        Ajouter commentaire
      </button>
    </form>
  </section>

</main>

<!-- MODAL AJOUT ARTICLE -->
<div id="articleModal"
  class="fixed inset-0 bg-black/60 hidden flex items-center justify-center z-50">

  <div class="bg-white rounded-xl w-full max-w-2xl pmx-auto p-8 relative">

    <!-- CLOSE -->
    <button onclick="closeModal()"
      class="absolute top-4 right-4 text-2xl font-bold text-gray-500 hover:text-red-600">
      &times;
    </button>

    <h2 class="text-2xl font-bold mb-6">✍️ Nouvel Article</h2>

    <form method="POST" action="traitement_ajout_article.php" class="space-y-5">

      <input type="text" name="titre" required
        placeholder="Titre de l'article"
        class="w-full border p-3 rounded">

      <select name="theme" class="w-full border p-3 rounded">
        <option value="">-- Choisir thème --</option>
        <option value="1">Voitures</option>
        <option value="2">Électrique</option>
      </select>

      <textarea name="contenu" rows="6" required
        placeholder="Contenu de l'article..."
        class="w-full border p-3 rounded"></textarea>

      <input type="text" name="tags"
        placeholder="Tags (voiture, électrique)"
        class="w-full border p-3 rounded">

      <div class="flex justify-end gap-4">
        <button type="button" onclick="closeModal()"
          class="px-4 py-2 bg-gray-200 rounded">
          Annuler
        </button>

        <button type="submit"
          class="px-6 py-2 bg-green-600 text-white rounded font-semibold">
          Publier
        </button>
      </div>

    </form>
  </div>
</div>

<!-- JS -->
<script>
function openModal() {
  document.getElementById('articleModal').classList.remove('hidden');
  document.body.style.overflow = 'hidden';
}

function closeModal() {
  document.getElementById('articleModal').classList.add('hidden');
  document.body.style.overflow = 'auto';
}
</script>

</body>
</html>
