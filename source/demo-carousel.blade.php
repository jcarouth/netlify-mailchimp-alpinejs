---
title: Flexible Carousel with AlpineJS and TailwindCSS
---
@extends('_layouts.main')

@section('body')
    <div class="mt-24">
        <script>
            window.carousel = function() {
                return {
                    container: null,
                    prev: null,
                    next: null,
                    init() {
                        this.container = this.$refs.container

                        this.update();

                        this.container.addEventListener('scroll', this.update.bind(this), { passive: true});
                    },
                    update() {
                        const rect = this.container.getBoundingClientRect();

                        const visibleElements = Array.from(this.container.children).filter((child) => {
                            const childRect = child.getBoundingClientRect()

                            return childRect.left >= rect.left && childRect.right <= rect.right;
                        });

                        if (visibleElements.length > 0) {
                            this.prev = this.getPrevElement(visibleElements);
                            this.next = this.getNextElement(visibleElements);
                        }
                    },
                    getPrevElement(list) {
                        const sibling = list[0].previousElementSibling;

                        if (sibling instanceof HTMLElement) {
                            return sibling;
                        }

                        return null;
                    },
                    getNextElement(list) {
                        const sibling = list[list.length - 1].nextElementSibling;

                        if (sibling instanceof HTMLElement) {
                            return sibling;
                        }

                        return null;
                    },
                    scrollTo(element) {
                        const current = this.container;

                        if (!current || !element) return;

                        const nextScrollPosition =
                            element.offsetLeft +
                            element.getBoundingClientRect().width / 2 -
                            current.getBoundingClientRect().width / 2;

                        current.scroll({
                            left: nextScrollPosition,
                            behavior: 'smooth',
                        });
                    }
                };
            }
        </script>
        <style>
            .scroll-snap-x {
                scroll-snap-type: x mandatory;
            }

            .snap-center {
                scroll-snap-align: center;
            }

            .no-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .no-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
        </style>

        <h1 class="text-4xl">Carousel with AlpineJS</h1>

        <p class="mt-12">
            This is an adaptation of the work by Maks Akymenko in his article <a class="underline" href="https://css-tricks.com/a-super-flexible-css-carousel-enhanced-with-javascript-navigation/">A Super Flexible CSS Carousel, Enhanced With JavaScript Navigation on css-tricks.com</a> into styling with TailwindCSS and using AlpineJS.
        </p>

        <p class="mt-12 text-lg"><a href="https://carouth.com/articles/flexible-carousel-with-alpinejs/">See my blog post about this adaptation</a> for more details.</p>

        <div class="mt-12 flex mx-auto items-center">
            <div x-data="carousel()" x-init="init()" class="relative overflow-hidden group">
                <div x-ref="container" class="md:-ml-4 md:flex md:overflow-x-scroll scroll-snap-x md:space-x-4 space-y-4 md:space-y-0 no-scrollbar">
                    <div class="ml-4 flex-auto flex-grow-0 flex-shrink-0 w-96 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                        <div><img src="/assets/images/andy-holmes-4iapyjvm714-unsplash-sm.jpg"></div>
                        <div class="px-2 py-3 flex justify-between">
                            <div class="text-lg font-semibold">Content Title One</div>
                            <time>3/6/2021</time>
                        </div>
                    </div>
                    <div class="ml-4 flex-auto flex-grow-0 flex-shrink-0 w-96 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                        <div><img src="/assets/images/andy-holmes-4iapyjvm714-unsplash-sm.jpg"></div>
                        <div class="px-2 py-3 flex justify-between">
                            <div class="text-lg font-semibold">Content Title Two</div>
                            <time>3/6/2021</time>
                        </div>
                    </div>
                    <div class="ml-4 flex-auto flex-grow-0 flex-shrink-0 w-96 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                        <div><img src="/assets/images/andy-holmes-4iapyjvm714-unsplash-sm.jpg"></div>
                        <div class="px-2 py-3 flex justify-between">
                            <div class="text-lg font-semibold">Content Title Three</div>
                            <time>3/6/2021</time>
                        </div>
                    </div>
                    <div class="ml-4 flex-auto flex-grow-0 flex-shrink-0 w-96 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                        <div><img src="/assets/images/andy-holmes-4iapyjvm714-unsplash-sm.jpg"></div>
                        <div class="px-2 py-3 flex justify-between">
                            <div class="text-lg font-semibold">Content Title Four</div>
                            <time>3/6/2021</time>
                        </div>
                    </div>
                    <div class="ml-4 flex-auto flex-grow-0 flex-shrink-0 w-96 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                        <div><img src="/assets/images/andy-holmes-4iapyjvm714-unsplash-sm.jpg"></div>
                        <div class="px-2 py-3 flex justify-between">
                            <div class="text-lg font-semibold">Content Title Five</div>
                            <time>3/6/2021</time>
                        </div>
                    </div>
                    <div class="ml-4 flex-auto flex-grow-0 flex-shrink-0 w-96 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                        <div><img src="/assets/images/andy-holmes-4iapyjvm714-unsplash-sm.jpg"></div>
                        <div class="px-2 py-3 flex justify-between">
                            <div class="text-lg font-semibold">Content Title Six</div>
                            <time>3/6/2021</time>
                        </div>
                    </div>
                    <div class="ml-4 flex-auto flex-grow-0 flex-shrink-0 w-96 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                        <div><img src="/assets/images/andy-holmes-4iapyjvm714-unsplash-sm.jpg"></div>
                        <div class="px-2 py-3 flex justify-between">
                            <div class="text-lg font-semibold">Content Title Seven</div>
                            <time>3/6/2021</time>
                        </div>
                    </div>
                    <div class="ml-4 flex-auto flex-grow-0 flex-shrink-0 w-96 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                        <div><img src="/assets/images/andy-holmes-4iapyjvm714-unsplash-sm.jpg"></div>
                        <div class="px-2 py-3 flex justify-between">
                            <div class="text-lg font-semibold">Content Title Eight</div>
                            <time>3/6/2021</time>
                        </div>
                    </div>
                    <div class="ml-4 flex-auto flex-grow-0 flex-shrink-0 w-96 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                        <div><img src="/assets/images/andy-holmes-4iapyjvm714-unsplash-sm.jpg"></div>
                        <div class="px-2 py-3 flex justify-between">
                            <div class="text-lg font-semibold">Content Title Nine</div>
                            <time>3/6/2021</time>
                        </div>
                    </div>
                    <div class="ml-4 flex-auto flex-grow-0 flex-shrink-0 w-96 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                        <div><img src="/assets/images/andy-holmes-4iapyjvm714-unsplash-sm.jpg"></div>
                        <div class="px-2 py-3 flex justify-between">
                            <div class="text-lg font-semibold">Content Title Ten</div>
                            <time>3/6/2021</time>
                        </div>
                    </div>
                </div>
                <div @click="scrollTo(prev)" x-show="prev !== null" class="hidden md:block absolute top-1/2 left-0 bg-white p-2 rounded-full transition-transform ease-in-out transform -translate-x-full -translate-y-1/2 group-hover:translate-x-0 cursor-pointer">
                    <div>&lt;</div>
                </div>
                <div @click="scrollTo(next)" x-show="next !== null" class="hidden md:block absolute top-1/2 right-0 bg-white p-2 rounded-full transition-transform ease-in-out transform translate-x-full -translate-y-1/2 group-hover:translate-x-0 cursor-pointer">
                    <div>&gt;</div>
                </div>
            </div>
        </div>
        <div class="mt-4 px-4 md:px-0 text-sm"><span>Photo by <a class="underline" href="https://unsplash.com/@andyjh07?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Andy Holmes</a> on <a class="underline" href="https://unsplash.com/t/color-theory?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></span></div>
    </div>

    <div class="mt-12 flex max-w-md mx-auto items-center">
        <div x-data="carousel()" x-init="init()" class="relative overflow-hidden group">
            <div x-ref="container" class="md:-ml-4 md:flex md:overflow-x-scroll scroll-snap-x md:space-x-4 space-y-4 md:space-y-0 no-scrollbar">
                <div class="ml-4 px-2 py-4 flex-auto flex-grow-0 flex-shrink-0 w-12 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                    <div class="text-3xl text-center">1</div>
                </div>
                <div class="ml-4 px-2 py-4 flex-auto flex-grow-0 flex-shrink-0 w-12 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                    <div class="text-3xl text-center">2</div>
                </div>
                <div class="ml-4 px-2 py-4 flex-auto flex-grow-0 flex-shrink-0 w-12 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                    <div class="text-3xl text-center">3</div>
                </div>
                <div class="ml-4 px-2 py-4 flex-auto flex-grow-0 flex-shrink-0 w-12 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                    <div class="text-3xl text-center">4</div>
                </div>
                <div class="ml-4 px-2 py-4 flex-auto flex-grow-0 flex-shrink-0 w-12 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                    <div class="text-3xl text-center">5</div>
                </div>
                <div class="ml-4 px-2 py-4 flex-auto flex-grow-0 flex-shrink-0 w-12 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                    <div class="text-3xl text-center">6</div>
                </div>
                <div class="ml-4 px-2 py-4 flex-auto flex-grow-0 flex-shrink-0 w-12 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                    <div class="text-3xl text-center">7</div>
                </div>
                <div class="ml-4 px-2 py-4 flex-auto flex-grow-0 flex-shrink-0 w-12 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                    <div class="text-3xl text-center">8</div>
                </div>
                <div class="ml-4 px-2 py-4 flex-auto flex-grow-0 flex-shrink-0 w-12 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                    <div class="text-3xl text-center">9</div>
                </div>
                <div class="ml-4 px-2 py-4 flex-auto flex-grow-0 flex-shrink-0 w-12 rounded-lg bg-gray-100 items-center justify-center snap-center overflow-hidden shadow-md">
                    <div class="text-3xl text-center">10</div>
                </div>
            </div>
            <div @click="scrollTo(prev)" x-show="prev !== null" class="hidden md:block absolute top-1/2 left-0 bg-white p-2 rounded-full transition-transform ease-in-out transform -translate-x-full -translate-y-1/2 group-hover:translate-x-0 cursor-pointer">
                <div>&lt;</div>
            </div>
            <div @click="scrollTo(next)" x-show="next !== null" class="hidden md:block absolute top-1/2 right-0 bg-white p-2 rounded-full transition-transform ease-in-out transform translate-x-full -translate-y-1/2 group-hover:translate-x-0 cursor-pointer">
                <div>&gt;</div>
            </div>
        </div>
    </div>
@endsection
