<?php

namespace App\Http\Controllers\Admin;

use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the Subscription.
     *
     * @return Response
     */
    public function index()
    {
        $this->authorize('view', Subscription::class);

        $subscriptions = Subscription::all();

        return view('admin.subscriptions.index', ['subscriptions' => $subscriptions]);
    }
    /**
     * Show the form for creating a new Subscription.
     *
     * @return Response
     */
    public function create()
    {
        $this->authorize('create', Subscription::class);

        return view('admin.subscriptions.create');
    }

    /**
     * Store a newly created Subscription in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Subscription::class);

        $this->validate($request, [
            'name' => 'required',
            'active' => 'boolean',
        ]);

        Subscription::create($request->only('name', 'active'));

        return redirect()->route('admin.subscriptions.index');
    }
    /**
     * Display the specified Subscription.
     *
     * @param  Subscription  $Subscription
     * @return Response
     */
    public function show(Subscription $subscription)
    {
        $this->authorize('show', $subscription);

        return view('admin.subscriptions.show', compact('subscriptions'));
    }

    /**
     * Show the form for editing the specified Subscription.
     *
     * @param Subscription $Subscription
     * @return Response
     */
    public function edit(Subscription $subscription)
    {
        $this->authorize('update', $subscription);

        return view('admin.subscriptions.edit', ['subscription' => $subscription]);
    }

    /**
     * Update the specified Subscription in storage.
     *
     * @param Subscription $Subscription
     * @param Request $request
     * @return Response
     */
    public function update(Subscription $subscription, Request $request)
    {
        $this->authorize('update', $subscription);

        $this->validate($request, [
            'name' => 'required',
            'active' => 'boolean',
        ]);

        $subscription->name = $request->get('name');
        $subscription->active = $request->get('active', false);
        $subscription->save();

        return redirect()->route('admin.subscriptions.index');
    }

    /**
     * Remove the specified Subscription from storage.
     *
     * @param Subscription $Subscription
     * @return Response
     */
    public function destroy(Subscriptions $subscription)
    {
        $this->authorize('delete', $subscription);

        $subscription->delete();

        return redirect()->route('admin.subscriptions.index');
    }
}
