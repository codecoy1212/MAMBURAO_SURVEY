<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Database_Name;
use App\Models\MCQ;
use App\Models\Question;
use App\Models\Survey;
use App\Models\User;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function add_cat(Request $request)
    {
        // return $request;

        $vbl = new Category;
        $vbl->cat_name = $request->cat_name;
        $vbl->cat_color = $request->cat_color;
        $vbl->save();
    }

    public function add_mcq(Request $request)
    {
        // return $request;

        $vbl = new MCQ;
        $vbl->mcq = $request->mcq_name;
        $vbl->category_id = $request->mcq_cat;
        $vbl->save();
    }

    public function add_db(Request $request)
    {
        // return $request;

        $vbl = new Database_Name;
        $vbl->db_name = $request->db_name;
        $vbl->category_id = $request->db_cat;
        $vbl->save();
    }

    public function add_user(Request $request)
    {
        // return $request;

        $vbl = new User;
        $vbl->pass_word = $request->user_pass;
        $vbl->table_name = $request->user_table;
        $vbl->database__name_id = $request->db_id;
        $vbl->save();

        // $j = 1;
        // for ($i=1; $i <= 155; $i++) {
        //     $vbl = new User;
        //     $vbl->pass_word = "EPassword".$j; $j++;
        //     $vbl->table_name = "E-000";
        //     $vbl->database__name_id = "3";
        //     $vbl->save();
        // }
    }

    public function add_sur(Request $request)
    {
        // return $request;

        $vbl = new Survey;
        $vbl->survey_no = $request->sur_no;
        $vbl->save();
    }

    public function add_ans(Request $request)
    {
        // return $request;

        $vbl = new Answer;
        $vbl->survey_id = $request->survey_no;
        $vbl->user_id = $request->user_no;
        $vbl->question_id = $request->question_no;
        $vbl->m_c_q_s_id = $request->mcq_no;
        $vbl->save();
    }
}

