<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'MTXL Center' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

</head>

<body>
    @livewire('partials.navbar')
    <main>
        {{ $slot }}
    </main>
    @livewire('partials.footer')
    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            slidesOffsetAfter: 16
            , slidesOffsetBefore: 16
            , slidesPerView: "auto"
            , spaceBetween: 12
            , centerInsufficientSlides: true
        });

        const mainThumbnail = document.getElementById("main-thumbnail");
        const imgSelectors = document.querySelectorAll(".thumbnail-selector");
        imgSelectors.forEach(element => {
            element.addEventListener("click", () => {
                const imgElement = element.querySelector("img");
                if (imgElement) {
                    mainThumbnail.src = imgElement.src;
                }
            });
        });

    </script>
    <script>
        document.addEventListener('livewire:initialized', () => {
            Livewire.on('copy-to-clipboard', async ({
                text
            }) => {
                try {
                    await navigator.clipboard.writeText(text);
                } catch (err) {
                    console.error('Failed to copy text: ', err);
                }
            });
        });

    </script>
    <script>
        window.addEventListener('livewire:load', function() {
            Livewire.on('modal-opened', () => {
                document.body.style.overflow = 'hidden';
            });

            Livewire.on('modal-closed', () => {
                document.body.style.overflow = 'auto';
            });
        });

    </script>
</body>
</html>
