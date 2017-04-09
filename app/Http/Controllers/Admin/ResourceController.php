<?php

namespace App\Http\Controllers\Admin;

use App\Resource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $resources = Resource::all();

        return view('admin.resources.index', ['resources' => $resources]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin.resources.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        Resource::create($request->only('name'));

        return redirect()->route('admin.resources.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  Resource  $resource
     * @return Response
     */
    public function show(Resource $resource)
    {
        return view('admin.resources.show', compact('resource'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Resource $resource
     * @return Response
     */
    public function edit(Resource $resource)
    {
        return view('admin.resources.edit', ['resource' => $resource]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Resource $resource
     * @param Request $request
     * @return Response
     */
    public function update(Resource $resource, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $resource->update($request->only('name'));

        return redirect()->route('admin.resources.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Resource $resource
     * @return Response
     */
    public function destroy(Resource $resource)
    {
        $resource->delete();

        return redirect()->route('admin.resources.index');
    }
}
