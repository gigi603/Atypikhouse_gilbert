<?php

namespace App\Console\Commands;
//namespace App\Providers;

use Route;
//use Illuminate\Routing\Router;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Tags\Url;
use Carbon\Carbon;
use App\User;
use App\House;
use App\Comment;
use App\Reservation;
use App\Category;
use App\Propriete;
use App\Valuecatpropriete;
use App\Ville;
use App\Post;
use App\Newsletter;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $sitemap = Sitemap::create();

        $routeCollection = Route::getRoutes()->get();
        $id = "{id}";
        foreach ($routeCollection as $value) {
            $uri = $value->uri();
            $isShowable = strpos($uri, '_dusk') === false && strpos($uri, 'api') === false 
            && strpos($uri, 'admin') === false && strpos($uri, 'json') === false
            && strpos($uri, 'token') === false && strpos($uri, 'user/{id}') === false && strpos($uri, 'houses/store/{id}') === false
            && strpos($uri, 'user/cancelreservation/{id}') === false;
            
            if($isShowable && $uri == '/') {
                $sitemap->add(Url::create('http://127.0.0.1:8000/')->setPriority(1.0));
            } elseif($isShowable && strpos($uri, 'user/showHouse/') !== false){
                $reservations = Reservation::all();
                foreach($reservations as $reservation){
                    $sitemap->add(Url::create('http://127.0.0.1:8000/' . str_replace($id, $reservation->id, $uri))->setPriority(1.0));
                }
            } elseif($isShowable && strpos($uri, 'user/showhebergement/') !== false){
                $annonces = House::all();
                foreach($annonces as $annonce){
                    $sitemap->add(Url::create('http://127.0.0.1:8000/' . str_replace($id, $annonce->id, $uri))->setPriority(1.0));
                }
            } elseif($isShowable && strpos($uri, 'showreservations/') !== false){
                $today = Carbon::now()->format('Y-m-d');

                $reservations = reservation::with('house')->where('start_date', '>=', $today)
                ->where('end_date', '>=', $today)
                ->orderBy('id', 'asc')
                ->get();

                foreach($reservations as $reservation){
                    $sitemap->add(Url::create('http://127.0.0.1:8000/' . str_replace($id, $reservation->id, $uri))->setPriority(1.0));
                }
            } elseif($isShowable && strpos($uri, 'showhistoriques/') !== false){
                $today = Carbon::now()->format('Y-m-d');
                $historiques = reservation::with('house')->where('start_date', '<=', $today)
                ->where('end_date', '<', $today)
                ->orderBy('id', 'asc')->get();

                foreach($historiques as $historique){
                    $sitemap->add(Url::create('http://127.0.0.1:8000/' . str_replace($id, $historique->id, $uri))->setPriority(1.0));
                }
            } elseif($isShowable && strpos($uri, 'showreservationsannulees/') !== false){
                $today = Carbon::now()->format('Y-m-d');

                $reservationsCanceled = reservation::with('house')->where('reserved', '=', 0)
                ->orderBy('id', 'asc')
                ->get();

                foreach($reservationsCanceled as $reservationCanceled){
                    $sitemap->add(Url::create('http://127.0.0.1:8000/' . str_replace($id, $reservationCanceled->id, $uri))->setPriority(1.0));
                }
            } elseif($isShowable && strpos($uri, 'profile/') !== false){

                $users = user::all();

                foreach($users as $user){
                    $sitemap->add(Url::create('http://127.0.0.1:8000/' . str_replace($id, $user->id, $uri))->setPriority(1.0));
                }
            } elseif($isShowable && strpos($uri, 'user/editHouse/') !== false){

                $annonces = House::all();

                foreach($annonces as $annonce){
                    $sitemap->add(Url::create('http://127.0.0.1:8000/' . str_replace($id, $annonce->id, $uri))->setPriority(1.0));
                }
            } elseif($isShowable && strpos($uri, 'users/deleteHouse/') !== false){

                $annonces = House::all();

                foreach($annonces as $annonce){
                    $sitemap->add(Url::create('http://127.0.0.1:8000/' . str_replace($id, $annonce->id, $uri))->setPriority(1.0));
                }
            } elseif($isShowable && strpos($uri, 'users/updateHouse/') !== false){

                $annonces = House::all();

                foreach($annonces as $annonce){
                    $sitemap->add(Url::create('http://127.0.0.1:8000/' . str_replace($id, $annonce->id, $uri))->setPriority(1.0));
                }
            } elseif($isShowable){
                $sitemap->add(Url::create('http://127.0.0.1:8000/'. $uri)->setPriority(0.5));
            }
        }
        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
