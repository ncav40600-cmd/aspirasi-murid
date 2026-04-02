<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('username', 'like', "%{$search}%")
                  ->orWhere('nis', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $users = $query->orderBy('role', 'desc')->orderBy('username')->paginate(20);

        return view('admin.users.index', compact('users', 'search'));
    }

    public function create()
    {
        $roles = ['admin' => 'Admin', 'siswa' => 'Siswa'];
        return view('admin.users.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'nis' => 'required|string|max:100|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'role' => 'required|in:admin,siswa',
            'kelas' => 'nullable|string|max:50',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dibuat.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = ['admin' => 'Admin', 'siswa' => 'Siswa'];
        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validate([
            'username' => 'required|string|max:255|unique:users,username,' . $user->id,
            'nis' => 'required|string|max:100|unique:users,nis,' . $user->id,
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,siswa',
            'kelas' => 'nullable|string|max:50',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->id === session('user_id')) {
            return redirect()->route('admin.users.index')->with('error', 'Admin tidak dapat menghapus dirinya sendiri.');
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    public function importForm()
    {
        return view('admin.users.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt',
        ]);

        $path = $request->file('csv_file')->getRealPath();
        $rows = array_map('str_getcsv', file($path));

        if (empty($rows)) {
            return back()->with('error', 'File CSV kosong.');
        }

        $header = array_map('trim', $rows[0]);
        $allowed = ['username', 'nis', 'email', 'role', 'kelas', 'password'];

        if (array_diff($allowed, $header)) {
            return back()->with('error', 'Header CSV harus berisi: ' . implode(', ', $allowed));
        }

        $count = 0;

        foreach (array_slice($rows, 1) as $row) {
            if (count($row) !== count($header)) {
                continue;
            }

            $data = array_combine($header, array_map('trim', $row));

            $validator = Validator::make($data, [
                'username' => 'required|string|max:255|unique:users',
                'nis' => 'required|string|max:100|unique:users',
                'email' => 'required|email|max:255|unique:users',
                'role' => 'required|in:admin,siswa',
                'kelas' => 'nullable|string|max:50',
                'password' => 'required|string|min:6',
            ]);

            if ($validator->fails()) {
                continue;
            }

            $data['password'] = Hash::make($data['password']);
            User::create($data);
            $count++;
        }

        return redirect()->route('admin.users.index')->with('success', "Import selesai, $count pengguna berhasil ditambahkan.");
    }

    public function resetPassword($id)
    {
        $user = User::findOrFail($id);
        $newPassword = Str::random(10);

        $user->password = Hash::make($newPassword);
        $user->save();

        // Di sini untuk keamanan Anda boleh kirim email notifikasi atau tampilkan informasi non-plain
        return redirect()->route('admin.users.index')->with('success', "Password berhasil di-reset. Password baru: $newPassword");
    }
}
