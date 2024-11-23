<x-landing-layout>
    <div>
        <div class="text-center">
            <div class="px-0 mx-0">
                <img src="/img/banners/banner.jpg" class="object-contain" alt="">
            </div>
        </div>

        <div class="bg-gray py-20">
            <div class="container px-4 sm:px-8">
                {{-- <div class="border grid grid-cols-5 gap-2">
                    <div class="relative">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                            </svg>
                        </div>
                        <input type="search" id="default-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Mockups, Logos..." required />
                    </div>
                    <select id="default" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a country</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                    <select id="default" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a country</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                    <select id="default" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a country</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                    <select id="default" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option selected>Choose a country</option>
                        <option value="US">United States</option>
                        <option value="CA">Canada</option>
                        <option value="FR">France</option>
                        <option value="DE">Germany</option>
                    </select>
                </div> --}}
                <form action="{{ route('post.filter') }}" class="bg-white rounded-lg shadow-lg p-4">
                    @csrf
                    <div class="flex flex-wrap gap-3 items-center">
                        <!-- Search Input -->
                        <input type="text" placeholder="ค้นหา..." name="search" value="{{ $search ?? '' }}"
                            class="flex-1 min-w-[200px] border border-gray-200 rounded-lg px-4 py-2.5 text-sm placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">

                        <!-- Province Dropdown -->
                        <select id="address-province" name="province"
                            class="min-w-[150px] border border-gray-200 rounded-lg px-4 py-2.5 text-sm bg-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                            <option disabled selected>จังหวัด</option>
                            @foreach ($provinces as $province_each)
                                <option value="{{ $province_each->id }}"
                                    {{ $province_each->id == ($province ?? '') ? 'selected' : '' }}>
                                    {{ $province_each->name_th }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Amphure Dropdown -->
                        <select id="address-amphure" name="amphure"
                            class="min-w-[150px] border border-gray-200 rounded-lg px-4 py-2.5 text-sm bg-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                            <option disabled selected>อำเภอ/เขต</option>
                        </select>

                        <!-- District Dropdown -->
                        <select id="address-tumbon" name="tumbon"
                            class="min-w-[150px] border border-gray-200 rounded-lg px-4 py-2.5 text-sm bg-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                            <option disabled selected>ตำบล/แขวง</option>
                        </select>

                        <!-- Type Dropdown -->
                        <select name="type"
                            class="min-w-[150px] border border-gray-200 rounded-lg px-4 py-2.5 text-sm bg-white focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                            <option disabled selected>ประเภท</option>
                            @foreach ($types as $type_each)
                                <option value="{{ $type_each->id }}"
                                    {{ $type_each->id == ($type ?? '') ? 'selected' : '' }}>{{ $type_each->label }}
                                </option>
                            @endforeach
                        </select>

                        <!-- Filter Button -->
                        <div class="flex">
                            <button type="submit"
                                class="bg-blue-500 text-white px-6 py-2.5 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                                ค้นหา
                            </button>
                            <a href="/"
                                class="bg-gray-500 text-white px-6 py-2.5 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                                reset
                            </a>
                        </div>
                    </div>
                </form>
                <div class="grid-cols-1 sm:grid md:grid-cols-3 mt-10">
                    @if (count($posts ?? []))
                        @foreach ($posts as $post)
                            <a href="{{ route('post.detail', ['post_id' => $post->listing_id]) }}">
                                <div
                                    class="mx-3 mt-6 flex flex-col rounded-lg bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white sm:shrink-0 sm:grow sm:basis-0">
                                    <div>
                                        @if ($post->firstImage())
                                            <img class="rounded-t-lg"
                                                src="/{{ $post->firstImage()->folder }}/{{ $post->firstImage()->file_name }}" />
                                        @else
                                            <img class="rounded-t-lg" src="/img/banners/banner.jpg" />
                                        @endif
                                    </div>

                                    <div class="px-6 py-4">
                                        <div class="mb-2 flex justify-between">
                                            <p><i class="fa fa-tag"></i> {{ $post->getType->label }}</p>
                                            <p><i class="fa fa-object-ungroup"></i>
                                                {{ number_format($post->area_size) }}
                                                ตร.ม.</p>
                                        </div>
                                        <h5 class="mb-2 text-xl font-medium leading-tight">{{ $post->title }}</h5>
                                        <h3 class="mb-4 fw-bold text-success">฿{{ number_format($post->price) }}</h3>
                                        {{-- <p class="mb-4 text-base">
                                        @php
                                            // got first <p></p> in desc and cut <p> tag got only content
                                            $startPos = strpos($post->description, '<p>');
                                            $endPos = strpos($post->description, '</p>');
                                            $textBetweenTags = '';
                                            if ($startPos !== false && $endPos !== false) {
                                                $textBetweenTags = substr(
                                                    $post->description,
                                                    $startPos + strlen('<p>'),
                                                    $endPos - $startPos - strlen('<p>'),
                                                );
                                            }
                                            echo Illuminate\Support\Str::limit($textBetweenTags, 130, '...');
                                        @endphp
                                    </p> --}}
                                        <div class="flex mt-3 gap-2">
                                            <p class="text-blue-500 text-sm"><i class="fa fa-map-marker"></i></p>
                                            <p class="text-blue-500 text-sm">
                                                {{ $post->getTumbon->name_th }} - {{ $post->getAmphure->name_th }} -
                                                {{ $post->getProvince->name_th }}</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                        <div class="flex justify-center">
                            {{ $posts->links() }}
                        </div>
                    @else
                        <div class="flex justify-center col-span-full">
                            <span
                                class="inline-block whitespace-nowrap rounded-[0.27rem] bg-primary-100 px-[0.65em] pb-[0.25em] pt-[0.35em] text-center align-baseline text-xl font-bold leading-none text-primary-700">
                                ไม่พบข้อมูลในขณะนี้
                            </span>
                        </div>
                    @endif

                </div>

            </div> <!-- end of container -->
        </div> <!-- end of slider-1 -->
    </div>
    <script>
        const getAuphure = (provinceId) => {
            console.log(provinceId)
            $.ajax({
                url: '/get-amphures/' + provinceId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#address-amphure').empty();
                    $('#address-tumbon').empty();

                    $('#address-amphure').append(
                        '<option disabled selected>อำเภอ/เขต</option>');
                    $('#address-tumbon').append(
                        '<option disabled selected>ตำบล/แขวง</option>');

                    $.each(data, function(key, value) {
                        $('#address-amphure').append('<option value="' + value.id + '">' + value
                            .name_th + '</option>');
                    });
                }
            });
        }

        const getTumbon = (amphureId) => {
            $.ajax({
                url: '/get-tumbon/' + amphureId,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    $('#address-tumbon').empty();

                    $('#address-tumbon').append(
                        '<option disabled selected>ตำบล/แขวง</option>');

                    $.each(data, function(key, value) {
                        $('#address-tumbon').append('<option value="' + value
                            .id +
                            '" data-zip="' + value.zipcode + '">' + value
                            .name_th + '</option>');
                    });
                }
            });
        }

        $(document).ready(function() {

            const prov_id = $('#address-province').val();
            if (prov_id) {
                getAuphure(prov_id);
                const default_amphure = '{{ $amphure ?? '' }}';
                setTimeout(() => {
                    $('#address-amphure').val(default_amphure);
                    if (default_amphure) {
                        getTumbon(default_amphure);

                        // If there's a default tumbon that should be selected
                        const default_tumbon = '{{ $tumbon ?? '' }}';
                        setTimeout(() => {
                            $('#address-tumbon').val(default_tumbon);
                            // Trigger change to set zip code
                            $('#address-tumbon').trigger('change');
                        }, 500);
                    }
                }, 500);
            }

            // เมื่อเลือกจังหวัด
            $('#address-province').change(function() {
                var provinceIdValue = $(this).val();

                if (provinceIdValue) {
                    getAuphure(provinceIdValue);
                } else {
                    $('#address-amphure').empty();
                    $('#address-tumbon').empty();

                    $('#address-amphure').append('<option disabled selected>เลือกอำเภอ/เขต</option>');
                    $('#address-tumbon').append('<option disabled selected>เลือกตำบล/แขวง</option>');
                }
            });

            // เมื่อเลือกอำเภอ
            $('#address-amphure').change(function() {
                var amphureId = $(this).val();
                if (amphureId) {
                    getTumbon(amphureId);
                } else {
                    $('#address-tumbon').empty();
                    $('#address-tumbon').append('<option disabled selected>เลือกตำบล/แขวง</option>');
                }
            });
        });
    </script>
</x-landing-layout>
