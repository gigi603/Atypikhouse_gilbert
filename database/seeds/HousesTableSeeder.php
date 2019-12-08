<?php

use Illuminate\Database\Seeder;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $houses = [
            [
                'title' => 'La cabane dans les arbres',
                'user_id' => 1,
                'category_id' => 2,
                'adresse' => '31 Rue des Peupliers, Paris, France',
                'description' => "Sorcière et moyen âge … la magie de l’enfance rejoint ici l’histoire.
                Cette habitat féerique est unique dans la vallée des 5 châteaux près de la Dordogne, à quelques minutes des sites les plus prestigieux du Périgord noir (Castelnaud, Beynac, etc.) et à 15 mn de Sarlat La Médiévale?
                Un cocon propice à la rêverie et au repos ; rien n’est droit mais tout y est !
                
                La cabane de sorcière pour 2 personnes (formule chambre d’hôtes), défie les lois de la géométrie et des volumes ; son lit de 140 x 200 surélevé permet d’utiliser le placard inférieur pour les bagages, et de disposer d’une tables et de 2 bancs coulissants … le tout sur 5 m2
                Salle d’eau et WC chauffés à quelques mètres dans un poolhouse d'architecture typiquement périgourdine.
                La piscine est partagée avec 3 gîtes et nos chambres d’hôtes sur notre parc de 1 ha
                
                Plus de 25 sites touristiques majeurs à moins de15 km, et les activités de loisirs voisines (canoë, accrobranche, escalade, spéléo, montgolfières, rando, VTT).

                Rien de plus reposant que de passer un peu de temps au calme avec sa famille ou ses amies dans un logement insolite et remarquable de part sa verdure et sa tranquillité.",
                'start_date' => '2019-12-10',
                'end_date' => '2019-12-30',
                'nb_personnes' => 4,
                'telephone' => '0623216792',
                'price' => 345.00,
                'photo' => '1558108054.jpg',
                'statut' => 'Validé',
                'disponible' => 'oui'
            ],
            
        ];
        DB::table('houses')->insert($houses);
    }
}
