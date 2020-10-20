<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    @if($end)
    <div class="alert alert-info">
        <h5>VOUS AVEZ PERDU VEILLER RESSAYER</h5>
    </div>
    @else
     <h5>TROUVER LE NOMBRE QUE NOUS AVONS CACHE ENTRE 0 et 20</h5>
    @endif
   
    <div>
        @if (session()->has('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- @if (session()->has('success'))
        <p class="bold">le nombre est {{$nbr}} bravooo !!!</p>
        @endif --}}
    </div>
     <form wire:submit.prevent="test">
        <input class="form-control" type="text" placeholder="Entrer le nombre" wire:model="choix" required name="test">
         @error('test') <span class="error">{{ $message }}</span> @enderror
        @if (session()->has('success'))
            <div class="alert alert-warning">
                <h5>{{ session('success') }}</h5>
                
            </div>
        @endif
    </form>
    <div class="progress mt-3">
        <div class="progress-bar @if($nbrChance > 0) bg-success @endif @if($nbrChance > 25) bg-info @endif @if($nbrChance > 50) bg-warning @endif @if($nbrChance > 75) bg-warning @endif @if($nbrChance == 100) bg-danger @endif" role="progressbar" style="width: {{$nbrChance}}%" aria-valuenow="{{$nbrChance}}" aria-valuemin="0" aria-valuemax="100" pl></div>
    </div>
    <p>nombre de chance(s) : <b> {{$test}}/6 </b> </p>  
    @if($end)
     <div><button class="btn btn-primary" wire:click="refresh">recommencer</button></div>
    @endif
</div>
