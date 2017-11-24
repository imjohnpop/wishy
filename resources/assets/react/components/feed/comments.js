import React from 'react';
import ReactDOM from 'react-dom';

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
        this.refreshComments(target_id, category);

    }

    refreshComments(target_id, category) {
        let self = this;
        $.ajax({
            type: 'get',
            url: '/api/comment/' + category + '/' + target_id,
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
                            name={this.state.comments[i].name}
                            surname={this.state.comments[i].surname}
                            date={this.state.comments[i].created_at}
                            text={this.state.comments[i].text}
                            id={this.state.comments[i].id}
                            user_id={this.state.comments[i].user_id}
        />;
    }
    return (
            <div className="comments" id="comment-section">
                { comments }
            </div>
        )
    };
}