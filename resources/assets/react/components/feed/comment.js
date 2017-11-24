import React from 'react';
import ReactDOM from 'react-dom'

import CommentDetail from './comment_detail';

export default class Comment extends React.Component {
    render() {
        return (
            <div className="comments row">
                <img style="width:3em; height:3em; border-radius:50%;" className="col-2" src="/uploads/" alt="Profile picture" />
                <CommentDetail 
                            name={this.state.comments[i].name}
                            surname={this.state.comments[i].surname}
                            date={this.state.comments[i].created_at}
                            text={this.state.comments[i].text}
                            id={this.state.comments[i].id}
                            user_id={this.state.comments[i].user_id}
                /> 
                <hr />
            </div>
        )
    }
}