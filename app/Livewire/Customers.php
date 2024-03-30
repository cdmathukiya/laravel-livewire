<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Customer;


class Customers extends Component
{
    public $customers,$name, $address, $mobile, $city,$customer_id;
    public $updateMode = false, $addMode = false;

    public function render()
    {
        $this->customers = Customer::all();
        return view('livewire.customers');
    }
    private function resetInputFields(){
        $this->name = '';
        $this->address = '';
        $this->mobile = '';
        $this->city = '';
    }
    public function addMode()
    {
        $this->resetInputFields();
        $this->addMode = true;
        $this->updateMode = false;
    }
    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'mobile' => 'required',
        ]);

        Customer::create($validatedDate);

        session()->flash('message', 'Customer Created Successfully.');

        $this->resetInputFields();
        $this->addMode = false;
    }
    public function edit($id)
    {
        $customer = Customer::findOrFail($id);
        $this->customer_id = $id;
        $this->name = $customer->name;
        $this->address = $customer->address;
        $this->city = $customer->city;
        $this->mobile = $customer->mobile;

        $this->updateMode = true;
        $this->addMode = false;
    }
    public function cancel()
    {
        $this->addMode = false;
        $this->updateMode = false;
        $this->resetInputFields();
    }
    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'address' => 'required',
            'city' => 'required',
            'mobile' => 'required',
        ]);

        $customer = Customer::find($this->customer_id);
        $customer->update([
            'name' => $this->name,
            'address' => $this->address,
            'city' => $this->city,
            'mobile' => $this->mobile,
        ]);

        $this->updateMode = false;

        session()->flash('message', 'Customer Updated Successfully.');
        $this->resetInputFields();
    }
    public function deleteCustomer($id)
    {
        Customer::find($id)->delete();
        session()->flash('message', 'Customer Deleted Successfully.');
    }

}
