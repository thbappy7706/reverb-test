<div class="h-screen flex flex-col justify-between bg-green-50">
    <!-- Top Navigation Bar -->
    <div class="fixed top-0 w-full bg-fuchsia-900 h-16 pt-2 text-white flex justify-between items-center shadow-md z-10">
        <!-- Back Button -->
        <a wire:navigate href="{{route('dashboard')}}">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                class="w-10 h-10 text-green-100 ml-2"
            >
                <path
                    class="text-green-100 fill-current"
                    d="M9.41 11H17a1 1 0 0 1 0 2H9.41l2.3 2.3a1 1 0 1 1-1.42 1.4l-4-4a1 1 0 0 1 0-1.4l4-4a1 1 0 0 1 1.42 1.4L9.4 11z"
                />
            </svg>
        </a>
        <!-- Username Display -->
        <div class="text-green-100 font-bold text-base tracking-wide">{{$user->name}}</div>
        <!-- Options Button -->
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            class="w-8 h-8 mr-2"
        >
            <path
                class="text-green-100 fill-current"
                fill-rule="evenodd"
                d="M12 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 7a2 2 0 1 1 0-4 2 2 0 0 1 0 4z"
            />
        </svg>
    </div>

    <!-- Messages Section -->
    <div class="mt-20 mb-16 overflow-y-auto flex-grow px-2">
        @foreach($messages as $message)
            @if($message['sender'] != auth()->user()->name)
                <div class="clearfix w-full">
                    <div class="bg-gray-300 mx-2 my-2 p-2 rounded-lg inline-block">
                        <b>{{ $message['sender'] }} : </b>{{ $message['message'] }}
                    </div>
                </div>
            @else
                <div class="clearfix w-full text-right">
                    <div class="bg-green-300 mx-2 my-2 p-2 rounded-lg inline-block">
                        {{ $message['message'] }} <b>: You</b>
                    </div>
                </div>
            @endif
        @endforeach
    </div>

    <!-- Message Input Section -->
    <form wire:submit="sendMessage()" class="fixed bottom-0 w-full bg-green-100 flex items-center">
        <textarea
            wire:model="message"
            class="flex-grow m-2 py-2 px-4 rounded-full border border-gray-300 bg-gray-200 resize-none"
            rows="1"
            placeholder="Message..."
            style="outline: none;"
        ></textarea>
        <button type="submit" class="m-2 outline-none">
            <svg
                class="text-green-400 w-10 h-10"
                aria-hidden="true"
                focusable="false"
                data-prefix="fas"
                data-icon="paper-plane"
                role="img"
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 512 512"
            >
                <path
                    fill="currentColor"
                    d="M476 3.2L12.5 270.6c-18.1 10.4-15.8 35.6 2.2 43.2L121 358.4l287.3-253.2c5.5-4.9 13.3 2.6 8.6 8.3L176 407v80.5c0 23.6 28.5 32.9 42.5 15.8L282 426l124.6 52.2c14.2 6 30.4-2.9 33-18.2l72-432C515 7.8 493.3-6.8 476 3.2z"
                />
            </svg>
        </button>
    </form>
</div>

