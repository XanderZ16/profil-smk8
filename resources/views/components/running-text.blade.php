@props(['text', 'delimeter' => ' | '])

@php
    // Generate random class name
    $randomClass = 'text-' . substr(md5(time()), 0, 8);

    // Generate random second class name
    $randomClass2 = 'text-' . substr(md5(time() + 1), 0, 8);
@endphp

<div class="relative flex w-full overflow-hidden text-white bg-gray-800 *:uppercase">
    <div
        class="inline-block py-2 pl-4 text-xl font-semibold whitespace-nowrap will-change-transform {{ $randomClass }}">
        {{ $text }} {{ $delimeter }} {{ $text }} {{ $delimeter }} {{ $text }}
        {{ $delimeter }} {{ $text }} {{ $delimeter }} {{ $text }} {{ $delimeter }}
        {{ $text }}
        {{ $delimeter }} {{ $text }} {{ $delimeter }} {{ $text }} {{ $delimeter }}
    </div>
    <div
        class="inline-block py-2 pl-4 text-xl font-semibold whitespace-nowrap will-change-transform {{ $randomClass2 }}">
        {{ $text }} {{ $delimeter }} {{ $text }} {{ $delimeter }} {{ $text }}
        {{ $delimeter }} {{ $text }} {{ $delimeter }} {{ $text }} {{ $delimeter }}
        {{ $text }}
        {{ $delimeter }} {{ $text }} {{ $delimeter }} {{ $text }} {{ $delimeter }}
    </div>
</div>

<script>
    const scrollText = document.querySelector(".{{ $randomClass }}");
    const scrollTextClone = document.querySelector(".{{ $randomClass2 }}");

    let baseSpeed = 2; // Kecepatan dasar
    let currentTransform = 0; // Posisi transformasi awal
    let skewValue = 0; // Nilai skew awal
    let lastScrollPos = window.pageYOffset; // Posisi scroll terakhir
    let timeout; // Timer untuk reset kecepatan

    const animateText = () => {
        // Gerakkan teks berdasarkan kecepatan
        currentTransform -= baseSpeed;
        scrollText.style.transform = `translateX(${currentTransform}px) skewX(${skewValue}deg)`;
        scrollTextClone.style.transform =
            `translateX(${currentTransform}px) skewX(${skewValue}deg)`;

        // Reset posisi teks agar infinite tanpa jeda
        if (currentTransform <= -scrollText.offsetWidth) {
            currentTransform += scrollText.offsetWidth;
        }

        // Jalankan animasi terus-menerus
        requestAnimationFrame(animateText);
    };

    // Perbarui kecepatan dan efek skew berdasarkan scroll
    window.addEventListener("scroll", () => {
        const scrollTop = window.pageYOffset;
        const delta = scrollTop - lastScrollPos; // Perbedaan posisi scroll

        // Tambah kecepatan secara bertahap, dengan batas maksimum
        baseSpeed = Math.max(2, Math.min(15, baseSpeed + Math.abs(delta) * 0.01));

        // Efek skew berlaku di kedua arah (atas dan bawah)
        skewValue = Math.min(15, Math.abs(delta)) * (delta > 0 ? 1 : -1);

        // Simpan posisi scroll terakhir
        lastScrollPos = scrollTop;

        // Reset kecepatan setelah scroll berhenti
        clearTimeout(timeout);
        timeout = setTimeout(() => {
            baseSpeed = 2; // Kembali ke kecepatan dasar
            skewValue = 0; // Hilangkan efek skew
        }, 100); // 200ms setelah scroll berhenti
    });

    // Mulai animasi
    animateText();
</script>
