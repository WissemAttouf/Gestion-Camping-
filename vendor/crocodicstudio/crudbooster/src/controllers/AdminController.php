<?php namespace crocodicstudio\crudbooster\controllers;

use CRUDBooster;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class AdminController extends CBController
{
    function getIndex()
    {
        $data = [];
        $data['page_title'] = '<strong>Dashboard</strong>';

        return view('crudbooster::home', $data);
    }

    public function getLockscreen()
    {

        if (! CRUDBooster::myId()) {
            Session::flush();

            return redirect()->route('getLogin')->with('message', trans('crudbooster.alert_session_expired'));
        }

        Session::put('admin_lock', 1);

        return view('crudbooster::lockscreen');
    }

    public function postUnlockScreen()
    {
        $id = CRUDBooster::myId();
        $password = Request::input('password');
        $users = DB::table(config('crudbooster.USER_TABLE'))->where('id', $id)->first();

        if (\Hash::check($password, $users->password)) {
            Session::put('admin_lock', 0);

            return redirect(CRUDBooster::adminPath());
        } else {
            echo "<script>alert('".trans('crudbooster.alert_password_wrong')."');history.go(-1);</script>";
        }
    }

    public function getLogin()
    {

        if (CRUDBooster::myId()) {
            return redirect(CRUDBooster::adminPath());
        }

        return view('crudbooster::login');
    }

    public function postLogin()
    {

        $validator = Validator::make(Request::all(), [
            'email' => 'required|email|exists:'.config('crudbooster.USER_TABLE'),
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->all();

            return redirect()->back()->with(['message' => implode(', ', $message), 'message_type' => 'danger']);
        }

        $email = Request::input("email");
        $password = Request::input("password");
        $users = DB::table(config('crudbooster.USER_TABLE'))->where("email", $email)->first();

        if (\Hash::check($password, $users->password)) {
            $priv = DB::table("cms_privileges")->where("id", $users->id_cms_privileges)->first();

            $roles = DB::table('cms_privileges_roles')->where('id_cms_privileges', $users->id_cms_privileges)->join('cms_moduls', 'cms_moduls.id', '=', 'id_cms_moduls')->select('cms_moduls.name', 'cms_moduls.path', 'is_visible', 'is_create', 'is_read', 'is_edit', 'is_delete')->get();

            $photo = ($users->photo) ? asset($users->photo) : asset('vendor/crudbooster/avatar.jpg');
            Session::put('admin_id', $users->id);
            Session::put('admin_is_superadmin', $priv->is_superadmin);
            Session::put('admin_name', $users->name);
            Session::put('admin_photo', $photo);
            Session::put('admin_privileges_roles', $roles);
            Session::put("admin_privileges", $users->id_cms_privileges);
            Session::put('admin_privileges_name', $priv->name);
            Session::put('admin_lock', 0);
            Session::put('theme_color', $priv->theme_color);
            Session::put("appname", CRUDBooster::getSetting('appname'));

            CRUDBooster::insertLog(trans("crudbooster.log_login", ['email' => $users->email, 'ip' => Request::server('REMOTE_ADDR')]));

            $cb_hook_session = new \App\Http\Controllers\CBHook;
            $cb_hook_session->afterLogin();

            return redirect(CRUDBooster::adminPath());
        } else {
            return redirect()->route('getLogin')->with('message', trans('crudbooster.alert_password_wrong'));
        }
    }

    public function getForgot()
    {
        if (CRUDBooster::myId()) {
            return redirect(CRUDBooster::adminPath());
        }

        return view('crudbooster::forgot');
    }

    public function postForgot()
    {
        $validator = Validator::make(Request::all(), [
            'email' => 'required|email|exists:'.config('crudbooster.USER_TABLE'),
        ]);

        if ($validator->fails()) {
            $message = $validator->errors()->all();

            return redirect()->back()->with(['message' => implode(', ', $message), 'message_type' => 'danger']);
        }

        $rand_string = str_random(5);
        $password = \Hash::make($rand_string);

        DB::table(config('crudbooster.USER_TABLE'))->where('email', Request::input('email'))->update(['password' => $password]);

        $appname = CRUDBooster::getSetting('appname');
        $user = CRUDBooster::first(config('crudbooster.USER_TABLE'), ['email' => g('email')]);
        $user->password = $rand_string;
        CRUDBooster::sendEmail(['to' => $user->email, 'data' => $user, 'template' => 'forgot_password_backend']);

        CRUDBooster::insertLog(trans("crudbooster.log_forgot", ['email' => g('email'), 'ip' => Request::server('REMOTE_ADDR')]));

        return redirect()->route('getLogin')->with('message', trans("crudbooster.message_forgot_password"));
    }

        public function getRegister() {
		$privileges_register = DB::table('cms_privileges')->get();
		$data['privileges_register'] = $privileges_register;

		if(count($data['privileges_register']) == 0) return redirect()->route('getLogin')->with('message','Sorry, unfortunately register is closed !');

		return view('crudbooster::register',$data);
	}

	public function getUsersConfirmation($hash_confirmation) {
		if(DB::table('cms_users')->where('hash_confirmation',$hash_confirmation)->count()) {
			DB::table('cms_users')->where('hash_confirmation',$hash_confirmation)->update(['status'=>'Active','hash_confirmation'=>NULL]);
			return redirect()->route('getLogin')->with('message','Thanks for email confirmation. You can sign in !');
		}else{
			return rediirect()->route('getLogin')->with('message','Email confirmation failed, please make sure the URL is correct, if this issue continue, please contact Administrator');
		}
    }
    
    public function postRegister() {
		//valid(['name','email'=>'unique:cms_users,email','password'],NULL,'view'); 

		$is_confirmation = false;
		$is_welcome = false;

		$post = Request::all();
		unset($post['_token']);
		$post['created_at'] = date('Y-m-d H:i:s');
		$post['password'] = Hash::make($post['password']);

		/* Send email confirmation if setted */
		if($this->setting->register_email_confirmation!='') {
			$post['status'] = 'Not Active';
			$to = $post['email'];
			$subject = 'Register Confirmation Email at '.$this->setting->appname;

			$html = $this->setting->register_email_confirmation;
			foreach($post as $key=>$val) {
				$html = str_replace("[".$key."]",$val,$html);
			}

			$hash_confirmation = str_random(12);
			$post['hash_confirmation'] = $hash_confirmation;
			$link_confirmation = route('AdminControllerGetUsersConfirmation').'/'.$hash_confirmation;

			$html = str_replace("[link_confirmation]","<a href='$link_confirmation'>$link_confirmation</a>",$html);

			send_email($to,$subject,$html);
			$is_confirmation = true;

		}else{
			$post['status'] = 'Active';
		}

		/* Save data users */
		DB::table('cms_users')->insert($post);

		/* Send email welcome after register if any */
		if($this->setting->register_email_welcome!='') {
			$to = $post['email'];
			$subject = 'Welcome Registration at '.$this->setting->appname;

			$html = $this->setting->register_email_welcome;
			foreach($post as $key=>$val) {
				$html = str_replace("[".$key."]",$val,$html);
			}

			send_email($to,$subject,$html);
			$is_welcome = true;
		}

		if($is_confirmation) {
			return redirect()->route('getLogin')->with('message','Thanks for register, please check your email at inbox or spambox. We have sent an email confirmation, follow the instruction at email');	
		}else{
			return redirect()->route('getLogin')->with('message','Thanks for register, please sign in to start your session');	
		}
		
	}




    public function getLogout()
    {

        $me = CRUDBooster::me();
        CRUDBooster::insertLog(trans("crudbooster.log_logout", ['email' => $me->email]));

        Session::flush();

        return redirect()->route('getLogin')->with('message', trans("crudbooster.message_after_logout"));
    }


}
