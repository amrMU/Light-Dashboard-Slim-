<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PasswordResetRequest;
use DateTime;
use App\User;
use Auth;
use Session;

class UsersController extends Controller
{
 public function Users()
 {
   $users = User::where('type_user','user')->get();
   return view('admin.admins.users',compact('users'));
 }

 public function latestMembers()
 {
  $users = User::whereIn('type_user',['users'])->orderBy('id','DESC')->get();
  return view('admin.admins.latest_members',compact('users'));    
}

public function GetForgetPassword()
{
 $user = User::find(Auth::id());
 return view('admin.admins.reset_password',compact('user'));
}

   public function PostRestorePassword($user_id,PasswordResetRequest $request)
    {
      $find_user = User::where('id',$user_id)->get();

     if(count($find_user) > 0){
      
      $find_user = User::where('id',$user_id)->first();

      $updae_password = User::where('id',$user_id)->update([
        'password'=>bcrypt($request->get('password')),
      ]);
      Session::flash('success','Congrats, Now You Can Use New Password To Sign-In');
        return redirect()->back();
     }else{
      Session::flash('error','something wrong, try again later!');
        return redirect()->back();
     }
    }

public function findMemberByDates(Request $request)
{
  $from = $request->from;
  $date_from = new DateTime($from);
  $zone_from = $date_from->getTimezone();
  $from_date =  $date_from->format('Y-m-d H:i:s');

  $to = $request->to;
  $date_to = new DateTime($to);
  $zone_to = $date_to->getTimezone();
  $to_date =  $date_to->format('Y-m-d H:i:s');
  $users = User::whereIn('type_user',['users'])->whereBetween('created_at',[$from_date,$to_date])->get();

  return view('admin.admins.latest_members',compact('users','from','to'));

}

}
