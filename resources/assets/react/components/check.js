import React from 'react';
import ReactDOM from 'react-dom'

export default class Check extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            date: ''
        }
    }

    componentDidMount() {
        this.setState({
            date: this.props.due_date
        })
    }

    checking(event, id) {
        let self = this;
        $.ajax({
            type: 'post',
            url: '/api/check/' + id,
            data: {
                checked: event.target.checked
            }
        }).done((data) => {
            self.props.refreshChecks(self.props.checklist_id);
        });
    }

    selecting(event) {
        console.log('date');
        this.setState({
            date: event.target.value
        })
    }

    submitDate(id) {
        if(this.state.date !== '') {
            let self = this;
            $.ajax({
                type: 'post',
                url: '/api/check/date/' + id,
                data: {
                    date: self.state.date
                }
            }).done((data) => {
                this.props.refreshCalendar();
            });
        }
    }

    render() {
        return (
            <div className="planner-checks d-flex justify-content-between">
                <div>
                    <input onChange={ (event) => this.checking(event, this.props.id) } type="checkbox" checked={this.props.is_done}/> {this.props.text}
                </div>
                <div className="datepicker">
                    <input onChange={ (event) => this.selecting(event) }  lang="en" type="date" value={this.state.date} name="dateselector"/>
                    <span><i onClick={ () => this.submitDate(this.props.id) } className="fa fa-check-square fa-lg" aria-hidden="true"></i></span>
                </div>
            </div>
        )
    }
}