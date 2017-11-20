import React from 'react';
import ReactDOM from 'react-dom'

export default class Planner extends React.Component {
    
    render() {
        return (
            <div className="col-10 bg-dark mx-auto rounded">
                <div className="row">
                    <div className="col-8">
                        <input type="text" data-goal="{{ $goal->id }}"className="form-control w-100 my-2" placeholder="Enter title" />
                    </div>
                    <div className="col-4">
                        <button id="createChecklist" className="btn wishy-btn my-2">Create</button>
                    </div>
                </div>
            </div>
        )
    }
}