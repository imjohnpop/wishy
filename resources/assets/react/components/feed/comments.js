import React from 'react';
import ReactDOM from 'react-dom'

import Comment from './comment';

export default class Comments extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            comments: [],
        }
    };

    componentDidMount() {

        let category = $('a[title="Encourage"]').data('category');
        let target_id = $('a[title="Encourage"]').data('id');
        this.refreshChecklists(target_id, category);

    }

    refreshComments(target_id, category) {
        let self = this;
        $.ajax({
            type: 'get',
            url: '/api/' + category + '/' + target_id,
            data: {
            }
        }).done((data) => {
            self.setState({
                comments: data
            })
        });
    }


    render() {
    let comments = [];
    for(let i in this.state.comments) {
        comments[i] = <Comment refreshComments={ this.refreshComments.bind(this) }
                            pic= {this.state.comments[i].profile_picture}
                            name={this.state.lists[i].name}
                            surname={this.state.lists[i].surname}
                            date={this.state.lists[i].created_at}
                            text={this.state.lists[i].text}
                            id={this.state.lists[i].id}
                            user_id={this.state.lists[i].user_id}
        />;
    }
    return (
            <div class="comments" id="comment-section">
                { comments }
            </div>
        )
    };
}