<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use Socialite;
use Exception;



class LoginController extends Controller
{
    public function register()
    {
        return view('frontend.register');
    }
 
    public function registerPost(Request $request)
    {
        $user = new User();
 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
 
        $user->save();
 
        return back()->with('success', 'Register successfully');
    }
 
    public function login()
    {
        return view('frontend.login');
    }
 
    public function loginPost(Request $request)
    {
        $credetials = [
            'email' => $request->email,
            'password' => $request->password,
        ];
 
        if (Auth::attempt($credetials)) {
            return redirect('/landing.html')->with('success', 'Login Success');
        }
 
        return back()->with('error', 'Error Email or Password');
    }
 
    public function logout()
    {
        Auth::logout();
 
        return redirect()->route('frontend.login');
    }


    public function facebookRedirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    
    public function loginWithFacebook()
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
            $existingUser = User::where('facebook_id', $user->id)->first();
    
            if ($existingUser) {
                Auth::login($existingUser);
                return redirect('landing.html');
            } else {
                $userData = [
                    'name' => $user->name,
                    'facebook_id' => $user->id,
                ];
    
                // If email is available, use it; otherwise generate a unique email
                if ($user->email) {
                    $userData['email'] = $user->email;
                } else {
                    $userData['email'] = $this->generateUniqueEmail();
                }
    
                $createUser = User::create($userData);
    
    
    
                Auth::login($createUser);
                return redirect('landing.html');
            }
    
        } catch (\Throwable $th) {
          throw $th;
       }
    }


    private function generateUniqueEmail()
    {
        // Generate a unique email using a combination of timestamp and a random string
        return 'noemail_' . time() . '_' . Str::random(5) . '@example.com';
    }



    
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }
    public function callbackGoogle()
    {
        try
        {
            $google_user = Socialite::driver('google')->user();
            $user = User::where('google_id', $google_user->getId())->first();

            if(!$user)
            {
                $new_user= User::create([
                    'name'=> $google_user->getName(),
                    'email' => $google_user->getEmail(),
                    'google_id' => $google_user->getId(),
                ]);

                Auth::login($new_user);

                return redirect()->intended('landing.html');
            }

            else
            {
                Auth::login($user);

                return redirect()->intended('landing.html');
            }

        } catch(\Throwable $th)

        {
        
        \Log::error('Google Login Error: ' . $th->getMessage());

        // Return a redirect with an error message
        return redirect()->route('login')->with('error', 'Something went wrong with Google login.');
        }
    }
}
 