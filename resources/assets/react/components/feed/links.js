import React from 'react';
import ReactDOM from 'react-dom'

export default class Links extends React.Component {

    render() {
        return (
            <div className="links">
                <a className="comment_edit" href="#"><i className="fa fa-pencil" aria-hidden="true"></i></a>
                <a className="comment_delete" href="{{action('CommentController@destroy', ['id' => $this_comment['id']])}}"><i className="fa fa-trash" aria-hidden="true"></i></a>
            </div>
       )
    }
}