<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Progress') }}
        </h2> --}}


    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <x-jet-welcome />
            </div>

                <div class="my-10 flex justify-center">
                    <div class="w-1/2" style="height: 300px;">
                        {!! $theWeightChart->container() !!}  
                    </div>

                    <div class="w-1/2" style="height: 300px;">
                        {!! $theWaistChart->container() !!}  
                    </div>
                </div>

                <div class="my-10 flex justify-center">
                    <div class="w-1/2 sm:w-full xs:w-full" style="height: 300px;">
                        {!! $theChestChart->container() !!}  
                    </div>

                    <div class="w-1/2 sm:w-full xs:w-full" style="height: 300px;">
                        {!! $theNeckChart->container() !!}  
                    </div>
                </div>

                <div class="my-10 flex justify-center">
                    <div class="w-full" style="height: 300px;">
                        {!! $theUpperArmChart->container() !!}  
                    </div>
                </div>

                <div class="my-10 flex justify-center">
                    <div class="w-full" style="height: 300px;">
                        {!! $theLowerArmChart->container() !!}  
                    </div>
                </div>

                <div class="my-10 flex justify-center">
                    <div class="w-full" style="height: 300px;">
                        {!! $theThighChart->container() !!}  
                    </div>
                </div>

                <div class="my-10 flex justify-center">
                    <div class="w-full" style="height: 300px;">
                        {!! $theCalfChart->container() !!}  
                    </div>
                </div>
            

            {!! $theWeightChart->script() !!}
            {!! $theWaistChart->script() !!}            
            {!! $theChestChart->script() !!} 
            {!! $theNeckChart->script() !!}
            {!! $theUpperArmChart->script() !!} 
            {!! $theLowerArmChart->script() !!}
            {!! $theThighChart->script() !!}
            {!! $theCalfChart->script() !!}


            {{-- <div class="my-10">
                <!-- Chart's container -->
                <div id="chart" style="height: 300px;"></div>
                
                <!-- Charting library -->
                <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
                <!-- Chartisan -->
                <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
                <!-- Your application script -->
                <script>
                    const chart = new Chartisan({
                        el: '#chart',
                        url: "@chart('dashboard')",
                        hooks: new ChartisanHooks()
                        // .colors(['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B'])
                        .datasets('bar')
                        .axis(true)
                        .legend({ position: 'bottom' })
                        .tooltip()
                        // .title('This is a sample chart using chartisan!')
                    });
                    </script>
            </div> --}}


            
            {{-- <div class="my-10">
                    <!-- Chart's container -->
                    <div id="chart2" style="height: 300px;"></div>

                    <!-- Your application script -->
                    <script>
                    const chart2 = new Chartisan({
                        el: '#chart2',
                        url: "@chart('dashboard')",
                        name: 'chestChart',
                        hooks: new ChartisanHooks()
                        .colors(['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B'])
                        .datasets('line')
                        .axis(true)
                        .tooltip()
                    });
                    </script>
            </div> --}}
                

        </div>
    </div>
</x-app-layout>
