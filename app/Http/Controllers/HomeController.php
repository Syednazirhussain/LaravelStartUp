<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\User;
use App\Models\Role;
use App\Models\Post;
use App\Models\Image;
use App\Models\Book;
use App\Models\Author;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // broadcast(new \App\Events\NewTrade("some data"));
        $totalBooks = Book::all()->count();

        return view('home', [ "total_books" => $totalBooks ]);
    }

    public function downloadPDF (Request $request) {

        $books = Book::all();
        $pdf = PDF::loadView('pdf.books.list', [ "books" => $books ]);

        return $pdf->download('book-list.pdf');
        // return $pdf->stream('user-list.pdf');

        // $pdfStream = $pdf->stream('user-list.pdf');
        // $pdfFile = $pdf->download('user-list.pdf');

        // return response()->json(["pdf" => $pdfFile], 200);
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
     * One To One (Polymorphic).
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
     * One To One (Polymorphic).
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function imagablePost(Request $request)
    {
        // $image = Image::find(1);
        // dd($image->imageable);

        $post_id = $request->get('id');
        $post = Post::whereId($post_id)->first();

        return response()->json(["image" => $post->image ]);
    }
    
    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function author(Request $request)
    {
        /*
        $author_id = $request->get('id');
        $author = Author::whereId($author_id)->with('books')->first();
        */

        $authors = Author::with('books')->get();

        return response()->json($authors);
    }
    
    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
    */
    public function books()
    {
        $books = Book::with('author')->get();

        return response()->json($books);
    }
    


}
