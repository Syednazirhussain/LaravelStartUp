<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use App\Models\Mechanic;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function exampleHasOneThrough()
    {
        $mechanics = Mechanic::whereId(3)->with('carOwner')->first();

        return response()->json($mechanics);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function exampleHasManyThrough()
    {
        $mechanics = Mechanic::whereId(3)->with('carOwners')->first();

        return response()->json($mechanics);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function getUserRoles(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::whereId($user_id)->with('roles')->first();

        return response()->json($user);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function getRoles(Request $request)
    {
        $role_id = $request->get('id');
        $role = Role::whereId($role_id)->with('users')->first();

        return response()->json($role);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function imagableUser(Request $request)
    {
        $user_id = $request->get('id');
        $user = User::whereId($user_id)->first();

        return response()->json(["image" => $user->image ]);
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function imagablePost(Request $request)
    {
        $post_id = $request->get('id');
        $post = Post::whereId($post_id)->first();

        return response()->json(["image" => $post->image ]);
    }
    


}
