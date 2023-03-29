<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Subjects;

class SubjectsController extends BaseController
{
    public function index()
    {
        //
        $subjects = new Subjects();

        // fetch all records 
        $data['subjects'] = $subjects->findAll();
        return view('subjects/index', $data);
    }

    public function create()
    {
        return view('subjects/create');
    }

    public function store()
    {
        $request = service('request');
        $postData = $request->getPost();
        if (isset($postData['submit'])) {
            #validation
            // helper(['form', 'url']);
            // $subjects = new Subjects();

            $input = $this->validate([
                'name' => 'required|min_length[3]',
                'description' => 'required'
            ]);

            if (!$input) {
                // $validation = \Config\Services::validation();
                // $sp= $validation->getError('name');
                // echo $sp;
                // die();
                // return redirect()->route('subjects/create')->withinput()->with('validation', $this->validator);
                // return redirect()->route('subjects/create',['validation' =>$this->validator]);
                return view('subjects/create',['validation' =>$this->validator]);
            } else {
                $subjects = new Subjects();
                $data = [
                    'name' => $postData['name'],
                    'description' => $postData['description']
                ];
                #insert Record
                //  $subjects->insert($data);
                if ($subjects->insert($data)) {
                    session()->setFlashdata('message', 'Added Successfully!');
                    session()->setFlashdata('alert-class', 'alert-success ');
                    return redirect()->route('subjects/create');
                } else {
                    session()->setFlashdata('message', 'Data not saved!');
                    session()->setFlashdata('alert-class', 'alert-danger');
                    return redirect()->route('subjects/create')->withInput();
                }
            }
        }
    }


    public function edit($id = 0)
    {
        #select record by id
        // echo "$id";
        // die();
        $subjects = new Subjects();
        $subject = $subjects->find($id);

        $data['subject'] = $subject;
        return view('subjects/edit', $data);
    }


    // update 
    public function update($id = 0)
    {
        
        $request = service('request');
        $postData = $request->getPost();
        if (isset($postData['submit'])) {
            $validation = \Config\Services::validation();
       
            // validation_list_errors();
            
            ## Validation
            $input = $this->validate([
                'name' => 'required|min_length[3]',
                'description' => 'required'
            ]);

            if (!$input) {
                // $sp =$validation->getError('name');
                // echo $sp;
                // die();

                return redirect()->route('subjects/edit/'.$id)->withInput()->with('validation',$this->validator); 
                // return view('subjects/edit'.$id,['validation' =>$this->validator]);
             } else{
                $subjects = new Subjects();
                $data = [
                    'name' => $postData['name'],
                    'description' => $postData['description']
                 ];
                    ## update record
                    if($subjects->update($id,$data)){
                        session()->setFlashdata('message', 'Updated Successfully!');
                        session()->setFlashdata('alert-class', 'alert-success');
                        return redirect()->route('/'); 
                    }else{
                        session()->setFlashdata('message', 'Data not saved!');
                        session()->setFlashdata('alert-class', 'alert-danger');
                        return redirect()->route('subjects/edit/'.$id)->withInput(); 
                    }
             }
        }
    }


    // delete

    public function delete($id=0){
        $subjects = new Subjects();
         ## Check record
      if($subjects->find($id)){
         ## Delete record
         $subjects->delete($id);

         session()->setFlashdata('message', 'Deleted Successfully!');
         session()->setFlashdata('alert-class', 'alert-success');
      }else{
        session()->setFlashdata('message', 'Record not found!');
        session()->setFlashdata('alert-class', 'alert-danger');
     }
     return redirect()->route('/');
    }
}
?>
