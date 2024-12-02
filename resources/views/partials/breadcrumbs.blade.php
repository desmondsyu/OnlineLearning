 {{-- resources/views/partials/breadcrumbs.blade.php --}}

 {{-- @unless ($breadcrumbs->isEmpty())
 <ol class="breadcrumb bg-yellow-500">
     @foreach ($breadcrumbs as $breadcrumb)

         @if (!is_null($breadcrumb->url) && !$loop->last)
             <li class="breadcrumb-item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
         @else
             <li class="breadcrumb-item active">{{ $breadcrumb->title }}</li>
         @endif

     @endforeach
 </ol>
@endunless --}}

@unless ($breadcrumbs->isEmpty())
    <nav class=" p-4 rounded-md " aria-label="Breadcrumb">
        <ol class="flex space-x-4 text-lg text-gray-700">
            @foreach ($breadcrumbs as $breadcrumb)
                @if (!is_null($breadcrumb->url) && !$loop->last)
                    <li class="flex items-center">
                        <a 
                            href="{{ $breadcrumb->url }}" 
                            class="hover:text-gray-900 transition-colors"
                        >
                            {{ $breadcrumb->title }}
                        </a>
                        <svg 
                            class="w-4 h-4 mx-2 text-gray-400" 
                            fill="currentColor" 
                            viewBox="0 0 20 20" 
                            aria-hidden="true"
                        >
                            <path 
                                fill-rule="evenodd" 
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" 
                                clip-rule="evenodd"
                            />
                        </svg>
                    </li>
                @else
                    <li class="flex items-center font-semibold text-gray-900">
                        {{ $breadcrumb->title }}
                    </li>
                @endif
            @endforeach
        </ol>
    </nav>
@endunless
