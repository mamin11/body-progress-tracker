<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Progress') }}
        </h2> --}}


    </x-slot>

    <div class="py-12">

        @if(Session::has('message'))
        {{-- <p class="alert {{ Session::get('alert-class', 'alert-info') }}" role="alert">{{ Session::get('message') }}</p> --}}
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 my-3 py-3 shadow-md" role="alert">
                <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z"/></svg></div>
                <div class="text-center">
                    <p class="text-sm text-center">{{ Session::get('message') }}.</p>
                </div>
                </div>
            </div>        
        @endif

        <div class="flex justify-center">
            <x-jet-validation-errors class="mb-4" />
        </div>


        <form method="POST" action="/save" enctype="multipart/form-data">
            @csrf
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="container my-12 mx-auto px-4 md:px-12">
                    <div class="flex flex-wrap -mx-1 lg:-mx-4">

                        @foreach ($statistics as $statistic)                            
                        <!-- Column -->
                        <div class="my-1 px-1 w-full md:w-1/2 lg:my-4 lg:px-4 lg:w-1/3">

                            <!-- Article -->
                            <article class="overflow-hidden rounded-lg shadow-lg bg-app-color">

                                <h4 class="text-center text-white py-2 uppercase">{{$statistic->name}}</h4>

                                <div class="w-full max-w-xs flex justify-center">
                                    <div class="content-center rounded px-8 pt-6 pb-8 mb-4">
                                        <div class="mb-4">
                                            {{-- <input type="hidden" name="stat_ids" value="{{$statistic->id}}"> --}}
                                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="{{$statistic->id}}" value="{{ old($statistic->id) }}" placeholder="{{$statistic->name === 'weight' ? 'Enter your '. $statistic->name  : 'Enter '. $statistic->name. ' size' }}">
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
