<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Email;
use Illuminate\Support\Carbon;
use Session;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Email::latest()->get();
        return view('backend.message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
          'email' => 'required|email',
          'subject' => 'required',
          'phone' => 'required',
          'name' => 'required',
          'message' => 'required',
        ]);

        $email = Email::where('email', $request->email)->first();
        if($email == null){
            $email = new Email;
            $email->name = $request->name;
            $email->email = $request->email;
            $email->phone = $request->phone;
            $email->message = $request->message;
            $email->subject = $request->subject;
            $email->status = 1;
            $email->save();

            Session::flash('success','Message successfully sent!.');
            return back();
        }
        else{
            $notification = array(
                'message' => 'You are  already a Email sent.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
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
        //
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $message = Email::findOrfail($id);
        $message->delete();

        Session::flash('success', 'Message Deleted Successfully.');
        return redirect()->back();
    }


    public function active($id){
        $message = Email::find($id);
        $message->status = 1;
        $message->save();

        Session::flash('success','Email Active Successfully.');
        return redirect()->back();
    }

    public function inactive($id){
        $message = Email::find($id);
        $message->status = 0;
        $message->save();

        Session::flash('success','Email Disabled Successfully.');
        return redirect()->back();
    }
}
