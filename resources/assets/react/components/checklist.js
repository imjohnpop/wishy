import React from 'react';
import ReactDOM from 'react-dom'

import Check from './check';
import Newcheck from "./newcheck";
import Progress from "./progress";

export default class Checklist extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            checks: [],
            nr_of_checks: '',
            nr_of_done: '',
            percent: ''
        };
    }

    componentDidMount() {
        console.log('done');
        let id = this.props.id;

        this.refreshChecks(id);

    }

    refreshChecks(id) {
        let self = this;
        $.ajax({
            type: 'post',
            url: '/api/checks/' + id,
            data: {
            }
        }).done((data) => {
            self.setState({
                checks: data
            });
            this.percent();
        });
    }

    percent() {
        let all = this.state.checks.length;

        let done = 0;
        for(let i in this.state.checks) {
            if(this.state.checks[i].is_done == 0) {
                continue
            } else {
                done = done +1;
            }
        }
        let percentage = done / all;
        console.log(percentage * 100 + '%');

        this.setState({
            percent: percentage * 100 + '%'
        })
    }
    newCheck(text) {
        let id = this.props.id;
        $.ajax({
            type: 'post',
            url: '/api/check/new/' + id,
            data: {
                text: text
            }
        }).done((data) => {
            this.refreshChecks(id)
        });
    }

    deleteChecklist() {
        let id = this.props.id;
        let self = this;
        $.ajax({
            type: 'post',
            url: '/api/check/delete/' + id,
            data: {
            }
        }).done((data) => {
            this.props.refreshChecklists($('#checklists').data('goal'));
        });
    }

    refreshCalendar() {
        this.props.refreshCalendar();
    }

    render() {
        let checks = [];
        for(let i in this.state.checks) {
            checks[i] = <Check refreshCalendar={ this.refreshCalendar.bind(this) } refreshChecks={ this.refreshChecks.bind(this) }
                key={this.state.checks[i].id}
                id={this.state.checks[i].id}
                checklist_id={this.state.checks[i].checklist_id}
                text={this.state.checks[i].text}
                due_date={this.state.checks[i].due_date}
                is_done={this.state.checks[i].is_done}
            />;
        }


        return (
            <div className="col-12">
                <hr/>
                <div className="row d-flex justify-content-between align-middle">
                    <div className="col-8 my-2">
                        <span><i className="fa fa-check-square-o" aria-hidden="true"></i>{ this.props.title }</span>
                    </div>
                    <div className="col-4 d-flex justify-content-end">
                        <button onClick={ () => this.deleteChecklist() } className="btn pointer"><i className="fa fa-trash-o" aria-hidden="true"></i></button>
                    </div>
                </div>

                <Progress percent={this.state.percent} />

                { checks }

                <div className="row">
                    <Newcheck newCheck={ this.newCheck.bind(this) }/>
                </div>
            </div>
        )
    }
}