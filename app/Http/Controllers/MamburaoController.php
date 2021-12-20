<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\MCQ;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use Hamcrest\Core\HasToString;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MamburaoController extends Controller
{
    public function get_cat()
    {
        $vbl = Category::all();
        if(count($vbl)==0)
        {
            $str['status']=false;
            $str['message']="NO CATEGORIES TO SHOW";
            return $str;
        }
        else
        {
            $str['status']=true;
            $str['message']="ALL CATEGORIES SHOWN";
            $str['data']=$vbl;
            return $str;
        }
    }

    public function login(Request $request)
    {
        // return $request;

        $vbl1 = Category::find($request->cat_id);
        // return $vbl1;

        $vbl2 = DB::table('users')
            ->where('users.pass_word',$request->user_pass)
            ->join('database__names','database__names.id','=','users.database__name_id')
            ->join('categories','categories.id','=','database__names.category_id')
            ->select('users.id as user_id','users.table_name','database__names.db_name',
            'categories.id as cat_id','categories.cat_name','categories.cat_color')
            ->first();
        // $vbl2 = json_decode($vbl2, true);
        // return $vbl2;

        if($vbl1 && $vbl2)
        {
            if($vbl1->cat_name == $vbl2->cat_name)
            {
                // $vbl4 = MCQ::where('category_id',$vbl2->cat_id)->get();

                $vbl4 = DB::table('m_c_q_s')
                ->where('category_id',$vbl2->cat_id)
                ->select('id as mcq_id', 'mcq as mcq_name')
                ->get();

                $str['status']=true;
                $str['message']="STUDENT LOGGED IN";
                $str['data']['user_details']=$vbl2;
                $str['data']['given_mcqs']=$vbl4;

                return $str;
            }
            else
            {
                $str['status']=false;
                $str['message']="INCORRECT CREDENTIALS";
                return $str;
            }
        }
        else
        {
            $str['status']=false;
            $str['message']="INCORRECT CREDENTIALS";
            return $str;
        }
    }

    public function give_ans(Request $request)
    {
        // return $request;

        $vbl5 = count($request->answers);
        // return count($request->answers);

        if(empty($request->user_id) || count($request->answers) == 0)
        {
            $str['status']=false;
            $str['message']="INCORRECT USER INFORMATION";
            return $str;
        }
        else
        {
            $vbl7 = DB::table('users')
            ->where('users.id',$request->user_id)
            ->join('database__names','database__names.id','=','users.database__name_id')
            ->join('categories','categories.id','=','database__names.category_id')
            ->select('categories.id as cat_id')
            ->first();
            // return $vbl7;

            if(empty($vbl7))
            {
                $str['status']=false;
                $str['message']="USER DOES NOT EXIST";
                return $str;
            }

            if($vbl7->cat_id == 1)
            {
                for ($i=0; $i < $vbl5; $i++) {
                    if ($request->answers[$i] == 1 || $request->answers[$i] == 2 || $request->answers[$i] == 3){}
                    else
                    {
                        $str['status']=false;
                        $str['message']="MCQ NOT OF THE CATEGORY";
                        return $str;
                    }
                }
            }
            else if($vbl7->cat_id == 2)
            {
                for ($i=0; $i < $vbl5; $i++) {
                    if ($request->answers[$i] == 4 || $request->answers[$i] == 5 || $request->answers[$i] == 6 ||
                    $request->answers[$i] == 7 || $request->answers[$i] == 8 || $request->answers[$i] == 9 ||
                    $request->answers[$i] == 10){}
                    else
                    {
                        $str['status']=false;
                        $str['message']="MCQ NOT OF THE CATEGORY";
                        return $str;
                    }

                }
            }
            else if($vbl7->cat_id == 3)
            {
                for ($i=0; $i < $vbl5; $i++) {
                    if ($request->answers[$i] == 11 || $request->answers[$i] == 12 || $request->answers[$i] == 13){}
                    else
                    {
                        $str['status']=false;
                        $str['message']="MCQ NOT OF THE CATEGORY";
                        return $str;
                    }
                }
            }


            $vbl3 = new Survey;
            $vbl3->status = "done";
            $vbl3->save();

            $que_id = 1;

            for ($i=0; $i < $vbl5; $i++) {

                // echo $request->answers[$i];
                $vbl2 = new Answer;
                $vbl2->survey_id = $vbl3->id;
                $vbl2->user_id = $request->user_id;
                $vbl2->question_id = $que_id;
                $que_id++;
                $vbl2->m_c_q_s_id = $request->answers[$i];
                $vbl2->save();
            }
            $str['status']=true;
            $str['message']="NEW SURVEY SUBMITTED";
            return $str;
        }
    }
}
