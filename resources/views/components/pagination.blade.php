<div class="mt-12 px-4 flex justify-center items-center">
    @if ($paginator->hasPages())
        <nav role="navigation" aria-label="Pagination Navigation" class="w-full flex flex-col items-center">

            {{-- Mobile Layout --}}
            <div class="flex justify-between w-full sm:hidden gap-2 mb-4">
                @if ($paginator->onFirstPage())
                    <span class="relative inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-zinc-600 bg-zinc-900 border border-zinc-800 rounded-lg cursor-not-allowed w-1/2 uppercase tracking-wide">
                        &lt;
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-gray-300 bg-zinc-900 border border-zinc-800 rounded-lg hover:bg-zinc-800 hover:text-white hover:border-amber-500/40 transition-colors w-1/2 uppercase tracking-wide">
                        &lt;
                    </a>
                @endif

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-gray-300 bg-zinc-900 border border-zinc-800 rounded-lg hover:bg-zinc-800 hover:text-white hover:border-amber-500/40 transition-colors w-1/2 uppercase tracking-wide">
                        &gt;
                    </a>
                @else
                    <span class="relative inline-flex items-center justify-center px-4 py-2 text-sm font-bold text-zinc-600 bg-zinc-900 border border-zinc-800 rounded-lg cursor-not-allowed w-1/2 uppercase tracking-wide">
                        &gt;
                    </span>
                @endif
            </div>

            {{-- Info Text --}}
            <div class="mb-4 text-center">
                <p class="text-sm text-gray-400 uppercase tracking-wide">
                    Showing
                    <span class="font-semibold text-gray-200">{{ $paginator->firstItem() }}</span>
                    to
                    <span class="font-semibold text-gray-200">{{ $paginator->lastItem() }}</span>
                    of
                    <span class="font-semibold text-amber-400">{{ $paginator->total() }}</span>
                    results
                </p>
            </div>

            {{-- Desktop / Tablet Layout --}}
            <div class="hidden sm:flex flex-wrap justify-center items-center gap-2">
                @if ($paginator->onFirstPage())
                    <span class="px-3 py-2 rounded-lg text-sm font-medium bg-zinc-900 text-zinc-600 border border-zinc-800 cursor-not-allowed">
                        &lt;
                    </span>
                @else
                    <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="px-3 py-2 rounded-lg text-sm font-medium bg-zinc-900 text-gray-300 border border-zinc-800 hover:bg-zinc-800 hover:text-white hover:border-amber-500/40 transition-colors">
                        &lt;
                    </a>
                @endif

                @foreach ($elements as $element)
                    @if (is_string($element))
                        <span class="px-3 py-2 rounded-lg text-sm font-medium bg-zinc-900 text-zinc-500 border border-zinc-800">
                            {{ $element }}
                        </span>
                    @endif

                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <span class="px-3 py-2 rounded-lg text-sm font-bold bg-gradient-to-r from-amber-400 to-orange-500 text-black border border-amber-400 shadow-lg shadow-amber-500/20">
                                    {{ $page }}
                                </span>
                            @else
                                <a href="{{ $url }}" class="px-3 py-2 rounded-lg text-sm font-medium bg-zinc-900 text-gray-300 border border-zinc-800 hover:bg-zinc-800 hover:text-white hover:border-amber-500/40 transition-colors">
                                    {{ $page }}
                                </a>
                            @endif
                        @endforeach
                    @endif
                @endforeach

                @if ($paginator->hasMorePages())
                    <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="px-3 py-2 rounded-lg text-sm font-medium bg-zinc-900 text-gray-300 border border-zinc-800 hover:bg-zinc-800 hover:text-white hover:border-amber-500/40 transition-colors">
                        &gt;
                    </a>
                @else
                    <span class="px-3 py-2 rounded-lg text-sm font-medium bg-zinc-900 text-zinc-600 border border-zinc-800 cursor-not-allowed">
                        &gt;
                    </span>
                @endif
            </div>
        </nav>
    @endif
</div>