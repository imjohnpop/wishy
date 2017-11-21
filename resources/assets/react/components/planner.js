import React from 'react';
import ReactDOM from 'react-dom'

import Checklists from './checklists';
import Input from './input';

export default class Planner extends React.Component {

    refreshChecklists(goal_id) {
        this.checklist.refreshChecklists(goal_id);
    }
    
    render() {
        return (
            <div className="col-12">

                <div id="togglingInput" className="col-10 mx-auto">
                    <Input refreshChecklists={ this.refreshChecklists.bind(this) }/>
                </div>

                <Checklists ref={ (el) => {this.checklist = el;} }/>

            </div>
        )
    }
}