<!-- Navigation -->
<nav class="navbar top-0 w-full" id="navbarContainer">
    <div class="container sm:px-4 lg:px-8 flex flex-wrap items-center justify-between lg:flex-nowrap">

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="text-gray-800 font-semibold text-3xl leading-4 no-underline page-scroll" href="index.html">Pavo</a> -->

        <!-- Image Logo -->
        <a class="flex gap-2 mr-4 py-0.5 text-xl whitespace-nowrap hover:no-underline focus:no-underline" href="/">
            <img src="/img/logoinsreal.png" alt="alternative" class="h-8 sm:h-10  md:h-12 lg:h-14" />
            <div class="self-center">
                <p class="font-bold">บริษัท อินเรียลเอสเตท จำกัด</p>
                <p class="font-bold text-sm">INS Real Estate co.,ltd.</p>
            </div>
        </a>
    </div> <!-- end of container -->
</nav> <!-- end of navbar -->
<!-- end of navigation -->
<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('navbarContainer');
        const scrollY = window.scrollY;

        if (scrollY > 500) {
            navbar.classList.add('fixed-top');
        } else {
            navbar.classList.remove('fixed-top');
        }
    });
</script>
