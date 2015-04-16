<?php

class UserController extends BaseController
{

	// gets the view for the register page
	public function getCreate()
	{
		return View::make('user.register');
	}

	// gets the view for the login page
	public function getLogin()
	{
		return View::make('user.login');
	}

	public function postCreate()
	{
		$validate = Validator::make(Input::all(), array(
			'username' => 'required|unique:users|min:4',
			'pass1' => 'required|min:6',
			'pass2' => 'required|same:pass1',
			'email' => 'required|min:6',
		));
		if($validate ->fails()){
			return Redirect::route('getCreate')-> withErrors($validate)->withInput();
		}
		else{
			$user = new User();
			$user->username = Input::get('username');
			$user->password = Hash::make(Input::get('pass1'));
			$user->email=Input::get('email');
			
			if($user->save()){
				return Redirect::route('home')-> with('success','You registered successful. You can now log in.');
			}
			else{
				return Redirect::route('home')-> with('fail','An error occured while creating the user. Please try again');

			}
		}
	}

	public function postLogin()
	{
		
	}
}

?>