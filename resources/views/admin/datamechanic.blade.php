@extends('admin.header')

@section('title', 'Admin - Mechanic')

@section('main-content')
<div class="p-4 border-1 rounded-lg mt-14 bg-secondary">
    <div class="flex justify-between">
        <div class="text-purple m-4 font-semibold text-2xl tracking-wide w-1/2">Data Mechanic</div>
        <div class="mt-10 mb-4 w-1/2">
            <form class="flex items-center" action="{{ route('admin.dataMechanic') }}" method="GET">
                @csrf   
                <label for="simple-search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                    </div>
                    <input type="text" id="search" value="{{ $keyword }}" name="search" class="bg-primary text-purple text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5" placeholder="Search" required>
                </div>
                
                <button type="submit" class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-1 focus:outline-none focus:ring-blue-300">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
            @if(isset($keyword))
                <div class="text-purple mt-2">Hasil pencarian dari: {{ $keyword }}</div>
            @endif
        </div>
    </div>
    <div class="relative overflow-x-auto shadow-md rounded-lg">
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-purple uppercase bg-table-head">
                <tr>
                    <th scope="col" class="py-4 text-center">
                        Id User
                    </th>
                    <th scope="col" class="text-center">
                        Nama
                    </th>
                    <th scope="col" class="text-center">
                        Nama Dealer
                    </th>
                    <th scope="col" class="text-center">
                        Posisi
                    </th>
                    <th scope="col" class="text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody class="text-xs md:text-base">
                @foreach ($mechanics as $mechanic)
                    <tr class="bg-primary border-b border-purple text-purple last:border-none">
                        <th scope="row" class="py-4 font-medium whitespace-nowrap dark:text-white text-center">
                            {{ $mechanic->user->id ?? ''}}
                        </th>
                        <td class="text-center">{{ $mechanic->user->name ?? '' }}</td>
                        <td class="text-center">{{ $mechanic->dealer->dealer_name ?? '' }}</td>
                        <td class="text-center">{{ $mechanic->position }}</td>
                        <td class="flex justify-evenly">
                            <form action="{{ route('admin.destroyMechanic', $mechanic->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="focus:outline-none text-primary bg-red-500 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-3 md:px-5 py-1 md:py-2.5 my-2">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-5 flex flex-col md:flex-row justify-between">
        <button id="defaultModalButton" data-modal-toggle="defaultModal" class="text-primary bg-success hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-3 md:px-5 py-2.5 mx-5 md:mx-0" type="button">
        Tambah Data
        </button>
            <div class="mt-5 md:mt-0">
                {{ $mechanics->links('admin.pagination') }}
            </div>
    </div>
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <div class="relative p-4 bg-secondary rounded-lg shadow sm:p-5">
                <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5">
                    <h3 class="text-lg font-semibold text-purple">
                        Tambah Dealer
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form action="{{ route('admin.createMechanic')}}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                        <div>
                            <label for="user_id" class="block mb-2 text-sm font-medium text-purple">Id User</label>
                            <input type="text" name="user_id" id="user_id" class="bg-primary text-purple text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div>
                            <label for="dealer_id" class="block mb-2 text-sm font-medium text-purple">Id Dealer</label>
                            <input type="text" name="dealer_id" id="dealer_id" class="bg-primary text-purple text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                        <div>
                            <label for="position" class="block mb-2 text-sm font-medium text-purple">Position</label>
                            <input type="text" name="position" id="position" class="bg-primary text-purple text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5" placeholder="" required="">
                        </div>
                    </div>
                    <button type="submit" class="text-primary inline-flex items-center bg-success hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                        Simpan
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection