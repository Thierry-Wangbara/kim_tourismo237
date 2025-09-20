<?php

namespace Database\Seeders;

use App\Models\Site;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Récupérer un gestionnaire de site
        $siteManager = User::where('account_type', 'site_manager')->first();
        
        if (!$siteManager) {
            $this->command->warn('Aucun gestionnaire de site trouvé. Créez d\'abord un utilisateur avec le type site_manager.');
            return;
        }

        $sites = [
            [
                'name' => 'Monument de la Réunification',
                'description' => 'Le Monument de la Réunification est un symbole important de l\'unité du Cameroun. Situé au cœur de Yaoundé, ce monument commémore la réunification du Cameroun français et britannique en 1961.',
                'location' => 'Yaoundé, Cameroun',
                'region' => 'Centre',
                'latitude' => 3.8480,
                'longitude' => 11.5021,
                'price' => 5000,
                'contact_phone' => '+237 6XX XX XX XX',
                'contact_email' => 'contact@monument-reunification.cm',
                'opening_hours' => 'Lundi - Dimanche: 8h00 - 18h00',
                'access_info' => 'Accessible en voiture et en transport public. Parking disponible.',
                'features' => ['parking', 'guide', 'wifi'],
                'is_active' => true,
            ],
            [
                'name' => 'Palais des Rois Bamoun',
                'description' => 'Le Palais des Rois Bamoun à Foumban est un témoignage exceptionnel de la richesse culturelle du Cameroun. Construit au début du XXe siècle, il abrite le Musée des Rois Bamoun.',
                'location' => 'Foumban, Cameroun',
                'region' => 'Ouest',
                'latitude' => 5.7167,
                'longitude' => 10.9000,
                'price' => 10000,
                'contact_phone' => '+237 6XX XX XX XX',
                'contact_email' => 'info@palais-bamoun.cm',
                'opening_hours' => 'Mardi - Dimanche: 9h00 - 17h00',
                'access_info' => 'Accessible en voiture. Guide touristique disponible sur place.',
                'features' => ['parking', 'guide', 'restaurant', 'wifi'],
                'is_active' => true,
            ],
            [
                'name' => 'Chutes de la Lobé',
                'description' => 'Les Chutes de la Lobé sont un spectacle naturel exceptionnel où la rivière Lobé se jette directement dans l\'océan Atlantique. Un site unique au monde classé au patrimoine de l\'UNESCO.',
                'location' => 'Kribi, Cameroun',
                'region' => 'Sud',
                'latitude' => 2.9333,
                'longitude' => 9.9167,
                'price' => 15000,
                'contact_phone' => '+237 6XX XX XX XX',
                'contact_email' => 'contact@chutes-lobe.cm',
                'opening_hours' => 'Tous les jours: 7h00 - 19h00',
                'access_info' => 'Accessible en voiture. Randonnée de 45 minutes depuis le parking.',
                'features' => ['parking', 'guide', 'restaurant', 'toilettes'],
                'is_active' => true,
            ],
            [
                'name' => 'Mont Cameroun',
                'description' => 'Le Mont Cameroun, également appelé Mont Fako, est le plus haut sommet d\'Afrique de l\'Ouest avec ses 4095 mètres d\'altitude. Une destination de trekking exceptionnelle avec une vue panoramique sur la région.',
                'location' => 'Buea, Cameroun',
                'region' => 'Sud-Ouest',
                'latitude' => 4.2167,
                'longitude' => 9.1667,
                'price' => 25000,
                'contact_phone' => '+237 6XX XX XX XX',
                'contact_email' => 'info@mont-cameroun.cm',
                'opening_hours' => 'Tous les jours: 6h00 - 16h00',
                'access_info' => 'Départ depuis Buea. Guide de montagne obligatoire. Équipement de randonnée recommandé.',
                'features' => ['guide', 'restaurant', 'wifi'],
                'is_active' => true,
            ],
            [
                'name' => 'Parc National de Waza',
                'description' => 'Le Parc National de Waza est l\'une des plus importantes réserves de faune du Cameroun. Il abrite une grande variété d\'animaux sauvages dont les éléphants, les lions, les girafes et de nombreuses espèces d\'oiseaux.',
                'location' => 'Waza, Cameroun',
                'region' => 'Extrême-Nord',
                'latitude' => 11.3833,
                'longitude' => 14.4500,
                'price' => 20000,
                'contact_phone' => '+237 6XX XX XX XX',
                'contact_email' => 'contact@parc-waza.cm',
                'opening_hours' => 'Tous les jours: 6h00 - 18h00',
                'access_info' => 'Accessible en 4x4. Guide obligatoire. Meilleure période: Novembre à Mai.',
                'features' => ['parking', 'guide', 'restaurant', 'wifi', 'toilettes'],
                'is_active' => true,
            ]
        ];

        foreach ($sites as $siteData) {
            $siteData['user_id'] = $siteManager->id;
            Site::create($siteData);
        }

        $this->command->info('Sites touristiques créés avec succès !');
    }
}
