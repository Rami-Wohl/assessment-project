import React from "react";

export const Question = (props) => {
    return (
        <React.Fragment>
            <div className={'question-header'}><p>{props.question.questionBody}</p></div>
        </React.Fragment>
    )
}