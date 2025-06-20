<?php

?>
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user'])) {
    header('Location: ../index.php');
    exit();
}
$groupes = [];
foreach ($res as $doc) {
    $matiere = $doc['nom_matiere'];
    if (!isset($groupes[$matiere])) {
        $groupes[$matiere] = [];
    }
    $groupes[$matiere][] = $doc;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Documents Étudiant - EduTrack</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.4.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../css/index3.css">
    

</head>
<body class="bg-gradient-to-br from-blue-400 via-purple-500 to-purple-600">
    <div class="min-h-screen py-8 px-4">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-12 floating-animation">
                <h1 class="text-5xl font-bold text-white mb-4">
                    <i class="fas fa-graduation-cap mr-4"></i>
                    <a href="../view/acceuil_etudiants.php">EduTrack</a>
                </h1>
                <p class="text-xl text-blue-100 mb-8">Bibliothèque de Documents Académiques</p>
                <div class="max-w-md mx-auto mb-8">
                    <input type="text" id="searchInput" placeholder="Rechercher un document..." 
                           class="search-box w-full px-6 py-3 text-gray-700 focus:ring-2 focus:ring-blue-300" />
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                    <div class="stats-card stagger-animation" style="animation-delay: 0.1s">
                        <i class="fas fa-book text-3xl mb-2"></i>
                        <h3 class="text-2xl font-bold"><?= $total_documents ?></h3>
                        <p>Documents</p>
                    </div>
                    <div class="stats-card stagger-animation" style="animation-delay: 0.2s">
                        <i class="fas fa-layer-group text-3xl mb-2"></i>
                        <h3 class="text-2xl font-bold"><?= $total_matieres ?></h3>
                        <p>Matières</p>
                    </div>
                    <div class="stats-card stagger-animation" style="animation-delay: 0.3s">
                        <i class="fas fa-download text-3xl mb-2"></i>
                        <h3 class="text-2xl font-bold">245</h3>
                        <p>Téléchargements</p>
                    </div>
                </div>
            </div>
            
            <div class="space-y-8" id="documentsContainer">
                <?php 
                $animation_delay = 0.4;

                foreach ($groupes as $nom_matiere => $documents): 
                    $icon = 'fa-book'; 
                    $doc_count = count($documents);
                ?>
                <div class="subject-card glass-effect p-6 card-hover stagger-animation" style="animation-delay: <?= $animation_delay ?>s">
                    <div class="flex items-center mb-6">
                        <div class="subject-icon mr-4">
                            <i class="fas <?= $icon ?>"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800"><?= $nom_matiere?></h2>
                            <p class="text-gray-600"><?= $doc_count ?> document<?= $doc_count > 1 ? 's' : '' ?> disponible<?= $doc_count > 1 ? 's' : '' ?></p>
                        </div>
                    </div>
                    
                    <div class="space-y-4">
                        <?php foreach ($documents as $doc): ?>
                        <div class="document-row p-4 flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                    <i class="fas fa-file-pdf text-blue-600"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-gray-800"><?= $doc['titre']?></h3>
                                    <p class="text-sm text-gray-600"><?= $doc['description'] ?? 'Document'?></p>
                                </div>
                            </div>
                            <div class="flex space-x-2">
                                <a href="<?= $doc['fichier']?>" download="cours_<?= $doc['titre']?>.pdf" 
                                   class="btn-action btn-download px-4 py-2 text-white rounded-lg text-sm font-medium">
                                    <i class="fas fa-download mr-2"></i>Télécharger
                                </a>
                                <a href="<?= $doc['fichier']?>" target="_blank" 
                                   class="btn-action btn-read px-4 py-2 text-white rounded-lg text-sm font-medium">
                                    <i class="fas fa-eye mr-2"></i>Lire
                                </a>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php 
                    $animation_delay += 0.1;
                endforeach; 
                ?>
            </div>
        </div>
    </div>
    <script>
        document.getElementById("searchInput").addEventListener("input", function () {
            const searchTerm = this.value.toLowerCase(); 
            const subjects = document.querySelectorAll(".subject-card");

            subjects.forEach(subject => {
                const docRows = subject.querySelectorAll(".document-row"); 
                let matchCount = 0;

                docRows.forEach(row => {
                    const text = row.innerText.toLowerCase(); 
                    const matches = text.includes(searchTerm); 
                    row.style.display = matches ? "flex" : "none";

                    if (matches) matchCount++;
                });

                subject.style.display = matchCount > 0 ? "block" : "none";
            });
        });
    </script>

</body>
</html>
