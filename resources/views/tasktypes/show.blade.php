<x-manager-layout>
    <div class="col-12">
        <div class="card p-4 my-4">
            <div class="card-header d-flex flex-column align-items-center">
                <h1 class="text-center"> {{ $tasktype -> type}} </h1>
            </div>
            <div class="card-body">
                <h3 class="card-text my-4">ID: <span class="mx-3 text-info">{{ $tasktype -> id }}</span></h3>
                <h3 class="card-text my-4">Maksimum xal: <span class="mx-3 text-info">{{ $tasktype -> max_point }}</span></h3>
                
            </div>
            <div class="card-footer d-flex justify-content-between">                
                <a href="/tasktypes" class="btn rounded btn-light"> <i class="mdi mdi-keyboard-return" style="font-size: 2rem;"></i> </a>
            </div>
        </div>

    
    </div>
</x-manager-layout>