<x-landing-layout>
    <div>
        {{-- <div class="text-center">
            <div class="px-0 mx-0">
                <img src="/img/banners/banner.jpg" class="object-contain" alt="">
            </div>
        </div> --}}

        <div class="bg-gray pt-2 pb-20">
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
                {{-- <form action="{{ route('post.filter') }}" class="bg-white rounded-lg shadow-lg p-4"> --}}
                <form action="#!" class="bg-white rounded-lg shadow-lg p-4">
                    @csrf
                    <div class="flex flex-wrap gap-3 items-center">
                        <!-- Search Input -->
                        <input type="text" placeholder="คำค้นหา..." name="search" value="{{ $search ?? '' }}"
                            class="flex-1 min-w-[200px] border border-gray-200 rounded-lg px-4 py-2.5 text-sm placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">

                        <!-- Button trigger modal -->
                        <button type="button"
                            class="inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                            data-twe-toggle="modal" data-twe-target="#filterModal" data-twe-ripple-init
                            data-twe-ripple-color="light">
                            ตัวกรอง
                        </button>

                        <!-- Modal -->
                        <div data-twe-modal-init
                            class="fixed left-0 top-0 z-[1055] hidden h-full w-full overflow-y-auto overflow-x-hidden outline-none"
                            id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
                            <div data-twe-modal-dialog-ref
                                class="pointer-events-none relative w-auto translate-y-[-50px] opacity-0 transition-all duration-300 ease-in-out min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px]">
                                <div
                                    class="pointer-events-auto relative flex w-full flex-col rounded-md border-none bg-white bg-clip-padding text-current shadow-4 outline-none dark:bg-surface-dark">
                                    <div
                                        class="flex flex-shrink-0 items-center justify-between rounded-t-md border-b-2 border-neutral-100 p-4 dark:border-white/10">
                                        <h5 class="text-xl font-medium leading-normal text-surface dark:text-white"
                                            id="filterModalLabel">
                                            ตัวกรอง
                                        </h5>
                                        <button type="button"
                                            class="box-content rounded-none border-none text-neutral-500 hover:text-neutral-800 hover:no-underline focus:text-neutral-800 focus:opacity-100 focus:shadow-none focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-300 dark:focus:text-neutral-300"
                                            data-twe-modal-dismiss aria-label="Close">
                                            <span class="[&>svg]:h-6 [&>svg]:w-6">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M6 18L18 6M6 6l12 12" />
                                                </svg>
                                            </span>
                                        </button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="relative flex-auto p-4" data-twe-modal-body-ref>
                                        <div class="flex flex-col gap-2">
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
                                                        {{ $type_each->id == ($type ?? '') ? 'selected' : '' }}>
                                                        {{ $type_each->label }}
                                                    </option>
                                                @endforeach
                                            </select>

                                            <div>
                                                <p>ราคา</p>
                                                <div class="flex justify-center items-center gap-2">
                                                    <input type="number" placeholder="ราคาต่ำสุด" name="minPrice"
                                                        class="flex-1 min-w-[200px] border border-gray-200 rounded-lg px-4 py-2.5 text-sm placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                                                    <p>-</p>
                                                    <input type="number" placeholder="ราคาสูงสุด" name="maxPrice"
                                                        class="flex-1 min-w-[200px] border border-gray-200 rounded-lg px-4 py-2.5 text-sm placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                                                </div>
                                            </div>
                                            <div>
                                                <p>พื้นที่</p>
                                                <div class="flex justify-center gap-2 items-center">
                                                    <input type="number" placeholder="พื้นที่ต่ำสุด" name="minSize"
                                                        class="flex-1 min-w-[200px] border border-gray-200 rounded-lg px-4 py-2.5 text-sm placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                                                    <p>-</p>
                                                    <input type="number" placeholder="พื้นที่สูงสุด" name="maxSize"
                                                        class="flex-1 min-w-[200px] border border-gray-200 rounded-lg px-4 py-2.5 text-sm placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent outline-none">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal footer -->
                                    <div
                                        class="flex flex-shrink-0 flex-wrap items-center justify-end rounded-b-md border-t-2 border-neutral-100 p-4 dark:border-white/10">
                                        <button type="reset"
                                            class="inline-block rounded bg-primary-100 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-primary-700 transition duration-150 ease-in-out hover:bg-primary-accent-200 focus:bg-primary-accent-200 focus:outline-none focus:ring-0 active:bg-primary-accent-200 dark:bg-primary-300 dark:hover:bg-primary-400 dark:focus:bg-primary-400 dark:active:bg-primary-400"
                                            data-twe-ripple-init data-twe-ripple-color="light">
                                            ล้างตัวกรอง
                                        </button>
                                        <button type="button"
                                            class="ms-1 inline-block rounded bg-primary px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong"
                                            data-twe-modal-dismiss data-twe-ripple-init data-twe-ripple-color="light">
                                            บันทึก
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Filter Button -->
                        <div class="flex gap-2">
                            {{-- <button type="submit"
                                class="bg-blue-500 text-white px-6 py-2.5 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors duration-200">
                                ค้นหา
                            </button> --}}
                            <button type="submit"
                                class="inline-block rounded bg-success px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-success-3 transition duration-150 ease-in-out hover:bg-success-accent-300 hover:shadow-success-2 focus:bg-success-accent-300 focus:shadow-success-2 focus:outline-none focus:ring-0 active:bg-success-600 active:shadow-success-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                ค้นหา
                            </button>
                            <a href="/">
                                <button type="button"
                                    class="inline-block rounded bg-neutral-500 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-neutral-50 shadow-dark-3 transition duration-150 ease-in-out hover:bg-neutral-700 hover:shadow-dark-2 focus:bg-neutral-700 focus:shadow-dark-2 focus:outline-none focus:ring-0 active:bg-neutral-900 active:shadow-dark-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                                    ล้างตัวกรอง
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
                <div class="mt-5 grid-cols-1 sm:grid md:grid-cols-3">
                    <div class="grid-cols-1 sm:grid md:grid-cols-2 md:col-span-2">
                        @if (count($posts ?? []))
                            @foreach ($posts as $post)
                                {{-- <a href="{{ route('post.detail', ['post_id' => $post->listing_id]) }}">

                                </a> --}}
                                <div
                                        class="mx-3 mt-6 flex flex-col rounded-lg bg-white text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white sm:shrink-0 sm:grow sm:basis-0">
                                        <a href="{{ route('post.detail', ['post_id' => $post->listing_id]) }}">
                                            @if ($post->firstImage())
                                                <img class="rounded-t-lg"
                                                    src="/{{ $post->firstImage()->folder }}/{{ $post->firstImage()->file_name }}" />
                                            @else
                                                <img class="rounded-t-lg" src="/img/banners/banner.jpg" />
                                            @endif
                                        </a>
                                        <div class="p-6">
                                            <div class="mb-2 flex justify-between">
                                                <p><i class="fa fa-tag"></i> {{ $post->getType->label }}</p>
                                                <p><i class="fa fa-object-ungroup"></i>
                                                    {{ number_format($post->area_size) }}
                                                    ตร.ม.</p>
                                            </div>
                                            <h5 class="mb-2 text-xl font-medium leading-tight">{{ $post->title }}
                                            </h5>
                                            <h3 class="mb-4 fw-bold text-success">฿{{ number_format($post->price) }}
                                            </h3>
                                            <div class="flex mt-3 gap-2">
                                                <p class="text-blue-500 text-sm"><i class="fa fa-map-marker"></i></p>
                                                <p class="text-blue-500 text-sm">
                                                    {{ $post->getTumbon->name_th }} - {{ $post->getAmphure->name_th }}
                                                    -
                                                    {{ $post->getProvince->name_th }}</p>
                                            </div>
                                        </div>
                                    </div>
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

                    <div>
                        <div
                            class="mx-3 mt-6 h-full flex flex-col rounded-lg bg-amber-200 text-surface shadow-secondary-1 dark:bg-surface-dark dark:text-white sm:shrink-0 sm:grow sm:basis-0">
                            <div class="p-6 h-full flex items-center justify-center">
                                <h5 class="mb-2 text-xl font-medium leading-tight text-center">Advertisement</h5>
                            </div>
                        </div>
                    </div>
                    {{-- @if (count($posts ?? []))
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
                    @endif --}}

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
