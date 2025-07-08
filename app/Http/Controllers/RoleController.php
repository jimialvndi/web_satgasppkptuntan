<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->paginate(10);
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil semua permission untuk ditampilkan sebagai checkbox
        $permissions = Permission::all();
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi nama role dan daftar permission
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        // 2. Buat role baru
        $role = Role::create(['name' => $validated['name']]);

        // 3. Tetapkan permission yang dipilih (jika ada) ke role baru
        if (!empty($validated['permissions'])) {
            $role->syncPermissions($validated['permissions']);
        }

        return redirect()->route('admin.roles.index')->with('success', 'Role berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $permissions = Permission::all();
        // Ambil permission yangsudah dimiliki oleh role ini
        $rolePermissions = $role->permissions->pluck('name')->all();

        return view('admin.roles.edit', compact('role', 'permissions', 'rolePermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validated = $request->validate([
            // Membuat aturan unique mengabaikan role yang sedang diedit
            'name' => 'required|string|max:255|unique:roles,name,' . $role->id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        // Update nama role
        $role->update(['name' => $validated['name']]);

        // Sinkronkan permission: hapus yang lama, tambahkan yang baru
        $role->syncPermissions($validated['permissions'] ?? []);

        return redirect()->route('admin.roles.index')->with('success', 'Role berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        // Mencegah super_admin dihapus
        if ($role->name === 'super_admin') {
            return back()->with('error', 'Tidak dapat menghapus role Super Admin.');
        }

        $role->delete();
        return back()->with('success', 'Role berhasil dihapus.');
    }
}
