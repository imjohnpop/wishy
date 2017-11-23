import React from 'react';
import ReactDOM from 'react-dom'

export default class EditForm extends React.Component {

    render() {
        return (
            <form action="{{action('CommentController@update', ['id' => $this_comment['id']])}}">
                <input type="text" name="text" value="{{$this_comment['text']}}" />
                <button className="comment_update" type="submit">Comment</button>
            </form>
       )
    }
}