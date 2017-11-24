import React from 'react';
import ReactDOM from 'react-dom'

import Links from './links';
import EditForm from './edit_form';

export default class CommentDetail extends React.Component {
    render() {
        return (
            
            <div class="col-9">
            <h5>nombre y apellido del cerote</h5>
            <sub>Added at: <span>fecha de cuando añadieron esta mierda</span></sub>
            <p>Texto de la mierda</p>
            <EditForm />
            <a href="#" title="Close_edit"><i className="fa fa-times-circle-o" aria-hidden="true"></i></a>            
            <Links />
            </div>
       )
    }
}