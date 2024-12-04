<?php
namespace App\Models;

class Home {
    public function getData() {
        // Simulation de données provenant de la base de données pour afficher les statistiques
        return [
            'totalUsers' => 150,
            'activeSessions' => 45,
            'newMessages' => 10,
            'pendingTasks' => 7
        ];
    }
}
