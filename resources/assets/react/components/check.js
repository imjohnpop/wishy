import React from 'react';
import ReactDOM from 'react-dom'

export default class Check extends React.Component {

    constructor(props) {
        super(props);

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

    render() {
        return (
            <div className="planner-checks">
                <input onChange={ (event) => this.checking(event, this.props.id) } type="checkbox" checked={this.props.is_done}/> {this.props.text}
            </div>
        )
    }
}