import React from "react";
import {SummaryText} from "./SummaryText";
import {Question} from "./Question";
import {AssessmentNavbar} from "./AssessmentNavbar";

export const AssessmentSlideshow = (props) => {

    const GetQuestionOrSummary = (count, total) => {
        return (count >= total ? <SummaryText /> : <Question question={props.question}
                                                            answer={props.answer}
                                                            count={props.count}
                                                            updateAnswer={props.updateAnswer}
                                                 />
        )
    }

    return (
        <React.Fragment>
            {/* TODO: class updaten als nodig, of hernoemen*/}
            <div className={'intro-text'}>
                {GetQuestionOrSummary(props.count, props.total)}
            </div>
            <AssessmentNavbar count={props.count}
                              total={props.total}
                              navigateSlideshow={props.navigateSlideshow}
            />
        </React.Fragment>
    )
}

