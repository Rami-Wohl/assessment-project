import React from 'react';
import CheckIcon from '@material-ui/icons/Check';

const showCheckIcon = () => {
    return (
        <CheckIcon style={{color: 'green'}}/>
    )
}

function ProgressCounter(props) {
    return (
        <div className="progress-counter">
            <div>
                <span>{props.count + 1}</span>/<span>{props.total}</span>
            </div>
            {props.hasAnswer && showCheckIcon()}
        </div>
    );
}

export default ProgressCounter;