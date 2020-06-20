<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Validator;

class SettingsController extends Controller
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
            'data' => Setting::all()
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
        $validator = $this->validateFields($request->all(), 'store');
        if($validator->passes()) {
            Setting::create($request->all());
            return response()->json([
                'success' => true,
                'message' => 'Ajuste guardado exitosamente'
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Tienes algunos errores',
                'errors' => $validator->errors()
            ]);
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
        $setting = Setting::whereId($id)->first();

        if($setting) {
            return [
                'success' => true,
                'data' => $setting
            ];
        }

        return [
            'success' => false,
            'message' => 'Parametro no encontrado'
        ];
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
        $setting = Setting::whereId($id)->first();

        if($setting) {
            $validator = $this->validateFields($request->all(), 'update');
            if($validator->passes()) {
                $setting->update($request->all());
                return response()->json([
                    'success' => true,
                    'message' => 'Ajuste actualizado exitosamente'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Tienes algunos errores',
                    'errors' => $validator->errors()
                ]);
            }


            return [
                'success' => true,
                'data' => $setting
            ];
        }

        return [
            'success' => false,
            'message' => 'Parametro no encontrado'
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::whereId($id)->first();

        if($setting) {
            $setting->delete();
            return [
                'success' => true,
                'message' => 'Ajuste eliminado exitosamente'
            ];
        }

        return [
            'success' => false,
            'message' => 'Parametro no encontrado'
        ];
    }

    public function getSetting($name) {
        $setting = Setting::whereName($name)->first();

        if($setting) {
            return [
                'success' => true,
                'data' => $setting
            ];
        }

        return [
            'success' => false,
            'message' => 'Parametro no encontrado'
        ];
    }

    private function validateFields($fields, $action = 'store') {
        $nameRules = '';
        switch($action) {
            case 'store':
                $nameRules = 'required|unique:settings';
            break;
            case 'update':
                $nameRules = 'required'; 
            break;
        }
        $rules = [
            'name' => $nameRules,
            'description' => 'required',
            'value' => 'required'
        ];

        $messages = [
            'name.required' => 'El nombre es requerido',
            'name.unique' => 'Este nombre ya existe, por favor elige otro',
            'description.required' => 'La descripción es requerida',
            'value.required' => 'El valor es requerido' 
        ];

        $validator = Validator::make($fields, $rules, $messages);

        return $validator;
    }
}
