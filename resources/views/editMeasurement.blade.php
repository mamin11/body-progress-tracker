<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Progress') }}
        </h2> --}}


    </x-slot>

    <div class="py-12">

        @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">{{ Session::get('message') }}</p>
        @endif

    <form method="POST" action="/editSubmit" enctype="multipart/form-data">
            @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container my-12 mx-auto px-4 md:px-12">
                    <div class="flex flex-wrap -mx-1 lg:-mx-4">

                        @foreach ($measurements as $measurement)                            
                        <!-- Column -->
                        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                            <!-- Article -->
                            <article class="overflow-hidden rounded-lg shadow-lg bg-app-color">

                                <h4 class="text-center text-white py-2 uppercase">{{$measurement->getStatistic()->name . ' ('.$measurement->getStatistic()->getStatisticUnits() .')' }}</h4>

                                <div class="w-full max-w-xs flex justify-center">
                                    <div class="content-center rounded px-8 pt-6 pb-8 mb-4">
                                        <div class="mb-4">
                                        <input type="hidden" name="measurement_id" value="{{$measurement->measurement_id}}">
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="val{{$measurement->getStatistic()->id}}"  value="{{$measurement->value}}">
                                    </div>
                                    </div>

                                    </div>

                            </article>
                            <!-- END Article -->

                        </div>
                        <!-- END Column -->
                        @endforeach
                        <div class="flex justify-center flex-wrap mx-auto py-4">
                            <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-1 px-6 rounded-full" type="submit">
                            Save
                            </button>
                        </div>
                        </form>


                    </div>
                </div>

                
            </div>
        </div>
    </div>
</x-app-layout>
