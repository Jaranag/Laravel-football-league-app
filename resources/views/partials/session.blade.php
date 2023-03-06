@if (session('status'))


<div class="flex justify-center">
    <div class="p-2 bg-indigo-800 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
        <span class="flex rounded-full bg-indigo-500 uppercase px-2 py-1 text-xs font-bold mr-3">!</span>
        <span class="font-semibold mr-2 text-left flex-auto">{{ session('status') }}</span>
    </div>
</div>


@endif