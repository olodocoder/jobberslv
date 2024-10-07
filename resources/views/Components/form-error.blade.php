@props(['name'])

@error($name)
<p class="text-xs font-semibold text-red-500 italic">{{ $message }}</p>

@enderror