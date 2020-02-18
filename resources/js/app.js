import './bootstrap'
import VCalendar from 'v-calendar'
import Toast from 'vue-toastification'
import 'vue-toastification/dist/index.css'

Vue.use(VCalendar)
Vue.use(Toast)

new Vue({
    el: '#root',
    data: {
        loading: false,
        name: '',
        from: null,
        to: null,
        days: [],
        event: {}
    },
    computed: {
        fromPage: function () {
            return {
                month: moment(this.from).month() + 1,
                year: moment(this.from).year(),
            }
        },
    },
    methods: {
        hasEvents: function (date) {
            return this.event.days.filter(day => day.date === date).length > 0
        },
        addEvent: async function () {
            this.loading = true

            try {
                const res = await axios.post('/api/events', {
                    name: this.name,
                    from: moment(this.from).format('YYYY-MM-DD'),
                    to: moment(this.to).format('YYYY-MM-DD'),
                    days: this.days,
                })

                this.event = res.data
                this.loading = false

                Vue.$toast.success('Event saved!')
            } catch ({ response }) {
                this.loading = false

                const message = response.status === 422 
                    ? response.data.message 
                    : 'Something went wrong'

                Vue.$toast.error(message)
            }
        }
    },
})
