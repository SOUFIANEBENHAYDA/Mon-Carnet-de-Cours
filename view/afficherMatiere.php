<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Matières</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }
        .glass-morphism {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .subject-icon {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
        }
        .coefficient-badge {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
        }
        .table-row-hover:hover {
            background: rgba(255, 255, 255, 0.1);
        }
    </style>
</head>
<body class="min-h-screen p-4">
    <div class="max-w-7xl mx-auto">
        <div class="text-center mb-12">
            <h1 class="text-5xl font-bold text-white mb-4">
                <i class="fas fa-graduation-cap mr-4"></i>Liste des Matières
            </h1>
        </div>

        <div class="glass-morphism rounded-2xl p-6 mb-8">
            <div class="flex flex-col lg:flex-row justify-between items-center gap-6">
                <div class="search-container flex-1 max-w-md">
                    <div class="relative">
                        <i class="fas fa-search absolute left-4 top-1/2 transform -translate-y-1/2 text-white opacity-70"></i>
                        <input 
                            type="text" 
                            id="searchInput"
                            placeholder="Rechercher une matière ou un professeur..."
                            class="w-full pl-12 pr-4 py-3 rounded-xl bg-white bg-opacity-10 text-white placeholder-white placeholder-opacity-70 focus:outline-none"
                        >
                    </div>
                </div>
                
                <div class="flex gap-6 text-center">
                    <div class="glass-morphism px-6 py-3 rounded-xl">
                        <div class="text-2xl font-bold text-white" id="totalSubjects"><?php echo count($resu); ?></div>
                        <div class="text-sm text-white opacity-70">Matières</div>
                    </div>
                    <div class="glass-morphism px-6 py-3 rounded-xl">
                        <?php
                        $totalCoeff = 0;
                        foreach($resu as $ligne) {
                            $totalCoeff += $ligne['coefficient'];
                        }
                        ?>
                        <div class="text-2xl font-bold text-white" id="totalCoeff"><?php echo $totalCoeff; ?></div>
                        <div class="text-sm text-white opacity-70">Coefficient Total</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="glass-morphism rounded-2xl overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gradient-to-r from-purple-600 to-pink-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-white font-semibold uppercase tracking-wider">
                                <i class="fas fa-hashtag mr-2"></i>ID Matière
                            </th>
                            <th class="px-6 py-4 text-left text-white font-semibold uppercase tracking-wider">
                                <i class="fas fa-user-tie mr-2"></i>Professeur
                            </th>
                            <th class="px-6 py-4 text-left text-white font-semibold uppercase tracking-wider">
                                <i class="fas fa-book mr-2"></i>Matière
                            </th>
                            <th class="px-6 py-4 text-left text-white font-semibold uppercase tracking-wider">
                                <i class="fas fa-weight-hanging mr-2"></i>Coefficient
                            </th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <?php foreach($resu as $ligne): ?>
                        <tr class="table-row-hover border-b border-white border-opacity-10">
                            <td class="px-6 py-4 text-white font-medium">
                                <div class="flex items-center">
                                    <div class="subject-icon">
                                        <i class="fas fa-book-open"></i>
                                    </div>
                                    <?php echo $ligne['id_matiere']; ?>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="bg-white bg-opacity-10 rounded-lg p-2">
                                    <div class="text-white font-medium"><?php echo $ligne['nom_prof']; ?></div>

                                </div>
                            </td>
                            <td class="px-6 py-4 text-white font-medium"><?php echo $ligne['nom']; ?></td>
                            <td class="px-6 py-4">
                                <span class="coefficient-badge"><?php echo $ligne['coefficient']; ?></span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="text-center mt-12">
            <div class="glass-morphism rounded-xl p-6">
                <p class="text-white opacity-80">
                    <i class="fas fa-sparkles mr-2"></i>
                    <a href="../view/acceuil_etudiants.php">EduTrack</a>
                    <i class="fas fa-sparkles ml-2"></i>
                </p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('searchInput').addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = document.querySelectorAll('#tableBody tr');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchTerm) ? '' : 'none';
            });
            
            document.getElementById('totalSubjects').textContent = 
                document.querySelectorAll('#tableBody tr:not([style*="display: none"])').length;
        });
    </script>
</body>
</html>