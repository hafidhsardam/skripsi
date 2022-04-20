<?php

namespace App\Http\Controllers;

// Load Function and dependencies on Laravel 7
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

// Load All The Model
use App\Article;
use App\Categorie;
use App\User;

class UserController extends Controller
{
    public function index()
    {
        session(['menu_user' => 'home']);
        return view("user.home");
    }

    public function register_user()
    {
        session(['menu_user' => 'register']);
        return view("user.register_user");
    }

    public function register_validation(Request $request)
    {
        request()->validate([
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email',
            'phone'                 => 'required|numeric',
            'password'              => 'required|min:8',
            'confirmation_password' => 'required|min:8|same:password',
        ]);

        $data = array(
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone,
            'role'           => 'user',
            'password'       => $request->password,
            'remember_token' => Str::random(10),
        );
        User::create($data);
        return redirect('register_user')->with('alert-register', 'Akun telah tersimpan, silahkan login.');
    }

    public function login_user()
    {
        session(['menu_user' => 'register']);
        return view("user.login_user");
    }

    public function login_validation(Request $request)
    {
        request()->validate([
            'login_as' => 'required',
            'email'    => 'required|email',
            'password' => 'required',
        ]);
        $login_as = $request->login_as;
        $email    = $request->email;
        $password = $request->password;
        if ($login_as == 1) {
            // User
            $data = User::where(["email" => $email, "role" => "user", "password" => $password])->first();
            if ($data) {
                session(['user_id' => $data->id]);
                return redirect('/')->with('alert-login', "Anda berhasil login.");
            } else {
                return redirect('/login_user')->with('alert-login', "Maaf. Gagal login, mohon periksa username dan password anda.");
            }
        } else {
            // Admin
            $data = User::where(["email" => $email, "role" => "admin", "password" => $password])->first();
            if ($data) {
                session(['admin_id' => $data->id]);
                return redirect('/admin')->with('alert-login-admin', "Anda berhasil login.");
            } else {
                return redirect('/login_user')->with('alert-login', "Maaf. Gagal login, mohon periksa username dan password anda.");
            }
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/')->with('alert-login', "Anda berhasil logout.");
    }

    public function categories($id)
    {
        session(['menu_user' => 'categories']);
        $data['categorie'] = Categorie::find($id);
        $data['blog'] = Article::where(['categorie_id' => $id])->paginate(6);
        return view("user.categories", $data);
    }

    public function blog_detail($id)
    {
        session(['menu_user' => 'categories']);
        $data['blog'] = Article::find($id);
        return view("user.blog_detail", $data);
    }

    public function about_us()
    {
        session(['menu_user' => 'about_us']);
        return view("user.about_us");
    }

    public function profile()
    {
        session(['menu_user' => 'profile']);
        $data['user'] = User::find(session('user_id'));
        return view("user.profile", $data);
    }

    public function profile_update(Request $request)
    {
        request()->validate([
            'name'                  => 'required',
            'email'                 => 'required|email',
            'phone'                 => 'required|numeric'
        ]);
        $id = session('user_id');
        $data = array(
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone
        );
        User::where(['id' => $id])->update($data);
        return redirect('/profile')->with("alert-update-profile", "Data telah berubah.");
    }

    public function blog_all()
    {
        session(['menu_user' => 'blog']);
        $id = session('user_id');
        $data['blog_all'] = DB::table('articles')->where('user_id', $id)->get();
        return view("user.blog_all", $data);
    }

    public function blog_create()
    {
        session(['menu_user' => 'blog']);
        return view("user.blog_add");
    }

    public function blog_store(Request $request)
    {
        request()->validate([
            'title'       => 'required|min:5|unique:categories,name',
            'category'    => 'required',
            'file'        => 'required|file|image|mimes:jpeg,png,jpg',
            'description' => 'required|min:10'
        ]);
        if($request->hasFile('file')){
            $fileName = $request->file('file')->getClientOriginalName();
            $filePath = $request->file('file')->move('storage/articles_image', $fileName);
        
        }
        // $path = Storage::putFile('public/articles_image', $request->file('file'));
        // $explode = explode('/', $path);
        $data = array(
            'user_id'      => session('user_id'),
            'categorie_id' => $request->category,
            'title'        => $request->title,
            'description'  => $request->description,
            // 'image'        => $explode[2]
            'image'        => $fileName
        );
        Article::create($data);
        return redirect('/blog_create')->with("alert-blog-add", "Data telah ditambahkan.");
    }

    public function blog_edit($id)
    {
        session(['menu_user' => 'blog']);
        $data['blog'] = Article::find($id);
        return view("user.blog_edit", $data);
    }

    public function blog_update(Request $request)
    {
        $id = $request->id;
        if ($request->file) {
            request()->validate([
                'title'       => 'required|min:5',
                'category'    => 'required',
                'file'        => 'required|file|image|mimes:jpeg,png,jpg',
                'description' => 'required|min:10'
            ]);
            $path = Storage::putFile('public/articles_image', $request->file('file'));
            $explode = explode('/', $path);
            $data = array(
                'user_id'      => session('user_id'),
                'categorie_id' => $request->category,
                'title'        => $request->title,
                'description'  => $request->description,
                'image'        => $explode[2]
            );
            Article::where(['id' => $id])->update($data);
            return redirect('/blog_edit/' . $id)->with("alert-blog-edit", "Data telah diedit.");
        } else {
            request()->validate([
                'title'       => 'required|min:5',
                'category'    => 'required',
                'description' => 'required|min:10'
            ]);
            $data = array(
                'user_id'      => session('user_id'),
                'categorie_id' => $request->category,
                'title'        => $request->title,
                'description'  => $request->description
            );
            Article::where(['id' => $id])->update($data);
            return redirect('/blog_edit/' . $id)->with("alert-blog-edit", "Data telah diedit.");
        }
    }

    function blog_delete($id)
    {
        $article = Article::find($id);
        if (file_exists('./storage/articles_image/' . $article->image)) {
            unlink('./storage/articles_image/' . $article->image);
            Storage::delete('public/articles_image/', $article->image);
        }
        $article->delete();
        return redirect('/blog_all')->with("alert-delete-blog", "Data telah dihapus.");
    }
}
