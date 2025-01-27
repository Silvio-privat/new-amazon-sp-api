
<x-app-layout>
    <x-slot name="header">
        <h5 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Information') }}
        </h5>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">User Information</h5>
                        <h5 class="mb-0">Allgemeine Informationen</h5>
                        <a href="{{ route('admin/products/create') }}" class="btn btn-primary">Add User</a>
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
                                <th>Full Name</th>
                                <th>E-mail</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>PostBox</th>
                                <th>Office Address</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td class="align-middle">{{ $loop->iteration }}</td>
                                <td class="align-middle">{{ $product->name }}</td>
                                <td class="align-middle">{{ $product->email }}</td>
                                <td class="align-middle">{{ $product->address }}</td>

                                <td class="align-middle">{{ $product->city }}</td>

                                <td class="align-middle">{{ $product->postbox }}</td>

                                <td class="align-middle">{{ $product->officeaddress }}</td>

                                <td class="align-middle">{{ $product->phone }}</td>

                                <td class="align-middle">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin/products/edit', ['id'=>$product->id]) }}" type="button" class="btn btn-secondary">Edit</a>
                                        <a href="{{ route('admin/products/delete', ['id'=>$product->id]) }}" type="button" class="btn btn-danger">Delete</a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="text-center" colspan="5">Product not found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>





