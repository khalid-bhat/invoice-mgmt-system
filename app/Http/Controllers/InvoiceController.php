<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use PDF;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Mail;
use App\Models\InvoiceItem;

class InvoiceController extends Controller
{


    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'date' => 'required|date_format:Y-m-d',
            'address' => 'required',
            'number'=>'required|unique:invoices,number',
            'description' => 'required|array',
            'description' => 'required',
            'amount' => 'required|array',
            'amount.*' => 'required|numeric',
        ]);

        $invoice = Invoice::create([
            'number' => $request->number,
            'address' => $request->address,
            'date' => date($request->date)
        ]);

        $items = $request->input('description');
        for ($i = 0; $i < count($items); $i++) {
            InvoiceItem::create([
                'invoice_id' => $invoice->id,
                'description' => $items[$i],
                'amount' => $request->input('amount')[$i]
            ]);
        }

        return redirect()->route('show-invoices');
    }


    public function create()
    {
        return view('components/invoice-create');
    }


    public function show($id)
    {
        $invoices = Invoice::join('invoice_items', 'invoices.id', '=', 'invoice_items.invoice_id')
        ->get()->toArray();

        $pdf = PDF::loadView('invoices.pdf', compact('invoices'));
        file_put_contents('invoice-'.$invoices[0]['id'].'.pdf', $pdf->output());




        $pdfPath = $invoices[0]['id'].'.pdf';
        return view('components/invoice-display',compact('pdfPath'));
    }

    public function index()
    {
        $invoices = Invoice::latest()->get();
        return view('welcome')->with('invoices', $invoices);
    }

    public function sendEmail($id)
    {
        $invoice = Invoice::findOrFail($id);

        $pdf = PDF::loadView('invoices.pdf', compact('invoice'));


        $fullname =  $invoice->name;
        $email = "khalidbhat.work@gmail.com";
        Mail::send(array(), array(), function ($message) use ($fullname, $email,  $pdf) {
            $message->to([$email => $fullname])
                ->subject('Invoice for ' . $fullname)
                ->from('noreply@siteaddress.com', 'Invoice Mail')
                ->attachData($pdf->output(), "text.pdf");

        });

        return response()->json(['message' => 'Invoice sent successfully!']);
    }

}

