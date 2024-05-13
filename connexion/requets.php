<?php
function select($email, $db) {
    $sql = 'SELECT * FROM `client` WHERE `email`=:email';
    // On prépare la requête
    $query = $db->prepare($sql);
    // On attache les valeurs
    $query->bindValue(':email', $email, PDO::PARAM_STR);
    // On exécute la requête
    $query->execute();
    // On stocke le résultat dans un tableau associatif
    $client = $query->fetch();
    return $client;
}

function insert($db,$userNom,$userPrenom,$userEmail,$userPass,$userTel,$userRole,$userStatut,$userDate) {
    $sql = "INSERT INTO client (nom, prenom, email, password, tel, role, statut, date) 
    VALUES (:nom, :prenom, :email, :password, :tel, :role, :statut, :date)";
$query = $db->prepare($sql);

// Exécution de la requête en remplaçant les paramètres par les valeurs appropriées
$query->execute(array(
':nom' => $userNom,
':prenom' => $userPrenom,
':email' => $userEmail,
':password' => $userPass,
':tel' => $userTel,
':role' => $userRole,
':statut' => $userStatut,
':date' => $userDate
));
}
?>
