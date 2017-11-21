import React from 'react';
import ReactDOM from 'react-dom'

export default class Newcheck extends React.Component {

    constructor(props) {
        super(props);
        this.state = {
            value: '',
        };

    }

    value(event) {
        this.setState({
            value: event.target.value
        })
    }

    render() {

        return (
            <div className="col-12 text-secondary newMilestone">
                <small>
                    <i onClick={ () => this.props.newCheck(this.state.value) } className="fa fa-plus" aria-hidden="true"></i>
                    <input onChange={ (event) => this.value(event) } className="ml-2" type="text" placeholder="Add new milestone"/>
                </small>
            </div>
        )
    }
}