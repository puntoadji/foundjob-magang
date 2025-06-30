<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Job;
use App\Models\JobType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Event\ResponseEvent;

class AccountController extends Controller
{
    public function registration()
    {
        return view ('front.account.registration');
    }

    public function processRegistration(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:5|same:confirm_password',
            'confirm_password' => 'required',
        ]);
        if ($validator->passes()){
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            session()->flash('success', 'Success registered your account.');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);
        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }
    }
    public function login()
    {
        return view('front.account.login');
    }

    public function authenticate(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->passes()){
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect()->route('account.profile');
            }else {
                return redirect()->route('account.login')->with('error', 'Either Email or Password Incorrect');
            }
        } else {
            return redirect()->route('account.login')->withErrors($validator)->withInput($request->only('email'));
        }
    }

    public function profile(){

        $id = Auth::user()->id;

        $user = User::where('id',$id)->first();

        return view('front.account.profile',[
            'user' => $user
        ]);
    }

    public function update(Request $request){

        $id = Auth::user()->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users,email,'.$id.',id'
        ]);

        if ($validator->passes()){

            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->designation = $request->designation;
            $user->mobile = $request->mobile;
            $user->save();

            session()->flash('success', 'Profile Updated Successfully');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);

        } else{
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->route('account.login');
    }

    public function create(){
        
        $categories = Category::orderBy('name', 'ASC')->where('status',1)->get();

        $jobTypes = JobType::orderBy('name', 'ASC')->where('status',1)->get();

        return view('front.account.job.create',[
            'categories' => $categories,
            'jobTypes' => $jobTypes
        ]);
    }

    public function saveJob(Request $request){

        $rules = [
            'title' => 'required|min:5|max:200',
            'category' => 'required',
            'jobType' => 'required',
            'vacancy' => 'required|integer',
            'location' => 'required|max:50',
            'description' => 'required',
            'company_name' => 'required|min:3|max:100',

        ];

        $validator = Validator::make($request->all(),$rules);

        if ($validator->passes()){
            $job = new Job();
            $job->category_id = $request->category;
            $job->job_type_id = $request->jobType;
            $job->vacancy = $request->vacancy;
            $job->salary = $request->salary;
            $job->location = $request->location;
            $job->description = $request->description;
            $job->responsibility = $request->responsibility;
            $job->qualifications = $request->qualifications;
            $job->experience = $request->experience;
            $job->company_name = $request->company_name;
            $job->company_location = $request->company_location;
            $job->company_website = $request->company_website;
            $job->save();

            session()->flash('success', 'Job Added Successfully');

            return response()->json([
                'status' => true,
                'errors' => []
            ]);

        } else {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

    }

    public function myJobs(){
        return view('front.account.job.myjobs');
    }
}
