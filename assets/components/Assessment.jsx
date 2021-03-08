import React, {Component} from "react";

class Assessment extends Component {
    constructor(props) {
        super(props);

        this.state = {};
    }

    render() {
        return (
            <React.Fragment>
                <div>{this.props.assessmentData.assessmentTitle}</div>
            </React.Fragment>
        )
    }
}

export default Assessment;