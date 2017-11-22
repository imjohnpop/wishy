import React from 'react';
import ReactDOM from 'react-dom'

export default class Calendar extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            goal_id: $('#checklists').data('goal'),
            dates: []
        }
    }

    componentDidMount() {
        let self = this;
        $(document).ready(function() {
            self.getData(self.state.goal_id);
        });
    }


    getData() {
        let goal_id = this.state.goal_id;
        let self = this;

        $.ajax({
            type: 'post',
            url: '/api/calendar/' + goal_id,
            data: {}
        }).done((data) => {
            console.log(data);
            for (let i = 0; i < data.length; i++) {
                this.state.dates[i] = {
                    title: data[i].text,
                    start: data[i].due_date,
                    // start: data[i].created_at
                }
            }
            this.renderCalendar();
            $('#calendar').fullCalendar( 'removeEvents' );
            $('#calendar').fullCalendar( 'renderEvents', this.state.dates );

        });
    }

    renderCalendar() {
        console.log('updating');
        let d = new Date();
        let n = d.getMonth();
        let month = n + 1;

        $('#calendar').fullCalendar({
            header: {
                left: '',
                center: 'title prev,next',
                right: ''
            },
            height: 380,
            defaultDate: '2017-' + month + '-01',
            navLinks: false, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: this.state.dates
        });
    }


    render() {
        return (
            <div className="col-6">
                <div id="calendar"></div>
            </div>
        )
    }
}