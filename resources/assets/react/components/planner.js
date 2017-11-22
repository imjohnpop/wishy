import React from 'react';
import ReactDOM from 'react-dom'

import Checklists from './checklists';
import Input from './input';
import Calendar from './calendar';

export default class Planner extends React.Component {

    refreshChecklists(goal_id) {
        this.checklist.refreshChecklists(goal_id);

    }

    refreshCalendar() {
        this.calendar.getData();
    }
    
    render() {
        return (



            <div className="row">
                <div className="col-6">
                    <div className="row d-flex justify-content-around">
                        <div className="col-10 mx-auto">
                            <button id="checkbox" className="btn btn-block wishy-btn"><i className="fa fa-check-square-o" aria-hidden="true"></i> Add checklist</button>
                        </div>
                    </div>
                    <div className="row mt-2">
                        <div className="col-12">

                            <div id="togglingInput" className="col-10 mx-auto">
                                <Input refreshChecklists={ this.refreshChecklists.bind(this) }/>
                            </div>

                            <Checklists refreshCalendar={ this.refreshCalendar.bind(this) } ref={ (el) => {this.checklist = el;} }/>

                        </div>
                    </div>
                    <div className="row" id=""></div>
                </div>
                <Calendar ref={ (el) => {this.calendar = el;} } />
            </div>
            
        )
    }
}