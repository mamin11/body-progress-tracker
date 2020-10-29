<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Progress') }}
        </h2> --}}


    </x-slot>

    <div class="py-12">

        <!-- component -->
    <div class="my-2 py-2 overflow-x-auto sm:-mx-0 sm:px-6 lg:-mx-0 pr-10 lg:px-8">

        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-black tracking-wider">ID</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-black tracking-wider">Date</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider"></th>
                    <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                </tr>
            </thead>
            <tbody class="bg-white">
                <?php $n=1; ?>
                @foreach ($measurements as $measurement)                    
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                        <div class="flex items-center">
                            <div>
                            <div class="text-sm leading-5 text-gray-800">#{{$n}}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                    <div class="text-sm leading-5 text-blue-900">{{$measurement->created_at}}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-blue-900 text-sm leading-5">
                    <a href="/edit/{{$measurement->id}}"><button class="px-5 py-2  border bg-app-color text-white rounded transition duration-300 hover:bg-app-color-darker hover:text-white focus:outline-none">View Details</button></a>
                    </td>
                    <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5">
                    <a href="/delete/{{$measurement->id}}"><button class="px-5 py-2 bg-red-600 border text-white rounded transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none">Delete</button></a>
                    </td>
                </tr>
                <?php $n++; ?>
                @endforeach

            </tbody>
        </table>

</div>
    </div>
</div>

</x-app-layout>
