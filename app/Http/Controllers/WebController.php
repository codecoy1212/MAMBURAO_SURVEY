<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Register;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{
    public function index1()
    {
        if(session()->get('s_uname'))
        {
            // ONLY FIRST CATEGORY FUNCTION (NENE)

            $vbl2 = DB::table('surveys')
            ->orderBy('survey_id', 'desc')
            // ->where('survey_id',2211)
            ->join('answers','answers.survey_id','=','surveys.id')
            ->join('m_c_q_s','m_c_q_s.id','=','answers.m_c_q_s_id')
            // ->where('m_c_q_s.mcq',"N")
            ->join('users','users.id','=','answers.user_id')
            ->join('database__names','database__names.id','=','users.database__name_id')
            ->where('database__names.category_id',1)
            ->select('surveys.id as sur_id','answers.question_id','m_c_q_s.mcq','users.table_name','database__names.db_name','answers.user_id','surveys.created_at')
            ->get();
            // $vbl2 = json_decode($vbl2, true);
            // return $vbl2;

            $arr = array();

            if(count($vbl2) == 0)
            return view('nene',compact('arr'));

            $nq = array();
            $gq = array();
            $uq = array();

            $n = 0;
            $g = 0;
            $u = 0;

            $curr_survey = $vbl2[0]->sur_id;
            $curr_table = $vbl2[0]->table_name;
            $curr_db = $vbl2[0]->db_name;
            $curr_time = $vbl2[0]->created_at;

            for ($i=0; $i < count($vbl2) ; $i++) {
                if($curr_survey == $vbl2[$i]->sur_id)
                {
                    // echo $i;
                    // echo $vbl2[$i]->mcq."\n\n";
                    // echo "YES\n";

                    if($vbl2[$i]->mcq == "N")
                    {
                    array_push($nq,$vbl2[$i]->question_id);
                    $n++;
                    }
                    if($vbl2[$i]->mcq == "G")
                    {
                    array_push($gq,$vbl2[$i]->question_id);
                    $g++;
                    }
                    if($vbl2[$i]->mcq == "U")
                    {
                    array_push($uq,$vbl2[$i]->question_id);
                    $u++;
                    }
                }
                else
                {
                    $curr_survey = $vbl2[$i]->sur_id;

                    // echo $i;
                    // echo $vbl2[$i]->mcq."\n\n";
                    // echo "NO\n\n";

                    $curr_time_2 = date('d/m/Y', strtotime($curr_time));
                    $curr_date = date('h:i A', strtotime($curr_time));

                    sort($nq);
                    sort($gq);
                    sort($uq);
                    array_push($arr,array($curr_table,$curr_db,$n,$g,$u,$nq,$gq,$uq,$curr_time_2,$curr_date));

                    $curr_table = $vbl2[$i]->table_name;
                    $curr_db = $vbl2[$i]->db_name;
                    $curr_time = $vbl2[$i]->created_at;

                    $nq = array();
                    $gq = array();
                    $uq = array();

                    $n = 0;
                    $g = 0;
                    $u = 0;

                    if($vbl2[$i]->mcq == "N")
                    {
                    array_push($nq,$vbl2[$i]->question_id);
                    $n++;
                    }
                    if($vbl2[$i]->mcq == "G")
                    {
                    array_push($gq,$vbl2[$i]->question_id);
                    $g++;
                    }
                    if($vbl2[$i]->mcq == "U")
                    {
                    array_push($uq,$vbl2[$i]->question_id);
                    $u++;
                    }
                }
            }
            if(count($vbl2) != 0)
            {
                $curr_time_2 = date('d/m/Y', strtotime($curr_time));
                $curr_date = date('h:i A', strtotime($curr_time));

                sort($nq);
                sort($gq);
                sort($uq);
                array_push($arr,array($curr_table,$curr_db,$n,$g,$u,$nq,$gq,$uq,$curr_time_2,$curr_date));
            }
            return view('nene',compact('arr'));

            // return array($n,$g,$u);
            // $vbl2 = DB::table('survey')
            return $arr;
        }
        else
            return redirect('login');



    }

    public function index3()
    {
        if(session()->get('s_uname'))
        {
            // ONLY SECOND CATEGORY FUNCTION (ERIC)

            $vbl2 = DB::table('surveys')
            ->orderBy('survey_id', 'desc')
            // ->where('survey_id',2121)
            ->join('answers','answers.survey_id','=','surveys.id')
            ->join('m_c_q_s','m_c_q_s.id','=','answers.m_c_q_s_id')
            // ->where('m_c_q_s.mcq',"N")
            ->join('users','users.id','=','answers.user_id')
            ->join('database__names','database__names.id','=','users.database__name_id')
            ->where('database__names.category_id',3)
            ->select('surveys.id as sur_id','answers.question_id','m_c_q_s.mcq','users.table_name','database__names.db_name','answers.user_id','surveys.created_at')
            ->get();
            // $vbl2 = json_decode($vbl2, true);
            // return $vbl2;

            $arr = array();

            if(count($vbl2) == 0)
            return view('eric',compact('arr'));

            $eq = array();
            $dq = array();
            $uq = array();

            $e = 0;
            $d = 0;
            $u = 0;

            $curr_survey = $vbl2[0]->sur_id;
            $curr_table = $vbl2[0]->table_name;
            $curr_db = $vbl2[0]->db_name;
            $curr_time = $vbl2[0]->created_at;

            for ($i=0; $i < count($vbl2) ; $i++) {
            if($curr_survey == $vbl2[$i]->sur_id)
            {
                // echo $i;
                // echo $vbl2[$i]->mcq."\n\n";
                // echo "YES\n";

                if($vbl2[$i]->mcq == "E")
                {
                array_push($eq,$vbl2[$i]->question_id);
                $e++;
                }
                if($vbl2[$i]->mcq == "D")
                {
                array_push($dq,$vbl2[$i]->question_id);
                $d++;
                }
                if($vbl2[$i]->mcq == "U")
                {
                array_push($uq,$vbl2[$i]->question_id);
                $u++;
                }
            }
            else
            {
                $curr_survey = $vbl2[$i]->sur_id;

                // echo $i;
                // echo $vbl2[$i]->mcq."\n\n";
                // echo "NO\n\n";

                $curr_time_2 = date('d/m/Y', strtotime($curr_time));
                $curr_date = date('h:i A', strtotime($curr_time));

                sort($eq);
                sort($dq);
                sort($uq);
                array_push($arr,array($curr_table,$curr_db,$e,$d,$u,$eq,$dq,$uq,$curr_time_2,$curr_date));

                $curr_table = $vbl2[$i]->table_name;
                $curr_db = $vbl2[$i]->db_name;
                $curr_time = $vbl2[$i]->created_at;

                $eq = array();
                $dq = array();
                $uq = array();

                $e = 0;
                $d = 0;
                $u = 0;


                if($vbl2[$i]->mcq == "E")
                {
                array_push($eq,$vbl2[$i]->question_id);
                $e++;
                }
                if($vbl2[$i]->mcq == "D")
                {
                array_push($dq,$vbl2[$i]->question_id);
                $d++;
                }
                if($vbl2[$i]->mcq == "U")
                {
                array_push($uq,$vbl2[$i]->question_id);
                $u++;
                }
            }
            }
            if(count($vbl2) != 0)
            {

            $curr_time_2 = date('d/m/Y', strtotime($curr_time));
            $curr_date = date('h:i A', strtotime($curr_time));

            sort($eq);
            sort($dq);
            sort($uq);
            array_push($arr,array($curr_table,$curr_db,$e,$d,$u,$eq,$dq,$uq,$curr_time_2,$curr_date));
            }
            return view('eric',compact('arr'));

            // return array($n,$g,$u);
            // $vbl2 = DB::table('survey')
            // return $arr;
        }
        else
            return redirect('login');
    }

    public function index2()
    {
        if(session()->get('s_uname'))
        {
            // ONLY THIRD CATEGORY FUNCTION (PHILIP)

            $vbl2 = DB::table('surveys')
            ->orderBy('survey_id', 'desc')
            // ->where('survey_id',22323)
            ->join('answers','answers.survey_id','=','surveys.id')
            ->join('m_c_q_s','m_c_q_s.id','=','answers.m_c_q_s_id')
            // ->where('m_c_q_s.mcq',"N")
            ->join('users','users.id','=','answers.user_id')
            ->join('database__names','database__names.id','=','users.database__name_id')
            ->where('database__names.category_id',2)
            ->select('surveys.id as sur_id','answers.question_id','m_c_q_s.mcq','users.table_name','database__names.db_name','answers.user_id','surveys.created_at')
            ->get();
            // $vbl2 = json_decode($vbl2, true);
            // return $vbl2;

            $arr = array();

            if(count($vbl2) == 0)
            return view('philip',compact('arr'));

            $pq = array();
            $tq = array();
            $aq = array();
            $lq = array();
            $mq = array();
            $vq = array();
            $uq = array();

            $p = 0;
            $t = 0;
            $a = 0;
            $l = 0;
            $m = 0;
            $v = 0;
            $u = 0;

            $curr_survey = $vbl2[0]->sur_id;
            $curr_table = $vbl2[0]->table_name;
            $curr_db = $vbl2[0]->db_name;
            $curr_time = $vbl2[0]->created_at;

            for ($i=0; $i < count($vbl2) ; $i++) {
                if($curr_survey == $vbl2[$i]->sur_id)
                {
                    // echo $i;
                    // echo $vbl2[$i]->mcq."\n\n";
                    // echo "YES\n";

                    if($vbl2[$i]->mcq == "P")
                    {
                    array_push($pq,$vbl2[$i]->question_id);
                    $p++;
                    }
                    if($vbl2[$i]->mcq == "T")
                    {
                    array_push($tq,$vbl2[$i]->question_id);
                    $t++;
                    }
                    if($vbl2[$i]->mcq == "A")
                    {
                    array_push($aq,$vbl2[$i]->question_id);
                    $a++;
                    }
                    if($vbl2[$i]->mcq == "L")
                    {
                    array_push($lq,$vbl2[$i]->question_id);
                    $l++;
                    }
                    if($vbl2[$i]->mcq == "M")
                    {
                    array_push($mq,$vbl2[$i]->question_id);
                    $m++;
                    }
                    if($vbl2[$i]->mcq == "V")
                    {
                    array_push($vq,$vbl2[$i]->question_id);
                    $v++;
                    }
                    if($vbl2[$i]->mcq == "U")
                    {
                    array_push($uq,$vbl2[$i]->question_id);
                    $u++;
                    }
                }
                else
                {
                    $curr_survey = $vbl2[$i]->sur_id;

                    // echo $i;
                    // echo $vbl2[$i]->mcq."\n\n";
                    // echo "NO\n\n";

                    $curr_time_2 = date('d/m/Y', strtotime($curr_time));
                    $curr_date = date('h:i A', strtotime($curr_time));

                    sort($pq);
                    sort($tq);
                    sort($aq);
                    sort($lq);
                    sort($mq);
                    sort($vq);
                    sort($uq);
                    array_push($arr,array($curr_table,$curr_db,$p,$t,$a,$l,$m,$v,$u,$pq,$tq,$aq,$lq,$mq,$vq,$uq,$curr_time_2,$curr_date));

                    $curr_table = $vbl2[$i]->table_name;
                    $curr_db = $vbl2[$i]->db_name;
                    $curr_time = $vbl2[$i]->created_at;

                    $pq = array();
                    $tq = array();
                    $aq = array();
                    $lq = array();
                    $mq = array();
                    $vq = array();
                    $uq = array();

                    $p = 0;
                    $t = 0;
                    $a = 0;
                    $l = 0;
                    $m = 0;
                    $v = 0;
                    $u = 0;

                    if($vbl2[$i]->mcq == "P")
                    {
                    array_push($pq,$vbl2[$i]->question_id);
                    $p++;
                    }
                    if($vbl2[$i]->mcq == "T")
                    {
                    array_push($tq,$vbl2[$i]->question_id);
                    $t++;
                    }
                    if($vbl2[$i]->mcq == "A")
                    {
                    array_push($aq,$vbl2[$i]->question_id);
                    $a++;
                    }
                    if($vbl2[$i]->mcq == "L")
                    {
                    array_push($lq,$vbl2[$i]->question_id);
                    $l++;
                    }
                    if($vbl2[$i]->mcq == "M")
                    {
                    array_push($mq,$vbl2[$i]->question_id);
                    $m++;
                    }
                    if($vbl2[$i]->mcq == "V")
                    {
                    array_push($vq,$vbl2[$i]->question_id);
                    $v++;
                    }
                    if($vbl2[$i]->mcq == "U")
                    {
                    array_push($uq,$vbl2[$i]->question_id);
                    $u++;
                    }
                }
            }
            if(count($vbl2) != 0)
            {
                $curr_time_2 = date('d/m/Y', strtotime($curr_time));
                $curr_date = date('h:i A', strtotime($curr_time));

                sort($pq);
                sort($tq);
                sort($aq);
                sort($lq);
                sort($mq);
                sort($vq);
                sort($uq);
                array_push($arr,array($curr_table,$curr_db,$p,$t,$a,$l,$m,$v,$u,$pq,$tq,$aq,$lq,$mq,$vq,$uq,$curr_time_2,$curr_date));
            }

            return view('philip',compact('arr'));

            // return array($n,$g,$u);
            // $vbl2 = DB::table('survey')
            // return $arr;
        }
        else
            return redirect('login');
    }

    public function index()
    {
        if(session()->get('s_uname'))
        {
            return view('dashboard');
        }
        else
            return redirect('login');

    }

    public function data_table($id)
    {
        if(session()->get('s_uname'))
        {
            // return $id;
            $vbl = Category::where('id',$id)->first();

            return view('table',compact('vbl'));
        }
        else
            return redirect('login');

    }

    public function table_show(Request $request)
    {
        if(session()->get('s_uname'))
        {
            $vbl2 = DB::table('users')
            ->join('database__names','database__names.id','=','users.database__name_id')
            ->join('categories','categories.id','=','database__names.category_id')
            ->where('categories.id',$request->id)
            ->select('users.*','database__names.db_name','users.*')
            ->get();
            // return $vbl2;
            $vbl2 = json_decode($vbl2, true);

            return datatables()->of($vbl2)->addColumn('action', function ($row) {

                $btn = '<button class="update_pass button text-white bg-theme-4 shadow-md mr-2" value="' . $row['id'] . '">Update Password</button>';
                return $btn;

            })->rawColumns(['action'])->make(true);
        }
        else
            return redirect('login');

    }

    public function update_pass(Request $request)
    {
        if(session()->get('s_uname'))
        {
            $vbl = User::where('id', $request->id)->first();
            return $vbl;
        }
        else
            return redirect('login');

    }

    public function pass_changed(Request $request)
    {
        if(session()->get('s_uname'))
        {
            // return $request;

            $validator = Validator::make($request->all(),[
                'id'=> 'required',
                'pass_word' => 'required|unique:users,pass_word',
            ],[
                'pass_word.required' => 'Password is required.',
                'pass_word.unique' => 'Password already exists.',
            ]);
            if ($validator->fails())
            {
                return response()->json($validator->errors()->toArray(),422);
            }
            else
            {
                $vbl = User::find($request->id);
                $vbl->pass_word = $request->pass_word;
                $vbl->update();
            }
        }
        else
            return redirect('login');

    }

    public function index4()
    {
        if(session()->get('s_uname'))
        {
            return view('settings');
        }
        else
            return redirect('login');
    }

    public function acc_sett()
    {
        if(session()->get('s_uname'))
        {
            $vbl = Register::where('username',session()->get('s_uname'))->first();
            // return $vbl;
            return view('account',compact('vbl'));
        }
        else
            return redirect('login');
    }

    public function up_pass(Request $request)
    {
        if(session()->get('s_uname'))
        {
            // return $request;

            $validator = Validator::make($request->all(),[
                'user_id'=> 'required|numeric|exists:registers,id',
                'old_password' => 'required|min:5',
                'new_password' => 'required|min:5',
            ],[
                'user_id.required'=>'Please Enter User Id',
                'user_id.exists'=>'User Not Found',
                'old_password.required'=>'Enter Your Old Password',
                'old_password.min'=>'Password Not Less Than 5 Digits',
                'new_password.required'=>'Enter Your New Password',
                'new_password.min'=>'Password Not Less Than 5 Digits',
                ]);
            if ($validator->fails())
            {
                return response()->json($validator->errors()->toArray(),422);
            }
            else
            {
                $var = Register::find($request->user_id);
                if($request->old_password == $var->password)
                {
                    $var->password = $request->new_password;
                    $var->update();
                }
                else
                {
                    return response()->json("Old Password is Incorrect.",422);
                }
            }
        }
        else
            return redirect('login');
    }

    public function all_sur()
    {
        if(session()->get('s_uname'))
        {
            // ONLY FIRST CATEGORY FUNCTION (NENE)

            $f_nene = array();
            $f_philip = array();
            $f_eric = array();

            $vbl2 = DB::table('surveys')
            ->orderBy('survey_id', 'desc')
            // ->where('survey_id',2211)
            ->join('answers','answers.survey_id','=','surveys.id')
            ->join('m_c_q_s','m_c_q_s.id','=','answers.m_c_q_s_id')
            // ->where('m_c_q_s.mcq',"N")
            ->join('users','users.id','=','answers.user_id')
            ->join('database__names','database__names.id','=','users.database__name_id')
            ->where('database__names.category_id',1)
            ->select('surveys.id as sur_id','answers.question_id','m_c_q_s.mcq','users.table_name','database__names.db_name','answers.user_id','surveys.created_at')
            ->get();
            // $vbl2 = json_decode($vbl2, true);
            // return $vbl2;

            $arr = array();
            $no_repeat = array();

            if(count($vbl2) == 0){}
            else
            {
                $nq = array();
                $gq = array();
                $uq = array();

                $n = 0;
                $g = 0;
                $u = 0;

                $curr_survey = $vbl2[0]->sur_id;
                $curr_table = $vbl2[0]->table_name;
                $curr_db = $vbl2[0]->db_name;
                $curr_time = $vbl2[0]->created_at;

                for ($i=0; $i < count($vbl2) ; $i++) {
                    if($curr_survey == $vbl2[$i]->sur_id)
                    {
                        // echo $i;
                        // echo $vbl2[$i]->mcq."\n\n";
                        // echo "YES\n";

                        if($vbl2[$i]->mcq == "N")
                        {
                        array_push($nq,$vbl2[$i]->question_id);
                        $n++;
                        }
                        if($vbl2[$i]->mcq == "G")
                        {
                        array_push($gq,$vbl2[$i]->question_id);
                        $g++;
                        }
                        if($vbl2[$i]->mcq == "U")
                        {
                        array_push($uq,$vbl2[$i]->question_id);
                        $u++;
                        }
                    }
                    else
                    {
                        $curr_survey = $vbl2[$i]->sur_id;

                        // echo $i;
                        // echo $vbl2[$i]->mcq."\n\n";
                        // echo "NO\n\n";

                        $curr_time_2 = date('d/m/Y', strtotime($curr_time));
                        $curr_date = date('h:i A', strtotime($curr_time));

                        sort($nq);
                        sort($gq);
                        sort($uq);

                        if(in_array($curr_table,$no_repeat)){}
                        else{
                            array_push($no_repeat,$curr_table);
                            array_push($arr,array($curr_table,$curr_db,$n,$g,$u,$nq,$gq,$uq,$curr_time_2,$curr_date));
                        }

                        $curr_table = $vbl2[$i]->table_name;
                        $curr_db = $vbl2[$i]->db_name;
                        $curr_time = $vbl2[$i]->created_at;

                        $nq = array();
                        $gq = array();
                        $uq = array();

                        $n = 0;
                        $g = 0;
                        $u = 0;

                        if($vbl2[$i]->mcq == "N")
                        {
                        array_push($nq,$vbl2[$i]->question_id);
                        $n++;
                        }
                        if($vbl2[$i]->mcq == "G")
                        {
                        array_push($gq,$vbl2[$i]->question_id);
                        $g++;
                        }
                        if($vbl2[$i]->mcq == "U")
                        {
                        array_push($uq,$vbl2[$i]->question_id);
                        $u++;
                        }
                    }
                }
                if(count($vbl2) != 0)
                {
                    $curr_time_2 = date('d/m/Y', strtotime($curr_time));
                    $curr_date = date('h:i A', strtotime($curr_time));

                    sort($nq);
                    sort($gq);
                    sort($uq);

                    if(in_array($curr_table,$no_repeat)){}
                    else{
                        array_push($no_repeat,$curr_table);
                        array_push($arr,array($curr_table,$curr_db,$n,$g,$u,$nq,$gq,$uq,$curr_time_2,$curr_date));
                    }
                }
                $nene_final = $arr;

                $one = 0;
                $two = 0;
                $three = 0;
                for ($i=0; $i < count($nene_final); $i++) {
                    $one = $nene_final[$i][2] + $one;
                    $two = $nene_final[$i][3] + $two;
                    $three = $nene_final[$i][4] + $three;
                }
                $f_nene = array($one,$two,$three);
                // return array($one,$two,$three);

                // return view('nene',compact('arr'));

                // return array($n,$g,$u);
                // $vbl2 = DB::table('survey')


                // return $no_repeat;
            }

            $vbl2 = DB::table('surveys')
            ->orderBy('survey_id', 'desc')
            // ->where('survey_id',2121)
            ->join('answers','answers.survey_id','=','surveys.id')
            ->join('m_c_q_s','m_c_q_s.id','=','answers.m_c_q_s_id')
            // ->where('m_c_q_s.mcq',"N")
            ->join('users','users.id','=','answers.user_id')
            ->join('database__names','database__names.id','=','users.database__name_id')
            ->where('database__names.category_id',3)
            ->select('surveys.id as sur_id','answers.question_id','m_c_q_s.mcq','users.table_name','database__names.db_name','answers.user_id','surveys.created_at')
            ->get();
            // $vbl2 = json_decode($vbl2, true);
            // return $vbl2;

            $arr = array();
            $no_repeat = array();

            if(count($vbl2) == 0){}
            else
            {
                $eq = array();
                $dq = array();
                $uq = array();

                $e = 0;
                $d = 0;
                $u = 0;

                $curr_survey = $vbl2[0]->sur_id;
                $curr_table = $vbl2[0]->table_name;
                $curr_db = $vbl2[0]->db_name;
                $curr_time = $vbl2[0]->created_at;

                for ($i=0; $i < count($vbl2) ; $i++) {
                if($curr_survey == $vbl2[$i]->sur_id)
                {
                    // echo $i;
                    // echo $vbl2[$i]->mcq."\n\n";
                    // echo "YES\n";

                    if($vbl2[$i]->mcq == "E")
                    {
                    array_push($eq,$vbl2[$i]->question_id);
                    $e++;
                    }
                    if($vbl2[$i]->mcq == "D")
                    {
                    array_push($dq,$vbl2[$i]->question_id);
                    $d++;
                    }
                    if($vbl2[$i]->mcq == "U")
                    {
                    array_push($uq,$vbl2[$i]->question_id);
                    $u++;
                    }
                }
                else
                {
                    $curr_survey = $vbl2[$i]->sur_id;

                    // echo $i;
                    // echo $vbl2[$i]->mcq."\n\n";
                    // echo "NO\n\n";

                    $curr_time_2 = date('d/m/Y', strtotime($curr_time));
                    $curr_date = date('h:i A', strtotime($curr_time));

                    sort($eq);
                    sort($dq);
                    sort($uq);

                    if(in_array($curr_table,$no_repeat)){}
                    else{
                        array_push($no_repeat,$curr_table);
                        array_push($arr,array($curr_table,$curr_db,$e,$d,$u,$eq,$dq,$uq,$curr_time_2,$curr_date));
                    }

                    $curr_table = $vbl2[$i]->table_name;
                    $curr_db = $vbl2[$i]->db_name;
                    $curr_time = $vbl2[$i]->created_at;

                    $eq = array();
                    $dq = array();
                    $uq = array();

                    $e = 0;
                    $d = 0;
                    $u = 0;


                    if($vbl2[$i]->mcq == "E")
                    {
                    array_push($eq,$vbl2[$i]->question_id);
                    $e++;
                    }
                    if($vbl2[$i]->mcq == "D")
                    {
                    array_push($dq,$vbl2[$i]->question_id);
                    $d++;
                    }
                    if($vbl2[$i]->mcq == "U")
                    {
                    array_push($uq,$vbl2[$i]->question_id);
                    $u++;
                    }
                }
                }
                if(count($vbl2) != 0)
                {

                    $curr_time_2 = date('d/m/Y', strtotime($curr_time));
                    $curr_date = date('h:i A', strtotime($curr_time));

                    sort($eq);
                    sort($dq);
                    sort($uq);

                    if(in_array($curr_table,$no_repeat)){}
                    else{
                        array_push($no_repeat,$curr_table);
                        array_push($arr,array($curr_table,$curr_db,$e,$d,$u,$eq,$dq,$uq,$curr_time_2,$curr_date));
                    }
                }
                $eric_final = $arr;

                $one = 0;
                $two = 0;
                $three = 0;
                for ($i=0; $i < count($eric_final); $i++) {
                    $one = $eric_final[$i][2] + $one;
                    $two = $eric_final[$i][3] + $two;
                    $three = $eric_final[$i][4] + $three;
                }
                $f_eric = array($one,$two,$three);
                // return view('eric',compact('arr'));
                // return $f_eric;
                // return array($n,$g,$u);
                // $vbl2 = DB::table('survey')
            }

            $vbl2 = DB::table('surveys')
            ->orderBy('survey_id', 'desc')
            // ->where('survey_id',22323)
            ->join('answers','answers.survey_id','=','surveys.id')
            ->join('m_c_q_s','m_c_q_s.id','=','answers.m_c_q_s_id')
            // ->where('m_c_q_s.mcq',"N")
            ->join('users','users.id','=','answers.user_id')
            ->join('database__names','database__names.id','=','users.database__name_id')
            ->where('database__names.category_id',2)
            ->select('surveys.id as sur_id','answers.question_id','m_c_q_s.mcq','users.table_name','database__names.db_name','answers.user_id','surveys.created_at')
            ->get();
            // $vbl2 = json_decode($vbl2, true);
            // return $vbl2;

            $arr = array();
            $no_repeat = array();

            if(count($vbl2) == 0){}
            else
            {
                $pq = array();
                $tq = array();
                $aq = array();
                $lq = array();
                $mq = array();
                $vq = array();
                $uq = array();

                $p = 0;
                $t = 0;
                $a = 0;
                $l = 0;
                $m = 0;
                $v = 0;
                $u = 0;

                $curr_survey = $vbl2[0]->sur_id;
                $curr_table = $vbl2[0]->table_name;
                $curr_db = $vbl2[0]->db_name;
                $curr_time = $vbl2[0]->created_at;

                for ($i=0; $i < count($vbl2) ; $i++) {
                    if($curr_survey == $vbl2[$i]->sur_id)
                    {
                        // echo $i;
                        // echo $vbl2[$i]->mcq."\n\n";
                        // echo "YES\n";

                        if($vbl2[$i]->mcq == "P")
                        {
                        array_push($pq,$vbl2[$i]->question_id);
                        $p++;
                        }
                        if($vbl2[$i]->mcq == "T")
                        {
                        array_push($tq,$vbl2[$i]->question_id);
                        $t++;
                        }
                        if($vbl2[$i]->mcq == "A")
                        {
                        array_push($aq,$vbl2[$i]->question_id);
                        $a++;
                        }
                        if($vbl2[$i]->mcq == "L")
                        {
                        array_push($lq,$vbl2[$i]->question_id);
                        $l++;
                        }
                        if($vbl2[$i]->mcq == "M")
                        {
                        array_push($mq,$vbl2[$i]->question_id);
                        $m++;
                        }
                        if($vbl2[$i]->mcq == "V")
                        {
                        array_push($vq,$vbl2[$i]->question_id);
                        $v++;
                        }
                        if($vbl2[$i]->mcq == "U")
                        {
                        array_push($uq,$vbl2[$i]->question_id);
                        $u++;
                        }
                    }
                    else
                    {
                        $curr_survey = $vbl2[$i]->sur_id;

                        // echo $i;
                        // echo $vbl2[$i]->mcq."\n\n";
                        // echo "NO\n\n";

                        $curr_time_2 = date('d/m/Y', strtotime($curr_time));
                        $curr_date = date('h:i A', strtotime($curr_time));

                        sort($pq);
                        sort($tq);
                        sort($aq);
                        sort($lq);
                        sort($mq);
                        sort($vq);
                        sort($uq);

                        if(in_array($curr_table,$no_repeat)){}
                        else{
                            array_push($no_repeat,$curr_table);
                            array_push($arr,array($curr_table,$curr_db,$p,$t,$a,$l,$m,$v,$u,$pq,$tq,$aq,$lq,$mq,$vq,$uq,$curr_time_2,$curr_date));
                        }

                        $curr_table = $vbl2[$i]->table_name;
                        $curr_db = $vbl2[$i]->db_name;
                        $curr_time = $vbl2[$i]->created_at;

                        $pq = array();
                        $tq = array();
                        $aq = array();
                        $lq = array();
                        $mq = array();
                        $vq = array();
                        $uq = array();

                        $p = 0;
                        $t = 0;
                        $a = 0;
                        $l = 0;
                        $m = 0;
                        $v = 0;
                        $u = 0;

                        if($vbl2[$i]->mcq == "P")
                        {
                        array_push($pq,$vbl2[$i]->question_id);
                        $p++;
                        }
                        if($vbl2[$i]->mcq == "T")
                        {
                        array_push($tq,$vbl2[$i]->question_id);
                        $t++;
                        }
                        if($vbl2[$i]->mcq == "A")
                        {
                        array_push($aq,$vbl2[$i]->question_id);
                        $a++;
                        }
                        if($vbl2[$i]->mcq == "L")
                        {
                        array_push($lq,$vbl2[$i]->question_id);
                        $l++;
                        }
                        if($vbl2[$i]->mcq == "M")
                        {
                        array_push($mq,$vbl2[$i]->question_id);
                        $m++;
                        }
                        if($vbl2[$i]->mcq == "V")
                        {
                        array_push($vq,$vbl2[$i]->question_id);
                        $v++;
                        }
                        if($vbl2[$i]->mcq == "U")
                        {
                        array_push($uq,$vbl2[$i]->question_id);
                        $u++;
                        }
                    }
                }
                if(count($vbl2) != 0)
                {
                    $curr_time_2 = date('d/m/Y', strtotime($curr_time));
                    $curr_date = date('h:i A', strtotime($curr_time));

                    sort($pq);
                    sort($tq);
                    sort($aq);
                    sort($lq);
                    sort($mq);
                    sort($vq);
                    sort($uq);

                    if(in_array($curr_table,$no_repeat)){}
                    else{
                        array_push($no_repeat,$curr_table);
                        array_push($arr,array($curr_table,$curr_db,$p,$t,$a,$l,$m,$v,$u,$pq,$tq,$aq,$lq,$mq,$vq,$uq,$curr_time_2,$curr_date));
                    }
                }
                $philip_final =  $arr;

                $one = 0;
                $two = 0;
                $three = 0;
                $four = 0;
                $five = 0;
                $six = 0;
                $seven = 0;
                for ($i=0; $i < count($philip_final); $i++) {
                    $one = $philip_final[$i][2] + $one;
                    $two = $philip_final[$i][3] + $two;
                    $three = $philip_final[$i][4] + $three;
                    $four = $philip_final[$i][5] + $four;
                    $five = $philip_final[$i][6] + $five;
                    $six = $philip_final[$i][7] + $six;
                    $seven = $philip_final[$i][8] +  $seven;
                }
                $f_philip = array($one,$two,$three,$four,$five,$six,$seven);
                // return $f_philip;
                // return view('philip',compact('arr'));

                // return array($n,$g,$u);
                // $vbl2 = DB::table('survey')

                // $arr = $philip_final;
                // return array($nene_final,$eric_final,$philip_final);
                // return view('philip',compact('arr'));
            }


            return view('mamburao',compact('f_nene','f_philip','f_eric'));
        }
        else
            return redirect('login');
    }
}

