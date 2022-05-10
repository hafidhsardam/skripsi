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

class AdminController extends Controller
{
    public function index()
    {
        session(['menu_admin' => 'home']);
        return view("admin.home");
    }

    //coba manggil data

  


    public function PurchaseRequest()
    {
        session(['menu_admin' => 'home']);
        return view("admin.PurchaseRequest");
    }

    public function RFQ()
    {
        session(['menu_admin' => 'home']);
        return view("admin.RFQ");
    }

    public function PurchaseOrder()
    {
        session(['menu_admin' => 'home']);
        return view("admin.PurchaseOrder");
    }


    public function Vendor()
    {
        session(['menu_admin' => 'home']);
        return view("admin.Vendor");
    }


    public function Product()
    {
        session(['menu_admin' => 'home']);
        return view("admin.Product");
    }


    public function User()
    {
        session(['menu_admin' => 'home']);
        $pengguna = DB::table('users')->get();
    

        return view("admin.User", ['pengguna' => $pengguna]);
    }

    // CREATE

    public function CreatePurchaseRequest()
    {
        session(['menu_admin' => 'PurchaseRequest']);

        $purchase = DB::table('purchase_request')->name('');
        
        return view("admin.Create.CreatePurchaseRequest");
    }

    public function CreateRFQ()
    {
        session(['menu_admin' => 'RFQ']);
        return view("admin.Create.CreateRFQ");
    }

    public function CreatePurchaseOrder()
    {
        session(['menu_admin' => 'PurchaseOrder']);
        return view("admin.Create.CreatePurchaseOrder");
    }

    public function CreateVendor()
    {
        session(['menu_admin' => 'Vendor']);
        return view("admin.Create.CreateVendor");
    }

    public function CreateProduct()
    {
        session(['menu_admin' => 'Product']);
        return view("admin.Create.CreateProduct");
    }

    public function CreateUser()
    {
        session(['menu_admin' => 'User']);
        return view("admin.Create.CreateUser");
    }




    public function profile()
    {
        session(['menu_admin' => 'profil']);
        $data['user'] = User::find(session('admin_id'));
        return view("admin.profile", $data);
    }



    public function profile_update(Request $request)
    {
        request()->validate([
            'name'                  => 'required',
            'email'                 => 'required|email',
            'phone'                 => 'required|numeric'
        ]);
        $id = session('admin_id');
        $data = array(
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone
        );
        User::where(['id' => $id])->update($data);
        return redirect('/admin/profile')->with("alert-update-profile-admin", "Data telah berubah.");
    }

    public function categories_all()
    {
        session(['menu_admin' => 'manage_categorie']);
        $data['categorie_all'] = Categorie::all();
        return view("admin.categorie_all", $data);
    }

    public function categories_create()
    {
        session(['menu_admin' => 'manage_categorie']);
        return view("admin.categorie_create");
    }

    public function categories_store(Request $request)
    {
        request()->validate([
            'name' => 'required|min:3',
        ]);
        $data = array(
            'name' => $request->name
        );
        Categorie::create($data);
        return redirect('/admin/categorie_add')->with("alert-add-categorie", "Data telah ditambahkan.");
    }

    public function categories_edit($id)
    {
        session(['menu_admin' => 'manage_categorie']);
        $data['categorie'] = Categorie::find($id);
        return view("admin.categorie_edit", $data);
    }

    public function categories_update(Request $request)
    {
        request()->validate([
            'name' => 'required|min:3',
        ]);
        $data = array(
            'name' => $request->name
        );
        Categorie::where(['id' => $request->id])->update($data);
        return redirect('/admin/categorie_edit/' . $request->id)->with("alert-edit-categorie", "Data telah diedit.");
    }

    public function blog_all()
    {
        session(['menu_admin' => 'blog']);
        $id = session('admin_id');
        $data['blog_all'] = DB::table('articles')->where('user_id', $id)->get();
        return view("admin.blog_all", $data);
    }

    public function blog_create()
    {
        session(['menu_admin' => 'blog']);
        return view("admin.blog_add");
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
            'user_id'      => session('admin_id'),
            'categorie_id' => $request->category,
            'title'        => $request->title,
            'description'  => $request->description,
            'image'        => $fileName
        );
        Article::create($data);
        return redirect('/admin/blog_create')->with("alert-blog-add-admin", "Data telah ditambahkan.");
    }

    function blog_edit($id)
    {
        session(['menu_admin' => 'blog']);
        $data['blog'] = Article::find($id);
        return view("admin.blog_edit", $data);
    }

    function blog_update(Request $request)
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
                'user_id'      => session('admin_id'),
                'categorie_id' => $request->category,
                'title'        => $request->title,
                'description'  => $request->description,
                'image'        => $explode[2]
            );
            Article::where(['id' => $id])->update($data);
            return redirect('/admin/blog_edit/' . $id)->with("alert-blog-edit-admin", "Data telah diedit.");
        } else {
            request()->validate([
                'title'       => 'required|min:5',
                'category'    => 'required',
                'description' => 'required|min:10'
            ]);
            $data = array(
                'user_id'      => session('admin_id'),
                'categorie_id' => $request->category,
                'title'        => $request->title,
                'description'  => $request->description
            );
            Article::where(['id' => $id])->update($data);
            return redirect('/admin/blog_edit/' . $id)->with("alert-blog-edit-admin", "Data telah diedit.");
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
        return redirect('/admin/blog_all')->with("alert-delete-blog-admin", "Data telah dihapus.");
    }

    public function categories_blog($id)
    {
        session(['menu_admin' => 'categories']);
        $data['categorie'] = Categorie::find($id);
        $data['blog'] = Article::where(['categorie_id' => $id])->paginate(6);
        return view("admin.categories_blog_all", $data);
    }

    public function blog_detail($id)
    {
        session(['menu_admin' => 'categories']);
        $data['blog'] = Article::find($id);
        return view("admin.blog_detail", $data);
    }

    public function user_all()
    {
        session(['menu_admin' => 'user']);
        $data['user_all'] = User::where('role', 'user')->get();
        return view("admin.user_all", $data);
    }

    public function user_create()
    {
        session(['menu_admin' => 'user']);
        return view("admin.user_create");
    }

    public function user_store(Request $request)
    {
        request()->validate([
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email',
            'phone'                 => 'required|numeric',
            'password'              => 'required|min:8',
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
        return redirect('admin/user_add')->with('alert-add-user', 'Akun telah tersimpan.');
    }

    public function user_edit($id)
    {
        session(['menu_admin' => 'user']);
        $data['user'] =  User::find($id);
        return view("admin.user_edit", $data);
    }

    public function user_update(Request $request)
    {
        request()->validate([
            'name'                  => 'required',
            'email'                 => 'required|email',
            'phone'                 => 'required|numeric'
        ]);
        $id = $request->id;
        $data = array(
            'name'           => $request->name,
            'email'          => $request->email,
            'phone'          => $request->phone
        );
        User::where(['id' => $id])->update($data);
        return redirect('/admin/user_edit/' . $id)->with("alert-edit-user", "Data telah berubah.");
    }

    public function user_delete($id)
    {
        Article::where(['user_id' => $id])->update(['user_id' => '0']);
        $user = User::find($id);
        $user->delete();
        return redirect('/admin/user_all')->with("alert-delete-user", "Data berhasil dihapus.");
    }
}
