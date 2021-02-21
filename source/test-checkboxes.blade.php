@extends('_layouts.main')

@section('body')
    <div class="max-w-3xl mt-24">
        <h1 class="text-4xl md:text-5xl font-bold">Add an AlpineJS-powered newsletter subscribe form to your Netlify-hosted site</h1>
        <script>
            let holidayForm = function() {
                return {
                    holidays: [
                        {id: 'newyears', name: 'New Year', date: 'Jan 1'},
                        {id: 'aprilfools', name: "April Fool's Day", date: 'Apr 1'},
                        {id: 'juneteenth', name: 'Juneteenth', date: 'June 19'}
                    ],
                    message: '',
                    selectedHolidays: [],
                    toggleHoliday(id) {
                        if (this.holidaySelected(id)) {
                            this.selectedHolidays = this.selectedHolidays.filter(h => h !== id)
                        } else {
                            this.selectedHolidays.push(id)
                        }

                        this.$nextTick(() => console.log(this.$el.querySelector('input[name=selectedHolidays]').value))
                    },
                    holidaySelected(id) {
                        return this.selectedHolidays.indexOf(id) > -1;
                    },
                    submit() {
                        const formData = new FormData(this.$el);
                        const self = this;

                        fetch('/', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                            body: new URLSearchParams(formData).toString(),
                        }).then(resp => {
                            if (resp.ok) {
                                self.message = 'Form submitted successfully';
                            } else {
                                self.message = 'Error submitting form';
                            }
                        }).catch(e => {
                            self.message = 'Big error submitting form';
                        })
                    }
                }
            }
        </script>


        <form x-data="holidayForm()" class="block mt-10 p-10" name="holiday-form" method="post" data-netlify="true">
            <label class="block text-xl">Name:</label>
            <input class="block border" type="text" name="name">

            <label class="block text-xl">Your favorite holiday(s):</label>
            <div class="space-y-6">
                <template x-for="holiday in holidays">
                    <div @click="toggleHoliday(holiday.id)" class="flex items-center">
                        <div class="w-8 h-8 mr-3 border-2 border-gray-800">
                            <svg x-cloak x-show="holidaySelected(holiday.id)" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 512 512">
                                <path
                                    d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"/>
                            </svg>
                        </div>
                        <div>
                            <div class="font-bold" x-text="holiday.name"></div>
                            <span class="block text-sm" x-text="holiday.date"></span>
                        </div>
                        <input class="hidden" type="checkbox" x-bind:name="`holidays[${holiday.id}]`" :checked="holidaySelected(holiday.id)">
                    </div>
                </template>
                <input x-model="selectedHolidays" type="hidden" name="selectedHolidays">
            </div>

            <div x-cloak x-show="message" x-text="message" class="my-8 text-blue-700"></div>
            <button @click.prevent="submit()" type="submit" class="block mt-12 border px-4 py-2">Submit</button>
        </form>
    </div>
@endsection
