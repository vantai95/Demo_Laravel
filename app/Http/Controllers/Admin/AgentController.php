<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use Session, File;
use App\Services\CommonService;

class AgentController  extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            'title' => __('admin.agents.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/agents'),
                    'text' => __('admin.agents.breadcrumbs.title')
                ]
            ]
        ];
        $keyword = $request->get('q');
        $perPage = config('constants.PAGE_SIZE');
        $agents =  Agent::select('agents.*')->orderBy('created_at', 'desc');
        if (!empty($keyword)) {
            $keyword = CommonService::correctSearchKeyword($keyword);
            $agent = $agents->where(function ($query) use ($keyword) {
                $query->orWhere('address_en', 'LIKE', $keyword);
                $query->orWhere('email', 'LIKE', $keyword);
                $query->orWhere('created_at', 'LIKE', $keyword);
                $query->orWhere('address_vi', 'LIKE', $keyword);
                $query->orWhere('phone', 'LIKE', $keyword);
            });
        }
        $agents = $agents->paginate($perPage);
        return view('admin.agents.index', compact('breadcrumbs','agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $breadcrumbs = [
            'title' => __('admin.agents.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/agents'),
                    'text' => __('admin.agents.breadcrumbs.title')
                ]
            ]
        ];
        return view('admin.agents.create', compact('breadcrumbs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name_vi' =>'required',
            'name_en' => 'required',
            'address_en' => 'required',
            'address_vi' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'iframe' => 'required',
        ]);
        $requestData = $request->all();
        $requestData['is_contact'] = 0;
        Agent::create($requestData);
        Session::flash('flash_message', __('admin.agents.flash_messages.create'));
        return redirect('admin/agents');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $breadcrumbs = [
            'title' => __('admin.agents.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/agents'),
                    'text' => __('admin.agents.breadcrumbs.title')
                ]
            ]
        ];
        $agent = Agent::findOrFail($id);
        return view('admin.agents.show', compact('breadcrumbs','agent'));
    }

    public function getContact($id)
    {
        $agents =  Agent::where('is_contact', 1)->update(['is_contact' => 0]);  
        $agents =  Agent::where('id', $id)->update(['is_contact' => 1]); 
        Session::flash('flash_message', __('admin.agents.flash_messages.success'));
        return redirect('admin/agents');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $breadcrumbs = [
            'title' => __('admin.agents.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/agents'),
                    'text' => __('admin.agents.breadcrumbs.title')
                ]
            ]
        ];
        $agent = Agent::findOrFail($id);
        return view('admin.agents.edit', compact('breadcrumbs','agent'));
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
        $requestData = $request->all();
        // dd($requestData);
        $Agent = Agent::findOrfail($id);
        $Agent->update($requestData);
        Session::flash('flash_message', __('admin.agents.flash_messages.update'));
        return redirect('/admin/agents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agent = Agent::findOrFail($id)->delete();
        Session::flash('flash_message', __('admin.agents.flash_messages.delete'));
        return redirect('/admin/agents');
    }
}
