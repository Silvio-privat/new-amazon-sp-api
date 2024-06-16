<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::orderBy('id', 'desc')->get();
        $total = Invoice::count();
        return view('admin.invoice.invoicehome', compact(['invoices', 'total']));
    }

    public function create()
    {
        return view('admin.invoice.create');
    }

    public function save(Request $request)
    {
        $validation = $request->validate([
            'datum' => 'required',
            'rechnungsnummer' => 'required',
            'betrag' => 'required',
            'status' => 'required',
        ]);
        $data = Invoice::create($validation);
        if ($data) {
            session()->flash('success', 'Invoice Add Successfully');
            return redirect(route('admin/invoices'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin.invoices/create'));
        }
    }
    public function edit($id)
    {
        $invoices = Invoice::findOrFail($id);
        return view('admin.invoice.update', compact('invoices'));
    }

    public function delete($id)
    {
        $invoices = Invoice::findOrFail($id)->delete();
        if ($invoices) {
            session()->flash('success', 'Invoice Deleted Successfully');
            return redirect(route('admin/invoices/'));
        } else {
            session()->flash('error', 'Invoice Not Delete successfully');
            return redirect(route('admin/invoices/'));
        }
    }

    public function update(Request $request, $id)
    {
        $invoices = Invoice::findOrFail($id);
        $datum = $request->datum;
        $rechnungsnummer = $request->rechungsnummer;
        $betrag = $request->betrag;
        $status = $request->status;



        $invoices->datum = $datum;
        $invoices->rechnungsnummer = $rechnungsnummer;
        $invoices->betrag = $betrag;
        $invoices->status = $status;
        $data = $invoices->save();
        if ($data) {
            session()->flash('success', 'Invoice Update Successfully');
            return redirect(route('admin/invoices'));
        } else {
            session()->flash('error', 'Some problem occure');
            return redirect(route('admin/invoices/update'));
        }
    }
}



