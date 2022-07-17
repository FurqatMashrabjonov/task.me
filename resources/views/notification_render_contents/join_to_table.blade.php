<div class="flex justify-center">
    <div class="block rounded-lg shadow-lg bg-white max-w-sm text-center">
        <div class="py-3 px-6 border-b border-gray-300">
            Join to Table
        </div>
        <div class="p-6">

            <p class="text-gray-700 text-base mb-4">
                {!! $notification->content !!}
            </p>
            <a href="{{route('notifications.accept', ['notification' => $notification])}}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray transition ease-in-out duration-150">Qabul qilish</a>
        </div>
        <div class="py-3 px-6 border-t border-gray-300 text-gray-600">
            {{$notification->created_date}}
        </div>
    </div>
</div>
