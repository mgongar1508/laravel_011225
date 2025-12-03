@props(['nombreError'])
@error($nombreError)
<p class="mt-1 italic text-red-500 text-sm">
    {{ $message }}
</p>
@enderror