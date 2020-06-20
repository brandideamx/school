<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use Validator;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return [ 
            'success' => true, 
            'data' => Student::paginate(10)
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = $request->all();
        $rules = array();
        $messages = [
            'required' => __('The field is required'),
            'email' => __('The field must be an email'),
            'digits' => __('Invalid format'),
            'date' => __('The field is not a valid date'),
            'date_format' => __('The field is not a valid date')
        ];

        foreach($fields as $key => $field) {

            if($field['required'] && $field['visible']) {
                //validacion para telefonos
                if($field['rules']=='phone') {
                    $rules[$key] = array('required', 'regex:(\(([0-9]{3})\)\-[0-9]{3}\-[0-9]{4})');
                }
                else {
                    $rules[$key] = $field['rules'];
                }
            }
        }
        $validator = Validator::make($this->prepareToValidate($fields), $rules, $messages);
        if($validator->fails()) {
            return [
                'success' => false,
                'message' => 'Tienes algunos errores',
                'errors' => $validator->errors()
            ];
        }
        else {
            Student::create([
                'properties' => $this->prepareToSave($fields)
            ]);
            return [
                'success' => true,
                'message' => 'Estudiante creado exitosamente'
            ];
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::whereId($id)->first();
        if($student) {
            $fields = $request->all();
            $rules = array();
            $messages = [
                'required' => __('The field is required'),
                'email' => __('The field must be an email'),
                'digits' => __('Invalid format'),
                'date' => __('The field is not a valid date'),
                'date_format' => __('The field is not a valid date')
            ];

            foreach($fields as $key => $field) {

                if($field['required'] && $field['visible']) {
                    //validacion para telefonos
                    if($field['rules']=='phone') {
                        $rules[$key] = array('required', 'regex:(\(([0-9]{3})\)\-[0-9]{3}\-[0-9]{4})');
                    }
                    else {
                        $rules[$key] = $field['rules'];
                    }
                }
            }
            $validator = Validator::make($this->prepareToValidate($fields), $rules, $messages);
            if($validator->fails()) {
                return [
                    'success' => false,
                    'message' => 'Tienes algunos errores',
                    'errors' => $validator->errors()
                ];
            }
            else {
                $student->update([
                    'properties' => $this->prepareToSave($fields)
                ]);
                return [
                    'success' => true,
                    'message' => 'Estudiante actualizado exitosamente'
                ];
            }

        } else {
            return [
                'success' => false,
                'message' => 'Estudiante no encontrado'
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function prepareToValidate($fields){
        $data = [];
        foreach($fields as $key => $field) {
            if($field['required'] && $field['visible']){
                $data[$key] = $field['value'];
            }
        }
        return $data;
    }

    private function prepareToSave($fields) {
        $data = [];
        foreach($fields as $key => $field){
            $data[$key] = $field['value'];
        }
        return json_encode($data);
    }

    public function search(Request $request) {
        $filters = $request->filters;
        $query = '';
        foreach($filters as $index => $filter) {
            if($index == 0) {
                $query = $query.'lower(json_unquote(json_extract(properties, \'$."'.$filter.'"\'))) like lower("%'.$request->words.'%") ';
            } else {
                $query = $query.'OR lower(json_unquote(json_extract(properties, \'$."'.$filter.'"\'))) like lower("%'.$request->words.'%") ';
            }
        }

        // Query Builder, para poder paginar
        $data = \DB::table('students')
                    ->whereRaw($query)
                    ->paginate(10);

        return [ 
            'success' => true, 
            'data' => $data
        ];
    }
}
