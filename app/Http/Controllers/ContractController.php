<?php

namespace App\Http\Controllers;

use App\Contract;
use App\Texnolog;
use App\ContractPrice;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use PDF;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contracts = Contract::where('status', '!=', 0)->latest()->paginate(10);
//        if (\Auth::user()->cannot(''))
        return view('backend.Contracts.index', [
            'contracts' => $contracts,
            'is_active' => 'contracts'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->session()->remove('contract');
        
        $contract_number = Contract::orderBy('id', 'DESC')->first();

        if($contract_number == null){
            $contract_number = 1;
        }else{
            $contract_number = $contract_number->contract_id+=1;
        }
        return view('backend.Contracts.create', [
            'is_active' => 'contracts',
            'contract_number' => $contract_number
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'contract_id' => 'required|unique:contracts',
            'address' => 'required',
            'director' => 'required',
            'contract_start' => 'required',
            'contract_expiration' => 'required',
            'bank' => 'required',
            'rs' => 'required',
            'mfo' => 'required',
            'inn' => 'required|numeric',
            'phone' => 'required',
            'oked' => 'required',
        ]);

        $contract_start = Carbon::parse($request->contract_start);
        $contract_expiration = Carbon::parse($request->contract_expiration);

        $contract = Contract::create([
            'company_name' => $request->company_name,
            'user_id' => \Auth::id(),
            'contract_id' => (integer)$request->contract_id,
            'contract_period' => $request->contract_period . ' ' . $request->contract_period_date,
            'contract_start' => $contract_start,
            'contract_expiration' => $contract_expiration,
            'address' => $request->address,
            'director' => $request->director,
            'bank' => $request->bank,
            'rs' => $request->rs,
            'mfo' => $request->mfo,
            'inn' => $request->inn,
            'phone' => $request->phone,
            'oked' => $request->oked,
            'nds' => $request->nds,
            'email' => $request->email,
            'status' => 1
        ]);

        $request->session()->put(['contract' => $contract]);

        toastr()->success('Contract has been saved successfully!');
        
        return redirect()->route('contract.price');
    }
    
    public function contractPrice(Request $request)
    {
        $contractSession = $request->session()->get('contract');
        $prices = Texnolog::all();
        return view('backend.Contracts.contract-price', [
            'is_active' => 'contracts',
            'prices' => $prices,
            'contractSession' => $contractSession
        ]);
    }
    public function makeContract(Request $request)
    {
        $data = $request->all();
        $inputLengs = $data['id'];
        $from_city_id = $data['from_city_id'];
        $from_district_id = $data['from_district_id'];
        $to_city_id = $data['to_city_id'];
        $to_district_id = $data['to_district_id'];
        $weight = $data['weight'];
        $with_courier_from_home_price = $data['with_courier_from_home_price'];
        $with_courier_to_home_price = $data['with_courier_to_home_price'];
        $delivery_time = $data['delivery_time'];
        $service_price = $data['service_price'];
        $contract_id = $data['contract_id'];

        $sessionContract = $request->session()->get('contract');
        $contract = ContractPrice::where('contract_id', $sessionContract->contract_id)->first();
        if ($contract == null){
            foreach($inputLengs as $key => $value){
                ContractPrice::create([
                    'from_city_id' => $from_city_id[$key],
                    'from_district_id' => $from_district_id[$key],
                    'to_city_id' => $to_city_id[$key],
                    'to_district_id' => $to_district_id[$key],
                    'weight' => $weight[$key],
                    'with_courier_from_home_price' => $with_courier_from_home_price[$key],
                    'with_courier_to_home_price' => $with_courier_to_home_price[$key],
                    'delivery_time' => $delivery_time[$key],
                    'service_price' => $service_price[$key],
                    'contract_id' => $contract_id[$key]
                ]);
            }
        }else{
            return redirect()->back()->with('error', 'Kechirasiz shartnoma allaqchon qabul qilib bo\'ingan');
        }
        $contract_prices = ContractPrice::where('contract_id', $sessionContract->contract_id)->get();
        $pdf = PDF::loadView('backend.Contracts.ready-contract', ['contract_prices' => $contract_prices, 'contract' => $sessionContract])->setPaper('a4', 'portrait');
        return $pdf->stream('contract.pdf');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {
        $contract_prices = ContractPrice::where('contract_id', $contract->contract_id)->get();
        $pdf = PDF::loadView('backend.Contracts.ready-contract', ['contract_prices' => $contract_prices, 'contract' => $contract])->setPaper('a4', 'portrait');
        return $pdf->download('contract.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Contract $contract)
    {
        return view('backend.Contracts.edit', [
            'is_active' => 'contracts',
            'contract' => $contract,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'company_name' => 'required',
            'contract_id' => 'required',
            'address' => 'required',
            'director' => 'required',
            'contract_start' => 'required',
            'contract_expiration' => 'required',
            'bank' => 'required',
            'rs' => 'required',
            'mfo' => 'required',
            'inn' => 'required|numeric',
            'phone' => 'required',
            'oked' => 'required',
            'email' => 'email',
        ]);

        $contract_start = Carbon::parse($request->contract_start);
        $contract_expiration = Carbon::parse($request->contract_expiration);

        $contract = $contract->update([
            'company_name' => $request->company_name,
            'user_id' => \Auth::id(),
            'contract_id' => (integer)$request->contract_id,
            'contract_period' => $request->contract_period . ' ' . $request->contract_period_date,
            'contract_start' => $contract_start,
            'contract_expiration' => $contract_expiration,
            'address' => $request->address,
            'director' => $request->director,
            'bank' => $request->bank,
            'rs' => $request->rs,
            'mfo' => $request->mfo,
            'inn' => $request->inn,
            'phone' => $request->phone,
            'oked' => $request->oked,
            'nds' => $request->nds,
            'email' => $request->email,
            'status' => 1
        ]);

        toastr()->success('Contract has been saved successfully!');
        return redirect()->route('contract.price-edit', ['contract' => $contract]);
    }
    public function contractPriceEdit(Contract $contract)
    {
        $prices = ContractPrice::where('contract_id', $contract->contract_id)->get();

        return view('backend.Contracts.contract-price-edit', [
            'is_active' => 'contracts',
            'prices' => $prices,
        ]);
    }
    public function contractPriceUpdate(Request $request, $id)
    {
        $contractPrice = ContractPrice::find($id);
        $contractPrice->update([
            'service_price' => $request->service_price,
            'with_courier_from_home_price' => $request->with_courier_from_home_price,
            'with_courier_to_home_price' => $request->with_courier_to_home_price
        ]);

        return redirect()->back()->with('success', 'Tabriklaymiz siz shartnoma narxlarini muvofaqqiyatli yangiladingiz');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contract  $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $contract->status = 0;
        $contract->save();
        return redirect()->back()->with('error', 'Контракт был успешно удален');
    }
    public function contractStatus(Request $request, Contract $contract)
    {
        $contract->status = $request->status;
        $contract->save();
        return redirect()->back()->with('success', 'Контракт было успешно обновлен');
    }
}
