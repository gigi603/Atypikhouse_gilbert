<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Jobs\SendVerificationEmail;
use App\User;
use App\Newsletter;
use App\Message;
use App\Post;
use App\Admin;
use App\Notifications\ReplyToUser;
use App\Mail\EmailVerification;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;
use App\Mail\SendNewsletter;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => 'required|alpha|max:50',
            'prenom' => 'required|alpha|max:50',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'date_birth' => 'required|date_format:d/m/Y|before:'.Carbon::now()->subYears(18),
            'newsletter' => 'boolean',
            'conditions' => 'accepted',
            'g-recaptcha-response' => 'required|captcha'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $data['date_birth'] = Carbon::parse($data['date_birth'])->format('Y-m-d');
        return User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => base64_encode($data['email']),
            'date_birth' => $data['date_birth'],
            'statut' => 1,
        ]);
    }
    /**
    * Handle a registration request for the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    protected function register(Request $request)
    {
        try {
           $input = $request->all();

            $validator = $this->validate($request, [
                'nom' => 'required|max:30|regex:/^[\pL\s\-]+$/u',
                'prenom' => 'required|min:1|max:30|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|unique:users|max:30',
                'email_confirmation' => 'required|same:email|max:30',
                'password' => 'required|min:8|max:30',
                'password_confirmation' => 'required|same:password|max:30',
                'conditions' => 'accepted',
                'date_birth' => 'required|date_format:d/m/Y|before:'.Carbon::now()->subYears(18),
                'newsletter' => 'boolean',
                'g-recaptcha-response'=>'required|captcha'
            ]);

            // if (isset($request->newsletter)) {
            //     $request->newsletter = 1;
            // } else {
            //     $request->newsletter = 0;
            // }
            $data = $this->create($input)->toArray();
    
            $user = User::find($data['id']);
            $user->email_token = $data['email_token'];
            $user->nom = $data["nom"];
            $user->prenom = $data["prenom"];
            $data["date_birth"] = Carbon::parse($request->date_birth)->format('Y-d-m');
            $user->date_birth = $data["date_birth"];
            $user->email_token = str_random(25);
            $user->newsletter = $request->input('newsletter') ? 1 : 0;
            $user->save();

            $message = new message;
            $message->content = "Bienvenue ".$user->prenom.", vous pouvez dès à présent créer des annonces en tant que propriétaire ou bien réserver des hébergements, notre équipe vous remercie.";
            $message->user_id = $user->id;
            $message->save();
            
            //Envoyer une notification à l'admin
            $post = new post;
            $post->name = $user->nom.' '.$user->prenom;
            $post->email = $user->email;
            $post->content = "Un nouvel utilisateur qui se nomme ".$user->prenom." ".$user->nom." vient de s'inscrire sur le site";
            $post->type = "utilisateur";
            $post->house_id = 0;
            $post->reservation_id = 0;
            $post->save();
            
            $admins = Admin::all();
            foreach ($admins as $admin) {
                $admin->notify(new ReplyToUser($post));
            }
            if($user->newsletter == 1) {
                $newsletters = newsletter::all();
                foreach($newsletters as $newsletter){
                    Mail::to($user->email)->send(new SendNewsletter($newsletter));
                }
            }
            return redirect(route('login'))->with('status', 'Merci pour votre inscription, vous pouvez dès à présent vous connecter sur le site.');
        } catch (Exception $e) { 
            abort(404);
        }
        // 
        
        
        
       

        
    }

    public function confirmation($email_token) {
        $user = User::where('email_token', $email_token)->first();

        if (!is_null($user)) {
            $user->verified = 1;
            $user->email_token;
            $user->save();
            return redirect(route('login'))->with('status', 'Votre compte a été activé');
        }
        return redirect(route('login'))->with('status', 'Quelque chose ne va pas');
    }
    
    protected function verify($token)
    {
        $user = User::where('email_token', $token)->first();
        $user->verified = 1;

        if($user->save()){
            return view('emailconfirm',['user'=> $user]);
        }
    }
}
