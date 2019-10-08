<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $page = "Home";
        $resource = new User();
        $query= $resource->distinct()->select("users.*");
        $query->where('role', 'student');
        $user = Auth::user();
        if($user->isCenter())
        {
            $query->where('parent_id', $user->id);
        }
        else if($user->isStudent())
        {
            $query->where('id', 0);
        }
        $query->orderBy('id', 'desc');
        $students = $query->limit(5)->get();

        $studentQuery = User::where('role', 'student');
        if($user->isCenter())
        {
            $studentQuery->where('parent_id', $user->id);
        }
        $studentCollectiveData = $studentQuery->selectRaw('users.is_active, count(id) as total')->groupBy('users.is_active')->get();
        
        $centerCollectiveData = User::where('role', 'center')->selectRaw('users.is_active, count(id) as total')->groupBy('users.is_active')->get();


        return view('home', compact('students', 'studentCollectiveData', 'centerCollectiveData', 'page'));
    }

    public function getCenterData()
    {
        $centers = DB::select("SELECT centers.first_name, count(students.id) as total FROM `users` centers LEFT JOIN `users` students ON centers.id = students.parent_id WHERE centers.role = 'center' group by centers.id");
        return response()
            ->json($centers);
    }

    public function getYearData()
    {
        $condition = "";
        if(Auth::user()->isCenter())
        {
            $condition = " And parent_id = ".Auth::user()->id;
        }
        $students = DB::select("SELECT month(created_at) as monthno, count(id) as total FROM `users` WHERE role = \"student\" ".$condition."  and Year(created_at) = ".date('Y')." group by month(created_at)");
        return response()
            ->json($students);
    }

    public function centerdashboard()
    {
        //Get Active Inactive
        $actInact = DB::select("SELECT is_active, Count(id) as total FROM users WHERE role = 'student' AND parent_id = ".Auth::user()->id." group by is_active ");

        $maleFemale = DB::select("SELECT gender, Count(id) as total FROM users WHERE role = 'student' AND parent_id = ".Auth::user()->id." group by gender ");

        $marriedstatus = DB::select("SELECT martial_status, Count(id) as total FROM users WHERE role = 'student' AND parent_id = ".Auth::user()->id." group by martial_status ");

        return response()
            ->json([$actInact, $maleFemale, $marriedstatus]);


    }

    public function dbScript()
    {
        set_time_limit(0);
        $allCenters = DB::connection('mysql2')->select("Select * from membership where user_level = 4");
        if(count($allCenters) > 0)
        {
            foreach($allCenters as $center)
            {
                // TODO: Save Center
               $newCenter = User::create([
                    'first_name' => $center->first_name,
                    'email' => $center->email_addres,
                    'username' => $center->user_name,
                    'password' => bcrypt($center->user_name),
                    'phone' => $center->phone,
                    'address' => $center->address,
                    'city' => $center->city,
                    'state' => $center->state,
                    'district' => $center->district,
                    'pincode' => $center->pincode,
                    'latitude' => $center->latitude,
                    'longitude' => $center->longitude,
                    'role' => 'center',
                    'partners' => $center->partners,
                    'parent_id' => 1,
                    'created_at' => $center->register_date,
                    'is_active' => $center->active_status
                ]);

                $centerStudent = DB::connection('mysql2')->select("Select * from customer where center_id = ".$center->id);
                $chunks = array_chunk($centerStudent, 1000);
                if(!empty($chunks))
                {
                    foreach($chunks as $studentGroup)
                    {
                        // Save Center's Student By Group of 100
                        $sqlInsertData = [];
                        if(!empty($studentGroup))
                        {
                            foreach($studentGroup as $student)
                            {
                                $dob = null;
                                $d = $student->dob;
                                $dt = str_replace('/', '-', $d);
                                if($dt != "")
                                    $dob = date('Y-m-d', strtotime($dt));
                                $sqlInsertData[] = [
                                    'first_name' => $student->f_name,
                                    'middle_name' => $student->m_name,
                                    'last_name' => $student->l_name,
                                    'email' => $student->email,
                                    'username' => strtolower(str_replace(' ', '_',trim($student->f_name))).$student->id,
                                    'password' => bcrypt($student->email),
                                    'phone' => $student->phone,
                                    'gender' => $student->gender == "" ? "Male" : $student->gender,
                                    'address' => $student->address,
                                    'city' => $student->city,
                                    'state' => $student->state,
                                    'district' => $student->district,
                                    'pincode' => $student->pincode,
                                    'blood_group' => $student->blood_group == ""  ? "Unknown" : $student->blood_group,
                                    'religion' => $student->religion,
                                    'proof_type' => $student->proof_type == "Adhar Card" ? "Aadhar Card" : ($student->proof_type == "" ? "Aadhar Card" : $student->proof_type ),
                                    'proof_identification' => $student->adhar_card,
                                    'caste_category' => $student->category == "" ? "Others" : $student->category,
                                    'bpl_card' => $student->bpl_card,
                                    'residence' => $student->residence,
                                    'residence_type' => $student->residence_type == "" ? "Pakka Ghar" : $student->residence_type,
                                    'physical_disability' => $student->physical_disability == "" ? "No" : $student->physical_disability,
                                    'martial_status' => $student->marital_status == "" ? "Single" : $student->marital_status,
                                    'bank_name' => $student->bank_name,
                                    'account_no' => $student->account_number,
                                    'bank_location' => $student->location,
                                    'bank_ifsc' => $student->ifsc,
                                    'is_active' => ($student->status == "active") ? 1 : 0,
                                    'role' => 'student',
                                    'father_name' => $student->father_name,
                                    'mother_name' => $student->mr_name,
                                    'education' => $student->education,
                                    'parent_id' => $newCenter->id,
                                    'created_at' => $student->rdate == "0000-00-00 00:00:00" ? date('Y-m-d') : $student->rdate,
                                    'updated_at' => $student->rdate == "0000-00-00 00:00:00" ? date('Y-m-d') : $student->rdate,
                                    'scan_thumb' => $student->scan_thumb,
                                    'date_of_birth' => $dob,
                                ];
                            }

                            if(!empty($sqlInsertData))
                            {
                                User::insert($sqlInsertData);
                            }
                            echo "Done";

                        }
                        
                    }
                }
            }
        }

    }

}