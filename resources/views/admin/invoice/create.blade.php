<x-app-layout>
    <x-slot name="header">
        <h5 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(' Rechung & Zahlung informationen') }}
        </h5>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h7 class="mb-0">Rechung & Zahlung informationen</h7>
                    <hr />
                    @if (session()->has('error'))
                    <div>
                        {{session('error')}}
                    </div>
                    @endif
                    <p><a href="{{ route('admin/invoices') }}" class="btn btn-primary">Go Back</a></p>

                    <form action="{{ route('admin/invoices/save') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="datum" class="form-control" placeholder="datum">
                                @error('datum')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="rechnungsnummer" class="form-control" placeholder="rechnungsnummer">
                                @error('rechnungsnummer')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="betrag" class="form-control" placeholder="betrag">
                                @error('betrag')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-3">
                            <div class="col">
                                <input type="text" name="status" class="form-control" placeholder="status">
                                @error('status')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-grid">
                                <button class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __(' Hello This is Admin Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-900">
                    <h1 class="mb-0">Add Product</h1>
                    <hr />
                     Create A Form
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}
