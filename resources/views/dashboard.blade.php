<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="overflow-x-auto">
                        <button class="btn btn-wide btn-info text-white">Users List</button>
                        <table class="table table-md">
                            <!-- head -->
                            <thead>
                            <tr>
                                <th>Sl</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Created At</th>
                                <th>Messenger</th>
                            </tr>
                            </thead>
                            <tbody>

                            @forelse($users as $key=> $user)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->created_at->diffForHumans()}}</td>
                                    <td>
                                        <a class="link link-primary flex items-center"
                                           href="{{route('chat',$user->id)}}" wire:navigate>

                                            <svg  class="w-10 hover:bg-fuchsia-600 rounded-full" id="Layer_1" style="enable-background:new 0 0 56.6934 56.6934;" version="1.1" viewBox="0 0 56.6934 56.6934" width="56.6934px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><polygon points="26.8137,25.055 18.403,34.039 26.049,29.8338 29.9676,34.039 38.3783,25.055 30.8278,29.2603  "/><path d="M28.3471,4.4841c-13.5996,0-24.6249,11.0234-24.6249,24.623c0,13.5997,11.0253,24.625,24.6249,24.625   c13.5986,0,24.624-11.0253,24.624-24.625C52.9712,15.5075,41.9457,4.4841,28.3471,4.4841z M28.4384,43.4054   c-1.5342,0-3.0155-0.2102-4.4138-0.5996l-5.2393,2.8934v-5.4662c-3.4969-2.6279-5.7346-6.6523-5.7346-11.1639   c0-7.9177,6.8893-14.3362,15.3876-14.3362S43.826,21.1514,43.826,29.0691C43.826,36.987,36.9368,43.4054,28.4384,43.4054z"/></g></svg>
{{--                                            <img class="w-6 hover:bg-lime-200"--}}
{{--                                                 src="https://img.icons8.com/material-outlined/96/000000/chat.png"--}}
{{--                                                 alt="chat"/>--}}


                                        </a>
                                    </td>
                                    @empty
                                        <td>No users found.</td>
                                </tr>
                            @endforelse

                            </tbody>
                        </table>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
