<?php

namespace App\Http\Controllers;

use App\Models\Survey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebController extends Controller
{
    public function index1()
    {
        // ONLY FIRST CATEGORY FUNCTION (NENE)

        $vbl2 = DB::table('surveys')->orderBy('survey_id', 'desc')
            // ->where('survey_id',21)
            ->join('answers','answers.survey_id','=','surveys.id')
            ->join('m_c_q_s','m_c_q_s.id','=','answers.m_c_q_s_id')
            // ->where('m_c_q_s.mcq',"N")
            ->join('users','users.id','=','answers.user_id')
            ->join('database__names','database__names.id','=','users.database__name_id')
            ->where('database__names.category_id',1)
            ->select('surveys.id as sur_id','answers.question_id','m_c_q_s.mcq','users.table_name','database__names.db_name')
            ->get();
        // $vbl2 = json_decode($vbl2, true);
        // return $vbl2;

        $arr = array();
        $nq = array();
        $gq = array();
        $uq = array();

        $n = 0;
        $g = 0;
        $u = 0;

        $curr_survey = $vbl2[0]->sur_id;
        $curr_table = $vbl2[0]->table_name;
        $curr_db = $vbl2[0]->db_name;

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

                sort($nq);
                sort($gq);
                sort($uq);
                array_push($arr,array($curr_table,$curr_db,$n,$g,$u,$nq,$gq,$uq));

                $curr_table = $vbl2[$i]->table_name;
                $curr_db = $vbl2[$i]->db_name;

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
            sort($nq);
            sort($gq);
            sort($uq);
            array_push($arr,array($curr_table,$curr_db,$n,$g,$u,$nq,$gq,$uq));
        }
        return view('nene',compact('arr'));

        // return array($n,$g,$u);
        // $vbl2 = DB::table('survey')
        // return $arr;
    }

    public function index3()
    {
        // ONLY SECOND CATEGORY FUNCTION (NENE)

        $vbl2 = DB::table('surveys')->orderBy('survey_id', 'desc')
            // ->where('survey_id',2)
            ->join('answers','answers.survey_id','=','surveys.id')
            ->join('m_c_q_s','m_c_q_s.id','=','answers.m_c_q_s_id')
            // ->where('m_c_q_s.mcq',"N")
            ->join('users','users.id','=','answers.user_id')
            ->join('database__names','database__names.id','=','users.database__name_id')
            ->where('database__names.category_id',3)
            ->select('surveys.id as sur_id','answers.question_id','m_c_q_s.mcq','users.table_name','database__names.db_name')
            ->get();
        // $vbl2 = json_decode($vbl2, true);
        // return $vbl2;

        $arr = array();
        $eq = array();
        $dq = array();
        $uq = array();

        $e = 0;
        $d = 0;
        $u = 0;

        $curr_survey = $vbl2[0]->sur_id;
        $curr_table = $vbl2[0]->table_name;
        $curr_db = $vbl2[0]->db_name;

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

                sort($eq);
                sort($dq);
                sort($uq);
                array_push($arr,array($curr_table,$curr_db,$e,$d,$u,$eq,$dq,$uq));

                $curr_table = $vbl2[$i]->table_name;
                $curr_db = $vbl2[$i]->db_name;

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
            sort($eq);
            sort($dq);
            sort($uq);
            array_push($arr,array($curr_table,$curr_db,$e,$d,$u,$eq,$dq,$uq));
        }
        return view('eric',compact('arr'));

        // return array($n,$g,$u);
        // $vbl2 = DB::table('survey')
        // return $arr;
    }

    public function index2()
    {
        // ONLY THIRD CATEGORY FUNCTION (NENE)

        $vbl2 = DB::table('surveys')->orderBy('survey_id', 'desc')
            // ->where('survey_id',2)
            ->join('answers','answers.survey_id','=','surveys.id')
            ->join('m_c_q_s','m_c_q_s.id','=','answers.m_c_q_s_id')
            // ->where('m_c_q_s.mcq',"N")
            ->join('users','users.id','=','answers.user_id')
            ->join('database__names','database__names.id','=','users.database__name_id')
            ->where('database__names.category_id',2)
            ->select('surveys.id as sur_id','answers.question_id','m_c_q_s.mcq','users.table_name','database__names.db_name')
            ->get();
        // $vbl2 = json_decode($vbl2, true);
        // return $vbl2;

        $arr = array();

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

                sort($pq);
                sort($tq);
                sort($aq);
                sort($lq);
                sort($mq);
                sort($vq);
                sort($uq);
                array_push($arr,array($curr_table,$curr_db,$p,$t,$a,$l,$m,$v,$u,$pq,$tq,$aq,$lq,$mq,$vq,$uq));

                $curr_table = $vbl2[$i]->table_name;
                $curr_db = $vbl2[$i]->db_name;

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
            sort($pq);
            sort($tq);
            sort($aq);
            sort($lq);
            sort($mq);
            sort($vq);
            sort($uq);
            array_push($arr,array($curr_table,$curr_db,$p,$t,$a,$l,$m,$v,$u,$pq,$tq,$aq,$lq,$mq,$vq,$uq));
        }

        return view('philip',compact('arr'));

        // return array($n,$g,$u);
        // $vbl2 = DB::table('survey')
        // return $arr;
    }
}

