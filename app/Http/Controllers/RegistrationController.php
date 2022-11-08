<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
   
// Registration Page

public function RegistrationSubmit(Request $request)
{

$seller = $request->post('seller');
$role = 'seller'; 

if (!$seller) {
    $role = "buyer";
}


  $hashed = Hash::make($request->post('password'));
  $Registration = new User();
  $Registration->password = $hashed;
  $Registration->firstname = $request->post('name');
  $Registration->lastname = $request->post('lastname');
  $Registration->email = $request->post('email');
  $Registration->roles = $role;

  $Registration->save();


  return response()->json("Created Successfully");
}
}
