import React from 'react';
import ReactDOM from 'react-dom'

export default class Progress extends React.Component {

    constructor(props) {
        super(props);
    }

    render() {
        var percent = this.props.percent;
        console.log(this.props.percent);
        return (
            <div className="row progress w-100 mx-auto my-3">
                <div className="progress-bar wishy" role="progressbar" style={ {width: this.props.percent} } aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        )
    }
}