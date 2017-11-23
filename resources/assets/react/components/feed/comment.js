import React from 'react';
import ReactDOM from 'react-dom'

import CommentDetail from './comment_detail';

export default class Comment extends React.Component {
    render() {
        return (
            <div className="comments row">
                <img style="width:3em; height:3em; border-radius:50%;" className="col-2" src="/uploads/" alt="Profile picture" />
                <CommentDetail />
                <hr />
            </div>
        )
    }
}