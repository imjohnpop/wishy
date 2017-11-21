import React from 'react';
import ReactDOM from 'react-dom'

import Check from './check';

export default class Checklist extends React.Component {

    constructor(props) {
        super(props);
        console.log('constructor');
        this.state = {
            checks: [],
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
            })
        });
    }

    render() {
        let checks = [];
        for(let i in this.state.checks) {
            checks[i] = <Check refreshChecks={ this.refreshChecks.bind(this) }
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
                        <button className="btn"><i className="fa fa-trash-o" aria-hidden="true"></i></button>
                    </div>
                </div>
                <div className="row progress w-100 mx-auto my-3">
                    <div className="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

                { checks }

                <div className="row">
                    <div className="col-12 ml-5 text-secondary newMilestone">
                        <small><i className="fa fa-plus" aria-hidden="true"></i> Add new milestone</small>
                    </div>
                </div>
            </div>
        )
    }
}