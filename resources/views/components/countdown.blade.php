@props(['expires'])
<div x-data="{
    expires: '{{ $expires }}',
    days: 00,
    hours: 00,
    minutes: 00,
    seconds: 00,
    start() {
        const now = new Date();
        const expire = new Date(this.expires);
        console.log(now, expire);
        const diff = expire - now;
        this.days = Math.floor(diff / (1000 * 60 * 60 * 24));
        this.hours = Math.floor((diff / (1000 * 60 * 60)) % 24);
        this.minutes = Math.floor((diff / 1000 / 60) % 60);
        this.seconds = Math.floor((diff / 1000) % 60);
        setTimeout(() => this.start(), 1000);
    },
}"
    x-init="start();">
    <div class="flex space-x-2">
        <div>
            <span class="text-gray-700 "
                x-text="days + ' days '">

            </span>
        </div>

        <div>
            <span class="text-gray-700 "
                x-text="hours + ' hrs '">
            </span>
        </div>
        <div>
            <span class="text-gray-700 "
                x-text="minutes + ' mins '">
                00
            </span>
        </div>
        <div>
            <span class="text-gray-700 "
                x-text=" seconds + ' secs'">
                00
            </span>
        </div>
    </div>
</div>
