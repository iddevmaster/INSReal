<x-landing-layout>
    @section('title', $post->title)
    {{-- @section('cover' , asset('uploads/news/'. $blog->cover)) --}}

    <!-- Header -->
    <header class="bg-gray py-2">
        <div class="container px-4 sm:px-8 xl:px-4">
            <nav class="bg-grey-light w-full rounded-md xl:ml-24">
                <ol class="list-reset flex">
                    <li>
                        <a
                        href="/"
                        class="text-primary transition duration-150 ease-in-out hover:text-primary-600 focus:text-primary-600 active:text-primary-700 dark:text-primary-400 dark:hover:text-primary-500 dark:focus:text-primary-500 dark:active:text-primary-600"
                        >{{ __('messages.home') }}</a
                        >
                    </li>
                    <li>
                        <span class="mx-2 text-neutral-500 dark:text-neutral-400">></span>
                    </li>
                    <li style="color: #eb427e">
                        {{ $post->title }}
                    </li>
                </ol>
            </nav>
        </div> <!-- end of container -->
        <!-- TW Elements is free under AGPL, with commercial license required for specific uses. See more details: https://tw-elements.com/license/ and contact us for queries at tailwind@mdbootstrap.com -->
    </header> <!-- end of ex-header -->
    <!-- end of header -->

    <livewire:pages.post_detail :post_id="$post_id" />

</x-landing-layout>
