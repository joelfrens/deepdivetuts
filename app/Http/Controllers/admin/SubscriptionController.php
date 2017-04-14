<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use DB, Session, Crypt, Hash;
use Illuminate\Support\Facades\Input;
use App\Subscription;


class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get subscriptions
        $subscriptions = \App\Subscription::orderBy('id', 'desc')->paginate(5);

        // Send array of subscriptions to the view
        return view('admin.subscription.index', [
            'subscriptions' => $subscriptions
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.subscription.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);


        $this->validate($request, [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/subscriptions/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // store
            $subscription = new Subscription;
            $subscription->title    = Input::get('title');
            $subscription->content = Input::get('content');
            $subscription->cost    = Input::get('cost');
            $subscription->active  = Input::get('status');

            //get image
            $destinationPath = 'uploads';
            $filename = '';

            $file = Input::file('subscriptionimage');
            
            $rules = array('file' => 'required');
            $validator = Validator::make(array('file' => $file), $rules);

            if ($validator->passes()){

                $filename = $file->getClientOriginalName();

                $file->move($destinationPath, $filename);

            }

            if($filename != '')
                $subscription->image = $filename;
            else
                $subscription->image = '';

            $subscription->save();

            // redirect
            Session::flash('message', 'Successfully created Subscription!');
            return redirect('admin/subscriptions');
            
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the category
        $subscription = Subscription::find($id);
        // show the edit form and pass the category
        return view('admin.subscription.edit')
            ->with('subscription', $subscription);
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
        //
        $rules = array(
            'title'       => 'required',
        );
        $validator = Validator::make(Input::all(), $rules);


        $this->validate($request, [
            'title' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('admin/subscriptions/create')
                        ->withErrors($validator)
                        ->withInput();
        } else {
            // store
            $subscription = Subscription::find($id);
            $subscription->title    = Input::get('title');
            $subscription->content = Input::get('content');
            $subscription->cost    = Input::get('cost');
            $subscription->active  = Input::get('status');
            //get image
            $destinationPath = 'uploads';
            $filename = '';
            $file = Input::file('subscriptionimage');
            
            $rules = array('file' => 'required');
            $validator = Validator::make(array('file' => $file), $rules);

            if ($validator->passes()){

                $filename = $file->getClientOriginalName();

                $file->move($destinationPath, $filename);

            }

            if($file != '')
                $subscription->category_image = $filename;
            
            $subscription->save();

            // redirect
            Session::flash('message', 'Successfully updated subscription!');
            return redirect('admin/subscriptions');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $subscription = Subscription::find($id);
        $subscription->delete();

        // redirect
        Session::flash('message', 'Successfully deleted the subscription!');
        return redirect('admin/subscriptions')->with('status', 'subscription Deleted!');
    }
}
