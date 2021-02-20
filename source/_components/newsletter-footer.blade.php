<div class="max-w-4xl md:flex mx-auto py-8 md:space-x-6">
    <div class="w-full md:w-2/5">
        <h3 class="text-3xl md:text-4xl font-semibold">
            Join the Newsletter
        </h3>
        <p class="mt-4 text-lg">
            Get up to date information and other random tidbits from us. You know you want to.
        </p>
    </div>
    <div class="w-full md:w-3/5 mt-8 md:mt-0 flex flex-col justify-center">
        <form x-data="newsletter()" name="newsletter-subscribes" method="POST" action="/" data-netlify="true">
            <div x-cloak x-show="message" :class="{ 'border-red-500': error, 'text-red-500': error }" class="mb-4 px-2 py-1 bg-white border-4 border-white font-semibold text-gray-800">
                <span x-text="message">Thanks for subscribing! Check your email to confirm.</span>
            </div>
            <div :class="{ 'animate-pulse': loading }" class="flex">
                <label class="sr-only">Email:</label>
                <input x-model="data.email" class="flex-1 px-2 py-1 border-0 bg-white text-gray-800" type="email" name="email" placeholder="Your Email Address" required>
                <button @click.prevent="submit()" type="submit" class="px-6 py-1 bg-gray-800 text-white">
                    <span x-cloak x-show="loading">Loading...</span>
                    <span x-show="!loading">Subscribe</span>
                </button>
            </div>
        </form>
    </div>
</div>
