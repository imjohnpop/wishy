import React from 'react';
import ReactDOM from 'react-dom'


export default class Input extends React.Component {

    ChecklistCreated() {
        $.ajax({
            "url" : "/api/checklist/new",
            "type" : "post",
            "data" : {
                "goal_id" : $('#checklists').data('goal'),
                "title" : $('#input').val()
            }
        }).done((data) => {
            $('#input').value = '';
            this.props.refreshChecklists($('#checklists').data('goal'));
        })
    }

    render() {
        return (
            <div id="checklistInput" className="row bg-dark mx-auto rounded">
                <div className="col-7">
                    <input id="input" type="text" className="form-control w-100 my-2" placeholder="Enter title" />
                </div>
                <div className="col-4">
                    <button onClick={ () => this.ChecklistCreated() } className="btn wishy-btn my-2">Create</button>
                </div>
            </div>
        )
    }
}