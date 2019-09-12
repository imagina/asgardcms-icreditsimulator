<?php

namespace Modules\Icreditsimulator\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Icreditsimulator\Entities\ClientCredit;
use Modules\Icreditsimulator\Http\Requests\CreateClientCreditRequest;
use Modules\Icreditsimulator\Http\Requests\UpdateClientCreditRequest;
use Modules\Icreditsimulator\Repositories\ClientCreditRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Iprofile\Repositories\UserApiRepository;
class ClientCreditController extends AdminBaseController
{
    /**
     * @var ClientCreditRepository
     */
    private $clientcredit;
    private $user;

    public function __construct(ClientCreditRepository $clientcredit,UserApiRepository $user)
    {
        parent::__construct();
        $this->user = $user;

        $this->clientcredit = $clientcredit;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clientcredits = $this->clientcredit->all();

        return view('icreditsimulator::admin.clientcredits.index', compact('clientcredits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('icreditsimulator::admin.clientcredits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateClientCreditRequest $request
     * @return Response
     */
    public function store(CreateClientCreditRequest $request)
    {
        $this->clientcredit->create($request->all());

        return redirect()->route('admin.icreditsimulator.clientcredit.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('icreditsimulator::clientcredits.title.clientcredits')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ClientCredit $clientcredit
     * @return Response
     */
    public function edit(ClientCredit $clientcredit)
    {
        $params=(object)[
          "include"=>["fields"],
          "params"=>[],
          "filter"=>[]
        ];
        $user = $this->user->getItem($clientcredit->client_id, $params);
        foreach($user->fields as $field)
          $user[$field->name]=$field->value;
        return view('icreditsimulator::admin.clientcredits.edit', compact('clientcredit','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ClientCredit $clientcredit
     * @param  UpdateClientCreditRequest $request
     * @return Response
     */
    public function update(ClientCredit $clientcredit, UpdateClientCreditRequest $request)
    {
        $this->clientcredit->update($clientcredit, $request->all());

        return redirect()->route('admin.icreditsimulator.clientcredit.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('icreditsimulator::clientcredits.title.clientcredits')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ClientCredit $clientcredit
     * @return Response
     */
    public function destroy(ClientCredit $clientcredit)
    {
        $this->clientcredit->destroy($clientcredit);

        return redirect()->route('admin.icreditsimulator.clientcredit.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('icreditsimulator::clientcredits.title.clientcredits')]));
    }
}
