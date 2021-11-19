<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Pagination\Paginator;

class ContactController extends Controller
{
    public function add()
    {
        return view('index');
    }

    public function create(ContactRequest $request)
    {
        $form = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcord' => $request->postcord,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ];

        if($request->gender==1){
                $sex = [ 'sex' => '男性'];
            }else{
                $sex = ['sex' => '女性'];
            }

        return view('confirm', compact('form', 'sex'));
    }

    public function register(Request $request)
    {
        $fullname = $request->firstName.$request->lastName;

        $form = [
            'fullname' => $fullname,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcord' => $request->postcord,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ];

        Contact::create($form);
        return view('thanks');
    }

    public function revise(Request $request)
    {
        $form = [
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'gender' => $request->gender,
            'email' => $request->email,
            'postcord' => $request->postcord,
            'address' => $request->address,
            'building_name' => $request->building_name,
            'opinion' => $request->opinion,
        ];

        return view('index', $form);
    }

    public function control()
    {//チェック用
        return view('control');
    }

    public function select(Request $request)
    {
        $query = Contact::query();
        $fullname = $request->input('fullname');
        $gender = $request->input('gender');
        $email = $request->input('email');
        $from = $request->input('from');
        $until = $request->input('until');

        if($request->has('fullname') && $fullname != ''){
            $query->where('fullname', $fullname)->get();
        } else {
            $query->whereNotNull('fullname')->get();
        }

        if($request->has('gender') && $gender != ''){
            $query->where('gender', $gender)->get();
        } else {
            $query->whereNotNull('gender')->get();
        }

        if(!empty($request->from) && !empty($request->until)){
            $query->whereBetween('created_at', [$from, $until])->get();
        } else {
            $query->whereNotNull('created_at')->get();
        }

        if ($request->has('email') && $email != '') {
            $query->where('email', $email)->get();
        } else {
            $query->whereNotNull('email')->get();
        }

        
        $items = $query->paginate(10)->withQueryString();

        return view('control', ['items' => $items]);
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('control');
    }

}

