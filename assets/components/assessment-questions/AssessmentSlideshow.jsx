import React from "react";
import {SummaryText} from "../text-content/SummaryText";
import {Question} from "./Question";
import AssessmentNavbar from "./navbar/AssessmentNavbar";

export const AssessmentSlideshow = (props) => {

    const GetQuestionOrSummary = (count, total) => {
        return (count >= total ?
                <SummaryText checkCompletion={props.checkCompletion}/> :
                <Question question={props.question}
                          answer={props.answer}
                          count={props.count}
                          updateAnswer={props.updateAnswer}
                />
        )
    }

    return (
        <React.Fragment>
            <div className={'content-body'}>
                {GetQuestionOrSummary(props.count, props.total)}
            </div>
            <AssessmentNavbar count={props.count}
                              total={props.total}
                              hasAnswer={!!props.answer}
                              navigateSlideshow={props.navigateSlideshow}
                              checkCompletion={props.checkCompletion}
                              submitResults={props.submitResults}
            />
        </React.Fragment>
    )
}

