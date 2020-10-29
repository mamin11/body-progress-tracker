<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Progress') }}
        </h2> --}}


    </x-slot>
{{-- 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>

            <div class="my-10">
                <!-- Chart's container -->
                <div id="chart" style="height: 300px;"></div>
                
                <!-- Charting library -->
                <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
                <!-- Chartisan -->
                <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
                <!-- Your application script -->

            </div> --}}


{{--             
            <div class="my-10">
                    <!-- Chart's container -->

                    <!-- Your application script -->
                    <script>
                    const chart = new Chartisan({
                        el: '#chart',
                        url: "@chart('dashboard/chest')",
                        name: 'chestChart',
                        hooks: new ChartisanHooks()
                        // .colors(['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B'])
                        .datasets('line')
                        .axis(true)
                        .tooltip()
                    });
                    </script>
            </div> --}}
                

        </div>
    </div>
</x-app-layout>
