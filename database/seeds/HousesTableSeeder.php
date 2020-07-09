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
                'title' => 'Cabane de trappeur',
                'user_id' => 1,
                'category_id' => 3,
                'adresse' => 'Gironde, France',
                'description' => "Vous vous demandez comment vous mettre dans la peau d’un chasseur, en pleine forêt du Québec / Canada ou des Etats-Unis ? Pas besoin de réserver votre billet d’avion. C’est possible en Gironde, près de Bordeaux !
                Notre domaine d’hébergement insolite peut en effet vous transporter instantanément vers le continent nord-américain. Il vous suffit pour cela de vous installer confortablement dans notre magnifique cabane de trappeur. Si vous êtes séduit par son look « rustique », vous le serez tout autant par son intérieur, dont le niveau de confort vous permet d’y séjourner en toutes saisons.",
                'start_date' => '2020-02-10',
                'end_date' => '2020-12-30',
                'nb_personnes' => 4,
                'phone' => '0623216792',
                'price' => 99.00,
                'photo' => 'cabane_trappeur.jpg',
                'statut' => 'Validé',
                'disponible' => 'oui'
            ],
            [
                'title' => 'Maisons flottantes aquapesca',
                'user_id' => 1,
                'category_id' => 2,
                'adresse' => 'Corrèze, France',
                'description' => "Maison flottante Aquapesca, 4 personnes (optionnel 6 personnes 15 € par nuit et par personne)
                D'une surface totale 54m² dont 30 m² de terrasse, la maison flottante se compose d'une chambre avec lit double 160x200, d'une chambre cabine avec 2 lits superposés 80X190, d'une salle de bain avec douche à l'italienne, d'un WC conventionnel et d'une cuisine équipée, d'un coin salon avec canapé convertible, table basse et TV.
                La terrasse est équipée d'un salon de jardin et de 2 transats. Vous disposez d'une barque à moteur électrique le temps de votre séjour pour découvrir les 32 hectares de notre étang.",
                'start_date' => '2020-02-10',
                'end_date' => '2020-12-30',
                'nb_personnes' => 4,
                'phone' => '0623216792',
                'price' => 110.00,
                'photo' => 'cabane_eau.jpg',
                'statut' => 'Validé',
                'disponible' => 'oui'
            ],
            [
                'title' => 'La yourte du vigneau',
                'user_id' => 1,
                'category_id' => 5,
                'adresse' => 'Vendée, France',
                'description' => "Yourte Mongole en plein cœur du domaine à l'abri des regards
                Vous pourrez profiter d'un séjour en famille dans cette yourte typique de la culture mongole, avec puits de lumière. Calme et tranquillité seront les maîtres mots de votre séjour.
                Cet habitat traditionnel des populations nomades de Mongolie a plus de mille ans d’histoire. De génération en génération, de transhumance en transhumance elle accompagne le peuple mongol, en harmonie avec la nature. Elle est aujourd'hui toujours utilisée.
                
                Tranquillité garantie, aucun vis à vis autour de la yourte
                De nombreuses ballades sont possibles dès l’emplacement, et entre autres le long de la vallée de l’Yon (vallée de Piquet).
                La yourte traditionnelle en bois, écologique, tout le charme de l’authenticité en Vendée pour satisfaire votre envie d'évasion et de nature.
                La yourte est composée d'une armature de bois recouverte de plusieurs couches textiles : feutre isolant, toile imperméable, toile de parement. Ses murs verticaux et son espace circulaire en font un lieu agréable à vivre et relativement grand.",
                'start_date' => '2020-02-10',
                'end_date' => '2020-12-30',
                'nb_personnes' => 4,
                'phone' => '0623216792',
                'price' => 84.00,
                'photo' => 'yourte_vigneau.jpg',
                'statut' => 'Validé',
                'disponible' => 'oui'
            ],
            [
                'title' => 'La yourte du domaine du chatelet',
                'user_id' => 1,
                'category_id' => 5,
                'adresse' => 'Vosges, France',
                'description' => "C’est une véritable yourte mongole traditionnelle de qualité supérieure (adaptée aux climats des Hautes Vosges) aménagée de ces meubles d’origine, elle peut accueillie jusqu’à 5 personnes

                Venez goûter au confort de cet habitat nomade aux portes du parc naturel régional des Ballons des Vosges dans un cadre naturel, calme et romantique. Pour votre confort, la Yourte est alimentée en eau froide ( hors période de gèle) et en électricité et dispose d'un chauffage au bois. Elle est équipée à l’intérieur de 5 couchages, (1 lit 2 places, 2 lits 1 place et un lit d'appoint), une table basse avec tabourets, frigo, vaisselle, bouilloire électrique et four micro-onde.
                
                A l’extérieur de la Yourte, sur la terrasse panoramique, un espace sanitaire avec eau froide (hors période de gèle), toilette sèche, table pique-nique, parasol, transats et un barbecue en pierre au pied de la terrasse.
                
                Un espace sanitaire collectif avec douches, WC, et espace plonge est à votre disposition à 80 m de la Yourte.
                
                Il n'est possible de cuisiner à l’intérieur de la Yourte mais vous avez la possibilité de faire un barbecue ou commander des plats préparés chez l'un de nos traiteur partenaire ou faire de la restauration.",
                'start_date' => '2020-02-10',
                'end_date' => '2020-12-30',
                'nb_personnes' => 2,
                'phone' => '0623216792',
                'price' => 70.00,
                'photo' => 'yourte_vosges.jpg',
                'statut' => 'Validé',
                'disponible' => 'oui'
            ],
            [
                'title' => 'Les wagons du camping le haut village',
                'user_id' => 1,
                'category_id' => 7,
                'adresse' => 'Loire-Atlantique, France',
                'description' => "WAGON DE TRAIN:

                Le wagon de train (voiture ferroviaire) OCEM Talbot date de 1930.

                Il a été récupéré à l'Association des Chemins de fer de Vendée.
                Il possède 4 chambres, un espace repas, une cuisine, une douche et un WC.
                Logement pour 10 personnes.
                
                
                Ce Wagon est équipé de :
                Deux chambres avec un lit double
                Deux chambres avec trois lits d’une place. Les lits sont superposés. Attention, le lit du haut est interdit aux enfants de moins de 6 ans.
                Une cuisine avec évier, réfrigérateur, plaque de cuisson, micro-ondes, four, cafetière et vaisselle. Les petits-déjeuners ne sont pas fournis.
                Douche et WC
                Oreillers et couvertures fournis. Draps et serviettes de toilette non fournis
                TV gratuite
                Terrasse couverte",
                'start_date' => '2020-02-10',
                'end_date' => '2020-12-30',
                'nb_personnes' => 2,
                'phone' => '0623216792',
                'price' => 399.00,
                'photo' => 'train_camping.jpg',
                'statut' => 'Validé',
                'disponible' => 'oui'
            ],
            [
                'title' => "Attrap'reves",
                'user_id' => 1,
                'category_id' => 2,
                'adresse' => 'Bouches-du-Rhone, France',
                'description' => "A Allauch, dans les Bouches-du-Rhône on attrapes vos rêves et on les réalise ! Ils sont 5, comme les doigts d’une main, tous dans la famille, chacun avec sa spécialité, pour vous satisfaire. Depuis presque dix ans, le domaine, une pinède de 15 000 m², offre une palette d’hébergements insolites tous aussi craquants les uns que les autres. Une « Aqua'Room», reposante à souhait avec sa déco planante faite de poissons multicolores qui s’ébattent dans deux aquariums géants, une cabane tahitienne entourée de bambous où ne manque que le yukulele, un Lov'nid, une cabane « écureuil » et des bulles transparentes ou semi-transparentes pour admirer en toute quiétude les nuits étoilées. Chacune a sa « personnalité », à choisir selon votre humeur. Toutes sont équipées confortablement. Vous croiserez peut-être Geoffrey ou Bruno sur le domaine. Ce dernier, professionnel de l’hôtellerie, vous concoctera vos petits déjeuners « maison ». Vous pouvez également commander des plateaux-repas à déguster sur la terrasse à côté de votre bulle ou dans un chalet « ad hoc ». Sur place, piscine (seulement à Allauch) et jacuzzi assorti de massages (sur réservation) sont à la disposition des hôtes.
                Chaque hébergement dispose de son chemin d’accès propre, afin de préserver l’intimité des hôtes. Une parenthèse à vivre à deux (éventuellement accompagnés d’un enfant de plus de 6 ans). Le site est ouvert toute l’année. La presse et notamment la presse étrangère, ne tarit pas d’éloges sur ce lieu à part, loin du tourisme de masse aseptisé. A tester d’urgence ! La bonne idée : les bons « cadeau » disponibles sur le site.",
                'start_date' => '2020-02-10',
                'end_date' => '2020-12-30',
                'nb_personnes' => 2,
                'phone' => '0623216792',
                'price' => 150.00,
                'photo' => 'bulle.jpg',
                'statut' => 'Validé',
                'disponible' => 'oui'
            ],
            
        ];
        DB::table('houses')->insert($houses);
    }
}
