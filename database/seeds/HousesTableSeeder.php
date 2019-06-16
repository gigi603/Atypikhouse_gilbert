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
                'title' => 'La cabane de sorcière',
                'user_id' => 1,
                'category_id' => 2,
                'pays' => 'FRANCE',
                'ville' => 'DORDOGNE',
                'adresse' => '24220 SAINT-VINCENT-DE-COSSE',
                'description' => "Sorcière et moyen âge … la magie de l’enfance rejoint ici l’histoire.
                Cette habitat féerique est unique dans la vallée des 5 châteaux près de la Dordogne, à quelques minutes des sites les plus prestigieux du Périgord noir (Castelnaud, Beynac, etc.) et à 15 mn de Sarlat La Médiévale?
                Un cocon propice à la rêverie et au repos ; rien n’est droit mais tout y est !
                
                La cabane de sorcière pour 2 personnes (formule chambre d’hôtes), défie les lois de la géométrie et des volumes ; son lit de 140 x 200 surélevé permet d’utiliser le placard inférieur pour les bagages, et de disposer d’une tables et de 2 bancs coulissants … le tout sur 5 m2
                Salle d’eau et WC chauffés à quelques mètres dans un poolhouse d'architecture typiquement périgourdine.
                La piscine est partagée avec 3 gîtes et nos chambres d’hôtes sur notre parc de 1 ha
                
                Plus de 25 sites touristiques majeurs à moins de15 km, et les activités de loisirs voisines (canoë, accrobranche, escalade, spéléo, montgolfières, rando, VTT).

                Rien de plus reposant que de passer un peu de temps au calme avec sa famille ou ses amies dans un logement insolite et remarquable de part sa verdure et sa tranquillité.",
                'telephone' => '0623216792',
                'price' => 345.00,
                'photo' => '1558108054.jpg',
                'statut' => 'Validé'
            ],
            [
                'title' => 'yourte simple et sauvage',
                'user_id' => 1,
                'category_id' => 4,
                'pays' => 'FRANCE',
                'ville' => 'ARDECHE',
                'adresse' => '07450 SAINT PIERRE DE COLOMBIER',
                'description' => "Une belle immersion en pleine nature au cœur des Cévennes ardéchoises où deux yourtes mongoles sans vis-à-vis surplombent la vallée.
                Un abri cuisine équipé, une douche végétale semi-ouverte, des toilettes sèches ainsi qu'un espace feu pour les soirées viennent compléter ce lieu simple et sauvage. Un sentier de randonnée traverse le hameau, des baignades toutes proches aux eaux limpides sauront vous ravir. 
                Aux alentours, canyoning escalade balades à cheval ou encore via ferrata et accrobranche sont possibles et un peu plus loin vous trouverez les gorges de l'Ardèche ( canoë, spéléo, la grotte Chauvet).
                Et n'oublions pas les nombreuses propositions culturelles ainsi que les bonnes adresses des producteurs locaux.
                Le tableau ne serait pas complet sans les moutons les ânes et les poules, un petit côté camping à la ferme.",
                'telephone' => '0709431264',
                'price' => 400.00,
                'photo' => '1558110140.jpg',
                'statut' => 'Validé'
            ],
            [
                'title' => 'Wild Dome',
                'user_id' => 1,
                'category_id' => 3,
                'pays' => 'FRANCE',
                'ville' => 'PYRENEES-ATLANTIQUE',
                'adresse' => 'PLATEAU DE BEZOU GOURETTE 64440',
                'description' => "Ils sont trois, passionnés de montagne et de voyages, débordant d’idées lumineuses qu’ils finalisent eux-mêmes avec enthousiasme. Basés à Gourette, station de sports d’hiver située dans les Pyrénées, ils ont mis au point, conçu et réalisé, avec la complicité du directeur de la station, une déclinaison de dôme version luxe où passer la nuit, combinée avec de séduisantes activités : bain nordique à 38°, balade nocturne en raquettes (tout public), dîner gastronomique au champagne, etc., le tout à 1600 m d’altitude. Une offre qui séduit les visiteurs désireux de varier les plaisirs et rompre la monotonie des pentes neigeuses, notamment les accompagnants des skieurs, souvent délaissés. A tort ! Car leur nombre n’est pas négligeable : pour 1 skieur, 2 accompagnants qui veulent eux aussi, à juste titre, être chouchoutés ! Ils ne seront pas déçus tant le décor naturel se marie harmonieusement avec l’élégance de la structure du dôme, toute de bois et métal simulant les flocons de neige et le confort intérieur, inespéré dans cet environnement grandiose et blanc à perte de vue. Toilettes, douche, lavabo, poêle à bois, réfrigérateur, micro-ondes, une vraie suite de luxe ! Main d’oeuvre et matériaux locaux, souci de préserver l’environnement, recyclage des déchets, tout a été pensé en amont et scrupuleusement mis en œuvre. Dans votre « wild dome », vous serez complètement autonomes, sous l’oeil prévenant et attentif de votre accompagnateur installé un peu plus loin. Une expérience inédite et précieuse, riche de sensations… vertigineuses !",
                'telephone' => "0123455667",
                'price' => 30.00,
                'photo' => '1558110612.jpg',
                'statut' => 'Validé'
            ],
            [
                'title' => 'La cabane de sorcière',
                'user_id' => 1,
                'category_id' => 2,
                'pays' => 'FRANCE',
                'ville' => 'DORDOGNE',
                'adresse' => '24220 SAINT-VINCENT-DE-COSSE',
                'description' => "Sorcière et moyen âge … la magie de l’enfance rejoint ici l’histoire.
                Cette habitat féerique est unique dans la vallée des 5 châteaux près de la Dordogne, à quelques minutes des sites les plus prestigieux du Périgord noir (Castelnaud, Beynac, etc.) et à 15 mn de Sarlat La Médiévale?
                Un cocon propice à la rêverie et au repos ; rien n’est droit mais tout y est !
                
                La cabane de sorcière pour 2 personnes (formule chambre d’hôtes), défie les lois de la géométrie et des volumes ; son lit de 140 x 200 surélevé permet d’utiliser le placard inférieur pour les bagages, et de disposer d’une tables et de 2 bancs coulissants … le tout sur 5 m2
                Salle d’eau et WC chauffés à quelques mètres dans un poolhouse d'architecture typiquement périgourdine.
                La piscine est partagée avec 3 gîtes et nos chambres d’hôtes sur notre parc de 1 ha
                
                Plus de 25 sites touristiques majeurs à moins de15 km, et les activités de loisirs voisines (canoë, accrobranche, escalade, spéléo, montgolfières, rando, VTT).

                Rien de plus reposant que de passer un peu de temps au calme avec sa famille ou ses amies dans un logement insolite et remarquable de part sa verdure et sa tranquillité.",
                'telephone' => '0623216792',
                'price' => 345.00,
                'photo' => '1558108054.jpg',
                'statut' => 'Validé'
            ],
            [
                'title' => 'yourte simple et sauvage',
                'user_id' => 1,
                'category_id' => 4,
                'pays' => 'FRANCE',
                'ville' => 'ARDECHE',
                'adresse' => '07450 SAINT PIERRE DE COLOMBIER',
                'description' => "Une belle immersion en pleine nature au cœur des Cévennes ardéchoises où deux yourtes mongoles sans vis-à-vis surplombent la vallée.
                Un abri cuisine équipé, une douche végétale semi-ouverte, des toilettes sèches ainsi qu'un espace feu pour les soirées viennent compléter ce lieu simple et sauvage. Un sentier de randonnée traverse le hameau, des baignades toutes proches aux eaux limpides sauront vous ravir. 
                Aux alentours, canyoning escalade balades à cheval ou encore via ferrata et accrobranche sont possibles et un peu plus loin vous trouverez les gorges de l'Ardèche ( canoë, spéléo, la grotte Chauvet).
                Et n'oublions pas les nombreuses propositions culturelles ainsi que les bonnes adresses des producteurs locaux.
                Le tableau ne serait pas complet sans les moutons les ânes et les poules, un petit côté camping à la ferme.",
                'telephone' => '0709431264',
                'price' => 400.00,
                'photo' => '1558110140.jpg',
                'statut' => 'Validé'
            ],
            [
                'title' => 'Wild Dome',
                'user_id' => 1,
                'category_id' => 3,
                'pays' => 'FRANCE',
                'ville' => 'PYRENEES-ATLANTIQUE',
                'adresse' => 'PLATEAU DE BEZOU GOURETTE 64440',
                'description' => "Ils sont trois, passionnés de montagne et de voyages, débordant d’idées lumineuses qu’ils finalisent eux-mêmes avec enthousiasme. Basés à Gourette, station de sports d’hiver située dans les Pyrénées, ils ont mis au point, conçu et réalisé, avec la complicité du directeur de la station, une déclinaison de dôme version luxe où passer la nuit, combinée avec de séduisantes activités : bain nordique à 38°, balade nocturne en raquettes (tout public), dîner gastronomique au champagne, etc., le tout à 1600 m d’altitude. Une offre qui séduit les visiteurs désireux de varier les plaisirs et rompre la monotonie des pentes neigeuses, notamment les accompagnants des skieurs, souvent délaissés. A tort ! Car leur nombre n’est pas négligeable : pour 1 skieur, 2 accompagnants qui veulent eux aussi, à juste titre, être chouchoutés ! Ils ne seront pas déçus tant le décor naturel se marie harmonieusement avec l’élégance de la structure du dôme, toute de bois et métal simulant les flocons de neige et le confort intérieur, inespéré dans cet environnement grandiose et blanc à perte de vue. Toilettes, douche, lavabo, poêle à bois, réfrigérateur, micro-ondes, une vraie suite de luxe ! Main d’oeuvre et matériaux locaux, souci de préserver l’environnement, recyclage des déchets, tout a été pensé en amont et scrupuleusement mis en œuvre. Dans votre « wild dome », vous serez complètement autonomes, sous l’oeil prévenant et attentif de votre accompagnateur installé un peu plus loin. Une expérience inédite et précieuse, riche de sensations… vertigineuses !",
                'telephone' => "0123455667",
                'price' => 30.00,
                'photo' => '1558110612.jpg',
                'statut' => 'Validé'
            ]
        ];
        DB::table('houses')->insert($houses);
    }
}
