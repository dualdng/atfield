<?php namespace App\Http\Controllers\Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MyEmailController;
use Illuminate\Hashing\BcryptHasher;
use Auth;
use App\Model\User;

use Illuminate\Http\Request;

class MainController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getLogin()
	{
			$data=array();
			$data['ajax']=0;
			if(Auth::check()){
					$data['isLogin']=1;
			}else{
					$data['isLogin']=0;
			}

			return view('auth.login',$data);
	}

	/**
	 *登录
	 */
	public function login(Request $request)
	{
			$email=$request->input('email');
			$password=$request->input('password');
			if(Auth::attempt(['email'=>$email,'password'=>$password,'state'=>1])) {
					return 0;
			}else{
					return 1;
			}
	}
	/**
	 * 注册页面
	 */
	public function getRegister()
	{
			$data=array();
			$data['ajax']=0;
			if(Auth::check()){
					$data['isLogin']=1;
			}else{
					$data['isLogin']=0;
			}
					
			return view('auth.register',$data);
	}
	/**
	 *注册表单验证 
	 */
	public function verify(Request $request)
	{
			$nickname=$request->input('nickname');
			$email=$request->input('email');
			$password=$request->input('password');
			$confirmPassword=$request->input('confirmPassword');
			$nickname=isset($nickname)?$nickname:0;
			$email=isset($email)?$email:0;
			$password=isset($password)?$password:0;
			$confirmPassword=isset($confirmPassword)?$confirmPassword:0;
			if($nickname!==0) {
					$result=count(User::where('nickname',$nickname)->get());
					if($result!==0) {
							return 1;
					}else {
							return 0;
					}
					exit;
			}
			if($email!==0) {
					$result=count(User::where('email',$email)->get());
					if($result!==0) {
							return 1;
					}else {
							return 0;
					}
					exit;
			}
	}
	/**
	 * 注册
	 */
	public function register(Request $request)
	{
			$email=$request->input('email');
			$password=$request->input('password');
			$hash=new BcryptHasher;
			$password=$hash->make($password);
			$nickname=$request->input('nickname');
			$name=$nickname;
			$avatar='/avatar/default.jpg';
			$activeCode=$hash->make($password.time());
			$result=User::create(['email'=>$email,'password'=>$password,'nickname'=>$nickname,'name'=>$name,'avatar'=>$avatar,'state'=>0,'activeCode'=>$activeCode]);
			if($result){
					$content='<style>';
					$content.='';
					$content.='</style>';
					$content.='<h3>感谢您注册AT.Field.Club(绝对领域爱好者)!请点击以下链接激活帐号:</h3>';
					$content.='<p><a href=\''.$_SERVER['SERVER_NAME'].'/active?email='.$email.'&code='.$activeCode.'\'>'.$_SERVER['SERVER_NAME'].'/active?email='.$email.'&code='.$activeCode.'</a></p>';
					$content.='<span>此邮件由系统自动发送，请勿回复。</span>';
					$mail=new MyEmailController;
					$mail->setServer("smtp.exmail.qq.com", "active@atfield.club", "d417234476");
					$mail->setFrom("active@atfield.club");
					$mail->setReceiver($email);
					$mail->setMailInfo("感谢您注册AT.Field!", $content);
					$mail->sendMail();
			}
			$data=array();
			$data['email']=$email;
			$data['nickname']=$nickname;
			$data['activeCode']=$activeCode;
			$data['ajax']=0;
			return view('/active',$data);
	}
	/**
	 * 激活帐号
	 */
	public function active(Request $request)
	{
			$email=$request->input('email');
			$activeCode=$request->input('code');
			$result=User::where('email',$email)->where('activeCode',$activeCode)->get();
			if(count($result)!=0){
					foreach($result as $value){
							$user=User::find($value->id);
							$user->state=1;
							$user->save();
							return redirect('/auth/login');
					}
			}else{
					echo '出错拉';
			}
	}
	/**
	 *发送激活邮件
	 */
	 public function sendMail(Request $request)
	 {
			$email=$request->input('email');
			$activeCode=$request->input('code');
			$content='<style>';
			$content.='';
			$content.='</style>';
			$content.='<h3>感谢您注册AT.Field.Club(绝对领域爱好者)!请点击以下链接激活帐号:</h3>';
			$content.='<p><a href=\''.$_SERVER['SERVER_NAME'].'/active?email='.$email.'&code='.$activeCode.'\'>'.$_SERVER['SERVER_NAME'].'/active?email='.$email.'&code='.$activeCode.'</a></p>';
			$content.='<span>此邮件由系统自动发送，请勿回复。</span>';
			$mail=new MyEmailController;
			$mail->setServer("smtp.exmail.qq.com", "active@atfield.club", "d417234476");
			$mail->setFrom("active@atfield.club");
			$mail->setReceiver($email);
			$mail->setMailInfo("感谢您注册AT.Field!", $content);
			$mail->sendMail();
			echo '发送成功';
	 }
	/**
	 * 登出
	 */
	public function logout()
	{
			Auth::logout();
			return redirect()->route('home');
	}

}
