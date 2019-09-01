<?php

namespace App\Http\Controllers\Crm;

use App\Http\Requests\StoreAmoApi;
use App\Services\AmoCRM\Api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CrmController extends Controller
{


    protected $amo;

    public function __construct(Api $amo)
    {
        $this->amo = $amo;
    }

    /**
     * Показать форму для создания новой заявки в сайте.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     * @throws \Exception
     */
    public function create() {

        /*$contact = $this->amo->instance->contacts()->create();
        $contact->name = 'Jone Doe';
        $contact->cf('Email')->setValue('jonedoe@mail.com');
        $contact->cf('Телефон')->setValue('998905764491');
        $contact->cf('Должность')->setValue('teacher');

        $company = $contact->createCompany();
        $company->name = 'Company1';
        $company->save();

        $contact->save();



        dd($contact);*/


        return view('crm.lead-create');
    }

    /**
     * Хранить новую заявку в сайте.
     *
     * @param $request StoreAmoApi
     * @return \Illuminate\Contracts\Support\Renderable
     * @throws \Exception
     */
    public function store(StoreAmoApi $request) {


        $contact = $this->amo->instance->contacts()->create();
        $contact->name = $request->post('name');
        $contact->cf('Email')->setValue($request->post('email'));
        $contact->cf('Телефон')->setValue($request->post('phone'));
        $contact->cf('Должность')->setValue($request->post('position'));

        $company = $contact->createCompany();
        $company->name = $request->post('company');
        $company->save();

        $contact->save();



//        dd($contact);

        $request->session()->flash('status', 'Task was successful!');

        return view('crm.lead-create');
    }
}
