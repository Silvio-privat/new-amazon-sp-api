
<x-app-layout>
    <x-slot name="header">
        <h5 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Rechung & Zahlung informationen') }}
        </h5>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">Rechung & Zahlung informationen</h5>
                        <a href="{{ route('admin/invoices/create') }}" class="btn btn-primary">Add Rechung</a>
                    </div>
                    <hr />
                    @if(Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                    @endif
                    <table class="table table-hover">
                        <thead class="table-primary">
                            <tr>
                                <th>#</th>
                                <th>Datum</th>
                                <th>Rechnungsnummer</th>
                                <th>Betrag</th>
                                <th>Status</th>
                                <th>Download</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($invoices as $invoice)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $invoice->datum }}</td>
                                <td class="align-middle">{{ $invoice->rechnungsnummer }}</td>
                                <td class="align-middle">{{ $invoice->betrag }}</td>

                                <td class="align-middle">{{ $invoice->status }}</td>

                                <td class="align-middle">{{ $invoice->download }}</td>
                                <td class="align-middle mr-8">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin/invoices/edit', ['id'=>$invoice->id]) }}" type="button" class="btn btn-secondary ">Herunterladen</a>
                                        {{--
                                        <a href="{{ route('admin/invoices/delete', ['id'=>$invoice->id]) }}" type="button" class="btn btn-danger">Herunterladen</a>--}}
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Invoice not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>





