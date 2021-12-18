<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use Illuminate\Support\Carbon;
use Validator;

class JobController extends Controller
{
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|string',
            'description' => 'required|string',
            'location' => 'required|string',
            'company' => 'required|integer',
        ]);
    }

    public function save(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return response('nok', 400);
        } else {
            $job = new Job();
            $job->title = $request->title;
            $job->description = $request->description;
            $job->location = $request->location;
            $job->company_id = $request->company;

            if (!$job->save()) {
                return response('nok', 500);
            } else {
                return response('ok', 200);
            }
        }
    }

    public function index()
    {
        // Returns the jobs which were published within last week
        $last_7_days = Job::where('published_at', '>=', Carbon::now()->subDays(7))->get();

        return view('index')->with([
            'jobs' => $last_7_days
        ]);

        // Returns all the jobs
        // return view('index', ['jobs' => Job::all()->toArray()]);
    }
}
