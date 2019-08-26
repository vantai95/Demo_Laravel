<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Services\CommonService;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            'title' => __('admin.contacts.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/contacts'),
                    'text' => __('admin.contacts.breadcrumbs.title')
                ]
            ]
        ];
        $keyword = $request->get('q');
        $perPage = config('constants.PAGE_SIZE');
        $contacts =  Contact::select('contacts.*')->orderBy('created_at', 'desc');
        if (!empty($keyword)) {
            $keyword = CommonService::correctSearchKeyword($keyword);
            $contact = $contacts->where(function ($query) use ($keyword) {
                $query->orWhere('contacts.name', 'LIKE', $keyword);
                $query->orWhere('email', 'LIKE', $keyword);
                $query->orWhere('phone', 'LIKE', $keyword);
            });
        }
        $contacts = $contacts->paginate($perPage);
        return view('admin.contacts.index', compact('breadcrumbs','contacts'));
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
        //
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
            'title' => __('admin.contacts.breadcrumbs.title'),
            'links' => [
                [
                    'href' => url('admin/contacts'),
                    'text' => __('admin.contacts.breadcrumbs.title')
                ]
            ]
        ];
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.show', compact('breadcrumbs','contact'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id)->delete();
        return redirect('/admin/contacts');
    }
}
