<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SurveysForm;
use App\Models\DynamicForm;
use App\Events\SurveysFormSubmitEvent;
use Event;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class DynamicFormController extends Controller
{
    public function df_submit(Request $request)
    {
        try {
            if(Auth::check()){
                $surveyForm = new SurveysForm();
                $surveyForm->form_fields = json_encode($request->all());
                $result = $surveyForm->save();
            }

            if($result){

                $receiver_name = $request->name;
                $receiver_email = $request->email;

                // Mail::to($receiver_email)->send(new SurveysFormSubmitMailer($receiver_name, $receiver_email));

                Event::dispatch(new SurveysFormSubmitEvent($receiver_name, $receiver_email));

                return redirect()->back()->with('success', 'Form Submit Successfully.');
            }else{
                return redirect()->back()->with('error', 'Error While Form Submitting.');
            }

        } catch (\Exception $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'status' => 500
            ])
            ->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR, Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
        }
    }

    public function df_update(Request $request)
    {
        try {

            $df_form = DynamicForm::where('id', $request->id)->first();

            if($df_form->active == $request->status){
                return response()->json([
                    "msg" => "Same Status",
                    "status" => 400
                ])
                ->setStatusCode(Response::HTTP_BAD_REQUEST, Response::$statusTexts[Response::HTTP_BAD_REQUEST]);
            }

            $df_form->active = $request->status == 'true' ? 1 : 0;
            $df_form->save();

            return response()->json([
                "msg" => "Update Success",
                "status" => 200
            ])->setStatusCode(Response::HTTP_OK, Response::$statusTexts[Response::HTTP_OK]);

        } catch (\Exception $e) {
            return response()->json([
                'msg' => $e->getMessage(),
                'status' => 500
            ])
            ->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR, Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
        }
    }
}
