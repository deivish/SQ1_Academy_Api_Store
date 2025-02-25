<div class="mt-4 text-sm text-gray-700">
<div 
    x-data="countdownTimer(5 * 60)" 
    x-init="startCountdown()" 
    class="bg-red-100 text-red-500 text-sm px-4 py-2 rounded-lg inline-flex items-center"
>
    <span class="font-semibold">Hurry up! Sale ends in:</span>
    <span class="ml-2 font-bold tabular-nums">
        <span x-text="hours"></span> :
        <span x-text="minutes"></span> :
        <span x-text="seconds"></span>
    </span>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('countdownTimer', (duration) => ({
            hours: '00',
            minutes: '00',
            seconds: '00',

            startCountdown() {
                let timeLeft = duration;

                const updateTimer = () => {
                    let hrs = Math.floor((timeLeft / 3600) % 24);
                    let mins = Math.floor((timeLeft / 60) % 60);
                    let secs = timeLeft % 60;

                    this.hours = String(hrs).padStart(2, '0');
                    this.minutes = String(mins).padStart(2, '0');
                    this.seconds = String(secs).padStart(2, '0');

                    if (timeLeft > 0) {
                        timeLeft--;
                        setTimeout(updateTimer, 1000);
                    }
                };

                updateTimer();
            }
        }));
    });
</script>
</div>
