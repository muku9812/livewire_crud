<?php

namespace App\Http\Livewire;

use App\Models\Students;
use Livewire\Component;


class StudentCurd extends Component
{
    public $fname,$lname,$phone,$gender, $studentEdit , $search;
    public  $studentUpdate = false;

    public function render()
    {
//        $data['student']=Students::orderBy('id','desc')->get();
        $data['student']=Students::where('first_name','like','%'.$this->search.'%')->Orwhere('last_name','like','%'.$this->search.'%')->Orwhere('phone','like','%'.$this->search.'%')->orderBy('id','desc')->get();
        return view('livewire.student-curd',compact('data'));
    }
    public function rest(){
        $this->fname="";
        $this->lname="";
        $this->phone="";
        $this->gender="";

    }

    public function Insert(){

        $this->validate([
            'fname'=>'required',
            'lname'=>'required',
            'phone'=>'required|min:10|max:10',
            'gender'=>'required'
        ]);
        Students::create([

            'first_name'=>$this->fname,
            'last_name'=>$this->lname,
            'phone'=>$this->phone,
            'gender'=>$this->gender,
        ]);
        $this->rest();
    }

    protected $updatesQueryString=["search"];
    public function mount(){
        $this->search= request('search',$this->search);

    }


    public function Edit($id){

        $this->studentUpdate =true;

        $studentEdit=Students::findOrFail($id);

        $this->student_id=$id;
        $this->fname=$studentEdit->first_name;
        $this->lname=$studentEdit->last_name;
        $this->phone=$studentEdit->phone;
        $this->gender=$studentEdit->gender;
    }

    public function update(){

        $Updatestudent=Students::findOrFail($this->student_id);
        $this->validate([
            'fname'=>'required',
            'lname'=>'required',
            'phone'=>'required|min:10|max:10',
            'gender'=>'required'
        ]);
        $Updatestudent->update([
            'first_name'=>$this->fname,
            'last_name'=>$this->lname,
            'phone'=>$this->phone,
            'gender'=>$this->gender,
        ]);
        $this->rest();
        $this->studentUpdate =false;
    }
public  function Delete($id){
        if($id){
            $deleteStudent = Students::where('id',$id);
            $deleteStudent->delete();
        }
}
}
