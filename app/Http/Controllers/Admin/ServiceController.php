<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();

        //send data to Vue pages using Inertia
        return Inertia::render('Admin/Services/Index', [
            'services' => $services
        ]);
    }

    public function create()
    {
        return Inertia::render('Admin/Services/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        $validated['slug'] = Str::slug($request->name);

        Service::create($validated);

        return redirect()->route('admin.services.index')->with('message', 'Layanan berhasil di tambahkan!');

    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('message', 'Layanan berhasil ditambahkan bro!');
    }

    public function edit(Service $service)
    {
        return Inertia::render('Admin/Services/Edit', [
            'service' => $service
        ]);
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
        ]);

        $validated['slug'] = Str::slug($request->name);

        $service->update($validated);

        return redirect()->route('admin.services.index')->with('message', 'Layananan telah berhasil di edit bro!');
    }
}
