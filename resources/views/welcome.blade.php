<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>
        
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="bg-gray-100 h-screen antialiased leading-none">
        @include('partials.header')
        <div id="root" class="bg-white shadow-md rounded w-10/12 mx-auto mt-24">
            <div class="flex items-center h-12 px-4 border-b">
                <h2 class="text-lg font-bold">Add an Event</h2>
            </div>
            <div class="flex justify-between p-4">
                <form class="flex flex-col w-1/3 -mx-2">
                    <div class="flex flex-col w-full mb-4 px-2">
                        <label class="text-sm mb-2">Event</label>
                        <input v-model="name" type="text" class="rounded border border-gray-400 focus:shadow h-10 p-2">
                    </div>
                    <div class="flex w-full mb-4">
                        <div class="w-1/2 px-2">
                            <label class="text-sm">From</label>
                            <v-date-picker 
                                v-model="from" 
                                :available-dates="{ start: new Date(), end: to }"
                                :input-props='{
                                    class: "rounded border border-gray-400 focus:shadow w-full h-10 mt-2 p-2"
                                }'
                                color="indigo"
                            ></v-date-picker>
                        </div>
                        <div class="w-1/2 px-2">
                            <label class="text-sm">To</label>
                            <v-date-picker 
                                v-model="to" 
                                :available-dates="{ start: from ? from : new Date(), end: null }"
                                :input-props='{
                                    class: "rounded border border-gray-400 focus:shadow w-full h-10 mt-2 p-2"
                                }'
                                color="indigo"
                            ></v-date-picker>
                        </div>
                    </div>
                    <div class="flex justify-between w-full mb-4 px-2">
                        <label> 
                            <input v-model="days" id="Mon" value="Mon" type="checkbox" />
                            <span class="text-sm">Mon</span>
                        </label>
                        <label>
                            <input v-model="days" id="Tue" value="Tue" type="checkbox" />
                            <span class="text-sm">Tue</span>
                        </label>
                        <label>
                            <input v-model="days" id="Wed" value="Wed" type="checkbox" />
                            <span class="text-sm">Wed</span>
                        </label>
                        <label>
                            <input v-model="days" id="Thu" value="Thu" type="checkbox" />
                            <span class="text-sm">Thu</span>
                        </label>
                        <label>
                            <input v-model="days" id="Fri" value="Fri" type="checkbox" />
                            <span class="text-sm">Fri</span>
                        </label>
                        <label>
                            <input v-model="days" id="Sat" value="Sat" type="checkbox" />
                            <span class="text-sm">Sat</span>
                        </label>
                        <label>
                            <input v-model="days" id="Sun" value="Sun" type="checkbox" />
                            <span class="text-sm">Sun</span>
                        </label>
                    </div>
                    <div class="w-full px-2">
                        <button class="bg-indigo p-2 rounded shadow-sm text-white">
                            Save
                        </button>
                    </div>
                </form>
                <div class="w-2/3">
                    <v-calendar is-expanded>
                        <template slot="day-content" slot-scope="props">
                            <div class="flex items-center justify-center h-16" v-if="props.day.inMonth">
                                @{{ props.day.day }}
                            </div>
                        </template>
                    </v-calendar>
                </div>
            </div>
        </div>
        <script src="{{ mix('js/app.js') }}"></script>
        <script>
            new Vue({
                el: '#root',
                data: {
                    name: '',
                    from: null,
                    to: null,
                    days: [],
                }
            })
        </script>
    </body>
</html>
