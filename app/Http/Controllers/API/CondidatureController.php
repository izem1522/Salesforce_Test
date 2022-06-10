<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CondidatureController extends SalesforceService
{

    public function Authentication()
    {
        $response = $this->callAuthService();
        return response()->json($response);
    }

    public function GetCandidateCById( $request)
    {
        $response = $this->callGetCandidatesById((gettype($request) =='string')? $request : $request->input('id'));
        return response()->json($response);
    }

    public function GetCandidateDetails()
    {
        $candidate = $this->GetCandidateCById('a004L000002gCJK');
        $candidate = $candidate->getData();
        $details = array("first Name" =>$candidate->First_Name__c, "Last Name" => $candidate->Last_Name__c, "Year" => $candidate->Year__c, "Years of experience" => $candidate->Year_Of_Experience__c);
        return response()->json($details);
    }

    public function GetAllCandidate()
    {
        $allCandidate = $this->callAllCandidate();
        return response()->json($allCandidate);
    }

    public function CreateCandidate(Request $request)
    {
        $response = $this->callCreateCandidate(array("Name" => $request->input('Name')));
        return response()->json($response);
    }

    public function ModifyCandidateLastName(Request $request)
    {
        //TODO make a try catch block
        $this->callUpdateCandidate($request->input('candidate_id'), array("Last_Name__c" => $request->input('new_last_name')));
        return response()->json(array("success" => true));
    }

}
