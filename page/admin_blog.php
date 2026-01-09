<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title>Admin Blog</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

<main class="max-w-6xl mx-auto px-6 py-10">

  <h1 class="text-3xl font-bold mb-8">🛠️ Admin Blog</h1>

  <!-- STATS -->
  <div class="grid grid-cols-3 gap-6 mb-10">
    <div class="bg-white p-6 rounded shadow">📄 Articles : 12</div>
    <div class="bg-white p-6 rounded shadow">💬 Commentaires : 34</div>
    <div class="bg-white p-6 rounded shadow">📂 Thèmes : 5</div>
  </div>

  <!-- THEMES -->
  <section class="bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Gestion des thèmes</h2>

    <table class="w-full border">
      <tr class="bg-gray-200">
        <th class="p-3">Titre</th>
        <th class="p-3">Actif</th>
        <th class="p-3">Action</th>
      </tr>
      <tr>
        <td class="p-3">Voitures</td>
        <td class="p-3">✅</td>
        <td class="p-3">
          <button class="text-blue-600">Modifier</button>
        </td>
      </tr>
    </table>
  </section>

</main>

</body>
</html>
