import React from 'react';

function ProgressCounter(props) {
    return (
        <div className="progress-counter">
            <span>{props.count + 1}</span>/<span>{props.total}</span>
        </div>
    );
}

export default ProgressCounter;