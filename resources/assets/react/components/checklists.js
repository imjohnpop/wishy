import React from 'react';
import ReactDOM from 'react-dom'

import Checklist from './checklist';

export default class Checklists extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            lists: [],
        };


    }

    componentDidMount() {

        let goal_id = $('#checklists').data('goal');

        this.refreshChecklists(goal_id);

    }

    refreshChecklists(goal_id) {
        let self = this;
        $.ajax({
            type: 'post',
            url: '/api/checklists/' + goal_id,
            data: {
            }
        }).done((data) => {
            self.setState({
                lists: data
            })
        });
    }

    render() {
        let lists = [];
        console.log(this.state.lists);
        for(let i in this.state.lists) {
            lists[i] = <Checklist
                             key={this.state.lists[i].id}
                             id={this.state.lists[i].id}
                             goal_id={this.state.lists[i].goal_id}
                             title={this.state.lists[i].title}
            />;
        }
        return (
                    <div className="row">
                        { lists }
                    </div>
        )
    }
}