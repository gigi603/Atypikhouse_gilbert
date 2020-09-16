<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Admin;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;
use App\Notifications\ReplyToMessage;

use Illuminate\Support\Facades\Auth; 

class PostsController extends Controller
{
    public function contact()  
    {
        return view('user.contact'); 
    } 
 
    public function sendMessage(CreatePostRequest $request)  
    { 
        if($request->name != Auth::user()->nom.' '.Auth::user()->prenom || $request->email != Auth::user()->email){
            return back()->with('danger', "Votre message n'a pas été envoyé");
        } else {

            $post = new post;
            $post->name = $request->name;
            $post->email = $request->email;
            $post->content = $request->content;
            $post->type = "message";
            $post->house_id = 0;
            $post->reservation_id = 0;
            $post->user_id = Auth::user()->id;
            $post->save();
            
            $admins = Admin::all();
            foreach ($admins as $admin) {
                $admin->notify(new ReplyToMessage($post));
            }

            return back()->with('success', 'Votre message a bien été envoyé, nos administrateurs reviendront vers vous !');
        }
    }
}
