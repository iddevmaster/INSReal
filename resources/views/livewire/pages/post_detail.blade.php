<?php

use Livewire\Volt\Component;
use App\Models\Property_Listing;

new class extends Component {
    public string $post_id;
    public array $posts = [];
    public string $shareComponent;

    /**
     * Delete the currently authenticated user.
     */
    public function mount($post_id)
    {
        $this->post_id = $post_id;
        $this->posts = Property_Listing::where('listing_id', $post_id)->with('propImages', 'getTumbon', 'getAmphure', 'getProvince')->first()->toArray();

        $this->shareComponent = Share::currentPage()->facebook();
    }
}; ?>
<section class="bg-gray">
    <div class="container mx-auto md:px-4" id="gallery-container">
        <!-- Load Facebook SDK for JavaScript -->
        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = "https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v18.0";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <div class="ex-basic-1 py-12">
            <div class="container mx-auto px-4 sm:px-8 xl:max-w-5xl xl:px-12">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="flex justify-center">
                        @if ($posts['prop_images'])
                            <img class="inline drone-float"
                                src="/{{ $posts['prop_images'][0]['folder'] }}/{{ $posts['prop_images'][0]['file_name'] }}"
                                alt="alternative" />
                        @else
                            <img class="rounded-t-lg" src="/img/banners/banner.jpg" />
                        @endif
                    </div>

                    <div class="px-4">
                        {{-- {!! $shareComponent !!} --}}
                        <div class="flex justify-between items-center">
                            <div>
                                <span class="bg-green-100 text-green-800 font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">{{ $posts['listing_id'] }}</span>
                            </div>
                            <div class="flex items-center justify-end py-2 " style="gap: 10px">
                                <div class="line-it-button" data-lang="th" data-type="share-a" data-env="REAL"
                                    data-url="{{ url()->current() }}" data-color="default" data-size="small"
                                    data-count="true" data-ver="3" style="display: none;"></div>

                                <!-- Your share button code -->
                                <div class="fb-share-button" data-href="{{ url()->current() }}" data-layout="button_count">
                                </div>
                                <style>
                                    .fb-share-button>span {
                                        vertical-align: sub !important;
                                    }
                                </style>
                                {{-- <a href="https://twitter.com/share?ref_src=twsrc%5Etfw" class="twitter-share-button"
                                    data-show-count="true">Tweet</a>
                                <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script> --}}
                            </div>
                        </div>

                        <div class="mb-4">
                            <h3 class="mb-2">{{ $posts['title'] }}</h3>
                        </div>
                        @php
                            $square_meter = $posts['area_size'] ?? 0;
                            // cal rai
                            $rai = floor($square_meter / 1600);
                            $balance = $square_meter - $rai * 1600;
                            // cal ngan
                            $ngan = floor($balance / 400);
                            $balance = $balance - $ngan * 400;
                            // cal ngan
                            $tarangw = floor($balance / 4);
                        @endphp
                        <div class="grid grid-cols-2">
                            <p class="text-lg mb-2"><i class="fa fa-object-ungroup"></i> ขนาดที่ดิน</p>
                            <p class="text-lg font-bold mb-2">{{ $rai }} ไร่ {{ $ngan }} งาน {{ $tarangw }} ตารางวา</p>
                            <p class="text-lg"><i class="fa fa-map-marker"></i> สถานที่</p>
                            <p class="text-lg font-bold">{{ $posts['address'] ?? '-' }}</p>
                            <p class="ms-4 text-lg">ตำบล/แขวง</p>
                            <p class="text-lg font-bold">{{ $posts['get_tumbon']['name_th'] }}</p>
                            <p class="ms-4 text-lg">อำเภอ/เขต</p>
                            <p class="text-lg font-bold">{{ $posts['get_amphure']['name_th'] }}</p>
                            <p class="ms-4 text-lg">จังหวัด</p>
                            <p class="text-lg font-bold">{{ $posts['get_province']['name_th'] }}</p>
                        </div>

                        <div class=" my-10">
                            <p class="text-center text-5xl text-blue-500 font-bold">{{ number_format($posts['price']) }} บาท</p>
                        </div>

                        @if ($posts['google_map'])
                            <a href="{{ $posts['google_map'] }}" target="_BLANK">
                                <div class="flex items-center gap-2 my-4 justify-center">
                                    <img src="/img/google-maps.png" width="40" alt="">
                                    <p class="font-bold text-lg">เปิดบน Google map</p>
                                </div>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="my-10 p-4 flex flex-col rounded-lg bg-white text-surface dark:bg-surface-dark dark:text-white sm:shrink-0 sm:grow sm:basis-0"
                    style="box-shadow: 0 0px 3px 0 rgb(0 0 0 / 0.4);">
                    <p class="text-lg font-bold mb-4">รายละเอียดเพิ่มเติม</p>
                    {!! $posts['description'] ?? '-' !!}
                </div>

                {{-- Image Grid --}}
                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    @foreach ($posts['prop_images'] as $index => $image)
                        <div
                            class="aspect-square overflow-hidden rounded-lg cursor-pointer hover:opacity-90 transition-opacity gallery-item">
                            <img src="/{{ $image['folder'] }}/{{ $image['file_name'] }}"
                                alt="Gallery image {{ $index + 1 }}" data-index="{{ $index }}"
                                class="w-full h-full object-cover gallery-image" loading="lazy">
                        </div>
                    @endforeach
                </div>


                {{-- Lightbox Modal --}}
                <div id="lightbox"
                    class="fixed inset-0 bg-black bg-opacity-90 z-50 hidden items-center justify-center">
                    {{-- Previous Button --}}
                    <button id="prev-btn"
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 text-white p-2 rounded-full hover:bg-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>

                    {{-- Next Button --}}
                    <button id="next-btn"
                        class="absolute right-4 top-1/2 transform -translate-y-1/2 text-white p-2 rounded-full hover:bg-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    {{-- Close Button --}}
                    <button id="close-btn" class="absolute top-4 right-4 text-white p-2 rounded-full hover:bg-gray-800">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>

                    {{-- Image Container --}}
                    <img id="lightbox-img" src="" class="max-h-[90vh] max-w-[90vw] object-contain">
                </div>
            </div>
        </div>
        <script src="https://www.line-website.com/social-plugins/js/thirdparty/loader.min.js" async="async" defer="defer">
        </script>

    </div>
    <script>
        $(document).ready(function() {
            // Store all images
            const images = @json($posts['prop_images']);
            let currentIndex = 0;

            // Open lightbox
            $('.gallery-image').click(function() {
                currentIndex = $(this).data('index');
                showImage(currentIndex);
                $('#lightbox').css('display', 'flex');
            });

            // Close lightbox
            $('#close-btn, #lightbox').click(function(e) {
                if (e.target === this) {
                    $('#lightbox').hide();
                }
            });

            // Previous image
            $('#prev-btn').click(function(e) {
                e.stopPropagation();
                currentIndex = (currentIndex - 1 + images.length) % images.length;
                showImage(currentIndex);
            });

            // Next image
            $('#next-btn').click(function(e) {
                e.stopPropagation();
                currentIndex = (currentIndex + 1) % images.length;
                showImage(currentIndex);
            });

            // Keyboard navigation
            $(document).keydown(function(e) {
                if ($('#lightbox').is(':visible')) {
                    switch (e.keyCode) {
                        case 37: // Left arrow
                            $('#prev-btn').click();
                            break;
                        case 39: // Right arrow
                            $('#next-btn').click();
                            break;
                        case 27: // Escape
                            $('#lightbox').hide();
                            break;
                    }
                }
            });

            // Function to show image
            function showImage(index) {
                $('#lightbox-img').attr('src', `/${images[index]['folder']}/${ images[index]['file_name']}`);
            }
        });
    </script>
</section>
