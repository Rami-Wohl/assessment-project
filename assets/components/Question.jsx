import React from "react";
import {MultipleChoiceOptions} from './MultipleChoiceOptions'
import {SliderBarOptions} from './SliderBarOptions'

export const Question = (props) => {

    let questionOptions;

    switch (props.question.questionType) {
        case 1:
            questionOptions = <MultipleChoiceOptions answer={props.answer}
                                                     updateAnswer={props.updateAnswer}
                                                     count={props.count}
                              />;
            break;
        case 2:
            questionOptions = <SliderBarOptions answer={props.answer}
                                                updateAnswer={props.updateAnswer}
                                                count={props.count}
                              />;
            break;
        default:
            questionOptions = null;
    }

    return (
        <React.Fragment>
            <div className={'question-header'}><p>{props.question.questionBody}</p></div>
            <div className={'question-body'}>{questionOptions}</div>
        </React.Fragment>
    )
}