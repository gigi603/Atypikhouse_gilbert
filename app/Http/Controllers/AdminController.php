<?php
namespace App\Http\Controllers;
use App\User;
use App\Admin;
use App\Category;
use App\House;
use App\Ville;
use App\Comment;
use App\Propriete;
use App\Post;
use App\Message;
use App\Reservation;
use App\Valuecatpropriete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;
use Session;
use Image;
use App\Http\Requests\EditHouseAdminRequest;
use App\Http\Requests\MessageRequest;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProprieteRequest;
use Jenssegers\Date\Date;
use Carbon\Carbon;


class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

     // Utilisateurs
    public function listusers(User $users, Category $categories, Propriete $proprietes)
    {
        $proprietes = propriete::all();
        $categories = category::all();
        $users = user::all();
        $houses = house::all();
        return view('admin.listusers')->with('users', $users)
                            ->with('categories', $categories)
                            ->with('proprietes', $proprietes)
                            ->with('houses', $houses);
    }

    public function deleteUser($id) {
        $house = user::find($id);
        $house->delete();
        return redirect()->back()->with('success', 'Le client a bien été supprimé');
    }

    //Message des clients (formulaire de contact)
    public function listposts(Post $posts)
    {
        $posts = post::where('type', 'message')->orderBy('id', 'desc')->get();
        $userUnreadNotifications = auth()->user()->unreadNotifications;

        foreach($userUnreadNotifications as $userUnreadNotification) {
            $data = $userUnreadNotification->data;
            foreach($posts as $post){
                if($post->id == $data["post_id"]){
                    $post["unread"] = true;
                }
            }
        }
        return view('admin.listposts')->with('posts', $posts);
    }


    //Vue de détails des messages clients
    public function showposts($id)
    {
        $post = post::find($id);

        $userUnreadNotifications = auth()->user()->unreadNotifications;
        foreach($userUnreadNotifications as $userUnreadNotification) {
            $data = $userUnreadNotification->data;
            if($post->id == $data["post_id"]){
                $userUnreadNotification->markAsRead();
            }
        }
        return view('admin.showposts')->with('post', $post);
    }

    //Message des clients (formulaire de contact)
    public function listpostsuser(Post $posts)
    {
        $posts = post::where('type', 'utilisateur')->orderBy('id', 'desc')->get();
        $userUnreadNotifications = auth()->user()->unreadNotifications;

        foreach($userUnreadNotifications as $userUnreadNotification) {
            $data = $userUnreadNotification->data;
            foreach($posts as $post){
                if($post->id == $data["post_id"]){
                    $post["unread"] = true;
                }
            }
        }
        return view('admin.listposts_user')->with('posts', $posts);
    }

    //Vue de détails des messages clients
    public function showpostsuser($id)
    {
        $post = post::find($id);
        $userUnreadNotifications = auth()->user()->unreadNotifications;
        foreach($userUnreadNotifications as $userUnreadNotification) {
            $data = $userUnreadNotification->data;
            if($post->id == $data["post_id"]){
                $userUnreadNotification->markAsRead();
            }
        }
        return view('admin.showposts_user')->with('post', $post);
    }

    public function listpostsannonce(Post $posts)
    {
        $posts = post::where('type', 'annonce')->orderBy('id', 'desc')->get();
        $userUnreadNotifications = auth()->user()->unreadNotifications;

        foreach($userUnreadNotifications as $userUnreadNotification) {
            $data = $userUnreadNotification->data;
            foreach($posts as $post){
                if($post->id == $data["post_id"]){
                    $post["unread"] = true;
                }
            }
        }
        return view('admin.listposts_annonce')->with('posts', $posts);
    }

    //Vue de détails des messages clients
    public function showpostsannonce($id)
    {
        $post = post::find($id);
        $house = house::find($post->house_id);
        $userUnreadNotifications = auth()->user()->unreadNotifications;
        foreach($userUnreadNotifications as $userUnreadNotification) {
            $data = $userUnreadNotification->data;
            if($post->id == $data["post_id"]){
                $userUnreadNotification->markAsRead();
            }
        }
        return view('admin.showposts_annonce')->with('post', $post)->with('house', $house);
    }

    public function listpostsreservation(Post $posts)
    {
        $posts = post::where('type', 'reservation')->orderBy('id', 'desc')->get();
        $userUnreadNotifications = auth()->user()->unreadNotifications;

        foreach($userUnreadNotifications as $userUnreadNotification) {
            $data = $userUnreadNotification->data;
            foreach($posts as $post){
                if($post->id == $data["post_id"]){
                    $post["unread"] = true;
                }
            }
        }
        return view('admin.listposts_reservation')->with('posts', $posts);
    }

    //Vue de détails des messages clients
    public function showpostsreservation($id)
    {
        $post = post::find($id);
        $reservation = reservation::find($post->reservation_id);
        $userUnreadNotifications = auth()->user()->unreadNotifications;
        foreach($userUnreadNotifications as $userUnreadNotification) {
            $data = $userUnreadNotification->data;
            if($post->id == $data["post_id"]){
                $userUnreadNotification->markAsRead();
            }
        }
        return view('admin.showposts_reservation')->with('post', $post)->with('reservation', $reservation);
    }

    //Categories

    public function listcategories(Category $categories)
    {
        $categories = category::all();
        return view('admin.listcategories')->with('categories', $categories);
    }

    public function createcategory(Request $request)
    {
        return view('admin.create_category');
    }

    public function registercategory(CategoryRequest $request)
    {
        $categories = category::all();
        $users = user::all();
        $category = new category;
        $category->category = $request->category;
        $category->statut = 1;
        if ($category->where('category', $category->category)->count() > 0){
            return redirect()->back()->with('danger', "La catégorie existe déjà")->with('categories', $categories);
        }
        $category->save();
        foreach($users as $user){
            $message = new message;
            $message->content = "L'administrateur a rajouté la catégorie ".$category->category." sur les type d'hébergement";
            $message->user_id = $user->id;
            $message->save();
        }
        return redirect()->route('admin.categories')->with('success', "La catégorie a bien été ajoutée, un message a été envoyé à tous les propriétaires")->with('categories', $categories);
    }

    public function enableCategory($id)
    {
        $users = user::all();
        $category = category::find($id);
        $category->statut = 1;
        $category->save();
        foreach($users as $user){
            $message = new message;
            $message->content = "L'administrateur a ajouté la catégorie ".$category->category." sur les types d'hébergements";
            $message->user_id = $user->id;
            $message->admin_id = Auth::user()->id;
            $message->save();
        }
        return redirect()->back()->with('success', "La catégorie ".$category->category." a bien été activé, un message a été envoyé à tous les propriétaires");
    }

    public function disableCategory($id)
    {
        $users = user::all();
        $category = category::find($id);
        $category->statut = 0;
        $category->save();
        foreach($users as $user){
            $message = new message;
            $message->content = "L'administrateur a supprimé la catégorie ".$category->category.", lorsque vous créérez une nouvelle annonce la catégorie ".$category->category." ne sera plus disponible";
            $message->user_id = $user->id;
            $message->save();
        }
        return redirect()->back()->with('danger', "La catégorie ".$category->category." a bien été désactivé, un message a été envoyé à tous les propriétaires");
    }

    //Propriétés des catégories

    public function proprietescategory(Request $request, Category $categories, $id)  
    {
        $category = category::find($id);
        $proprietes = propriete::where('category_id', $id)->get();
        //var_dump($proprietes);
        return view('admin.proprietes')->with('category', $category)
                                       ->with('proprietes', $proprietes);
    }

    public function createpropriete(Request $request, $id) {
        $category = category::find($id);
        return view('admin.create_propriete')->with('category', $category);
    }

    public function registerpropriete(ProprieteRequest $request)
    {
        $propriete = new propriete;
        $propriete->propriete = $request->propriete;
        $propriete->category_id = $request->category_id;
        if ($propriete->where('propriete', $propriete->propriete)->where('category_id', '=', $request->category_id)->count() >0) {
            return redirect()->back()->with('danger', "La propriété existe déjà");
        } else {
            $propriete->save();

            $houses = house::where('category_id', '=', $request->category_id)->get();
            foreach($houses as $house){
                // $valuecatpropriete = new valuecatpropriete;
                // $valuecatpropriete->category_id = $request->category_id;
                // $valuecatpropriete->propriete_id = $propriete->id;
                // $valuecatpropriete->house_id = $house->id;
                // $valuecatpropriete->save();

                $message = new message;
                $message->content = "L'administrateur a ajouté une propriété ".$propriete->propriete." sur vos annonces ayant comme catégorie ".$propriete->category->category;
                $message->user_id = $house->user_id;
                $message->save();
            }
            
            return redirect()->route('admin.proprietes_category', ['id' => $request->category_id])->with('success', "La propriété ".$propriete->propriete." a bien été ajoutée, un message a été envoyé aux proprietaires ayant dans leur annonce la catégorie ".$propriete->category->category)->with('category_id', $request->category_id);
        }
    }

    public function deletepropriete(Request $request, $id)
    {
        $propriete = propriete::find($id);
        $values_propriete = valuecatpropriete::with('propriete')->where([
                                                                ['category_id', '=', $propriete->category_id],
                                                                ['propriete_id', '=', $propriete->id],
                                                        ])->get();
        foreach($values_propriete as $values){
            $values->delete();
        }
        
        $houses = house::where('category_id', '=', $propriete->category_id)->get();
        $propriete->delete();
        foreach($houses as $house){
            $message = new message;
            $message->content = "L'administrateur a supprimé la propriété ".$propriete->propriete." ainsi que les valeurs attribuées à ".$propriete->propriete;
            $message->user_id = $house->user_id;
            $message->save();
        }
        return redirect()->back()->with('danger', "Votre propriété ".$propriete->propriete." a bien été supprimée, un message a été envoyé aux propriétaires ayant dans leur annonce la catégorie ".$propriete->category->category);
    }

    public function disableUser($id)
    {
        $user = user::find($id);
        $user->statut = 0;
        $user->save();

        return redirect()->back()->with('danger', "Le compte de l'utilisateur ".$user->prenom." ".$user->nom." a bien été désactivé");
    }

    public function activateUser($id)
    {
        $user = user::find($id);
        $user->statut = 1;
        $user->save();

        return redirect()->back()->with('success', "Le compte de l'utilisateur ".$user->prenom." ".$user->nom." a bien été activé");
    }

    public function editHouse($id)
    { 
        $categories = category::all();
        $house = house::find($id);

        if($house->category_id == null){
            $categorySelected = "";
        } else {
            $categorySelected = $house->category_id;
        }
        
        $proprietes = propriete::where('category_id', $house->category->id)->get();
        
        return view('admin.editHouse')->with('house', $house)
                                ->with('categories', $categories)
                                ->with('categorySelected', $categorySelected)
                                ->with('proprietes', $proprietes);
    }

    public function valideHouse($id) {
        $house = house::find($id);
        $house->statut = "Validé";
        $house->save();
        return redirect()->back()->with('success-valide', "Vous avez bien validé cette annonce");
    }

    public function refuseHouse($id) {
        $house = house::find($id);
        $house->statut = "Refusé";
        $house->save();
        return redirect()->back()->with('success-valide', "Vous avez bien refusé cette annonce");

    }

    public function json_propriete($id, $category){
        $house = house::find($id);
        
        $proprietes = propriete::where('category_id', $category)->get();
        $valuecatProprietesHouse = valuecatpropriete::where('category_id', $category) 
        ->where('house_id', $id)
        ->get();

        $valArray = array();
        foreach($proprietes as $propriete){
            foreach($valuecatProprietesHouse as $val){
                if($val->propriete_id == $propriete->id){
                    array_push($valArray, $val);
                }
            }
        }
        //var_dump($valArray);
        return response()->json(["proprietes" => $proprietes,
                                 "house" => $house,
                                 "valArray" => $valArray]); 
    }

    public function updateHouse(EditHouseAdminRequest $request,Category $category, Ville $ville, House $house, $id)
    {
        $house = house::find($id);

        $categories = category::where('statut','=', 1)->get();
        $houseCategoryEditAdmin = $request->session()->get('houseCategoryEditAdmin');
        $request->session()->push('houseCategoryEditAdmin', $request->category_id);
        if($houseCategoryEditAdmin == null){
            $categorySelected = "";
        } else {
            $categorySelected = last($houseCategoryEditAdmin);
        }

        if($house->title != $request->title || $house->category_id != $request->category_id
        || $house->nb_personnes != $request->nb_personnes || $house->price != $request->price 
        || $house->adresse != $request->adresse || $house->photo != $request->photo
        || $house->description != $request->description || $house->start_date != $request->start_date 
        || $house->end_date != $request->end_date){
            $house->title = $request->title;

            $lastCategory = $categories->last();
            if($request->category_id > $lastCategory->id){
                $categorySelected = $request->category_id;
                return redirect()->back()->with('danger', 'Veuillez selectionner une categorie valide');
            }
            $house->category_id = $request->category_id;
            $house->nb_personnes = $request->nb_personnes;
            $house->price = $request->price;
            $house->adresse = $request->adresse;
            
            if($request->hasFile('photo')){
                $picture = $request->file('photo');
                $filename  = time() . '.' . $picture->getClientOriginalExtension();
                $path = public_path('img/houses/' . $filename);
                Image::make($picture->getRealPath())->resize(350, 225)->save($path);
                $house->photo = $filename;
            }

            $start_date = Carbon::createFromFormat('d/m/Y', $request->start_date);
            $start_date_date_format = Carbon::parse($start_date)->format('Y-m-d');
            $house->start_date = $start_date_date_format;

            $end_date = Carbon::createFromFormat('d/m/Y', $request->end_date);
            $end_date_date_format = Carbon::parse($end_date)->format('Y-m-d');
            $house->end_date = $end_date_date_format;
            $house->description = $request->description;
            $house->statut = "En attente de validation";
            $house->save();
        }
        $valueproprietes = valuecatpropriete::where('house_id','=', $id)->get();
        $proprietes_category = propriete::where('category_id', '=', $request->category_id)->get();
        $valueproprietesdelete = valuecatpropriete::where('house_id','=', $id)->delete();
        if(count($request->propriete) > 0){
            foreach($request->propriete as $proprietes) {
                var_dump($proprietes);       
                $valuecatProprietesHouse = new valuecatPropriete;
                $valuecatProprietesHouse->category_id = $request->category_id;
                $valuecatProprietesHouse->house_id = $house->id;
                $valuecatProprietesHouse->propriete_id = $proprietes;
                $valuecatProprietesHouse->save();
            }   
        }

        if($house->statut != $request->statut){
            if($request->statut == "En attente de validation"){
                $house->statut = $request->statut;
                $house->save();
                $message = new message;
                $message->content = "L'administrateur a mise en attente votre annonce ".$house->title.", il vous enverra un autre message concernant les modifications que vous devez effectuer afin qu'il valide par la suite votre annonce";
                $message->user_id = $house->user_id;
                $message->save();
                $request->session()->forget('houseCategoryEditAdmin');
                return redirect()->back()->with('categorySelected', $categorySelected)->with('success', "L'hébergement du propriétaire a bien été modifié, vous avez mise en attente l'annonce, un message a été envoyé au propriétaire de cette annonce");
            } else {
                $house->statut = $request->statut;
                $house->save();
                $message = new message;
                $message->content = "L'administrateur a validé votre annonce ".$house->title;
                $message->user_id = $house->user_id;
                $message->save();
                $request->session()->forget('houseCategoryEditAdmin');
                return redirect()->back()->with('categorySelected', $categorySelected)->with('success', "L'hébergement du propriétaire a bien été modifié, vous avez validé l'annonce, un message a été envoyé au propriétaire de cette annonce");
            }
        }
    
        if($request->photo == NULL){
            $request->photo = $house->first()->photo;
            $house->save();

            $message = new message;
            $message->content = "L'administrateur a modifié des informations sur votre annonce ".$house->title;
            $message->user_id = $house->user_id;
            $message->save();
            $request->session()->forget('houseCategoryEditAdmin');
            return redirect()->back()->with('categorySelected', $categorySelected)->with('success', "L'hébergement de l'utilisateur a bien été modifié, un message a été envoyé au propriétaire de cette annonce");
        } else {
            $picture = $request->file('photo');
            $filename  = time() . '.' . $picture->getClientOriginalExtension();
            $path = public_path('img/houses/' . $filename);
            Image::make($picture->getRealPath())->resize(350, 200)->save($path);
            $house->photo = $filename;
            $house->save();

            $message = new message;
            $message->content = "L'administrateur a modifié des informations sur votre annonce ".$house->title;
            $message->user_id = $house->user_id;
            $message->save();
            $request->session()->forget('houseCategoryEditAdmin');
            return redirect()->back()->with('categorySelected', $categorySelected)->with('success', "L'hébergement du propriétaire a bien été modifié, un message a été envoyé au propriétaire de cette annonce");
        } 
    }

    public function disableHouse($id)
    { 
        $house = house::find($id);
        $house->disponible = "non";
        $house->save();
        return redirect()->back()->with("success", "L'annonce du propriétaire a bien été retiré");

    }

    /**
     * Show the profile for the given user.
     *
     * @return Response
     */
    public function profilUser($id) {  
        $user = User::find($id);
        return view('admin.profilUser')->with('user', $user);
    }

    public function allreservations()
    {
        $reservations = Reservation::where('end_date', '>=', Carbon::now())->where('reserved', '=', 1)->orderBy('id', 'desc')->get();
        return view('admin.allreservations')->with('reservations', $reservations);
    }

    //Liste des reservations des utilisateurs
    public function listreservations($id)
    {
        $today = Date::today()->format('Y-m-d');
        $reservations = reservation::where('user_id','=', $id)->where('start_date', '>=', $today)
        ->where('reserved', '=', 1)->get();
        return view('admin.listreservations')->with('reservations', $reservations);
    }

    //Vue de détails des reservations des utilisateurs
    public function showreservations($id)
    {
        $users = User::where('id', $id)->get();
        $houses = House::where('user_id', $id)->get();
        $reservation = reservation::find($id);
        return view('admin.showreservations')->with('houses', $houses)
                                              ->with('users', $users)
                                              ->with('reservation', $reservation);
    }

    public function allreservationscancel()
    {
        $reservations = Reservation::where('reserved', '=', 0)->orderBy('id', 'desc')->get();
        return view('admin.allreservationscancel')->with('reservations', $reservations);
    }

    public function showreservationscancel($id)
    {
        $users = User::where('id', $id)->get();
        $houses = House::where('user_id', $id)->get();
        $reservation = reservation::find($id);
        return view('admin.showreservationscancel')->with('houses', $houses)
                                              ->with('users', $users)
                                              ->with('reservation', $reservation);
    }

    public function allhistoriques()
    {
        $today = Date::today()->format('Y-m-d');
        $historiques = Reservation::with('house')->where([
                                                    ['start_date', '<', $today],
                                                    ['end_date', '<=', $today]
                                                ])->get();
        return view('admin.allhistoriques')->with('historiques', $historiques);
    }

    //Liste des reservations des utilisateurs
    public function listhistoriques($id)
    {
        $today = Date::today()->format('Y-m-d');
        $historiques = Reservation::with('house')->where([
                                                    ['start_date', '<', $today],
                                                    ['end_date', '<=', $today],
                                                    ['user_id','=', $id]
                                                ])->get();
        return view('admin.allhistoriques')->with('historiques', $historiques);
    }

    //Vue de détails des historiques des utilisateurs
    public function showhistoriques($id)
    {
        $user = User::where('id', $id)->get();
        $houses = House::where('user_id', $id)->get();
        $historique = reservation::find($id);
        return view('admin.showhistoriques')->with('houses', $houses)
                                              ->with('user', $user)
                                              ->with('historique', $historique);
    }

    //Liste des reservations des utilisateurs
    public function listreservationscancel($id)
    {
        $today = Date::today()->format('Y-m-d');
        $reservations = Reservation::with('house')->where([
                                                    ['reserved', '=', 0],
                                                    ['user_id','=', $id]
                                                ])->get();
        return view('admin.listreservationscancel')->with('reservations', $reservations);
    }
    
    public function allannonces()
    {
        $houses = House::where('disponible', "oui")->orderBy('id', 'desc')->get();
        return view('admin.allannonces')->with('houses', $houses);
    }
    //Vue de détails des annonces des utilisateurs
    public function listannonces($id)
    {
        $user = User::find($id);
        $houses = House::where('user_id', $id)->where('disponible', "oui")->get();
        return view('admin.listannonces')->with('houses', $houses)
                                         ->with('user', $user);
    }

    public function showannonces($id)
    {
        $user = User::find($id);
        $house = house::find($id);
        return view('admin.showannonces')->with('house', $house)
                                         ->with('user', $user);
    }

    public function deleteAnnonce($id) {
        $house = house::find($id);
        foreach($house->valuecatproprietes as $valuecatpropriete){
            $valuecatpropriete->delete();
        }
        $house->delete();
        $message = new message;
        $message->content = "L'administrateur a supprimé votre annonce ".$house->title;
        $message->user_id = $house->user_id;
        $message->admin_id = Auth::user()->id;
        $message->save();
        return redirect()->back()->with('success', "L'annonce a bien été supprimée, un message a été envoyé au propriétaire de l'annonce");
    }

    public function listcomments(Comment $comments, $id)
    {
        $comments = DB::table('comments')->join('houses', 'houses.id', '=', 'comments.house_id')
                                         ->join('users', 'users.id', '=', 'comments.user_id')
                                                ->where('comments.user_id','=', $id)
                                                ->get();
        return view('admin.listcomments')->with('comments', $comments);
    }

    public function addComment(CommentRequest $request)
    {
        // $this->validate($request, [
        //     'house_id' => 'exists:houses,id|numeric',
        //     'comment' => 'required|max:255'
        // ]);
        $comment = new Comment;
        $comment->comment = $request->comment;
        if($request->note == null){
            $comment->note = 0;
        } else {
            $comment->note = $request->note;
        }
        $comment->user_id = "0";
        $comment->admin_id = "1";
        $comment->house_id = $request->house_id;
        $comment->save();
        Session::flash('success', 'Votre commentaire a bien été ajouté');
        return redirect()->back();
    }

    public function deleteComment($id) {
        $comment = comment::find($id);
        $comment->delete();
        return redirect()->back()->with('success', 'Le commentaire a bien été supprimé');
    }

    public function note(House $house, Note $note) {
        $note = note::find($house->id);
        $house->title = $request->get('title');
        $house->idCategory = $request->get('idCategory');
        $house->price = $request->get('price');
    }

    public function messages($id) {
        $messages = message::where('user_id','=', $id)->orderBy('id', 'desc')->get();
        $user = user::find($id);
        return view('admin.user_messages')->with('messages', $messages)->with('user', $user);
    }

    public function addMessage(MessageRequest $request, $id) {
        $user = user::find($id);
        if($user != NULL){
            $message = new Message;
            $message->content = $request->content;
            $message->user_id = $id;
            $message->save();
            Session::flash('success-valide', 'Votre message a bien été envoyé');
            return redirect()->back();
        } else {
            Session::flash('error', "Votre message n'a bien été envoyé une erreur est survenue");
            return redirect()->back();
        }
    } 
}
