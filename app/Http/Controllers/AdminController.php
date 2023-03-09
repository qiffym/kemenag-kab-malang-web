<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        return view('admin.admin-control-panel.index', [
            'title' => 'Control Panel',
            'users' => User::with(['role'])->filter(request(['search']))->orderBy('role_id')->get()->except(Auth::user()->id)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin-control-panel.create', [
            'title' => 'Tambah Admin Baru',
            'roles' => Role::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'role' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            'phoneNumber' => 'required|numeric',
        ]);

        User::create([
            'role_id' => $request->role,
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phoneNumber' => $request->phoneNumber,
        ]);

        return redirect("/admin/admin-control-panel")->with('message', 'Admin berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.profile', [
            'title' => 'Profile',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.admin-control-panel.edit', [
            'title' => 'Edit Admin',
            'roles' => Role::all(),

        ])->with('user', User::where('id', $id)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'role' => 'required',
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'password-lama' => ['current_password', 'nullable'],
            'phoneNumber' => 'required|numeric',
        ]);
        $user = User::where('id', $id);

        // Jika update diri sendiri
        $user_id = Auth::user()->id;
        if ($id == $user_id) {
            if ($request->input('password-lama') == null) {
                $user->update([
                    'role_id' => $request->role,
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phoneNumber' => $request->phoneNumber,

                ]);
                return redirect("/admin/profile/$user_id")->with('message', 'Profile berhasil diperbarui!');
            } else {
                $request->validate([
                    'new_password' => ['string', 'min:5', 'confirmed', 'required'],
                ]);
                $user->update([
                    'role_id' => $request->role,
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('new_password')),
                    'phoneNumber' => $request->phoneNumber,
                    'status' => $request->status,
                ]);

                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return redirect("/login")->with('message', 'Profile berhasil diperbarui, silahkan login kembali!');
            }
        } else {
            if ($request->input('password-lama') == null) {
                $user->update([
                    'role_id' => $request->role,
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'phoneNumber' => $request->phoneNumber,
                    'status' => $request->status,
                ]);
            } else {
                $request->validate([
                    'new_password' => ['string', 'min:8', 'confirmed', 'required'],
                ]);

                $user->update([
                    'role_id' => $request->role,
                    'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'password' => bcrypt($request->input('new_password')),
                    'phoneNumber' => $request->phoneNumber,
                    'status' => $request->status,
                ]);
            }
            return redirect("/admin/admin-control-panel")->with('message', 'Admin berhasil diperbarui!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        $user = User::findOrFail($id);

        $user->delete();
        return redirect('/admin/admin-control-panel')->with('message', "$user->name berhasil di hapus!");
    }
}
