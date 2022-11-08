<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\contact;

class MyController extends Controller
{
  public function ContactMessage(Request $request)
  {

      // CONTACT PAGE


    $contact = new contact();
    $contact->name = $request->post('name');
    $contact->email = $request->post('email');
    $contact->message = $request->post('message');


    $contact->save();


    return response()->json("Created Successfully");
  }


  public function ContactMessageCreate()
  {
    $contact = new contact;

    // return view('data', ['data' => $contact->all()]);
    return response()->json(
      [
        'data' => $contact->all()
      ]
      
    );
  }

  public function ContactMessageDelete($id)
  {
    contact::destroy($id);

    return response()->json([
      "success" => "ok"
    ]);
  }

  public function ContactMessageSend($email)
  {
    


    return response()->json([
      "email" => $email
    ]);
  }


}
