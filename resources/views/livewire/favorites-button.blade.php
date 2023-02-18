<div>
    <p class="cursor-pointer" wire:click="adFavorite('{{ auth()->user()->id }}','{{ $ad->id }}')">{!! auth()->check() && auth()->user()->ads_favorites->contains($ad) ? '<i class="bi bi-heart fs-3"></i>' : '<i class="bi bi-heart-fill fs-3"></i>' !!}</p>
</div>
